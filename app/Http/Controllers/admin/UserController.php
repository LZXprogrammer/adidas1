<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use DB;
use Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function getAdd(){
        return view('Admin.user.add');
    }

    //用户的添加操作
    public function postInsert(Request $request){
        //var_dump($request->all());
        $data = $request -> except('_token');
        //$data['token'] = str_random(30);
        $data['users_pass'] = Hash::make($data['users_pass']);
        $data['users_addtime'] = Date('Y-m-d H:i:s');
        // var_dump($data['users_addtime']);exit;
        //数据库添加
        if(DB::table('adidas_users')->insert($data)){
            return $this->success('添加成功', '/admin/user/index');
        }else{
            return $this->error('添加失败', '/admin/user/index');
        }
    }

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
            $res = DB::table('adidas_users')->where('users_username', 'like', '%'.$search.'%')->paginate($count);

            //返回视图，并把结果数组和全部参数一同交给Admin.user.index
            return view('Admin.user.index', ['res'=>$res, 'request'=>$request]);

        } else {
            $res = DB::table('adidas_users')->paginate(10);
            //显示管理员列表页
            return view('Admin.user.index', ['res'=>$res, 'request'=>$request->all()]);
        }

    }

    //后台用户的修改页
    public function getEdit($id){
        //var_dump($id);
        //根据传来的id来查询信息
        $res = DB::table('adidas_users')->where('users_id', $id)->first();
        //var_dump($res);
        //把结果数组传到Admin.user.edit里面
        return view('Admin.user.edit', ['res'=>$res]);

    }

    //后台用户的修改操作
    public function postUpdate(Request $request){
        //var_dump($request);
        $data = $request -> except('_token');
        // var_dump($data);

        if( DB::table('adidas_users')->where('users_id', $data['users_id'])->update($data) ){
            return $this->success('修改成功', '/admin/user/index');
        }else{
            return $this->error('修改失败', '/admin/user/index');
        }

    }

    //后台用户的删除操作
    public function getDelete($id){
        // echo $id;
        if( DB::table('adidas_users')->where('users_id', $id)->delete() ){
            return $this->success('删除成功', '/admin/user/index');
        }else{
            return $this->error('删除失败', '/admin/user/index');
        }
    }


}
