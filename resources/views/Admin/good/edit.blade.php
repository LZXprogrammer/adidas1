@extends('layout.index')

@section('title')
商品修改
@endsection

@section('content')
<div id="invalid" class="block-area">
    <h3 class="block-title">商品修改</h3>
    <form action='/admin/good/update' method="post" enctype="multipart/form-data" class="form-validation-2" role="form">
        <input type="hidden" name="goods_id" value="{{$res['goods_id']}}">
        {{csrf_field()}}
        <!-- 类别名称 -->
        <div class="form-group">
            <label>类别名称</label>
            <input type="text" readonly value="{{$res['types_name']}}" placeholder="请输入类别名" class="input-sm validate[required,custom[phone]] form-control">
        </div>

        <!-- goodsname -->
        <div class="form-group">
            <label>商品名称</label>
            <input type="text" name="goods_goodname" value="{{$res['goods_goodname']}}" placeholder="请输入商品名" class="input-sm validate[required,custom[phone]] form-control">
        </div>
        
        <!-- 商品描述 -->
        <div class="form-group">
            <label>商品描述</label>
            <input type="text" name="goods_descr" value="{{$res['goods_descr']}}" placeholder="请输入商品描述" class="input-sm validate[required,custom[phone]] form-control">
        </div>

        <!-- 商品原价 -->
        <div class="form-group">
            <label>商品原价</label>
            <input type="text" name="goods_price" value="{{$res['goods_price']}}" placeholder="商品原价" class="input-sm form-control validate[required,custom[url]]" value="">
        </div>
        
        <!-- 商品现价 -->
        <div class="form-group">
            <label>商品现价</label>
            <input type="text" name="goods_now_price" value="{{$res['goods_now_price']}}" placeholder="商品现价" class="form-control input-sm validate[required,custom[email]]">
        </div>

        <!-- 商品编码号 -->
        <div class="form-group">
            <label>商品编码号</label>
            <input type="text" readonly name="goods_code" value="{{$res['goods_code']}}" placeholder="商品编码号" class="form-control input-sm validate[required,custom[date]]">
        </div>
        
        <!-- 商品图片 -->
        <div data-provides="fileupload" class="fileupload fileupload-new">
            <div class="fileupload-preview thumbnail form-control">
                <img src="@if( $res['goods_bigpic'] ) 
                                /upload/goods_bigpic/{{$res['goods_bigpic'] }}
                            @else 
                                /upload/goods_bigpic/image/admin.jpg
                            @endif" />
            </div>   
            <div>
                <span class="btn btn-file btn-alt btn-sm">
                    <span class="fileupload-new">选择图片</span>
                    <span class="fileupload-exists">Change</span>
                    <input type="file"  name="goods_bigpic" >
                </span>
                <a data-dismiss="fileupload" class="btn fileupload-exists btn-sm" href="#">移出头像</a>
            </div>
        </div>

        <!-- state -->
        <div class="form-group">
            <label>状态</label>
            <select name="goods_state" class="form-control input-sm m-b-10">
                <option selected="" value="1">新上架</option>
                <option  value="2">在售</option>
                <option  value="3">下架</option>
            </select>
        </div>
        <input type="submit" value="添加" class="btn btn-sm">
        <!-- <button class="btn btn-sm validation-clear">CLOSE PROMPTS</button> -->
    </form>
</div>
@endsection