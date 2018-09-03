
<?php echo $__env->make('admin.public.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="layui-tab layui-tab-brief">
    <ul class="layui-tab-title">
        <li class=""><a href="<?php echo e(url('sysmenu/index')); ?>">后台菜单</a></li>
        <li class=""><a href="<?php echo e(url('sysmenu/add')); ?>">添加菜单</a></li>
        <li class="layui-this">编辑菜单</li>
    </ul>
    <div class="layui-tab-content">
        <div class="layui-tab-item layui-show">
            <form class="layui-form form-container" action="<?php echo e(url('sysmenu/update')); ?>" method="post">
                <div class="layui-form-item">
                    <label class="layui-form-label">上级菜单</label>
                    <div class="layui-input-block">
                        <select name="pid" lay-verify="required">
                            <option value="0">一级菜单</option>
                            <?php $__currentLoopData = $admin_menu_level_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($v['id']); ?>" <?php if($admin_menu['id']==$v['id']): ?>disabled="disabled" <?php endif; ?> <?php if($admin_menu['pid']==$v['id']): ?>selected <?php endif; ?> > <?php if($v['level']!=1): ?> <?php for($i=1;$i<$v['level'];$i++): ?> ---- <?php endfor; ?> <?php endif; ?> <?php echo e($v['title']); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">菜单名称</label>
                    <div class="layui-input-block">
                        <input type="text" name="title" value="<?php echo e($admin_menu['title']); ?>" required  lay-verify="required" placeholder="请输入菜单名称" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">控制器方法</label>
                    <div class="layui-input-block">
                        <input type="text" name="name" value="<?php echo e($admin_menu['name']); ?>" placeholder="请输入控制器方法 如：index/index" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">图标</label>
                    <div class="layui-input-block">
                        <input type="text" name="icon" value="<?php echo e($admin_menu['icon']); ?>" placeholder="（选填）如：layui-icon-app" class="layui-input">
                        <a target="_blank" href="http://www.layui.com/doc/element/icon.html#table"><u>如何选择图标?</u></a>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">状态</label>
                    <div class="layui-input-block">
                        <input type="radio" name="status" value="1" title="显示" <?php if($admin_menu['status']==1): ?>checked="checked"<?php endif; ?>>
                        <input type="radio" name="status" value="0" title="隐藏" <?php if($admin_menu['status']==0): ?>checked="checked"<?php endif; ?>>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">排序</label>
                    <div class="layui-input-block">
                        <input type="text" name="sort" value="<?php echo e($admin_menu['sort']); ?>" required  lay-verify="required" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <input type="hidden" name="id" value="<?php echo e($admin_menu['id']); ?>">
                        <button class="layui-btn" lay-submit lay-filter="*">更新</button>
                        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php echo $__env->make('admin.public.js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>