@extends('layout.index')

@section('title')
后台首页
@endsection

@section('content')           
	
<!-- 主要内容显示 -->
<div id="tableStriped" class="block-area">
	<!-- 主页显示列表-->
	<div id="tableStriped" class="block-area">		
		<div class="table-responsive overflow" style="overflow: hidden;" tabindex="5001">
			<div style="text-align:center;">
				<span style="font-size:32px;">欢迎回来</span>&nbsp;&nbsp;
				<span style="font-size:36px;color:#C0FF3E">
					<b>admin</b>
				</span><br><br>
				
				<hr class="whiter">
				<table style="width:100%;font-size:18px;">
					<tbody><tr height="100">
						@if( session('managers_power') == 1 ) 
						<td>
							<h3 style="color:#ffffcc">管理员管理</h3>
							<a href="/admin/manager/index">管理员列表</a>
							<span>|</span>
							<a href="/admin/manager/add">添加管理员</a>
						</td>
						@endif
						<td>
							<h3 style="color:#ffffcc">用户管理</h3>
							<a href="/admin/user/index">用户列表</a>
							<span>|</span>
							<a href="/admin/user/add">添加用户</a>
						</td>
						<td>
							<h3 style="color:#ffffcc">分类管理</h3>
							<a href="/admin/type/index">分类列表</a>
							<span>|</span>
							<a href="/admin/type/add">添加分类</a>
						</td>
					</tr>
					<tr height="100">
						<td>
							<h3 style="color:#ffffcc">商品管理</h3>
							<a href="/admin/good/index">商品列表</a>
							<span>|</span>
							<a href="/admin/good/add">添加商品</a>
						</td>
						<td>
							<h3 style="color:#ffffcc">订单管理</h3>
							<a href="/admin/order/index">订单列表</a>
						</td>
						<td>
							<h3 style="color:#ffffcc">地址管理</h3>
							<a href="/admin/address/index">地址列表</a>
						</td>
					</tr>
					<tr height="100">
						<td>
							<h3 style="color:#ffffcc">公告管理</h3>
							<a href="/admin/notice/index">公告列表</a>
							<span>|</span>
							<a href="/admin/notice/add">添加公告</a>
						</td>
						<td>
							<h3 style="color:#ffffcc">广告管理</h3>
							<a href="/admin/carousel/index">广告列表</a>
							<span>|</span>
							<a href="/admin/carousel/add">	添加广告</a>
						</td>
						<td>
							<h3 style="color:#ffffcc">评论系统</h3>
							<a href="/lining_shop/index.php/admin/replay/index">评论列表</a>
						</td>
					</tr>
					<tr height="100">
						<td>
							<h3 style="color:#ffffcc">友情链接</h3>
							<a href="/admin/link/index">链接列表</a>
							<span>|</span>
							<a href="/admin/link/add">添加链接</a>
						</td>
						<td>
							<h3 style="color:#ffffcc">回复系统</h3>
							<a href="/lining_shop/index.php/admin/Question/index">问题列表</a>
						</td>
					</tr>
				</tbody></table>
			</div>
			<div style="text-align:center;" class="rightAside accountCenter pl20 mt30 fr">
				
			</div>
	
		</div>
	</div>
</div>
<!-- 主要内容结束 -->
@endsection