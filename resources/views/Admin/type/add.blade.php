@extends('layout.index')

@section('title')
添加分类
@endsection

@section('content')
<div id="invalid" class="block-area">
    <h3 class="block-title">添加分类</h3>
    <form action='/admin/type/insert' method="post" class="form-validation-2" role="form">
    {{csrf_field()}}
        <!-- 添加类别 -->
        <div class="form-group">
            <label>类别名称</label>
            <input type="text" name="types_name" placeholder="请输入类别名" class="input-sm validate[required,custom[phone]] form-control">
        </div>
        <br >
        
        <!-- 分类描述 -->
        <div class="form-group">
            <label>类别描述</label>
            <input type="text" name="types_descr" placeholder="请输入描述文字" class="input-sm validate[required,custom[phone]] form-control">
        </div>
        <br >
        <!-- 父级类别 -->
        <div class="form-group">
            <label>父类名:</label>
            <select name="types_pid" class="form-control input-sm m-b-10">
                <option selected="" value="0">--顶级--</option>
            @foreach( $res as $k=>$v )    
                <option value="{{$v['types_id']}}">{{$v['types_name']}}</option>
            @endforeach   
            </select>
        </div>
        <br>
        <input type="submit" value="添加" class="btn btn-sm">
        <!-- <button class="btn btn-sm validation-clear">CLOSE PROMPTS</button> -->
    </form>
</div>
@endsection