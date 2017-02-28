@extends('admin.public.framework')
@section('css')
	<link rel="stylesheet" href="/assets/css/amazeui.datatables.min.css"/>
	<link href="//cdn.bootcss.com/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet">
	@yield('extendCSS')
@endsection
@section('headJS')
	<script src="//cdn.bootcss.com/echarts/3.4.0/echarts.min.js"></script>
	@yield('extendHeadJS')
@endsection
@section('body')
	@include('admin.public.header')
	@include('admin.public.leftMenu')
	<!-- 内容区域 -->
	<div class="tpl-content-wrapper">
		<div class="container-fluid am-cf">
			<div class="row">
				@yield('contentTitle')
			</div>
		</div>
		<div class="row-content am-cf">
			@yield('content')
		</div>
	</div>
@endsection

@section('footJS')
	<script src="/assets/js/amazeui.datatables.min.js"></script>
	<script src="/assets/js/dataTables.responsive.min.js"></script>
	<script src="//cdn.bootcss.com/sweetalert/1.1.3/sweetalert.min.js"></script>
	@yield('extendFootJS')
@endsection
