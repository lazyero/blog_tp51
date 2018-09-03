
@include('admin.public.head')

<style>
/* 下拉框样式调整 */
    .layui-tab{overflow: visible}
</style>
<div class="layui-tab layui-tab-brief">
    <ul class="layui-tab-title">
        <li class=""><a href="<?php echo url('sysadmin/index') ?>">管理员</a></li>
        <li class="layui-this">添加管理员</li>
    </ul>
    <div class="layui-tab-content">
        <div class="layui-tab-item layui-show">
            <form class="layui-form form-container" action="<?php echo url('sysadmin/save') ?>" method="post">
                <div class="layui-form-item">
                    <label class="layui-form-label">用户名</label>
                    <div class="layui-input-block">
                        <input type="text" name="username" value="" required lay-verify="required" placeholder="请输入用户名(仅支持输入数字或字母)" onkeyup="this.value=this.value.replace(/[\W]/g,'')" onafterpaste="this.value=this.value.replace(/[\W]/g,'')" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">密码</label>
                    <div class="layui-input-block">
                        <input type="password" name="password" value="" required lay-verify="pass" placeholder="请输入密码" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">重复密码</label>
                    <div class="layui-input-block">
                        <input type="password" name="confirm_password" value="" required lay-verify="pass" placeholder="请再次输入密码" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">姓名</label>
                    <div class="layui-input-block">
                        <input type="text" name="name" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">状态</label>
                    <div class="layui-input-block">
                        <input type="radio" name="status" value="1" title="启用" checked="checked">
                        <input type="radio" name="status" value="0" title="禁用">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">所属权限组</label>
                    <div class="layui-input-block">
                        <select name="group_id" lay-verify="required">
                            @foreach ($auth_group_list as $v)
                                <option value="{{ $v['id'] }}"><?php echo $v['title'] ?></option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn" lay-submit lay-filter="*">保存</button>
                        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@include('admin.public.js')
