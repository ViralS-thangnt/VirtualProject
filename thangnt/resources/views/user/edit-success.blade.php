@extends('layout.master')

@section('header-items')


@stop

@section('content')

<section class="contents">
	<!-- Edit - Chinh sua -->
	<h2>Edit (Chinh sua)</h2>
	<!-- <h2>編集（完了）</h2> -->


	<section>
		<p>
			<!-- Toi da duoc cap nhat -->
			
			ID：<a href="{!! url(DETAIL_EMPLOYEE_PATH . $id . '/detail') !!}">{!! $id !!}</a> を更新しました。

		</p>
		<div>
			<!-- Ve man hinh tim kiem -->
			<a class="pure-button pure-button-primary" href="{{ url(SEARCH_PATH) }}">検索画面へ</a>
			<!-- <a class="pure-button pure-button-primary" href="">検索画面へ</a> -->
		</div>
	</section>
</section>



@stop
