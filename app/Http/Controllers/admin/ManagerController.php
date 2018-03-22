<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use DB;
use Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ManagerController extends Controller
{
	//管理员添加页
	public function getAdd(){

		return view('Admin.manager.add');

	}

	//管理员添加操作
	public function postInsert(Request $request){
		$res = $request ->except('_token');
		// var_dump($res);
		// exit;

		//密码进行哈希加密
		$res['managers_pass'] = Hash::make($res['managers_pass']);

		//文件上传
		// $data = $request -> hasFile('managers_pic');
		//var_dump($data);exit;

		if ( $request->hasFile('managers_pic') ) {
			//拼接文件名字
			$name = md5 ( time()+rand(1000, 9999) );
			$houzui = $request ->file('managers_pic')->getClientOriginalExtension();

			//把上传的文件移到自己定的位置
			$request ->file('managers_pic')->move('upload/manager/'.date('Ymd'), $name.'.'.$houzui);


			$filename = date('Ymd').'/'.$name.'.'.$houzui;
			$res['managers_pic'] = $filename;
		}

		//进行数据库操作
		if (DB::table('adidas_managers')->insert( $res ) ) {
			return $this->success('添加成功', '/admin/manager/index');
		} else {
			return $this->error('添加失败', '/admin/manager/index');
		}

	}

	//管理员列表
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
        	// var_dump($request);
        	// exit;
        	//查询信息并分页
        	$res = DB::table('adidas_managers')->where('managers_username', 'like', '%'.$search.'%')->paginate($count);

        	//返回视图，并把结果数组和全部参数一同交给Admin.manager.index
        	return view('Admin.manager.index', ['res'=>$res, 'request'=>$request]);

        } else {
        	$res = DB::table('adidas_managers')->paginate(10);

        	//显示管理员列表页
        	return view('Admin.manager.index', ['res'=>$res, 'request'=>$request->all()]);
        }
    }

    //管理员修改界面
    public function getEdit($id){
    	$res = DB::table('adidas_managers')->where('managers_id', $id)->first();
    	// var_dump($res);exit;
  		return view('Admin.manager.edit', ['res'=>$res]);
    }

    //管理员修改操作
    public function postUpdate(Request $request){
    	//接收edit返回来的值
    	$res = $request -> except('_token');
    	// var_dump($res);exit;

    	//文件上传
		// $data = $request -> hasFile('managers_pic');
		//var_dump($data);exit;
		if ( $request->hasFile('managers_pic') ) {
			//拼接文件名字
			$name = md5 ( time()+rand(1000, 9999) );
			$houzui = $request ->file('managers_pic')->getClientOriginalExtension();

			//把上传的文件移到自己定的位置
			$request ->file('managers_pic')->move('upload/manager/'.date('Ymd'), $name.'.'.$houzui);

			$filename = date('Ymd').'/'.$name.'.'.$houzui;
			$res['managers_pic'] = $filename;
		}


    	if ( DB::table('adidas_managers')->where('managers_id', $res['managers_id'])->update( $res ) ) {
    		return $this->success('修改成功', '/admin/manager/index');
    	} else {
    		return $this->error('修改失败', '/admin/manager/index');
    	}
    }

    //管理员删除操作
    public function getDelete($id){
		if( DB::table('adidas_managers')->where('managers_id', $id)->delete() ) {
			return $this->success('删除成功', '/admin/manager/index');
		} else {
			return $this->error('删除失败', '/admin/manager/index');
		}
    }




}
