@extends('layout.index')

@section('title')
商品库存添加
@endsection

@section('content')
<div id="invalid" class="block-area">
    <h3 class="block-title">商品库存添加</h3>
    <form action='/admin/good/updatestock' method="post" enctype="multipart/form-data" class="form-validation-2" role="form">
        <input type="hidden" name="goods_id" value="{{$res['goods_id']}}" />
        <input type="hidden" name="goods_color_id" value="{{$res['goods_color_id']}}" />
        <input type="hidden" name="goods_size_id" value="{{$res['goods_size_id']}}" />
        <input type="hidden" name="goods_stock_id" value="{{$res['goods_stock_id']}}" />
        {{csrf_field()}}

        <!-- 商品库存 -->
        <div class="form-group">
            <label>商品库存：</label>
            <input type="number" name="goods_stock" value="{{$res['goods_stock']}}" class="input-sm form-control validate[required,custom[url]]">
        </div>
        
        <!-- 被购买数量 -->
        <div class="form-group">
            <label>被购买数量</label>
            <input type="number" name="goods_amount" value="{{$res['goods_amount']}}" class="form-control input-sm validate[required,custom[email]]">
        </div>
       
        <input type="submit" value="修改" class="btn btn-sm">
        <!-- <button class="btn btn-sm validation-clear">CLOSE PROMPTS</button> -->
    </form>
</div>
@endsection