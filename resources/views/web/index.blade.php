@extends('qiantai.index')

@section('title')
adidas商城
@endsection

@section('content')
<!-- 轮播开始 -->

<div id="banner_tabs" class="flexslider">
  <ul class="slides">
   @foreach($lunbo as $k=>$v)
    <li>
      <a title="" target="_blank" href="{{$v['carousel_link']}}">
        <img width="1920" height="482" alt="" style="background: url(/upload/carousel/{{$v['carousel_pic']}}) no-repeat center;" src="/view/lunbo/images/alpha.png">
      </a>
    </li>
    @endforeach
  </ul>
 
  <ul class="flex-direction-nav">
    <li><a class="flex-prev" href="javascript:;">Previous</a></li>
    <li><a class="flex-next" href="javascript:;">Next</a></li>
  </ul>
  <ol id="bannerCtrl" class="flex-control-nav flex-control-paging">
    <li><a>1</a></li>
    <li><a>2</a></li>
    <li><a>3</a></li>
    <li><a>4</a></li>
  </ol> 
</div>


<script src="/view/lunbo/js/slider.js"></script>
<script src="/view/lunbo/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
$(function() {
  var bannerSlider = new Slider($('#banner_tabs'), {
    time: 5000,
    delay: 400,
    event: 'hover',
    auto: true,
    mode: 'fade',
    controller: $('#bannerCtrl'),
    activeControllerCls: 'active'
  });
  $('#banner_tabs .flex-prev').click(function() {
    bannerSlider.prev()
  });
  $('#banner_tabs .flex-next').click(function() {
    bannerSlider.next()
  });
})
</script>

