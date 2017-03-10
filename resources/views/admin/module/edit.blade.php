@extends('admin.public.basic')
@section('title', '模块编辑')
@section('bodyDataType', 'table')
@section('contentTitle')
@endsection
@section('content')
	<div class="row">
		<div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
			<div class="widget am-cf">
				<div class="widget-head am-cf">
					<div class="widget-title am-fl">模块编辑</div>
					<!--
					<div class="widget-function am-fr">
						<a href="javascript:;" class="am-icon-cog"></a>
					</div>
					-->
				</div>
				<div class="widget-body am-fr">
					<form class="am-form tpl-form-line-form">
						<div class="am-form-group">
							<label for="module-name" class="am-u-sm-3 am-form-label">模块名称 <span
										class="tpl-form-line-small-title">Name</span></label>
							<div class="am-u-sm-9">
								<input type="text" class="tpl-form-input" id="module-name" placeholder="请输入模块名称" maxlength="10">
								<small>请填写标题文字，最多10个字。</small>
							</div>
						</div>

						<div class="am-form-group">
							<label for="module-icon" class="am-u-sm-3 am-form-label">图标 <span
										class="tpl-form-line-small-title">Icon</span></label>
							<div class="am-u-sm-9">
								<input type="text" class="tpl-form-input" id="module-icon" placeholder="请输入模块图标类名" maxlength="32">
								<small>妹子UI icon-font 类名。</small>
							</div>
						</div>

						<div class="am-form-group">
							<label for="module-code" class="am-u-sm-3 am-form-label">编码 <span
										class="tpl-form-line-small-title">Code</span></label>
							<div class="am-u-sm-9">
								<input type="text" class="tpl-form-input" id="module-code" placeholder="请输入模块编码" maxlength="32">
								<small>模块编码，用以今后国际化拓展，采用大驼峰英语词组，最多32个字母。</small>
							</div>
						</div>

						<div class="am-form-group">
							<label for="module-icon" class="am-u-sm-3 am-form-label">排序 <span
										class="tpl-form-line-small-title">Sort</span></label>
							<div class="am-u-sm-2">
								<input type="number" class="tpl-form-input" id="module-icon" placeholder="排序值" maxlength="32">
								<small>只能是数字，越大越靠前显示。</small>
							</div>
							<div class="am-u-sm-7">
							</div>
						</div>

						<div class="am-form-group">
							<label for="user-intro" class="am-u-sm-3 am-form-label">是否显示 <span
										class="tpl-form-line-small-title">Show</span></label>
							<div class="am-u-sm-9">
								<div class="tpl-switch">
									<input type="checkbox" class="ios-switch bigswitch tpl-switch-btn" checked="">
									<div class="tpl-switch-btn-view">
										<div>
										</div>
									</div>
									<small>是否在左侧菜单中显示。</small>
								</div>

							</div>
						</div>

						<div class="am-form-group">
							<div class="am-u-sm-9 am-u-sm-push-3">
								<button type="button" class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection