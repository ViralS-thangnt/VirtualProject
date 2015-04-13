<?php namespace App\Http\Requests;

use App\Http\Requests\Request;


class UserRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		// Alert !! Not authen
		// Require change to false value
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'email'				=>	'required',
			'password'          =>  'required|min:8|max:32',
		];
	}

	public function messages()
	{
		return [
			'email.required'				=>	'Ban can phai nhap email',
			// 'email.email'					=>	'Email của bạn không đúng định dạng',
			'password.required'				=>	'Ban can phai nhap password',
			'password.min'					=>	'Password không thể nhỏ hơn 8 ký tự',
			'password.max'					=>	'Password không thể lớn hơn 32 ký tự ',
		];
	}

}
