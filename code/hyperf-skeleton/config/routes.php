<?php

declare(strict_types=1);

use Hyperf\HttpServer\Router\Router;
use \App\Controller\LoginController;
use Qbhy\HyperfAuth\AuthMiddleware;

Router::post('/login', [LoginController::class, 'login']);
Router::get('/refresh', [LoginController::class, 'refreshToken']);
Router::get('/current', [LoginController::class, 'currentUser'], ['middleware' => [AuthMiddleware::class]]);
Router::get('/logout', [LoginController::class, 'logout'], ['middleware' => [AuthMiddleware::class]]);