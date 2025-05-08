<?php

$page = basename($_SERVER['REQUEST_URI'] ?? '');

$routes = [
    'home'          => 'views/home_view.php', 
    'writing_lucy'  => 'views/home_view.php',
    'register'      => 'views/register_view.php',
    'login'         => 'views/login_view.php',
    'post'          => 'views/post_view.php',
    'logout'        => 'views/logout_view.php',
    'settings'      => 'views/settings_view.php',
];

if (array_key_exists($page, $routes)) {
    require $routes[$page];
} 
else {
    http_response_code(404);
}