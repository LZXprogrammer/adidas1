@extends('qiantai.index')

@section('title')
个人中心
@endsection

@section('content')	
	<style type="text/css">
		.checkout{																					
			width:80%;
			height:auto;
			margin:0 auto;
			//border:1px solid #000;
		}
		.checkout form{
			width:100%;
			height:auto;
			//border:1px solid #000;
		}
		.choice_1{
			width:80%;
			height:auto;
			//border:1px solid #000;
			text-align:center;
			
		}
		.choice{
			width:80%;
			height:auto;
			//border:1px solid #f00;
			text-align:center;
			margin:0 auto;
		}
		.choice img{
			width:100px;
			height:100px;
		}
		input[type=checkbox]{
			width:20px;
			height:20px;
		}
		.choice-2{
			width:80%;
			height:auto;
			//border:1px solid #f00;
			//text-align:center;
			margin:0 auto;
		}
		.choice_2 img{
			width:100px;
			height:100px;
		}
		.choice_2 input[type=submit]{
			width:100px;
			height:30px;
			background-color:#000;
			color:#fff;
		}
		.choice_2 span{
			font-size:32px;
		}
		h2{
			color:rgb(247,202,201);
			background-color:#abc;
		}
		.nr{
			margin-top:40px;
		}
	</style>

<script src="/view/js/area.js"></script>
<div class="checkout">
	<center>
	<h2 style="color:#000;">个人中心</h2><br>
	</center>
	<div class="nr">
	<form action="/adidas/person/update" method="post">
		{{ csrf_field() }}		
		<h2 onclick="shou($(this))">个人资料</h2>
		<table class="choice_2">
			
			<tr>
				<td colspan="2">
					<h3>基本资料</h3>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					亲爱的<span style="color:#abc;">{{$data['users_username']}}</span>,欢迎来到个人中心
				</td>
			</tr>			
			<tr>
				<td>昵称：</td>
				<td><input type="text"  value="{{$data['users_username']}}" /></td>
			</tr>
			<tr>
				<td>真实姓名：</td>
				<td><input type="text" name="users_realname" value="{{$data['users_realname']}}" /></td>
			</tr>
			<tr>
				<td>电话：</td>
				<td>
					<input type="text" name="users_phone" value="{{$data['users_phone']}}" />			
				</td>
			</tr>
			<tr>
				<td>地址：</td>
				<td>
					<input type="text" name="users_address" value="{{$data['users_address']}}" />
				</td>
			</tr>
			<tr>
				<td>邮编：</td>
				<td>
					<input type="text" name="users_code" value="{{$data['users_code']}}" />
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" value="提交" />
				</td>
			</tr>
		</table>

	</form>
	</div>
	<div class="nr">
	<form>
		<h2 onclick="shou($(this))">管理收货地址</h2>
		
		<table class="choice_2">
			
			@foreach($data1 as $k=>$v)
			<tr>
				<td>联系人：</td>
				<td>{{$v['link_man']}}</td>
				
				<td>电话：</td>
				<td>{{$v['link_phone']}}</td>
				
				<td>邮编：</td>
				<td>{{$v['address_code']}}</td>
				
				<td>地址：</td>
				<td>{{$v['address_province']}}{{$v['address_city']}}{{$v['address_country']}}{{$v['link_address']}}</td>
				
				<td>
				<a href="/adidas/person/delete/{{$v['address_id']}}">删除</a>
				</td>
			</tr>
			@endforeach
			
		</table>
	
	</form>
	</div>
	<div class="nr">
	<form action="/adidas/person/insert" method="post">
	
	{{ csrf_field() }}	
	<h2 onclick="shou($(this))">添加地址</h2>
		<table class="choice_2">
			<tr>
				<td>联系人：</td>
				<td><input type="text" name="link_man"></td>
			</tr>
			<tr>
				<td>电话：</td>
				<td><input type="text" name="link_phone"></td>
			</tr>
			<tr>
				<td>地址：</td>
				<td>
				<select id="Province" runat="server" name="address_province" style="width: 90px" ></select>
				<select id="Country" runat="server" name="address_city" style="width: 90px"></select>
				<select id="Town" runat="server" name="address_country" style="width: 90px"></select>		
				</td>				
			</tr>
			<tr>
				<td>详细地址：</td>
				<td><input type="text" name="link_address"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="提交" /></td>
			</tr>
		</table>
	</form>
	</div>
	<!-- 这里是我的订单显示 -->
	<div class="nr">
	<form>
	<h2 onclick="shou($(this))">我的订单</h2>
	<table class="choice">
		<tr>
			<td>订单号</td>
			<td>下单时间</td>
			<td>下单用户</td>
			<td>订单总额</td>
			<td>订单状态</td>
			<td>操作</td>			
		</tr>
		@foreach($order as $k=>$v)
		<tr>			
			<td>#{{$v['orders_number']}}</td>
			<td>{{$v['orders_addtime']}}</td>
			<td>{{$v['users_username']}}</td>	
			<td>{{$v['orders_total']}}</td>	
			<td>
				@if($v['orders_state']==0) 待付款
                @elseif($v['orders_state']==1) 待发货 
                @elseif($v['orders_state']==2) 已发货              
                @elseif($v['orders_state']==3) 待收货 
                @elseif($v['orders_state']==4) 交易成功 
                @elseif($v['orders_state']==5) 待评价 
                @elseif($v['orders_state']==6) 已评价 
                @elseif($v['orders_state']==7) 失效订单 
                @endif
			</td>
			<td><a href="/adidas/person/ordetail/{{$v['orders_id']}}/{{$v['address_id']}}">查看</a>
				@if($v['orders_state']==2)
				 <a href="/adidas/person/updateshou/{{$v['orders_id']}}">确认收货</a>
				@endif
			</td>
		</tr>
		@endforeach
	</table>
	</form>
	</div>
		
	<!---->
	

</div>	
<script language="javascript">
	setup();
</script>
<!--brand-->
	<div class="brand">
		<div class="col-md-3 brand-grid">
			<img src="images/ic.png" class="img-responsive" alt="">
		</div>
		<div class="col-md-3 brand-grid">
			<img src="images/ic1.png" class="img-responsive" alt="">
		</div>
		<div class="col-md-3 brand-grid">
			<img src="images/ic2.png" class="img-responsive" alt="">
		</div>
		<div class="col-md-3 brand-grid">
			<img src="images/ic3.png" class="img-responsive" alt="">
		</div>
		<div class="clearfix"></div>
	</div>
	<!--//brand-->
	</div>
	
</div>
	<!--//content-->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<!-- slide -->

<!--light-box-files -->


<!--light-box-files -->
<script type="text/javascript" charset="utf-8">
$(function() {
	$('a.picture').Chocolat();
});
</script>
<script>
$(function(){
	var t = $("#text_box");
	$("#add").click(function(){       
		t.val(parseInt(t.val())+1)
		setTotal();
	})
	$("#min").click(function(){
		t.val(parseInt(t.val())-1)
		setTotal();
	})
	   function setTotal(){
	 var tt = $("#text_box").val();
	 var  pbinfoid=$("#pbinfoid").val();
		if(tt<=0){
		alert('输入的值错误！');
		t.val(parseInt(t.val())+1)
		}else{
		window.location.href = "#"+pbinfoid+"&number="+tt;
		}
	}
   
})
</script>
<script>
	$('table').css('display', 'none');
	function shou(a){	
		a.next().fadeToggle('1');		
	}
</script>

@endsection