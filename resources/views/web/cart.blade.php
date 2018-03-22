@extends('qiantai.index')

@section('title')
购物车
@endsection

@section('content')
<div class="banner-top">
	<div class="container">
		<h1>购物车</h1>
		<em></em>
		<h2><a href="index.html">主页</a><label>/</label>购物车</a></h2>
	</div>
</div>
<!--login-->
<script>$(document).ready(function(c) {
	$('.close1').on('click', function(c){
		$('.cart-header').fadeOut('slow', function(c){
			$('.cart-header').remove();
		});
		});	  
	});
</script>
<script>$(document).ready(function(c) {
	$('.close2').on('click', function(c){
		$('.cart-header1').fadeOut('slow', function(c){
			$('.cart-header1').remove();
		});
		});	  
	});
</script>
<script>$(document).ready(function(c) {
	$('.close3').on('click', function(c){
		$('.cart-header2').fadeOut('slow', function(c){
			$('.cart-header2').remove();
		});
		});	  
	});
</script>
<div class="container">
	<div class="check-out">
	<div class="bs-example4" data-example-id="simple-responsive-table">
    <div class="table-responsive">
    	<table class="table-heading simpleCart_shelfItem">
		  <tr>
			<th class="table-grid">商品</th>					
			<th>价格</th>
			<th>数量</th>
			<th >交付 </th>
			<th>合计</th>
		  </tr>
		@foreach($data as $k=>$v)
		
		  <tr class="cart-header">
			<td class="ring-in">
				<a href="/adidas/single/{{$v['goods_id']}}" class="at-in">
					<img src="/upload/goods_bigpic/{{ $v['cart_goodpic'] }}" class="img-responsive" alt="">
				</a>
				<div class="sed">
					<h5><a href="/adidas/single/{{$v['goods_id']}}"> {{ $v['cart_goodname'] }} </a></h5>
					<p>{{ $v['cart_gooddescr'] }}</p>
					<h6>颜色：{{ $v['cart_goodcolor'] }}</h6>
					<h6>尺码：{{ $v['cart_goodsize'] }}</h6>
				</div>
				<div class="clearfix"> </div>
				
			</td>
			<td>￥<span>{{ $v['cart_goodprice'] }}</span></td>
			<td>
				<div class="quantity-select">                           
					<div class="entry value-minus">&nbsp;</div>
					<div class="entry value">
						<span >{{$v['cart_goodnum']}}</span>
					</div>
					<div class="entry value-plus active" data="{{$v['goods_id']}}">&nbsp;</div>

				</div>
			</td>
			<td>免运费</td>
			<td class="item_price">￥<span class="cart_goodsum">{{ $v['cart_goodsum'] }}</span></td>
			<td class="add-check"><a class="item_add hvr-skew-backward" href="/adidas/order/index/{{$v['cart_id']}}">结算</a></td>
			
			<td class="add-check"><button data="{{$v['cart_id']}}" class="item_add hvr-skew-backward">删除</button></td>
		  </tr>
		@endforeach

		<tr>
		  	<td></td>
		  	<td></td>
		  	<td></td>
		  	<td></td>
		  	<td class="item_add hvr-skew-backward">
		  		总计：￥<span id="sum"></span>
		  	</td>
		</tr>
	</table>
	</div>
	</div>
	<div class="produced">
		<a href="/adidas" class="hvr-skew-backward">继续购物</a>
		<a href="/adidas/order/index" id="qbjs" class="hvr-skew-backward">全部结算</a>
	</div>
    </div>
</div>
	
<!--//login-->
<!--brand-->
<div class="container">
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
	</div>
	<!--//brand-->
	</div>
	
</div>


	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<script>
	var sum = $('#sum');
	var cart_goodsum = 0;
	$('.cart_goodsum').each(function(){
		cart_goodsum += $(this).html()*1;
	});
	sum.html(cart_goodsum);

	if( sum.html() == 0 ){
		$('#qbjs').click(function(){
			layer.msg('购物车为空', function(){});
			return false;
		})
	}
	
</script>

<script>
	//在循环里用脚本取值，不能给节点设置ID，
	//只能用当前$(this) 一点点获取	

	$('.value-plus').on('click', function(){
		var divUpd = $(this).parent().find('.value span');
		newVal = parseInt(divUpd.text(), 10)+1;
		divUpd.text(newVal);

		//取出商品ID
		var goods_id = $(this).attr('data');
		//取出商品数量
		var cart_goodnum = $(this).prev().children(0).html();
		//取出商品价格
		var cart_goodprice = $(this).parent().parent().prev().children(0).html();		
		//总价等于数量乘以单价
		var cart_goodsum = cart_goodnum * cart_goodprice;
		
		//放进总金额的值里
		$(this).parent().parent().next().next().children(0).html( cart_goodsum );
		//用ajax传值，实现无刷新增加数量
		$.get('/adidas/cart/update', 
			{
				goods_id: goods_id,
				cart_goodsum: cart_goodsum,
				cart_goodnum: cart_goodnum
			},
			function(msg){
				
			});
		
	});

	$('.value-minus').on('click', function(){
		var divUpd = $(this).parent().find('.value span');
		newVal = parseInt(divUpd.text(), 10)-1;
		if(newVal>=1) divUpd.text(newVal);	

		//取出商品ID
		var goods_id = $(this).next().next().attr('data');
		//取出商品数量
		var cart_goodnum = $(this).next().children(0).html();
		//取出商品价格
		var cart_goodprice = $(this).parent().parent().prev().children(0).html();		
		//总价等于数量乘以单价
		var cart_goodsum = cart_goodnum * cart_goodprice;
		
		//放进总金额的值里
		$(this).parent().parent().next().next().children(0).html( cart_goodsum );
		//用ajax传值，实现无刷新增加数量
		$.get('/adidas/cart/update', 
			{
				goods_id: goods_id,
				cart_goodsum: cart_goodsum,
				cart_goodnum: cart_goodnum
			},
			function(msg){
				
			});
		
	});

	
	
	
	//获取删除的节点
	$('button').each(function(){
		
		$('button').click(function(){
			var button = $(this);
			layer.alert('删除确认~', {
		 		title:['确定删除吗?','font-size:18px;color:white;'],
		 		icon:5,
			    skin: 'layui-layer-molv',
			     btn: ['好嘞']
			    ,closeBtn: 1
			    ,shift: 4 //动画类型
			  },function(){
			  	var cart_id = button.attr('data');	
				// del(cart_id,button);				
				$.get('/adidas/cart/delete/'+cart_id, function(msg){
					if( msg ){
						layer.msg('删除成功', function(){});
						button.parent().parent().remove();
					} else {
						layer.msg('删除失败', function(){});
					}		  			
		  		})
			});
		})
	})
 					
	/*function del(cart_id, button){
		$.get('/adidas/cart/delete/'+cart_id, function(msg){
			if( msg ){
				layer.msg('删除成功', function(){});
				button.parent().parent().remove();
			} else {
				layer.msg('删除失败', function(){});
			}		  			
  		})
	}*/

	


</script>


@endsection