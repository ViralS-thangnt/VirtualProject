<?php namespace App\Http\Controllers\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Lib\Prototype\Interfaces\UserInterface;

use Illuminate\Http\Request;
use Input;
use Session;
use App\User;



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
		// $data = User::orderBy('id')
		// 			->paginate(10)
		// 			;

		// {!! $data->render() !!}
		// dd($data);

		return view('user.list-user')->withData($this->repo->getDataListUser());

	}

	public function detail($id)
	{
		// Get detail user
		// $data = $this->repo->getUserById($id);

		// // $data = $this->repo->getById($id);
		// dd($data);
		//User::find($id)
		// $this->repo->getUserById($id)
		//, $this->user->role_id

		return view('user.detail-user')->withData($this->repo->getUserByIdAndRole($id, ROLE_BOSS));
	}

	public function topPage()
	{

		return redirect()->to($this->repo->pathRedirectTopPage());
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// dd('This is edit page');
		// dd($id);

		return view('user.edit-user')->withData(User::find($id));

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	// public function backToPreviousPage()
	// {
	// 	// return redirect()->back();
	// 	// header("Location:javascript://history.go(-1)");
	// 	// header('Location: ' . $_SERVER['HTTP_REFERER']);

	// 	return ;
	// }

}
