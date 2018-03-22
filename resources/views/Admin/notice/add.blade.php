@extends('layout.index')

@section('title')
添加公告
@endsection

@section('content')
<div id="text-input" class="block-area">
    <h3 class="block-title">添加公告</h3>
    <form method="post" action="/admin/notice/insert" role="form" class="row form-columned">
        {{ csrf_field() }}      
        <div class="form-group">
            <label>标题</label>
            <input type="text" name="notice_title" placeholder="" class="form-control input-sm validate[required,custom[email]]">
        </div>
        <div class="form-group">
            <label>公告内容</label>
            <textarea class="form-control input-sm validate[required,custom[email]]" name="notice_content"></textarea>
        </div>
        <label>公告状态</label>
        <select name="notice_type" class="form-control input-sm m-b-10">s
            <option value="1">重要公告</option>
            <option selected="" value="2">一般公告</option>
        </select>
        <div class="col-md-10">
            <button class="btn btn-sm" type="submit">提交信息</button>
            <button class="btn btn-sm" type="reset">重新输入</button>
        </div>
    </form>
</div>
@endsection
