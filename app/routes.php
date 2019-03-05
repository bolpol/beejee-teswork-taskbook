<?php

use Core\Routing\Router as Router;

Router::route('GET /auth/login/', [new \App\Controllers\Auth\LoginController(), 'index']);
Router::route('GET /auth/login/init', [new \App\Controllers\Auth\LoginController(), 'login']);

Router::route('GET /', array(new \App\Controllers\TaskBookController(), 'index'));

Router::route('GET /task/new/', array(new \App\Controllers\TaskBookController(), 'new_page'));
Router::route('POST /task/new/', array(new \App\Controllers\TaskBookController(), 'create'));

Router::route('GET /task/update/', array(new \App\Controllers\TaskBookController(), 'update_page'));
Router::route('POST /task/update/', array(new \App\Controllers\TaskBookController(), 'update'));

Router::route('GET /error_404/', array(new \App\Controllers\ErrorController(), '_404'));
Router::route('GET /error_403/', array(new \App\Controllers\ErrorController(), '_403'));

Router::route('GET /test/user/', function (){
    (new \App\Controllers\UserController())->paginate();
});

return;


