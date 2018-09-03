<?php
namespace app\api\controller;

use think\Controller;
use think\facade\App;
use think\Session;
use app\admin\model\System;

/**
 * 通用上传接口
 * Class Upload
 * @package app\api\controller
 */
class Image extends Controller
{
    protected function initialize()
    {
        parent::initialize();
    }
    /**
     * 通用图片上传接口
     * @return \think\response\Json
     */
    public function upload()
    {
        $config = [
            'size' => 20971520,
            'ext'  => 'jpg,gif,png,jpeg,bmp'
        ];
        $file = $this->request->file('file');
        $maxWidth = input('max_width');     $maxHeight = input('max_height');   $path = input('path','images').'/';
        if($file){
            $upload_path = str_replace('\\', '/', App::getRootPath() . 'public/uploads/'.$path);
            $save_path   = '/uploads/'.$path;
            $info        = $file->validate($config)->move($upload_path);
//            var_dump($info);die;
            if ($info) {
                $url = str_replace('\\', '/', $save_path . $info->getSaveName());
                $result = $this->resizeImage('.'.$url,$maxWidth,$maxHeight);
            } else {
                $result = ['error' => 1, 'message' => $file->getError()];
            }
            exit(json_encode($result));//text/html，用于解决ie浏览器上传后弹出下载框
            //return json($result);//json数据
        }
    }
    public function admin_img()
    {
        $config = [
            'size' => 100000,
        ];
        $file = $this->request->file('file');

        if($file){
            $upload_path = str_replace('\\', '/', App::getAppPath() . 'uploads/images/');

            $save_path   = '/uploads/images/';
            $info        = $file->validate($config)->move($upload_path);

            if ($info) {    //上传成功后写入数据库
                $url = str_replace('\\', '/', $save_path . $info->getSaveName());
                if(db('admin_user')->where(['id'=>session('admin_id')])->update(['img'=>$url]) === false){
                    $result = ['error' => 1,'message' =>'请重试'];
                }else{
                    session('admin_img',$url);
                    $result = ['error' => 0,'url' =>$url];
                }
            } else {
                $result = [
                    'error'   => 1,
                    'message' => $file->getError()
                ];
            }
            exit(json_encode($result));//text/html，用于解决ie浏览器上传后弹出下载框
            //return json($result);//json数据
        }
    }

