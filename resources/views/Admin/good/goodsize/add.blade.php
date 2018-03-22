@extends('layout.index')

@section('title')
尺码添加
@endsection

@section('content')
<div id="invalid" class="block-area">
    <h3 class="block-title">尺码添加</h3>
    <form action='/admin/good/insertsize' method="post" enctype="multipart/form-data" class="form-validation-2" role="form">
        <input type="hidden" name="goods_id" value="{{$res['goods_id']}}" />
        <input type="hidden" name="goods_color_id" value="{{$res['goods_color_id']}}" />
        
        {{csrf_field()}}

        <div class="form-group">
            <label>选择尺码：</label>
            <div data-toggle="buttons" class="btn-group">
            <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" value="M" name="goods_size"> M
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" value="L" name="goods_size"> S
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" value="S" name="goods_size"> L
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" value="XL" name="goods_size"> XL
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" value="XXL" name="goods_size"> XXL
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" value="XXXL" name="goods_size"> XXXL
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" value="35" name="goods_size"> 35
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" value="36" name="goods_size"> 36
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" value="37" name="goods_size"> 37
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" value="38" name="goods_size"> 38
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" value="38" name="goods_size"> 39
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" value="40" name="goods_size"> 40
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" value="41" name="goods_size"> 41
                </label>
                 <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" value="42" name="goods_size"> 42
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" value="43" name="goods_size"> 43
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" value="44" name="goods_size"> 44
                </label>
            </div>
           
        </div>

        <input type="submit" value="添加" class="btn btn-sm">
        <!-- <button class="btn btn-sm validation-clear">CLOSE PROMPTS</button> -->
    </form>
</div>
@endsection