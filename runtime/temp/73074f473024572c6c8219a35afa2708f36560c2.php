
<?php echo $__env->make('admin.public.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="layui-tab layui-tab-brief">
    <ul class="layui-tab-title">
        <li class=""><a href="<?php echo e(url('webnav/index')); ?>">导航管理</a></li>
        <li class=""><a href="<?php echo e(url('webnav/add')); ?>">添加导航</a></li>
        <li class="layui-this">编辑导航</li>
    </ul>
    <div class="layui-tab-content">
        <div class="layui-tab-item layui-show">
            <form class="layui-form form-container" action="<?php echo e(url('webnav/update')); ?>" method="post">
                <div class="layui-form-item">
                    <label class="layui-form-label">所属分类</label>
                    <div class="layui-input-block">
                        <select name="nav_cid" required lay-verify="required">
                            <?php $__currentLoopData = $navcat_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        	<option value="<?php echo e($k); ?>" <?php if($k==$nav['nav_cid']): ?>selected="selected" <?php endif; ?>><?php echo e($v); ?></option>
                           	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">上级导航</label>
                    <div class="layui-input-block">
                        <select name="pid" required lay-verify="required">
                            <option value="0">一级导航</option>
                            <?php $__currentLoopData = $nav_level_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($v['id']); ?>" <?php if($nav['id']==$v['id']): ?>disabled="disabled" <?php endif; ?> <?php if($nav['pid']==$v['id']): ?>selected="selected" <?php endif; ?>><?php if($v['level']!=1): ?> <?php for($i=1;$i<$v['level'];$i++): ?> ---- <?php endfor; ?> <?php endif; ?> <?php echo e($v['name']); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">导航名称</label>
                    <div class="layui-input-block">
                        <input type="text" name="name" value="<?php echo e($nav['name']); ?>" required  lay-verify="required" placeholder="请输入导航名称" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">别名</label>
                    <div class="layui-input-block">
                        <input type="text" name="alias" value="<?php echo e($nav['alias']); ?>" placeholder="（选填）请输入导航别名" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">链接</label>
                    <div class="layui-input-block">
                        <input type="text" name="link" value="<?php echo e($nav['link']); ?>" placeholder="（选填）请输入导航链接" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">图片</label>
                    <div class="layui-upload">
                    <input type="text" name="img_url" value="<?php echo e($nav['img_url']); ?>" class="layui-input layui-input-inline">
                        <button type="button" class="layui-btn _img_url" lay-data="{data:{max_width:1920,max_height:420,path:'nav'}}"><i class="layui-icon">&#xe67c;</i>上传图片</button>
                        <img src="<?php echo e($nav['img_url']); ?>" height="38" data-expander=''>
                        仅允许上传jpg,png,gif,jpeg格式，推荐尺寸1920*420
                    </div> 
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">内容</label>
                    <div class="layui-input-block">
                        <textarea id="editor" name="content" class="layui-textarea" style="height: 200px;"><?php echo e($nav['content']); ?></textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">状态</label>
                    <div class="layui-input-block">
                        <input type="radio" name="status" value="1" title="显示" <?php if($nav['status']==1): ?>checked="checked" <?php endif; ?>>
                        <input type="radio" name="status" value="0" title="隐藏" <?php if($nav['status']==0): ?>checked="checked" <?php endif; ?>>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">打开方式</label>
                    <div class="layui-input-block">
                        <input type="radio" name="target" value="_self" title="默认" <?php if($nav['target']=='_self'): ?>checked="checked" <?php endif; ?>>
                        <input type="radio" name="target" value="_blank" title="新窗口" <?php if($nav['target']=='_blank'): ?>checked="checked" <?php endif; ?>>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">排序</label>
                    <div class="layui-input-block">
                        <input type="text" name="sort" value="<?php echo e($nav['sort']); ?>" required  lay-verify="required" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <input type="hidden" name="id" value="<?php echo e($nav['id']); ?>">
                        <button class="layui-btn" lay-submit lay-filter="*">更新</button>
                        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php echo $__env->make('admin.public.js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>