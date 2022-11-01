<?php
//get routes edited to test workflow

$router->get('', 'PagesController@index');
$router->get('projects', 'PagesController@projects');
$router->get('about-us', 'PagesController@about');


//scrapword
$router->get('projects/jwg/scrapword', 'ScrapwordController@index');
$router->post('projects/jwg/scrapword', 'ScrapwordController@add');
$router->post('projects/jwg/scrapword/theme', 'ScrapwordController@theme');
//get-links
$router->get('projects/jwg/get-links', 'GetLinksController@index');
//excel-to-json
$router->get('projects/jwg/excel-to-json', 'ExcelJsonController@index');
$router->post('projects/jwg/excel-to-json', 'ExcelJsonController@create');
$router->get('projects/jwg/excel-to-json/download', 'ExcelJsonController@download');
$router->get('projects/jwg/excel-to-json/view/{file}', 'ExcelJsonController@view');



$router->get("projects/devs-talk/api", 'DevsController@index');
$router->get("projects/devs-talk/api/users", 'DevsController@users');
$router->get("projects/devs-talk/api/users/{id}", 'DevsController@show');
$router->post("projects/devs-talk/api/signin", 'DevsController@signin');
$router->post("projects/devs-talk/api/users/update/{id}", 'DevsController@update');
$router->post("projects/devs-talk/api/users/delete/{id}", 'DevsController@delete');


//board-room
$router->get('projects/personal/board-room', 'BoardRoomController@index');
//case-law-search
$router->get('projects/law/case-law-search', 'CaseLawController@index');


//logs
$router->get(':a:/logs', 'SystemController@index');
//robots
$router->get('robots.txt', function (){
    return require __DIR__ ."/robots.txt";
});
