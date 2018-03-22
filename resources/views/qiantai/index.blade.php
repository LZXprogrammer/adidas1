<!DOCTYPE html>
<html>  
<head>
<title>@section('title')主页@show</title>
<link href="/view/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<!--theme-style-->
<link href="/view/css/style.css" rel="stylesheet" type="text/css" media="all" />  
<link href="/view/lunbo/css/lunbo.css" rel="stylesheet" type="text/css" media="all" /> 
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Shopin Responsive web template, Bootstrap Web Templates, Flat Web Templates, AndroId Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--theme-style-->
<link href="/view/css/style4.css" rel="stylesheet" type="text/css" media="all" /> 
<!--//theme-style-->
<script src="/view/js/jquery.min.js"></script>
<script src="/view/js/jquery-1.8.3.min.js"></script>
<script src="/view/layer/layer.js"></script>
<!-- start-rate-->
<script src="/view/js/jstarbox.js"></script>
  <link rel="stylesheet" href="/view/css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
    <script type="text/javascript">
      jQuery(function() {
      jQuery('.starbox').each(function() {
        var starbox = jQuery(this);
          starbox.starbox({
          average: starbox.attr('data-start-value'),
          changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
          ghosting: starbox.hasClass('ghosting'),
          autoUpdateAverage: starbox.hasClass('autoupdate'),
          buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
          stars: starbox.attr('data-star-count') || 5
          }).bind('starbox-value-changed', function(event, value) {
          if(starbox.hasClass('random')) {
          var val = Math.random();
          starbox.next().text(' '+val);
          return val;
          } 
        })
      });
    });
    </script>
<!--//End-rate-->

</head>
<body>
<!--header-->
<div class="header">
<div class="container">
    <div class="head">
      <div class=" logo">
        <a href="index.html"><img src="/view/images/adidas.jpg" alt=""></a> 
      </div>
    </div>
  </div>
  <div class="header-top">
    <div class="container">
    <div class="col-sm-5 col-md-offset-2  header-login">
          <ul >
            <li>
              <a href="#">
                @if( session()->has('users_username') )
                  你好,{{ session('users_username') }}
                 <a href="/adidas/person/index">个人中心</a>|
                 <a href="/adidas/login/loginout">退出</a>
                @else
                  <a href="/adidas/login">登录</a>
                @endif
              </a>
            </li>
            <li><a href="/adidas/register">注册</a></li>
            <li><a href="checkout.html">结账</a></li>
          </ul>
        </div>
        
      <div class="col-sm-5 header-social">    
          <ul >
            <li><a href="#"><i></i></a></li>
            <li><a href="#"><i class="ic1"></i></a></li>
            <li><a href="#"><i class="ic2"></i></a></li>
            <li><a href="#"><i class="ic3"></i></a></li>
            <li><a href="#"><i class="ic4"></i></a></li>
          </ul>
          
      </div>
        <div class="clearfix"> </div>
    </div>
    </div>
    
    <div class="container">
    
      <div class="head-top">
      
     <div class="col-sm-8 col-md-offset-2 h_menu4">
        <nav class="navbar nav_bottom" role="navigation">
 
 <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header nav_2">
      <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
        <span class="sr-only">导航切换</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
     
   </div> 
   <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
        <ul class="nav navbar-nav nav_1">
            <li><a class="color" href="/adidas">主页</a></li>
        @foreach($res as $k=>$v) 
        <li class="dropdown mega-dropdown active">
          <a class="color1" href="/adidas/product" class="dropdown-toggle" data-toggle="dropdown">
            {{$v['types_name']}}<span class="caret"></span>
          </a>       
        <div class="dropdown-menu ">
          <div class="menu-top">
            @foreach($v['sub'] as $kk=>$vv)
            <div class="col1">
              <div class="h_nav">
                <h4>
                <a class="color1" href="/adidas/product/{{$vv['types_id']}}/{{$vv['types_path']}}" class="dropdown-toggle" >{{$vv['types_name']}}
                </a>
                </h4>
                  <ul>
                    @foreach($vv['sub'] as $kkk=>$vvv)
                      <li><a href="/adidas/product/{{$vvv['types_id']}}/{{$vvv['types_path']}}">{{$vvv['types_name']}}</a></li>
                    @endforeach
                  </ul> 
              </div>              
            </div>
            @endforeach
            <div class="col1 col5">
            <img src="/view/images/me.png" class="img-responsive" alt="">
            </div>
            <div class="clearfix"></div>
          </div>                  
        </div>        
      </li>
      @endforeach
    </ul>
     </div><!-- /.navbar-collapse -->

