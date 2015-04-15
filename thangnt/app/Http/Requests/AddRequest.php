<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class AddRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;//\Auth::check();//false;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'name'			=>	'required|max:16',
			'kana'			=>	'required|max:16',
			'email'			=>	'required|email|confirmed|unique:users',
			'phone'			=>	'required',
			'birthday'		=>	'required',
			'note'			=>	'required',
			'password'		=>	'required|min:8|max:32',

			// 'kana'			=>	'required',
			// 'kana'			=>	'required',
			// 'kana'			=>	'required',

		];


	}

	public function messages()
	{
		return [
			'name.required'				=>	messageValidate('名前', MESSAGE_REQUIRE),			//'名前 ' . MESSAGE_REQUIRE .'Ban can phai nhap name',

			'name.max'					=>	messageValidateLen('名前', '16', MESSAGE_MAX),		//'名前 は16文字まで入力できます。Name co Do dai toi da 16 ky tu',

			'kana.required'				=>	messageValidate('名前（カナ）', MESSAGE_REQUIRE),		//'名前（カナ）' . MESSAGE_REQUIRE . ' .Ban can phai nhap kana name',
			'kana.max'					=>	messageValidateLen('名前（カナ）', 32, MESSAGE_MAX), //'名前 は16文字まで入力できます。Kana name co Do dai toi da 16 ky tu',


			'email.required'			=>	messageValidate('メールアドレス', MESSAGE_REQUIRE), 	//'メールアドレス ' . MESSAGE_REQUIRE . ' .Ban can phai nhap email',
			'email.email'				=>	'メールアドレス またはパスワードが誤っています。Email của bạn không đúng định dạng',
			'email.confirmed'			=>	'必須入力項目 メールアドレス（確認）が入力されていません。Xac nhan email khong chinh xac',
			'email.unique'				=>	'メールアドレスは既に使用されています。Email phai Unique nhe',

			'phone.required'			=>	messageValidate('電話番号', MESSAGE_REQUIRE),			//'電話番号 ' . MESSAGE_REQUIRE . 'Ban can phai nhap phone',
			'birthday.required'			=>	messageValidate('生年月日', MESSAGE_REQUIRE),			//'生年月日 ' . MESSAGE_REQUIRE . ' .Ban can phai nhap birthday',
			'note.required'				=>	messageValidate('ノート', MESSAGE_REQUIRE),			//'ノート ' . MESSAGE_REQUIRE . ' . Ban can phai nhap note',

			'password.required'			=>	messageValidate('パスワード', MESSAGE_REQUIRE), 		//'パスワード ' . MESSAGE_REQUIRE . ' .Ban can phai nhap password',
			'password.min'				=>	messageValidateLen('パスワード', 16, MESSAGE_MIN),	//'メールアドレスまたは パスワード が誤っています。 Password không thể nhỏ hơn 8 ký tự',
			'password.max'				=>	messageValidateLen('パスワード', 32, MESSAGE_MAX),	//'メールアドレスまたは パスワード が誤っています。 Password không thể lớn hơn 32 ký tự ',
		];
	}

	// Method [validateConfirm] does not exist.
	// at Validator->__call('validateConfirm', array('email', 'toanthang1@gmail.com', array(), object(Validator))) in Validator.php line 372
	// Custom in Validator.php
	// public function validateConfirm()
	// {
	// 	dd('djklslfs');
	// }
}
