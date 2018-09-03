
<?php echo $__env->make('admin.public.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!--tab标签-->
<div class="layui-tab layui-tab-brief">
    <ul class="layui-tab-title">
        <li class="layui-this" lay-id="site">站点配置</li>
        <li lay-id="email">邮箱配置</li>
    </ul>
    <div class="layui-tab-content">
        <div class="layui-tab-item layui-show">
            <form class="layui-form form-container" action="<?php echo e(url('updateConfig')); ?>" method="post">
                <input type="hidden" name="config_type" value="site_config" />
                <div class="layui-form-item">
                    <label class="layui-form-label">公司名称</label>
                    <div class="layui-input-block">
                        <input type="text" name="site_config[site_title]" value="<?php echo e($site_config['site_title']); ?>" required  lay-verify="required" placeholder="请输入公司名称" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">SEO标题</label>
                    <div class="layui-input-block">
                        <input type="text" name="site_config[seo_title]" value="<?php echo e($site_config['seo_title']); ?>" placeholder="请输入SEO标题" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">SEO关键字</label>
                    <div class="layui-input-block">
                        <input type="text" name="site_config[seo_keyword]" value="<?php echo e($site_config['seo_keyword']); ?>" placeholder="请输入SEO关键字" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">SEO描述</label>
                    <div class="layui-input-block">
                        <textarea name="site_config[seo_description]" placeholder="请输入SEO描述" class="layui-textarea"><?php echo e($site_config['seo_description']); ?></textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">版权信息</label>
                    <div class="layui-input-block">
                        <input type="text" name="site_config[site_copyright]" value="<?php echo e($site_config['site_copyright']); ?>" placeholder="请输入版权信息" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">ICP备案号</label>
                    <div class="layui-input-block">
                        <input type="text" name="site_config[site_icp]" value="<?php echo e($site_config['site_icp']); ?>" placeholder="请输入ICP备案号" autocomplete="off" class="layui-input">
                    </div>
                </div>
                
                <div class="layui-form-item">
                    <label class="layui-form-label">图片压缩</label>
                    <div class="layui-input-block">
                        <input type="radio" lay-filter="img_resize" name="site_config[img_resize]" value="on" title="开启压缩" <?php echo e(($site_config['img_resize']=='on' || $site_config['img_resize']=='')?'checked':''); ?>>
                        <input type="radio" lay-filter="img_resize" name="site_config[img_resize]" value="off" title="任性，原图上传" <?php echo e($site_config['img_resize']=='off'?'checked':''); ?>>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">压缩选项</label>
                    <div class="layui-input-block">
                        <input type="radio" lay-filter="img_resize_opt" name="site_config[img_resize_opt]" value="1" title="仅压缩" <?php echo e($site_config['img_resize_opt']=='1'?'checked':''); ?>>
                        <input type="radio" lay-filter="img_resize_opt" name="site_config[img_resize_opt]" value="2" title="根据推荐尺寸等比例缩小" <?php echo e($site_config['img_resize_opt']=='2'?'checked':''); ?>>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn" lay-submit lay-filter="*">提交</button>
                        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="layui-form layui-tab-item">
            <div class="layui-form-item">
                <form class="layui-form form-container" action="<?php echo e(url('updateConfig')); ?>" method="post">
                    <input type="hidden" name="config_type" value="email_config" />
                    <div class="layui-form-item">
                        <label class="layui-form-label">发件人名称</label>
                        <div class="layui-input-block">
                            <input type="text" name="email_config[sender]" value="<?php echo e($email_config['sender']); ?>" placeholder="请输入发件人" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">SMTP服务器</label>
                        <div class="layui-input-block">
                            <input type="text" name="email_config[smtp]" value="<?php echo e($email_config['smtp']); ?>" placeholder="SMTP服务器" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">发件箱账号</label>
                        <div class="layui-input-block">
                            <input type="text" name="email_config[loginname]" value="<?php echo e($email_config['loginname']); ?>" placeholder="邮箱账号" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">发件箱密码</label>
                        <div class="layui-input-block">
                            <input type="text" name="email_config[password]" value="<?php echo e($email_config['password']); ?>" placeholder="邮箱密码" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit lay-filter="*">提交</button>
                            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php echo $__env->make('admin.public.js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script>
    var is_gd = <?php echo e(!extension_loaded('gd')?1:0); ?>;
    layui.use(['form'], function(){
        var form = layui.form;
        form.on('radio(img_resize)', function(data){
            if(data.value == 'on'){
                if(is_gd==1){
                    data.elem.checked = false;
                    layer.tips('请先打开gd扩展支持', data.othis)
                }else{
                    $("input[name='site_config[img_resize_opt]']:eq(0)").attr("checked",'checked');
                }
            }else if(data.value == 'off'){
                $("input[name='site_config[img_resize_opt]']").prop('checked', false);
            }
            form.render('radio');
        });
        form.on('radio(img_resize_opt)', function(data){
            var img_resize = $("input[name='site_config[img_resize]']:checked").val()
            if(img_resize != 'on'){
                data.elem.checked = false;
                layer.tips('请先开启图片压缩功能', data.othis)
            }
            if(data.value == '2' && (device.ie==8 || device.ie==9) && is_gd==0){
                data.elem.checked = false;
                layer.tips('ie10以下版本不支持缩小', data.othis)
            }
            form.render('radio');
        });
    })

</script>
