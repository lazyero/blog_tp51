
<?php echo $__env->make('admin.public.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="layui-tab layui-tab-brief">
    <ul class="layui-tab-title">
        <li class="layui-this">管理员</li>
        <li class=""><a href="<?php echo e(url('sysadmin/add')); ?>">添加管理员</a></li>
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
                <?php $__currentLoopData = $admin_user_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($v['id']); ?></td>
                    <td><?php echo e($v['username']); ?></td>
                    <td><?php echo e($v['name']); ?></td>
                    <td><?php echo e($group_info[$v['group_id']]); ?></td>
                    <td><?php echo e($v['status']==1?'启用':'禁用'); ?></td>
                    <td><?php echo e($v['add_time']); ?></td>
                    <td><?php echo e($v['last_login_time']); ?></td>
                    <td><?php echo e($v['last_login_ip']); ?></td>
                    <td>
                        <a href="<?php echo e(url('sysadmin/edit?id='.$v['id'])); ?>" class="layui-btn layui-btn-normal layui-btn-xs">编辑</a>
                        <a href="<?php echo e(url('sysadmin/delete?id='.$v['id'])); ?>" class="layui-btn layui-btn-danger layui-btn-xs ajax-delete">删除</a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php echo $__env->make('admin.public.js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>