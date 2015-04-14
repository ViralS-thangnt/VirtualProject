<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// get(LOGIN_PATH)
// top page
get(TOP_PAGE, array('as' =>	'top',	'uses'	=>	'User\UserController@topPage'));

// list users
get(LIST_USER_PATH, array('as' => 'user.list', 'uses'	=>	'User\UserController@index'));

// detail user
get(DETAIL_EMPLOYEE_FULL_PATH, array('as' => 'user.detail', 'uses'	=>	'User\UserController@detail'));

// edit user
get(EDIT_USER_FULL_PATH, array('as'	=> 'user.edit', 'uses'	=>	'User\UserController@edit'));


// get(BACK_TO_PREVIOUS_PAGE, array('as' => 'redirect.back', 'uses' => 'User\UserController@backToPreviousPage'));
// 
// get('logout-success', array('as'	=>	'logout-success', 'uses'	=>	'User\UserController@logout'));


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

