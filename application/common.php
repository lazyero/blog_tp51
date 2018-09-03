<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
header('content-type:text/html;charset=utf-8');
if(!function_exists('vd')){
    /**
     * [pd 传递数据以易于阅读的样式格式化后输出并终止]
     * @Author   lzy
     * @DateTime 2018-06-05T14:26:16+0800
     * @param    [type]                   $data    [description]
     * @param    boolean                  $toArray [description]
     * @return   [type]                            [description]
     */
    function vd($data, $toArray = true)
    {
        v($data, $toArray);
        die;
    }
}
if(!function_exists('v')){
    /**
     * [p 传递数据以易于阅读的样式格式化后输出]
     * @Author   lzy
     * @DateTime 2018-06-05T14:30:48+0800
     * @param    [type]                   $data [description]
     * @return   [type]                         [description]
     */
    function v($data){
        // 定义样式
        $str='<pre style="display: block;padding: 9.5px;margin: 44px 0 0 0;font-size: 13px;line-height: 1.42857;color: #333;word-break: break-all;word-wrap: break-word;background-color: #F5F5F5;border: 1px solid #CCC;border-radius: 4px;">';
        // 如果是boolean或者null直接显示文字；否则print
        if (is_bool($data)) {
            $show_data=$data ? 'true' : 'false';
        }elseif (is_null($data)) {
            $show_data='null';
        }else{
            $show_data=print_r($data,true);
        }
        $str.=$show_data;
        $str.='</pre>';
        echo $str;
    }
}
if(!function_exists('in_array_case')){
    /**
     * 不区分大小写的in_array实现
     * @param mixed $value 待搜索的值。
     * @param array $array 待搜索的数组。
     * @return boolean  如果找到则返回 TRUE，否则返回 FALSE。
     */
    function in_array_case($value,$array){
        return in_array(strtolower($value),array_map('strtolower',$array));
    }
}
if(!function_exists('list_to_tree')){
    /**
     * [list_to_tree 把返回的数据集转换成Tree]
     * @Author   lzy
     * @DateTime 2018-06-06T15:46:34+0800
     * @param    [type]                   $list  [要转换的数据集]
     * @param    string                   $pk    [description]
     * @param    string                   $pid   [parent标记字段]
     * @param    string                   $child [description]
     * @param    integer                  $root  [description]
     * @return   [type]                          [description]
     */
    function list_to_tree($list, $pk='id', $pid = 'pid', $child = '_child', $root = 0) {
        // 创建Tree
        $tree = array();
        if(is_array($list)) {
            // 创建基于主键的数组引用
            $refer = array();
            foreach ($list as $key => $data) {
                $refer[$data[$pk]] =& $list[$key];
            }
            foreach ($list as $key => $data) {
                // 判断是否存在parent
                $parentId =  $data[$pid];
                if ($root == $parentId) {
                    $tree[] =& $list[$key];
                }else{
                    if (isset($refer[$parentId])) {
                        $parent =& $refer[$parentId];
                        $parent[$child][] =& $list[$key];
                    }
                }
            }
        }
        return $tree;
    }
}

if(!function_exists('tree_list')){
    /**
     * [tree_list 递归]
     * @Author   lzy
     * @DateTime 2018-06-06T17:29:33+0800
     * @param    [type]                   $list [递归数组]
     * @param    integer                  $pid  [父层 id]
     * @return   [type]                         [description]
     */
    function tree_list($list,$pid = 0){
        $tree=array();
        if(!$list){
            return $tree;
        }else {
            foreach ($list as $value) {
                if($pid == $value['pid']){
                    $value['child'] = tree_list($list,$value['id']);
                    $tree[]=$value;
                }
            }
            return $tree;
        }
    }  
}

if(!function_exists('ajax_return')){
    /**
     * [ajax_return 用于模型中返回处理结果（验证及执行的判断）]
     * @Author   lzy
     * @DateTime 2018-06-08T11:41:34+0800
     * @param    int                     $code [返回码，1成功，0失败]
     * @param    string                  $msg  [提示语]
     * @param    string                  $url  [需跳转的url]
     * @return   string                        [返回数据]
     */
    function ajax_return($code,$msg,$url = ''){
        if ($url=='' && !is_null($_SERVER['HTTP_REFERER']) && $code==1) {   //成功时有跳转url，失败仅提示
            $url = $_SERVER['HTTP_REFERER'];
        } elseif ('' !== $url){
            $url = url($url);
        }
        $result = ['code' => $code, 'msg'  => $msg, 'url'  => $url];
        return $result;
    }
}

/**
 * 数组层级缩进转换
 * @param array $array 源数组
 * @param string $table
 * @param int $pid
 * @param int $level
 * @return array
 */
function array2level($array, $table = 'nav', $pid = 0, $level = 1)
{
    static $list = [];
    foreach ($array as $v) {
        if ($v['pid'] == $pid) {
            $v['level'] = $level;
            $son = Db::name($table)->where(['pid'=>$v['id']])->count('id');
            $son?$v['son'] = true:$v['son'] = false;
            $list[]     = $v;
            array2level($array, $table, $v['id'], $level + 1 );
        }
    }
    return $list;
}


