<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api/{username:[A-Za-z0-9_\-]+}'], function () use ($router) {
    $router->get('/', 'ProfileController@index');
    $router->get('/educations', 'EducationController@index');
    $router->get('/experiences', 'ExperienceController@index');
    $router->get('/achievements', 'AchievementController@index');
    $router->get('/skills', 'SkillController@index');
    $router->get('/portfolios', 'PortfolioController@index');
});
