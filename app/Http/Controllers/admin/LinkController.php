<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LinkController extends Controller
{
    //添加友情链接
    public function getAdd(){
        return view('Admin.link.add');
    }

    //友情链接添加操作
    public function postInsert(Request $request){
        // var_dump($request->all());
        $data = $request -> except('_token');
        // var_dump($data);
        $data['links_addtime'] = date('Y-m_d H:i:s');

        if ( DB::table('adidas_links')->insert($data) ) {
            return $this->success('添加成功', '/admin/link/index');
        } else {
            return $this->error('添加失败', '/admin/link/index');
        }

    }

    //友情链接列表
    public function getIndex(Request $request){
        // var_dump($request->all());
        
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
            // var_dump(expression)
            //获取全部的参数
            $request = $request -> all();
            // var_dump($request);
            // exit;
            //查询信息并分页
            $res = DB::table('adidas_links')->where('links_name', 'like', '%'.$search.'%')->paginate($count);

            //返回视图，并把结果数组和全部参数一同交给Admin.link.index
            return view('Admin.link.index', ['res'=>$res, 'request'=>$request]);

        } else {
            $res = DB::table('adidas_links')->paginate(10);

            //显示管理员列表页
            return view('Admin.link.index', ['res'=>$res, 'request'=>$request->all()]);
        }
        
    }

    //友情链接的修改页面
    public function getEdit($id){
        //根据传来的id来查询数据库
        $res = DB::table('adidas_links')->where('links_id', $id)->first();
        // var_dump($res);
        return view('Admin.link.edit', ['res'=>$res]);
    }

    //友情链接的修改操作
    public function postUpdate(Request $request){
        $data = $request -> except('_token');
        // var_dump($data);
        
        if ( DB::table('adidas_links')->where('links_id', $data['links_id'])->update( $data ) ) {
            return $this->success('修改成功', '/admin/link/index');
        } else {
            return $this->error('修改失败', '/admin/link/index');
        }


    }

    //友情链接的删除操作
    public function getDelete($id){
        $res = DB::table('adidas_links')->where('links_id', $id)->delete();

        if ( $res ) {
            return $this->success('删除成功', '/admin/link/index');
        } else {
            return $this->error('删除失败', '/admin/link/index');
        }

    }




}
