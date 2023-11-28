<?php

use MiladRahimi\PhpRouter\Router;
use Src\Controllers\FeedbackController;
use Src\Controllers\MainController;
use Src\Controllers\ReservationCarController;

require_once 'vendor/autoload.php';

session_start();

ORM::configure('mysql:host=database;dbname=docker');
ORM::configure('username', 'docker');
ORM::configure('password', 'docker');


$router = Router::create();
$router->setupView('views');

$router->get('/', [MainController::class, 'indexPage']);
$router->post('/create', [ReservationCarController::class, 'create']);
$router->post('/feedback', [FeedbackController::class, 'feedback']);

$router->get('/blog-posts', [MainController::class, 'blogpostsPage']);

$router->get('/blog-single-post', [MainController::class, 'postPage']);

$router->get('/error404', [MainController::class, 'errorPage']);

$router->dispatch();
