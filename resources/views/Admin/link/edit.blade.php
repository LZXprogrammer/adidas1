@extends('layout.index')

@section('title')
友情链接
@endsection

@section('content')
<div id="invalid" class="block-area">
    <h3 class="block-title">修改友情链接</h3>
    <form action="/admin/link/update" method="post" class="form-validation-2" role="form">
        <input type="hidden" name="links_id" value="{{$res['links_id']}}" />
        {{csrf_field()}}
        <!-- links_name -->
        <div class="form-group">
            <label>链接名称</label>
            <input type="text" name="links_name" value="{{$res['links_name']}}" placeholder="请输入链接名称" class="form-control input-sm validate[required,custom[email]]">
        </div>

        <!-- links_url -->
        <div class="form-group">
            <label>链接的URL</label>
            <input type="text" name="links_url" value="{{$res['links_url']}}" placeholder="" class="input-sm form-control validate[required,custom[url]]" value="http://">
        </div>
 
        <!-- links_state -->
        <div class="form-group">
            <label>状态</label>
            <select name="links_state" value="{{$res['links_state']}}" class="form-control input-sm m-b-10">
                <option selected="" value="1">开启</option>
                <option value="2">关闭</option>
            </select>
        </div>
        
        <input type="submit" value="修改" class="btn btn-sm">
        <input type="reset" value="重置" class="btn btn-sm">
        
    </form>
</div>

@endsection