@extends('layout.index')

@section('title')
分类列表
@endsection

@section('content')

<div class="block-area" id="tableStriped">
    <h3 class="block-title">分类列表</h3>
    <a href="/admin/type/add" class="block-title" >添加分类</a>
    <div class="table-responsive overflow">
        <table class="tile table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>类别名称</th>
                    <th>父类别名称</th>
                    <th>类别描述</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
             @foreach($res as $k=>$v)
                <tr>
                    <td>{{$v['types_id']}}</td>
                    <td>
                        <!-- <img width="9" height="9" border="0" style="margin-left:0em" id="icon_0_1" src="/a/img/jh.gif"> -->
                        {{$v['types_name']}}
                    </td>
                    <td>{{$v['types_pname']}}</td>
                    <td>{{$v['types_descr']}}</td>                    
                    <td>
                        <a href="/admin/type/edit/{{$v['types_id']}}" class="btn" >修改</a>
                    	<a href="/admin/type/delete/{{$v['types_id']}}" class="btn" >删除</a>
                        <a href="/admin/type/addchild/{{$v['types_id']}}" class="btn" >添加子分类</a>
                    </td>
                    
                </tr>
             @endforeach   
            
            </tbody>
        </table>
        
    </div>
</div>
@endsection