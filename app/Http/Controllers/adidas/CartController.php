<?php

namespace App\Http\Controllers\adidas;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    //添加购物车
    public function getAdd(Request $request){
        $data = $request -> except('_token');
        // var_dump($data);
        
        if ( !isset( $data['cart_goodcolor'] ) && !isset( $data['cart_goodsize'] ) ) {
            return "请选择颜色尺码信息";
        } else if ( !isset( $data['cart_goodcolor'] ) ) {
            return "请选择颜色信息";
        } else if ( !isset( $data['cart_goodsize'] ) ) {
            return "请选择尺码信息";
        }else if ( session('users_id') ) {
            $data = $request -> except('_token');
            $data['users_id'] = session('users_id');
             
            $res = DB::table('adidas_cart')
            ->where('users_id', $data['users_id'])
            ->where('goods_id', $data['goods_id'])
            ->where('cart_goodcolor', $data['cart_goodcolor'])
            ->where('cart_goodsize', $data['cart_goodsize'])
            ->first();
            // var_dump( $data);
            if ( $res ) {

                $cart = DB::update('update adidas_cart set cart_goodnum = cart_goodnum +?,cart_goodsum = cart_goodnum * cart_goodprice where goods_id = ? and users_id = ?', [$data['cart_goodnum'],$data['goods_id'], $data['users_id']]);
                if ( $cart ) {
                    return 2;
                }
            } else {
                $data['cart_goodsum'] = $data['cart_goodnum'] * $data['cart_goodprice'];
                $cart = DB::table('adidas_cart')->insert( $data );
                if ( $cart ) {
                    return 1;
                } else {
                    return 0;
                }
            }
        } else {
            return '您还没有登录，请先登录';
        }
    }

    //购物车的显示页面
    public function getIndex(){
        $types = self::getNum(0);
        $link = $this -> linkfind();
        $data = DB::table('adidas_cart')->where('users_id', session('users_id'))->get();
        // var_dump($data);exit;
        return view('web.cart', ['res'=>$types, 'data'=>$data, 'link'=>$link]);
    }

    //购物车数量和总金额的修改
    public function getUpdate(Request $request){
        $data = $request -> all();
        // var_dump($data);
        $res = DB::update('update adidas_cart set cart_goodnum = ?, cart_goodsum = ? where goods_id = ? and users_id = ?', [ $data['cart_goodnum'], $data['cart_goodsum'], $data['goods_id'], session('users_id') ]);

        if ( $res ) {
            return 1;
        } else {
            return 2;
        }

    }

    //购物车的商品删除
    public function getDelete($cart_id){
          
        $data = DB::table('adidas_cart')->where('cart_id', $cart_id)->where( 'users_id', session('users_id') )->delete();
        
        return $data;
    }

}
