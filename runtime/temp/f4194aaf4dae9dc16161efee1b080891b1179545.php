
<?php echo $__env->make('admin.public.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

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
                <?php $__currentLoopData = $auth_group_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($v['id']); ?></td>
                    <td><?php echo e($v['title']); ?></td>
                    <td><?php echo e($v['status']==1?'启用':'禁用'); ?></td>
                    <td>
                        <a href="<?php echo e(url('sysadmin/auth?id='.$v['id'])); ?>" class="layui-btn layui-btn-xs">授权</a>
                        <a href="<?php echo e(url('sysadmin/group_edit?id='.$v['id'])); ?>" class="layui-btn layui-btn-normal layui-btn-xs">编辑</a>
                        <?php if($v['id'] > 1): ?>               
                        <a href="<?php echo e(url('sysadmin/group_delete?id='.$v['id'])); ?>" class="layui-btn layui-btn-danger layui-btn-xs ajax-delete">删除</a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php echo $__env->make('admin.public.js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>