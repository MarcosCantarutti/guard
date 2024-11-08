<?php

use Core\Route;
use App\Controller\IndexController;
use App\Controller\LoginController;
use App\Controller\LogoutController;
use App\Controller\RegisterController;
use App\Middlewares\AuthMiddleware;
use App\Middlewares\GuestMiddleware;
use App\Controller\Contatos;

(new Route())
    // não autenticado
    ->get('/', IndexController::class, GuestMiddleware::class)
    ->get('/login', [LoginController::class, 'index'], GuestMiddleware::class)
    ->post('/login', [LoginController::class, 'login'], GuestMiddleware::class)
    ->get('/registrar', [RegisterController::class, 'index'], GuestMiddleware::class)
    ->post('/registrar', [RegisterController::class, 'register'], GuestMiddleware::class)
    // autenticado
    ->get('/logout', LogoutController::class, AuthMiddleware::class)
    ->get('/contatos', Contatos\IndexController::class, AuthMiddleware::class)
    ->get('/contatos/criar', [Contatos\CriarController::class, 'index'], AuthMiddleware::class)
    ->post('/contatos/criar', [Contatos\CriarController::class, 'store'], AuthMiddleware::class)
    ->put('/contatos', Contatos\AtualizarController::class, AuthMiddleware::class)
    ->delete('/contatos', Contatos\DeleteController::class, AuthMiddleware::class)

    ->get('/confirmar', [Contatos\VisualizarController::class, 'confirmar'], AuthMiddleware::class)
    ->post('/mostrar', [Contatos\VisualizarController::class, 'mostrar'], AuthMiddleware::class)
    ->get('/esconder', [Contatos\VisualizarController::class, 'esconder'], AuthMiddleware::class)

    ->run();
