@extends('layout.index')

@section('title')
管理员修改
@endsection

@section('content')
<div id="invalid" class="block-area">
    <h3 class="block-title">管理员修改</h3>
    <form action='/admin/manager/update' method="post" enctype="multipart/form-data" class="form-validation-2" role="form">
        <input type="hidden" name="managers_id" value="{{$res['managers_id']}}" />
        {{csrf_field()}}
        <!-- username -->
        <div class="form-group">
            <label></label>
            <input type="text" name="managers_username" placeholder="请输入用户名" value="{{$res['managers_username']}}" class="input-sm validate[required,custom[phone]] form-control">
        </div>
        
        <!-- realname -->
        <div class="form-group">
            <label></label>
            <input type="text" name="managers_realname" placeholder="请输入你的真实姓名" value="{{$res['managers_realname']}}" class="input-sm form-control validate[required,custom[url]]" value="">
        </div>
        
        <!-- password -->
        <div class="form-group">
            <label></label>
            <input type="password" name="managers_pass" placeholder="请输入你的密码" value="{{$res['managers_pass']}}" class="form-control input-sm validate[required,custom[email]]">
        </div>
        <br>
        <!-- sex -->
        <div id="button" class="form-group">
            <label>性别：</label>
            <div data-toggle="buttons" class="btn-group">
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" id="option1" value='1' name="managers_sex" @if( $res['managers_sex'] == 1 ) checked @endif > 男
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" id="option2" value='2' name="managers_sex" @if( $res['managers_sex'] == 2 ) checked @endif > 女
                </label>                
            </div>
        </div>
        <!-- phone -->
        <div class="form-group">
            <label></label>
            <input type="text" name="managers_phone" placeholder="请输入你的电话" value="{{$res['managers_phone']}}" class="form-control input-sm validate[required,custom[date]]">
        </div>
        
        <!-- file -->
        <div data-provides="fileupload" class="fileupload fileupload-new">
            <div class="fileupload-preview thumbnail form-control">
                <img src="@if( $res['managers_pic'] ) 
                                /upload/manager/{{$res['managers_pic'] }}
                            @else 
                                /upload/manager/image/admin.jpg
                            @endif" />
            </div>   
            <div>
                <span class="btn btn-file btn-alt btn-sm">
                    <span class="fileupload-new">选择头像</span>
                    <span class="fileupload-exists">Change</span>
                    <input type="file" name="managers_pic" />
                </span>
                <a data-dismiss="fileupload" class="btn fileupload-exists btn-sm" href="#">移出头像</a>
            </div>
        </div>

        <!-- power -->
        <div class="form-group">
            <label>状态</label>
            <select name="managers_power" redaonly class="form-control input-sm m-b-10">
                <option value="1" @if($res['managers_power']==1) selected  @endif>超级管理员</option>
                <option value="2" @if($res['managers_power']==2) selected  @endif>普通管理员</option>
            </select>
        </div>
        <input type="submit" value="修改" class="btn btn-sm">
        <!-- <button class="btn btn-sm validation-clear">CLOSE PROMPTS</button> -->
    </form>
</div>
@endsection