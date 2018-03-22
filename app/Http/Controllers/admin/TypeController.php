<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TypeController extends Controller
{
    //添加分类页面
    public function getAdd(){

        //查询下拉列表里的类别名并以下面这种方式显示
        /*
            服装
            |----男装
            |----|----男裤
            |----|----男鞋
            |----女装
            |----|----裙子
         */
        //下面查询按上面的例子排列
        $res = DB::select("select *,concat(types_path,',',types_id) as paths from adidas_types order by paths");
        // var_dump($res);exit;
        foreach( $res as $k=>$v ){
            //把路径按','分割成数组
            $tmp = explode(',', $v['types_path']);

            // var_dump($tmp);
            $length = count( $tmp )-1;
            //把类名重新拼接
            $res[$k]['types_name'] = str_repeat('|----', $length).$v['types_name'];
        }

        //返回视图并把数组发过去
        return view('Admin.type.add', ['res'=>$res]);

    }

    //添加分类的操作
    public function postInsert(Request $request){
        // dd($request->all());

        //除去'_token'，剩下的放入数组
        $data = $request -> except('_token');

        if ( $data['types_pid'] == 0 ) {
            $data['types_path'] = 0;
        } else {
            $res = DB::table('adidas_types')->where('types_id', $data['types_pid'])->first();
            $data['types_path'] = $res['types_path'].','.$res['types_id'];
            //var_dump($data['path']);
        }

        if ( DB::table('adidas_types')->insert($data) ) {
            return redirect('/admin/type/index');
            //return $this->success('添加成功', '/admin/type/index');
        } else {
            return redirect('/admin/type/index');
            // return $this->error('添加失败', '/admin/type/index');
        }
    }

    //分类列表
    public function getIndex(Request $request){

        $res = DB::select("select *,concat(types_path,',',types_id) as paths from adidas_types order by paths");
        // var_dump($res);
        foreach( $res as $k=>$v ){
            //把路径按','分割成数组
            $tmp = explode(',', $v['types_path']);
            // var_dump($stmp);
            $length = count( $tmp )-1;

            //创建一个顶级分类
            if($res[$k]['types_pid']==0){
                $res[$k]['types_pname'] = '顶级分类';
            }else{
                //查询得到父类别名称
                $data = DB::table('adidas_types')->where('types_id', $res[$k]['types_pid'])->first();
                $res[$k]['types_pname'] = $data['types_name'];
            }
            //把类名重新拼接
            $res[$k]['types_name'] = str_repeat('|---', $length).$v['types_name'];
        }

        // var_dump($res);
        return view('Admin.type.index', ['res'=>$res]);
    }

    //添加子分类的页面
    public function getAddchild($id){
        //根据传来的ID查询数据库
        $res = DB::table('adidas_types')->where('types_id', $id)->first();

        return view('Admin.type.addchild', ['res'=>$res]);
    }

    //添加子分类的操作
    public function postChildinsert(Request $request){
        // var_dump($request->all());exit;
        $data = $request -> except('_token');
        // var_dump($data);exit;
        $res = DB::table('adidas_types')->where('types_id', $data['types_id'])->first();
        $data1['types_pid'] = $data['types_id'];
        $data1['types_name'] = $data['types_name'];
        $data1['types_descr'] = $data['types_descr'];
        //子类的路径就等于 '父类的路径,父类的id'
        $data1['types_path'] = $res['types_path'].','.$res['types_id'];
        // var_dump($data);exit;

        if ( DB::table('adidas_types')->insert($data1) ) {
            return redirect('/admin/type/index');
            //return $this->success('添加成功', '/admin/type/index');
        } else {
            return $this->error('添加失败', '/admin/type/index');
        }


    }


    //分类的修改页面
    public function getEdit($id){
        //根据传来的ID查询数据库
        //dd($id);
        $res = DB::table('adidas_types')->where('types_id', $id)->first();
         //var_dump($res);exit;
        return view('Admin.type.edit', ['res'=>$res]);
    }

    //分类的修改操作
    public function postUpdate(Request $request){
        //接收修改过后的数据
        $data = $request -> except('_token');
        //var_dump($data);
        if ( DB::table('adidas_types')->where('types_id', $data['types_id'])->update($data) ) {
            return $this->success('修改成功', '/admin/type/index');
        } else {
            return $this->error('修改失败', '/admin/type/index');
        }

    }

    //分类的删除操作
    public function getDelete($id){

        /**
         * 根据传来的 $id 进行数据库查询
         * 如果传来的$id 等于数据库中的types_pid
         * 就说明所要删除的类中有子类
         * @param $id  就是 types_id
         */
        $res = DB::table('adidas_types')->where('types_pid', $id)->get();
        //var_dump($res);

        //判断查询结果 $res ,若无值就删除，有值就不能删除
        if ( !$res ) {
            if (DB::table('adidas_types')->where('types_id', $id)->delete() ) {
                return $this->success('删除成功', '/admin/type/index');
            }
        } else {
           return $this->error('删除失败', '/admin/type/index');
        }

    }




}
