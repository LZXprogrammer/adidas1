@extends('layout.index')

@section('title')
添加子分类
@endsection

@section('content')
<div id="invalid" class="block-area">
    <h3 class="block-title">添加子分类</h3>
    <form action='/admin/type/childinsert' method="post" class="form-validation-2" role="form">
        <input type="hidden" name="types_id" value="{{$res['types_id']}}" />
        {{csrf_field()}}

        <!-- 添加子类别 -->
        <div class="form-group">
            <label>子类别名称</label>
            <input type="text" name="types_name" placeholder="请输入子类别名称" class="input-sm validate[required,custom[phone]] form-control">
        </div>
        <br >
        
        <!-- 分类描述 -->
        <div class="form-group">
            <label>类别描述</label>
            <input type="text" name="types_descr" placeholder="请输入描述文字" class="input-sm validate[required,custom[phone]] form-control">
        </div>
        <br >

        <input type="submit" value="添加" class="btn btn-sm">
        <!-- <button class="btn btn-sm validation-clear">CLOSE PROMPTS</button> -->
    </form>
</div>
@endsection