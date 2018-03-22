<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GoodController extends Controller
{
    //商品添加页
    public function getAdd(){
    	//查询类别表的类别，并按一定格式排列
    	$res = DB::select("select *,concat(types_path,',',types_id) as paths from adidas_types order by paths");
        // var_dump($res);
        foreach( $res as $k=>$v ){
            //把路径按','分割成数组
            $tmp = explode(',', $v['types_path']);
            // var_dump($stmp);
            $length = count( $tmp )-1;
            //把类名重新拼接
            $res[$k]['types_name'] = str_repeat('|----', $length).$v['types_name'];
        }
        return view('Admin.good.add', ['res'=>$res]);
   	}

    //商品添加操作
    public function postInsert(Request $request){
        //这个数组只存入商品主表的信息
    	$data = $request -> except('_token','goods_size','goods_color','goods_littlepic','goods_littlepic','goods_stock','goods_amount');

        //添加一个添加时间
    	$data['goods_addtime'] = date('Y-m_d H:i:s');

        //商品编码号用随机数生成
        $bh = $this -> random();
        $data['goods_code'] = $bh;

    	//图片上传
    	if ( $request->hasFile('goods_bigpic') ) {
			//拼接文件名字
			$name = md5 ( time()+rand(1000, 9999) );
			$houzui = $request ->file('goods_bigpic')->getClientOriginalExtension();
			//把上传的文件移到自己定的位置
			$request ->file('goods_bigpic')->move('upload/goods_bigpic/'.date('Ymd'), $name.'.'.$houzui);
			$filename = date('Ymd').'/'.$name.'.'.$houzui;
			$data['goods_bigpic'] = $filename;
		}

		//进行商品表添加并返回当前商品的ID
        $res = DB::table('adidas_goods')->insert( $data );
        if ( $res ) {
            return redirect('/admin/good/index');
            //return $this->success('添加成功', '/admin/good/index');
        } else {
            return redirect('/admin/good/index');
            // return $this->error('添加失败', '/admin/manager/index');
        }
    }

    //商品显示列表
    public function getIndex(Request $request){
        // var_dump($request->all());exit;

        //如果传来的分页(count)的值或搜索(search)的值存在
        if ( $request->input('count') || $request->input('search') ) {
            //接收传来的值
            $count = $request -> input('count', 10);//显示页数
            $search = $request -> input('search', '');//搜索条件

            /**
             * [$count description]
             * 当显示条数不选时，用户列表页传来的值为空，若要用用户名查询
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
            $res = DB::table('adidas_goods')
            ->join('adidas_types', 'adidas_goods.types_id', '=', 'adidas_types.types_id')
            ->select('adidas_goods.*', 'adidas_types.types_name')
            ->where('goods_goodname', 'like', '%'.$search.'%')
            ->paginate($count);

            //返回视图，并把结果数组和全部参数一同返回
            return view('Admin.good.index', ['res'=>$res, 'request'=>$request]);

        } else {
            //goods表 和 types表联合查询
            $res = DB::table('adidas_goods')
            ->join('adidas_types', 'adidas_goods.types_id', '=', 'adidas_types.types_id')
            ->select('adidas_goods.*', 'adidas_types.types_name')
            ->paginate(10);

            //显示列表页
            // var_dump($request->all());exit;
            return view('Admin.good.index', ['res'=>$res, 'request'=>$request->all()]);
        }
    }

    //商品修改页面
    public function getEdit($id){

        $res = DB::table('adidas_goods')
        ->join('adidas_types', 'adidas_goods.types_id', '=', 'adidas_types.types_id')
        ->select('adidas_goods.*', 'adidas_types.types_name')
        ->where('goods_id', $id)
        ->first();
        // var_dump($data);exit;
        return view('Admin.good.edit', ['res'=>$res]);

    }

    //商品修改操作
    public function postUpdate(Request $request){

        $data = $request -> except('_token');
        // var_dump($data);exit;

        //文件上传
        // $data = $request -> hasFile('managers_pic');
        //var_dump($data);exit;
        if ( $request->hasFile('goods_bigpic') ) {
            //拼接文件名字
            $name = md5 ( time()+rand(1000, 9999) );
            $houzui = $request ->file('goods_bigpic')->getClientOriginalExtension();

            //把上传的文件移到自己定的位置
            $request ->file('goods_bigpic')->move('upload/goods_bigpic/'.date('Ymd'), $name.'.'.$houzui);

            $filename = date('Ymd').'/'.$name.'.'.$houzui;
            $data['goods_bigpic'] = $filename;
        }

        $res = DB::table('adidas_goods')->where('goods_id', $data['goods_id'])->update($data);
        if ( $res ) {
            return $this->success('修改成功', '/admin/good/index');
        } else {
            return $this->error('修改失败', '/admin/good/index');
        }

    }

    //商品删除操作
    public function getDelete($id){

        $res = DB::table('adidas_goods')->where('goods_id', $id)->delete();
        if ( $res ) {
            return $this->success('修改成功', '/admin/good/index');
        } else {
            return $this->error('修改失败', '/admin/good/index');
        }
    }

    //随机数生成商品编码号
    public function random(){

        $str = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $bh="";
        for ( $i=0;$i<5;$i++ ) {
            $bh .= $str[ rand(0, strlen($str)-1) ];

        }
        for ( $i=0;$i<5;$i++ ) {
            $bh .= rand(0, 9);
        }
        return $bh;
    }


    /**
     * 下面是商品颜色表的添加
     * @param [type]
     */
    public function getAddcolor($goods_id){

        // $res = DB::table('adidas_goodcolor')->where('goods_id', $goods_id)->first();
        // var_dump($res);exit;

        return view('Admin.good.goodcolor.add',['goods_id'=>$goods_id]);
    }

    //下面是商品小图片的添加页
    public function getAddlittlepic($goods_color_id){

        $res = DB::table('adidas_goodcolor')->where('goods_color_id', $goods_color_id)->first();
        // var_dump($res);exit;
        return view('Admin.good.goodcolor.addlittlepic',['res'=>$res]);
    }

    //下面是商品小图片的添加操作
    public function postInsertlittlepic(Request $request){
        $data = $request -> except('_token');

        // var_dump($data);exit;
        //图片上传
        if ( $request->hasFile('goods_littlepic') ) {
            //拼接文件名字
            $name = md5 ( time()+rand(1000, 9999) );
            $houzui = $request ->file('goods_littlepic')->getClientOriginalExtension();
            //把上传的文件移到自己定的位置
            $request ->file('goods_littlepic')->move('upload/goods_littlepic/'.date('Ymd'), $name.'.'.$houzui);
            $filename = date('Ymd').'/'.$name.'.'.$houzui;
            $data['goods_littlepic'] = $filename;
        }
        //进行数据库操作
        if ( DB::table('adidas_goodcolor')->insert( $data ) ) {

            return $this->success('添加成功', '/admin/good/indexcolor?goods_id='.$data['goods_id']);
        } else {

            return $this->error('添加失败', '/admin/good/indexcolor?goods_id='.$data['goods_id']);
        }


    }

    //下面是商品颜色表的添加操作
    public function postInsertcolor(Request $request){

        $res = $request -> except('_token');
        // var_dump($res);exit;
        //图片上传
        if ( $request->hasFile('goods_littlepic') ) {
            //拼接文件名字
            $name = md5 ( time()+rand(1000, 9999) );
            $houzui = $request ->file('goods_littlepic')->getClientOriginalExtension();
            //把上传的文件移到自己定的位置
            $request ->file('goods_littlepic')->move('upload/goods_littlepic/'.date('Ymd'), $name.'.'.$houzui);
            $filename = date('Ymd').'/'.$name.'.'.$houzui;
            $res['goods_littlepic'] = $filename;
        }

        //进行数据库操作
        if ( DB::table('adidas_goodcolor')->insert( $res ) ) {
            return $this->success('添加成功', '/admin/good/index');
        } else {
            return $this->error('添加失败', '/admin/manager/index');
        }
    }

    //下面是商品颜色列表
    public function getIndexcolor(Request $request){
        $data = $request->all();
        // var_dump($data);
        // var_dump($request->all());exit;
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
            $res = DB::table('adidas_goodcolor')
            ->join('adidas_goods', 'adidas_goodcolor.goods_id', '=', 'adidas_goods.goods_id')
            ->select('adidas_goodcolor.*', 'adidas_goods.goods_goodname')
            ->where('adidas_goods.goods_id', $data['goods_id'])
            ->where('goods_goodname', 'like', '%'.$search.'%')
            ->paginate($count);

            //返回视图，并把结果数组和全部参数一同返回
            return view('Admin.good.goodcolor.indexcolor', ['res'=>$res, 'request'=>$request]);

        } else {

            $res = DB::table('adidas_goodcolor')
            ->join('adidas_goods', 'adidas_goodcolor.goods_id', '=', 'adidas_goods.goods_id')
            ->select('adidas_goodcolor.*', 'adidas_goods.goods_goodname')
            ->where('adidas_goodcolor.goods_id', $data['goods_id'])
            ->paginate(10);
            // dd($res);exit;
            //显示商品颜色列表页
            return view('Admin.good.goodcolor.indexcolor', ['res'=>$res, 'request'=>$request->all()]);
        }
    }

    //下面是商品颜色表的修改页面
    public function getEditcolor($goods_color_id){

        $res = DB::table('adidas_goodcolor')->where('goods_color_id', $goods_color_id)->first();
        // var_dump($res);exit;
        return view('Admin.good.goodcolor.edit', ['res'=>$res]);
    }

    //下面是商品颜色表的修改操作
    public function postUpdatecolor(Request $request){
        $data = $request -> except('_token');
        // var_dump($data);exit;

        //文件上传
        // $data = $request -> hasFile('managers_pic');
        //var_dump($data);exit;
        if ( $request->hasFile('goods_littlepic') ) {
            //拼接文件名字
            $name = md5 ( time()+rand(1000, 9999) );
            $houzui = $request ->file('goods_littlepic')->getClientOriginalExtension();

            //把上传的文件移到自己定的位置
            $request ->file('goods_littlepic')->move('upload/goods_littlepic/'.date('Ymd'), $name.'.'.$houzui);

            $filename = date('Ymd').'/'.$name.'.'.$houzui;
            $data['goods_littlepic'] = $filename;
        }

        $res = DB::table('adidas_goodcolor')->where('goods_color_id', $data['goods_color_id'])->update($data);
        if ( $res ) {
            return $this->success('修改成功', '/admin/good/indexcolor?goods_id='.$data['goods_id']);
        } else {
            return $this->error('修改失败', '/admin/good/indexcolor?goods_id='.$data['goods_id']);
        }
    }

    //下面是商品颜色的删除
    public function getDeletecolor($goods_color_id, $goods_id){

        $res = DB::table('adidas_goodcolor')->where('goods_color_id', $goods_color_id)->delete();
        if ( $res ) {
            return $this->success('删除成功', '/admin/good/indexcolor?goods_id='.$goods_id);
        } else {
            return $this->error('删除失败', '/admin/good/indexcolor?goods_id='.$goods_id);
        }

    }

    /**
     * 下面是商品尺码表的操作
     * @param [type]
     */

    //这里是商品尺码的添加
    public function getAddsize($goods_color_id){

        $res = DB::table('adidas_goodcolor')->where('goods_color_id', $goods_color_id)->first();
        // var_dump($res);exit;
        //res里面有商品ID和商品颜色ID，都要传过去
        return view('Admin.good.goodsize.add',['res'=>$res]);
    }

    public function postInsertsize(Request $request){

        $data = $request -> except('_token');
        // var_dump($data);die;
        $res = DB::table('adidas_goodsize')->insert( $data );

        if ( $res ) {
            return $this->success('添加成功', "/admin/good/indexcolor?goods_id=".$data['goods_id']);
        } else {
            return $this->error('添加失败', "/admin/good/indexcolor?goods_id=".$data['goods_id']);
        }
    }

    //这是商品尺码的显示页indexsize
    public function getIndexsize(Request $request){
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
            $res = DB::table('adidas_goodsize')
            ->join('adidas_goods', 'adidas_goodsize.goods_id', '=', 'adidas_goods.goods_id')
            ->join('adidas_goodcolor', 'adidas_goodsize.good_color_id', '=', 'adidas_goodcolor.goods_color_id')
            ->select('adidas_goodsize.*', 'adidas_goods.goods_goodname', 'adidas_goodcolor.goods_color')
            ->where('adidas_goodsize.goods_id', $data['goods_id'])
            ->where('adidas_goodsize.goods_color_id', $data['goods_color_id'])
            ->where('goods_goodname', 'like', '%'.$search.'%')
            ->paginate($count);

            //返回视图，并把结果数组和全部参数一同返回
            return view('Admin.good.goodsize.indexsize', ['res'=>$res, 'request'=>$request]);

        } else {
            $data = $request -> all();
            // var_dump($data);exit;
            $res = DB::table('adidas_goodsize')
            ->join('adidas_goods', 'adidas_goodsize.goods_id', '=', 'adidas_goods.goods_id')
            ->join('adidas_goodcolor', 'adidas_goodsize.goods_color_id', '=', 'adidas_goodcolor.goods_color_id')
            ->select('adidas_goodsize.*', 'adidas_goods.goods_goodname', 'adidas_goodcolor.goods_color')
            ->where('adidas_goodsize.goods_id', $data['goods_id'])
            ->where('adidas_goodsize.goods_color_id', $data['goods_color_id'])
            ->paginate(10);
            // var_dump($res);
            //显示尺码列表页
            return view('Admin.good.goodsize.indexsize', ['res'=>$res, 'request'=>$request->all()]);
        }
    }

    //这是商品尺码的修改页面
    public function getEditsize($goods_size_id){

        $res = DB::table('adidas_goodsize')->where('goods_size_id', $goods_size_id)->first();
        // var_dump($res);exit;
        return view('Admin.good.goodsize.edit', ['res'=>$res]);
    }

    //这是商品尺码的修改操作
    public function postUpdatesize(Request $request){

        $data = $request -> except('_token');
        // var_dump($data);exit;
        $res = DB::table('adidas_goodsize')
        ->where('goods_size_id', $data['goods_size_id'])
        ->update($data);

        if ( $res ) {
            return $this->success('修改成功', '/admin/good/indexsize?goods_id='.$data['goods_id'].'&goods_color_id='.$data['goods_color_id']);
        } else {
            return $this->error('修改失败', '/admin/good/indexsize?goods_id='.$data['goods_id'].'&goods_color_id='.$data['goods_color_id']);
        }
    }

    //这是商品尺码的删除操作
    public function getDeletesize($goods_size_id,$goods_color_id, $goods_id){
        // var_dump($goods_size_id);exit;
        $res = DB::table('adidas_goodsize')->where('goods_size_id', $goods_size_id)->delete();
        if ( $res ) {
            return $this->success('删除成功', '/admin/good/indexsize?goods_color_id='.$goods_color_id.'&goods_id='.$goods_id);
        } else {
            return $this->error('删除失败', '/admin/good/indexsize?goods_color_id='.$goods_color_id.'&goods_id='.$goods_id);
        }

    }

    /**
     * 下面是商品库存表的操作
     * @param [type]
     */

    //下面是商品库存的添加页
    public function getAddstock($goods_size_id){

        $res = DB::table('adidas_goodsize')->where('goods_size_id', $goods_size_id)->first();
        // var_dump($res);exit;
        return view('Admin.good.goodstock.add',['res'=>$res]);
    }

    //下面是商品库存的添加操作
    public function postInsertstock(Request $request){
        $data = $request -> except('_token');
        // var_dump($data);exit;
        $res = DB::table('adidas_goodstock')->insert( $data );

        if ( $res ) {
            return $this->success('添加成功', '/admin/good/indexsize?goods_id='.$data['goods_id'].'&goods_color_id='.$data['goods_color_id']);
        } else {
            return $this->success('添加失败', '/admin/good/indexsize?goods_id='.$data['goods_id'].'&goods_color_id='.$data['goods_color_id']);
        }

    }

    //下面是商品库存的显示列表
    public function getIndexstock(Request $request){

        $data = $request -> all();
        // var_dump($data);exit;
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
            $res = DB::table('adidas_goodstock')
            ->join('adidas_goods', 'adidas_goodstock.goods_id', '=', 'adidas_goods.goods_id')
            ->join('adidas_goodcolor', 'adidas_goodstock.goods_color_id', '=', 'adidas_goodcolor.goods_color_id')
            ->join('adidas_goodsize', 'adidas_goodstock.goods_size_id', '=', 'adidas_goodsize.goods_size_id')
            ->select('adidas_goodstock.*', 'adidas_goods.goods_goodname', 'adidas_goodcolor.goods_color', 'adidas_goodsize.goods_size')
            ->where('adidas_goodstock.goods_id', $data['goods_id'])
            ->where('adidas_goodstock.goods_color_id', $data['goods_color_id'])
            ->where('adidas_goodstock.goods_size_id', $data['goods_size_id'])
            ->where('goods_goodname', 'like', '%'.$search.'%')
            ->paginate($count);

            //返回视图，并把结果数组和全部参数一同返回
            return view('Admin.good.goodsize.indexsize', ['res'=>$res, 'request'=>$request]);

        } else {
            $data = $request -> all();
            // var_dump($data);
            $res = DB::table('adidas_goodstock')
            ->join('adidas_goods', 'adidas_goodstock.goods_id', '=', 'adidas_goods.goods_id')
            ->join('adidas_goodcolor', 'adidas_goodstock.goods_color_id', '=', 'adidas_goodcolor.goods_color_id')
            ->join('adidas_goodsize', 'adidas_goodstock.goods_size_id', '=', 'adidas_goodsize.goods_size_id')
            ->select('adidas_goodstock.*', 'adidas_goods.goods_goodname', 'adidas_goodcolor.goods_color', 'adidas_goodsize.goods_size')
            ->where('adidas_goodstock.goods_id', $data['goods_id'])
            ->where('adidas_goodstock.goods_color_id', $data['goods_color_id'])
            ->where('adidas_goodstock.goods_size_id', $data['goods_size_id'])
            ->paginate(10);
            // var_dump($res);
            //显示尺码列表页
            return view('Admin.good.goodstock.indexstock', ['res'=>$res, 'request'=>$request->all()]);
        }

    }

    //下面是商品库存的修改页面
    public function getEditstock($goods_stock_id){
        $res = DB::table('adidas_goodstock')->where('goods_stock_id', $goods_stock_id)->first();
        // var_dump($res);
        return view('Admin.good.goodstock.edit', ['res'=>$res]);
    }

    //下面是商品库存的修改操作
    public function postUpdatestock(Request $request){
        $data = $request -> except('_token');
        // var_dump($data); exit;
        $res = DB::table('adidas_goodstock')
        ->where('goods_stock_id', $data['goods_stock_id'])
        ->update($data);

        if ( $res ) {
            return $this->success('修改成功', '/admin/good/indexstock?goods_id='.$data['goods_id'].'&goods_color_id='.$data['goods_color_id'].'&goods_size_id='.$data['goods_size_id']);
        } else {
            return $this->error('修改失败', '/admin/good/indexstock?goods_id='.$data['goods_id'].'&goods_color_id='.$data['goods_color_id'].'&goods_size_id='.$data['goods_size_id']);
        }

    }

    //下面是商品库存的删除操作
    public function getDeletestock($goods_stock_id,$goods_size_id,$goods_color_id, $goods_id){
        // var_dump($goods_size_id);exit;
        $res = DB::table('adidas_goodstock')->where('goods_stock_id', $goods_stock_id)->delete();
        if ( $res ) {
            return $this->success('删除成功', '/admin/good/indexstock?goods_size_id='.$goods_size_id.'&goods_color_id='.$goods_color_id.'&goods_id='.$goods_id);
        } else {
            return $this->error('删除失败', '/admin/good/indexstock?goods_size_id='.$goods_size_id.'&goods_color_id='.$goods_color_id.'&goods_id='.$goods_id);
        }

    }
}
