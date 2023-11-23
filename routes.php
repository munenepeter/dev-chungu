<?php

use Chungu\Core\Mantle\Router;


//static pages
$router->get('', 'PagesController@index');
$router->get('services', 'PagesController@services');
//get-links
$router->get('projects/automation/get-links', 'PagesController@getLinks');
//board-room
$router->get('projects/personal/board-room', 'PagesController@boardRoom');
//poems
$router->get('projects/personal/poems', 'PagesController@poems');
//case-law-search
$router->get('projects/law/case-law-search', 'PagesController@caseLaw');

$router->post('index/intent/sendqoute', 'ClientQouteController@sendQoute');

//projects
$router->get('projects', 'ProjectsController@index');


//scrapword
$router->get('projects/automation/scrapword', 'ScrapwordController@index');
$router->post('projects/automation/scrapword', 'ScrapwordController@add');
$router->post('projects/automation/scrapword/theme', 'ScrapwordController@theme');

//excel-to-json
$router->get('projects/automation/excel-to-json', 'ExcelJsonController@index');
$router->post('projects/automation/excel-to-json', 'ExcelJsonController@create');
$router->get('projects/automation/excel-to-json/download', 'ExcelJsonController@download');
$router->get('projects/automation/excel-to-json/view/{file}', 'ExcelJsonController@view');

//parser
$router->get('projects/automation/parser', 'ParserController@index');
$router->post('projects/automation/parser', 'ParserController@parse');

//api-demo
$router->get("projects/learning/api", 'DevsController@index');
$router->get("projects/learning/api/users", 'DevsController@users');
$router->get("projects/learning/api/users/{id}", 'DevsController@show');
$router->post("projects/learning/api/signin", 'DevsController@signin');
$router->post("projects/learning/api/users/update/{id}", 'DevsController@update');
$router->post("projects/learning/api/users/delete/{id}", 'DevsController@delete');


//logs
$router->get(':system:/logs', 'SystemController@index');
$router->post(':system:/logs/delete', 'SystemController@deleteLogs');
//robots
$router->get('robots.txt', function () {
    return require __DIR__ . "/robots.txt";
});
