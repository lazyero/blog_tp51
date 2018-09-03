<!DOCTYPE html>
<html lang="zh">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title>chinese-typesetting：更好的中文文案排版 | Laravel China 社区 - 高品质的 Laravel 开发者社区
    </title>
    <meta name="description" content="我们是高品质的 Laravel 开发者社区，致力于为 Laravel 和 PHP 开发者提供一个分享创造、结识伙伴、协同互助的论坛。" />
    <meta name="keywords" content="php,laravel,php论坛,laravel论坛,php社区,laravel社区,laravel教程,php教程,laravel视频,php开源,php新手,php7,laravel5" />
    <meta name="author" content="PHPHub" />

    <meta name="_token" content="eAbCvWii9BX81ilZy5CWuuiK05dZFBl7Gxe20LX9">

    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://lccdn.phphub.org//assets/css/739aa2346ca06ac30b4a-styles.css">

    <link rel="shortcut icon" href="https://lccdn.phphub.org/uploads/sites/KDiyAbV0hj1ytHpRTOlVpucbLebonxeX.png"/>

    <script>
        Config = {
            'cdnDomain': 'https://lccdn.phphub.org/',
            'request_interval': 50000, // 消息通知检测周期
            'user_id': 0,
            'notification_count': 0,
            'user_avatar': "",
            'user_link': "",
            'user_badge': '',
            'user_badge_link': "",
            'routes': {
                'notificationsCount' : 'https://laravel-china.org/notifications/count',
                'upload_image' : 'https://laravel-china.org/upload_image'
            },
            'token': 'eAbCvWii9BX81ilZy5CWuuiK05dZFBl7Gxe20LX9',
            'environment': 'production',
            'following_users': [],
            'qa_category_id': '4'
        };

        var ShowCrxHint = 'no';
    </script>


</head>

<body id="body" class="articles-show">

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
                    <img src="https://lccdn.phphub.org/uploads/sites/hG5JuDSqZ7Y26Kuh0Qat8EYv6XNT0fGc.png" alt="Laravel China" style=""/>
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
                        <a href="https://laravel-china.org/auth/login" class="btn btn-default login-btn no-pjax">
                            <i class="fa fa-user"></i>
                            登 录
                        </a>
                    </ul>
                </div>
            </div>

        </div>
    </div>

    <div class="container main-container blog-container">




        <div class="blog-pages">
            <div class="col-md-9 left-col pull-right">

                <div class="panel article-body content-body">

                    <div class="panel-body">

                        <h1 class="text-center">
                            chinese-typesetting：更好的中文文案排版
                        </h1>


                        <div class="article-meta text-center">
                            <i class="fa fa-clock-o"></i> <abbr title="2018-07-26 13:45:54" class="timeago">3周前</abbr>
                            ⋅
                            <i class="fa fa-eye"></i> 517
                            ⋅
                            <i class="fa fa-thumbs-o-up"></i> 38
                            ⋅
                            <i class="fa fa-comments-o"></i> 1

                        </div>

                        <div class="entry-content">
                            <div class="content-body entry-content panel-body ">

                                <div class="markdown-body topic-content-big-font" id="emojify">

                                    <blockquote>
                                        <p>一直收益于 Laravel 社区的强大。感谢 Laravel-china，按照社区的教程帖子，自己尝试制作了第一个 Composer 包。欢迎指正。GitHub 地址：<a href="https://github.com/jxlwqq/chinese-typesetting">https://github.com/jxlwqq/chinese-typesetting</a></p>
                                    </blockquote>
                                    <h1>更好的中文文案排版</h1>
                                    <p>统一中文文案、排版的相关用法，降低团队成员之间的沟通成本，增强网站气质。</p>
                                    <h2>安装</h2>

                                    <p>在中文与英文字母/用于数学、科学和工程的希腊字母/数字之间添加空格。 参考依据：<a href="https://github.com/mzlogin/chinese-copywriting-guidelines#%E7%A9%BA%E6%A0%BC">中文文案排版指北：空格<br /></a> </p>
                                    <p>目前，比较主流的约定是在中文与英文之间添加空格。我在此基础上，增加了对用于数学、科学和工程的希腊字母的支持。</p>
                                    <h3>全角转半角</h3>
                                    <pre><code class="language-php">use Jxlwqq\ChineseTypesetting\ChineseTypesetting;

$chineseTypesetting = new ChineseTypesetting();

