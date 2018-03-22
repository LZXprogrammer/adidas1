@extends('layout.index')

@section('title')
颜色添加
@endsection

@section('content')
<div id="invalid" class="block-area">
    <h3 class="block-title">颜色添加</h3>
    <form action='/admin/good/insertlittlepic' method="post" enctype="multipart/form-data" class="form-validation-2" role="form">
        <input type="hidden" name="goods_id" value="{{$res['goods_id']}}" />
    
        
        {{csrf_field()}}
        
        <div class="form-group">
            <label>选择颜色：</label>
            <div data-toggle="buttons" class="btn-group">
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" id="option1" value="红色" name="goods_color"> 红色
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" id="option2" value="黄色" name="goods_color"> 黄色
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" id="option3" value="绿色" name="goods_color"> 绿色
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" id="option3" value="蓝色" name="goods_color"> 蓝色
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" id="option3" value="黑色" name="goods_color"> 黑色
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" id="option3" value="白色" name="goods_color"> 白色
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" id="option3" value="酒红" name="goods_color"> 酒红
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" id="option3" value="祖母绿" name="goods_color"> 祖母绿
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" id="option3" value="宁静粉蓝" name="goods_color"> 宁静粉蓝
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" id="option3" value="玫瑰石英" name="goods_color"> 玫瑰石英
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" id="option3" value="灰色" name="goods_color"> 灰色
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" id="option3" value="紫色" name="goods_color"> 紫色
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" id="option3" value="亮青" name="goods_color"> 亮青
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" id="option3" value="粉红" name="goods_color"> 粉红
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" id="option3" value="天蓝" name="goods_color"> 天蓝
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" id="option3" value="藏青" name="goods_color"> 藏青
                </label>
            </div>
        </div>
        
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
        </div>

        
        <input type="submit" value="添加" class="btn btn-sm">
        <!-- <button class="btn btn-sm validation-clear">CLOSE PROMPTS</button> -->
    </form>
</div>
@endsection