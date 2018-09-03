
@include('admin.public.head')
{{-- markdown 编辑器 --}}
<link rel="stylesheet"  href="_css/markdown/style.css">
<script>
    Config = {
        'cdnDomain': 'https://lccdn.phphub.org/',
        'routes': {
            'upload_image' : '{{ url('uploads') }}'
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
{{-- end markdown --}}
<div class="layui-tab layui-tab-brief">
    <ul class="layui-tab-title">
        <li class=""><a href="{{ url('index') }}">信息列表</a></li>
        <li class="layui-this"><a href="{{ url('add') }}">添加信息</a></li>
    </ul>
    <div class="layui-tab-content">
        <div class="layui-tab-item layui-show">
            <form class="layui-form form-container" action="{{ url('update') }}" method="post">
                <div class="layui-form-item">
                    <label class="layui-form-label">所属栏目</label>
                    <div class="layui-input-block">
                        <select name="type" lay-verify="required">
                            @foreach ($navs as $v)
                                <option value="{{ $v['id'] }}" @if ($v['id']==$res['type']) selected @endif>{{ $v['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">标题</label>
                    <div class="layui-input-block">
                        <input type="text" name="title" lay-verify="required" value="{{ $res['title'] }}" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">列表图片</label>
                    <div class="layui-upload"  style="margin-left: 110px;">
                        <input type="text" name="img_url" value="{{ $res['img_url'] }}" class="layui-input layui-input-inline">
                        <button type="button" class="layui-btn _img_url" lay-data="{data:{max_width:512,max_height:640,path:'images/article'}}"><i class="layui-icon">&#xe67c;</i>上传图片</button>
                        <img height="38" data-expander='' src="{{ $res['img_url'] }}">
                        仅允许上传jpg,png,gif,jpeg格式，512*640
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">摘要</label>
                    <div class="layui-input-block">
                        {{--<input type="text" name="abstract" value="{{ $res['abstract'] }}" placeholder="请输入摘要" class="layui-input">--}}
                        <textarea id="abstract" name="abstract" class="layui-textarea" style="height: 200px;">{{ $res['abstract'] }}</textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">文章内容</label>
                    <div class="layui-input-block">
                        <textarea id="content" name="content" class="layui-textarea" style="height: 200px;">{{ $res['content'] }}</textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">文章内容</label>
                    <div class="layui-input-block">
                        <div id="contenthtml"></div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">推荐</label>
                    <div class="layui-input-block">
                        <input type="radio" name="is_index" value="1" title="是" @if ($res['is_index'] == 1) checked="checked"@endif>
                        <input type="radio" name="is_index" value="0" title="否" @if ($res['is_index'] == 0) checked="checked"@endif>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">状态</label>
                    <div class="layui-input-block">
                        <input type="radio" name="is_show" value="1" title="显示" @if ($res['is_show'] == 1) checked="checked"@endif>
                        <input type="radio" name="is_show" value="0" title="隐藏" @if ($res['is_show'] == 0) checked="checked"@endif>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">排序</label>
                    <div class="layui-input-block">
                        <input type="text" name="sort" value="{{ $res['sort'] }}" required  lay-verify="required" class="layui-input">
                    </div>
                </div>
                <input type="hidden" name="id" value="{{ $res['id'] }}">
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
{{--<button id="btnn">转换</button>--}}
@include('admin.public.js')
<script>
    Config.article_id = '0';
</script>
<script src="https://lccdn.phphub.org//assets/js/6f9b2713f752734e93ca-scripts.js"></script>

<script src="https://cdn.bootcss.com/bootstrap-hover-dropdown/2.2.1/bootstrap-hover-dropdown.min.js"></script>
{{--<script src="_js/editor/scripts.js"></script>--}}
{{--<link rel="stylesheet"  href="_js/editor/editor.css">--}}
{{--<script src="_js/editor/editor.js"></script>--}}
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
            // },
            forceSync: true,
            element: document.getElementById("content"), //要使用的textarea的DOM元素。默认为页面上的第一个textarea
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
        // inlineAttachment.editors.codemirror4.attach(simplemde.codemirror, {
        //     uploadUrl: Config.routes.upload_image,
        //     extraParams: {},
        //     onFileUploadResponse: function(xhr) {
        //         var result = JSON.parse(xhr.responseText),
        //             filename = result[this.settings.jsonFieldName];
        //         if (result && filename) {
        //             var newValue;
        //             if (typeof this.settings.urlText === 'function') {
        //                 newValue = this.settings.urlText.call(this, filename, result);
        //             } else {
        //                 newValue = this.settings.urlText.replace(this.filenameTag, filename);
        //             }
        //             var text = this.editor.getValue().replace(this.lastValue, newValue);
        //             this.editor.setValue(text);
        //             this.settings.onFileUploaded.call(this, filename);
        //         }
        //         return false;
        //     }
        // });
        $(".CodeMirror").onmouseout(function () {
            document.getElementById('contenthtml').innerHTML =  simplemde.value();
        })
    });
</script>