$text = '这个名为 ＡＢＣ 的蛋糕只卖 １０００ 元。';
$chineseTypesetting-&gt;full2Half($text);
// 这个名为 ABC 的蛋糕只卖 1000 元。</code></pre>

                                    <p></p>
                                    <div style="position: absolute!important;height: 1px;width: 1px;overflow: hidden;clip: rect(1px,1px,1px,1px);">本文章首发在 <a href="https://laravel-china.org/">Laravel China 社区</a></div>

                                </div>

                            </div>
                        </div>
                        <div class="post-info-panel">
                            <p class="info">
                                <label class="info-title">版权声明：</label><i class="fa fa-fw fa-creative-commons"></i>自由转载-非商用-非衍生-保持署名（<a href="https://creativecommons.org/licenses/by-nc-nd/3.0/deed.zh">创意共享3.0许可证</a>）
                            </p>
                        </div>
                        <br>
                        <br>
                        <div class="panel-footer operate">
                            <div class="actions">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="" aria-labelledby="exampleModalLabel" >
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="exampleModalLabel">添加附言</h4>
                                    </div>

                                    <form method="POST" action="https://laravel-china.org/topics/14917/append" accept-charset="UTF-8">
                                        <input type="hidden" name="_token" value="eAbCvWii9BX81ilZy5CWuuiK05dZFBl7Gxe20LX9">
                                        <div class="modal-body">

                                            <div class="alert alert-warning">
                                                附加内容, 使用此功能的话, 会给所有参加过讨论的人发送提醒.
                                            </div>

                                            <div class="form-group">
                                                <textarea class="form-control" style="min-height:20px" placeholder="请使用 Markdown 格式书写 ;-)，代码片段黏贴时请注意使用高亮语法。" name="content" cols="50" rows="10"></textarea>
                                            </div>

                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                                            <button type="submit" class="btn btn-primary">提交</button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" >
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="exampleModalLabel">内容举报</h4>
                                    </div>

                                    <form method="POST" action="https://laravel-china.org/reports" accept-charset="UTF-8">
                                        <input type="hidden" name="_token" value="eAbCvWii9BX81ilZy5CWuuiK05dZFBl7Gxe20LX9">

                                        <input name="reportable_id" type="hidden" value="">
                                        <input name="reportable_type" type="hidden" value="">

                                        <div class="modal-body">

                                            <p>
                                                我要举报举报该<span class='modal-typename'></span>，理由是：
                                            </p>


                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="report_type" value="spam" required>
                                                    <strong>垃圾广告信息</strong>：恶意灌水、广告、推广、测试等内容
                                                </label>
                                            </div>

                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="report_type" value="violation" required>
                                                    <strong>违规内容</strong>：色情、暴利、血腥、敏感信息等
                                                </label>
                                            </div>

                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="report_type" value="unfriendly" required>
                                                    <strong>不友善内容</strong>：人身攻击、挑衅辱骂、恶意行为
                                                </label>
                                            </div>

                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="report_type" value="other" required>
                                                    <strong>其他理由</strong>：请补充说明
                                                </label>
                                            </div>

                                            <div class="form-group">
                                                <textarea class="form-control" placeholder="请提供详尽的说明" name="reason" rows="3"></textarea>
                                            </div>

                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                                            <button type="submit" class="btn btn-primary">提交</button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>                  </div>

                </div>

                <div class="votes-container panel panel-default padding-md">

                    <div class="panel-body vote-box text-center">

                        <div class="btn-group">

                            <a href="javascript:void(0);" title="Up Vote"
                               data-content="你无权限点赞！"
                               disabled

                               id="up-vote"
                               class="vote btn btn-primary popover-with-html " >
                                <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                点赞

                            </a>

                        </div>

                        <div class="voted-users">

                            <div class="user-lists">
                                <a href="https://laravel-china.org/users/16596" data-userId="16596">
                                    <img class="img-thumbnail avatar avatar-middle" src="https://lccdn.phphub.org/uploads/avatars/16596_1513153987.png?imageView2/1/w/100/h/100" style="width:48px;height:48px;">
                                </a>
                            </div>

                            <a class="voted-template" href="" data-userId="" style="display:none">
                                <img class="img-thumbnail avatar avatar-middle" src="" style="width:48px;height:48px;">
                            </a>
                        </div>

                    </div>
                </div>



                <!-- Reply List -->
                <div class="replies panel panel-default list-panel replies-index">

                    <div class="panel-heading">
                        <div class="total">回复数量: <b>1</b> </div>

                        <div class="order-links">
                            <a class="btn btn-default btn-sm active popover-with-html" data-content="按照时间排序" href="https://laravel-china.org/articles/14917/chinese-typesetting-better-chinese-copywriting?order_by=created_at&amp;#replies" role="button">时间</a>
                            <a class="btn btn-default btn-sm  popover-with-html" data-content="按照投票排序" href="https://laravel-china.org/articles/14917/chinese-typesetting-better-chinese-copywriting?order_by=vote_count&amp;#replies" role="button">投票</a>
                        </div>
                    </div>
                </div>
                <ul class="list-group tweets-list replies" id="replies">
                    <li class="list-group-item media">

                        <a name="last-reply" class="anchor" href="#last-reply" aria-hidden="true"></a>
                        <a name="reply57883" id="reply57883" aria-hidden="true"></a>

                        <div class="avatar pull-left" style="margin-top:10px">
                            <a href="https://laravel-china.org/users/4269">
                                <img class="media-object img-thumbnail avatar" src="https://lccdn.phphub.org/uploads/avatars/4269_1491979850.jpg?imageView2/1/w/100/h/100" style="width:48px;height:48px;"/>
                            </a>

                        </div>

                        <div class="details">

                            <div class="media-right">
                                <a href="https://laravel-china.org/users/4269" class="user-name"><strong>wujunze</strong></a>

                                <span class="meta">
                    搬砖 &amp;&amp; 背锅 @ 好未来
                </span>
                            </div>

                            <div class="infos" style="margin-left: 64px;">
                                <div class="media-body markdown-reply content-body" style="display: block;width: 100%;">
                                    <p>可以集成到文档模块 很方便</p>
                                </div>

                                <span class="meta operation" style="margin-top: 5px;">
                <span class="meta action" title="2018-07-27 14:07:39">
                   3周前
                </span>

                                    <a class="action">
                        <i class="fa fa-thumbs-o-up" style="font-size:14px;"></i> <span class="vote-count"></span>
                    </a>



            <a class="action" href="javascript:void(0)" onclick="replyOne('wujunze');" title="回复 wujunze">
                <i class="fa fa-reply"></i>
            </a>



                            </span>
                            </div>
                        </div>
                    </li>            </ul>
                <div class="panel" style="padding-left:20px">
                </div>
                <!-- Reply Box -->
                <div class="reply-box form box-block tweet-composing-box panel">


                    <div class="panel-body">


                        <div class="text-center">
                            <span style="font-size:16px">您需要登陆以后才能留下评论！</span>
                            <a href="https://laravel-china.org/auth/login" class="btn btn-default login-btn no-pjax">
                                <i class="fa fa-user"></i>
                                登 录
                            </a>
                        </div>

                        <div class="clearfix"></div>
                        <div class="box preview markdown-reply" id="preview-box" style="display:none;border: dashed 1px #ccc;background: #ffffff;border-radius: 6px;box-shadow:none;margin-top: 20px;margin-bottom: 6px;"></div>

                    </div>
                </div>
            </div>
            <div class="col-md-3 main-col pull-left">
                <div class="panel panel-default corner-radius">

                    <div class="panel-body text-center topic-author-box blog-info">

                        <div class="image blog-cover">
                            <a href="https://laravel-china.org/know-nothing" >
                                <img class=" avatar-112 avatar img-thumbnail" src="https://lccdn.phphub.org/uploads/images/201709/28/12404/ezXerDHroh.png?imageView2/1/w/224/h/224">
                            </a>
                        </div>
                        <div class="blog-name">
                            <h4><a href="https://laravel-china.org/know-nothing">患不知也</a></h4>
                        </div>
                        <div class="blog-description">
                            学徒。
                        </div>

                        <hr>

                        <a href="https://laravel-china.org/know-nothing" class="">
                            <li class="list-group-item"><i class="text-md fa fa-list-ul"></i> &nbsp;专栏文章（2）</li>
                        </a>



                    </div>

                </div>
                <div id="sticker">

                    <div class="panel panel-default corner-radius">

                        <div class="panel-heading text-center">
                            <h3 class="panel-title">作者：jxlwqq</h3>
                        </div>

                        <div class="panel-body text-center topic-author-box">
                            <a href="https://laravel-china.org/users/12404">
                                <img src="https://lccdn.phphub.org/uploads/avatars/12404_1488527639.jpeg?imageView2/1/w/100/h/100" style="width:80px; height:80px;margin:5px;" class="img-thumbnail avatar" />
                            </a>


                            <div class="media-body padding-top-sm">

                                <ul class="list-inline">



                                    <br>
                                    <li>
                                        <a href="https://github.com/jxlwqq" target="_blank" class="popover-with-html" data-content="jxlwqq">
                                            <i class="fa fa-github-alt"></i>
                                        </a>
                                    </li>
                                </ul>

                                <div class="clearfix"></div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="recommended-wrap">
                    <div class="panel panel-default corner-radius recommended-articles">
                        <div class="panel-heading text-center">
                            <h3 class="panel-title">专栏推荐</h3>
                        </div>
                        <div class="panel-body">
                            <ul class="list">
                                <li>
                                    <a href="https://laravel-china.org/articles/14917/chinese-typesetting-better-chinese-copywriting" title="chinese-typesetting：更好的中文文案排版">


                                        chinese-typesetting：更好的中文文案排版
                                    </a>
                                </li>
                                <li>
                                    <a href="https://laravel-china.org/articles/6243/build-php-development-environment-in-macos-high-sierra-1013" title="在 macOS High Sierra 10.13 搭建 PHP 开发环境">


                                        在 macOS High Sierra 10.13 搭建 PHP 开发环境
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container">
            <div class="row footer-top">

                <div class="col-sm-5 col-lg-5">

                    <p class="padding-top-xsm">我们是高品质的 Laravel 开发者社区，致力于为 Laravel 和 PHP 开发者提供一个分享创造、结识伙伴、协同互助的平台。</p>

                    <div class="text-md " >

                        <a class="popover-with-html" data-content="反馈问题" target="_blank" style="padding-right:8px" href="mailto:summer@yousails.com"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                        <a class="popover-with-html" data-content="站长微博" target="_blank" style="padding-right:8px" href="https://weibo.com/1837553744/profile?topnav=1&amp;wvr=6"><i class="fa fa-weibo" aria-hidden="true"></i></a>
                        <a class="popover-with-html" data-content="加我微信" target="_blank" style="padding-right:8px" href="https://laravel-china.org/contact"><i class="fa fa-weixin" aria-hidden="true"></i></a>
                    </div>
                    <br>
                    <span style="font-size:0.9em">
                  Designed by <span style="color: #e27575;font-size: 14px;">❤</span> <a href="https://github.com/summerblue" target="_blank" style="color:inherit">Summer</a>
              </span>
                </div>

                <div class="col-sm-6 col-lg-6 col-lg-offset-1">

                    <div class="row">
                        <div class="col-sm-4">
                            <h4>赞助商</h4>
                            <ul class="list-unstyled">
                                <a href="http://www.ucloud.cn/?utm_source=zanzhu&amp;utm_campaign=phphub&amp;utm_medium=display&amp;utm_content=yejiao&amp;ytag=phphubyejiao" target="_blank"><img src="https://lccdn.phphub.org/uploads/banners/bQawWl3vT5dc2lYx5JZ7.png" class="popover-with-html footer-sponsor-link" width="98" data-placement="top" data-content="本站服务器由 UCloud 赞助"></a>
                                <a href="http://www.qiniu.com/?utm_source=phphub" target="_blank"><img src="https://lccdn.phphub.org/uploads/banners/yGLIR0idW7zsInjsNmzr.png" class="popover-with-html footer-sponsor-link" width="98" data-placement="top" data-content="本站 CDN 服务由七牛赞助"></a>
                                <a href="https://www.upyun.com/" target="_blank"><img src="https://lccdn.phphub.org/uploads/banners/XPtLlZmIN1cQbLuDFEON.png" class="popover-with-html footer-sponsor-link" width="98" data-placement="top" data-content="Composer 镜像赞助商"></a>
                                <a href="http://www.sendcloud.net/" target="_blank"><img src="https://lccdn.phphub.org/uploads/banners/JpTCK6OKYBIrBIWdtob8.png" class="popover-with-html footer-sponsor-link" width="98" data-placement="top" data-content="订阅邮件赞助商：SendCloud"></a>
                            </ul>
                        </div>

                        <div class="col-sm-4">
                            <h4>统计信息</h4>
                            <ul class="list-unstyled">
                                <li>社区会员: 28697 </li>
                                <li>话题数: 12841 </li>
                                <li>评论数: 56645 </li>
                            </ul>
                        </div>
                        <div class="col-sm-4">
                            <h4>其他信息</h4>
                            <ul class="list-unstyled">
                                <li><a href="https://laravel-china.org/contact"><i class="fa fa-thumbs-up" aria-hidden="true"></i> 商务合作</a></li>
                                <li><a href="https://laravel-china.org/sites"><i class="fa fa-globe text-md"></i> 推荐网站</a></li>
                                <li><a href="https://laravel-china.org/docs/guide"><i class="fa fa-graduation-cap"></i> 社区指南</a></li>

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

<script src="/static/editor/js/script.js"></script>
<script src="https://cdn.bootcss.com/bootstrap-hover-dropdown/2.2.1/bootstrap-hover-dropdown.min.js"></script>
{{--<script src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>--}}

<script type="text/javascript">

    $(document).ready(function()
    {

        Config.following_users =   [] ;
        PHPHub.initAutocompleteAtUser();
    });

</script>


</body>
</html>
