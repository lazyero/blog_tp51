<?php echo $__env->make('admin.public.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="layui-tab layui-tab-brief">
    <ul class="layui-tab-title">
        <li class="layui-this">备份列表</li>
    </ul>
    <div class="layui-tab-content">
        <button type="button" class="layui-btn layui-btn-small ajax-action" data-action="<?php echo e(url('bf')); ?>">立即备份</button>
        <div class="layui-tab-item layui-show">
            <table class="layui-table">
                <thead>
                <tr>
                    <th>标题</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo substr($v,strripos($v,"/")+1) ?></td>
                    <td>
                        <a href="<?php echo url('hy') ?>" data-param="fname=<?php echo e($v); ?>" class="layui-btn layui-btn-xs hy">恢复</a>
                        <a href="<?php echo '_sql/'.(substr($v,strripos($v,"/")+1)) ?>" target="_blank" download="" class="layui-btn layui-btn-normal layui-btn-xs">下载</a>
                        <a href="<?php echo url('delete') ?>" data-param="path=<?php echo e($v); ?>" class="layui-btn layui-btn-danger layui-btn-xs ajax-confim">彻底删除</a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php echo $__env->make('admin.public.js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script>
    $('.hy').click(function () {
        var url = $(this).attr('href'),data = $(this).attr('data-param');
        layer.confirm('确定将数据恢复到此时间节点吗?', {icon: 3, title:'提示'}, function(index){
            layer.confirm('请再次确认是否将数据恢复到此时间节点?', {icon: 7, title:'提示'}, function(index){
                var loading = layer.load(0, {shade: false}); //0代表加载的风格，支持0-2
                $.post(url,data,function(info){
                    layer.close(loading);
                    if (info.code === 1) {
                        setTimeout(function () {
                            location.href = info.url;
                        }, 1000);
                    }
                    layer.msg(info.msg);
                });
                layer.close(index);
            });
            layer.close(index);
        });
        return false;
    })
</script>
