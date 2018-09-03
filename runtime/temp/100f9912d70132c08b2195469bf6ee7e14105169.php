<?php echo $__env->make('admin.public.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="layui-tab layui-tab-brief">
    <ul class="layui-tab-title">
        <li class="layui-this">信息列表</li>
        <li class=""><a href="<?php echo e(url('add')); ?>">添加信息</a></li>
    </ul>
    <div class="layui-tab-content">
        <form class="layui-form layui-form-pane" action="" method="get">
            <div class="layui-inline">
                <label class="layui-form-label">栏目分类</label>
                <div class="layui-input-inline">
                    <select name="type">
                        <option value="">全部</option>
                        
                    </select>
                </div>
            </div>
            <div class="layui-inline">
                <label class="layui-form-label">关键词</label>
                <div class="layui-input-inline">
                    <input type="text" name="title" value="<?php echo e(input('title')); ?>" placeholder="请输入关键词" class="layui-input">
                </div>
            </div>
            <div class="layui-inline">
                <button class="layui-btn">搜索</button>
            </div>
        </form>
        <hr>

        <form action="" method="post" class="ajax-form">
            选中项：
            <button type="button" class="layui-btn  layui-btn-small ajax-action" data-action="<?php echo e(url('restore')); ?>">全部恢复</button>
            <button type="button" class="layui-btn layui-btn-danger layui-btn-small ajax-action" data-action="<?php echo e(url('delete')); ?>">永久删除</button>
            <div class="layui-tab-item layui-show">
                <table class="layui-table">
                    <thead>
                    <tr>
                        <th style="width: 15px;"><input type="checkbox" class="check-all"></th>
                        <th style="width: 30px;">ID</th>
                        <th style="width: 30px;">排序</th>
                        <th>标题</th>
                        <th>所属分类</th>
                        <th>当前状态</th>
                        <th>推荐</th>
                        <th>发布时间</th>
                        <th>删除时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><input type="checkbox" name="ids[]" value="<?php echo e($v['id']); ?>"></td>
                            <td><?php echo e($v['id']); ?></td>
                            <td>
                                <?php echo e($v['sort']); ?>

                                
                            </td>
                            <td><?php echo e($v['title']); ?></td>
                            <td>
                                <?php $__currentLoopData = $navs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nav): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($nav['id'] == $v['type']): ?>
                                        <?php echo e($nav['name']); ?>

                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                            </td>
                            <td>
                                <?php if($v['is_show']==1): ?>
                                    <a href="<?php echo e(url('flag?id='.$v['id'])); ?>" data-param="is_show=0" class="layui-btn layui-btn-xs ajax-post">显示</a>
                                <?php else: ?>
                                    <a href="<?php echo e(url('flag?id='.$v['id'])); ?>" data-param="is_show=1" class="layui-btn layui-btn-danger layui-btn-xs ajax-post">隐藏</a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($v['is_index']==1): ?>
                                    <a href="<?php echo e(url('flag?id='.$v['id'])); ?>" data-param="is_index=0" class="layui-btn layui-btn-normal layui-btn-xs ajax-post"><i class="layui-icon">&#xe605;</i></a>
                                <?php else: ?>
                                    <a href="<?php echo e(url('flag?id='.$v['id'])); ?>" data-param="is_index=1" class="layui-btn layui-btn-default layui-btn-xs ajax-post"><i class="layui-icon">&#x1006;</i></a>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($v['create_time']); ?></td>
                            <td><?php echo e($v['delete_time']); ?></td>
                            <td>
                                <a href="<?php echo e(url('restore?id='.$v['id'])); ?>" class="layui-btn layui-btn-xs ajax-post">还原</a>
                                <a href="<?php echo e(url('edit?id='.$v['id'])); ?>" class="layui-btn layui-btn-normal layui-btn-xs">编辑</a>
                                <a href="<?php echo e(url('delete?id='.$v['id'].'&force=1')); ?>" class="layui-btn layui-btn-danger layui-btn-xs ajax-delete">永久删除</a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                
                
            </div>
        </form>
    </div>
</div>

<?php echo $__env->make('admin.public.js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>