<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('title') —— RickAdmin后台管理系统</title>
	<meta name="description" content="RickAdmin后台管理系统">
	<meta name="keywords" content="index">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="renderer" content="webkit">
	<meta http-equiv="Cache-Control" content="no-siteapp"/>
	<meta name="csrfToken" id="csrfToken" content="{{ csrf_token() }}">
	<link rel="icon" type="image/png" href="/assets/i/favicon.png">
	<link rel="apple-touch-icon-precomposed" href="/assets/i/app-icon72x72@2x.png">
	<meta name="apple-mobile-web-app-title" content="Amaze UI"/>
	<link href="//cdn.bootcss.com/amazeui/2.7.2/css/amazeui.min.css" rel="stylesheet">
	<link rel="stylesheet" href="/assets/css/app.css">
	@yield('css')
	<script src="//cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>
	@yield('headJS')
</head>
<body data-type="@yield('bodyDataType')">
<script src="/assets/js/theme.js"></script>
<div class="am-g tpl-g">
	<!-- 风格切换 -->
	<div class="tpl-skiner">
		<div class="tpl-skiner-toggle am-icon-cog">
		</div>
		<div class="tpl-skiner-content">
			<div class="tpl-skiner-content-title">
				选择主题
			</div>
			<div class="tpl-skiner-content-bar">
				<span class="skiner-color skiner-white" data-color="theme-white"></span>
				<span class="skiner-color skiner-black" data-color="theme-black"></span>
			</div>
		</div>
	</div>
	@yield('body')
</div>
<script src="//cdn.bootcss.com/amazeui/2.7.2/js/amazeui.min.js"></script>
<script src="/assets/js/app.js"></script>
@yield('footJS')
</body>
</html>
