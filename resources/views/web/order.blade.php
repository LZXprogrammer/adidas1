@extends('qiantai.index')

@section('title')
提交订单
@endsection

@section('content')
<script src="/view/js/area.js"></script>	
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
</style>
<div class="checkout">
	<form action="/adidas/order/insertorder" method="post">
		{{ csrf_field() }}
		<table class="choice_1" id="tab">
			<tr>
				<th>请检查好您的收货地址和购买的商品 确认后请结账</th>
			</tr>
			<tr>
				<th>选择地址：</th>
			</tr>
			@foreach($address as $k=>$v)
			<tr> 
				<td>
					<input type="radio" required name="address_id" value="{{$v['address_id']}}" />
					{{$v['address_province']}}{{$v['address_city']}}{{$v['address_country']}}{{$v['link_address']}}&nbsp;{{$v['link_man']}}收&nbsp;电话：{{$v['link_phone']}}
				</td>
			</tr>
			@endforeach
		</table>

		<input type="button" value="使用新地址" onclick="shou()" /><br><br>	
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
				<td><input type="button" id="tijiao" value="提交" /></td>
			</tr>
		</table>

		<table class="choice">
			<tr>
				<th>商品图片</th>
				<th>商品名称</th>
				<th>商品单价</th>
				<th>商品数量</th>
				<th>商品总价</th>
			</tr>
			@foreach($cart as $k=>$v)
			<input type="hidden" name="cart_id[]" value="{{$v['cart_id']}}" >
			<tr>
				<td><img src="/upload/goods_bigpic/{{$v['cart_goodpic']}}"></td>
				<td>{{$v['cart_goodname']}}&nbsp;{{$v['cart_goodcolor']}}&nbsp;{{$v['cart_goodsize']}}</td>
				<td>￥{{$v['cart_goodprice']}}</td>
				<td>{{$v['cart_goodnum']}}</td>	
				<td>￥<span class="cart_goodsum">{{$v['cart_goodsum']}}</span></td>
			</tr>
			@endforeach
			
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td>总计：￥<span id="sum"></span></td>
			</tr>
			<input type="hidden" id="a" name="orders_total" value="">
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td><input type="submit" class="btn btn-primary" value="结 算" /></td>
			</tr>
		</table>
	</form>
</div>
<!--brand-->
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
<script language="javascript">
	setup();
</script>
<script>
//这个脚本是把订单的所有商品的价格加起来，放到总计里
	var sum = $('#sum');
	var orders_total = $('#a');

	var cart_goodsum = 0;
	$('.cart_goodsum').each(function(){
		cart_goodsum += $(this).html()*1;
	});
	sum.html(cart_goodsum);
	orders_total.val(cart_goodsum); 

</script>
<script>
//这里是添加地址功能的脚本
	$('.choice_2').css('display', 'none');
	function shou(){	
		$('.choice_2').fadeToggle('1');		
	}



	$('#tijiao').click(function(){
		
		var link_man = $("input[name='link_man']").val();
		var link_phone = $("input[name='link_phone']").val();
		var link_address = $("input[name='link_address']").val();
		var address_province = $('#Province').val();
		
		var address_city = $('#Country').val();
		var address_town = $('#Town').val();

		var dizhi = $('#div').html();

		$.get('/adidas/order/ajax',
			{
				link_man: link_man,
				link_phone: link_phone,
				link_address: link_address,
				address_province: address_province,
				address_city: address_city,
				address_country: address_town

			},
			function(msg){
				if ( msg ) {

					dizhi = '<tr><td><input type="radio" required name="address_id" value="'+msg+'" />'+address_province+address_city+address_town+link_address+'&nbsp;'+link_man+'收&nbsp;电话：'+link_phone+'</td></tr>';
					$('#tab').append(dizhi);
				}
			});
	})


</script>
	
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<!-- slide -->

<!--light-box-files -->
<script src="js/jquery.chocolat.js"></script>
<link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen" charset="utf-8">
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

@endsection