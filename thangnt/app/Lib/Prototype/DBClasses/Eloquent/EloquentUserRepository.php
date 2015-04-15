<?php namespace App\Lib\Prototype\DBClasses\Eloquent;

use Illuminate\Contracts\Auth\Guard;
use App\Lib\Prototype\Interfaces\UserInterface;
use App\Lib\Prototype\BaseClasses\AbstractEloquentRepository;

use App\User;
use Session;
// use Constant;


class EloquentUserRepository extends AbstractEloquentRepository implements UserInterface
{
    public function __construct(User $model)
    {
        $this->model = $model;
        $this->user = \Auth::user();
    }

    public function getDataListUser()
    {
        $data = User::orderBy('updated_at', 'desc')
                    ->paginate(10)
                    ;

        return $data;
    }

    public function getUserById($id, $enable = ENABLE)
    {
        $user = $this->model->where('id', $id);
        
        if($enable != ALL_ENABLE and $user != null)
        {
            $user = $user->where('enable', $enable);
        }

        $user = $user->first();

        return $user;
    }

    public function getBosses()
    {
        $bosses = $this->model->where('role_id', ROLE_BOSS);
        if($bosses)

            return $bosses->get();

        return null;
    }

    public function getBossKanaNameById($id)
    {
        if($id == -1)

            return NULL_SYMBOL;

        $boss = $this->model->where('role_id', ROLE_BOSS)
                            ->where('id', $id);
        if($boss)
        {   
            return $boss->first()->kana;
        }

        return NULL_SYMBOL;
    }

    public function getBossNameByUserId($id)
    {
        // $user = $this->model->find($id);

        // if($user and $user->boss_id) 
        // {

        // }

        // return '';
    }

    public function getBossNameByBossId($boss_id)
    {   
        $boss = $this->model->find($boss_id);
        if($boss)

            return $boss->name;

        return NULL_SYMBOL;
    }

    public function getCommentByUserId($user_id)
    {
        $user = $this->model->find($user_id);
        if($user and $user->boss_id == $this->user->id)
        {
            return $user->note;
        }

        return NULL_SYMBOL;
    }

    public function saveUserById($user_id, $input)
    {
        $user = $this->model->find($user_id);
        $user->fill($input);

        $user->save();
    }

    public function pathRedirectTopPage()
    {
        $user = $this->user;
        $path = '';

        switch ($user->role_id) {
            case ROLE_BOSS:
            case ROLE_ADMIN:

                $path = LIST_USER_PATH;

                break;
            case ROLE_EMPLOYEE:

                $path = DETAIL_EMPLOYEE_PATH . $user->id . '/detail';

                break;

            default:
                break;
        }

        return $path;
    }

    public function checkAccessDenied($current_form)
    {
        $role_id = $this->user->role_id;

        switch ($current_form) {
            case FORM_LIST_USER:
                $allow_access = ($role_id == ROLE_EMPLOYEE) ? DENIED_ACCESS : ALLOW_ACCESS;
                break;
            
            default:
                $allow_access = DENIED_ACCESS;
                break;
        }

        return $allow_access;
    }

    public function deleteUserById($id)
    {
        // dd('delete id : ' . $id);
        $this->model->find($id)->delete();
    }

    public function insertUser($input)
    {
        // dump($input);
        if(isset($input['password']))
            $input['password'] = bcrypt($input['password']);

        $this->model = new User;
        $this->model->fill($input);
        // dd($this->model);
        $this->model->save();
    }

}
