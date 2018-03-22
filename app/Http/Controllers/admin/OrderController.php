<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    
    //查看订单
    public function getIndex(Request $request){

        //如果传来的分页(count)的值或搜索(search)的值存在
        if ( $request->input('count') || $request->input('search') ) {
            //接收传来的值
            $count = $request -> input('count', 10);//显示页数
            $search = $request -> input('search', '');//搜索条件
            
            /**
             * [$count description] 
             *当显示条数不选时，用户列表页传来的值为空，若要用用户名查询
             * 就会报错
             * 这里的if判断就是为了防止出错，给个默认值为10
             * @var [type]
             */
            if ( $count == '' ) {
                $count = 10;
            }

            //获取全部的参数
            $request = $request -> all();
            //查询信息并分页
            $res = DB::table('adidas_orders')
            ->where('orders_number', 'like', '%'.$search.'%')
            ->paginate($count);

            //返回视图，并把结果数组和全部参数一同交给Admin.manager.index
            return view('Admin.order.index', ['res'=>$res, 'request'=>$request]);

        } else {
            $res = DB::table('adidas_orders')->paginate(10);

            //显示管理员列表页
            return view('Admin.order.index', ['res'=>$res, 'request'=>$request->all()]);
        }

    }

    //点击发货时改变订单状态
    public function getUpdate($orders_id){

        $res = DB::table('adidas_orders')->where('orders_id', $orders_id)->update( ['orders_state'=> 2] );
        
        return redirect('/admin/order/index');
    }

    //查看订单详情
    public function getDetail(Request $request){

        $data = $request->all();
        // var_dump($data);
        //如果传来的分页(count)的值或搜索(search)的值存在
        if ( $request->input('count') || $request->input('search') ) {
            //接收传来的值
            $count = $request -> input('count', 10);//显示页数
            $search = $request -> input('search', '');//搜索条件
 
            if ( $count == '' ) {
                $count = 10;
            }

            //获取全部的参数
            $request = $request -> all();

            //查询信息并分页
            $res = DB::table('adidas_detail')
            ->join('adidas_goods', 'adidas_detail.goods_id', '=', 'adidas_goods.goods_id')
            ->join('adidas_orders','adidas_detail.orders_id', '=', 'adidas_orders.orders_id')
            ->join('adidas_address', 'adidas_orders.address_id', '=', 'adidas_address.address_id')
            ->select('adidas_detail.*', 'adidas_goods.goods_code', 'adidas_orders.*', 'adidas_address.*')
            ->where('adidas_detail.orders_id', $data['orders_id'])
            ->where('adidas_orders.orders_number', 'like', '%'.$search.'%')
            ->Orwhere('adidas_orders.link_man', 'like', '%'.$search.'%')
            ->paginate($count);
            //返回视图，并把结果数组和全部参数一同返回
            return view('Admin.order.detail.index', ['res'=>$res, 'request'=>$request]);

        } else {
            
             $res = DB::table('adidas_detail')
            ->join('adidas_goods', 'adidas_detail.goods_id', '=', 'adidas_goods.goods_id')
            ->join('adidas_orders','adidas_detail.orders_id', '=', 'adidas_orders.orders_id')
            ->join('adidas_address', 'adidas_orders.address_id', '=', 'adidas_address.address_id')
            ->select('adidas_detail.*', 'adidas_goods.goods_code', 'adidas_orders.*', 'adidas_address.*')
            ->where('adidas_detail.orders_id', $data['orders_id'])
            ->paginate(10);

            // dd($res);exit;
            
            //显示商品颜色列表页
            return view('Admin.order.detail.index', ['res'=>$res, 'request'=>$request->all()]);
        }

    }

}
