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

// confirm edit user
post(EDIT_CONFIRM_PATH, array('as'	=> 'user.update.confirm', 'uses'	=>	'User\UserController@confirmEdit'));

// update edit user
post(EDIT_USER_FULL_PATH, array('as'	=> 'user.update', 'uses'	=>	'User\UserController@update'));

// confirm delete user
post(DELETE_CONFIRM_PATH, array('as'	=> 'user.delete.confirm', 'uses'	=>	'User\UserController@confirmDelete'));

// delete user
post(DELETE_COMPLETE_PATH, array('as'	=> 'user.delete', 'uses'	=>	'User\UserController@delete'));

// add user
get(ADD_USER_PATH, array('as'	=> 'user.add', 'uses'	=>	'User\UserController@add'));

// confirm add user 
post(ADD_CONFIRM_PATH, array('as'	=> 'user.add.confirm', 'uses'	=>	'User\UserController@addConfirm'));

// add user
post(ADD_COMPLETE_PATH, array('as'	=> 'user.add.confirm', 'uses'	=>	'User\UserController@insert'));

// edit user
get(SEARCH_PATH, array('as'	=> 'user.search', 'uses'	=>	'User\UserController@search'));


// // edit user
// get(LOGOUT_SUCCESS, array('as'	=> 'user.logout-success', 'uses'	=>	'User\UserController@logoutSuccess'));

// get(BACK_TO_PREVIOUS_PAGE, array('as' => 'redirect.back', 'uses' => 'User\UserController@backToPreviousPage'));
// 
// get('logout-success', array('as'	=>	'logout-success', 'uses'	=>	'User\UserController@logout'));

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