<!-- 轮播结束 -->

  <!--content-->
    <div class="content">
      <div class="container">
        <div class="content-top">
          <div class="col-md-6 col-md">
            <div class="col-1">
            <a href="single.html" class="b-link-stroke b-animate-go  thickbox">
              
              <img src="/view/images/pi.jpg" class="img-responsive" alt=""/>
              <div class="b-wrapper1 long-img">
              <p class="b-animate b-from-right    b-delay03 ">Lorem Ipsum</p>
              <label class="b-animate b-from-right    b-delay03 "></label>
              <h3 class="b-animate b-from-left    b-delay03 ">趋势</h3>
              </div>
            </a>  

              <!--<a href="single.html"><img src="images/pi.jpg" class="img-responsive" alt=""></a>-->
            </div>
            <div class="col-2">
              <span>热销</span>
              <h2><a href="single.html">奢华 &amp; 流行</a></h2>
              <p>与流行的看法相反,Lorem Ipsum不是简单的随机文本。它扎根于一块从公元前45拉丁古典文学,使其超过2000年了</p>
              <a href="single.html" class="buy-now">Buy Now</a>
            </div>
          </div>
          <div class="col-md-6 col-md1">
            <div class="col-3">
              <a href="single.html"><img src="/view/images/pi1.jpg" class="img-responsive" alt="">
              <div class="col-pic">
                <p>Lorem Ipsum</p>
                <label></label>
                <h5>男士系列</h5>
              </div></a>
            </div>
            <div class="col-3">
              <a href="single.html"><img src="/view/images/pi2.jpg" class="img-responsive" alt="">
              <div class="col-pic">
                <p>Lorem Ipsum</p>
                <label></label>
                <h5>儿童专区</h5>
              </div></a>
            </div>
            <div class="col-3">
              <a href="single.html"><img src="/view/images/pi3.jpg" class="img-responsive" alt="">
              <div class="col-pic">
                <p>Lorem Ipsum</p>
                <label></label>
                <h5>女士专区</h5>
              </div></a>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>


        <!--products-->
      <div class="content-mid">
        <h3>降价专区</h3>
        <label class="line"></label>

        <div class="mid-popular">
        @foreach($cutprice as $k=>$v)
          <div class="col-md-3 item-grid simpleCart_shelfItem">
            <div class=" mid-pop">
              
              <div class="pro-img">
              
                <img src="/upload/goods_bigpic/{{$v['goods_bigpic']}}" class="img-responsive" alt="">
                <div class="zoom-icon ">
                <a class="picture" href="/view/images/pc.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
                <a href="/adidas/single/{{$v['goods_id']}}"><i class="glyphicon glyphicon-menu-right icon"></i></a>
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
                    <p ><label>￥{{$v['goods_price']}}</label><em class="item_price">￥{{$v['goods_now_price']}}</em></p>
                    <div class="block">
                      <div class="starbox small ghosting" style="color:gray" > </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
          
          <!-- 这里是女人热销区 -->
           <div class="mid-popular">
          <div class="col-md-3 item-grid simpleCart_shelfItem">
          <div class=" mid-pop">
          <div class="pro-img">
            <img src="/view/images/pc4.jpg" class="img-responsive" alt="">
            <div class="zoom-icon ">
            <a class="picture" href="/view/images/pc4.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
            <a href="single.html"><i class="glyphicon glyphicon-menu-right icon"></i></a>
            </div>
            </div>
            <div class="mid-1">
            <div class="women">
            <div class="women-top">
              <span>女人</span>
              <h6><a href="single.html">其他</a></h6>
              </div>
              <div class="img item_add">
                <a href="#"><img src="/view/images/ca.png" alt=""></a>
              </div>
              <div class="clearfix"></div>
              </div>
              <div class="mid-2">
                <p ><label>￥100.00</label><em class="item_price">￥70.00</em></p>
                  <div class="block">
                  <div class="starbox small ghosting"> </div>
                </div>
                
                <div class="clearfix"></div>
              </div>
              
            </div>
          </div>
          </div>
          <div class="col-md-3 item-grid simpleCart_shelfItem">
          <div class=" mid-pop">
          <div class="pro-img">
            <img src="/view/images/pc5.jpg" class="img-responsive" alt="">
            <div class="zoom-icon ">
            <a class="picture" href="/view/images/pc5.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
            <a href="single.html"><i class="glyphicon glyphicon-menu-right icon"></i></a>
            </div>
            </div>
            <div class="mid-1">
            <div class="women">
            <div class="women-top">
              <span>男人</span>
              <h6><a href="single.html">Sed ut perspiciati</a></h6>
              </div>
              <div class="img item_add">
                <a href="#"><img src="/view/images/ca.png" alt=""></a>
              </div>
              <div class="clearfix"></div>
              </div>
              <div class="mid-2">
                <p ><label>￥100.00</label><em class="item_price">￥70.00</em></p>
                  <div class="block">
                  <div class="starbox small ghosting"> </div>
                </div>
                
                <div class="clearfix"></div>
              </div>
              
            </div>
          </div>
          </div>
          <div class="col-md-3 item-grid simpleCart_shelfItem">
          <div class=" mid-pop">
          <div class="pro-img">
            <img src="/view/images/pc6.jpg" class="img-responsive" alt="">
            <div class="zoom-icon ">
            <a class="picture" href="/view/images/pc6.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
            <a href="single.html"><i class="glyphicon glyphicon-menu-right icon"></i></a>
            </div>
            </div>
            <div class="mid-1">
            <div class="women">
            <div class="women-top">
              <span>女人</span>
              <h6><a href="single.html">At vero eos</a></h6>
              </div>
              <div class="img item_add">
                <a href="#"><img src="/view/images/ca.png" alt=""></a>
              </div>
              <div class="clearfix"></div>
              </div>
              <div class="mid-2">
                <p ><label>￥100.00</label><em class="item_price">￥70.00</em></p>
                  <div class="block">
                  <div class="starbox small ghosting"> </div>
                </div>
                
                <div class="clearfix"></div>
              </div>
              
            </div>
          </div>
          </div>
          <div class="col-md-3 item-grid simpleCart_shelfItem">
          <div class=" mid-pop">
          <div class="pro-img">
            <img src="/view/images/pc7.jpg" class="img-responsive" alt="">
            <div class="zoom-icon ">
            <a class="picture" href="/view/images/pc7.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
            <a href="single.html"><i class="glyphicon glyphicon-menu-right icon"></i></a>
            </div>
            </div>
            <div class="mid-1">
            <div class="women">
            <div class="women-top">
              <span>男人</span>
              <h6><a href="single.html">Sed ut perspiciati</a></h6>
              </div>
              <div class="img item_add">
                <a href="#"><img src="/view/images/ca.png" alt=""></a>
              </div>
              <div class="clearfix"></div>
              </div>
              <div class="mid-2">
                <p ><label>￥100.00</label><em class="item_price">￥70.00</em></p>
                  <div class="block">
                  <div class="starbox small ghosting"> </div>
                </div>
                
                <div class="clearfix"></div>
              </div>
              
            </div>
          </div>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
      <!--//products-->
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
  <!--//content-->
  @endsection