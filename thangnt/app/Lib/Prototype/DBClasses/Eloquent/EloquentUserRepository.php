<?php namespace App\Lib\Prototype\DBClasses\Eloquent;

use Illuminate\Contracts\Auth\Guard;
use App\Lib\Prototype\Interfaces\UserInterface;
use App\Lib\Prototype\BaseClasses\AbstractEloquentRepository;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

use App\User;
use Session;
use Illuminate\Database\Eloquent\Collection;

class EloquentUserRepository extends AbstractEloquentRepository implements UserInterface
{
    public function __construct(User $model)
    {
        $this->model = $model;
        $this->user = \Auth::user();
    }

    public function getDataListUser()
    {
        $data = $this->model->whereEnable(ENABLE);
        // dd();
// dump(\Auth::user()->id);
        switch (\Auth::user()->role_id) {
            case ROLE_BOSS:

                $data = $data->where('boss_id', \Auth::user()->id);
                break;
            case ROLE_ADMIN:
                
                break;
            
            default:

                return null;
                break;
        }
                
        $data = $data->orderBy('updated_at', 'desc')     // Builder
                        ->paginate(PAGINATE_NUMBER);

        $data->setPath('');

        return $data;
    }

    public function seachUserByQuery($input)
    {

        $result = User::where('enable', ENABLE)->orderBy('updated_at', 'desc');
// dump($result->get());
        if(!empty($input['name']))
            $result = $result->querySearchName($input['name']);

        if(!empty($input['kana']))
            $result = $result->querySearchKana($input['kana']);

        if(!empty($input['phone']))
            $result = $result->querySearchPhone($input['phone']);

        if(!empty($input['start']))
            $result = $result->querySearchDate($input['start'], null);

        if(!empty($input['end']))
            $result = $result->querySearchDate(null, $input['end']);

        if(!empty($input['email']))
            $result = $result->querySearchEmail($input['email']);

        if(\Auth::user()->role_id == ROLE_BOSS)
            $result = $result->where('boss_id', \Auth::user()->id);

        $roles = [];

        if(isset($input['boss']))
            array_push($roles, ROLE_BOSS);

        if(isset($input['admin']))
            array_push($roles, ROLE_ADMIN);

        if(isset($input['employee']))
            array_push($roles, ROLE_EMPLOYEE);

        $result = $result->querySearchRoles($roles)->get();

        // Get items for Paginate
        $page = isset($input['page']) ? $input['page'] : 1;
        $items = $result->slice(($page - 1) * PAGINATE_NUMBER, PAGINATE_NUMBER);

        // Paginate
        $pagination = new LengthAwarePaginator($items, count($result), PAGINATE_NUMBER, Paginator::resolveCurrentPage());
        $pagination->setPath('');

        // dd($pagination);
        return $pagination;
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
        // dd($id);
        $user = $this->model->find($id);

        // $boss = null;
        if($user and $user->boss_id) 
        {
            $boss = $this->model->find($id);
            return $boss->kana . '(' . $boss->name . ')';
        }

        return null;
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
        // dump($input);
        // dd($user);
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
        // soft delete
        $user = $this->model->find($id);

        if($user)
        {
            $user->enable = DISABLE;
            $user->save();
        }
        
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
