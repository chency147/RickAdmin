/**
 * 后台管理员登录
 *
 * Created by rick on 17-2-27.
 */
$(function () {
	// 账号、密码表单提交
	$('#btn-submit').click(function () {
		// 设定反馈时间最短为半秒
		var delay = 500;
		var msgContainerID = 'msg-container';
		var $btn = $(this);
		$btn.button('loading');
		// 清空警告框容器
		// amazeUIAlertClear('msg-container');
		ajaxPostRequest('/admin/login', $('#form-login').serializeArray(), function (ret) {
			if (ret.code == 10000) {
				amazeUIAlert(ret.msg, 'success', msgContainerID, true);
				$btn.html('即将跳转...');
				setTimeout(function () {
					document.location.href = '/admin/';
				}, delay * 2);
			} else {
				setTimeout(function () {
					amazeUIAlert(ret.msg, 'danger', msgContainerID, true);
					$btn.button('reset');
					$('#password').val('');
				}, delay);
			}
		}, function (xhr, type) {
			defaultAjaxErrorHandler(delay, msgContainerID, xhr, type, function () {
				$btn.button('reset')
			});
		}, 'json');
		return false;
	});
});

