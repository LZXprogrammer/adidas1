<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <meta name="format-detection" content="telephone=no">
        <meta charset="UTF-8">

        <meta name="description" content="Violate Responsive Admin Template">
        <meta name="keywords" content="Super Admin, Admin, Template, Bootstrap">

        <title>请求成功</title>
            
        <!-- CSS -->
        <link href="/a/css/bootstrap.min.css" rel="stylesheet">
        <link href="/a/css/style.css" rel="stylesheet">
        <link href="/a/css/generics.css" rel="stylesheet"> 
    </head>
    <body id="skin-blur-violate">
        <section id="error-page" class="tile">
            <h1 class="m-b-10">{{$message}}</h1>
            

            <span id="box">{{$time}}</span>秒钟后自动跳转
            <a class="underline" href="{{$url}}">点击跳转</a> or
            <a class="underline" href="">Go to Home page</a> 

        </section>
    </body>
</html>
<script>
var box = document.getElementById('box');
var s = parseInt( box.innerHTML );
setInterval(function(){
    box.innerHTML = --s;
    if ( s == 0 ) {
        window.location.href = "{{$url}}";
    }
},1000)
</script>

