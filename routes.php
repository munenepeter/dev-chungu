<?php
//get routes

$router->get('', 'PagesController@index');
$router->get('projects', 'PagesController@projects');


//scrapword
$router->get('projects/jwg/scrapword', 'ScrapwordController@index');
//get-links
$router->get('projects/jwg/get-links', 'GetLinksController@index');
//excel-to-json
$router->get('projects/jwg/excel-to-json', 'ExcelJsonController@index');
$router->post('projects/jwg/excel-to-json', 'ExcelJsonController@create');



//logs
$router->get('logs', 'SystemController@index');
//robots
$router->get('robots.txt', function (){
    return require __DIR__ ."/robots.txt";
});
