
@include('admin.public.head')
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
                        <textarea id="" name="abstract" class="layui-textarea" style="height: 100px;">{{ $res['abstract'] }}</textarea>
                        {{--<input type="text" name="abstract" value="{{ $res['abstract'] }}" placeholder="请输入摘要" class="layui-input">--}}
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">文章内容</label>
                    <div class="layui-input-block">
                        {{-- markdown --}}
                        <textarea id="content" name="content" class="layui-textarea" style="height: 200px;">{{ $res['content'] }}</textarea>
                        {{-- end markdown --}}
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
@include('admin.public.js')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
{{--高亮显示--}}
{{--<script src="static/markdowneditor/src/js/simplemde.js"></script>--}}
{{--<script src="https://cdn.jsdelivr.net/highlight.js/latest/highlight.min.js"></script>--}}
{{--<link rel="stylesheet" href="https://cdn.jsdelivr.net/highlight.js/latest/styles/github.min.css">--}}
{{--高亮显示end--}}
<link rel="stylesheet"  href="_js/editor/editor.css">
<script>
    // Most options demonstrate the non-default behavior
    var plainText = document.getElementById("content").innerHTML;
    var simplemde = new SimpleMDE({
        autoDownloadFontAwesome: true, // 如果设置为true，则强制下载Font Awesome（用于图标）。如果设置为false，则阻止下载。默认为undefined，将智能检查是否已包含Font Awesome，然后相应下载。
        autofocus: true, //如果设置为true，则自动对焦编辑器。默认为false。
        autosave: {  //保存正在写入的文本，并在将来加载它。当提交包含的表单时，它将忘记文本。
            enabled: false, //如果设置为true，则自动保存文本。默认为false
        },
        element: document.getElementById("content"), //要使用的textarea的DOM元素。默认为页面上的第一个textarea
        forceSync: true, //如果设置为true，则强制在SimpleMDE中进行的文本更改立即存储在原始文本区域中。默认为false。
        lineWrapping: true, //如果设置为false，则禁用换行。默认为 true。
        placeholder: "Type here...",//自定义占位符
        // previewRender: function(plainText) {  //自定义函数，用于解析明文Markdown并返回HTML。用户预览时使用。
        //     return customMarkdownParser(plainText); // Returns HTML from a custom parser
        // },
        // previewRender: function(plainText, preview) { // Async method
        //     setTimeout(function(){
        //         preview.innerHTML = customMarkdownParser(plainText);
        //     }, 250);
        //
        //     return "Loading...";
        // },
        renderingConfig: {
            singleLineBreaks: true,
            codeSyntaxHighlighting: true,
        },
        spellChecker: false,
        styleSelectedText: true,
        tabSize: 4,
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
        toolbarTips: true,
    });
</script>
