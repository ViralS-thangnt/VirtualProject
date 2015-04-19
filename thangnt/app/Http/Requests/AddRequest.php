<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Input;

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

		if(!(Input::get('role_id') == ROLE_BOSS and Input::get('boss_id') == DONT_SELECT))
			// Input::merge(['boss_id' => DONT_SELECT]);
			Input::merge(['boss_id'	=> Input::get('boss_id')]);	

		Input::merge(['role_id' => 0]);

		$start_date = '1970-01-01';
		$end_date = time() - 10*365*24*3600;	// before 10 year
		$end_date = date('Y', $end_date) . '-01-01';

		return [
			'name'			=>	'required|max:16',
			'kana'			=>	'required|max:16',
			'email'			=>	'required|email|confirmed|unique:users',
			'email_confirmation'	=>	'required|email',
			'phone'			=>	array('required', 'regex:/0(?:\d\-\d{4}|\d{2}\-\d{3}|\d{3}\-\d{2}|\d{4}\-\d{1})\-\d{4}$/'),	//[{0-9\-]*

			'birthday'		=>	'required|date_format:Y-m-d|after:' . $start_date . '|before:' . $end_date,
			'note'			=>	'required|max:300',
			'password'		=>	'required|min:8|max:32',

			'boss_id'		=>	'not_in:' . DONT_SELECT,
		];

	}

	public function messages()
	{
		Input::all();
		$start_date = '1970-01-01';
		$end_date = time() - 10*365*24*3600;	// before 10 year
		$end_date = date('Y', $end_date) . '-01-01';

		return [
			'name.required'				=>	messageValidate('名前', MESSAGE_REQUIRE),			//'名前 ' . MESSAGE_REQUIRE .'Ban can phai nhap name',
			'name.max'					=>	messageValidateLen('名前', '16', MESSAGE_MAX),		//'名前 は16文字まで入力できます。Name co Do dai toi da 16 ky tu',

			'kana.required'				=>	messageValidate('名前（カナ）', MESSAGE_REQUIRE),		//'名前（カナ）' . MESSAGE_REQUIRE . ' .Ban can phai nhap kana name',
			'kana.max'					=>	messageValidateLen('名前（カナ）', '32', MESSAGE_MAX), //'名前 は16文字まで入力できます。Kana name co Do dai toi da 16 ky tu',

			'email.required'			=>	messageValidate('メールアドレス', MESSAGE_REQUIRE), 	//'メールアドレス ' . MESSAGE_REQUIRE . ' .Ban can phai nhap email',
			'email.email'				=>	messageValidate('メールアドレス', MESSAGE_EMAIL),		//'メールアドレス またはパスワードが誤っています。Email của bạn không đúng định dạng',
			'email.confirmed'			=>	messageValidateDuplicate('メールアドレス', 'メールアドレス（確認）', MESSAGE_EMAIL_CONFIRMED),		//'必須入力項目 メールアドレス（確認）が入力されていません。Xac nhan email khong chinh xac',
			'email.unique'				=>	messageValidate('メールアドレス', MESSAGE_EMAIL_DUPLICATE),		//'メールアドレスは既に使用されています。Email phai Unique nhe',

			'email_confirmation.required'	=>	messageValidate('メールアドレス（確認）', MESSAGE_REQUIRE), 	
			'email_confirmation.email'		=>	messageValidate('メールアドレス（確認）', MESSAGE_EMAIL),		

			'phone.required'			=>	messageValidate('電話番号', MESSAGE_REQUIRE),			//'電話番号 ' . MESSAGE_REQUIRE . 'Ban can phai nhap phone',
			'phone.regex'				=>	messageValidate('電話番号', MESSAGE_PHONE_INVALID),		


			'birthday.required'			=>	messageValidate('生年月日', MESSAGE_REQUIRE),			//'生年月日 ' . MESSAGE_REQUIRE . ' .Ban can phai nhap birthday',
			'birthday.before'			=>	messageValidateDateTime('生年月日', $start_date, $end_date, MESSAGE_DATETIME),
			'birthday.after'			=>	messageValidateDateTime('生年月日', $start_date, $end_date, MESSAGE_DATETIME),
			'birthday.date_format'		=>	messageValidate('生年月日', MESSAGE_PHONE_INVALID),

			'note.required'				=>	messageValidate('ノート', MESSAGE_REQUIRE),			//'ノート ' . MESSAGE_REQUIRE . ' . Ban can phai nhap note',
			'note.max'					=> 	messageValidateLen('ノート', '300', MESSAGE_MAX),

			'password.required'			=>	messageValidate('パスワード', MESSAGE_REQUIRE), 		//'パスワード ' . MESSAGE_REQUIRE . ' .Ban can phai nhap password',
			'password.min'				=>	messageValidateLen('パスワード', '8', MESSAGE_MIN),	//'メールアドレスまたは パスワード が誤っています。 Password không thể nhỏ hơn 8 ký tự',
			'password.max'				=>	messageValidateLen('パスワード', '32', MESSAGE_MAX),	//'メールアドレスまたは パスワード が誤っています。 Password không thể lớn hơn 32 ký tự ',

			'boss_id.not_in'			=>	MESSAGE_BOSS_EMPTY_EMPLOYEE,
		];
	}
}
