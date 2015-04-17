@extends('layout.master')

@section('header-items')

@stop

@section('content')

@if (checkPermission())


<section class="contents">
	<h2>追加</h2>
	<!-- <h2>Thêm mới </h2> -->
	@include('layout.error')
	<section>

		<form class="pure-form pure-u-3-4" method="POST" action="{!! url(ADD_CONFIRM_PATH) !!}">
		<input type="hidden" name="_token" value="{{csrf_token()}}" />
    	<input type="hidden" name="_method" id="_method" value="POST" />

		<table class="pure-table pure-table-bordered" width="100%">
			<tbody>
				<tr>
					<!-- <th>名前</th>
					<td>青木 栄一</td> -->
					<th class="{!! checkErrorCell('name', $errors) !!}">名前</th>
					<td><input type="text" name="name" value="{{ old('name') }}" class="pure-input-1">
						{{checkLabelError('name', $errors)}}</td>

				</tr>
				<tr>
					<th class="{!! checkErrorCell('kana', $errors) !!}">名前（カナ）</th>
					<td><input type="text" name="kana" value="{{ old('kana') }}" class="pure-input-1">
						{{checkLabelError('kana', $errors)}}</td>
					<!-- <th>名前（カナ）</th>
					<td>あおき えいいち</td> -->
				</tr>
				<tr>
					<th class="{!! checkErrorCell('email', $errors) !!}">メールアドレス</th>
					<td><input type="text" name="email" value="{{ old('email') }}" class="pure-input-1">
						{{checkLabelError('email', $errors)}}</td>
					<!-- <th>メールアドレス</th>
					<td>aoki@example.com</td> -->
				</tr>

				<tr>
					<th class="{!! checkErrorCell('email_confirmation', $errors) !!}">メールアドレス（確認）</th>
					<td><input type="text" name="email_confirmation" value="{{ old('email_confirmation') }}" class="pure-input-1">
						{{checkLabelError('email_confirmation', $errors)}}</td>
					<!-- <th>メールアドレス（確認）</th>
					<td>aoki@example.com</td> -->
				</tr>
				

				<tr>
					<!-- <th>電話番号</th>
					<td>090-0123-4567</td> -->
					<th class="{!! checkErrorCell('phone', $errors) !!}">電話番号</th>
					<td><input type="text" name="phone" value="{{ old('phone') }}" class="pure-input-1">
						{{checkLabelError('phone', $errors)}}</td>
				</tr>
				<tr>
					<th class="{!! checkErrorCell('birthday', $errors) !!}">生年月日</th>
					<td><input type="text" name="birthday" value="{{ old('birthday') }}" class="pure-input-1">
						{{checkLabelError('birthday', $errors)}}</td>
					<!-- <th>生年月日</th>
					<td>1932/12/10</td> -->
				</tr>
				<tr>
					<!-- <th>ノート</th>
					 -->
					<th class="{!! checkErrorCell('note', $errors) !!}">ノート</th>
					<td>
						<textarea name="note" class="pure-input-1" rows="10">{{ old('note') }}</textarea>
						{{checkLabelError('note', $errors)}}</td>
					
				</tr>

				<tr>
					<th class="{!! checkErrorCell('password', $errors) !!}">パスワード</th>
					<td><input type="password" name="password" value="" class="pure-input-1">
						{{checkLabelError('password', $errors)}}</td>
				</tr>


				@if(\Auth::user()->role_id == ROLE_ADMIN)
				<tr>
					<th class="{!! checkErrorCell('role_id', $errors) !!}">権限</th>
					<td><select name="role_id[]" class="pure-input-1">
							<option value="{!! ROLE_EMPLOYEE !!}">従業員</option>
							<option value="{!! ROLE_BOSS !!}">BOSS</option>
							<option value="{!! ROLE_ADMIN !!}">管理者</option>
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

						<a class="pure-button pure-button-primary" href="{!! $referer !!}">戻る</a>
						<!-- Confirm Submit -->
						@if(\Auth::user()->role_id != ROLE_EMPLOYEE)
							<button class="pure-button button-error" name="submit" type="submit">更新</button>
						@endif
					</td>
				</tr>

				
			</tbody>
		</table>
		</form>
	</section>
</section>
@else
	@include('user.access-denied')
	

@endif

@stop