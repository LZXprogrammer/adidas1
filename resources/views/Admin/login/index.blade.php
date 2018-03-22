<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <meta name="format-detection" content="telephone=no">
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="Violate Responsive Admin Template">
        <meta name="keywords" content="Super Admin, Admin, Template, Bootstrap">

        <title>登录</title>

        <!-- CSS -->
        <link href="/a/css/bootstrap.min.css" rel="stylesheet">
        <link href="/a/css/form.css" rel="stylesheet">
        <link href="/a/css/style.css" rel="stylesheet">
        <link href="/a/css/animate.css" rel="stylesheet">
        <link href="/a/css/generics.css" rel="stylesheet">
    </head>
    <body id="skin-blur-violate">

        <section id="login" style=''>
            <header style='text-align:center'>
                <h1>欢迎登录</h1>
            </header>

            <div class="clearfix"></div>

            <!-- Login -->

            <form class="box tile animated active" id="box-login" style='margin-left:30%;' action='/admin/login/login' method='post'>
                {{ csrf_field() }}
                <h2 class="m-t-0 m-b-15">登录</h2>
                <input type="text" class="login-control m-b-10" placeholder="请输入登录名" name='managers_username' value="{{ \Cookie::get('managers_username') }}" >
                <span style="color:#ccc;display:none;" id="span1" >请输入您的登录名</span>
                  <br><br>
                <input type="password" class="login-control" placeholder="请输入密码" name='managers_pass'  value="{{ \Cookie::get('managers_pass') }}" >
                <span style="color:#ccc;display:none;" id="span2" >请输入您的密码</span>
                 <br><br>
                <div style='height:10px;'></div>
                <div style='width:200px;height:50px;float:left;'>
                   <input type="text" class="login-control m-b-10" placeholder="验证码" name='code' id='codes' >
                </div>
                <img src='/admin/code'  style='margin-left:10px;' id='code'/>
                <a  href='javascript:;'>看不清,换一张</a>
                <div class="checkbox m-b-20">
                    <label>
                        <input type="checkbox" id="jzmm" value="" name="jzmm[]" />
                        记住密码
                    </label>
                </div>
                <br><br>  <br><br>
                <input type="button" id="submit" class="login-control m-b-10"  value='登录' >
            </form>


        </section>

        <!-- Javascript Libraries -->
        <!-- jQuery -->
        <script src="/a/js/jquery.min.js"></script> <!-- jQuery Library -->
        <script src="/a/layer/layer.js"></script>
        <!-- Bootstrap -->
        <script src="/a/js/bootstrap.min.js"></script>

        <!--  Form Related -->
        <script src="/a/js/icheck.js"></script> <!-- Custom Checkbox + Radio -->

        <!-- All JS functions -->
        <script src="/a/js/functions.js"></script>
        <script>
            //验证码的改变
            $('a').click(function(){
               $('#code').attr('src','/admin/code?id='+Math.random());
            });

            $( function(){
                $("#submit").click(function(){
                    var managers_username = $('input').eq(1).val();
                    var managers_pass = $('input').eq(2).val();
                    var code = $('#codes').val();
                    //var jzmm = $('#jzmm').attr('checked');
                    // alert(jzmm);

                    //这里是记住密码   未完成
                    /*if ( jzmm == false ) {
                        $('#jzmm').attr('value', 0);
                    }*/

                    // alert(code);
                    if ( managers_username == "" ) {
                       layer.msg('请输入用户名',function(){})
                       return false;
                    } else if ( managers_pass == "" ) {

                       layer.msg('请输入密码',function(){})
                       return false;
                    }

                    /*if (  ) {

                    }*/
                    //这里是post方式所需要的固定格式
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    //用ajax方式检验
                    $.ajax({
                        url : '/admin/login/login',
                        type : 'post',
                        data : {
                            'managers_username': managers_username,
                            'managers_pass': managers_pass,
                            'code': code
                        },
                        // dataType: 'json',
                        // async: false,
                        success:function(msg){
                            if ( msg == 1 ) {
                                location.href='/admin';
                            } else {
                                layer.msg(msg,function(){});
                            }
                        },
                        error:function(){
                            layer.msg('无法访问数据库，请检查你的数据库配置',function(){})
                        }

                    });
                });
            })


            /*
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '',
                type: 'post',
                data: {

                },
                dataType: 'json',

                error:function(){

                }
            })*/

/*            $('a').click(function(){
               $('#code').attr('src','/admin/code?id='+Math.random());
            });*/



        </script>
    </body>
</html>
