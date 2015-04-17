@extends('layout.master')

@section('header-items')



@stop

@section('content')

@if (checkPermission())

@include('layout.error')
<section>
	<form class="pure-form" method="GET" action="{!! url(SEARCH_PATH) !!}">
		<table class="pure-table pure-table-bordered">

			<tbody>
				<tr>
					<!-- <td>名前</td> -->
					<td>名前</td>
					<td><input type="text" name="name" value="{{ checkGetValue('name') }}"></td>

					<!-- <td>メールアドレス</td> -->
					<td>メールアドレス</td>
					<td><input type="text" name="email" value="{{ checkGetValue('email') }}"></td>
				</tr>
				<tr>
					<!-- <td>名前（カナ）</td> -->					
					<td>名前（カナ）</td>
					<td><input type="text" name="kana" value="{{ checkGetValue('kana') }}"></td>

					<!-- <td>電話番号</td> -->					
					<td>電話番号</td>
					<td><input type="text" name="phone" value="{{ checkGetValue('phone') }}"></td>
				</tr>
				<tr>
					<!-- <td>生年月日</td> -->					
					<td>生年月日</td>
					<td colspan="3">
						<!-- <input type="text" name="start_date" value="" placeholder="開始日"> -->						
						<input type="text" name="start" value="{{ checkGetValue('start') }}" placeholder="開始日">
						&nbsp;～&nbsp;

						<!-- <input type="text" name="end_date" value="" placeholder="終了日"> -->						
						<input type="text" name="end" value="{{ checkGetValue('end') }}" placeholder="終了日">
					</td>
				</tr>
				<tr>
					<!-- <td>権限</td> -->					
					<td>権限</td>
					<td colspan="3" align="center">
						<ul class="pure-menu-list pure-menu-horizontal">
							<!-- <li class="pure-menu-item pure-u-1-6"><label for="admin"><input type="checkbox" id="admin" name="admin" value="">管理者</label></li>
							<li class="pure-menu-item pure-u-1-6"><label for="boss"><input type="checkbox" id="boss" name="boss" value="">BOSS</label></li>
							<li class="pure-menu-item pure-u-1-6"><label for="employee"><input type="checkbox" id="employee" name="employee" value="">従業員</label></li>
							 -->
							<li class="pure-menu-item pure-u-1-6">
								<label for="admin">
									<input type="checkbox" id="{!! ROLE_ADMIN !!}" name="admin" value="{!! ROLE_ADMIN !!}" 
										{{ (isset($_GET['admin'])) ? 'checked' : ''}}>管理者
								</label>
							</li>
							<li class="pure-menu-item pure-u-1-6">
								<label for="boss">
									<input type="checkbox" id="{!! ROLE_BOSS !!}" name="boss" value="{!! ROLE_BOSS !!}" {{ (isset($_GET['boss'])) ? 'checked' : ''}}>BOSS
								</label>
							</li>
							<li class="pure-menu-item pure-u-1-6">
								<label for="employee">
									<input type="checkbox" id="{!! ROLE_EMPLOYEE !!}" name="employee" value="{!! ROLE_EMPLOYEE !!}" {{ (isset($_GET['employee'])) ? 'checked' : ''}}>従業員
								</label>
							</li>
						</ul>
					</td>
				</tr>
				<tr>
					<td colspan="4" align="right">
						<!-- <button class="pure-button pure-button-primary" type="submit">検索</button> -->

						<button class="pure-button pure-button-primary" type="submit">検索</button>
					</td>
				</tr>
			</tbody>
		</table>
	</form>
</section>

	@if($data)
		<h2></h2>
		@include('user.table')
	@else
		
		<section>

		<p class="error-box">
			
			検索結果にマッチしませんでした。</br>
			
			
		</p>
	</section>
	@endif

@else
	@include('user.access-denied')

@endif
@stop