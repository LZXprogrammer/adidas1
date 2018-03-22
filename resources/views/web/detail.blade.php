@extends('qiantai.index')

@section('title')
订单详情
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
			color:#abc;
		}
</style>

<div style="width:80%;height:auto;margin:0 auto;">
	<form method="" action="">
	<br>
		<p>收货人信息</p><br />
		
		<div style="width:400px;height:auto;margin-left:20px;">
			联系人：{{$address['link_man']}} 收<br />
			联系地址：{{$address['address_province']}}{{$address['address_city']}}{{$address['address_country']}}{{$address['link_address']}}<br />
			联系电话：{{$address['link_phone']}} <br />

		</div><br />
		@foreach($detail as $k=>$v)
		<hr>
		<table>
			<thead>订单信息</thead>
			<tbody>
				
				<tr>
					<td>订单号：{{$v['orders_number']}}</td>
					<td>订单时间：{{$v['orders_addtime']}}</td>
				</tr>
			</tbody>
		</table>
		
		<table>
			<thead>订购商品清单</thead>
			<tbody>
				<tr>
					<td>商品名称</td>
					<td>商品图片</td>
					<td>商品颜色</td>
					<td>商品尺码</td>
					<td>商品描述</td>
					<td>商品价格</td>
					<td>商品数量</td>
					<td>商品小计</td>					
				</tr>
				
				<tr>
					<td>{{$v['cart_goodname']}}</td>
					<td>
						<img style="width:50px;" src="/upload/goods_bigpic/{{$v['cart_goodpic']}}" />
					</td>
					<td>{{$v['cart_goodcolor']}}</td>
					<td>{{$v['cart_goodsize']}}</td>
					<td>{{$v['cart_gooddescr']}}</td>
					<td>{{$v['cart_goodprice']}}</td>
					<td>{{$v['cart_goodnum']}}</td>
					<td>{{$v['cart_goodsum']}}</td>
				</tr>
				
			</tbody>
		</table>
		<hr>
		<input type="hidden" name="orders_total" value="{{$v['orders_total']}}" />
		@endforeach
		<table>
			<tr>
				<td></td> <td></td> <td></td> <td></td>
				<td></td> <td></td> <td></td> <td></td> 
				<td></td> <td></td> <td></td>
				<td style="color:red;">总价：￥<span  id="sum">1</span></td>
				
			</tr>
		</table>
	</form>
	
</div>

<!--brand-->s
<div class="brand">
	<div class="col-md-3 brand-grid">
		<img src="/view/images/ic.png" class="img-responsive" alt="">
	</div>
	<div class="col-md-3 brand-grid">
		<img src="/view/images/ic1.png" class="img-responsive" alt="">
	</div>
	<div class="col-md-3 brand-grid">
		<img src="/view/images/ic2.png" class="img-responsive" alt="">
	</div>
	<div class="col-md-3 brand-grid">
		<img src="/view/images/ic3.png" class="img-responsive" alt="">
	</div>
	<div class="clearfix"></div>
</div>
<!--//brand-->
</div>
</div>
<script>
	var sum = $('#sum');
	var orders_total = $("input[name='orders_total']").val()
	sum.html(orders_total);
</script>
	
<!--light-box-files -->
<script src="js/jquery.chocolat.js"></script>
<link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen" charset="utf-8">
<!--light-box-files -->
<script type="text/javascript" charset="utf-8">
$(function() {
	$('a.picture').Chocolat();
});
</script>

@endsection