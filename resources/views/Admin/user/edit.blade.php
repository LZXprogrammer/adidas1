@extends('layout.index')

@section('title')
用户修改
@endsection

@section('content')
<div id="invalid" class="block-area">
    <h3 class="block-title">用户修改</h3>
    <form action='/admin/user/update' method="post" class="form-validation-2" role="form">
    <input type="hidden" name="users_id" value="{{$res['users_id']}}" />
    {{csrf_field()}}
        <!-- Telephone -->
        <div class="form-group">
            <label></label>
            <input type="text" name="users_username" placeholder="请输入用户名"class="input-sm validate[required,custom[phone]] form-control" value="{{$res['users_username']}}" >
        </div>
        
        <!-- URL -->
        <div class="form-group">
            <label></label>
            <input type="text" name="users_realname" placeholder="请输入你的真实姓名" class="input-sm form-control validate[required,custom[url]]" value="{{$res['users_realname']}}">
        </div>
        
        <!-- Email -->
        <div class="form-group">
            <label></label>
            <input type="password" name="users_pass" placeholder="请输入你的密码" class="form-control input-sm validate[required,custom[email]]" value="{{$res['users_pass']}}">
        </div>
        <br>
        <!-- 性别 -->
        <div id="button" class="form-group">
            <label>性别：</label>
            <div data-toggle="buttons" class="btn-group">
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" id="option1" value='1' name="users_sex" @if( $res['users_sex'] == 1 ) checked @endif> 男
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" id="option2" value='2' name="users_sex" @if( $res['users_sex'] == 1 ) checked @endif> 女
                </label>                
            </div>
        </div>
        <!-- Phone -->
        <div class="form-group">
            <label></label>
            <input type="text" name="users_phone" placeholder="请输入你的电话" class="form-control input-sm validate[required,custom[date]]" value="{{$res['users_phone']}}">
        </div>
        
        <!-- Number -->
        <div class="form-group">
            <label></label>
            <input type="text" name="users_address" placeholder="请输入你的地址" class="form-control input-sm validate[required,custom[number]]" value="{{$res['users_address']}}">
        </div>
        
        <div class="form-group">
            <label></label>
            <input type="text" name="users_email" placeholder="请输入你的email" class="form-control input-sm validate[required,custom[number]]" value="{{$res['users_email']}}">
        </div>

        <!-- Integer -->
        <div class="form-group">
            <label></label>
            <input type="text" name="users_code" placeholder="请输入你的邮编" class="form-control input-sm validate[required,custom[integer]]" value="{{$res['users_code']}}">
        </div>
        
        <!-- Only Letter/Number -->
        <div class="form-group">
            <label>状态</label>
            <select name="users_state" class="form-control input-sm m-b-10">
                <option value="1" @if($res['users_state']==1 ) selected @endif >启用</option>
                <option value="2" @if($res['users_state']==2 ) selected @endif >禁用</option>
            </select>
        </div>
        
        <!-- 这里以后是从商品表里查出来的 -->
        <div class="form-group">
            <label>收藏的商品名</label>
            <select name="users_collect_id" class="form-control input-sm m-b-10">
                <option value="1" @if($res['users_state']==1) selected @endif >1</option>
                <option value="2" @if($res['users_state']==2) selected @endif >2</option>
            </select>
        </div>
        
        <!-- Only Letter -->
        <div class="form-group m-b-15">
            <label>用户积分</label>
            <input type="text" name="users_integral" placeholder="..." class="form-control input-sm validate[required,custom[onlyLetterSp]]" value="{{$res['users_integral']}}">
        </div>
       
        <input type="submit" value="修改" class="btn btn-sm">
        <!-- <button class="btn btn-sm validation-clear">CLOSE PROMPTS</button> -->
    </form>
</div>
@endsection