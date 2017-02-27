@extends('admin.public.framework')
@section('title', '登录')
@section('bodyDataType', 'login')
@section('body')
	<div class="tpl-login">
		<div class="tpl-login-content">
			<div class="tpl-login-logo">
			</div>
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
					<input type="submit" value="提交" onclick="return false;" id="btn-submit"
						   class="am-btn am-btn-primary  am-btn-block tpl-btn-bg-color-success  tpl-login-btn"/>
				</div>
			</form>
		</div>
	</div>
@endsection
@section('footJS')
	<script>
		$(function () {
			$('#btn-submit').click(function () {
				ajaxPostRequest('/admin/login', $('#form-login').serializeArray(), function(ret) {

				}, null, 'json');
			});
		})
	</script>
@endsection
