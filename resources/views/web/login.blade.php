@extends('qiantai.index')

@section('title')
登录
@endsection

@section('content')

<div class="banner-top">
	<div class="container">
		<h1>登录</h1>
		<em></em>
		<h2><a href="/adidas">主页</a><label>/</label>登录</a></h2>
	</div>
</div>
<!--login-->
<div class="container">
	<div class="login">	
		<form action="/adidas/login/login" method="post">
			<div class="col-md-6 login-do">
				<div class="login-mail">
					<input type="text" name="users_username" placeholder="请输入用户名" >
					<i  class="glyphicon glyphicon-envelope"></i>
				</div>
				<div class="login-mail">
					<input type="password" name="users_pass" placeholder="请输入密码" >
					<i class="glyphicon glyphicon-lock"></i>
				</div>
				<div class="login-mail" style="width:200px;float:left;">
					<input type="text" name="code" id='codes' placeholder="验证码" >
					
				</div>
				<div style="width:270px;height:60px;float:left;margin-left:20px;"> 
					<img src='/admin/code'  style='margin-left:10px;' id='code'/>
                	<a href='javascript:;' id="huantu">看不清,换一张</a>
                </div>
			   <a class="news-letter " href="#">
					<label class="checkbox1">
						<input type="checkbox" name="checkbox" >
						<i> </i>忘记密码
					</label>
				</a>
				<label class="hvr-skew-backward">
					<!-- <input type="submit" value="login"> -->
					<span id='submit'>login</span>
				</label>
			</div>
			<div class="col-md-6 login-right">
				 <h3>免费注册账号</h3>
				 
				 <p>如果你没有一个账号，请注册。注册完全免费</p>
				<a href="register.html" class=" hvr-skew-backward">注册</a>

			</div>
		
			<div class="clearfix"> </div>
		</form>
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

<script>

	//这里是验证码
	$('#huantu').click(function(){
		$('#code').attr('src','/admin/code?id='+Math.random());
	})

	//这里是提交事件
	var submit = $('#submit');
	// alert(submit);
	submit.click(function(){
		var users_username = $("input[name='users_username']").val();
		var users_pass = $("input[name='users_pass']").val();
		var code = $('#codes').val();

		if ( users_username == "" ) {
           layer.msg('请输入用户名',function(){})
           return false;
        } else if ( users_pass == "" ) {

           layer.msg('请输入密码',function(){})
           return false;
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
        	url: '/adidas/login/login',
        	type: 'post',
        	data: {
        		'users_username': users_username,
        		'users_pass': users_pass,
        		'code': code
        	},
        	// dataType: 'json',
        	// async: false,
        	success:function(msg){
        		if ( msg == 2 ) {
        			layer.msg(msg,function(){})
        		}
        		if ( msg == 1 ) {
	                location.href='/adidas';
	            } else {
	                layer.msg(msg,function(){});
	            }
        	},
        	error:function(){
        		layer.msg('无法访问数据库，请检查你的数据库配置',function(){})
        	}

        })

	})





</script>


@endsection