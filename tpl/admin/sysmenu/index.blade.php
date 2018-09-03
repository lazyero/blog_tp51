
@include('admin.public.head')
<!--tab标签-->
<div class="layui-tab layui-tab-brief">
    <ul class="layui-tab-title">
        <li class="layui-this">后台菜单</li>
        <li class=""><a href="{{ url('sysmenu/add') }}">添加菜单</a></li>
    </ul>
    <div class="layui-tab-content">
        <div class="layui-tab-item layui-show">
            <table class="layui-table">
                <thead>
                    <tr>
                        <th style="width: 60px;">展开</th>
                        <th style="width: 50px;">排序</th>
                        <th style="width: 30px;">ID</th>
                        <th>菜单名称</th>
                        <th>控制器方法</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($admin_menu_level_list as $v)
                    <tr @if($v['level'] == 1)class="level_one @elseif($v['level'] == 2)class="level_two @else class="level_three @endif level_{{ $v['pid'] }}"  data-id="{{ $v['id'] }}" data-pid="{{ $v['pid'] }}" style="">
                        <td @if($v['son'])class="open_level"@endif> {{ str_repeat('&nbsp;',($v['level']-1)*2) }}<i class="layui-icon" data-id="{{ $v['id'] }}" style="font-size: 25px;@if(!$v['son'])color: #ccc;@endif">&#xe623;</i></td>
                        <td>
                            <input class="layui-input" name="sort" required="" lay-verify="required" placeholder="" autocomplete="off" type="text" id="change_sort_{{ $v['id'] }}" value="{{ $v['sort'] }}" data-url="{{ url('sysmenu/setStatus?id='.$v['id']) }}" onchange="change_sort({{ $v['id'] }})">
                        </td>
                        <td>{{ $v['id'] }}</td>
                        <td>@if($v['level'] > 1){{ str_repeat('&nbsp;&nbsp;&nbsp;└─',$v['level']-1) }}@endif{{ $v['title'] }}</td>
                        <td>{{ $v['name'] }}</td>
                        <td>
                        	@if($v['status']==1)
                        	<a href="{{ url('sysmenu/setStatus?id='.$v['id']) }}" data-param="status=0" class="layui-btn layui-btn-xs ajax-post">显示</a>
                        	@else
                        	<a href="{{ url('sysmenu/setStatus?id='.$v['id']) }}" data-param="status=1" class="layui-btn layui-btn-danger layui-btn-xs ajax-post">隐藏</a>
                        	@endif
                        </td>
                        <td>
                            <a href="{{ url('sysmenu/add?pid='.$v['id']) }}" class="layui-btn layui-btn-xs">添加子菜单</a>
                            <a href="{{ url('sysmenu/edit?id='.$v['id']) }}" class="layui-btn layui-btn-normal layui-btn-xs">编辑</a>
                            <a href="{{ url('sysmenu/delete?id='.$v['id']) }}" class="layui-btn layui-btn-danger layui-btn-xs ajax-delete">删除</a>
                        </td>
                    </tr>
               	    @endforeach
                </tbody> 
            </table>
        </div>
    </div>
</div>

@include('admin.public.js')
<script src="_js/menu.js"></script>
<script>
//修改排序值
function change_sort(id){
    var sort = $("#change_sort_"+id).val();
    var _url = $("#change_sort_"+id).attr("data-url");
    $.ajax({
        type:'POST',
        url:_url,
        dataType: "json",
        data:{"sort":sort},
        success:function(info){
            if (info.code === 1) {
                setTimeout(function () {
                    location.href = info.url;
                }, 1000);
            }
            layer.msg(info.msg);
        }
    })
}
</script>
