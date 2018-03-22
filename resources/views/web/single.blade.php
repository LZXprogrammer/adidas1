@extends('qiantai.index')

@section('title')
商品详情
@endsection

@section('content')
<div class="banner-top">
	<div class="container">
		<h1>商品详情</h1>
		<em></em>
		<h2><a href="/adidas">主页</a><label>/</label>详情</a></h2>
	</div>
</div>
<div class="single">
	<div class="container">

		@foreach($goodsdetail as $k=>$v)

		<div class="col-md-9">
			<div class="col-md-5 grid">		
				<div class="flexslider">
					
					<ul class="slides">
					@foreach($v['goods_littlepic'] as $kk=>$vv)
						
						@if($kk < 3)
					    <li data-thumb="/upload/goods_littlepic/{{$v['goods_littlepic'][$kk]}}">
					        <div class="thumb-image"> 
					       	 <img src="/upload/goods_littlepic/{{$v['goods_littlepic'][$kk]}}" data-imagezoom="true" class="img-responsive"> 
					        </div>
					    </li> 
					    @endif
					@endforeach
					    
					</ul>
				
				</div>
			</div>	
			<div class="col-md-7 single-top-in">
				<div class="span_2_of_a1 simpleCart_shelfItem">
					<h3>{{$v['goods_goodname']}}</h3>
					<br>
				    <div class="price_single">
					  	<span class="reducedfrom item_price">￥</span>
					  	<span class="reducedfrom item_price">{{$v['goods_now_price']}}</span>		  						 
					 	<div class="clearfix"></div>
					</div>
					<h4 class="quick">商品描述</h4>
					<p class="quick_desc"> {{$v['goods_descr']}}</p>
				    <div class="wish-list">
					    <div>颜色：
					    	@foreach($v['goods_color'] as $c=>$d)
						 	<input type="radio" name="goods_color" value="{{$v['goods_color'][$c]}}" >{{$v['goods_color'][$c]}}
						 	@endforeach						 	
						 </div>
					</div>						 
					<div class="wish-list">	 
						<div>尺码：
							@foreach($v['goods_size'] as $s=>$z)
						 	<input type="radio" name="goods_size" value="{{$v['goods_size'][$s]}}" >{{$v['goods_size'][$s]}}
							@endforeach						 	
						 </div>						 
					</div>
					<div class="quantity"> 						
						<div class="quantity-select">                           
							<div class="entry value-minus">&nbsp;</div>
							<div class="entry value"><span id="goodnum">1</span></div>
							<div class="entry value-plus active">&nbsp;</div>
						</div>
					</div>	 
					<button data="{{$v['goods_id']}}" class="add-to item_add hvr-skew-backward">加入购物车</button>
					<div class="clearfix"> </div>
				</div>		
			</div>
			<input type="hidden" name="goods_bigpic" value="{{$v['goods_bigpic']}}" />
			<div class="clearfix"> </div>
			<!---->
			<div class="tab-head">
			<nav class="nav-sidebar">
				<ul class="nav tabs">
		          <li class="active"><a href="#tab1" data-toggle="tab">Product Description</a></li>
		          <li class=""><a href="#tab2" data-toggle="tab">Additional Information</a></li> 
		          <li class=""><a href="#tab3" data-toggle="tab">Reviews</a></li>  
				</ul>
			</nav>
			</div>
			<div class="tab-content one">
				<div class="tab-pane active text-style" id="tab1">
				 	<div class="facts">
					  	<p > There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined </p>
						<ul>
							<li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Research</li>
							<li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Design and Development</li>
							<li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Porting and Optimization</li>
							<li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>System integration</li>
							<li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Verification, Validation and Testing</li>
							<li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Maintenance and Support</li>
						</ul>         
				    </div>
				</div>
				<div class="tab-pane text-style" id="tab2">	
					<div class="facts">									
						<p > Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections </p>
						<ul >
							<li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Multimedia Systems</li>
							<li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Digital media adapters</li>
							<li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Set top boxes for HDTV and IPTV Player  </li>
						</ul>
			        </div>	
				</div>
				<div class="tab-pane text-style" id="tab3">
					<div class="facts">
						 <p > There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined </p>
						<ul>
							<li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Research</li>
							<li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Design and Development</li>
							<li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Porting and Optimization</li>
							<li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>System integration</li>
							<li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Verification, Validation and Testing</li>
							<li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Maintenance and Support</li>
						</ul>     
				     </div>	
		 		</div> 
		  	</div>
		  	<div class="clearfix"></div>
		</div>	
		@endforeach			
	</div>
</div>
<div class="clearfix"> </div>
	</div>
	</div>
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
	<!--//content-->

<script src="/view/js/imagezoom.js"></script>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script defer src="/view/js/jquery.flexslider.js"></script>
<link rel="stylesheet" href="/view/css/flexslider.css" type="text/css" media="screen" />

<script>
// Can also be used with $(document).ready()
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
});
</script>

<script src="/view/js/simpleCart.min.js"> </script>
<!-- slide -->
<script src="/view/js/bootstrap.min.js"> </script>

<script>
//这里是数量增加的按钮，获取加完后的数量值
$('.value-plus').on('click', function(){
	var divUpd = $(this).parent().find('.value span'); 
	newVal = parseInt(divUpd.text(), 10)+1;
	divUpd.text(newVal);
	cart_goodnum = $('#goodnum').html();
	 
});
//这里是数量减少的按钮，获取减完后的数量值
$('.value-minus').on('click', function(){
	var divUpd = $(this).parent().find('.value span');
	newVal = parseInt(divUpd.text(), 10)-1;
	if(newVal>=1) divUpd.text(newVal);
	cart_goodnum = $('#goodnum').html();
	
});
	cart_goodnum = $('#goodnum').html();

	var goods_id = $("input[name='goods_id']").val();
	var cart_goodpic = $("input[name='goods_bigpic']").val();
	var cart_goodname = $('#goods_goodname').html();
	var cart_goodprice = $('#goods_now_price').html();
	var cart_gooddescr = $('#goods_descr').html();
	/*var cart_goodcolor = $('#color input:checked').val();
	var cart_goodsize = $('#size input:checked').val();*/

	$('button').click(function(){
		var goods_id = $(this).attr('data');
		var cart_goodpic = $(this).parent().parent().next().val();
		var cart_goodname = $(this).parent().children(0).html();
		
		var cart_goodprice = $(this).parent().find('span').eq(1).html();
		var cart_gooddescr = $(this).parent().find('p').html();

		var cart_goodcolor = $(this).parent().find('div').find('input:checked').eq(0).val();
		var cart_goodsize = $(this).parent().find('div').find('input:checked').eq(1).val();

		$.get('/adidas/cart/add',
			{
				goods_id: goods_id,
				cart_goodpic: cart_goodpic,
				cart_goodname: cart_goodname,
				cart_goodprice: cart_goodprice,
				cart_gooddescr: cart_gooddescr,
				cart_goodcolor: cart_goodcolor,
				cart_goodsize: cart_goodsize,
				cart_goodnum: cart_goodnum				
			},
			function(msg){
				if ( msg == 1) {
					layer.alert('添加购物车成功', {
					 	title:'恭喜您',
					 	icon:1,
					    skin: 'layui-layer-molv',
					    closeBtn: 1,
					    shift: 4 //动画类型
					  });
				} else if ( msg == 2 ) {
					layer.msg("您的购物车里已有该商品", function(){});
				} else if ( msg == 0){
					layer.msg("加入购物车失败，请重新添加", function(){});
				} else {
					layer.msg(msg, function(){});
				}
			
			})
	})


</script>

@endsection
