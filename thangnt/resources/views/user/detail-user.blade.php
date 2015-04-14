@extends('layout.master')

@section('header-items')

	<ul class="pure-menu-list force-right">

		<li class="pure-menu-item">
			<a class="pure-menu-link" href="{{url('auth/logout')}}" class="pure-menu-link">ログアウト</a>
		</li>
		
	</ul>
@stop

@section('content')


<section class="contents">
	<h2>トップページ</h2>
	
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
					<th>名前</th>
					<td>{!! isset($data['name']) ? $data['name'] : '-' !!}</td>
				</tr>
				<tr>
					<!-- Name Kana -->
					<th>名前（カナ）</th>
					<td>{!! isset($data['kana']) ? $data['kana'] : '-' !!}</td>
				</tr>
				<tr>
					<!-- Email -->
					<th>メールアドレス</th>
					<td>{!! isset($data['email']) ? $data['email'] : '-' !!}</td>
				</tr>
				<tr>
					<!-- Phone -->
					<th>電話番号</th>
					<td>{!! isset($data['phone']) ? $data['phone'] : '-' !!}</td>
				</tr>
				<tr>
					<!-- Birthday -->
					<th>生年月日</th>
					<td>{!! isset($data['birthday']) ? $data['birthday'] : '-' !!}</td>
				</tr>
				<tr>
					<!-- Edit button -->
					@if(isset($data['id']))
					<td colspan="2" align="right">
						<a class="pure-button button-secondary" href="{!! url(DETAIL_EMPLOYEE_PATH . $data['id'] . '/edit') !!}">編集</a>
					</td>
					

					@endif


				</tr>
			</tbody>
		</table>


	</section>

</section>


@stop