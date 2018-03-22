@extends('layout.index')

@section('title')
尺码修改
@endsection

@section('content')
<div id="invalid" class="block-area">
    <h3 class="block-title">尺码修改</h3>
    <form action='/admin/good/updatesize' method="post" enctype="multipart/form-data" class="form-validation-2" role="form">
        <input type="hidden" name="goods_size_id" value="{{$res['goods_size_id']}}" />
        <input type="hidden" name="goods_id" value="{{$res['goods_id']}}" />
        <input type="hidden" name="goods_color_id" value="{{$res['goods_color_id']}}" />
        {{csrf_field()}}
        
        <div class="form-group">
            <label>选择尺码：</label>
            <div data-toggle="buttons" class="btn-group">
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" value="M" name="goods_size" @if( $res['goods_size'] == 'M' ) checked @endif> M
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" value="S" name="goods_size" @if( $res['goods_size'] == 'S' ) checked @endif> S
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio"  value="L" name="goods_size" @if( $res['goods_size'] == 'L' ) checked @endif> L
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio"  value="XL" name="goods_size" @if( $res['goods_size'] == 'XL' ) checked @endif> XL
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" value="XXL" name="goods_size" @if( $res['goods_size'] == 'XXL' ) checked @endif> XXL
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio"  value="XXXL" name="goods_size" @if( $res['goods_size'] == 'XXXL' ) checked @endif> XXXL
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio"  value="35" name="goods_size" @if( $res['goods_size'] == '35' ) checked @endif> 35
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio"  value="36" name="goods_size" @if( $res['goods_size'] == '36' ) checked @endif> 36
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio"  value="37" name="goods_size" @if( $res['goods_size'] == '37' ) checked @endif> 37
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio"  value="38" name="goods_size" @if( $res['goods_size'] == '38' ) checked @endif> 38
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio"  value="39" name="goods_size" @if( $res['goods_size'] == '39' ) checked @endif> 39
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio"  value="40" name="goods_size" @if( $res['goods_size'] == '40' ) checked @endif> 40
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio"  value="41" name="goods_size" @if( $res['goods_size'] == '41' ) checked @endif> 41
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio"  value="42" name="goods_size" @if( $res['goods_size'] == '42') checked @endif> 42
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" value="43" name="goods_size" @if( $res['goods_size'] == '43' ) checked @endif> 43
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio"  value="44" name="goods_size" @if( $res['goods_size'] == '44' ) checked @endif> 44
                </label>
            </div>
        </div>
        <!-- 
        商品小图片
        <div data-provides="fileupload" class="fileupload fileupload-new">
            <div class="fileupload-preview thumbnail form-control"></div>   
            <div>
                <span class="btn btn-file btn-alt btn-sm">
                    <span class="fileupload-new">选择图片</span>
                    <span class="fileupload-exists">Change</span>
                    <input type="file"  name="goods_littlepic" >
                </span>
                <a data-dismiss="fileupload" class="btn fileupload-exists btn-sm" href="#">移出头像</a>
            </div>
        </div> -->

        
        <input type="submit" value="修改" class="btn btn-sm">
        <!-- <button class="btn btn-sm validation-clear">CLOSE PROMPTS</button> -->
    </form>
</div>
@endsection