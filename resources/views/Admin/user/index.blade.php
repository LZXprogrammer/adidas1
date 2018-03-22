@extends('layout.index')

@section('title')
用户列表
@endsection

@section('content')

<div class="block-area" id="tableStriped">
    <h3 class="block-title">用户列表</h3>
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
                    <th>用户名</th>
                    <th>真实姓名</th>
                    <th>密码</th>
                    <th>性别</th>
                    <th>手机号码</th>
                    <th>地址</th>
                    <th>email</th>
                    <th>收藏商品ID</th>
                    <th>用户积分</th>
                    <th>状态</th>
                    <th>注册时间</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
             @foreach($res as $k=>$v)
                <tr>
                    <td>{{$v['users_id']}}</td>
                    <td>{{$v['users_username']}}</td>
                    <td>{{$v['users_realname']}}</td>
                    <td>{{$v['users_pass']}}</td>
                    <td>
                        @if($v['users_sex']==1) 男 @else 女 @endif
                    </td>
                    <td>{{$v['users_phone']}}</td>
                    <td>{{$v['users_address']}}</td>
                    <td>{{$v['users_email']}}</td>
                    <td>{{$v['users_collect_id']}}</td>
                    <td>{{$v['users_integral']}}</td>
                    <td>
                        @if($v['users_state']==1) 启用 @else 禁用 @endif
                    </td>
                    <td>{{$v['users_addtime']}}</td>
                    <td>
                    	<a href="/admin/user/edit/{{$v['users_id']}}" class="btn" >修改</a>
                    	<a href="/admin/user/delete/{{$v['users_id']}}" class="btn" onclick="return confirm('确定删除吗?')" >删除</a>
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