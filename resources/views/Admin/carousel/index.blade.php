@extends('layout.index')

@section('title')
轮播列表
@endsection

@section('content')

<div class="block-area" id="tableStriped">
    <h3 class="block-title">轮播列表</h3>
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
                    <th>轮播标题</th>
                    <th>轮播图片</th>
                    <th>轮播描述</th>
                    <th>链接地址</th>
                    <th>添加时间</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
             @foreach($res as $k=>$v)
                <tr>
                    <td>{{$v['carousel_id']}}</td>
                    <td>{{$v['carousel_title']}}</td>
                    <td>
                        <img src="@if( $v['carousel_pic'] ) 
                                /upload/carousel/{{$v['carousel_pic'] }}
                            @else 
                                /upload/carousel/image/admin.jpg
                            @endif"  width="50px" height="50px" />                       
                    </td>
                    <td>{{$v['carousel_descr']}}</td>
                    <td>{{$v['carousel_link']}}</td>
                    <td>{{$v['carousel_addtime']}}</td>                    
                    <td>
                    	<a href="/admin/carousel/edit/{{$v['carousel_id']}}" class="btn" >修改</a>
                    	<a href="/admin/carousel/delete/{{$v['carousel_id']}}" class="btn" onclick="return confirm('确定删除吗?')" >删除</a>
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