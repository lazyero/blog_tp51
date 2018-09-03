
<?php echo $__env->make('admin.public.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="layui-tab layui-tab-brief">
    <ul class="layui-tab-title">
        <li class=""><a href="<?php echo e(url('webnav/index')); ?>">导航管理</a></li>
        <li class="layui-this">添加导航</li>
    </ul>
    <div class="layui-tab-content">
        <div class="layui-tab-item layui-show">
            <form class="layui-form form-container" action="<?php echo e(url('webnav/save')); ?>" method="post">
                <div class="layui-form-item">
                    <label class="layui-form-label">所属分类</label>
                    <div class="layui-input-block">
                        <select name="nav_cid" required lay-verify="required">
                            <option value="0">一级分类</option>
                            <?php $__currentLoopData = $navcat_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        	<option value="<?php echo e($k); ?>"  <?php if($k==$nav_cid): ?>selected="selected" <?php endif; ?>><?php echo e($v); ?></option>
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
                            <option value="<?php echo e($v['id']); ?>" <?php if($pid==$v['id']): ?>selected="selected" <?php endif; ?> > <?php if($v['level']!=1): ?> <?php for($i=1;$i<$v['level'];$i++): ?> ---- <?php endfor; ?> <?php endif; ?> <?php echo e($v['name']); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">导航名称</label>
                    <div class="layui-input-block">
                        <input type="text" name="name" value="" required  lay-verify="required" placeholder="请输入导航名称" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">别名</label>
                    <div class="layui-input-block">
                        <input type="text" name="alias" value="" placeholder="（选填）请输入导航别名" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">链接</label>
                    <div class="layui-input-block">
                        <input type="text" name="link" value="" placeholder="（选填）请输入导航链接" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">图片</label>
                    <div class="layui-upload">
                    <input type="text" name="img_url" value="" class="layui-input layui-input-inline">
                        <button type="button" class="layui-btn _img_url" lay-data="{data:{max_width:1920,max_height:420,path:'nav'}}"><i class="layui-icon">&#xe67c;</i>上传图片</button>
                        <img height="38" data-expander=''>
                        仅允许上传jpg,png,gif,jpeg格式，推荐尺寸1920*420
                    </div> 
                </div>
                <!-- <div class="layui-form-item">
                    <label class="layui-form-label">图集</label>
                    <div class="layui-input-block" id="demo2">
                      <button type="button" class="layui-btn" id="test2"><i class="layui-icon">&#xe67c;</i>图集上传</button> 
                      <div id="photo-container"></div>
                    </div> 
                </div> -->
                <div class="layui-form-item">
                    <label class="layui-form-label">内容</label>
                    <div class="layui-input-block">
                        <textarea id="editor" name="content" class="layui-textarea" style="height: 200px;"></textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">状态</label>
                    <div class="layui-input-block">
                        <input type="radio" name="status" value="1" title="显示" checked="checked">
                        <input type="radio" name="status" value="0" title="隐藏">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">打开方式</label>
                    <div class="layui-input-block">
                        <input type="radio" name="target" value="_self" title="默认" checked="checked">
                        <input type="radio" name="target" value="_blank" title="新窗口">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">排序</label>
                    <div class="layui-input-block">
                        <input type="text" name="sort" value="0" required  lay-verify="required" class="layui-input">
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