<?php


namespace app\controllers;


use app\base\BaseController;
use app\components\FacultiesComponent;
use base\App;
use base\Page;
use base\View\View;

class FacultiesController extends BaseController
{
    private $component;

    protected function checkAccess()
    {
        if (App::$session->user->getRole() == 3) {
            $this->page->access = false;
            new View("errors/access", $this->page);
        }
        else {
            $this->page->access = true;
        }
    }

    public function __construct(Page &$page, $params)
    {
        parent::__construct($page, $params);

        $this->component = new FacultiesComponent();
    }

    public function index()
    {
        $faculties = $this->component->getAll();

        new View("site/faculties/index", $this->page, ['faculties' => $faculties]);
    }

    public function addForm()
    {
        new View("site/faculties/addForm", $this->page);
    }

    public function editForm()
    {
        $id = $this->params['id'];

        $faculty = $this->component->getById($id);

        new View("site/faculties/editForm", $this->page, ['faculty' => $faculty]);
    }

    public function add()
    {
        $post = $this->page->getPost();

        $name = $post['name'];

        $add = $this->component->add($name);

        if ($add === true) {
            header("Location: /faculties/");
        }
    }

    public function edit()
    {
        $post = $this->page->getPost();

        $id = $post['id'];
        $name = $post['name'];

        $edit = $this->component->edit($id, $name);

        if ($edit === true) {
            header("Location: /faculties/");
        }
        else {
            new View("site/faculties/editForm", $this->page, ['faculty' => $post, 'error' => $edit]);
        }
    }

    public function delete()
    {
        $get = $this->page->getGet();

        $id = $get['id'];

        $delete = $this->component->delete($id);

        if ($delete === true) {
            header("Location: /faculties/");
        }
    }
}