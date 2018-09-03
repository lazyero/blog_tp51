<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name=renderer content=webkit><!--360浏览器默认使用极速模式-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- Apple devices fullscreen -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- Apple devices fullscreen -->
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <title>后台管理系统 - 您需要登录后才可以使用本功能</title>
    <link href="_css/login.css" rel="stylesheet" type="text/css">

    <script src="_js/jquery.js" type="text/javascript"></script>
    <script src="_js/resource/common.js" type="text/javascript"></script>
    <script src="_js/jquery.validation.min.js"></script>
    <script src="_js/jquery.supersized.min.js" ></script>
    <script src="_js/jquery.progressBar.js" type="text/javascript"></script>
</head>
<body>
<!--主体-->
<div class="login-layout">
    <div class="top">
        <h5>管理平台<em></em></h5>
        <h2>系统管理中心</h2>
    </div>
        <div class="lock-holder">
            <div class="form-group pull-left input-username">
                <label>账号</label>
                <input name="username" id="user_name" autocomplete="off" type="text" class="input-text" lay-verify="required" value="" required>
            </div>
            <div class="form-group pull-right input-password-box">
                <label>密码</label>
                <input name="password" id="password" class="input-text" autocomplete="off" type="password" required lay-verify="required" pattern="[\S]{6}[\S]*" title="密码不少于6个字符" autocomplete="new-password">
            </div>
        </div>
        <div class="submit">
            <div class="submitcode">
                <input name="verify" required lay-verify="required" type="text" class="input-code" id="captcha" placeholder="输入验证" pattern="[A-z0-9]{4}" title="验证码为4个字符" autocomplete="off" value="" >
                <div class="code">
                    <div class="code-img">
                        <img  src="{{ captcha_src() }}" alt="点击更换" title="点击更换" onclick="this.src='{{ captcha_src() }}?time='+Math.random()" class="captcha" name="codeimage" id="codeimage" border="0"/>
                   </div>
                    <a href="JavaScript:void(0);" id="hide" class="close" title="关闭"><i></i></a><a href="JavaScript:void(0);" onclick="javascript:document.getElementById('codeimage').src='{{ captcha_src() }}';" class="change" title="看不清,点击更换验证码"><i></i></a>
                </div>
            </div>
            <input name="" class="input-button btn-submit" type="button" value="登录">
        </div>
        <div class="submit2"></div>
    <div class="bottom">
    </div>
</div>

<script src="_js/layui/layui.all.js"></script>
<!--页面JS脚本-->
<script>
    $(function(){
        $.supersized({
            // 功能
            slide_interval     : 4000,
            transition         : 1,
            transition_speed   : 1000,
            performance        : 1,
            // 大小和位置
            min_width          : 0,
            min_height         : 0,
            vertical_center    : 1,
            horizontal_center  : 1,
            fit_always         : 0,
            fit_portrait       : 1,
            fit_landscape      : 0,
            // 组件
            slide_links        : 'blank',
            slides             : [
                {image : '_images/login/1.jpg'},
                {image : '_images/login/2.jpg'},
                {image : '_images/login/3.jpg'},
                {image : '_images/login/4.jpg'},
                {image : '_images/login/5.jpg'}
            ]
        });
        //显示隐藏验证码
        $("#hide").click(function(){
            $(".code").fadeOut("slow0");
        });
        $("#captcha").focus(function(){
            $(".code").fadeIn("fast");
        });
        //跳出框架在主窗口登录
        // if(top.location!=this.location)	top.location=this.location;
        // $('#user_name').focus();
        // if ($.browser.msie && ($.browser.version=="6.0" || $.browser.version=="7.0")){
        //     window.location.href='__ROOT__/public/data/html/ie6update.html';
        // }
        $("#captcha").nc_placeholder();
        //动画登录
        $('.btn-submit').click(function(data){
        	var username=$('#user_name').val();
        	if(username==''){
        		layer.msg('请输入用户名');return;
        	}
        	var password=$('#password').val();
        	if(password==''){
        		layer.msg('请输入密码');return;
        	}
        	var captcha=$('#captcha').val();
        	if(captcha==''){
        		layer.msg('请输入验证码');return;
        	}
        	$('.submit').fadeOut();
        	$.ajax({
                url: "{{ url('syslogin/login') }}",
                type: 'post',
                data:{username:username,password:password,captcha:captcha},
                success: function (info) {
                	if(info.code==1){
                		location.href = info.url;
                	}else{
                		layer.msg(info.msg);
                		$('.submit').fadeIn();
                		$('.change').click();
                	}
                }
            });
        });
        // 回车提交表单
        $('#captcha').keydown(function(event){
            if (event.keyCode == 13) {
                $('.btn-submit').click();
            }
        });
    });
</script>
</body>
</html>