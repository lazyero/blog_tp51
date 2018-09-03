
@include('admin.public.head')

<div class="layui-tab layui-tab-brief">
    <ul class="layui-tab-title">
        <li class="layui-this">管理员</li>
        <li class=""><a href="{{ url('sysadmin/add') }}">添加管理员</a></li>
    </ul>
    <div class="layui-tab-content">
        <div class="layui-tab-item layui-show">
            <table class="layui-table">
                <thead>
                <tr>
                    <th style="width: 30px;">编号</th>
                    <th>用户名</th>
                    <th>姓名</th>
                    <th>组别</th>
                    <th>状态</th>
                    <th>创建时间</th>
                    <th>最后登录时间</th>
                    <th>最后登录IP</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($admin_user_list as $v)
                <tr>
                    <td>{{ $v['id'] }}</td>
                    <td>{{ $v['username'] }}</td>
                    <td>{{ $v['name'] }}</td>
                    <td>{{ $group_info[$v['group_id']] }}</td>
                    <td>{{ $v['status']==1?'启用':'禁用' }}</td>
                    <td>{{ $v['add_time'] }}</td>
                    <td>{{ $v['last_login_time'] }}</td>
                    <td>{{ $v['last_login_ip'] }}</td>
                    <td>
                        <a href="{{ url('sysadmin/edit?id='.$v['id']) }}" class="layui-btn layui-btn-normal layui-btn-xs">编辑</a>
                        <a href="{{ url('sysadmin/delete?id='.$v['id']) }}" class="layui-btn layui-btn-danger layui-btn-xs ajax-delete">删除</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('admin.public.js')