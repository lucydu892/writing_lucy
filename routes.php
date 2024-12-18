<?php

$page = basename($_SERVER['REQUEST_URI'] ?? '');

$routes = [
    'home'          => 'views/home_view.php', 
    'writing_lucy'  => 'views/home_view.php',
    
];

if (array_key_exists($page, $routes)) {
    require $routes[$page];
} 
else {
    require 'views/404_view.php';
    http_response_code(404);
}