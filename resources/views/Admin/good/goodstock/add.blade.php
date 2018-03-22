@extends('layout.index')

@section('title')
商品库存添加
@endsection

@section('content')
<div id="invalid" class="block-area">
    <h3 class="block-title">商品库存添加</h3>
    <form action='/admin/good/insertstock' method="post" enctype="multipart/form-data" class="form-validation-2" role="form">
        <input type="hidden" name="goods_id" value="{{$res['goods_id']}}" />
        <input type="hidden" name="goods_color_id" value="{{$res['goods_color_id']}}" />
        <input type="hidden" name="goods_size_id" value="{{$res['goods_size_id']}}" />
        {{csrf_field()}}

        <!-- 商品库存 -->
        <div class="form-group">
            <label>商品库存：</label>
            <input type="number" name="goods_stock" placeholder="商品库存" class="input-sm form-control validate[required,custom[url]]" value="">
        </div>
        
        <!-- 被购买数量 -->
        <div class="form-group">
            <label>被购买数量</label>
            <input type="number" name="goods_amount" placeholder="被购买数量" class="form-control input-sm validate[required,custom[email]]">
        </div>
       
        <input type="submit" value="添加" class="btn btn-sm">
        <!-- <button class="btn btn-sm validation-clear">CLOSE PROMPTS</button> -->
    </form>
</div>
@endsection