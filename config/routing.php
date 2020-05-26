<?php


use app\controllers\AuthController;
use app\controllers\DirectionController;
use app\controllers\FacultiesController;
use app\controllers\SiteController;
use base\routing\Routing;

$routing = new Routing();

$routing->add('GET', '/', AuthController::class, 'authForm');
$routing->add('POST', '/', AuthController::class, 'auth');
//$routing->add('GET', '/about/', SiteController::class, 'about');
//$routing->add('GET', '/form/', SiteController::class, 'form');
//$routing->add('POST', '/form/', SiteController::class, 'postForm');

$routing->add('GET', '/faculties/', FacultiesController::class, 'index');
$routing->add('GET', '/faculties/add/', FacultiesController::class, 'addForm');
$routing->add('POST', '/faculties/add/', FacultiesController::class, 'add');
$routing->add('GET', '/faculties/edit/{id}', FacultiesController::class, 'editForm');
$routing->add('POST', '/faculties/edit/', FacultiesController::class, 'edit');
$routing->add('GET', '/faculties/delete/', FacultiesController::class, 'delete');

$routing->add('GET', '/directions/', DirectionController::class, 'index');
$routing->add('GET', '/directions/add/', DirectionController::class, 'addForm');
$routing->add('POST', '/directions/add/', DirectionController::class, 'add');
$routing->add('GET', '/directions/edit/{id}', DirectionController::class, 'editForm');
$routing->add('POST', '/directions/edit/', DirectionController::class, 'edit');
$routing->add('GET', '/directions/delete/', DirectionController::class, 'delete');