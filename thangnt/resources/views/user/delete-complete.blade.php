@extends('layout.master')

@section('header-items')


@stop

@section('content')


<section class="contents">
	<h2>Hoàn thành Delete 削除（完了）</h2>

	<!-- <h2>削除（完了）</h2> -->

	<section>
		<p>
			<!-- 削除しました。 -->
			ID : {!! $id !!} Đã bị xoá  </br>
			ID : {!! $id !!} 削除しました。
		</p>
		<div>
			<!-- <a class="pure-button pure-button-primary" href="">検索画面へ</a> -->
			<a class="pure-button pure-button-primary" href="{{ url(SEARCH_PATH) }}">Quay về màn hình tìm kiếm 検索画面へ</a>

		</div>
	</section>
</section>


@stop