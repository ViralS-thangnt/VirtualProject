<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class LoginRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
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
			'email.required'				=>	'メールアドレス が入力されていません。Ban can phai nhap email',
			// 'email.email'					=>	'メールアドレス またはパスワードが誤っています。Email của bạn không đúng định dạng',
			'password.required'				=>	'パスワード が入力されていません。Ban can phai nhap password',
			'password.min'					=>	'メールアドレスまたは パスワード が誤っています。 Password không thể nhỏ hơn 8 ký tự',
			'password.max'					=>	'メールアドレスまたは パスワード が誤っています。 Password không thể lớn hơn 32 ký tự ',
		];
	}

}
