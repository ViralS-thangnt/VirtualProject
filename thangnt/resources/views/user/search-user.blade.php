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

	<nav class="home-menu pure-menu pure-menu-horizontal relative">
		<h1 class="pure-menu-heading"><a href="">Hệ thống quản lý nhân viên</a></h1>
		<ul class="pure-menu-list force-right">
			<li class="pure-menu-item"><span class="pure-menu-link">Đây là tên riêng của người dùng (Quyền quản trị)</span></li>
			<li class="pure-menu-item"><a href="" class="pure-menu-link">Tìm kiếm</a></li>
			<li class="pure-menu-item"><a href="" class="pure-menu-link">Thêm mới</a></li>
			<li class="pure-menu-item"><a href="" class="pure-menu-link">Logout</a></li>
		</ul> 
	</nav>

@stop

@section('content')


<section>
		<form class="pure-form">
		<table class="pure-table pure-table-bordered">

			<tbody>
				<tr>
					<!-- <td>名前</td> -->
					<td>Tên</td>
					<td><input type="text" name="name" value=""></td>

					<!-- <td>メールアドレス</td> -->
					<td>Email</td>
					<td><input type="text" name="email" value=""></td>
				</tr>
				<tr>
					<!-- <td>名前（カナ）</td> -->					
					<td>Tên kana</td>
					<td><input type="text" name="kana" value=""></td>

					<!-- <td>電話番号</td> -->					
					<td>Phone</td>
					<td><input type="text" name="telephone_no" value=""></td>
				</tr>
				<tr>
					<!-- <td>生年月日</td> -->					
					<td>Ngày sinh</td>
					<td colspan="3">
						<!-- <input type="text" name="start_date" value="" placeholder="開始日"> -->						
						<input type="text" name="start_date" value="" placeholder="Ngày bắt đầu">
						&nbsp;～&nbsp;

						<!-- <input type="text" name="end_date" value="" placeholder="終了日"> -->						
						<input type="text" name="end_date" value="" placeholder="Ngày kết thúc">
					</td>
				</tr>
				<tr>
					<!-- <td>権限</td> -->					
					<td>Gán quyền</td>
					<td colspan="3" align="center">
						<ul class="pure-menu-list pure-menu-horizontal">
							<!-- <li class="pure-menu-item pure-u-1-6"><label for="admin"><input type="checkbox" id="admin" name="admin" value="">管理者</label></li>
							<li class="pure-menu-item pure-u-1-6"><label for="boss"><input type="checkbox" id="boss" name="boss" value="">BOSS</label></li>
							<li class="pure-menu-item pure-u-1-6"><label for="employee"><input type="checkbox" id="employee" name="employee" value="">従業員</label></li>
							 -->
							<li class="pure-menu-item pure-u-1-6"><label for="admin"><input type="checkbox" id="admin" name="admin" value="">Admin</label></li>
							<li class="pure-menu-item pure-u-1-6"><label for="boss"><input type="checkbox" id="boss" name="boss" value="">BOSS</label></li>
							<li class="pure-menu-item pure-u-1-6"><label for="employee"><input type="checkbox" id="employee" name="employee" value="">Nhân viên</label></li>
						</ul>
					</td>
				</tr>
				<tr>
					<td colspan="4" align="right">
						<!-- <button class="pure-button pure-button-primary" type="submit">検索</button> -->

						<button class="pure-button pure-button-primary" type="submit">Tìm kiếm</button>
					</td>
				</tr>
			</tbody>
		</table>
		</form>
	</section>

	<section>
		<p class="error-box">
			<!-- 
			検索結果にマッチしませんでした。
			 -->
			Không có kết quả tìm kiếm phù hợp
		</p>
	</section>


<!-- 
<section>
		<form class="pure-form">
		<table class="pure-table pure-table-bordered">
			<tbody>
				<tr>
					<td>名前</td>
					<td><input type="text" name="name" value=""></td>
					<td>メールアドレス</td>
					<td><input type="text" name="email" value=""></td>
				</tr>
				<tr>
					<td>名前（カナ）</td>
					<td><input type="text" name="kana" value=""></td>
					<td>電話番号</td>
					<td><input type="text" name="telephone_no" value=""></td>
				</tr>
				<tr>
					<td>生年月日</td>
					<td colspan="3">
						<input type="text" name="start_date" value="" placeholder="開始日">
						&nbsp;～&nbsp;
						<input type="text" name="end_date" value="" placeholder="終了日">
					</td>
				</tr>
				<tr>
					<td>権限</td>
					<td colspan="3" align="center">
						<ul class="pure-menu-list pure-menu-horizontal">
							<li class="pure-menu-item pure-u-1-6"><label for="admin"><input type="checkbox" id="admin" name="admin" value="">管理者</label></li>
							<li class="pure-menu-item pure-u-1-6"><label for="boss"><input type="checkbox" id="boss" name="boss" value="">BOSS</label></li>
							<li class="pure-menu-item pure-u-1-6"><label for="employee"><input type="checkbox" id="employee" name="employee" value="">従業員</label></li>
						</ul>
					</td>
				</tr>
				<tr>
					<td colspan="4" align="right">
						<button class="pure-button pure-button-primary" type="submit">検索</button>
					</td>
				</tr>
			</tbody>
		</table>
		</form>
	</section>

	<section>
		<p class="error-box">
			検索結果にマッチしませんでした。
		</p>
	</section>
-->



@stop