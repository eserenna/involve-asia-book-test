<?php

use Foundation\Router;
use App\Controllers\BookController;
use App\Controllers\BookReviewController;

$router = new Router();
// $bookController = new BookController();

$router->get('', [BookController::class, 'getList']);
$router->get('add', [BookController::class, 'getAdd']);
$router->post('add', [BookController::class, 'postAdd']);
$router->get('info', [BookController::class, 'getInfo']);
$router->get('update', [BookController::class, 'getUpdate']);
$router->post('update', [BookController::class, 'postUpdate']);
$router->get('delete', [BookController::class, 'postDelete']);

$router->post('review/add', [BookReviewController::class, 'postAdd']);
$router->get('review/delete', [BookReviewController::class, 'postDelete']);
