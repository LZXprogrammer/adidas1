<?php

namespace App\Http\Controllers\adidas;

use Illuminate\Http\Request;
use DB;
use Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //显示登录的页面
    public function Login(){
        $arr = self::getNum(0);//调用类别
        $link = $this -> linkfind();
        return view('web.login', ['res'=>$arr, 'link'=>$link]);
    }
    
    //登录的检查
    public function postLogin(Request $request){
        $data = $request -> except('_token');

        if( $data['code'] != session('code') ){
			
			echo '验证码不正确';

     	}else{
     		if ( $request->only('jzmm') ) {
     			\Cookie::queue('users_username',$data['users_username'],1);
     			\Cookie::queue('users_pass',$data['users_pass'],1);
     		}

     		$res = DB::table('adidas_users')->where('users_username', $data['users_username'])->first();
     		// var_dump($res);exit;
            
            if ( Hash::check($data['users_pass'], $res['users_pass']) ) {

                //如果用户没有激活成功，则不能登录
                if ( $res['users_type'] == 2 ) {
                    session($res);
                   
                    //用户若没有启用就无法登录
                    if ( $res['users_state'] != 1 ) {
                        echo '您没有登录权限，请联系网站客服获取权限';
                    } else {
                         echo 1;//密码匹配，且用户被启用了，返回1
                    }  

                } else {
                //激活不成功
                    echo '您的邮箱未激活，不能登录';
                }   
                     

            } else {
                echo '用户名或密码错误';
            }

                
     	}
    }

    //退出登录
    public function getLoginout(Request $request){
        //删除session里的所有信息并返回登录页
        $request->session()->flush();
        return redirect('/adidas/login');
    }


}
