<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'password', 'kana', 'role_id', 'email', 'phone', 'note', 'boss_id', 'birthday', 'enable',
								'created_at', 'updated_at'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['remember_token'];




	public function scopeQuerySearchName($query, $input)
	{

		return $query->where('name', 'like', '%' . $input . '%');
	}

	public function scopeQuerySearchKana($query, $input)
	{
		
		return $query->where('kana', 'like', '%' . $input . '%');
	}

	// public function scopeQuerySearchBirthday($query, $input)
	// {
		
	// 	return $query->where('birthday', 'like', '%' . $input . '%');
	// }

	public function scopeQuerySearchEmail($query, $input)
	{
		
		return $query->where('email', 'like', '%' . $input . '%');
	}

	public function scopeQuerySearchPhone($query, $input)
	{
		
		return $query->where('phone', 'like', '%' . $input . '%');
	}

	public function scopeQuerySearchDate($query, $start_date, $end_date)
	{
		$query = $query->where('birthday', '>=', $start_date)
						->where('birthday', '<=', $end_date);


		return $query;
	}

	public function scopeQuerySearchBoss($query)
	{
		
		return $query->orWhere('role_id', ROLE_BOSS);
	}

	public function scopeQuerySearchAdmin($query)
	{
		
		return $query->orWhere('role_id', ROLE_ADMIN);
	}

	public function scopeQuerySearchEmployee($query)
	{
		
		return $query->orWhere('role_id', ROLE_EMPLOYEE);
	}


}
