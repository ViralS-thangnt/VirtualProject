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

    public function getUserByIdAndRole($id, $role_id, $enable = ENABLE)
    {
        $user = User::where('id', $id);

        if($enable != ALL_ENABLE)
            
            $user->where('enable', $enable);

        if($user)
        {
            return $user->first();
        }
        
        return null;

        // return User::find($id)->where('enable', ENABLE)->get();
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

}
