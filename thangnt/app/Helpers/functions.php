<?php
function checkPermission()
{
	
}

function getRoleNameByRoleId($role_id)
{
	switch ($role_id) {
		case ROLE_ADMIN:
			$role_name = 'Admin';
			break;
		case ROLE_BOSS:
			$role_name = 'Boss';
			break;
		default:
			$role_name = 'Employee';
			break;
	}

	return $role_name;
}

function messageValidate($control_name, $message)
{
	// $result = str_replace('$control_name', $control_name, $message);
	$result = str_replace('$control_name', $control_name, $message);

	return $result;
}

function messageValidateLen($control_name, $num, $message)
{
	$result = str_replace('$control_name', $control_name, $message);
	$result = str_replace('$num', $num, $result);

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