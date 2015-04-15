<?php
namespace App\Lib\Prototype\Interfaces;

use App\Lib\Prototype\Interfaces\BaseIntreface;

interface UserInterface extends BaseInterface
{
    // public function getUserByIdAndRole($id, $role_id);
    public function getUserById($id, $enable = ENABLE);
    public function getBosses();
    public function getBossKanaNameById($id);
    public function insertUser($input);

    // getUserById
    public function pathRedirectTopPage();
    public function getDataListUser();
    public function checkAccessDenied($current_form);
    public function getBossNameByUserId($id);
    public function getBossNameByBossId($boss_id);
    public function getCommentByUserId($user_id);
    public function saveUserById($user_id, $input);
}
