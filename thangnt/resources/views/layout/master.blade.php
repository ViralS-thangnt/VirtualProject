<html>
<head>
	<meta content="社員管理システム ログインページです。" name="description">
	<title>ログイン | 社員管理システム</title>
	<link href="/login" rel="canonical">
	<link rel="stylesheet" href="./css/pure-min.css">
	<link rel="stylesheet" href="./css/custom.css">
</head>
<body>

	
	@include('layout.header')

	@include('layout.error')

	@yield('content')

	@include('layout.footer')

</body>
</html>