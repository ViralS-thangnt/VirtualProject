<?php
function checkPermission()
{
	return (\Auth::user()->role_id != ROLE_EMPLOYEE) ? true : false;
}

function checkOwnPermission($user_id)
{
	return (\Auth::user()->role_id == $user_id) ? true : false;
}

function getRoleNameByRoleId($role_id)
{
	// dump($role_id);
	switch ($role_id) {
		case ROLE_ADMIN:
			$role_name = '管理者';
			// $role_name = ROLE_ADMIN;

			break;
		case ROLE_BOSS:
			$role_name = 'BOSS';
			// $role_name = ROLE_BOSS;

			break;
		default:
			$role_name = '従業員';
			break;
	}

	return $role_name;
}

function messageValidate($control_name, $message)
{
	// $result = str_replace('$control_name', $control_name, $message);
	$result = str_replace('{ja_name}', $control_name, $message);

	return $result;
}

function messageValidateLen($control_name, $num, $message)
{
	$result = str_replace('{ja_name}', $control_name, $message);
	$result = str_replace('$num', $num, $result);

	return $result;
}

function messageValidateDuplicate($control_a, $control_b, $message)
{
	$result = str_replace('{ja_name_a}', $control_a, $message);
	$result = str_replace('{ja_name_b}', $control_b, $result);

	return $result;
}

function messageValidateMulti($message, $control_name_array)
{
	// $result = str_replace('$control_name', $control_name, $message);
	// $result = str_replace('$control_name', $control_name, $message);

	foreach ($control_name_array as $value) {
		$result = str_replace($value, '', $message);
	}

	return $message;
}

function messageValidateEmpty($input, $message)
{

}

function messageValidateDateTime($control_name, $start, $end, $message)
{
	$result = str_replace('{ja_name}', $control_name, $message);
	$result = str_replace('{start_date}', $start, $result);
	$result = str_replace('{end_date}', $end, $result);
	// $result = str_replace('{ja_name_b}', $control_b, $result);
	
	return $result;

}

function checkGetValue($name, $default_value = '')
{
	return (isset($_GET[$name]) and !empty($_GET[$name])) ? $_GET[$name] : '';
}

function checkErrorCell($control_name, $errors)
{
	//error-cell
	if($errors->has($control_name))
	{
		return ERROR_CLASS;
	}

	return '';
}

function checkLabelError($control_name, $errors)
{
	if(isset($errors) and $errors->get($control_name))
	{
		echo '<section class="error-message">' .  current($errors->get($control_name)) . '</section>';
	}
}

function logError($message)
{
	Log::error($message);
}


