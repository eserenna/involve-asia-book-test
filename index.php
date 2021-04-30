<?php

session_start();

use Foundation\Router;

require __DIR__ . '/vendor/autoload.php';

Router::load(__DIR__ . '/app/routes/web.php')->direct(getUri(), getMethod());
