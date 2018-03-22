<?php

namespace App\Http\Controllers\adidas;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    //提交订单的显示页 
    public function getIndex($cart_id=''){
        $types = self::getNum(0);
        $link = $this -> linkfind();
        $address = DB::table('adidas_address')->where('users_id', session('users_id'))->get();
        // var_dump($address);exit;
        if ( $cart_id ) {
        	$cart = DB::table('adidas_cart')
        	->where('cart_id', $cart_id)
        	->where('users_id', session('users_id'))
        	->get();
        } else {
        	$cart = DB::table('adidas_cart')->where('users_id', session('users_id'))->get();
        }

        return view('web.order', ['res'=>$types, 'link'=>$link, 'address'=>$address, 'cart'=>$cart]);
    }



    //点击结算，加入我的订单和订单详情
    public function postInsertorder(Request $request){
    	$data = $request -> except('_token');
    	var_dump($data);exit;
    	$address = DB::table('adidas_address')->where('users_id', session('users_id'))->where('address_id', $data['address_id'])->get();
    	
    	
    	$order = []; //订单
    	$detail =[]; //订单详情

    	//随机生成一个数字字符串作为订单号
		$str = "0123456789";
        $bh="";
        for ( $i=0;$i<8;$i++ ) {
            $bh .= $str[ rand(0, strlen($str)-1) ];            
        }
        //把信息放入订单的数组中
        $order['orders_number'] = $bh;  
        $order['orders_total'] = $data['orders_total'];            
        $order['orders_addtime'] = date('Y-m-d H:i:s');
        $order['address_id'] = $data['address_id'];        
        $order['users_id'] = session('users_id');
        //把信息插入订单表里，并返回当前的订单ID
    	$orders_id = DB::table('adidas_orders')->insertGetId( $order );

    	//如果是全部结算的情况，判断购物车的ID数量大于1
    	if ( count( $data['cart_id'] )>1 ) {

    		$cart = DB::table('adidas_cart')
    		->select('goods_id','cart_goodname','cart_goodpic','cart_goodprice','cart_goodnum','cart_goodsum','cart_goodcolor','cart_goodsize','cart_gooddescr')
    		->where('users_id', session('users_id'))
    		->get();
    		//遍历后的数组信息，插入订单详情表
    		foreach($cart as $k=>$v){
    			$v['orders_id'] = $orders_id;
    			DB::table('adidas_detail')->insert($v);
    		}

            //把信息加入订单详情表里后，删除购物车里面的商品信息
            DB::table('adidas_cart')->where('users_id', session('users_id'))->delete();
            return redirect('/adidas');

    	} else {
    		//单个商品结算的情况
    		$cart = DB::table('adidas_cart')
    		->select('goods_id','cart_goodname','cart_goodpic','cart_goodprice','cart_goodnum','cart_goodsum','cart_goodcolor','cart_goodsize','cart_gooddescr')
    		->where('cart_id', $data['cart_id'][0])->where('users_id', session('users_id'))
    		->get();

    		foreach($cart as $k=>$v){
    			$v['orders_id'] = $orders_id;
    			DB::table('adidas_detail')->insert($v);
    		}

            DB::table('adidas_cart')->where('users_id', session('users_id'))->where('cart_id', $data['cart_id'])->delete();
    		return redirect('/adidas');
    	}
    	
    }

    //这里是添加新地址的ajax接收
    public function getAjax(Request $request){
        $data = $request -> except('_token');
        $data['users_id'] = session('users_id');
        // var_dump(session('users_id'));exit;
        $address_id = DB::table('adidas_address')
            ->insertGetId( $data );
        if ( $address_id ) {
            return $address_id;
        }
    }

 

}
