<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AddressController extends Controller
{

    //收货地址的列表
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
            $res = DB::table('adidas_address')
            ->join('adidas_users', 'adidas_address.users_id', '=', 'adidas_users.users_id')
            ->select('adidas_address.*', 'adidas_users.users_username')
            ->where('link_man', 'like', '%'.$search.'%')
            ->paginate($count);

            //返回视图，并把结果数组和全部参数一同交给Admin.manager.index
            return view('Admin.address.index', ['res'=>$res, 'request'=>$request]);

        } else {
            $res = DB::table('adidas_address')
            ->join('adidas_users', 'adidas_address.users_id', '=', 'adidas_users.users_id')
            ->select('adidas_address.*', 'adidas_users.users_username')
            ->paginate(10);

            //显示管理员列表页
            return view('Admin.address.index', ['res'=>$res, 'request'=>$request->all()]);
        }
    }


}
