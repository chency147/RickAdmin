@extends('admin.public.framework')
@section('title', '登录')
@section('bodyDataType', 'login')
@section('body')
	<div class="tpl-login">
		<div class="tpl-login-content">
			<div class="tpl-login-logo">
			</div>
			<div id="msg-container"></div>
			<form class="am-form tpl-form-line-form" method="post" action="/admin/login" id="form-login">
				{{ csrf_field() }}
				<div class="am-form-group">
					<input type="text" class="tpl-form-input" id="username" name="username" placeholder="请输入账号">
				</div>
				<div class="am-form-group">
					<input type="password" class="tpl-form-input" id="password" name="password" placeholder="请输入密码">
				</div>
				<div class="am-form-group tpl-login-remember-me">
					<input id="remember-me" type="checkbox">
					<label for="remember-me">
						记住密码
					</label>
				</div>
				<div class="am-form-group">
					<button type="button" id="btn-submit" autocomplete="off"
							class="am-btn am-btn-primary am-btn-block tpl-btn-bg-color-success tpl-login-btn"
							data-am-loading="{spinner: 'circle-o-notch', loadingText: '登录中...'}">登录
					</button>
				</div>
			</form>
		</div>
	</div>
@endsection
@section('footJS')
	<script src="/assets/js/admin/login.js" type="text/javascript"></script>
@endsection
