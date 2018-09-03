
<?php echo $__env->make('admin.public.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!--tab标签-->
<div class="layui-tab layui-tab-brief">
    <ul class="layui-tab-title">
        <li class="layui-this">后台菜单</li>
        <li class=""><a href="<?php echo e(url('sysmenu/add')); ?>">添加菜单</a></li>
    </ul>
    <div class="layui-tab-content">
        <div class="layui-tab-item layui-show">
            <table class="layui-table">
                <thead>
                    <tr>
                        <th style="width: 60px;">展开</th>
                        <th style="width: 50px;">排序</th>
                        <th style="width: 30px;">ID</th>
                        <th>菜单名称</th>
                        <th>控制器方法</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $admin_menu_level_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr <?php if($v['level'] == 1): ?>class="level_one <?php elseif($v['level'] == 2): ?>class="level_two <?php else: ?> class="level_three <?php endif; ?> level_<?php echo e($v['pid']); ?>"  data-id="<?php echo e($v['id']); ?>" data-pid="<?php echo e($v['pid']); ?>" style="">
                        <td <?php if($v['son']): ?>class="open_level"<?php endif; ?>> <?php echo e(str_repeat('&nbsp;',($v['level']-1)*2)); ?><i class="layui-icon" data-id="<?php echo e($v['id']); ?>" style="font-size: 25px;<?php if(!$v['son']): ?>color: #ccc;<?php endif; ?>">&#xe623;</i></td>
                        <td>
                            <input class="layui-input" name="sort" required="" lay-verify="required" placeholder="" autocomplete="off" type="text" id="change_sort_<?php echo e($v['id']); ?>" value="<?php echo e($v['sort']); ?>" data-url="<?php echo e(url('sysmenu/setStatus?id='.$v['id'])); ?>" onchange="change_sort(<?php echo e($v['id']); ?>)">
                        </td>
                        <td><?php echo e($v['id']); ?></td>
                        <td><?php if($v['level'] > 1): ?><?php echo e(str_repeat('&nbsp;&nbsp;&nbsp;└─',$v['level']-1)); ?><?php endif; ?><?php echo e($v['title']); ?></td>
                        <td><?php echo e($v['name']); ?></td>
                        <td>
                        	<?php if($v['status']==1): ?>
                        	<a href="<?php echo e(url('sysmenu/setStatus?id='.$v['id'])); ?>" data-param="status=0" class="layui-btn layui-btn-xs ajax-post">显示</a>
                        	<?php else: ?>
                        	<a href="<?php echo e(url('sysmenu/setStatus?id='.$v['id'])); ?>" data-param="status=1" class="layui-btn layui-btn-danger layui-btn-xs ajax-post">隐藏</a>
                        	<?php endif; ?>
                        </td>
                        <td>
                            <a href="<?php echo e(url('sysmenu/add?pid='.$v['id'])); ?>" class="layui-btn layui-btn-xs">添加子菜单</a>
                            <a href="<?php echo e(url('sysmenu/edit?id='.$v['id'])); ?>" class="layui-btn layui-btn-normal layui-btn-xs">编辑</a>
                            <a href="<?php echo e(url('sysmenu/delete?id='.$v['id'])); ?>" class="layui-btn layui-btn-danger layui-btn-xs ajax-delete">删除</a>
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
