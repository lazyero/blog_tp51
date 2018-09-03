 
@include('admin.public.head')

<style>
/* 下拉框样式调整 */
    .layui-tab{overflow: visible}
</style>
<div class="layui-tab layui-tab-brief">
    <ul class="layui-tab-title">
        <li class=""><a href="{{ url('sysadmin/index') }}">管理员</a></li>
        <li class=""><a href="{{ url('sysadmin/add') }}">添加管理员</a></li>
        <li class="layui-this">编辑管理员</li>
    </ul>
    <div class="layui-tab-content">
        <div class="layui-tab-item layui-show">
            <form class="layui-form form-container" action="{{ url('sysadmin/update') }}" method="post">
                <div class="layui-form-item">
                    <label class="layui-form-label">用户名</label>
                    <div class="layui-input-block">
                        <input type="text" name="username" value="{{ $admin_user['username'] }}" required  lay-verify="required" placeholder="请输入用户名" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">密码</label>
                    <div class="layui-input-block">
                        <input type="password" name="password" value="" placeholder="（选填）如不修改则留空" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">重复密码</label>
                    <div class="layui-input-block">
                        <input type="password" name="confirm_password" value="" placeholder="（选填）如不修改则留空" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">姓名</label>
                    <div class="layui-input-block">
                        <input type="text" name="name" value="{{ $admin_user['name'] }}" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">状态</label>
                    <div class="layui-input-block">
                        <input type="radio" name="status" value="1" title="启用" {{ $admin_user['status']==1?"checked=checked":'' }}>
                        <input type="radio" name="status" value="0" title="禁用" {{ $admin_user['status']==0?"checked=checked":'' }}>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">所属权限组</label>
                    <div class="layui-input-block">
                        <select name="group_id" lay-verify="required">
                            @foreach ($auth_group_list as $v)
                                <option value="{{ $v['id'] }}" {{ $admin_user['group_id'] == $v['id']?'selected=selected':'' }}>{{ $v['title'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <input type="hidden" name="id" value="{{ $admin_user['id'] }}">
                        <button class="layui-btn" lay-submit lay-filter="*">更新</button>
                        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@include('admin.public.js')