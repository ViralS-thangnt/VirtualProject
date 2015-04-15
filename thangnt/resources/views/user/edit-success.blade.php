@extends('layout.master')

@section('header-items')

	<nav class="home-menu pure-menu pure-menu-horizontal relative">
		<h1 class="pure-menu-heading"><a href="">Hệ thống quản lý nhân viên</a></h1>
		<ul class="pure-menu-list force-right">
			<li class="pure-menu-item"><span class="pure-menu-link">Đây là tên riêng của người dùng</span></li>
			<li class="pure-menu-item"><a href="" class="pure-menu-link">Tìm kiếm</a></li>
			<li class="pure-menu-item"><a href="" class="pure-menu-link">Thêm mới</a></li>
			<li class="pure-menu-item"><a href="" class="pure-menu-link">Logout</a></li>
		</ul> 
		<!-- 
		<h1 class="pure-menu-heading"><a href="">社員管理システム</a></h1>
		<ul class="pure-menu-list force-right">
			<li class="pure-menu-item"><span class="pure-menu-link">岸 由一郎</span></li>
			<li class="pure-menu-item"><a href="" class="pure-menu-link">検索</a></li>
			<li class="pure-menu-item"><a href="" class="pure-menu-link">追加</a></li>
			<li class="pure-menu-item"><a href="" class="pure-menu-link">ログアウト</a></li>
		</ul> 
		-->
	</nav>

@stop

@section('content')

<section class="contents">
	<!-- Edit - Chinh sua -->
	<h2>Edit (Chinh sua)</h2>
	<!-- <h2>編集（完了）</h2> -->


	<section>
		<p>
			<!-- Toi da duoc cap nhat -->
			ID：<a href="{!! url(DETAIL_EMPLOYEE_PATH . $id . '/detail') !!}">{!! $id !!}</a> Ban ghi da duoc cap nhat
			ID：<a href="{!! url(DETAIL_EMPLOYEE_PATH . $id . '/detail') !!}">{!! $id !!}</a> を更新しました。

		</p>
		<div>
			<!-- Ve man hinh tim kiem -->
			<a class="pure-button pure-button-primary" href="">Ve man hinh tim kiem</a>
			<!-- <a class="pure-button pure-button-primary" href="">検索画面へ</a> -->
		</div>
	</section>
</section>



@stop
