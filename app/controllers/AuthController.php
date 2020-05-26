<?php


namespace app\controllers;


use app\base\BaseController;
use app\components\AuthComponent;
use base\App;
use base\Page;
use base\View\View;

class AuthController extends BaseController
{
    private $component;

    public function beforeAction()
    {
        parent::beforeAction();

        if (App::$session->user->isAuth()) {
            header("Location: " . App::$config->homeUrl);
        }
    }

    public function __construct(Page &$page, $params)
    {
        parent::__construct($page, $params);

        $this->component = new AuthComponent();
    }

    public function authForm()
    {
        new View("site/auth/form", $this->page);
    }

    public function auth()
    {
        $post = $this->page->getPost();

        $email = $post['email'];
        $password = $post['password'];

        $auth = $this->component->auth($email, $password);

        if ($auth === true) {
            header("Location: /faculties/");
        }
        else {
            new View("site/auth/form", $this->page, ['error' => 'Ошибка авторизации']);
        }
    }


}