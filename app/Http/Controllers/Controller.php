<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //请求成功页
    public function success($message, $url, $time=3){
    	return view('layout.success', [ 'message'=>$message, 'url'=>$url,'time'=>$time ]);
    }
  	
  	//请求失败页
    public function error($message, $url, $time=3){
    	return view('layout.error', [ 'message'=>$message, 'url'=>$url,'time'=>$time ]);
    }

    //这里是分类的递归查询
    public static function getNum($pid){//从顶级分类开始出发
        $res = DB::table('adidas_types')->where('types_pid',$pid)->get();
        $arr = array();
        foreach($res as $k=>$v){
            $v['sub'] = self::getNum($v['types_id']);
            $arr[] = $v;
        }
        return $arr;
    }
    
    //这里是轮播的查询
    public function lunbo(){
      $res = DB::table('adidas_carousel')->get();
      return $res;
    }
   
    //这里是热销产品
    /*public function hotsell(){
      $res = DB::table('adidas_goodstock')
            ->join('adidas_goods', 'adidas_goodstock.goods_id', '=', 'adidas_goods.goods_id')
            ->select('adidas_goodstock.*', 'adidas_goods.goods_goodname', 'adidas_goods.goods_bigpic')
            ->get();
      // return $res; 
      $data = ['goods_amount' => 0, 'goods_stock'=>0];
      foreach($res as $k=>$v){
          $data['goods_id'] = $v['goods_id'];
          $data['goods_amount'] += $v['goods_amount'] ;
          $data['goods_stock'] += $v['goods_stock'] ;
      } 

      if ( $data['goods_amount'] > ($data['goods_stock']/3) ) {
        return $data;
      }
      
    }*/

    //这里是降价的产品
    public function  cutprice(){
      $res = DB::table('adidas_goods')->get();
      $data = [];
      $cutprice= [];
      foreach ( $res as $k=>$v ) {
       
        if ( $v['goods_now_price'] < $v['goods_price'] ) {
          $cutprice[] = $v;
        
        } else {
          $data[] = $v;
        }
      }
      // var_dump($data);exit;
      return $cutprice;

    }

    //这是前台的商品列表操作
    public function goodslist($types_id, $types_path){

      $res = DB::table('adidas_goods')
      ->join('adidas_types', 'adidas_goods.types_id', '=', 'adidas_types.types_id')
      ->where('adidas_types.types_path', 'like', $types_path.','.$types_id.'%')
      ->Orwhere('adidas_types.types_id', $types_id)
      ->get();
      
      return $res;
    }

    /**
     *  这是前台商品详情的操作
     *  把商品的四个表全部取出来
     */
    //
    public function goodsdetail($goods_id){
      //根据传来的商品ID查询库存表
     
      // $goods = DB::table('adidas_goods')->where('goods_id', $goods_id)->get();
      $color = DB::table('adidas_goodcolor')->where('goods_id', $goods_id)->get();
      
      //dd($color);
      //建立一个空数组
      $data = [];
      // $data[$goods_id]['goods_id']=[];//存放所有的商品ID
      $data[$goods_id]['goods_color_id']=[];//存放所有的商品颜色ID
      $data[$goods_id]['goods_color']=[];//存放所有的商品颜色
      $data[$goods_id]['goods_size']=[];//存放所有的商品尺码
      
      $data[$goods_id]['goods_id'] = $goods_id; //把商品ID放入数组
      $data[$goods_id]['goods_littlepic'] = [];
      foreach($color as $k=>$v){
        //如果$data[$goods_id]['goods_color'] 这个数组中没有$v['goods_color']
        //就放入数组中，用来去掉重复的值
        if(!in_array($v['goods_color'], $data[$goods_id]['goods_color'])){
          $data[$goods_id]['goods_color'][] = $v['goods_color'];
        }
        if( !in_array($v['goods_littlepic'],$data[$goods_id]['goods_littlepic'] ) ){
            $data[$goods_id]['goods_littlepic'][] = $v['goods_littlepic'];
        }
      }
       $size = DB::table('adidas_goodsize')->where('goods_id', $goods_id)->get();
      foreach($size as $k=>$v){
        if(!in_array($v['goods_size'], $data[$goods_id]['goods_size'])){
          $data[$goods_id]['goods_size'][] = $v['goods_size'];
        }
      }
       $stock = DB::table('adidas_goodstock')->where('goods_id', $goods_id)->get();
     
      foreach($stock as $k=>$v){
        //接收传来的ID
        $goods_id = $v['goods_id'];
       
        $data[$goods_id]['goods_size_id'][] = $v['goods_size_id'];
        $data[$goods_id]['goods_stock'][] = $v['goods_stock'];
        $data[$goods_id]['goods_amount'][] = $v['goods_amount'];

        //如果$data[$goods_id]['goods_color_id'] 这个数组中没有$v['goods_color_id']
        //就放入数组中，用来去掉重复的值
        if(!in_array($v['goods_color_id'], $data[$goods_id]['goods_color_id'])){
          $data[$goods_id]['goods_color_id'][] = $v['goods_color_id'];
        }
        
      }
        $goods = DB::table('adidas_goods')->where('goods_id', $goods_id)->first();
        //dd($goods);
        //把商品表里的东西放入data数组里
        $data[$goods_id]['goods_goodname'] = $goods['goods_goodname'];
        $data[$goods_id]['goods_price'] = $goods['goods_price'];
        $data[$goods_id]['goods_now_price'] = $goods['goods_now_price'];
        $data[$goods_id]['goods_bigpic'] = $goods['goods_bigpic'];
        $data[$goods_id]['goods_descr'] = $goods['goods_descr'];
        $data[$goods_id]['goods_code'] = $goods['goods_code'];

      // dd($data);

      // dd($data);
      /*$data = ['goods_amount' => 0, 'goods_stock'=>0];
      foreach($res as $k=>$v){
          $data['goods_id'] = $v['goods_id'];
          $data['goods_amount'] += $v['goods_amount'] ;
          $data['goods_stock'] += $v['goods_stock'] ;
      } */

      return $data;
    }

    //前台主页模板底下的友情链接查询
    public function linkfind(){
      $link = DB::table('adidas_links')->where('links_state', '1')->get();
      // var_dump($link);exit;
      return $link;

    }




}


