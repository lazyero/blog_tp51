@include('admin.public.head')

<div class="layui-tab layui-tab-brief">
    <ul class="layui-tab-title">
        <li class="layui-this">信息列表</li>
        <li class=""><a href="{{ url('add') }}">添加信息</a></li>
    </ul>
    <div class="layui-tab-content">
        <form class="layui-form layui-form-pane" action="" method="get">
            <div class="layui-inline">
                <label class="layui-form-label">栏目分类</label>
                <div class="layui-input-inline">
                    <select name="type">
                        <option value="">全部</option>
                        {{-- @foreach($class_type as $k=>$v)
                            <option value="{{ $k }}" @if(input('type')==$k)selected="selected" @endif>{{ $v }}</option>
                        @endforeach --}}
                    </select>
                </div>
            </div>
            <div class="layui-inline">
                <label class="layui-form-label">关键词</label>
                <div class="layui-input-inline">
                    <input type="text" name="title" value="{{ input('title') }}" placeholder="请输入关键词" class="layui-input">
                </div>
            </div>
            <div class="layui-inline">
                <button class="layui-btn">搜索</button>
            </div>
        </form>
        <hr>

        <form action="" method="post" class="ajax-form">
            选中项：
            <button type="button" class="layui-btn layui-btn-danger layui-btn-small ajax-action" data-action="{{ url('delete') }}">删除</button>
            <div class="layui-tab-item layui-show">
                <table class="layui-table">
                    <thead>
                    <tr>
                        <th style="width: 15px;"><input type="checkbox" class="check-all"></th>
                        <th style="width: 30px;">ID</th>
                        <th style="width: 30px;">排序</th>
                        <th>标题</th>
                        <th>所属分类</th>
                        <th>当前状态</th>
                        <th>推荐</th>
                        <th>发布时间</th>
                        <th>更新时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($lists as $v)
                    <tr>
                        <td><input type="checkbox" name="ids[]" value="{{ $v['id'] }}"></td>
                        <td>{{ $v['id'] }}</td>
                        <td>
                            {{ $v['sort'] }}
                            {{--<input type="text" id="sort" class="layui-input" value="{{ $v['sort'] }}">--}}
                        </td>
                        <td>{{ $v['title'] }}</td>
                        <td>
                            @foreach ($navs as $nav)
                                @if ($nav['id'] == $v['type'])
                                    {{ $nav['name'] }}
                                @endif
                            @endforeach
                            {{--{{ $v['type'] }}--}}
                        </td>
                        <td>
                            @if($v['is_show']==1)
                            <a href="{{ url('flag?id='.$v['id']) }}" data-param="is_show=0" class="layui-btn layui-btn-xs ajax-post">显示</a>
                            @else
                            <a href="{{ url('flag?id='.$v['id']) }}" data-param="is_show=1" class="layui-btn layui-btn-danger layui-btn-xs ajax-post">隐藏</a>
                            @endif
                        </td>
                        <td>
                            @if($v['is_index']==1)
                                <a href="{{ url('flag?id='.$v['id']) }}" data-param="is_index=0" class="layui-btn layui-btn-normal layui-btn-xs ajax-post"><i class="layui-icon">&#xe605;</i></a>
                            @else
                                <a href="{{ url('flag?id='.$v['id']) }}" data-param="is_index=1" class="layui-btn layui-btn-default layui-btn-xs ajax-post"><i class="layui-icon">&#x1006;</i></a>
                            @endif
                        </td>
                        <td>{{ $v['create_time'] }}</td>
                        <td>{{ $v['update_time'] }}</td>
                        <td>
                            <a href="{{ url('edit?id='.$v['id']) }}" class="layui-btn layui-btn-normal layui-btn-xs">编辑</a>
                            <a href="{{ url('delete?id='.$v['id']) }}" class="layui-btn layui-btn-danger layui-btn-xs ajax-delete">删除</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {{-- 分页 --}}
                {{-- {!! $list->render() !!} --}}
            </div>
        </form>
    </div>
</div>

@include('admin.public.js')