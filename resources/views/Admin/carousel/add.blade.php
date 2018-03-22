@extends('layout.index')

@section('title')
轮播添加
@endsection

@section('content')
<div id="invalid" class="block-area">
    <h3 class="block-title">轮播添加</h3>
    <form action='/admin/carousel/insert' method="post" enctype="multipart/form-data" class="form-validation-2" role="form">
    {{csrf_field()}}
        <!-- title -->
        <div class="form-group">
            <label></label>
            <input type="text" name="carousel_title" placeholder="请输入轮播标题" class="input-sm validate[required,custom[phone]] form-control">
        </div>
        
        <!-- descr -->
        <div class="form-group">
            <label></label>
            <input type="text" name="carousel_descr" placeholder="请输入轮播描述" class="input-sm form-control validate[required,custom[url]]" value="">
        </div>
        
        <!-- pic -->
        <div data-provides="fileupload" class="fileupload fileupload-new">
            <div class="fileupload-preview thumbnail form-control"></div>   
            <div>
                <span class="btn btn-file btn-alt btn-sm">
                    <span class="fileupload-new">选择头像</span>
                    <span class="fileupload-exists">Change</span>
                    <input type="file"  name="carousel_pic" >
                </span>
                <a data-dismiss="fileupload" class="btn fileupload-exists btn-sm" href="#">移出头像</a>
            </div>
        </div>

        <!-- link -->
        <div class="form-group">
            <label>请输入你的链接地址</label>
            <input type="text" name="carousel_link" value="http://" class="form-control input-sm validate[required,custom[date]]">
        </div>
        
        <input type="submit" value="添加" class="btn btn-sm">
        <!-- <button class="btn btn-sm validation-clear">CLOSE PROMPTS</button> -->
    </form>
</div>
@endsection