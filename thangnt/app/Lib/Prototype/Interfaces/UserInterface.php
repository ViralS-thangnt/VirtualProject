<?php
namespace App\Lib\Prototype\Interfaces;

use App\Lib\Prototype\Interfaces\BaseIntreface;

interface UserInterface extends BaseInterface
{
    public function getUserByIdAndRole($id, $role_id);
}
