@extends('admin.public.basic')
@section('title', '出错了')
@section('bodyDataType', 'widgets')
@section('content')
	<div class="row-content am-cf">
		<div class="widget am-cf">
			<div class="widget-body">
				<div class="tpl-page-state">
					<div class="tpl-page-state-title am-text-center tpl-error-title">{{ $code }}</div>
					<div class="tpl-error-title-info">{{ $codeMsg }}</div>
					<div class="tpl-page-state-content tpl-error-content">
						<p>{{ $msg }}</p>
						<button type="button" class="am-btn am-btn-secondary am-radius tpl-error-btn">返回上一页</button>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
