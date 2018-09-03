<!DOCTYPE html>
<!--[if IE 9]>         <html class="ie9 no-focus" lang="zh"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-focus" lang="zh"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>跳转提示 | 上海回声网络科技</title>
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">
    <!-- Stylesheets -->
    <!-- Bootstrap and OneUI CSS framework -->
    <link rel="stylesheet" href="_css/bootstrap.min.css">
    <link rel="stylesheet" href="_css/jump.css">
    <!-- END Stylesheets -->
</head>
<body>
<!-- Error Content -->
<div class="content bg-white text-center pulldown overflow-hidden">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <!-- Error Titles -->
            <h1 class="font-w300 {$code? 'text-success' : 'text-city'} push-10 animated flipInX"><?php echo e(strip_tags($msg)); ?></h1>
            <p class="font-w300 push-20 animated fadeInUp">页面自动 <a id="href" href="<?php echo e($url); ?>">跳转</a> 等待时间： <b id="wait"><?php echo e($wait); ?></b>秒</p>
            <div class="push-50">
                <a class="btn btn-minw btn-rounded btn-success" href="<?php echo e($url); ?>"></i> 立即跳转</a>
                <button class="btn btn-minw btn-rounded btn-warning" type="button" onclick="stop()">禁止跳转</button>
                <!-- <a class="btn btn-minw btn-rounded btn-default" href="<?php echo e(request()->domain()); ?>">返回首页</a> -->
            </div>
            <!-- END Error Titles -->
        </div>
    </div>
</div>
<!-- END Error Content -->

<!-- Error Footer -->
<div class="content pulldown text-muted text-center">
    <!-- 极简 · 极速 · 极致<br> -->
    回声网络科技 ，让使用更简单！<br>
    由 <a class="link-effect" href="http://www.huisheng.com">回声网络科技</a> 倾情奉献
</div>
<!-- END Error Footer -->

<script type="text/javascript">
    (function(){
        var wait = document.getElementById('wait'),
            href = document.getElementById('href').href;
        var interval = setInterval(function(){
            var time = --wait.innerHTML;
            if(time <= 0) {
                location.href = href;
                clearInterval(interval);
            };
        }, 1000);

        // 禁止跳转
        window.stop = function (){
            clearInterval(interval);
        }
    })();
</script>
</body>
</html>
