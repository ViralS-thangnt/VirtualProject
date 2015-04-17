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
			'email.required'				=>	messageValidate('メールアドレス', MESSAGE_REQUIRE), //'メールアドレス が入力されていません。Ban can phai nhap email',
			// 'email.email'					=>	'メールアドレス またはパスワードが誤っています。Email của bạn không đúng định dạng',
			'password.required'				=>	messageValidate('メールアドレス（確認）', MESSAGE_REQUIRE),//'パスワード が入力されていません。Ban can phai nhap password',
			'password.min'					=>	messageValidateLen('パスワード', '8', MESSAGE_MIN), //'メールアドレスまたは パスワード が誤っています。 Password không thể nhỏ hơn 8 ký tự',
			'password.max'					=>	messageValidateLen('パスワード', '32', MESSAGE_MAX), //'メールアドレスまたは パスワード が誤っています。 Password không thể lớn hơn 32 ký tự ',
		];
	}

}
