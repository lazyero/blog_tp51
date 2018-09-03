<!doctype html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"><!--IE=edge告诉IE使用最新的引擎渲染网页-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes"><!--用户设备缩放-->
    <meta name="apple-mobile-web-app-capable" content="yes"><!--删除默认的苹果工具栏和菜单栏。-->
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"><!--控制状态栏显示样式-->
    <meta name=renderer content=webkit><!--360浏览器默认使用极速模式-->
    <title> 后台管理系统</title>
    <link rel="stylesheet" href="_js/layui/css/layui.css" media="all">
    <link href="_css/index.css" rel="stylesheet" type="text/css">

    <!--解决ie9以下浏览器对html5新增标签的不识别，并导致CSS不起作用的问题,
    让不支持css3 Media Query的浏览器包括IE6-IE8等其他浏览器支持查询。-->
    <!--[if lt IE 9]>
    <script src="_js/html5shiv.min.js"></script>
    <script src="_js/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<div class="admincp-header">
    <div class="bgSelector"></div>
    <div id="foldSidebar"><i class="layui-icon layui-icon-shrink-right" title="展开/收起侧边导航"></i></div>
    <div class="admincp-name">
        <h1>HUISHENG</h1>
        <h2>平台系统管理中心</h2>
    </div>
    <div class="nc-module-menu">
        <ul class="nc-row">
            {<?php echo $top_nav; ?>}
        </ul>
    </div>
    <div class="admincp-header-r">
        <div class="manager">
            <dl>
                <dt class="name"><?php echo e(session('admin_name')); ?></dt>
                <dd class="group"><?php echo e($group_info[session('group_id')]); ?></dd>
            </dl>
            <span class="avatar">
                <input name="file" type="file" class="admin-avatar-file" id="_pic" title="设置管理员头像"/>
                <img alt="" nctype="admin_avatar" src="<?php echo e(session('admin_img') ? session('admin_img') : '_images/login/admin.png'); ?>">
            </span>
        </div>
        <ul class="operate nc-row">
            <li><a class="homepage show-option" target="_blank" href="<?php echo e(url('/')); ?>" title="新窗口打开网站">&nbsp;</a></li>
            <li><a class="login-out show-option" href="<?php echo e(url('syslogin/logout')); ?>" title="安全退出管理中心">&nbsp;</a></li>
        </ul>
    </div>
    <div class="clear"></div>
</div>

<div class="admincp-container unfold">
    <div class="admincp-container-left">
        <div class="top-border"><span class="nav-side"></span><span class="sub-side"></span></div>
        <?php echo $left_nav; ?>

        <div class="about" title="关于HUISHENG.COM">
            <i class="layui-icon layui-icon-about"></i>
            <a href="http://www.huisheng.com" target="_blank"><span>HUISHENG</span></a>
        </div>
    </div>
    <div class="admincp-container-right">
        <div class="top-border"></div>
        <iframe src="" id="workspace" name="workspace" style="overflow: visible;" frameborder="0" width="100%" height="94%" scrolling="yes" onload="window.parent"></iframe>
    </div>
</div>

<script type="text/javascript" src="_js/jquery.min.js"></script>
<script src="_js/layui/layui.all.js"></script>
<script type="text/javascript" src="_js/admincp.js"></script>
<script type="text/javascript" src="http://malsup.github.io/min/jquery.blockUI.min.js"></script>
<script>
    var upload = layui.upload;
    upload.render({
        elem: '#_pic',
        url: '/admin/hsjson/admin_img',
        size:'100',//100kb,不支持ie8/9
        done: function(res){
            if(res.error > 0){
                return layer.msg(res.message);
            }
            $('#_pic').next().attr('src',res.url)
        }
    });
    $('.login-out').click(function () {
        layui.data('menu_url', null);
    })
</script>

</body>
</html>