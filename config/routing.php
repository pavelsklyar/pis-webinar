<?php


use app\controllers\AuthController;
use app\controllers\DirectionController;
use app\controllers\FacultiesController;
use app\controllers\SiteController;
use app\controllers\UsersController;
use base\routing\Routing;

$routing = new Routing();

$routing->add('GET', '/', AuthController::class, 'authForm');
$routing->add('POST', '/', AuthController::class, 'auth');
//$routing->add('GET', '/about/', SiteController::class, 'about');
//$routing->add('GET', '/form/', SiteController::class, 'form');
//$routing->add('POST', '/form/', SiteController::class, 'postForm');

$routing->add('GET', '/users/', UsersController::class, 'index', true);
$routing->add('GET', '/users/add/', UsersController::class, 'registerForm', true);
$routing->add('POST', '/users/add/', UsersController::class, 'register', true);
$routing->add('GET', '/users/logout/', UsersController::class, 'logout', true);

$routing->add('GET', '/faculties/', FacultiesController::class, 'index', true);
$routing->add('GET', '/faculties/add/', FacultiesController::class, 'addForm', true);
$routing->add('POST', '/faculties/add/', FacultiesController::class, 'add', true);
$routing->add('GET', '/faculties/edit/{id}', FacultiesController::class, 'editForm', true);
$routing->add('POST', '/faculties/edit/', FacultiesController::class, 'edit', true);
$routing->add('GET', '/faculties/delete/', FacultiesController::class, 'delete', true);

$routing->add('GET', '/directions/', DirectionController::class, 'index', true);
$routing->add('GET', '/directions/add/', DirectionController::class, 'addForm', true);
$routing->add('POST', '/directions/add/', DirectionController::class, 'add', true);
$routing->add('GET', '/directions/edit/{id}', DirectionController::class, 'editForm', true);
$routing->add('POST', '/directions/edit/', DirectionController::class, 'edit', true);
$routing->add('GET', '/directions/delete/', DirectionController::class, 'delete', true);