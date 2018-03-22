@extends('qiantai.index')

@section('title')
商品展示
@endsection

@section('content')
<div class="banner-top">
	<div class="container">
		<h1>商品展示</h1>
		<em></em>
		<h2><a href="/adidas">主页</a><label>/</label>产品</a></h2>
	</div>
</div>
	<!--content-->
		<div class="product">
			<div class="container">
			<div class="col-md-9">
			<div class="mid-popular">
				<!---->
				@foreach($goodslist as $k=>$v)
					
				<div class="col-md-4 item-grid1 simpleCart_shelfItem">
					<div class=" mid-pop">
						<div class="pro-img">
							<img src="/upload/goods_bigpic/{{$v['goods_bigpic']}}" class="img-responsive" alt="">
							<div class="zoom-icon ">
								<a class="picture" href="/upload/goods_bigpic/{{$v['goods_bigpic']}}" rel="title" class="b-link-stripe b-animate-go  thickbox">
									<i class="glyphicon glyphicon-search icon "></i>
								</a>
								<a href="/adidas/single/{{$v['goods_id']}}">
									<i class="glyphicon glyphicon-menu-right icon"></i>
								</a>
							</div>
						</div>
						<div class="mid-1">
							<div class="women">
								<div class="women-top">
									<span>男人</span>
									<h6 style="font-size:15px;"><a href="single.html">{{$v['goods_goodname']}}</a></h6>
								</div>
								<div class="img item_add">
									<a href="#"><img src="/view/images/ca.png" alt=""></a>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="mid-2">
								<p>
									<label>￥{{$v['goods_price']}}</label><em class="item_price">￥{{$v['goods_now_price']}}</em>
								</p>
								<div class="block">
									<div class="starbox small ghosting"> </div>
								</div>
								
								<div class="clearfix"> </div>
							</div>
						</div>						
					</div>
				</div>
					
				@endforeach
				<!---->


					
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="col-md-3 product-bottom">
			<!--categories-->
				<div class=" rsidebar span_1_of_left">
						<h4 class="cate">分类</h4>
							 <ul class="menu-drop">
							<li class="item1"><a href="#">男人 </a>
								<ul class="cute">
									<li class="subitem1"><a href="product.html">可爱的幼猫系列二 
 </a></li>
									<li class="subitem2"><a href="product.html">Strange Stuff </a></li>
									<li class="subitem3"><a href="product.html">Automatic Fails </a></li>
								</ul>
							</li>
							<li class="item2"><a href="#">女人 </a>
								<ul class="cute">
									<li class="subitem1"><a href="product.html">Cute Kittens </a></li>
									<li class="subitem2"><a href="product.html">Strange Stuff </a></li>
									<li class="subitem3"><a href="product.html">Automatic Fails </a></li>
								</ul>
							</li>
							<li class="item3"><a href="#">儿童</a>
								<ul class="cute">
									<li class="subitem1"><a href="product.html">Cute Kittens </a></li>
									<li class="subitem2"><a href="product.html">Strange Stuff </a></li>
									<li class="subitem3"><a href="product.html">Automatic Fails</a></li>
								</ul>
							</li>
							<li class="item4"><a href="#">配饰</a>
								<ul class="cute">
									<li class="subitem1"><a href="product.html">Cute Kittens </a></li>
									<li class="subitem2"><a href="product.html">Strange Stuff </a></li>
									<li class="subitem3"><a href="product.html">Automatic Fails</a></li>
								</ul>
							</li>
									
							<li class="item4"><a href="#">鞋子</a>
								<ul class="cute">
									<li class="subitem1"><a href="product.html">Cute Kittens </a></li>
									<li class="subitem2"><a href="product.html">Strange Stuff </a></li>
									<li class="subitem3"><a href="product.html">Automatic Fails </a></li>
								</ul>
							</li>
						</ul>
					</div>
				<!--initiate accordion-->
						<script type="text/javascript">
							$(function() {
							    var menu_ul = $('.menu-drop > li > ul'),
							           menu_a  = $('.menu-drop > li > a');
							    menu_ul.hide();
							    menu_a.click(function(e) {
							        e.preventDefault();
							        if(!$(this).hasClass('active')) {
							            menu_a.removeClass('active');
							            menu_ul.filter(':visible').slideUp('normal');
							            $(this).addClass('active').next().stop(true,true).slideDown('normal');
							        } else {
							            $(this).removeClass('active');
							            $(this).next().stop(true,true).slideUp('normal');
							        }
							    });
							
							});
						</script>
<!--//menu-->
 <section  class="sky-form">
					<h4 class="cate">优惠</h4>
					 <div class="row row1 scroll-pane">
						 <div class="col col-4">
								<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>降价 10% (20)</label>
						 </div>
						 <div class="col col-4">
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>40% - 50% (5)</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>30% - 20% (7)</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>10% - 5% (2)</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Other(50)</label>
						 </div>
					 </div>
				 </section> 				 				 
				 
					
					 <!---->
					 <section  class="sky-form">
						<h4 class="cate">类型</h4>
							<div class="row row1 scroll-pane">
								<div class="col col-4">
									<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>沙发和床 (30)</label>
								</div>
								<div class="col col-4">
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>包  (30)</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>帽子 (30)</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>大衣   (30)</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>牛仔裤  (30)</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>衬衫   (30)</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>太阳镜  (30)</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>泳衣  (30)</label>
								</div>
							</div>
				   </section>
				   		<section  class="sky-form">
						<h4 class="cate">牌子</h4>
							<div class="row row1 scroll-pane">
								<div class="col col-4">
									<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>流浪者</label>
								</div>
								<div class="col col-4">
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Levis</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Persol</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Nike</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Edwin</label>
									<label class="checkbox"><input type="checkbox" name="checkbox" ><i></i>New Balance</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Paul Smith</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Ray-Ban</label>
								</div>
							</div>
				   </section>		
		</div>
			</div class="clearfix"></div>
				<!--products-->
			
			<!--//products-->
		<!--brand-->
		<div class="container">
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
			</div>
			<!--//brand-->
			</div>
			
		</div>
	<!--//content-->
	@endsection