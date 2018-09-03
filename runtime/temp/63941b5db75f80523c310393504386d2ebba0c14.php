<!DOCTYPE html>
<html lang="zh">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
        <link  href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet"  href="https://lccdn.phphub.org//assets/css/cba5d8919185dc8db68f-styles.css">
        <script>
            Config = {
                'cdnDomain': 'https://lccdn.phphub.org/',
                // 'user_id': 17888,
                'notification_count': 0,
                'user_avatar': "https://lccdn.phphub.org/uploads/avatars/17888_1516411620.jpg?imageView2/1/w/100/h/100",
                // 'user_link': "https://laravel-china.org/users/17888",
                'user_badge': '',
                // 'user_badge_link': "https://laravel-china.org/roles",
                'routes': {
                    // 'notificationsCount' : 'https://laravel-china.org/notifications/count',
                    'upload_image' : '<?php echo e(url('uploads')); ?>'
                },
                'token': '8uZnjBVYx6iHa4je1fplmbreHRYiFqYHRUivWucM',
                'environment': 'production',
                'following_users': [],
                // 'qa_category_id': '4'
            };
            var ShowCrxHint = 'no';
        </script>
        <meta http-equiv="x-pjax-version" content="https://lccdn.phphub.org//assets/css/cba5d8919185dc8db68f-styles.css">
        <style>
            .markdown .topics-index .topic-filter a.active {
                border-bottom: 2px solid #fbbd08;
            }
            .navbar-default {
                border-top: 4px solid #f46660;
                height: auto;
            }
            .share-link-site {
                font-size: 12px;
                color: #828282;
            }
            .topics-index .topic-list .infos .media-heading a:visited {
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
            a {
                color: #f4645f;
            }
            a:hover, a:focus {
                color: #d6514d;
                transition: color .15s ease 0s;
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
    </head>
    <body id="body" class="articles-create" style="background-color: #fff">
        <div id="wrap">
            <div class="container main-container blog-container">
                <div class="blog-pages">
                    <div class="col-md-12 panel">
                        <div class="panel-body">
                            <form method="POST" action="" accept-charset="UTF-8" id="article-create-form">
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
                                  <textarea required="require" class="form-control" rows="20" style="overflow:hidden" id="reply_content" placeholder="请使用 Markdown 格式书写 ;-)，代码片段黏贴时请注意使用高亮语法。" name="content" cols="50"><?php echo e($res['content']); ?></textarea>
                                </div>
                                <div class="form-group status-post-submit">
                                    <button class="btn btn-primary submit-btn" type="button"  onclick="parent.submitFORM(this)">保 存</button>
                                    &nbsp;&nbsp;需要先保存才能正确提交内容&nbsp;&nbsp;
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <script>
                    Config.article_id = '0';
                </script>
            </div>    
        </div>
        <script src="https://lccdn.phphub.org//assets/js/6f9b2713f752734e93ca-scripts.js"></script>
        <script src="https://cdn.bootcss.com/bootstrap-hover-dropdown/2.2.1/bootstrap-hover-dropdown.min.js"></script>
    <link rel="stylesheet"  href="https://lccdn.phphub.org//assets/css/c75ad501cf6cef99df49-editor.css">
    <script src="https://lccdn.phphub.org//assets/js/9c30ee41ff712e1bce17-editor.js"></script>
<script type="text/javascript">
    $(document).ready(function()
    {
        var simplemde = new SimpleMDE({
            spellChecker: false,
            autosave: {
                enabled: true,
                delay: 5000,
                unique_id: "article_content"
            },
            forceSync: true,
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
            extraParams: {
              '_token': Config.token,
            },
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
</body>
</html>
