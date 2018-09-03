
@include('admin.public.head')

<style>a{color: #337ab7;}</style>
<div class="row system" style="width:100%;">
   <div class="l_div" style="width: 46.5%;float: left;">
       <table class="layui-table larry-table-info">
           <colgroup>
               <col width="150">
               <col>
           </colgroup>
           <tbody>
           <tr>
               <td><span class="tit">欢迎:</span></td>
               <td><span class="info iframe">{{ $web['site_title'] }}</span></td>
           </tr>
           <tr>
               <td><span class="tit">服务器操作系统:</span></td>
               <td>{{ PHP_OS }}</td>
           </tr>
           <tr>
               <td><span class="tit">网站域名:</span></td>
               <td><span class="info"><a href="http://{{ $_SERVER['HTTP_HOST'] }}" class="official" target="_blank">http://{{ $_SERVER['HTTP_HOST'] }}</a></span></td>
           </tr>
           <tr>
               <td><span class="tit">服务器端口:</span></td>
               <td>{{ $_SERVER['SERVER_PORT'] }}</td>
           </tr>
           <tr>
               <td><span class="tit">网站目录:</span></td>
               <td>{{ $_SERVER['DOCUMENT_ROOT'] }}</td>
           </tr>
           <tr>
               <td><span class="tit">服务器环境:</span></td>
               <td>{{ $_SERVER['SERVER_SOFTWARE'] }}</td>
           </tr>
           <tr>
               <td><span class="tit">PHP版本:</span></td>
               <td>{{ PHP_VERSION }}</td>
           </tr>
           <tr>
               <td><span class="tit">MySQL版本:</span></td>
               <td>{{ $mysql_version }}</td>
           </tr>
           <tr>
               <td><span class="tit">最大上传限制:</span></td>
               <td>{{ ini_get('upload_max_filesize') }}</td>
           </tr>
           </tbody>
       </table>
    </div>
    <div class="r_div" style="width: 52.5%;float: right;">
        <table class="layui-table larry-table-info">
            <colgroup>
                <col width="150">
                <col>
            </colgroup>
            <tbody>
            <tr>
                <td><span class="tit">系统名称:</span></td>
                <td><a href="http://www.huisheng.com" title="上海回声网络科技" class="tit" target="_blank"><span class="info">上海回声网络后台管理系统</span></a></td>
            </tr>
            <tr>
                <td><span class="tit">系统官网:</span></td>
                <td><a href="http://www.huisheng.com" title="上海回声网络科技" class="tit" target="_blank"><span class="info">www.huisheng.com</span></a></td>
            </tr>
            <tr>
                <td><span class="tit">服务领域:</span></td>
                <td><a href="http://www.huisheng.com/service" title="上海回声网络科技" class="tit" target="_blank"><span class="info">上海回声服务领域</span></a></td>
            </tr>
            <tr>
                <td><span class="tit">案例:</span></td>
                <td><a href="http://www.huisheng.com/case" target="_blank">成功案例</a></td>
            </tr>
            <tr>
                <td><span class="tit">系统版本:</span></td>
                <td><div id="version">3.6</div></td>
            </tr>
            <tr>
                <td><span class="tit">PHP版本要求:</span></td>
                <td>>php5.5 + </td>
            </tr>

            <tr>
                <td><span class="tit">技术团队:</span></td>
                <td><a href="http://www.huisheng.com/about" target="_blank">{{ $web['site_title'] }}项目组</a></td>
            </tr>
            <tr>
                <td><span class="tit">联系我们:</span></td>
                <td><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=2881375700&site=qq&menu=yes"><img border="0" src="_images/counseling_style_52.png"  alt="[上海回声网络]网站/微信/APP" title="[上海回声网络]网站/微信/APP"/></a></td>
            </tr>
            <tr style="display: none;">
                <td><span class="tit">回声公告:</span></td>
                <td><div id="notice"></div></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

@include('admin.public.js')

<script>
    $(function(){
        $.ajax({
            type: "get",
            dataType: "jsonp",
            url: 'http://www.huisheng.com/service/admin',
            success: function (data) {
                if(data.title){
                    var html = '<a href="'+data.url+'" target="_blank">'+data.title+'</a>';
                    $('#notice').parent().parent().show();
                    $("#notice").html(html);
                }
            }
        });
    });
</script>