</nav>
      </div>
      <div class="col-sm-2 search-right">
        <ul class="heart">
        <li>
        <a href="wishlist.html" >
        <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
        </a></li>
        <li><a class="play-icon popup-with-zoom-anim" href="#small-dialog"><i class="glyphicon glyphicon-search"> </i></a></li>
          </ul>
          <div class="cart box_1">
            <a href="/adidas/cart/index">
              <h3> 
                <div class="total">
                  <span class="simpleCart_total"></span>
                </div>
                <img src="/view/images/cart.png" alt=""/>
              </h3>
            </a>
            <p><a href="javascript:;" class="simpleCart_empty">空购物车</a></p>

          </div>
          <div class="clearfix"> </div>
          
            <!---->

            <!-- pop-up-box-->            
      <link href="/view/css/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>
      <script src="/view/js/jquery.magnific-popup.js" type="text/javascript"></script>
      <!--//pop-up-box-->
      <div id="small-dialog" class="mfp-hide">
        <div class="search-top">
          <div class="login-search">
            <input type="submit" value="">
            <input type="text" value="Search.." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search..';}">   
          </div>
          <p>购物</p>
        </div>        
      </div>
     <script>
      $(document).ready(function() {
      $('.popup-with-zoom-anim').magnificPopup({
      type: 'inline',
      fixedContentPos: false,
      fixedBgPos: true,
      overflowY: 'auto',
      closeBtnInside: true,
      preloader: false,
      midClick: true,
      removalDelay: 300,
      mainClass: 'my-mfp-zoom-in'
      });
                                            
      });
    </script>   
           
      </div>
      <div class="clearfix"></div>
    </div>  
  </div>  
</div>
<!--banner-->
@section('content')

@show

  <!--//footer-->
  <div class="footer">
  <div class="footer-middle">
        <div class="container">
          <div class="col-md-3 footer-middle-in">
            <a href="/adidas/person"><img src="/view/images/adidas.jpg" alt=""></a>
            @foreach($link as $k=>$v)
            <br>
            <a href="{{$v['links_url']}}">{{$v['links_name']}}</a>
            @endforeach
            
          </div>
          
          <div class="col-md-3 footer-middle-in">
            <h6>信息</h6>
            <ul class=" in">
              <li><a href="404.html">关于</a></li>
              <li><a href="contact.html">联系我们</a></li>
              <li><a href="#">退货</a></li>
              <li><a href="contact.html">网站地图</a></li>
            </ul>
            <ul class="in in1">
              <li><a href="#">订单记录</a></li>
              <li><a href="wishlist.html">意愿清单</a></li>
              <li><a href="login.html">登录</a></li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="col-md-3 footer-middle-in">
            <h6>标签</h6>
            <ul class="tag-in">
              <li><a href="#">Lorem</a></li>
              <li><a href="#">Sed</a></li>
              <li><a href="#">Ipsum</a></li>
              <li><a href="#">Contrary</a></li>
              <li><a href="#">Chunk</a></li>
              <li><a href="#">Amet</a></li>
              <li><a href="#">Omnis</a></li>
            </ul>
          </div>
          <div class="col-md-3 footer-middle-in">
            <h6>时事通讯</h6>
            <span>订阅</span>
              <form>
                <input type="text" value="Enter your E-mail" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='输入你的Email邮箱';}">
                <input type="submit" value="订阅">  
              </form>
          </div>
          <div class="clearfix"> </div>
        </div>
      </div>
      <div class="footer-bottom">
        <div class="container">
          <ul class="footer-bottom-top">
            <li><a href="#"><img src="/view/images/f1.png" class="img-responsive" alt=""></a></li>
            <li><a href="#"><img src="/view/images/f2.png" class="img-responsive" alt=""></a></li>
            <li><a href="#"><img src="/view/images/f3.png" class="img-responsive" alt=""></a></li>
          </ul>
          
          <div class="clearfix"> </div>
        </div>
      </div>
    </div>
    <!--//footer-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/view/js/simpleCart.min.js"></script>
<!-- slide -->
<script src="/view/js/bootstrap.min.js"></script>
<!--light-box-files -->
    <script src="/view/js/jquery.chocolat.js"></script>
    <link rel="stylesheet" href="/view/css/chocolat.css" type="text/css" media="screen" charset="utf-8">
    <!--light-box-files -->
    <script type="text/javascript" charset="utf-8">
    $(function() {
      $('a.picture').Chocolat();
    });
    </script>


</body>
</html>