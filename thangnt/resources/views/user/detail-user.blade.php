@extends('layout.master')

@section('header-items')

	
@stop

@section('content')


<form method="POST" action="{!! url(DETAIL_EMPLOYEE_PATH . $data['id'] . '/delete/conf') !!}">
<input type="hidden" name="_token" value="{{csrf_token()}}" />
<input type="hidden" name="_method" id="_method" value="POST" />
<section class="contents">
	<h2>Trang đầu</h2>
	<!-- <h2>トップページ</h2> -->
	
	<section>
		
		<table class="pure-table pure-table-bordered" width="100%">
			<tbody>
				<tr>
					<!-- ID -->
					<th>ID</th>
					<td>{!! isset($data['id']) ? $data['id'] : '-' !!}</td>
				</tr>
				<tr>
					<!-- Name -->
					<th>Name</th>
					<!-- <th>名前</th> -->

					<td>{!! isset($data['name']) ? $data['name'] : '-' !!}</td>
				</tr>
				<tr>
					<!-- Name Kana -->
					<th>Kana Name</th>
					<!-- <th>名前（カナ）</th> -->
					<td>{!! isset($data['kana']) ? $data['kana'] : '-' !!}</td>
				</tr>
				<tr>
					<!-- Email -->
					<!-- <th>メールアドレス</th> -->
					<th>Email</th>
					<td>{!! isset($data['email']) ? $data['email'] : '-' !!}</td>
				</tr>
				<tr>
					<!-- Phone -->
					<th>Phone</th>
					<!-- <th>電話番号</th> -->
					<td>{!! isset($data['phone']) ? $data['phone'] : '-' !!}</td>
				</tr>
				<tr>
					<!-- Birthday -->
					<th>Birthday</th>
					<!-- <th>生年月日</th> -->
					<td>{!! isset($data['birthday']) ? $data['birthday'] : '-' !!}</td>
				</tr>

				@if(\Auth::user()->role_id != ROLE_EMPLOYEE)
				<!-- Admin or Boss -->

				<tr>
					<!-- <th>ノート</th> -->
					<th>Ghi chu</th>
					<td>{!! isset($data['note']) ? $data['note'] : '-' !!}</td>
				</tr>
				<tr>
					<th>Role</th>
					<td>{!! isset($role_name) ? $role_name : '-' !!}</td>
				</tr>
				<tr>
					<th>BOSS</th>
					<td>{!! isset($boss_name) ? $boss_name : '-' !!}</td>
				</tr>
				<tr>
					<!-- <th>更新日時</th> -->
					<th>Ngay sửa đổi</th>
					<td>{!! isset($data['updated_at']) ? $data['updated_at'] : '-' !!}</td>
				</tr>

				<tr>
					<td colspan="2" align="right">
					<!-- To Search Button -->
					<a class="pure-button pure-button-primary" href="{{ url(SEARCH_PATH) }}">Về màn hình tìm kiếm</a>

					<!-- Edit button -->
					@if(isset($data['id']) )
					
						<a class="pure-button button-secondary" href="{!! url(DETAIL_EMPLOYEE_PATH . $data['id'] . '/edit') !!}">Edit</a>

						<!-- <a class="pure-button button-secondary" href="{!! url(DETAIL_EMPLOYEE_PATH . $data['id'] . '/edit') !!}">編集</a> -->
						<!-- <button class="pure-button button-error" name="submit" type="submit">編集</button> -->
					
						<!-- 
						<a class="pure-button pure-button-primary" href="">検索画面へ</a>
						<a class="pure-button button-secondary" href="">編集</a>
						<a class="pure-button button-error" href="">削除</a> 
						-->
					@endif

					<!-- Delete Button  -->
					<!-- 編集 -->
					<button class="pure-button button-error" name="submit" type="submit">Delete</button>
					
					</td>
				</tr>

				@else

				<!-- Employee -->
				@if(isset($data['id']) )
				<tr>
					<td colspan="2" align="right">
						<a class="pure-button button-secondary" href="{!! url(DETAIL_EMPLOYEE_PATH . $data['id'] . '/edit') !!}">Edit</a>
					</td>
				</tr>
				@endif

				@endif


			</tbody>
		</table>


	</section>

</section>
</form>
@stop