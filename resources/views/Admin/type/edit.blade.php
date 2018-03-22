@extends('layout.index')

@section('title')
修改分类
@endsection

@section('content')
<div id="invalid" class="block-area">
    <h3 class="block-title">修改分类</h3>
    <form action='/admin/type/update' method="post" class="form-validation-2" role="form">
    <input type="hidden" name="types_id" value="{{$res['types_id']}}" />
    {{csrf_field()}}
        <!-- 修改类别 -->
        <div class="form-group">
            <label>类别名称</label>
            <input type="text" name="types_name" value="{{$res['types_name']}}" placeholder="请输入类别名" class="input-sm validate[required,custom[phone]] form-control">
        </div>
        <br >
        
        <!-- 分类描述 -->
        <div class="form-group">
            <label>类别描述</label>
            <input type="text" name="types_descr" value="{{$res['types_descr']}}" placeholder="请输入描述文字" class="input-sm validate[required,custom[phone]] form-control">
        </div>
        <br >
        
        <input type="submit" value="修改" class="btn btn-sm">
        <!-- <button class="btn btn-sm validation-clear">CLOSE PROMPTS</button> -->
    </form>
</div>
@endsection