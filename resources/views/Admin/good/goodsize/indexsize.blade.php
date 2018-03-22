@extends('layout.index')

@section('title')
尺码详情列表
@endsection

@section('content')
<div class="block-area" id="tableStriped">
    <h3 class="block-title">尺码详情列表</h3>
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
                    <th>尺码</th>
                    <th>库存添加</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
             @foreach( $res as $k=>$v )
                <tr>
                    <td>{{$v['goods_size_id']}}</td>
                    <td>{{$v['goods_goodname']}}</td>
                    <td>{{$v['goods_color']}}</td>
                    <td>{{$v['goods_size']}}</td>
                    <td>
                        <a href="/admin/good/addstock/{{$v['goods_size_id']}}" >添加库存</a>
                    </td>
                   <td>
                        <a href="/admin/good/editsize/{{$v['goods_size_id']}}" >修改</a>
                        <a href="/admin/good/deletesize/{{$v['goods_size_id']}}/{{$v['goods_color_id']}}/{{$v['goods_id']}}" onclick="return confirm('确定删除吗?')" >删除</a>
                        <a href="/admin/good/indexstock?goods_id={{$v['goods_id']}}&goods_color_id={{$v['goods_color_id']}}&goods_size_id={{$v['goods_size_id']}}" >查看库存详情</a>
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