@extends('qiantai.index')

@section('title')
注册
@endsection

@section('content')
<div class="banner-top">
	<div class="container">
		<h1>注册</h1>
		<em></em>
		<h2><a href="index.html">主页</a><label>/</label>注册</a></h2>
	</div>
</div>
<!--login-->
<div class="container">
		<div class="login">
			<form action="/adidas/register/register" method="post" id="myform">
			{{csrf_field()}}
			<div class="col-md-6 login-do">
				<div class="login-mail">
					<input type="text" name="users_username" placeholder="请输入用户名" >
					<i  class="glyphicon glyphicon-user"></i>
				</div>
				<span id="yhm" style="color:#abc;font-size:15px;display:none;position: relative;top:-30px;">支持数字字母6-20个字符</span>
				<div class="login-mail">
					<input type="password" name="users_pass" placeholder="请输入密码" >
					<i  class="glyphicon glyphicon-phone"></i>
				</div>
				<span id="mm" style="color:#abc;font-size:15px;display:none;position: relative;top:-30px;">支持数字字母6-20个字符</span>
				<div class="login-mail">
					<input type="password" name="users_repass" placeholder="请再次输入密码">
					<i  class="glyphicon glyphicon-phone"></i>
				</div>
				<span id="qrmm" style="color:#abc;font-size:15px;display:none;position: relative;top:-30px;">请确认密码</span>
				<div class="login-mail">
					<input type="text" name="users_email" placeholder="Email" >
					<i  class="glyphicon glyphicon-envelope"></i>
				</div>
				<span id='email' style="color:#abc;font-size:15px;display:none;position: relative;top:-30px;">支持数字字母6-20个字符</span>
				
				   	<a class="news-letter " href="#">
						<label class="checkbox1"><input type="checkbox" name="checkbox" ><i> </i>忘记密码</label>
					</a>
				<label class="hvr-skew-backward">
					<input type="submit" value="Submit">
				</label>
			
			</div>
			<div class="col-md-6 login-right">
				 <h3>登录</h3>
				 
				 <p>如果你有一个账号，请登录</p>
				<a href="login.html" class="hvr-skew-backward">登录</a>

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

<script>

	var users_username = $("input[name='users_username']");
	var users_pass = $("input[name='users_pass']");
	var users_repass = $("input[name='users_repass']");
	var users_email = $("input[name='users_email']");

	var bool1 = false;
	var bool2 = false;
	var bool3 = false;
	var bool4 = false;


	//这里往下是用户名的验证
	var yhm = $('#yhm');
	users_username.focus(function(){
		yhm.css('display', 'block');			
	});
	users_username.blur(function(){
		yhm.css('display', 'none');
		
		//这是正则验证	
		var reg = /^[0-9a-zA-Z\u4e00-\u9fa5]{6,20}$/;
		if ( users_username.val() == '') {
			layer.msg('用户名不能为空',function(){});
		}else if ( reg.test( users_username.val() ) ) {
			$.get('/adidas/register/ajax/?users_username='+users_username.val(), function(msg){
			
				if ( msg ) {
					yhm.css('display', 'block');
					yhm.html("用户名已存在，请重新输入");
					yhm.css('color', 'red');
				} else {
					yhm.css('display', 'block');
					yhm.html("用户名可用");
					bool1 = true;
				}

			});
		} else {				
			yhm.css('display', 'block');
			yhm.html("用户名不符合条件");
		}
		
	})

	//这里往下是密码的验证	
	var mm = $('#mm');
	users_pass.focus(function(){
		mm.css('display', 'block');
	})
	users_pass.blur(function(){
		mm.css('display', 'none');
		var reg = /^\w{6,20}$/;
		if ( users_pass.val() == '' ) {
			layer.msg('密码不能为空',function(){});
		} else if ( reg.test( users_pass.val() ) ) {
			mm.css('display', 'block');
			mm.html("密码可用");
			bool2 = true;
		} else {
			mm.css('display', 'block');
			mm.html("密码不符合条件");
		}
	})

	//这里往下是确认密码的验证
	var qrmm = $('#qrmm');
	users_repass.focus(function(){
		qrmm.css('display', 'block');
	})
	users_repass.blur(function(){
		qrmm.css('display', 'none');
		if ( users_repass.val() == '' ) {
			layer.msg('确认密码不能为空', function(){});
		} else if ( users_repass.val() == users_pass.val() ) {
			qrmm.css('display', 'block');
			qrmm.html("两次密码一致");
			bool3 = true;
		} else {
			qrmm.css('display', 'block');
			qrmm.html("两次密码不一致");
		}

	})

	//这里往下是邮箱
	var email = $('#email');
	users_email.focus(function(){
		email.css('display', 'block');
	})
	users_email.blur(function(){
		email.css('display', 'none');
		var reg = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if ( users_email.val() == '') {
			layer.msg('邮箱不能为空',function(){});
		}else if ( reg.test( users_email.val() ) ) {			
			email.css('display', 'block');
			email.html("邮箱可用");	
			bool4 = true;
		} else {				
			email.css('display', 'block');
			email.html("邮箱格式不正确");
		}
	})



	$('#myform').submit(function(){
		if ( bool1 && bool2 && bool3 && bool4 ) {
			return true;
		} else {
			return false;
		}
	})


	
	

