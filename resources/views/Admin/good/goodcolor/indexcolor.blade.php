@extends('layout.index')

@section('title')
颜色详情列表
@endsection

@section('content')
<div class="block-area" id="tableStriped">
    <h3 class="block-title">颜色详情列表</h3>
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
            <input class="form-control input-sm" type="text" name="search" value="{{$request['search'] or ''}}" placeholder="请输入商品名">
            </div>
            <input class="form-control input-sm" id="sub" type="submit" value="搜索">               
        </form>
        <table class="tile table table-bordered table-striped">
            <thead>
                <tr>            
                    <th>NO.</th>
                    <th>商品名</th>
                    <th>颜色</th>
                    <th>图片</th>
                    <th>尺码添加</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
             @foreach( $res as $k=>$v )
                <tr>
                    <td>{{$v['goods_color_id']}}</td>
                    <td>{{$v['goods_goodname']}}</td>
                    <td>{{$v['goods_color']}}</td>
                    <td><img src="@if( $v['goods_littlepic'] ) 
                                /upload/goods_littlepic/{{$v['goods_littlepic'] }}
                            @else 
                                /upload/goods_littlepic/image/admin.jpg
                            @endif"  width="50px" height="50px" />
                    </td>
                    <td>
                        <a href="/admin/good/addsize/{{$v['goods_color_id']}}" class="btn" >添加尺码</a>
                    </td>
                   <td>
                        <a href="/admin/good/editcolor/{{$v['goods_color_id']}}" class="btn" >修改</a>
                        <a href="/admin/good/deletecolor/{{$v['goods_color_id']}}/{{$v['goods_id']}}" onclick="return confirm('确定删除吗?')" class="btn" >删除</a>
                        <a href="/admin/good/indexsize?goods_id={{$v['goods_id']}}&goods_color_id={{$v['goods_color_id']}}" class="btn" >查看尺码详情</a>
                        <a href="/admin/good/addlittlepic/{{$v['goods_color_id']}}/{{$v['goods_id']}}" class="btn">添加小图</a>
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