
@include('admin.public.head')

<div class="layui-tab layui-tab-brief">
    <ul class="layui-tab-title">
        <li class="layui-this">角色</li>
    </ul>
    <div class="layui-tab-content">
        <div class="layui-tab-item layui-show">
            <table class="layui-table">
                <thead>
                <tr>
                    <th style="width: 30px;">ID</th>
                    <th>名称</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($auth_group_list as $v)
                <tr>
                    <td>{{ $v['id'] }}</td>
                    <td>{{ $v['title'] }}</td>
                    <td>{{ $v['status']==1?'启用':'禁用' }}</td>
                    <td>
                        <a href="{{ url('sysadmin/auth?id='.$v['id']) }}" class="layui-btn layui-btn-xs">授权</a>
                        <a href="{{ url('sysadmin/group_edit?id='.$v['id']) }}" class="layui-btn layui-btn-normal layui-btn-xs">编辑</a>
                        @if ($v['id'] > 1)               
                        <a href="{{ url('sysadmin/group_delete?id='.$v['id']) }}" class="layui-btn layui-btn-danger layui-btn-xs ajax-delete">删除</a>
                        @endif
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('admin.public.js')