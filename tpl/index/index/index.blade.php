<!DOCTYPE html>
<html lang="zh">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
        <title> 话题列表  </title>
        <meta name="description" content="" />
        <meta name="keywords" content="php,php教程,php开源,php新" />
        <link href="_css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" href="_css/styles.css">
        <link rel="shortcut icon" href="https://lccdn.phphub.org/uploads/sites/KDiyAbV0hj1ytHpRTOlVpucbLebonxeX.png"/>
        <style>
            .carousel{
                margin-top: 4px;
                margin-bottom: -18px;
            }
            .carousel .item{
                min-height: 280px; 
            }
            .carousel .item img{
                margin: 0 auto; 
            }

            .carousel-inner > .item > img, .carousel-inner > .item > a > img {
                display: block;
                line-height: 1;
                width: 70%;
                border: 1px solid #ddd;
                box-shadow: 0 0 10px #ccc;
                -moz-box-shadow: 0 0 10px #ccc;
                -webkit-box-shadow: 0 0 10px #ccc;
            }
            .topics-index .topic-filter a.active {
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
                text-decoration: none;
            }
            a:hover, a:focus {
                color: #f4645f;
                transition: color .15s ease 0s;
                text-decoration: none;
            }
            .btn-primary {
                background-color: #f4645f;
                border-color: #f93e38;
            }
            .btn-primary:hover {
                background-color: #f4645f;
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
        </style>
    </head>
    <body id="body" class="topics-index">
        <div id="wrap">
            <div role="navigation" class="navbar navbar-default topnav">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="/" class="navbar-brand">
                            <img src="_picture/hg5judsqz7y26kuh0qat8eyv6xnt0fgc.png" alt="Laravel China" style=""/>
                        </a>
                    </div>
                    <div id="top-navbar-collapse" class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            @foreach ($nav as $names)
                                @foreach ($names['child'] as $name)
                                    <li class="dropdown">
                                        <a href="" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="100" data-close-others="true">
                                            {{ $name['name'] }}
                                        </a>
                                    </li>
                                @endforeach
                            @endforeach
                        </ul>
                        <div class="navbar-right">
                            <form method="GET" action="https://laravel-china.org/search" accept-charset="UTF-8" class="navbar-form navbar-left hidden-sm hidden-md">
                                <div class="form-group">
                                    <input class="form-control search-input mac-style" placeholder="搜索" name="q" type="text" value="">
                                </div>
                            </form>
                            <ul class="nav navbar-nav github-login" >
                                <a href="" class="btn btn-default login-btn no-pjax">
                                    <i class="fa fa-user"></i>登 录
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container main-container ">    
                <div class="col-md-9 topics-index main-col">
                    <div class="box text-center site-intro rm-link-color"  style="box-shadow: 0 1px 0 0 #ddd, 0 0 0 1px #ddd;">
                        一起建设一个专业的 Laravel /  PHP 
                    </div>
                    <div class="panel panel-default">
                        <div class="">
                            <div class="panel-body remove-padding-horizontal">
                                @foreach ($lists as $list)
                                    <div class="ui segment piled">
                                        <div class="extra content tag-active-user-card">
                                            <div class="ui middle aligned divided list">
                                                <div class="ui items">
                                                    <div class="item">
                                                        <a class="image" href="{{ url('article') }}?id={{ $list['id'] }}">
                                                            <img class="ui image image-shadow " src="{{ $list['img_url'] }}">
                                                        </a>
                                                        <div class="content">
                                                            <div class="header" style="width:100%">
                                                                <a href="{{ url('article') }}?id={{ $list['id'] }}" class="ui text black">
                                                                    {{ $list['title'] }}
                                                                </a>
                                                            </div>
                                                            <div class="description">
                                                                {!! $list['abstract'] !!}
                                                            </div>
                                                            <div class="extra">
                                                                <a class="ui button teal" href="{{ url('article') }}?id={{ $list['id'] }}">文章详情</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="panel-footer text-right remove-padding-horizontal pager-footer">
                                <!-- Pager -->
                                <ul class="pagination">
                                    <li class="disabled"><span>&laquo;</span></li>
                                    <li class="active"><span>1</span></li>
                                    <li><a href="https://laravel-china.org/topics?page=2">2</a></li>
                                    <li><a href="https://laravel-china.org/topics?page=3">3</a></li>
                                    <li><a href="https://laravel-china.org/topics?page=4">4</a></li>
                                    <li><a href="https://laravel-china.org/topics?page=5">5</a></li>
                                    <li><a href="https://laravel-china.org/topics?page=6">6</a></li>
                                    <li><a href="https://laravel-china.org/topics?page=7">7</a></li>
                                    <li><a href="https://laravel-china.org/topics?page=8">8</a></li>
                                    <li class="disabled"><span>...</span></li>
                                    <li><a href="https://laravel-china.org/topics?page=18">18</a></li>
                                    <li><a href="https://laravel-china.org/topics?page=19">19</a></li>
                                    <li><a href="https://laravel-china.org/topics?page=2" rel="next">&raquo;</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <!-- Nodes Listing -->
                </div>
                {{-- 右侧 --}}
                <div class="col-md-3 side-bar">
                    <div class="panel panel-default corner-radius">
                        <div class="panel-heading text-center">
                            <h3 class="panel-title">起源博客</h3>
                        </div>
                        <div class="panel-body text-center announcement-box">
                            <ul class="list">
                                <li>
                                    <a href="https://laravel-china.org/topics/12777" title="🔥 招募三名社区翻译管理员 ">
                                        🔥 招募三名社区翻译管理员 
                                    </a>
                                </li>
                                <li>
                                    <a href="https://laravel-china.org/topics/13426/laravel-conf-china-2019" title="Laravel Conf China 2019 议题征集中">
                                        Laravel Conf China 2019 议题征集中
                                    </a>
                                </li>
                                <li>
                                    <a href="https://laravel-china.org/topics/13471" title="✍️ 邀你共建高品质社区文档">
                                        ✍️ 邀你共建高品质社区文档
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel panel-default corner-radius panel-hot-topics">
                        <div class="panel-heading text-center">
                            <h3 class="panel-title">本周译者排行</h3>
                        </div>
                        <div class="panel-body">
                            <ul class="list-group">
                                <li class="list-group-item rm-link-color">
                                    <a href="https://laravel-china.org/users/24487" class="no-pjax rm-link-color" title="purple_ling">
                                        <img class="media-object inline-block img-thumbnail avatar avatar-middle" src="_picture/24487_1530520651.jpg" style="width: 35px;height: 35px;margin-right: 5px;">purple_ling
                                    </a>
                                    <span class="badge light-badge popover-with-html" style="margin-top: 5px;" data-content="共翻译了 5 段">
                                    5
                                    </span>
                                </li>
                            </ul>
                            <div class="text-center">
                                <a href="https://laravel-china.org/explore/translation-ranking" style="color:#999;font-size:0.9em;margin-top: 12px;display: inline-block;">
                                    查看全部排行
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default corner-radius" style="font-size: 0.98em;">
                        <div class="panel-body">
                        <form method="POST" action="https://laravel-china.org/tweets" accept-charset="UTF-8" id="tweet-create-form" class="tweet-form">
                            <div class="input-group">
                                <textarea class="form-control custom-control simple-tweet-textarea login-required-alert" rows="1" name="body" style="resize:none;border: 1px solid #ddd;min-height: 44px;font-size: 0.98em;"  placeholder="请分享美好的事物" required ></textarea>
                                <span class="input-group-addon btn btn-primary" style="color:white" onclick="javascript:document.getElementById('tweet-create-form').submit()">动弹</span>
                            </div>
                            <div class="advance-editor-hint" style="margin-top: 13px;display:none">
                                <a href="https://laravel-china.org/tweets" data-url="https://laravel-china.org/tweets" id="advance-editor-link">
                                    前往高级编辑器 <i class="fa fa-arrow-right"></i>
                                </a>
                            </div>
                        </form>
                        <br>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="new" style="padding: 15px 0px 5px;">
                                    <div class="media" style="display:table">
                                        <div class="media-left">
                                            <a href="https://laravel-china.org/users/7144">
                                                <img alt="64x64" class="media-object img-thumbnail avatar avatar-middle" data-src="_picture/ddbfba6af0464ac28443453ca775818a.gif" style="width: 26px;height: 26px;padding:0px;" src="https://lccdn.phphub.org/uploads/avatars/7144_1516953716.jpg?imageView2/1/w/100/h/100" data-holder-rendered="true">
                                            </a>
                                        </div>
                                        <div class="media-body" style="display:table;width:100%;table-layout:fixed">
                                            <div class="media-body markdown-reply content-body" style="display:block;width:100%;font-size: 14px;">
                                                <a href="https://laravel-china.org/users/7144" class="rm-link-color">li-luo-ao</a>：
                                                    <span class="rm-link-color clickable" onclick="javascript:Object.assign(document.createElement('a'), { href: 'https://laravel-china.org/tweets/14262'}).click();">
                                                        发布  冲鸭！！！
                                                    </span>
                                            </div>
                                            <span class="meta operation">
                                                <a href="https://laravel-china.org/tweets/14262" class="action">21小时前</a>
                                                <a class="action" href="https://laravel-china.org/tweets/14262">
                                                    <i class="fa fa-thumbs-o-up"></i> <span class="count vote-count">0</span>
                                                </a>
                                                <a href="https://laravel-china.org/tweets/14262" class="action">
                                                    <i class="fa fa-comments-o"></i> 
                                                    <span class="count">0</span>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>    
                    <div class="panel panel-default corner-radius sidebar-resources">
                        <div class="panel-heading text-center">
                            <h3 class="panel-title">兄弟社区</h3>
                        </div>
                        <div class="panel-body text-center">
                            <ul class="list list-group ">
                                <li class="list-group-item ">
                                    <a href="https://pythoncaff.com/" class="no-pjax" target=&quot;_blank&quot; title="PythonCaff.com">
                                        <img class="media-object inline-block " src="_picture/ouift1e7rhv9qm5i8yhr.png">
                                        PythonCaff.com
                                    </a>
                                </li>
                                <li class="list-group-item ">
                                    <a href="https://golangcaff.com/" class="no-pjax" target=&quot;_blank&quot; title="GolangCaff.com">
                                        <img class="media-object inline-block " src="_picture/b3bmelmxl8nvvd1rr6re.png">
                                        GolangCaff.com
                                    </a>
                                </li>
                                <li class="list-group-item ">
                                    <a href="https://vuejscaff.com/" class="no-pjax" target=&quot;_blank&quot; title="VuejsCaff.com">
                                        <img class="media-object inline-block " src="_picture/86pnoiq6eftxxnb2czg9.png">
                                        VuejsCaff.com
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <footer class="footer">
                <div class="container">
                    <div class="row footer-top">
                        <div class="col-sm-5 col-lg-5">
                            <p class="padding-top-xsm">我们是高品质的 Laravel 开发者社区，致力于为 Laravel 和 PHP 开发者提供一个分享创造、结识伙伴、协同互助的平台。</p>
                            <div class="text-md " >
                                <a class="popover-with-html" data-content="反馈问题" target="_blank" style="padding-right:8px" href="mailto:summer@yousails.com"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                                <a class="popover-with-html" data-content="站长微博" target="_blank" style="padding-right:8px" href="https://weibo.com/1837553744/profile?topnav=1&wvr=6"><i class="fa fa-weibo" aria-hidden="true"></i></a>
                                <a class="popover-with-html" data-content="加我微信" target="_blank" style="padding-right:8px" href="https://laravel-china.org/contact"><i class="fa fa-weixin" aria-hidden="true"></i></a>
                            </div>
                            <br>
                            <span style="font-size:0.9em">
                                Designed by 
                                <span style="color: #e27575;font-size: 14px;">❤</span> 
                                <a href="https://github.com/summerblue" target="_blank" style="color:inherit">Summer</a>
                            </span>
                        </div>
                        <div class="col-sm-6 col-lg-6 col-lg-offset-1">
                            <div class="row">
                                <div class="col-sm-4">
                                    <h4>赞助商</h4>
                                        <ul class="list-unstyled">
                                            <a href="http://www.ucloud.cn/?utm_source=zanzhu&amp;utm_campaign=phphub&amp;utm_medium=display&amp;utm_content=yejiao&amp;ytag=phphubyejiao" target="_blank"><img src="_picture/bqawwl3vt5dc2lyx5jz7.png" class="popover-with-html footer-sponsor-link" width="98" data-placement="top" data-content="本站服务器由 UCloud 赞助"></a>
                                            <a href="http://www.qiniu.com/?utm_source=phphub" target="_blank"><img src="_picture/yglir0idw7zsinjsnmzr.png" class="popover-with-html footer-sponsor-link" width="98" data-placement="top" data-content="本站 CDN 服务由七牛赞助"></a>
                                            <a href="https://www.upyun.com/" target="_blank"><img src="_picture/xptllzmin1cqbludfeon.png" class="popover-with-html footer-sponsor-link" width="98" data-placement="top" data-content="Composer 镜像赞助商"></a>
                                            <a href="http://www.sendcloud.net/" target="_blank"><img src="_picture/jptck6okybirbiwdtob8.png" class="popover-with-html footer-sponsor-link" width="98" data-placement="top" data-content="订阅邮件赞助商：SendCloud"></a>
                                        </ul>
                                </div>
                                <div class="col-sm-4">
                                    <h4>统计信息</h4>
                                    <ul class="list-unstyled">
                                        <li>社区会员: 27200 </li>
                                        <li>话题数: 11354 </li>
                                        <li>评论数: 52146 </li>
                                    </ul>
                                </div>
                                <div class="col-sm-4">
                                    <h4>其他信息</h4>
                                    <ul class="list-unstyled">
                                        <li><a href="https://laravel-china.org/contact"><i class="fa fa-thumbs-up" aria-hidden="true"></i> 商务合作</a></li>
                                        <li><a href="https://laravel-china.org/sites"><i class="fa fa-globe text-md"></i> 推荐网站</a></li>
                                        <li><a href="https://laravel-china.org/issues"><i class="fa fa-envelope-o"></i> PHP / Laravel 月刊</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                </div>
            </footer>   
        </div>
        <script src="_js/scripts.js"></script>
        <script src="_js/bootstrap-hover-dropdown.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function()
            {
                $('.share-link-site').click(function(e) {
                    var link = $(this).data('link');
                    var win = window.open(link, '_blank');
                    if (win) {
                        win.focus();
                    } else {
                        alert('请允许此页面的弹窗！');
                    }
                    e.stopPropagation();
                    return false;
                });
            });
        </script>
    </body>
</html>
