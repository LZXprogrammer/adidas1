@extends('layout.index')

@section('title')
管理员列表
@endsection

@section('content')
<div class="block-area" id="tableStriped">
    <h3 class="block-title">管理员列表</h3>
    <h3 class="block-title"><a href="/admin/managers/add">添加管理员</a></h3>
    <div class="table-responsive overflow">

        <form class="form-inline" method="get" action="" role="form">
            显示页数：
            <select name="count" id="count" class="form-control input-sm m-b-10" style='width:100px;position:relative;top:5px;'>
                <option value="" selected >请选择</option>
                <option value="5" @if(!empty($request['count']) && $request['count'] == 5) selected @endif >5</option>
                <option value="8" @if(!empty($request['count']) && $request['count'] == 8) selected @endif >8</option>
                <option value="10" @if(!empty($request['count']) && $request['count'] == 10) selected @endif >10</option>
                <option value="15" @if(!empty($request['count']) && $request['count'] == 15) selected @endif >15</option>
            </select>
            <div class="form-group">
            <input class="form-control input-sm" type="text" name="search" value="{{$request['search'] or ''}}" placeholder="请输入用户名">
            </div>
            <input class="form-control input-sm" id="sub" type="submit" value="搜索">               
        </form>
        <table class="tile table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>头像</th>
                    <th>用户名</th>
                    <th>真实姓名</th>
                    <th>密码</th>
                    <th>性别</th>
                    <th>手机号码</th>                     
                    <th>权限</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
            @foreach( $res as $k=>$v )
                <tr>
                    <td>{{$v['managers_id']}}</td>
                    <td>
                        <img src="@if( $v['managers_pic'] ) 
                                /upload/manager/{{$v['managers_pic'] }}
                            @else 
                                /upload/manager/image/admin.jpg
                            @endif"  width="50px" height="50px" />
                    </td>
                    <td>{{$v['managers_username']}}</td>
                    <td>{{$v['managers_realname']}}</td>
                    <td>{{$v['managers_pass']}}</td>
                    <td>
                        @if($v['managers_sex']==1) 男 @else 女 @endif
                    </td>
                    <td>{{$v['managers_phone']}}</td>                   
                    <td>
                       @if($v['managers_power']==1) 超级管理员 @else 普通管理员 @endif
                    </td>
                    <td>
                    	<a href="/admin/manager/edit/{{$v['managers_id']}}" class="btn" >修改</a>
                    	<a href="/admin/manager/delete/{{$v['managers_id']}}" class="btn" onclick="return confirm('确定删除吗?')" >删除</a>
                    </td>
                    
                </tr>
             @endforeach   
            
            </tbody>
        </table>
        <center>
            
        {!! $res ->appends($request) ->render() !!}
        </center>
    </div>
</div>

@endsection