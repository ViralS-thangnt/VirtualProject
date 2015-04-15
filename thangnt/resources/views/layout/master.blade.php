<html>
<head>
	<meta content="社員管理システム ログインページです。" name="description">
	<title>ログイン | 社員管理システム</title>
	<link href="/login" rel="canonical">
	<link rel="stylesheet" href="{{ url('css/pure-min.css')}}">
	<!-- ./css/pure-min.css -->
	<link rel="stylesheet" href="{{ url('css/custom.css')}}">
</head>
<body>

	
	@include('layout.header')

	

	@yield('content')

	@include('layout.footer')

</body>
</html>