/**
 * 上传图片到微博图床
 * @author mengkun  http://mkblog.cn
 * @param $file 图片文件/图片url
 * @param $multipart 是否采用multipart方式上传
 * @return 返回的json数据
 */
function upload_weibo($file, $multipart = true) {
    $cookie = 'SINAGLOBAL=453798998090.68646.1530610447846; _ga=GA1.2.1246350362.1531826624; __gads=ID=58bd890659e87c8b:T=1531826631:S=ALNI_MYGmGs_sRAZrEtxs6Axa4-WnBkP-A; un=15703976639; wvr=6; SUBP=0033WrSXqPxfM725Ws9jqgMF55529P9D9WhwPEafyCIS7Relr94PsAox5JpX5KMhUgL.FoeEeKnceheESo52dJLoI7UcMEfeqPD4; SCF=AleKdXfFJtbcrv9v1mj6Tos4I9LDiXHxdXwyHvRDRrMzHdUW1j2xnMa-aazfeyCugBEUhvWD2C4KeG2iD-jrosE.; SUB=_2A252XqxvDeRhGeVM6loX8C3OzTyIHXVVLZqnrDV8PUNbmtAKLRX3kW9NTNK9cIYEQk4ad1DV8rd9mZEd-jOS0Sx6; SUHB=0M2F868omBp1eS; ALF=1564217279; SSOLoginState=1532681279; TC-Ugrow-G0=968b70b7bcdc28ac97c8130dd353b55e; TC-V5-G0=06f20d05fbf5170830ff70a1e1f1bcae; TC-Page-G0=0dba63c42a7d74c1129019fa3e7e6e7c; wb_view_log_3218603260=1920*10801; _s_tentry=www.baidu.com; UOR=www.shwzzz.cn,widget.weibo.com,www.baidu.com; Apache=2764860674313.991.1532686141634; ULV=1532686141687:10:10:4:2764860674313.991.1532686141634:1532572893179';
        // 微博cookie
    $url = 'http://picupload.service.weibo.com/interface/pic_upload.php'
    .'?mime=images%2Fjpeg&data=base64&url=0&markpos=1&logo=&nick=0&marks=1&app=miniblog';
    if($multipart) {
        $url .= '&cb=http://weibo.com/aj/static/upimgback.html?_wv=5&callback=STK_ijax_'.time();
        if (class_exists('CURLFile')) {     // php 5.5
            $post['pic1'] = new CURLFile(realpath($file));
        } else {
            $post['pic1'] = '@'.realpath($file);
        }
    } else {
        $post['b64_data'] = base64_encode(file_get_contents($file));
    }
    // Curl提交
    $ch = curl_init($url);
    curl_setopt_array($ch, array(
        CURLOPT_POST => true,
        CURLOPT_VERBOSE => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => array("Cookie: $cookie"),
        CURLOPT_POSTFIELDS => $post,
    ));
    $output = curl_exec($ch);
    curl_close($ch);
    // 正则表达式提取返回结果中的json数据
    preg_match('/({.*)/i', $output, $match);
    if(!isset($match[1])) return '';
    return $match[1];
}

/** 
 * 获取图片链接(本函数修改自 https://github.com/consatan/weibo_image_uploader) 
 * 
 * @param string $pid 微博图床pid，或者微博图床链接。传递的是链接的话， 
 *     仅是将链接的尺寸更改为目标尺寸而已。 
 * @param string $size 图片尺寸 
 * @param bool $https (true) 是否使用 https 协议 
 * @return string 图片链接 
 * 当 $pid 既不是 pid 也不是合法的微博图床链接时返回空值 
 */  
function getWeiboImageUrl($pid, $size = 0, $https = true)  
{  
    $sizeArr = array('large', 'mw1024', 'mw690', 'bmiddle', 'small', 'thumb180', 'thumbnail', 'square');  
    $pid = trim($pid);  
    $size = $sizeArr[$size];  
    // 传递 pid  
    if (preg_match('/^[a-zA-Z0-9]{32}$/', $pid) === 1) {  
        return ($https ? 'https' : 'http') . '://' . ($https ? 'ws' : 'ww')  
            . ((crc32($pid) & 3) + 1) . ".sinaimg.cn/" . $size  
            . "/$pid." . ($pid[21] === 'g' ? 'gif' : 'jpg');  
    }  
    // 传递 url  
    $url = $pid;  
    $imgUrl = preg_replace_callback('/^(https?:\/\/[a-z]{2}\d\.sinaimg\.cn\/)'  
        . '(large|bmiddle|mw1024|mw690|small|square|thumb180|thumbnail)'  
        . '(\/[a-z0-9]{32}\.(jpg|gif))$/i', function ($match) use ($size) {  
            return $match[1] . $size . $match[3];  
        }, $url, -1, $count);  
    if ($count === 0) {  
        return '';  
    }  
    return $imgUrl;  
}  
