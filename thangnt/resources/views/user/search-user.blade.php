@extends('layout.master')

@section('header-items')
	<!-- <nav class="home-menu pure-menu pure-menu-horizontal relative"> -->
		<!-- <h1 class="pure-menu-heading"><a href="">社員管理システム</a></h1> -->
		<!-- <ul class="pure-menu-list force-right"> -->
			<!-- <li class="pure-menu-item"><span class="pure-menu-link">飯塚 浩二（管理者）</span></li> -->
			<!-- <li class="pure-menu-item"><a href="" class="pure-menu-link">検索</a></li> -->
			<!-- <li class="pure-menu-item"><a href="" class="pure-menu-link">追加</a></li> -->
			<!-- <li class="pure-menu-item"><a href="" class="pure-menu-link">ログアウト</a></li> -->
		<!-- </ul> -->
	<!-- </nav> -->

	<!-- <nav class="home-menu pure-menu pure-menu-horizontal relative">
		<h1 class="pure-menu-heading"><a href="">Hệ thống quản lý nhân viên</a></h1>
		<ul class="pure-menu-list force-right">
			<li class="pure-menu-item"><span class="pure-menu-link">Đây là tên riêng của người dùng (Quyền quản trị)</span></li>
			<li class="pure-menu-item"><a href="" class="pure-menu-link">Tìm kiếm</a></li>
			<li class="pure-menu-item"><a href="" class="pure-menu-link">Thêm mới</a></li>
			<li class="pure-menu-item"><a href="" class="pure-menu-link">Logout</a></li>
		</ul> 
	</nav> -->

@stop

@section('content')

@include('layout.error')
<section>
	<form class="pure-form" method="GET" action="{!! url(SEARCH_PATH) !!}">
		<table class="pure-table pure-table-bordered">

			<tbody>
				<tr>
					<!-- <td>名前</td> -->
					<td>Tên 名前</td>
					<td><input type="text" name="name" value="{{ checkGetValue('name') }}"></td>

					<!-- <td>メールアドレス</td> -->
					<td>Email メールアドレス</td>
					<td><input type="text" name="email" value="{{ checkGetValue('email') }}"></td>
				</tr>
				<tr>
					<!-- <td>名前（カナ）</td> -->					
					<td>Tên kana 名前（カナ）</td>
					<td><input type="text" name="kana" value="{{ checkGetValue('kana') }}"></td>

					<!-- <td>電話番号</td> -->					
					<td>Phone 電話番号</td>
					<td><input type="text" name="phone" value="{{ checkGetValue('phone') }}"></td>
				</tr>
				<tr>
					<!-- <td>生年月日</td> -->					
					<td>Ngày sinh 生年月日</td>
					<td colspan="3">
						<!-- <input type="text" name="start_date" value="" placeholder="開始日"> -->						
						<input type="text" name="start" value="{{ checkGetValue('start') }}" placeholder="Ngày bắt đầu">
						&nbsp;～&nbsp;

						<!-- <input type="text" name="end_date" value="" placeholder="終了日"> -->						
						<input type="text" name="end" value="{{ checkGetValue('end') }}" placeholder="Ngày kết thúc">
					</td>
				</tr>
				<tr>
					<!-- <td>権限</td> -->					
					<td>Gán quyền 権限</td>
					<td colspan="3" align="center">
						<ul class="pure-menu-list pure-menu-horizontal">
							<!-- <li class="pure-menu-item pure-u-1-6"><label for="admin"><input type="checkbox" id="admin" name="admin" value="">管理者</label></li>
							<li class="pure-menu-item pure-u-1-6"><label for="boss"><input type="checkbox" id="boss" name="boss" value="">BOSS</label></li>
							<li class="pure-menu-item pure-u-1-6"><label for="employee"><input type="checkbox" id="employee" name="employee" value="">従業員</label></li>
							 -->
							<li class="pure-menu-item pure-u-1-6">
								<label for="admin">
									<input type="checkbox" id="{!! ROLE_ADMIN !!}" name="admin" value="{!! ROLE_ADMIN !!}" 
										{{ (isset($_GET['admin'])) ? 'checked' : ''}}>Admin 管理者
								</label>
							</li>
							<li class="pure-menu-item pure-u-1-6">
								<label for="boss">
									<input type="checkbox" id="{!! ROLE_BOSS !!}" name="boss" value="{!! ROLE_BOSS !!}" {{ (isset($_GET['boss'])) ? 'checked' : ''}}>BOSS
								</label>
							</li>
							<li class="pure-menu-item pure-u-1-6">
								<label for="employee">
									<input type="checkbox" id="{!! ROLE_EMPLOYEE !!}" name="employee" value="{!! ROLE_EMPLOYEE !!}" {{ (isset($_GET['employee'])) ? 'checked' : ''}}>Nhân viên 従業員
								</label>
							</li>
						</ul>
					</td>
				</tr>
				<tr>
					<td colspan="4" align="right">
						<!-- <button class="pure-button pure-button-primary" type="submit">検索</button> -->

						<button class="pure-button pure-button-primary" type="submit">Tìm kiếm 検索</button>
					</td>
				</tr>
			</tbody>
		</table>
	</form>
</section>

	@if($data)
		<h2>Ket qua tim kiem</h2>
		@include('user.table')
	@else
		
		<section>

		<p class="error-box">
			
			検索結果にマッチしませんでした。</br>
			
			Không có kết quả tìm kiếm phù hợp
		</p>
	</section>
	@endif


@stop