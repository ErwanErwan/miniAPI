<?php

use MiniMVC\Router\Router;

Router::get('user/:id', 'usersController', 'get');

Router::post('user', 'usersController', 'create');