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
        // $this->user = \Auth::user();
    }

    public function getUserByIdAndRole($id, $role_id)
    {

        $user = User::where('id', $id)->where('enable', ENABLE);

        if($user)
        {
            return $user->first();
        }
        
        return null;

        // return User::find($id)->where('enable', ENABLE)->get();
    }

    

}
