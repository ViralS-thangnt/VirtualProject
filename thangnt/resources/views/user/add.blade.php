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

	<!-- <nav class="home-menu pure-menu pure-menu-horizontal relative"> -->
		<!-- <h1 class="pure-menu-heading">
			<a href="">Hệ thống quản lý nhân viên</a></h1> -->
		<!-- <ul class="pure-menu-list force-right">
			<li class="pure-menu-item"><span class="pure-menu-link">Đây là tên riêng của người dùng (Quyền quản trị)</span></li>
			<li class="pure-menu-item"><a href="" class="pure-menu-link">Tìm kiếm</a></li>
			<li class="pure-menu-item"><a href="" class="pure-menu-link">Thêm mới</a></li>
			<li class="pure-menu-item"><a href="" class="pure-menu-link">Logout</a></li>
		</ul> 
		
	</nav> -->

@stop

@section('content')
@include('layout.error')
<section class="contents">
	<!-- <h2>追加</h2> -->
	<h2>Thêm mới </h2>

	<section>

		<form class="pure-form pure-u-3-4" method="POST" action="{!! url(ADD_CONFIRM_PATH) !!}">
		<input type="hidden" name="_token" value="{{csrf_token()}}" />
    	<input type="hidden" name="_method" id="_method" value="POST" />

		<table class="pure-table pure-table-bordered" width="100%">
			<tbody>
				<tr>
					<!-- <th>名前</th>
					<td>青木 栄一</td> -->
					<th class="{!! checkErrorCell('name', $errors) !!}">Tên gọi 名前</th>
					<td><input type="text" name="name" value="{{ old('name') }}" class="pure-input-1">
						{{checkLabelError('name', $errors)}}</td>

				</tr>
				<tr>
					<th class="{!! checkErrorCell('kana', $errors) !!}">Ten Kana 名前（カナ）</th>
					<td><input type="text" name="kana" value="{{ old('kana') }}" class="pure-input-1">
						{{checkLabelError('kana', $errors)}}</td>
					<!-- <th>名前（カナ）</th>
					<td>あおき えいいち</td> -->
				</tr>
				<tr>
					<th class="{!! checkErrorCell('email', $errors) !!}">Email メールアドレス</th>
					<td><input type="text" name="email" value="{{ old('email') }}" class="pure-input-1">
						{{checkLabelError('email', $errors)}}</td>
					<!-- <th>メールアドレス</th>
					<td>aoki@example.com</td> -->
				</tr>

				<tr>
					<th class="{!! checkErrorCell('email_confirmation', $errors) !!}">Confirm Email メールアドレス（確認）</th>
					<td><input type="text" name="email_confirmation" value="{{ old('email_confirmation') }}" class="pure-input-1">
						{{checkLabelError('email_confirmation', $errors)}}</td>
					<!-- <th>メールアドレス（確認）</th>
					<td>aoki@example.com</td> -->
				</tr>
				

				<tr>
					<!-- <th>電話番号</th>
					<td>090-0123-4567</td> -->
					<th class="{!! checkErrorCell('phone', $errors) !!}">Phone 電話番号</th>
					<td><input type="text" name="phone" value="{{ old('phone') }}" class="pure-input-1">
						{{checkLabelError('phone', $errors)}}</td>
				</tr>
				<tr>
					<th class="{!! checkErrorCell('birthday', $errors) !!}">Ngay sinh 生年月日</th>
					<td><input type="text" name="birthday" value="{{ old('birthday') }}" class="pure-input-1">
						{{checkLabelError('birthday', $errors)}}</td>
					<!-- <th>生年月日</th>
					<td>1932/12/10</td> -->
				</tr>
				<tr>
					<!-- <th>ノート</th>
					<td>日本の地理学者。<br>東京学芸大学名誉教授。<br>理学博士。<br>歴史地理学会会長。<br>元駿河台大学教授。<br>専門は文化地理学、交通地理学、地図情報論、交通情報論、産業考古学。<br>研究テーマは地域社会を通じての鉄道の歴史地理学、シーパワーの政治地理学、及び海事史。<br>鉄道ファンとして知られる。<br>またそれを個人的趣味にとどめることなく、主にアマチュアである鉄道ファンによって支えられてきた鉄道分野の研究を、文化地理学の一環として認知・昇華させるべく活動している。
					</td> -->
					<th class="{!! checkErrorCell('note', $errors) !!}">Chú ý ノート</th>
					<td><input type="text" name="note" value="{{ old('note') }}" class="pure-input-1">
						{{checkLabelError('note', $errors)}}</td>
					
				</tr>

				<tr>
					<th class="{!! checkErrorCell('password', $errors) !!}">Mật khẩu パスワード</th>
					<td><input type="password" name="password" value="" class="pure-input-1">
						{{checkLabelError('password', $errors)}}</td>
				</tr>


				@if(\Auth::user()->role_id == ROLE_ADMIN)
				<tr>
					<th class="{!! checkErrorCell('role_id', $errors) !!}">Gán quyền 権限</th>
					<td><select name="role_id[]" class="pure-input-1">
							<option value="{!! ROLE_EMPLOYEE !!}">Nhân viên 従業員</option>
							<option value="{!! ROLE_BOSS !!}">BOSS</option>
							<option value="{!! ROLE_ADMIN !!}">Quản trị 管理者</option>
						</select>
						{{checkLabelError('role_id', $errors)}}
					</td>
				</tr>

				<tr>
					<th class="{!! checkErrorCell('boss_id', $errors) !!}">BOSS</th>
					<td><select name="boss_id[]" class="pure-input-1">
							<option value="-1">--</option>
							@foreach($bosses as $value)

								<option value="{{ $value->id }}">{{$value->kana}}</option>
							@endforeach
							
						</select>
						{{checkLabelError('boss_id', $errors)}}
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



@stop