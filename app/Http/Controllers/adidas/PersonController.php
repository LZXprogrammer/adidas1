<?php

namespace App\Http\Controllers\adidas;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PersonController extends Controller
{
    
	//个人中心
    public function getIndex(){

        $types = self::getNum(0);//调用类别
        $link = $this -> linkfind();
        $data = DB::table('adidas_users')->where('users_id', session('users_id'))->first();
        $data1 = DB::table('adidas_address')->where('users_id', session('users_id'))->get();
        $data2 = DB::table('adidas_orders')
                ->join('adidas_users', 'adidas_orders.users_id', '=', 'adidas_users.users_id')
                ->select('adidas_orders.*', 'adidas_users.users_username')
                ->where('adidas_orders.users_id', session('users_id'))->get();

        // var_dump($data2);exit;

        return view('web.person',['res'=>$types, 'link'=>$link, 'data'=>$data, 'data1'=>$data1, 'order'=>$data2]);

    }

    //修改个人信息
    public function postUpdate(Request $request){

    	$data = $request -> except('_token');
    	$res = DB::table('adidas_users')->update( $data );
    	// var_dump($res);exit;
    	if ( $res ) {
           	return redirect('/adidas/person')->with('info', '添加成功');
        } else {
            return back()->with('info', '添加失败' );
        }
    }
	
    //地址的添加
    public function postInsert(Request $request){

    	$data = $request -> except('_token');
    	
    	$data['users_id'] = session('users_id');
		// var_dump($data);
    	if ( DB::table('adidas_address')->insert( $data ) ) {

            return redirect('/adidas/person')->with('info', '添加成功' );

        } else {
            return back()->with('info', '添加失败' );
        }
    }

    //地址的删除
    public function getDelete($address_id){
        $res = DB::table('adidas_address')->where('address_id', $address_id)->delete();
        if ( $res ) {
            return redirect('/adidas/person/index')->with('info', '删除成功');
        } else {
            return back()->with('info', '删除失败');
        }
    }


    //订单详情的显示
    public function getOrdetail($orders_id, $address_id){
        // var_dump($address_id);exit;
        $types = self::getNum(0);//调用类别
        $link = $this -> linkfind();
        $detail = DB::table('adidas_detail')
            ->join('adidas_orders', 'adidas_detail.orders_id', '=', 'adidas_orders.orders_id')
            ->select('adidas_detail.*', 'adidas_orders.orders_number', 'adidas_orders.orders_total', 'adidas_orders.orders_state', 'adidas_orders.orders_addtime')
            ->where('adidas_detail.orders_id', $orders_id)
            ->get();

        $address = DB::table('adidas_address')->where('address_id', $address_id)->first();

        // dd($users);

        return view('web.detail', ['res'=>$types, 'link'=>$link, 'detail'=>$detail, 'address'=>$address]);
    }

    //收货状态的修改
    public function getUpdateshou($orders_id){
       
        $res = DB::table('adidas_orders')->where('orders_id', $orders_id)->update( ['orders_state'=>5] );
        // var_dump($res);exit;
        if ( $res ) {
            return redirect('/adidas/person')->with('info', '添加成功');
        } else {
            return back()->with('info', '添加失败' );
        }
    }




}
