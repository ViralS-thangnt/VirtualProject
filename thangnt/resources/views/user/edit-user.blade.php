@extends('layout.master')



@section('content')



<section class="contents">
	<!-- Edit -->
	<h2>Edit</h2>
	<!-- <h2>編集</h2> -->
	
	<section>
		<form class="pure-form pure-u-3-4" method="POST" action="{!! url(DETAIL_EMPLOYEE_PATH . $data['id'] . '/edit/conf') !!}">
		<input type="hidden" name="_token" value="{{csrf_token()}}" />
    	<input type="hidden" name="_method" id="_method" value="POST" />

		<table class="pure-table pure-table-bordered" width="100%">
			<tbody>
				<tr>
					<!-- ID -->
					<th>ID</th>
					<td>{!! $data['id'] !!}</td>
				</tr>
				<tr>
					<!-- Name -->
					<!-- <th>名前</th> -->
					<th>Name</th>
					<td><input name="name" value="{!! $data['name'] !!}" class="pure-input-1" type="text"></td>
				</tr>
				<tr>
					<!-- Name Kana -->
					<th>Kana Name</th>
					<!-- <th>名前（カナ）</th> -->

					<td><input name="kana" value="{!! $data['kana'] !!}" class="pure-input-1" type="text"></td>
				</tr>
				<tr>
					<!-- Phone -->
					<th>Phone</th>
					<!-- <th>電話番号</th> -->
					<td><input name="phone" value="{!! $data['phone'] !!}" class="pure-input-1" type="text"></td>
				</tr>
				<tr>
					<!-- Birthday -->
					<th>Birthday</th>
					<!-- <th>生年月日</th> -->
					<td><input name="birthday" value="{!! $data['birthday'] !!}" class="pure-input-1" type="text"></td>
				</tr>
				<tr>
					<!-- Password -->
					<th>Password</th>
					<!-- <th>パスワード</th> -->
					<td><input type="password" name="password" class="pure-input-1" type="password"></td>
				</tr>
				<tr>
					<td colspan="2" align="right">
						<!-- Back -->
						@if(isset($_SERVER['HTTP_REFERER']) and !$_SERVER['HTTP_REFERER'] == '')
							<input type="hidden" value="{{$referer = $_SERVER['HTTP_REFERER']}}">
						@else
							<input type="hidden" value="{!!$referer = ''!!}">
						@endif

						<a class="pure-button pure-button-primary" href="{!! $referer !!}">Back</a>
						<!-- <a class="pure-button pure-button-primary" href="{!! $referer !!}">戻る</a> -->

						<!-- Confirm Submit -->
						@if(\Auth::user()->role_id != ROLE_EMPLOYEE)
							<button class="pure-button button-error" name="submit" type="submit">Submit</button>
							<!-- <button class="pure-button button-error" name="submit" type="submit">確認</button> -->

						@endif
						
					</td>
				</tr>
			</tbody>
		</table>
		<input type="hidden" name="id" value="{!! $data['id'] !!}"/>
		<input type="hidden" name="role_id" value="{!! $data['role_id'] !!}"/>
		<input type="hidden" name="boss_id" value="{!! $data['boss_id'] !!}"/>
		<input type="hidden" name="email" value="{!! $data['email'] !!}"/>

		</form>
	</section>
</section>


@stop