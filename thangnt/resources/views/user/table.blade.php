
@if($data)
	@if(count($data) > 0)
	
	<section class="contents"> 
		@include('user.paginate-links')
		
		<table class="pure-table pure-table-bordered">
			<thead>
				<tr>
					<th>ID</th>

					<!-- Name -->
					<th>名前</th>

					<!-- Email -->
					<th>メールアドレス</th>

					<!-- Phone -->
					<th>電話番号</th>

					<!-- Birthday -->
					<th>生年月日</th>

					<!-- Update Date -->
					<th>更新日時</th>

					<!-- Permission - Nguoi quan ly -->
					<th>権限</th>
				</tr>
			</thead>
			<tbody>
				<input type="hidden" value="{{$is_odd = true}}" />
					@foreach($data as $value)
					<tr class="
						{{$is_odd ? 'pure-table-odd' : ''}}
						{{$is_odd = !$is_odd}}	">
						<td>{!! $value['id'] !!}</td>
						<td><a href="{!! url(DETAIL_EMPLOYEE_PATH . $value['id'] . '/detail') !!}">{!! $value['kana'] !!} ({!! $value['name'] !!})</a></td>
						<td>{!! $value['email'] !!}</td>
						<td>{!! $value['phone'] !!}</td>
						<td>{!! $value['birthday'] !!}</td>
						<td>{!! date_format($value['updated_at'], 'Y-m-d')  !!}</td>
						<td>{!! getRoleNameByRoleId($value['role_id']) !!}</td>
					</tr>
					@endforeach
				
			</tbody>
		</table>

		@include('user.paginate-links')
	</section>

	@else
		Result: No record

	@endif
@endif