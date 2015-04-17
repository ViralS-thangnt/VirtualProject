<?php namespace App\Http\Controllers\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\AddRequest;
use App\Http\Requests\DetailRequest;

use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Lib\Prototype\Interfaces\UserInterface;

use Illuminate\Http\Request;
use Input;
use Session;
use App\User;
use DB;

class UserController extends Controller {


	public function __construct(UserInterface $repo)
	{
		$this->middleware('auth');
		$this->repo = $repo;
		$this->user = \Auth::user();
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// dd('dkls');
		// access or denied
		// $allow_access = $this->repo->checkAccessDenied(FORM_LIST_USER);

		return view('user.list-user')->withData($this->repo->getDataListUser());
									// ->with('allow_access', $allow_access);
	}

	public function detail($id)
	{
		$user = $this->repo->getUserById($id);
		$role_name = $user ? getRoleNameByRoleId($user->role_id) : NULL_SYMBOL;
		$boss_name = $user ? $this->repo->getBossNameByUserId($user->boss_id) : NULL_SYMBOL;
		// dd(getRoleNameByRoleId($user->role_id), $this->repo->getBossNameByUserId($user->boss_id));

		return view('user.detail-user')->withData($user)
									->with('role_name', $role_name)
									->with('boss_name', $boss_name);

	}

	public function add()
	{
		$bosses = $this->repo->getBosses();

		return view('user.add')->withBosses($bosses);
	}

	public function addConfirm(AddRequest $request)
	{

		$boss_name = $this->repo->getBossKanaNameById(current(Input::get('boss_id')));

		return view('user.add-confirm')->with(Input::all())
										->with('boss_name', $boss_name);

	}

	public function insert()
	{
		// dump(Input::all());

		$this->repo->insertUser(Input::except('_token', '_method'));

		return view('user.add-complete')->withId(DB::getPdo()->lastInsertId());
	}

	public function topPage()
	{

		return redirect()->to($this->repo->pathRedirectTopPage());
	}

	public function confirmEdit(DetailRequest $request, $id)
	{
		
		// dd($id);
		return view('user.edit-confirm')->with(Input::all())
								->with('role_name', getRoleNameByRoleId(Input::get('role_id')))
								->with('boss_name', $this->repo->getBossNameByUserId(Input::get('boss_id')))
								->with('note', $this->repo->getCommentByUserId($id));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$bosses = $this->repo->getBosses();

		return view('user.edit-user')->withData(User::find($id))
									->withBosses($bosses);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		$this->repo->saveUserById($id, Input::except('_token', '_method'));

		return view('user.edit-success')->withId($id);
	}

	public function confirmDelete($id)
	{

		return view('user.delete-confirm')->withData($this->repo->getUserById($id))
								->with('role_name', getRoleNameByRoleId(Input::get('role_id')))
								->with('boss_name', $this->repo->getBossNameByUserId(Input::get('boss_id')))
								->with('note', $this->repo->getCommentByUserId($id));
	}

	public function delete($id)
	{

		$this->repo->deleteUserById($id);

		return view('user.delete-complete')->withId($id);
	}

	public function search(SearchRequest $request)
	{
		// dump(Input::all());
		// dd($search_query);
		$result = $this->repo->seachUserByQuery(Input::all());
		// dd($result);
		// dd('fjdkls');
		// Input::flash();
		return view('user.search-user')->withData($result);
	}

	// public function logoutSuccess()
	// {

	// 	return view('user.logout-success');
	// }

}
