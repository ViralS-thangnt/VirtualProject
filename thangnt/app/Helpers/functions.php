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