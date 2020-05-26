<?php


namespace app\controllers;


use app\base\BaseController;
use app\components\AuthComponent;
use app\components\StatusComponent;
use base\Page;
use base\View\View;

class UsersController extends BaseController
{
    public function index()
    {
        
    }

    public function registerForm()
    {
        $statusComponent = new StatusComponent();
        $statuses = $statusComponent->getAll();

        new View("site/users/form", $this->page, ['statuses' => $statuses]);
    }

    public function register()
    {
        $post = $this->page->getPost();

        $email = $post['email'];
        $password = $post['password'];
        $passwordTwice = $post['passwordTwice'];
        $surname = $post['surname'];
        $name = $post['name'];
        $fathername = $post['name'];
        $status_id = $post['status_id'];

        $authComponent = new AuthComponent();

        $add = $authComponent->register($email, $password, $passwordTwice, $surname, $name, $fathername, $status_id);

        if ($add === true) {
            header("Location: /users/");
        }
        else {
            new View("site/users/form", $this->page, ['error' => $add]);
        }
    }

    public function logout()
    {
        $authComponent = new AuthComponent();

        if ($authComponent->logout()) {
            header("Location: /");
        }
        else {
            echo "Ошибка выхода";
        }
    }
}