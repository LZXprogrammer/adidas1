<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use DB;
use Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;
class LoginController extends Controller
{
    public function login(){

        return view('Admin.login.index');

    }

    public function postLogin(Request $request){
    	$data = $request->except('_token');
    	// var_dump($data);exit;

      if( $data['code'] != session('code') ){

			echo '验证码不正确';

     	}else{
     		if ( $request->only('jzmm') ) {
     			\Cookie::queue('managers_username',$data['managers_username'],1);
     			\Cookie::queue('managers_pass',$data['managers_pass'],1);
     		}

     		$res = DB::table('adidas_managers')->where('managers_username', $data['managers_username'])->first();
     		// var_dump($res);exit;

     	  	if ( Hash::check($data['managers_pass'], $res['managers_pass']) ) {

			    session([ 'managers_username' => $data['managers_username'] ]);
			    session([ 'managers_power' => $res['managers_power'] ]);
			    session([ 'managers_pic' => $res['managers_pic'] ]);

			    echo 1;
  			} else {
  				echo '用户名或密码错误';
  			}
     	}
  	}

  	//退出登录
  	public function getOut(Request $request){
  		$request->session()->flush();
  		return redirect('/admin/login');

  	}



}
