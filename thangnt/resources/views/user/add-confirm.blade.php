@extends('layout.master')

@section('header-items')



	<!-- <nav class="home-menu pure-menu pure-menu-horizontal relative"> -->
		<!-- <h1 class="pure-menu-heading"><a href="">社員管理システム</a></h1> -->
		<!-- <ul class="pure-menu-list force-right"> -->
			<!-- <li class="pure-menu-item"><span class="pure-menu-link">岸 由一郎</span></li> -->
			<!-- <li class="pure-menu-item"><a href="" class="pure-menu-link">検索</a></li> -->
			<!-- <li class="pure-menu-item"><a href="" class="pure-menu-link">追加</a></li> -->
			<!-- <li class="pure-menu-item"><a href="" class="pure-menu-link">ログアウト</a></li> -->
		<!-- </ul> -->
	<!-- </nav> -->


	<nav class="home-menu pure-menu pure-menu-horizontal relative">
		<h1 class="pure-menu-heading"><a href="">Hệ thống quản lý nhân viên</a></h1>
		<ul class="pure-menu-list force-right">
			<li class="pure-menu-item"><span class="pure-menu-link">Đây là tên riêng của người dùng </span></li>
			<li class="pure-menu-item"><a href="" class="pure-menu-link">Tìm kiếm</a></li>
			<li class="pure-menu-item"><a href="" class="pure-menu-link">Thêm mới</a></li>
			<li class="pure-menu-item"><a href="" class="pure-menu-link">Logout</a></li>
		</ul> 
		
	</nav>

@stop

@section('content')

<form method="POST" action="{!! url(ADD_COMPLETE_PATH) !!}" >
	<input type="hidden" name="_token" value="{{csrf_token()}}" />
	<input type="hidden" name="_method" id="_method" value="POST" />
<section class="contents">
	<!-- <h2>編集（確認）</h2> -->
	<h2>Xác nhận Add </h2>


	<section>
		<form>
		<table class="pure-table pure-table-bordered" width="100%">
			<tbody>
				<tr>
					<!-- <th>名前</th>
					<td>青木 栄一</td> -->
					<th>Tên gọi 名前</th>
					<td>{!! $name !!}</td>
					<input type="hidden" name="name" value="{!! $name !!}"/>
				</tr>
				<tr>
					<th>Ten Kana 名前（カナ）</th>
					<td>{!! $kana !!}</td>
					<input type="hidden" name="kana" value="{!! $kana !!}"/>
					<!-- <th>名前（カナ）</th>
					<td>あおき えいいち</td> -->
				</tr>
				<tr>
					<th>Email</th>
					<td>{!! $email !!}</td>
					<input type="hidden" name="email" value="{!! $email !!}"/>

					<!-- <th>メールアドレス</th>
					<td>aoki@example.com</td> -->
				</tr>
				<tr>
					<!-- <th>電話番号</th>
					<td>090-0123-4567</td> -->
					<th>Phone 電話番号</th>
					<td>{!! $phone !!}</td>
					<input type="hidden" name="phone" value="{!! $phone !!}"/>
				</tr>
				<tr>
					<th>Ngay sinh</th>
					<td>{!! $birthday !!}</td>
					<input type="hidden" name="birthday" value="{!! $birthday !!}"/>
					<!-- <th>生年月日</th>
					<td>1932/12/10</td> -->
				</tr>
				<tr>
					<!-- <th>ノート</th>
					<td>日本の地理学者。<br>東京学芸大学名誉教授。<br>理学博士。<br>歴史地理学会会長。<br>元駿河台大学教授。<br>専門は文化地理学、交通地理学、地図情報論、交通情報論、産業考古学。<br>研究テーマは地域社会を通じての鉄道の歴史地理学、シーパワーの政治地理学、及び海事史。<br>鉄道ファンとして知られる。<br>またそれを個人的趣味にとどめることなく、主にアマチュアである鉄道ファンによって支えられてきた鉄道分野の研究を、文化地理学の一環として認知・昇華させるべく活動している。
					</td> -->
					<th>Chú ý</th>
					<td>
						{!! $note !!}
					</td>
					<input type="hidden" name="note" value="{!! $note !!}"/>
				</tr>

				<input type="hidden" name="password" value="{!! $password !!}" >
				<input type="hidden" name="enable" value="1" >

				@if(\Auth::user()->role_id == ROLE_ADMIN)
				<tr>
					<th>Gán quyền 権限</th>
					<td>
						{!! getRoleNameByRoleId(current($role_id)) !!}
					</td>
					<input type="hidden" name="role_id" value="{!! current($role_id) !!}"/>
				</tr>

				<tr>
					<th>BOSS</th>
					<td>
						{!! $boss_name !!}
						<input type="hidden" name="boss_id" value="{!! current($boss_id) !!}"/>
					</td>
					
				</tr>
				@endif


				<tr>
					<td colspan="2" align="right">
						<!-- <button class="pure-button pure-button-primary" name="back" type="submit">戻る</button>
						<button class="pure-button button-error" name="submit" type="submit">更新</button> -->

						<!-- Back -->
						@if(isset($_SERVER['HTTP_REFERER']) and !$_SERVER['HTTP_REFERER'] == '')
							<input type="hidden" value="{{$referer = $_SERVER['HTTP_REFERER']}}">
						@else
							<input type="hidden" value="{!!$referer = '#'!!}">
						@endif

						<a class="pure-button pure-button-primary" href="{!! $referer !!}">Quay lại 戻る</a>
						<!-- Confirm Submit -->
						@if(\Auth::user()->role_id != ROLE_EMPLOYEE)
							<button class="pure-button button-error" name="submit" type="submit">Cập nhật 更新</button>
						@endif
					</td>
				</tr>


			</tbody>
		</table>
		</form>
	</section>
</section>

</form>

@stop