
@include('admin.public.head')

<link rel="stylesheet" href="_css/ztree-metro-style.css">
<div class="layui-tab layui-tab-brief">
    <ul class="layui-tab-title">
        <li class=""><a href="{{ url('sysadmin/group_index') }}">角色</a></li>
        <li class=""><a href="{{ url('sysadmin/group_add') }}">添加角色</a></li>
        <li class="layui-this">编辑角色</li>
    </ul>
    <div class="layui-form-item">
    <div class="layui-tab-content">
        <div class="layui-tab-item layui-show">
            <ul id="tree" class="ztree"></ul>
        </div>
    </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
        <!-- <input type="hidden" id="group_id" name="id" value="{{ $id }}"> -->
        <button class="layui-btn" id="auth-btn">授权</button>
        </div>
    </div>
</div>


@include('admin.public.js')

<script src="_js/jquery.ztree.all.min.js"></script>
<script>
    $(document).ready(function(){
        /**
         * 加载树形授权菜单
         */
        var _id = '{{ $id }}';
        var tree = $("#tree");
        var zTree;

        // zTree 配置项
        var setting = {
            check: {
                enable: true
            },
            view: {
                dblClickExpand: false,
                showLine: true,
                showIcon: false,
                selectedMulti: false
            },
            data: {
                simpleData: {
                    enable: true,
                    idKey: "id",
                    pIdKey: "pid",
                    rootpid: ""
                },
                key: {
                    name: "title"
                }
            }
        };

        $.ajax({
            url: "{{ url('sysadmin/getJson') }}",
            type: "post",
            dataType: "json",
            cache: false,
            data: {
                id: _id
            },
            success: function (data) {
                zTree = $.fn.zTree.init(tree, setting, data);
            }
        });

        /**
         * 授权提交
         */
        $("#auth-btn").on("click", function () {
            var checked_ids,auth_rule_ids = [];
            checked_ids = zTree.getCheckedNodes(); // 获取当前选中的checkbox
            $.each(checked_ids, function (index, item) {
                auth_rule_ids.push(item.id);
            });
            $.ajax({
                url: "{{ url('sysadmin/updateAuthGroupRule') }}",
                type: "post",
                cache: false,
                data: {
                    id: _id,
                    auth_rule_ids: auth_rule_ids
                },
                success: function (data) {
                    if(data.code === 1){
                        setTimeout(function () {
                            location.href = data.url;
                        }, 1000);
                    }
                    layer.msg(data.msg);
                }
            });
        });
    });
</script>