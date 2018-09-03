
@include('admin.public.head')

<div class="layui-tab layui-tab-brief">
    <ul class="layui-tab-title">
        <li class=""><a href="{{ url('webnav/index') }}">导航管理</a></li>
        <li class="layui-this">添加导航</li>
    </ul>
    <div class="layui-tab-content">
        <div class="layui-tab-item layui-show">
            <form class="layui-form form-container" action="{{ url('webnav/save') }}" method="post">
                <div class="layui-form-item">
                    <label class="layui-form-label">所属分类</label>
                    <div class="layui-input-block">
                        <select name="nav_cid" required lay-verify="required">
                            <option value="0">一级分类</option>
                            @foreach($navcat_list as $k=>$v)
                        	<option value="{{ $k }}"  @if($k==$nav_cid)selected="selected" @endif>{{ $v }}</option>
                           	@endforeach
                        </select>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">上级导航</label>
                    <div class="layui-input-block">
                        <select name="pid" required lay-verify="required">
                            <option value="0">一级导航</option>
                            @foreach($nav_level_list as $v)
                            <option value="{{ $v['id'] }}" @if($pid==$v['id'])selected="selected" @endif > @if($v['level']!=1) @for($i=1;$i<$v['level'];$i++) ---- @endfor @endif {{ $v['name'] }}</option>
                            @endforeach
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
@include('admin.public.js')