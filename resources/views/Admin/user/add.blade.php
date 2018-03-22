@extends('layout.index')

@section('title')
用户添加
@endsection

@section('content')
<div id="invalid" class="block-area">
    <h3 class="block-title">用户添加</h3>
    <form action='/admin/user/insert' method="post" class="form-validation-2" role="form">
    {{csrf_field()}}
        <!-- Telephone -->
        <div class="form-group">
            <label></label>
            <input type="text" name="users_username" placeholder="请输入用户名" class="input-sm validate[required,custom[phone]] form-control">
        </div>
        
        <!-- URL -->
        <div class="form-group">
            <label></label>
            <input type="text" name="users_realname" placeholder="请输入你的真实姓名" class="input-sm form-control validate[required,custom[url]]" value="">
        </div>
        
        <!-- Email -->
        <div class="form-group">
            <label></label>
            <input type="password" name="users_pass" placeholder="请输入你的密码" class="form-control input-sm validate[required,custom[email]]">
        </div>
        <br>
        <!-- 性别 -->
        <div id="button" class="form-group">
            <label>性别：</label>
            <div data-toggle="buttons" class="btn-group">
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" id="option1" value='1' name="users_sex"> 男
                </label>
                <label class="btn btn-gr-gray btn-sm">
                    <input type="radio" id="option2" value='2' name="users_sex"> 女
                </label>                
            </div>
        </div>
        <!-- Date -->
        <div class="form-group">
            <label></label>
            <input type="text" name="users_phone" placeholder="请输入你的电话" class="form-control input-sm validate[required,custom[date]]">
        </div>
        
        <!-- Number -->
        <div class="form-group">
            <label></label>
            <input type="text" name="users_address" placeholder="请输入你的地址" class="form-control input-sm validate[required,custom[number]]">
        </div>
        
        <div class="form-group">
            <label></label>
            <input type="email" name="users_email" placeholder="请输入你的email" class="form-control input-sm validate[required,custom[number]]">
        </div>

        <!-- Integer -->
        <div class="form-group">
            <label></label>
            <input type="text" name="users_code" placeholder="请输入你的邮编" class="form-control input-sm validate[required,custom[integer]]">
        </div>
        
        <!-- Only Letter/Number -->
        <div class="form-group">
            <label>状态</label>
            <select name="users_state" class="form-control input-sm m-b-10">
                <option selected="" value="1">启用</option>
                <option value="2">禁用</option>
            </select>
        </div>
        
        <!-- 这里以后是从商品表里查出来的 -->
        <div class="form-group">
            <label>收藏的商品名</label>
            <select name="users_collect_id" class="form-control input-sm m-b-10">
                <option selected="" value="1">1</option>
                <option value="2">2</option>
            </select>
        </div>
        
        <!-- Only Letter -->
        <div class="form-group m-b-15">
            <label>用户积分</label>
            <input type="number" name="users_integral" placeholder="..." class="form-control input-sm validate[required,custom[onlyLetterSp]]">
        </div>
       
        <input type="submit" value="添加" class="btn btn-sm">
        <!-- <button class="btn btn-sm validation-clear">CLOSE PROMPTS</button> -->
    </form>
</div>
@endsection