<?php

namespace App\Http\Controllers\adidas;

use Illuminate\Http\Request;
use DB;
use Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;

class RegisterController extends Controller
{
    //前台注册页面
    public function register(){
        $arr = self::getNum(0);//调用类别 
        $link = $this -> linkfind();
        return view('web.register', ['res'=>$arr, 'link'=>$link]);
    }

    //ajax验证
    public function getAjax(Request $request){
        $data = $request -> except('_token');

        $res = DB::table('adidas_users')->where('users_username', $data['users_username'])->first();
        return $res;
    }
    

    //前台注册操作
    public function postRegister(Request $request){
        $data = $request -> except('_token', 'users_repass');
        //进行Hash加密
        $data['users_pass'] = Hash::make($data['users_pass']);
        $data['users_addtime'] = Date('Y-m-d H:i:s');
        $data['users_token'] = str_random(50);

        $types = self::getNum(0);
        $link = $this -> linkfind();

        if ($users_id = DB::table('adidas_users')->insertGetId( $data ) ){

            $this->jihuo( $users_id, $data['users_email'], $data['users_token'] );

            return view('web.jihuo', [ 'users_email'=>$data['users_email'],'res'=>$types, 'link'=>$link ]);
        } else {
            return $this->error('注册失败', '/admin/register/register');
        }

    }

    //发送一个邮件
    private function jihuo( $users_id, $users_email, $users_token ){
       
        //发送邮件
        Mail::send('web.youjian',['users_id'=>$users_id, 'users_email'=>$users_email, 'users_token'=>$users_token], function($message) use($users_email){
            $message->to( $users_email )->subject('激活邮件提醒');
        });

    }

    //点击激活后的处理
    public function getJihuo(Request $request){

        $data = $request -> all();
        $res = DB::table('adidas_users')->where('users_id', $data['users_id'])->where('users_token', $data['users_token'])->update(['users_type'=>2]);
        if( $res ) {
            //如果激活成功返回登录页，失败返回注册页
            return $this->success('激活成功', '/adidas/login');
        } else {
            return $this->success('激活失败', '/adidas/register');
        }

    }

}
