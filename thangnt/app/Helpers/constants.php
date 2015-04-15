<?php

define('MESSAGE_USER_CREDENTIALS_ERROR', 'These credentials do not match our records.');
define('LOGIN_PATH', '/auth/login');
define('LIST_USER_PATH', 'all');
define('BACK_TO_PREVIOUS_PAGE', 'back');
define('LOGOUT', '/auth/logout');

// define detail user path
// /member/{id}/detail
define('DETAIL_EMPLOYEE_PATH', '/member/');
define('DETAIL_EMPLOYEE_FULL_PATH', '/member/{id}/detail');

// top page
// / or /?page={page}
define('TOP_PAGE', '/');

// define edit path
define('EDIT_USER_FULL_PATH', '/member/{id}/edit');
define('EDIT_CONFIRM_PATH', '/member/{id}/edit/conf');
define('EDIT_COMPLETE_PATH', '/member/{id}/edit/comp');

// define delete path
define('DELETE_PATH', '/member/{id}/delete');
define('DELETE_CONFIRM_PATH', '/member/{id}/delete/conf');
define('DELETE_COMPLETE_PATH', '/member/{id}/delete/comp');

// define add path
define('ADD_USER_PATH', '/add');
define('ADD_CONFIRM_PATH', '/add/conf');
define('ADD_COMPLETE_PATH', '/add/comp');

// define search path
define('SEARCH_PATH', '/search?{search_query}');

// define roles
define('ROLE_ADMIN', 0);
define('ROLE_BOSS', 1);
define('ROLE_EMPLOYEE', 2);
define('ROLE_NULL', null);

define('ALL_ENABLE', 2);
define('ENABLE', 1);
define('DISABLE', 0);

// define form code
define('FORM_LIST_USER', 0);
define('FORM_DETAIL_USER', 1);
define('FORM_EDIT_USER', 2);

// allow access ?
define('ALLOW_ACCESS', 1);
define('DENIED_ACCESS', 0);

// 
define('NULL_SYMBOL', '-');


