<?php
//get routes

$router->get('', 'PagesController@index');
$router->get('projects', 'PagesController@projects');
$router->get('about-us', 'PagesController@about');


//scrapword
$router->get('projects/jwg/scrapword', 'ScrapwordController@index');
$router->post('projects/jwg/scrapword', 'ScrapwordController@add');
//get-links
$router->get('projects/jwg/get-links', 'GetLinksController@index');
//excel-to-json
$router->get('projects/jwg/excel-to-json', 'ExcelJsonController@index');
$router->post('projects/jwg/excel-to-json', 'ExcelJsonController@create');
$router->get('projects/jwg/excel-to-json/download', 'ExcelJsonController@download');
$router->get('projects/jwg/excel-to-json/view/{file}', 'ExcelJsonController@view');



$router->get("api/devs-talk", 'Devs@index');
$router->get("api/devs-talk/users", 'Devs@users');
$router->get("api/devs-talk/users/{id}", 'Devs@show');
$router->post("api/devs-talk/signin", 'Devs@signin');
$router->post("api/devs-talk/users/update/{id}", 'Devs@update');
$router->post("api/devs-talk/users/delete/{id}", 'Devs@delete');


//logs
$router->get(':a:/logs', 'SystemController@index');
//robots
$router->get('robots.txt', function (){
    return require __DIR__ ."/robots.txt";
});
