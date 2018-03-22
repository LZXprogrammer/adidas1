@extends('layout.index')

@section('title')
颜色修改
@endsection

@section('content')
<div id="invalid" class="block-area">
    <h3 class="block-title">颜色修改</h3>
    <form action='/admin/good/updatecolor' method="post" enctype="multipart/form-data" class="form-validation-2" role="form">
        <input type="hidden" name="goods_color_id" value="{{$res['goods_color_id']}}" />
        <input type="hidden" name="goods_id" value="{{$res['goods_id']}}" />
        {{csrf_field()}}
        
        <div class="form-group">
            <label>选择颜色：</label>
            <div data-toggle="buttons" class="btn-group">
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" id="option1" value="红色" @if( $res['goods_color'] == '红色' ) checked @endif name="goods_color"> 红色
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" id="option2" value="黄色" @if( $res['goods_color'] == '黄色' ) checked @endif name="goods_color"> 黄色
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" id="option3" value="绿色" @if( $res['goods_color'] == '绿色' ) checked @endif name="goods_color"> 绿色
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" id="option3" value="蓝色" @if( $res['goods_color'] == '蓝色' ) checked @endif name="goods_color"> 蓝色
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" id="option3" value="黑色" @if( $res['goods_color'] == '黑色' ) checked @endif name="goods_color"> 黑色
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" id="option3" value="白色" @if( $res['goods_color'] == '白色' ) checked @endif name="goods_color"> 白色
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" id="option3" value="酒红" @if( $res['goods_color'] == '酒红' ) checked @endif name="goods_color"> 酒红
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" id="option3" value="祖母绿" @if( $res['goods_color'] == '祖母绿' ) checked @endif name="goods_color"> 祖母绿
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" id="option3" value="宁静粉蓝" @if( $res['goods_color'] == '宁静粉蓝' ) checked @endif name="goods_color"> 宁静粉蓝
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" id="option3" value="玫瑰石英" @if( $res['goods_color'] == '玫瑰石英' ) checked @endif name="goods_color"> 玫瑰石英
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" id="option3" value="灰色" @if( $res['goods_color'] == '灰色' ) checked @endif name="goods_color"> 灰色
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" id="option3" value="紫色" @if( $res['goods_color'] == '紫色' ) checked @endif name="goods_color"> 紫色
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" id="option3" value="亮青" @if( $res['goods_color'] == '亮青' ) checked @endif name="goods_color"> 亮青
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" id="option3" value="粉红" @if( $res['goods_color'] == '粉红' ) checked @endif name="goods_color"> 粉红
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" id="option3" value="天蓝" @if( $res['goods_color'] == '天蓝' ) checked @endif name="goods_color"> 天蓝
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" id="option3" value="藏青" @if( $res['goods_color'] == '藏青' ) checked @endif name="goods_color"> 藏青
                </label>
            </div>
        </div>
        
        商品小图片
        <div data-provides="fileupload" class="fileupload fileupload-new">
            <div class="fileupload-preview thumbnail form-control">
                <img src="@if( $res['goods_littlepic'] ) 
                                /upload/goods_littlepic/{{$res['goods_littlepic'] }}
                            @else 
                                /upload/goods_littlepic/image/admin.jpg
                            @endif" />
            </div>   
            <div>
                <span class="btn btn-file btn-alt btn-sm">
                    <span class="fileupload-new">选择头像</span>
                    <span class="fileupload-exists">Change</span>
                    <input type="file" name="goods_littlepic" />
                </span>
                <a data-dismiss="fileupload" class="btn fileupload-exists btn-sm" href="#">移出头像</a>
            </div>
        </div>
        
        <input type="submit" value="修改" class="btn btn-sm">
        <!-- <button class="btn btn-sm validation-clear">CLOSE PROMPTS</button> -->
    </form>
</div>
@endsection