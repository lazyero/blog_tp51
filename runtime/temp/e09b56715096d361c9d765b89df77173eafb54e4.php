
<?php echo $__env->make('admin.public.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <link rel="stylesheet"  href="_css/markdown/style.css">
        <script>
            Config = {
                'cdnDomain': 'https://lccdn.phphub.org/',
                'routes': {
                    'upload_image' : '<?php echo e(url('uploads')); ?>'
                },
            };
            var ShowCrxHint = 'no';
        </script>
        <style>
            .markdown .topics-index .topic-filter a.active {
                border-bottom: 2px solid #fbbd08;
            }
            .markdown .navbar-default {
                border-top: 4px solid #f46660;
                height: auto;
            }
            .markdown .share-link-site {
                font-size: 12px;
                color: #828282;
            }
            .markdown .topics-index .topic-list .infos .media-heading a:visited {
                color: #a2a2a2;
            }
            .btn-circle {
              width: 30px;
              height: 30px;
              text-align: center;
              padding: 6px 0;
              font-size: 12px;
              line-height: 1.42;
              border-radius: 15px;
            }
            .btn-shadow {
                background-color: #fff!important;
                border: none!important;
                box-shadow: 0 0 5px #ccc;
                color: #909090;
            }
            .translation-item .postion .index a {
                margin: 0 5px;
                margin-top: 13px;
            }

            .topic-content-big-font {
                font-size: 16px;
            }
            .topic-content-big-font p{
                line-height: 2.2;
            }
            ul.breadcrumb a {
                color: inherit;
            }
            .btn-primary {
                background-color: #f4645f;
                border-color: #f93e38;
            }
            .btn-primary:hover,  .btn-primary:focus, .btn-primary.focus {
                background-color: #f54944;
                border-color: #f11b14;
            }
            .translation-item .postion .btn-primary {
                background-color: #f4645f!important;
                border-color: #f93e38;
            }
            .vote-box .btn-primary.active {
                background-color: #f4645f;
                border-color: #f93e38;
            }
            .list-group-item.active, .list-group-item.active:hover, .list-group-item.active:focus {
                background-color: #f4645f;
                border-color: #f93e38;
            }

            .messages .active .badge-important {
                background-color: #ffffff !important;
                color: red!important;
            }

            .user-basic-info .follow-info a.counter:hover {
                color: #d6514d;
            }
            .user-basic-info .follow-info a.counter {
                color: #f4645f;
            }

            .user-cards .follow-info a.counter:hover {
                color: #d6514d;
            }
            .user-cards .follow-info a.counter {
                color: #f4645f;
            }
            .blog-container.container {
                margin-top: 0;
            }
            @media (min-width: 768px){
                .main-container {
                    padding-bottom: 0;
                }
            }
        </style>

<div class="layui-tab layui-tab-brief">
    <ul class="layui-tab-title">
        <li class=""><a href="<?php echo e(url('index')); ?>">信息列表</a></li>
        <li class="layui-this"><a href="<?php echo e(url('add')); ?>">添加信息</a></li>
    </ul>
    <div class="layui-tab-content">
        <div class="layui-tab-item layui-show">
            <form class="layui-form form-container" action="<?php echo e(url('save')); ?>" method="post">
                <div class="layui-form-item">
                    <label class="layui-form-label">所属栏目</label>
                    <div class="layui-input-block">
                        <select name="type" lay-verify="required">
                            <?php $__currentLoopData = $navs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <option value="<?php echo e($v['id']); ?>"><?php echo e($v['name']); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">标题</label>
                    <div class="layui-input-block">
                        <input type="text" name="title" lay-verify="required" placeholder="请输入标题" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">列表图片</label>
                    <div class="layui-upload" style="margin-left: 110px;">
                        <input type="text" name="img_url" value="" class="layui-input layui-input-inline">
                        <button type="button" class="layui-btn _img_url" lay-data="{data:{max_width:512,max_height:640,path:'images/article'}}"><i class="layui-icon">&#xe67c;</i>上传图片</button>
                        <img height="38" data-expander=''>
                        仅允许上传jpg,png,gif,jpeg格式，512*640
                    </div> 
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">摘要</label>
                    <div class="layui-input-block">
                        
                        <input type="text" name="abstract" placeholder="请输入摘要" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">文章内容</label>
                    <div class="layui-input-block">
                        
                        <div class="container main-container blog-container">
                            <div class="blog-pages">
                                <div class="col-md-12 panel">
                                    <div class="panel-body">
                                            <div id="reply_notice" class="">
                                                <ul class="helpblock list rm-link-color add-link-underline">
                                                  <li>请注意单词拼写，以及中英文排版，<a href="https://github.com/sparanoid/chinese-copywriting-guidelines">参考此页</a></li>
                                                  <li>支持 Markdown 格式, <strong>**粗体**</strong>、~~删除线~~、<code>`单行代码`</code>, 更多语法请见这里 <a href="https://github.com/riku/Markdown-Syntax-CN/blob/master/syntax.md">Markdown 语法</a></li>
                                                  <li>支持表情，使用方法请见 <a href="http://ww1.sinaimg.cn/large/6d86d850gw1ejumyeygwbj20l808faao.jpg" target="_blank">Emoji 自动补全来咯</a>，可用的 Emoji 请见 :metal: :point_right: <a href="https://laravel-china.org/ecc/index.html" target="_blank" rel="nofollow"> Emoji 列表 </a> :star: :sparkles: </li>
                                                  <li>上传图片, 支持拖拽和剪切板黏贴上传, 格式限制 - jpg, png, gif</li>
                                                  <li>发布框支持本地存储功能，会在内容变更时保存，「提交」按钮点击时清空</li>
                                                </ul>
                                            </div>
                                            <div class="form-group">
                                              <textarea required="require" class="form-control" rows="20" style="overflow:hidden" id="reply_content" placeholder="请使用 Markdown 格式书写 ;-)，代码片段黏贴时请注意使用高亮语法。" name="content" cols="50"></textarea>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">推荐</label>
                    <div class="layui-input-block">
                        <input type="radio" name="is_index" value="1" title="是">
                        <input type="radio" name="is_index" value="0" title="否" checked="checked">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">状态</label>
                    <div class="layui-input-block">
                        <input type="radio" name="is_show" value="1" title="显示" checked="checked">
                        <input type="radio" name="is_show" value="0" title="隐藏">
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
<script>
    Config.article_id = '0';
</script>
<script src="https://lccdn.phphub.org//assets/js/6f9b2713f752734e93ca-scripts.js"></script>
<link rel="stylesheet"  href="https://lccdn.phphub.org//assets/css/c75ad501cf6cef99df49-editor.css">
<script src="https://lccdn.phphub.org//assets/js/9c30ee41ff712e1bce17-editor.js"></script>
<script type="text/javascript">
    $(document).ready(function()
    {
        var simplemde = new SimpleMDE({
            spellChecker: false,
            // autosave: {
            //     enabled: true,
            //     delay: 5000,
            //     unique_id: "article_content"
            // },
            forceSync: false,
            toolbar: [
                "bold", "italic", "heading", "|", "quote", "code", "table",
                "horizontal-rule", "unordered-list", "ordered-list", "|",
                "link", "image", "|",  "side-by-side", 'fullscreen', "|",
                {
                    name: "guide",
                    action: function customFunction(editor){
                        var win = window.open('https://github.com/riku/Markdown-Syntax-CN/blob/master/syntax.md', '_blank');
                        if (win) {
                            //Browser has allowed it to be opened
                            win.focus();
                        } else {
                            //Browser has blocked it
                            alert('Please allow popups for this website');
                        }
                    },
                    className: "fa fa-info-circle",
                    title: "Markdown 语法！",
                },
            ],
        });
        inlineAttachment.editors.codemirror4.attach(simplemde.codemirror, {
            uploadUrl: Config.routes.upload_image,
            extraParams: {},
            onFileUploadResponse: function(xhr) {
                var result = JSON.parse(xhr.responseText),
                filename = result[this.settings.jsonFieldName];
                if (result && filename) {
                    var newValue;
                    if (typeof this.settings.urlText === 'function') {
                        newValue = this.settings.urlText.call(this, filename, result);
                    } else {
                        newValue = this.settings.urlText.replace(this.filenameTag, filename);
                    }
                    var text = this.editor.getValue().replace(this.lastValue, newValue);
                    this.editor.setValue(text);
                    this.settings.onFileUploaded.call(this, filename);
                }
                return false;
            }
        });
    });
</script>