</script>



<!-- <script>
	
	var bool1 = false; 
	var bool2 = false; 
	var bool3 = false; 
	var bool4 = false; 
	var bool5 = false;
	$('#users_username').blur(function(){
		var users_username = $(this).val();
		var reg = /^[0-9a-zA-Z\u4e00-\u9fa5]{3,20}$/;
		if ( reg.test(users_username) ) {
			$.get('/ajax?users_username='+ users_username , function(data){
				if ( data ) {
					$('#users_username').next().html("<img src='/base/image/error.png'/>此用户名已存在，请重新输入");
					$('#users_username').next().css('color', 'red');
				} else {
					$('#users_username').next().html("<img src='/base/image/right.png'/>此用户名可用");
					$('#users_username').next().css('color', 'green');
					bool1 = true;
				}
			})
			
		} else {
			$(this).next().html("<img src='/base/image/error.png'/>用户名不可用");
			$('#users_username').next().css('color', 'red');
		}	
	})
	$('#users_passwd').blur(function(){
		var users_passwd = $(this).val();
		var reg = /^[0-9a-zA-Z_]{8,16}$/;
		if ( reg.test(users_passwd) ) {
			$(this).next().html("<img src='/base/image/right.png'/>密码可用");
			$(this).next().css('color', 'green');
			bool2 = true;
		} else {
			$(this).next().html("<img src='/base/image/error.png'/>密码不可用");
			$(this).next().css('color', 'red');


		}
	})
	$('#users_repass').blur(function(){
		var users_repass = $(this).val();
		var users_passwd = $('#users_passwd').val();
		if ( users_repass == users_passwd ) {
			$(this).next().html("<img src='/base/image/right.png'/>两次密码一致");
			$(this).next().css('color', 'green');
			bool3 = true;
		} else {
			$(this).next().html("<img src='/base/image/error.png'/>两次密码不一致，请重新输入");
			$(this).next().css('color', 'red');


		}
	})
	$('#users_phone').blur(function(){
		var users_phone = $(this).val();
		var reg = /^1[3|4|5|7|8]\d{9}$/;
		if ( reg.test(users_phone) ) {
			$(this).next().html("<img src='/base/image/right.png'/>手机号可用");
			$(this).next().css('color', 'green');
			bool4 = true;
		} else {
			$(this).next().html("<img src='/base/image/error.png'/>请输入正确的手机号");
			$(this).next().css('color', 'red');


		}
	})
	$('#users_email').blur(function(){
		var users_email = $(this).val();
		var reg = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if ( reg.test(users_email) ) {
			$(this).next().html("<img src='/base/image/right.png'/>邮箱可用");
			$(this).next().css('color', 'green');
			bool5 = true;
		} else {
			$(this).next().html("<img src='/base/image/error.png'/>请输入正确的邮箱");
			$(this).next().css('color', 'red');


		}
	})
	$('#myform').submit(function(){
		if ( bool1 && bool2 && bool3 && bool4 && bool5) {
				return true;
			} else {
				return false;
			}
	})
	
</script> -->


@endsection
