<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class NoticeController extends Controller
{
    
    //公告添加页
    public function getAdd(){
        return view('Admin.notice.add');
    }

    //公告添加操作
    public function postInsert(Request $request){
        // var_dump($request->all());
        $data = $request -> except('_token');
        $data['notice_addtime'] = date('Y-m-d H:i:s');
        // var_dump($data);
        $res = DB::table('adidas_notice')->insert( $data );

        if ( $res ) {
            return $this->success('添加成功', '/admin/notice/index');
        } else {
            return $this->error('添加失败', '/admin/notice/index');
        }
    }

    //公告显示
    public function getIndex(Request $request){

        // var_dump($request->all());
        
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
            $res = DB::table('adidas_notice')->where('notice_title', 'like', '%'.$search.'%')->paginate($count);

            //返回视图，并把结果数组和全部参数一同交给Admin.notice.index
            return view('Admin.notice.index', ['res'=>$res, 'request'=>$request]);

        } else {
            $res = DB::table('adidas_notice')->paginate(10);

            //显示公告列表页
            return view('Admin.notice.index', ['res'=>$res, 'request'=>$request->all()]);
        }
    }

    //公告修改页面
    public function getEdit($id){
        $res = DB::table('adidas_notice')->where('notice_id', $id)->first();
        // var_dump($res);
        return view('Admin.notice.edit', ['res'=>$res]);
    }

    //公告修改操作
    public function postUpdate(Request $request){
        // var_dump($request->all());exit;
        $data = $request->except('_token');
        $res = DB::table('adidas_notice')->where('notice_id', $data['notice_id'])->update($data);
        if ( $res ) {
            return $this->success('修改成功', '/admin/notice/index');
        } else {
            return $this->error('修改失败', '/admin/notice/index');
        }
    }

    //公告删除操作
    public function getDelete($id){
        $res = DB::table('adidas_notice')->where('notice_id', $id)->delete();
        // var_dump($res);
        if ( $res ) {          
            /*return view('layout.success', [ 'message'=>'修改成功',  
                                          'url'=>'/admin/notice/index',
                                          'time'=>3  
                                        ]);*/
            //返回一个成功页的静态方法                            
            return $this->success('删除成功', '/admin/notice/index');
        } else {
            /*return view('layout.error', [ 'message'=>'修改失败',    
                                          'url'=>'/admin/notice/index',
                                          'time'=>3  
                                        ]);*/
            //返回一个成功页的静态方法
            return $this->error('删除失败', '/admin/notice/index');
        }
    }



}
