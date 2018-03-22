<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CarouselController extends Controller
{
    //轮播的添加页面
    public function getAdd(){
        return view('Admin.carousel.add');
    }

    //轮播的添加操作
    public function postInsert(Request $request){
        $data = $request -> except('_token');
        // var_dump($data);
        $data['carousel_addtime'] = date('Y-m-d H:i:s');
        
        //文件上传     
        if ( $request->hasFile('carousel_pic') ) {
            //拼接文件名字
            $name = md5 ( time()+rand(1000, 9999) );
            $houzui = $request ->file('carousel_pic')->getClientOriginalExtension();

            //把上传的文件移到自己定的位置
            $request ->file('carousel_pic')->move('upload/carousel/'.date('Ymd'), $name.'.'.$houzui);
            $filename = date('Ymd').'/'.$name.'.'.$houzui;
            $data['carousel_pic'] = $filename;
        }
        $res = DB::table('adidas_carousel')->insert( $data );
        if ( $res ) {
            return $this->success('添加成功', '/admin/carousel/index');
        } else {
            return $this->error('添加失败', '/admin/carousel/index');
        }
    }

    //轮播的显示列表
    public function getIndex(Request $request){
        //如果传来的分页(count)的值或搜索(search)的值存在
        if ( $request->input('count') || $request->input('search') ) {
            //接收传来的值 
            
            $count = $request -> input('count');//显示条数
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
            // var_dump($request);
            // exit;
            //查询信息并分页
            $res = DB::table('adidas_carousel')->where('carousel_title', 'like', '%'.$search.'%')->paginate($count);

            //返回视图，并把结果数组和全部参数一同交给Admin.user.index
            return view('Admin.carousel.index', ['res'=>$res, 'request'=>$request]);

        } else {
            $res = DB::table('adidas_carousel')->paginate(10);
            //显示管理员列表页
            return view('Admin.carousel.index', ['res'=>$res, 'request'=>$request->all()]);
        }
    }

    //修改页面
    public function getEdit($carousel_id){

        $res = DB::table('adidas_carousel')->where('carousel_id', $carousel_id)->first();
        // var_dump($res);exit;
        return view('Admin.carousel.edit', ['res'=>$res]);
    }

    //修改操作
    public function postUpdate(Request $request){
        //接收edit返回来的值
        $data = $request -> except('_token');
        // var_dump($data);exit;
        //文件上传     
        if ( $request->hasFile('carousel_pic') ) {
            //拼接文件名字
            $name = md5 ( time()+rand(1000, 9999) );
            $houzui = $request ->file('carousel_pic')->getClientOriginalExtension();

            //把上传的文件移到自己定的位置
            $request ->file('carousel_pic')->move('upload/carousel/'.date('Ymd'), $name.'.'.$houzui);
            $filename = date('Ymd').'/'.$name.'.'.$houzui;
            $data['carousel_pic'] = $filename;
        }

        if ( DB::table('adidas_carousel')->where('carousel_id', $data['carousel_id'])->update( $data ) ) {
            return $this->success('修改成功', '/admin/carousel/index');
        } else {
            return $this->error('修改失败', '/admin/carousel/index');
        }
    }

    //删除操作
    public function getDelete($carousel_id){
        $res = DB::table('adidas_carousel')->where('carousel_id', $carousel_id)->delete();
        if ( $res ) {
            return $this->success('删除成功', '/admin/carousel/index');
        } else {
            return $this->error('删除失败', '/admin/carousel/index');
        }

    }

}
