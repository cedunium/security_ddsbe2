<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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
// unsecure routes
$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('/users',['uses' => 'UserController@getUsers']);
});

// more simple routes
$router->get('/users', 'UserController@index');   // shows all the present data
$router->post('/users', 'UserController@addUser');  // add new user to the database
$router->get('/users/{id}', 'UserController@show'); // locating the user using the id
$router->put('/users/{id}', 'UserController@update'); // update user record all values
$router->patch('/users/{id}', 'UserController@update'); // update the user's data specific part 
$router->delete('/users/{id}', 'UserController@delete'); // delete data

$router->get('/usersjob','UserJobController@index'); // shows all the users job
$router->get('/usersjob/{id}','UserJobController@show'); // get users job by id

//$router->get('login', 'UserController@showlogin'); // this is in the login page
//$router ->post('validate', 'UserController@result'); // configured to the login button