    /**
     * 根据尺寸压缩图片
     * @param $url //图片的相对路径
     * @param $maxWidth //设置图片的最大宽度
     * @param $maxheight //设置图片的最大高度
     * @return array //图片压缩后路径
     */
    public function resizeImage($url,$maxWidth,$maxHeight)
    {
        $system = new System();
        $web = $system->getValue('site_config');
        if($web['img_resize']=='on'){   //开启图片压缩后，上传后调整图片大小
            if(!extension_loaded('gd')){
                return ['error' => 1,'message' => '请开启gd扩展'];
            }
            /*if($maxWidth<1 || $maxheight<1){
                return ['error' => 1,'message' => '请设置图片最大宽高']; //ie10以下获取不到传参
            }*/
            //$file_name = substr($url,strripos($url,"/")+1);
            //$filetype = strtolower(substr($file_name,strripos($file_name,".")+1));  //后缀名
            //$name = substr($url,0,strrpos($url,".")).'_resize.';   //不含后缀的文件名
            $name = $url;//$name.$filetype;
            //1 = GIF，2 = JPG，3 = PNG，6 = BMP，15 = WBMP，16 = XBM。
            $type = getimagesize($url)[2];   //图片的类型，即使修改后缀
            switch ($type){
                case 1:
                    $im = imagecreatefromgif($url);
                    break;
                case 2:
                    $im = imagecreatefromjpeg($url);
                    break;
                case 3:
                    $im = imagecreatefrompng($url);
                    break;
                case 15:
                    $im = imagecreatefromwbmp($url);
                    break;
                case 6:
                    $im = $this->imagecreatefrombmp($url);
                    break;
            }

            $pic_width = imagesx($im);
            $pic_height = imagesy($im);
            //开启推荐尺寸等比缩小，并且宽高有任一大于推荐尺寸才进行缩小
            if($web['img_resize_opt']==2 && (($maxWidth && $pic_width > $maxWidth) || ($maxHeight && $pic_height > $maxHeight)))
            {
                if($maxWidth && $pic_width>$maxWidth)
                {
                    $widthratio = $maxWidth/$pic_width;
                    $resizewidth_tag = true;
                }

                if($maxHeight && $pic_height>$maxHeight)
                {
                    $heightratio = $maxHeight/$pic_height;
                    $resizeheight_tag = true;
                }

                if($resizewidth_tag && $resizeheight_tag)
                {
                    if($widthratio<$heightratio)
                        $ratio = $widthratio;
                    else
                        $ratio = $heightratio;
                }

                if($resizewidth_tag && !$resizeheight_tag)
                    $ratio = $widthratio;
                if($resizeheight_tag && !$resizewidth_tag)
                    $ratio = $heightratio;

                $newwidth = $pic_width * $ratio;
                $newheight = $pic_height * $ratio;

                if(function_exists("imagecopyresampled"))
                {
                    $newim = imagecreatetruecolor($newwidth,$newheight);
                    imagecopyresampled($newim,$im,0,0,0,0,$newwidth,$newheight,$pic_width,$pic_height);//PHP系统函数
                }
                else
                {
                    $newim = imagecreate($newwidth,$newheight);
                    imagecopyresized($newim,$im,0,0,0,0,$newwidth,$newheight,$pic_width,$pic_height);
                }

                switch ($type){
                    case 1:
                        imagegif($newim,$name);
                        break;
                    case 2:
                        imagejpeg($newim,$name);
                        break;
                    case 3:
                        imagepng($newim,$name);
                        break;
                    case 15:
                        imagewbmp($newim,$name);
                        break;
                    default:
                        imagejpeg($newim,$name);
                        break;
                }
                imagedestroy($newim);
            }
            else
            {//仅压缩图片
                switch ($type){
                    case 2:
                        imagejpeg($im,$name);
                        break;
                    case 3:
                        imagepng($im,$name);
                        break;
                    case 15:
                        imagewbmp($im,$name);
                        break;
                    default:
                        imagejpeg($im,$name);
                        break;
                }
            }
            if(is_file($name)){
                return ['error' => 0,'url' => ltrim($name,'.')];
            }
        }
        //未开启图片压缩、压缩后无图片，等原因返回原图路径
        return ['error' => 0,'url' => ltrim($url,'.')];
    }
    /**
     * BMP imagecreatefrombmp函数需php7.2，创建函数
     * @param string $filename path of bmp file
     * @return resource of GD
     */
    public function imagecreatefrombmp( $filename )
    {
        if ( !$f1 = fopen( $filename, "rb" ) )
            return FALSE;

        $FILE = unpack( "vfile_type/Vfile_size/Vreserved/Vbitmap_offset", fread( $f1, 14 ) );
        if ( $FILE['file_type'] != 19778 )
            return FALSE;

        $BMP = unpack( 'Vheader_size/Vwidth/Vheight/vplanes/vbits_per_pixel' . '/Vcompression/Vsize_bitmap/Vhoriz_resolution' . '/Vvert_resolution/Vcolors_used/Vcolors_important', fread( $f1, 40 ) );
        $BMP['colors'] = pow( 2, $BMP['bits_per_pixel'] );
        if ( $BMP['size_bitmap'] == 0 )
            $BMP['size_bitmap'] = $FILE['file_size'] - $FILE['bitmap_offset'];
        $BMP['bytes_per_pixel'] = $BMP['bits_per_pixel'] / 8;
        $BMP['bytes_per_pixel2'] = ceil( $BMP['bytes_per_pixel'] );
        $BMP['decal'] = ($BMP['width'] * $BMP['bytes_per_pixel'] / 4);
        $BMP['decal'] -= floor( $BMP['width'] * $BMP['bytes_per_pixel'] / 4 );
        $BMP['decal'] = 4 - (4 * $BMP['decal']);
        if ( $BMP['decal'] == 4 )
            $BMP['decal'] = 0;

        $PALETTE = array();
        if ( $BMP['colors'] < 16777216 ){
            $PALETTE = unpack( 'V' . $BMP['colors'], fread( $f1, $BMP['colors'] * 4 ) );
        }

        $IMG = fread( $f1, $BMP['size_bitmap'] );
        $VIDE = chr( 0 );

        $res = imagecreatetruecolor( $BMP['width'], $BMP['height'] );
        $P = 0;
        $Y = $BMP['height'] - 1;
        while( $Y >= 0 ){
            $X = 0;
            while( $X < $BMP['width'] ){
                if ( $BMP['bits_per_pixel'] == 32 ){
                    $COLOR = unpack( "V", substr( $IMG, $P, 3 ) );
                    $B = ord(substr($IMG, $P,1));
                    $G = ord(substr($IMG, $P+1,1));
                    $R = ord(substr($IMG, $P+2,1));
                    $color = imagecolorexact( $res, $R, $G, $B );
                    if ( $color == -1 )
                        $color = imagecolorallocate( $res, $R, $G, $B );
                    $COLOR[0] = $R*256*256+$G*256+$B;
                    $COLOR[1] = $color;
                }elseif ( $BMP['bits_per_pixel'] == 24 )
                    $COLOR = unpack( "V", substr( $IMG, $P, 3 ) . $VIDE );
                elseif ( $BMP['bits_per_pixel'] == 16 ){
                    $COLOR = unpack( "n", substr( $IMG, $P, 2 ) );
                    $COLOR[1] = $PALETTE[$COLOR[1] + 1];
                }elseif ( $BMP['bits_per_pixel'] == 8 ){
                    $COLOR = unpack( "n", $VIDE . substr( $IMG, $P, 1 ) );
                    $COLOR[1] = $PALETTE[$COLOR[1] + 1];
                }elseif ( $BMP['bits_per_pixel'] == 4 ){
                    $COLOR = unpack( "n", $VIDE . substr( $IMG, floor( $P ), 1 ) );
                    if ( ($P * 2) % 2 == 0 )
                        $COLOR[1] = ($COLOR[1] >> 4);
                    else
                        $COLOR[1] = ($COLOR[1] & 0x0F);
                    $COLOR[1] = $PALETTE[$COLOR[1] + 1];
                }elseif ( $BMP['bits_per_pixel'] == 1 ){
                    $COLOR = unpack( "n", $VIDE . substr( $IMG, floor( $P ), 1 ) );
                    if ( ($P * 8) % 8 == 0 )
                        $COLOR[1] = $COLOR[1] >> 7;
                    elseif ( ($P * 8) % 8 == 1 )
                        $COLOR[1] = ($COLOR[1] & 0x40) >> 6;
                    elseif ( ($P * 8) % 8 == 2 )
                        $COLOR[1] = ($COLOR[1] & 0x20) >> 5;
                    elseif ( ($P * 8) % 8 == 3 )
                        $COLOR[1] = ($COLOR[1] & 0x10) >> 4;
                    elseif ( ($P * 8) % 8 == 4 )
                        $COLOR[1] = ($COLOR[1] & 0x8) >> 3;
                    elseif ( ($P * 8) % 8 == 5 )
                        $COLOR[1] = ($COLOR[1] & 0x4) >> 2;
                    elseif ( ($P * 8) % 8 == 6 )
                        $COLOR[1] = ($COLOR[1] & 0x2) >> 1;
                    elseif ( ($P * 8) % 8 == 7 )
                        $COLOR[1] = ($COLOR[1] & 0x1);
                    $COLOR[1] = $PALETTE[$COLOR[1] + 1];
                }else
                    return FALSE;
                imagesetpixel( $res, $X, $Y, $COLOR[1] );
                $X++;
                $P += $BMP['bytes_per_pixel'];
            }
            $Y--;
            $P += $BMP['decal'];
        }
        fclose( $f1 );

        return $res;
    }
}