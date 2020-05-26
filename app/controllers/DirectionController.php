<?php


namespace app\controllers;


use app\base\BaseController;
use app\components\DirectionsComponent;
use app\components\FacultiesComponent;
use base\Page;
use base\View\View;

class DirectionController extends BaseController
{
    private $component;

    public function __construct(Page &$page, $params)
    {
        parent::__construct($page, $params);

        $this->component = new DirectionsComponent();
    }

    public function index()
    {
        $directions = $this->component->getAll();

        new View("site/directions/index", $this->page, ['directions' => $directions]);
    }

    public function addForm()
    {
        $facultiesComponent = new FacultiesComponent();
        $faculties = $facultiesComponent->getAll();

        new View("site/directions/addForm", $this->page, ['faculties' => $faculties]);
    }

    public function editForm()
    {
        $id = $this->params['id'];

        $direction = $this->component->getById($id);

        new View("site/directions/editForm", $this->page, ['direction' => $direction]);
    }

    public function add()
    {
        $post = $this->page->getPost();

        $code = $post['code'];
        $name = $post['name'];
        $faculty_id = $post['faculty_id'];

        $add = $this->component->add($code, $name, $faculty_id);

        if ($add === true) {
            header("Location: /directions/");
        }
    }

}