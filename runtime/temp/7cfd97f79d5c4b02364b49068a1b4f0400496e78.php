
<?php echo $__env->make('admin.public.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="layui-tab layui-tab-brief">
    <ul class="layui-tab-title">
        <li class=""><a href="<?php echo e(url('sysadmin/group_index')); ?>">角色</a></li>
        <li class="layui-this">添加角色</li>
    </ul>
    <div class="layui-tab-content">
        <div class="layui-tab-item layui-show">
            <form class="layui-form form-container" action="<?php echo e(url('group_save')); ?>" method="post">
                <div class="layui-form-item">
                    <label class="layui-form-label">名称</label>
                    <div class="layui-input-block">
                        <input type="text" name="title" value="" required  lay-verify="required" placeholder="请输入角色名称" class="layui-input">
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
                    <div class="layui-input-block">
                        <button class="layui-btn" lay-submit lay-filter="*">保存</button>
                        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php echo $__env->make('admin.public.js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>