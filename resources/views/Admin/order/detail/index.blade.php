@extends('layout.index')

@section('title')
订单详情列表
@endsection

@section('content')
<div class="block-area" id="tableStriped">
    <h3 class="block-title">订单详情列表</h3>
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
                    <th>订单号</th>
                    <th>商品名</th>
                    <th>商品图片</th>
                    <th>商品描述</th>
                    <th>商品编号</th>
                    <th>商品价格</th>
                    <th>商品数量</th>
                    <th>订单总金额</th>
                    <th>联系人</th>
                    <th>联系电话</th>
                    <th>联系地址</th>
                    <th>邮编</th>
                    <th>下单时间</th>                     
                    <th>订单状态</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
            @foreach( $res as $k=>$v )
                <tr>
                    <td>{{$v['detail_id']}}</td>
                    <td>{{$v['orders_number']}}</td>
                    <td>{{$v['cart_goodname']}}</td>
                    <td>
                        <img src="@if( $v['cart_goodpic'] ) 
                                /upload/goods_bigpic/{{$v['cart_goodpic'] }}
                            @else 
                                /upload/goods_bigpic/image/admin.jpg
                            @endif"  width="50px" height="50px" />
                    </td>
                    <td>{{$v['cart_gooddescr']}}</td>
                    <td>{{$v['goods_code']}}</td>
                    <td>{{$v['cart_goodprice']}}</td>
                    <td>{{$v['cart_goodnum']}}</td>
                    <td>{{$v['orders_total']}}</td>
                    <td>{{$v['link_man']}}</td>
                    <td>{{$v['link_phone']}}</td>
                    <td>{{$v['address_province']}}{{$v['address_city']}}{{$v['address_country']}}{{$v['link_address']}}</td>
                    <td>{{$v['orders_code']}}</td>
                    <td>{{$v['orders_addtime']}}</td>             
                    <td>
                        @if($v['orders_state']==0) 待付款
                        @elseif($v['orders_state']==1) 待发货 
                        @elseif($v['orders_state']==2) 已发货 
                        @elseif($v['orders_state']==3) 待收货 
                        @elseif($v['orders_state']==4) 交易成功 
                        @elseif($v['orders_state']==5) 待评价 
                        @elseif($v['orders_state']==6) 已评价 
                        @elseif($v['orders_state']==7) 失效订单 
                        @endif
                    </td>
                    <td>
                    	<a href="/admin/order/delete/{{$v['orders_id']}}" class="btn" onclick="return confirm('确定删除吗?')" >删除
                        </a>
                        <!-- <a href="/admin/order/update/{{$v['orders_id']}}" class="btn" >发货</a> -->
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