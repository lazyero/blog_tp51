<script>
    //处理ie10以下同一个页面有1个以上的单图片上传
    layui.use('upload', function(){
        var upload = layui.upload;
        upload.render({
            elem: '._img_url1',
            url: '/api/json/upload',
            //accept: 'file',   //默认images
            acceptMime: 'images/*',//只显示图片文件,参数为 layui 2.2.6 开始新增
            exts: 'jpg|png|gif|bmp|jpeg',
            before: function(obj){ //obj参数包含的信息，跟 choose回调完全一致，可参见上文。
                layer.msg('上传中···',{time:60000,icon: 16,shade: 0.3});
            },
            done: function(res){
                //如果上传失败
                if(res.error > 0){
                    return layer.msg(res.message);
                }
                //上传成功
                if (device.ie==8 || device.ie==9){//ie8、9浏览器无法获取item
                    var item = $('.layui-upload').eq(layui.data('_img_url').index);
                    item.children("input").val(res.url);
                    item.children('img').attr('src', res.url); //图片链接
                }else{
                    //获取当前触发上传的元素，一般用于 elem 绑定 class 的情况，注意：此乃 layui 2.1.0 新增
                    var item = this.item;
                    item.prev("input").val(res.url);
                    item.next().next('img').attr('src', res.url); //图片链接
                }
                layer.closeAll();
            }
        });
    });
</script>