<!DOCTYPE html>
<html lang="zh">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
        <title>Elasticsearch 的配置与使用，为了全文搜索 | Laravel China 社区 - 高品质的 Laravel 开发者社区
</title>
        <meta name="description" content="我们是高品质的 Laravel 开发者社区，致力于为 Laravel 和 PHP 开发者提供一个分享创造、结识伙伴、协同互助的论坛。" />
        <meta name="keywords" content="php,laravel,php论坛,laravel论坛,php社区,laravel社区,laravel教程,php教程,laravel视频,php开源,php新手,php7,laravel5" />
        <meta name="author" content="PHPHub" />

        <link href="_css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" href="_css/styles.css">

        <link rel="shortcut icon" href="https://lccdn.phphub.org/uploads/sites/KDiyAbV0hj1ytHpRTOlVpucbLebonxeX.png"/>
        <link rel="stylesheet"  href="/static/admin/js/editor/editor.css">
        
        <meta http-equiv="x-pjax-version" content="https://lccdn.phphub.org//assets/css/04bb3e8f156f327daba1-styles.css">

        <style>
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
}
a:hover, a:focus {
    color: #d6514d;
    transition: color .15s ease 0s;
}
.btn-primary {
    background-color: #f4645f;
    border-color: #f93e38;
}
.btn-primary:hover {
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

            /**********************************************************************************/

        </style>

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
                            {{ $data['title'] }}
                        </h1>

                        
                        <div class="article-meta text-center">
                            <i class="fa fa-clock-o"></i> <abbr title="{{ $data['create_time'] }}" class="timeago">2个月前</abbr>
                            ⋅
                            <i class="fa fa-eye"></i> 2774
                            ⋅
                            <i class="fa fa-thumbs-o-up"></i> 98
                            ⋅
                            <i class="fa fa-comments-o"></i> 20

                                                    </div>

                        <div class="entry-content">
                            <div class="content-body entry-content panel-body ">

    <div class="markdown-body topic-content-big-font" id="emojify">

{{ $data['content'] }}
    
    </div>

    </div>                        </div>


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

     <form method="POST" action="https://laravel-china.org/topics/10126/append" accept-charset="UTF-8">
         <input type="hidden" name="_token" value="AXw1ZNA2tM7p6Rh7Qqn3lxyiX0cvzwpi09ip0CUX">
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
                  </div>

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

                            <div class="or"></div>
                <button class="btn btn-success popover-with-html"  data-toggle="modal" data-target="#payment-qrcode-modal" data-content="如果觉得我的文章对您有用，请随意打赏。你的支持将鼓励我继续创作！<br>可以修改个人资料「支付二维码」开启打赏功能。">
                    <i class="fa fa-heart" aria-hidden="true"></i>
                    打赏
                </button>
                    </div>

        <div class="voted-users">

                            <div class="user-lists">
                                            <a href="https://laravel-china.org/users/1343" data-userId="1343">
                            <img class="img-thumbnail avatar avatar-middle" src="_picture/1343_1429250101.png" style="width:48px;height:48px;">
                        </a>
                                            <a href="https://laravel-china.org/users/7050" data-userId="7050">
                            <img class="img-thumbnail avatar avatar-middle" src="_picture/7050_1528164060.png" style="width:48px;height:48px;">
                        </a>
                                            <a href="https://laravel-china.org/users/3853" data-userId="3853">
                            <img class="img-thumbnail avatar avatar-middle" src="_picture/3853_1457586148.jpeg" style="width:48px;height:48px;">
                        </a>
                                    </div>
            
            <a class="voted-template" href="" data-userId="" style="display:none">
                <img class="img-thumbnail avatar avatar-middle" src="" style="width:48px;height:48px;">
            </a>
        </div>

    </div>
  </div>

    <div class="votes-container panel panel-default padding-md">
        <div class="panel-body">
            <div class="item">
                                    <div class="col-md-6">
                        <div class="media rm-link-color">
                          <div class="media-left">
                            <a href="https://laravel-china.org/topics/6592" style="color:inherit;" target=_blank>
                              <img class="media-object" style="border: 1px solid #ddd;box-shadow: 0 0 10px #ccc;" src="_picture/inanvvoxdnyq6jrfmdwe.png" alt="《L02 从零构建论坛系统》" width="80">
                            </a>
                          </div>
                          <div class="media-body">
                            <a class="media-heading" href="https://laravel-china.org/topics/6592" style="color:inherit;" target=_blank>
                                <h5  style="font-size:normal;font-weight:bold">《L02 从零构建论坛系统》</h5>
                            </a>

                            <span style="line-height: 22px;">以构建论坛项目 LaraBBS 为线索，展开对 Laravel 框架的全面学习。应用程序架构思路贴近 Laravel 框架的设计哲学。</span>
                          </div>
                        </div>
                    </div>
                                    <div class="col-md-6">
                        <div class="media rm-link-color">
                          <div class="media-left">
                            <a href="https://laravel-china.org/topics/13206/laravel-shop-course" style="color:inherit;" target=_blank>
                              <img class="media-object" style="border: 1px solid #ddd;box-shadow: 0 0 10px #ccc;" src="_picture/kiadszn9ycmfjyjt0dpt.jpg" alt="《L05 电商实战》" width="80">
                            </a>
                          </div>
                          <div class="media-body">
                            <a class="media-heading" href="https://laravel-china.org/topics/13206/laravel-shop-course" style="color:inherit;" target=_blank>
                                <h5  style="font-size:normal;font-weight:bold">《L05 电商实战》</h5>
                            </a>

                            <span style="line-height: 22px;">从零开发一个电商项目，功能包括电商后台、商品 &amp; SKU 管理、购物车、订单管理、支付宝支付、微信支付、订单退款流程、优惠券等</span>
                          </div>
                        </div>
                    </div>
                                <div class="clearfix"></div>
            </div>
        </div>
    </div>


    
  <!-- Reply List -->
  <div class="replies panel panel-default list-panel replies-index" id="replies">

    <div class="panel-heading">
        <div class="total">回复数量: <b>20</b> </div>

        <div class="order-links">
            <a class="btn btn-default btn-sm active popover-with-html" data-content="按照时间排序" href="https://laravel-china.org/articles/10126/the-configuration-and-use-of-elasticsearch-for-full-text-search?order_by=created_at&amp;#replies" role="button">时间</a>
            <a class="btn btn-default btn-sm  popover-with-html" data-content="按照投票排序" href="https://laravel-china.org/articles/10126/the-configuration-and-use-of-elasticsearch-for-full-text-search?order_by=vote_count&amp;#replies" role="button">投票</a>
        </div>
    </div>

    <div class="panel-body">

              <ul class="list-group row">
      <li class="list-group-item media"
                           style="margin-top: 0px;"
                      >

    <div class="avatar avatar-container pull-left">
      <a href="https://laravel-china.org/users/18090">
        <img class="media-object img-thumbnail avatar avatar-middle" alt="莫无季" src="_picture/18090_1501725593.jpg"  style="width:55px;height:55px;"/>
      </a>
          </div>

    <div class="infos">

      <div class="media-heading">

        <a href="https://laravel-china.org/users/18090" title="莫无季" class="remove-padding-left author rm-link-color">
            莫无季
        </a>

        
        
        <span class="operate pull-right">

                            <a class="comment-vote"  title="Vote Up">
                    <i class="fa fa-thumbs-o-up" style="font-size:14px;"></i> <span class="vote-count"></span>
                </a>
                <span> ⋅  </span>
            
            
            
          
          <a class="fa fa-reply" href="javascript:void(0)" onclick="replyOne('莫无季');" title="回复 莫无季"></a>
        </span>

        <div class="meta">

                          <a name="reply53074" id="reply53074" class="anchor" href="#reply53074" aria-hidden="true">#19</a>
              <span> ⋅  </span>
            
            <abbr class="timeago" title="2018-06-19 15:23:41">3周前</abbr>

                    </div>

      </div>

      <div class="media-body markdown-reply content-body">
<p><a href="https://laravel-china.org/users/10512">@Jourdon</a> 这个是给ES 加认证，我是不知道怎么把认证信息 放到请求里？ :joy: :joy:</p>
<p><img src="_picture/dhzbi34r57.png" alt="file" /><br />
建索引的时候，我是这样实现的。查询和插入等操作， 不知道怎么改造</p>
      </div>

    </div>

  </li>  
                <a name="last-reply" class="anchor" href="#last-reply" aria-hidden="true"></a>
      
      <li class="list-group-item media"
                           style="margin-top: 0px;"
                      >

    <div class="avatar avatar-container pull-left">
      <a href="https://laravel-china.org/users/18090">
        <img class="media-object img-thumbnail avatar avatar-middle" alt="莫无季" src="_picture/18090_1501725593.jpg"  style="width:55px;height:55px;"/>
      </a>
          </div>

    <div class="infos">

      <div class="media-heading">

        <a href="https://laravel-china.org/users/18090" title="莫无季" class="remove-padding-left author rm-link-color">
            莫无季
        </a>

        
        
        <span class="operate pull-right">

                            <a class="comment-vote"  title="Vote Up">
                    <i class="fa fa-thumbs-o-up" style="font-size:14px;"></i> <span class="vote-count"></span>
                </a>
                <span> ⋅  </span>
            
            
            
          
          <a class="fa fa-reply" href="javascript:void(0)" onclick="replyOne('莫无季');" title="回复 莫无季"></a>
        </span>

        <div class="meta">

                          <a name="reply53239" id="reply53239" class="anchor" href="#reply53239" aria-hidden="true">#20</a>
              <span> ⋅  </span>
            
            <abbr class="timeago" title="2018-06-20 15:42:04">3周前</abbr>

                    </div>

      </div>

      <div class="media-body markdown-reply content-body">
<p>已解决ES认证问题，修改请求地址信息即可，把用户认证信息放到URL即可。
ELASTICSEARCH_HOST=<a href="http://URL">http://user:password@URL:port</a>
joy: 其实第一天就这么试过了，没成功，估计是IP白名单之类的限制，我还以为这样不行呢。。。。。哭。。。。。
</p>
      </div>

    </div>

  </li>  
</ul>
        <div id="replies-empty-block" class="empty-block hide">暂无评论~~</div>
      
      <!-- Pager -->
      <div class="pull-right" style="padding-right:20px">
        
      </div>
    </div>
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
              <a href="https://laravel-china.org/auth/register" class="btn btn-default login-btn no-pjax">
                <i class="fa fa-user-plus"></i>
                注 册
              </a>
        </div>
    
    <div class="clearfix"></div>
    <div class="box preview markdown-reply" id="preview-box" style="display:none;border: dashed 1px #ccc;background: #ffffff;border-radius: 6px;box-shadow:none;margin-top: 20px;margin-bottom: 6px;"></div>

    </div>
  </div>
        </div>


                    <div class="modal fade" id="payment-qrcode-modal" tabindex="-1" role="" aria-labelledby="exampleModalLabel" >
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="exampleModalLabel">
            <img src="_picture/10512_1513244746.jpeg" style="width:65px; height:65px;" class="img-thumbnail avatar" />
        </h4>
      </div>

        <div class="modal-body text-center">
            <p class="text-md">
                如果觉得我的文章对您有用，请随意打赏。你的支持将鼓励我继续创作！
            </p>
            <img class="payment-qrcode" src="_picture/mkxbovqln9.png" alt="" style="width:320px;height:320px"/>
            <hr>
            <p style="color: #898989;">
                请使用微信扫描二维码。 <a href="https://laravel-china.org/topics/2487" target="_blank" style="color: #898989;text-decoration: underline;">如何开启打赏？</a>
            </p>
        </div>

    </div>
  </div>
</div>

        
        <div class="col-md-3 main-col pull-left">
            <div class="panel panel-default corner-radius">

<div class="panel-body text-center topic-author-box blog-info">

    <div class="image blog-cover">
        <a href="https://laravel-china.org/jourdon" >
            <img class=" avatar-112 avatar img-thumbnail" src="_picture/uv9jhgfxtf.png">
        </a>
    </div>
    <div class="blog-name">
        <h4><a href="https://laravel-china.org/jourdon">Jourdon的分享</a></h4>
    </div>
    <div class="blog-description">
        技术文章分享
    </div>

    <hr>

    <a href="https://laravel-china.org/jourdon" class="">
        <li class="list-group-item"><i class="text-md fa fa-list-ul"></i> &nbsp;专栏文章（6）</li>
    </a>

    
    
</div>

</div>
            <div id="sticker">

                <div class="panel panel-default corner-radius">

                  <div class="panel-heading text-center">
                    <h3 class="panel-title">作者：Jourdon</h3>
                  </div>

                    <div class="panel-body text-center topic-author-box">
                        <a href="https://laravel-china.org/users/10512">
  <img src="_picture/10512_1513244746.jpeg" style="width:80px; height:80px;margin:5px;" class="img-thumbnail avatar" />
</a>


<div class="media-body padding-top-sm">
        <div class="media-heading">

        
                    <div class="role-label text-white">
                <a class="label label-success role" href="https://laravel-china.org/roles/21">见习助教</a>
            </div>
        
        <span class="introduction">
             努力向前！
        </span>

    </div>
    
<ul class="list-inline">

  
  <li><i class="fa fa-map-marker"></i> 深圳</li>

<br>
    <li>
    <a href="https://github.com/jourdon" target="_blank" class="popover-with-html" data-content="jourdon">
      <i class="fa fa-github-alt"></i>
    </a>
  </li>
  
  
        <li class="popover-with-html" data-content="<img src='_picture/tlhccitklr.jpg' style='width:100%'>">
      <i class="fa fa-wechat"></i>
    </li>
    
  
  
    <li>
    <a href="http://qiehe.net" data-content="qiehe.net" rel="nofollow" target="_blank" class="url popover-with-html">
      <i class="fa fa-globe"></i>
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
            <a href="https://laravel-china.org/articles/12926/this-is-what-you-want-at-someones-function" title="这是你想要的 @ 某人的功能">

                
                 这是你想要的 @ 某人的功能
            </a>
        </li>
            <li>
            <a href="https://laravel-china.org/articles/10126/the-configuration-and-use-of-elasticsearch-for-full-text-search" title="Elasticsearch 的配置与使用，为了全文搜索">

                
                 Elasticsearch 的配置与使用，为了全文搜索
            </a>
        </li>
            <li>
            <a href="https://laravel-china.org/articles/9319/the-automatic-deployment-server-environment-and-use-git-to-achieve-the-local-code-automatically-synchronized-to-the-server" title="自动布署服务器环境，并利用 Git 实现本地代码自动同步到服务器！">

                
                 自动布署服务器环境，并利用 Git 实现本地代码自动同步到服务器！
            </a>
        </li>
            <li>
            <a href="https://laravel-china.org/articles/10207/slug-making-url-friendlier-my-first-extension-package" title="Slug，让 URL 更友好,我的第一个扩展包">

                
                 Slug，让 URL 更友好,我的第一个扩展包
            </a>
        </li>
            <li>
            <a href="https://laravel-china.org/articles/9377/git-log-is-not-very-good-lets-merge-commit" title="Git log 不太好看，我们来合并 commit 吧">

                
                 Git log 不太好看，我们来合并 commit 吧
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
                  <a class="popover-with-html" data-content="站长微博" target="_blank" style="padding-right:8px" href="https://weibo.com/1837553744/profile?topnav=1&wvr=6"><i class="fa fa-weibo" aria-hidden="true"></i></a>
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

        {{--<script src="_js/scripts.js"></script>--}}

        {{--<script src="_js/bootstrap-hover-dropdown.min.js"></script>--}}
        {{--<link rel="stylesheet"  href="/static/admin/js/editor/editor.css">--}}
        <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
        {{--<script src="https://cdn.bootcss.com/showdown/1.3.0/showdown.min.js"></script>--}}
        <script src="/static/Parser.js"></script>
        <script type="text/javascript">
            var content = document.getElementById('emojify').innerText;
            // var htmlcontent  = converter.makeHtml(content); //将MarkDown转为html格式的内容
            // $("#emojify").html(htmlcontent);//添加到 div 中 显示出来

            var parser = new HyperDown,
                htmlcontent = parser.makeHtml(content);
            $("#emojify").html(htmlcontent);//添加到 div 中 显示出来
        </script>
    </body>
</html>
