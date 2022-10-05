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



$router->get("api/devs-talk", 'DevsController@index');
$router->get("api/devs-talk/users", 'DevsController@users');
$router->get("api/devs-talk/users/{id}", 'DevsController@show');
$router->post("api/devs-talk/signin", 'DevsController@signin');
$router->post("api/devs-talk/users/update/{id}", 'DevsController@update');
$router->post("api/devs-talk/users/delete/{id}", 'DevsController@delete');


//logs
$router->get(':a:/logs', 'SystemController@index');
//robots
$router->get('robots.txt', function (){
    return require __DIR__ ."/robots.txt";
});
