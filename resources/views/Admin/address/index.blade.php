@extends('layout.index')

@section('title')
地址列表
@endsection

@section('content')
<div class="block-area" id="tableStriped">
    <h3 class="block-title">地址列表</h3>
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
                    <th>用户账号</th>                                      
                    <th>联系人</th>
                    <th>联系电话</th>
                    <th>邮编</th>
                    <th>省</th>
                    <th>市</th>
                    <th>县/区</th>
                    <th>联系地址</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
             @foreach($res as $k=>$v)
                <tr>
                    <td>{{$v['address_id']}}</td>
                    <td>{{$v['users_username']}}</td>
                    <td>{{$v['link_man']}}</td>
                    <td>{{$v['link_phone']}}</td>
                    <td>{{$v['address_code']}}</td>                    
                    <td>{{$v['address_province']}}</td>  
                    <td>{{$v['address_city']}}</td>  
                    <td>{{$v['address_country']}}</td>  
                    <td>{{$v['link_address']}}</td>               
                    <td>
                    	<a href="/admin/address/delete/{{$v['address_id']}}" onclick="return confirm('确定删除吗?')" >删除</a>
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