@extends('layout.index')

@section('title')
商品列表
@endsection

@section('content')
<div class="block-area" id="tableStriped">
    <h3 class="block-title">商品列表</h3>
    <a href="/admin/good/add" class="block-title" >添加商品</a>
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
                    <th>No.</th>
                    <th>商品图片</th>
                    <th>类别名</th>
                    <th>商品名</th>
                    <th>商品描述</th>
                    <th>商品原价</th>
                    <th>商品现价</th>
                    <th>商品状态</th>
                    <th>商品编码号</th>
                    <th>商品添加时间</th>
                    <th>颜色</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
            @foreach( $res as $k=>$v )
                <tr>
                    <td>{{$v['goods_id']}}</td>
                    <td>
                        <img src="@if( $v['goods_bigpic'] )
                                /upload/goods_bigpic/{{$v['goods_bigpic'] }}
                            @else
                                /upload/goods_bigpic/image/admin.jpg
                            @endif"  width="50px" height="50px" />
                    </td>
                    <td>{{$v['types_name']}}</td>
                    <td>{{$v['goods_goodname']}}</td>
                    <td>{{$v['goods_descr']}}</td>
                    <td>{{$v['goods_price']}}</td>
                    <td>{{$v['goods_now_price']}}</td>
                    <td>
                        @if($v['goods_state']==1)
                        新上架
                        @elseif($v['goods_state']==2)
                        在售
                        @elseif($v['goods_state']==3)
                        下架
                        @endif
                    </td>
                    <td>{{$v['goods_code']}}</td>
                    <td>{{$v['goods_addtime']}}</td>
                    <td>
                        <a href="/admin/good/addcolor/{{$v['goods_id']}}" >添加颜色</a>
                    </td>
                    <td>
                    	<a href="/admin/good/edit/{{$v['goods_id']}}" >修改</a>
                    	<a href="/admin/good/delete/{{$v['goods_id']}}" onclick="return confirm('确定删除吗?')" >删除</a>
                        <a href="/admin/good/indexcolor?goods_id={{$v['goods_id']}}" >查看颜色详情</a>
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
