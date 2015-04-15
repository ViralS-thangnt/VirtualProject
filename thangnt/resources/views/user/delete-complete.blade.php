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
			<li class="pure-menu-item"><span class="pure-menu-link">Đây là tên riêng của người dùng</span></li>
			<li class="pure-menu-item"><a href="" class="pure-menu-link">Tìm kiếm</a></li>
			<li class="pure-menu-item"><a href="" class="pure-menu-link">Thêm mới</a></li>
			<li class="pure-menu-item"><a href="" class="pure-menu-link">Logout</a></li>
		</ul> 
	</nav>

@stop

@section('content')


<section class="contents">
	<h2>Hoàn thành Delete</h2>

	<!-- <h2>削除（完了）</h2> -->

	<section>
		<p>
			<!-- 削除しました。 -->
			ID : {!! $id !!} Đã bị xoá  
			ID : {!! $id !!} 削除しました。
		</p>
		<div>
			<!-- <a class="pure-button pure-button-primary" href="">検索画面へ</a> -->
			<a class="pure-button pure-button-primary" href="">Quay về màn hình tìm kiếm</a>

		</div>
	</section>
</section>


@stop