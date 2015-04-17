<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Input;

class SearchRequest extends Request {

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

		$start_date = '1970-01-01';
		$end_date = time() - 10*365*24*3600;	// before 10 year
		$end_date = date('Y', $end_date) . '-01-01';

		$array_rules = [];

		if(Input::get('name') != "")
		{
			$array_rules = array_merge($array_rules, ['name' =>	'max:16'] );
		}

		if(Input::get('kana') != "")
		{
			$array_rules = array_merge($array_rules, ['kana' =>	'max:16'] );
		}


		if(Input::get('email') != "")
		{
			$array_rules = array_merge($array_rules, ['email' => 'max:254'] );
		}


		if(Input::get('phone') != "")
		{
			$array_rules = array_merge($array_rules, ['phone' => 'max:13'] );
		}

		if((Input::get('start') != "") || (Input::get('end') != ""))
		{
			$array_rules = array_merge($array_rules, ['start' => 'after:' . $start_date . '|before:' . $end_date] );
		}

		return $array_rules;
	}

	public function messages()
	{
		$start_date = '1970-01-01';
		$end_date = time() - 10*365*24*3600;	// before 10 year
		$end_date = date('Y', $end_date) . '-01-01';

		return [
			'name.max'					=>	messageValidateLen('名前', '16', MESSAGE_MAX),		
			'kana.max'					=>	messageValidateLen('名前（カナ）', '32', MESSAGE_MAX), 
			'email.max'					=>	messageValidateLen('メールアドレス ', '254', MESSAGE_MAX), 
			'phone.max'					=>	messageValidateLen('電話番号 ', '13', MESSAGE_MAX), 

			// 'birthday.required'			=>	messageValidate('生年月日', MESSAGE_REQUIRE),
			'start.before'			=>	messageValidateDateTime('生年月日', $start_date, $end_date, MESSAGE_DATETIME),
			'start.after'			=>	messageValidateDateTime('生年月日', $start_date, $end_date, MESSAGE_DATETIME),

			'end.before'			=>	messageValidateDateTime('生年月日', $start_date, $end_date, MESSAGE_DATETIME),
			'end.after'				=>	messageValidateDateTime('生年月日', $start_date, $end_date, MESSAGE_DATETIME),
			
		];
	}

}
