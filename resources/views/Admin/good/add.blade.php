@extends('layout.index')

@section('title')
商品添加
@endsection

@section('content')
<div id="invalid" class="block-area">
    <h3 class="block-title">商品添加</h3>
    <form action='/admin/good/insert' method="post" enctype="multipart/form-data" class="form-validation-2" role="form">
    {{csrf_field()}}

    <!-- 添加商品主表 -->

        <!-- 父级类别 -->
        <div class="form-group">
            <label>商品:</label>
            <select name="types_id" class="form-control input-sm m-b-10">
                <option selected="" value="0">--顶级分类--</option>
            @foreach($res as $k=>$v)  
                <option value="{{$v['types_id']}}">{{$v['types_name']}}</option>
            @endforeach
            </select>
        </div>

        <!-- goodsname -->
        <div class="form-group">
            <label></label>
            <input type="text" name="goods_goodname" placeholder="请输入商品名" class="input-sm validate[required,custom[phone]] form-control">
        </div>
        
        <!-- 商品描述 -->
        <div class="form-group">
            <label></label>
            <input type="text" name="goods_descr" placeholder="请输入商品描述" class="input-sm validate[required,custom[phone]] form-control">
        </div>

        <!-- 商品原价 -->
        <div class="form-group">
            <label></label>
            <input type="text" name="goods_price" placeholder="商品原价" class="input-sm form-control validate[required,custom[url]]" value="">
        </div>
        
        <!-- 商品现价 -->
        <div class="form-group">
            <label></label>
            <input type="text" name="goods_now_price" placeholder="商品现价" class="form-control input-sm validate[required,custom[email]]">
        </div>
        
        <!-- 商品图片 -->
        <div data-provides="fileupload" class="fileupload fileupload-new">
            <div class="fileupload-preview thumbnail form-control"></div>   
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
                <option selected="" readonly value="1">新上架</option>
            </select>
        </div>
    <!-- 添加商品主表结束 -->
        <input type="submit" value="添加" class="btn btn-sm">
        <!-- <button class="btn btn-sm validation-clear">CLOSE PROMPTS</button> -->
    </form>
</div>
@endsection