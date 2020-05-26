<?php

namespace app\controllers;

use app\base\BaseController;
use base\Page;
use base\View\View;

class SiteController extends BaseController
{

    public function __construct(Page &$page, $params)
    {
        parent::__construct($page, $params);
    }

    public function index()
    {
        new View("site/index", $this->page);
    }

    public function about()
    {
        $text = "Это текст из контроллера";
        $array = ['name', 'surname'];

        new View("site/about", $this->page, [
            'param' => $text,
            'array' => $array
        ]);
    }

    public function form()
    {
        new View("site/form", $this->page);
    }

    public function postForm()
    {
        $post = $this->page->getPost();
        var_dump($post);
    }
}