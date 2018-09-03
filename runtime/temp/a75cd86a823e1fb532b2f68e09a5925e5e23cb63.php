<?php echo $__env->make('admin.public.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<style>
/* 下拉框样式调整 */
    .layui-tab{overflow: visible}
</style>
<div class="layui-tab layui-tab-brief">
    <ul class="layui-tab-title">
        <li class="layui-this">导航管理</li>
        <li class=""><a href="<?php echo e(url('webnav/add')); ?>">添加导航</a></li>
    </ul>
    <div class="layui-tab-content">
        <form class="layui-form layui-form-pane" action="<?php echo e(url('webnav/index')); ?>" method="get">
            <div class="layui-inline">
                <label class="layui-form-label">所属分类</label>
                <div class="layui-input-inline">
                    <select name="nav_cid">
                        <?php $__currentLoopData = $navcat_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($k); ?>" <?php if($k==$nav_cid): ?>selected="selected" <?php endif; ?> ><?php echo e($v); ?></option>
                    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="layui-inline">
                <button class="layui-btn">搜索</button>
            </div>
        </form>
        <hr>
        <div class="layui-tab-item layui-show">
            <table class="layui-table">
                <thead>
                <tr>
                    <th style="width: 60px;">展开</th>
                    <th style="width: 50px;">排序</th>
                    <th style="width: 30px;">ID</th>
                    <th style="width: 120px;">导航名称</th>
                    <th>导航分类名称</th>
                    <th>链接</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $nav_level_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr <?php if($v['level'] == 1): ?>class="level_one <?php elseif($v['level'] == 2): ?>class="level_two <?php else: ?> class="level_three <?php endif; ?> level_<?php echo e($v['pid']); ?>"  data-id="<?php echo e($v['id']); ?>" data-pid="<?php echo e($v['pid']); ?>">
                    <td <?php if($v['son']): ?>class="open_level"<?php endif; ?>> <?php echo e(str_repeat('&nbsp;',($v['level']-1)*2)); ?><i class="layui-icon" data-id="<?php echo e($v['id']); ?>" style="font-size: 25px;<?php if(!$v['son']): ?>color: #ccc;<?php endif; ?>">&#xe623;</i></td>
                    <td>
                        <input class="layui-input" name="sort" required="" lay-verify="required" placeholder="" autocomplete="off" type="text" id="change_sort_<?php echo e($v['id']); ?>" value="<?php echo e($v['sort']); ?>" data-url="<?php echo e(url('webnav/setStatus?id='.$v['id'])); ?>" onchange="change_sort(<?php echo e($v['id']); ?>)">
                    </td>
                    <td><?php echo e($v['id']); ?></td>
                    <td><?php if($v['level'] > 1): ?><?php echo e(str_repeat('&nbsp;&nbsp;&nbsp;└─',$v['level']-1)); ?> <?php endif; ?> <?php echo e($v['name']); ?> <?php if($v['alias']): ?> <?php echo e('-'.$v['alias']); ?> <?php endif; ?> </td>
                    <td><?php echo e(isset($navcat_list[$v['nav_cid']]) ? $navcat_list[$v['nav_cid']] : ''); ?></td>
                    <td><?php echo e($v['link']); ?></td>
                    <td>
                        <?php if($v['status']==1): ?>
                        <a href="<?php echo e(url('webnav/setStatus?id='.$v['id'])); ?>" data-param="status=0" class="layui-btn layui-btn-xs ajax-post">显示</a>
                        <?php else: ?>
                        <a href="<?php echo e(url('webnav/setStatus?id='.$v['id'])); ?>" data-param="status=1" class="layui-btn layui-btn-danger layui-btn-xs ajax-post">隐藏</a>
                        <?php endif; ?>
                    </td>
                    <td>    
                        <a href="<?php echo e(url('webnav/add',['pid'=>$v['id'],'nav_cid'=>$v['nav_cid']])); ?>" class="layui-btn layui-btn-xs">添加子导航</a>
                        <a href="<?php echo e(url('webnav/edit',['id'=>$v['id'],'nav_cid'=>$v['nav_cid']])); ?>" class="layui-btn layui-btn-normal layui-btn-xs">编辑</a>
                        <a href="<?php echo e(url('webnav/delete?id='.$v['id'])); ?>" class="layui-btn layui-btn-danger layui-btn-xs ajax-delete">删除</a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php echo $__env->make('admin.public.js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script src="_js/menu.js"></script>
<script>
//修改排序值
function change_sort(id){
    var sort = $("#change_sort_"+id).val();
    var _url = $("#change_sort_"+id).attr("data-url");
    $.ajax({
        type:'POST',
        url:_url,
        dataType: "json",
        data:{"sort":sort},
        success:function(info){
            if (info.code === 1) {
                setTimeout(function () {
                    location.href = info.url;
                }, 1000);
            }
            layer.msg(info.msg);
        }
    })
}
</script>