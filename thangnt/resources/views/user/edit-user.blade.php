@extends('layout.master')



@section('content')

<section class="contents">
	<!-- Edit -->
	<h2>編集</h2>

	<section>
		<form class="pure-form pure-u-3-4" >
		<table class="pure-table pure-table-bordered" width="100%">
			<tbody>
				<tr>
					<!-- ID -->
					<th>ID</th>
					<td>21</td>
				</tr>
				<tr>
					<!-- Name -->
					<th>名前</th>
					<td><input name="name" value="" class="pure-input-1" type="text"></td>
				</tr>
				<tr>
					<!-- Name Kana -->
					<th>名前（カナ）</th>
					<td><input name="kana" value="" class="pure-input-1" type="text"></td>
				</tr>
				<tr>
					<!-- Phone -->
					<th>電話番号</th>
					<td><input name="telephone_no" value="" class="pure-input-1" type="text"></td>
				</tr>
				<tr>
					<!-- Birthday -->
					<th>生年月日</th>
					<td><input name="birthday" value="" class="pure-input-1" type="text"></td>
				</tr>
				<tr>
					<!-- Password -->
					<th>パスワード</th>
					<td><input type="password" name="password" class="pure-input-1" type="password"></td>
				</tr>
				<tr>
					<td colspan="2" align="right">
						<!-- Back -->
						@if(!$_SERVER['HTTP_REFERER'] == '')
							<a class="pure-button pure-button-primary" href="{!! $_SERVER['HTTP_REFERER'] !!}">戻る</a>
						@endif

						<!-- Confirm Submit -->
						@if(\Auth::user()->role_id != ROLE_EMPLOYEE)
							<button class="pure-button button-error" name="submit" type="submit">確認</button>
						@endif
						
					</td>
				</tr>
			</tbody>
		</table>
		</form>
	</section>
</section>
@stop