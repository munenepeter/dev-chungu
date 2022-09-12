<?php
//get routes

$router->get('', 'PagesController@index');
$router->get('projects', 'PagesController@shop');

//robots

$router->get('robots.txt', function (){
    return require __DIR__ ."/robots.txt";
});
