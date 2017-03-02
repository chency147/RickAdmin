@extends('admin.public.basic')
@section('title', '模块列表')
@section('bodyDataType', 'table')
@section('contentTitle')
	<!--
	<div class="container-fluid am-cf">
		<div class="row">
			<div class="am-u-sm-12 am-u-md-12 am-u-lg-9">
				<div class="page-header-heading"><span class="am-icon-home page-header-heading-icon"></span> 模块列表
					<small>Amaze UI</small>
				</div>
				<p class="page-header-description">Rua !~</p>
			</div>
			<div class="am-u-lg-3 tpl-index-settings-button">
				<button type="button" class="page-header-button"><span class="am-icon-paint-brush"></span> 设置
				</button>
			</div>
		</div>
	</div>
	-->
@endsection
@section('content')
	<div class="row">
		<div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
			<div class="widget am-cf">
				<div class="widget-head am-cf">
					<div class="widget-title  am-cf">文章列表</div>


				</div>
				<div class="widget-body  am-fr">

					<div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
						<div class="am-form-group">
							<div class="am-btn-toolbar">
								<div class="am-btn-group am-btn-group-xs">
									<button type="button" class="am-btn am-btn-default am-btn-success"><span
												class="am-icon-plus"></span> 新增
									</button>
									<button type="button" class="am-btn am-btn-default am-btn-secondary"><span
												class="am-icon-save"></span> 保存
									</button>
									<button type="button" class="am-btn am-btn-default am-btn-warning"><span
												class="am-icon-archive"></span> 审核
									</button>
									<button type="button" class="am-btn am-btn-default am-btn-danger"><span
												class="am-icon-trash-o"></span> 删除
									</button>
								</div>
							</div>
						</div>
					</div>
					<div class="am-u-sm-12 am-u-md-6 am-u-lg-3">
						<div class="am-form-group tpl-table-list-select">
							<select data-am-selected="{btnSize: 'sm'}">
								<option value="option1">所有类别</option>
								<option value="option2">IT业界</option>
								<option value="option3">数码产品</option>
								<option value="option3">笔记本电脑</option>
								<option value="option3">平板电脑</option>
								<option value="option3">只能手机</option>
								<option value="option3">超极本</option>
							</select>
						</div>
					</div>
					<div class="am-u-sm-12 am-u-md-12 am-u-lg-3">
						<div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
							<input type="text" class="am-form-field ">
							<span class="am-input-group-btn">
            <button class="am-btn  am-btn-default am-btn-success tpl-table-list-field am-icon-search"
					type="button"></button>
          </span>
						</div>
					</div>

					<div class="am-u-sm-12">
						<table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black ">
							<thead>
							<tr>
								<th>名称</th>
								<th>编码</th>
								<th>是否显示</th>
								<th>操作</th>
							</tr>
							</thead>
							<tbody>
							@if(!empty($moduleList))
								@foreach($moduleList as $module)
									<tr class="gradeX">
										<td>
											<i class="am-icon {{$module->icon}}"></i>&nbsp;&nbsp;
											{{$module->name}}
										</td>
										<td>{{$module->code}}</td>
										<td>@if($module->is_show) 是 @else 否 @endif</td>
										<td>
											<div class="tpl-table-black-operation">
												<a href="javascript:;">
													<i class="am-icon-pencil"></i> 编辑
												</a>
												<a href="javascript:;" class="tpl-table-black-operation-del">
													<i class="am-icon-trash"></i> 删除
												</a>
											</div>
										</td>
									</tr>
								@endforeach
							@else
								<tr class="gradeX">
									<td>暂时没有数据</td>
								</tr>
							@endif
							</tbody>
						</table>
					</div>
					<div class="am-u-lg-12 am-cf">
						<div class="am-fr">
							<ul class="am-pagination tpl-pagination">
								<li class="am-disabled"><a href="#">«</a></li>
								<li class="am-active"><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">5</a></li>
								<li><a href="#">»</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
