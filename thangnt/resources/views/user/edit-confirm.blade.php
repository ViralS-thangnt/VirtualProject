@extends('layout.master')

@section('header-items')

@stop

@section('content')

<section class="contents">
	<h2>編集（確認）</h2>
	<!-- <h2>Xác nhận Edit 編集（確認）</h2> -->

	<section>
		<form method="POST" action="{!! url(DETAIL_EMPLOYEE_PATH . $id . '/edit/') !!}">
		<input type="hidden" name="_token" value="{{csrf_token()}}" />
    	<input type="hidden" name="_method" id="_method" value="POST" />

		<table class="pure-table pure-table-bordered" width="100%">
			<tbody>
				<tr>
					<th>ID</th>
					<td>{!! $id !!}</td>
				</tr>
				<tr>
					<th>名前</th>
					<!-- <td>青木 栄一</td> -->
					<!-- <th>Tên gọi 名前</th> -->
					<td>{!! $name !!}</td>
					<input type="hidden" name="name" value="{!! $name !!}"/>
				</tr>
				<tr>
					<th>名前（カナ）</th>
					<!-- <td>あおき えいいち</td> -->

					<!-- <th>Ten Kana 名前（カナ）</th> -->
					<td>{!! $kana !!}</td>
					<input type="hidden" name="kana" value="{!! $kana !!}"/>
					<!-- <th>名前（カナ）</th>
					<td>あおき えいいち</td> -->
				</tr>
				<tr>
					<th>メールアドレス</th>
					<td>{!! $email !!}</td>
					<input type="hidden" name="email" value="{!! $email !!}"/>

					<!-- <th>メールアドレス</th>
					<td>aoki@example.com</td> -->
				</tr>
				<tr>
					<!-- <th>電話番号</th>
					<td>090-0123-4567</td> -->
					<th>電話番号</th>
					<td>{!! $phone !!}</td>
					<input type="hidden" name="phone" value="{!! $phone !!}"/>
				</tr>
				<tr>
					<th>生年月日</th>
					<td>{!! $birthday !!}</td>
					<input type="hidden" name="birthday" value="{!! $birthday !!}"/>
					<!-- <th>生年月日</th>
					<td>1932/12/10</td> -->
				</tr>
				<tr>
					<!-- <th>ノート</th>
					<td>日本の地理学者。<br>東京学芸大学名誉教授。<br>理学博士。<br>歴史地理学会会長。<br>元駿河台大学教授。<br>専門は文化地理学、交通地理学、地図情報論、交通情報論、産業考古学。<br>研究テーマは地域社会を通じての鉄道の歴史地理学、シーパワーの政治地理学、及び海事史。<br>鉄道ファンとして知られる。<br>またそれを個人的趣味にとどめることなく、主にアマチュアである鉄道ファンによって支えられてきた鉄道分野の研究を、文化地理学の一環として認知・昇華させるべく活動している。
					</td> -->
					<th>ノート</th>
					<td>
						{!! $note !!}
					</td>
					<input type="hidden" name="note" value="{!! $note !!}"/>
				</tr>
				<tr>
					<!-- <th>権限</th>
					<td>従業員</td> -->
					<th>権限</th>
					<td>{!! $role_name !!}</td>

				</tr>
				<tr>
					<!-- <th>BOSS</th>
					<td>岸 由一郎</td> -->
					<th>BOSS</th>
					<td>{!! $boss_name !!}</td>
				</tr>
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

						<button class="pure-button button-error" name="submit" type="submit">更新</button>

					</td>
				</tr>
			</tbody>
		</table>

		<input type="hidden" name="updated_at" value="{{(new DateTime())->format('Y-m-d H:i:s')}}" />


		</form>
	</section>
</section>



@stop