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
define('SEARCH_PATH', '/search');
define('SEARCH_FULL_PATH', '/search?{search_query}');

// define('LOGOUT_SUCCESS', '/logout');


// define roles
define('ROLE_ADMIN', 0);
define('ROLE_BOSS', 1);
define('ROLE_EMPLOYEE', 2);
define('ROLE_NULL', null);

define('ALL_ENABLE', 2);
define('ENABLE', 1);
define('DISABLE', 0);

define('PAGINATE_NUMBER', 10);

// define form code
define('FORM_LIST_USER', 0);
define('FORM_DETAIL_USER', 1);
define('FORM_EDIT_USER', 2);

// allow access ?
define('ALLOW_ACCESS', 1);
define('DENIED_ACCESS', 0);

// null
define('NULL_SYMBOL', '-');
define('ERROR_CLASS', 'error-cell');

define('MESSAGE_REQUIRE', '{ja_name} が入力されていません。Ban can phai nhap {ja_name}');
define('MESSAGE_MAX', '{ja_name} は $num 文字まで入力できます。{ja_name} co Do dai toi da $num ky tu');
define('MESSAGE_MIN', '{ja_name} は $num 文字以上  {ja_name} co Do dai toi thieu $num ky tu');
define('MESSAGE_EMPTY', 'を入力してください。');

define('MESSAGE_EMAIL', 'には有効な {ja_name} を入力してください。Email của bạn không đúng định dạng');
define('MESSAGE_EMAIL_CONFIRMED', '{ja_name_a} と {ja_name_b} が異なっています。Xac nhan email khong chinh xac');
define('MESSAGE_EMAIL_DUPLICATE', '{ja_name}は既に使用されています。Email bi trung ');
define('MESSAGE_EMAIL_EMPTY', '必須入力項目 {ja_name} が入力されていません。Email da khong duoc nhap');

// {ja name}には有効な電話番号を入力してください。
define('MESSAGE_PHONE_INVALID', 'には有効な {ja_name} を入力してください。So dien thoai sai dinh dang ');
define('MESSAGE_DUPLICATE', 'は既に使用されています。');
define('MESSAGE_DATETIME', '{ja_name} は {start_date} から {end_date} までの範囲で入力してください。');
define('MESSAGE_LOGIN_EMAIL', '{ja_name}またはパスワードが誤っています。');
define('MESSAGE_LOGIN_PASSWORD', '{ja_name}またはパスワードが誤っています。');
