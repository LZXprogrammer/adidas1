<?php

namespace App\Http\Controllers\adidas;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdidasController extends Controller
{

    //显示主页列表和头部的类别
    public function index(){

        $res = self::getNum(0);//调用类别
        $lunbo = $this -> lunbo();
        //$sell = $this -> hotsell();
        $cutprice = $this -> cutprice();
        // var_dump($cutprice);exit;
        $link = $this -> linkfind();
        // var_dump($link);exit;
        return view('web.index',['res'=>$res,'lunbo'=>$lunbo, 'cutprice'=>$cutprice, 'link'=>$link]);
    }

    //商品列表的显示
    public function getProduct($types_id, $types_path){

        $res = self::getNum(0);
        $goodslist = $this -> goodslist($types_id, $types_path);
        // var_dump($goodslist);exit;
         $link = $this -> linkfind();
        return view('web.product',['goodslist'=>$goodslist, 'res'=>$res, 'link'=>$link]);
    }

    //商品详情
    public function getSingle($goods_id){
        $res = self::getNum(0);

        $goodsdetail = $this -> goodsdetail($goods_id);
        // dd($goodsdetail);exit;
         $link = $this -> linkfind();
        return view('web.single', ['res'=> $res, 'goodsdetail'=>$goodsdetail, 'link'=>$link]);
    }

    

}
