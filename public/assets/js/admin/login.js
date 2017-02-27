/**
 * 后台管理员登录
 *
 * Created by rick on 17-2-27.
 */
$(function () {
	// 账号、密码表单提交
	$('#btn-submit').click(function () {
		ajaxPostRequest('/admin/login', $('#form-login').serializeArray(), function(ret) {
			if (ret.code == 10000) {
				document.location.href = '/admin/';
			}
		}, null, 'json');
	});
});
