<?php
//get routes

$router->get('', 'PagesController@index');
$router->get('projects', 'PagesController@shop');


//scrapword
$router->get('projects/jwg/scrapword', 'ScrapwordController@index');





//logs
$router->get('logs', 'SystemController@index');
//robots
$router->get('robots.txt', function (){
    return require __DIR__ ."/robots.txt";
});
