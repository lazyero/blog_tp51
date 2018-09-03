<?php
/**
 * Created by PhpStorm.
 * User: lzy
 * Date: 2018/8/9
 * Time: 17:20
 */

namespace app\admin\controller;

use app\common\controller\AdminBase;
use think\Db;
use think\facade\App;
class Database extends AdminBase
{
    public $config;
    public function index()
    {
        $list = glob(App::getRootPath().'public/uploads/sql/*.sql');
        return view('admin.database.index',['list'=>array_reverse($list)]);//顺序反转
    }
    public function download()
    {
        $download =  new \think\response\Download('image.jpg');
        return $download->name('my.jpg');
        // 或者使用助手函数完成相同的功能
        // download是系统封装的一个助手函数
//        return download('image.jpg', 'my.jpg');
    }

    public function bf()
    {
        if($this->request->isAjax()){
            $path = App::getRootPath().'public/uploads/sql/';
            @mkdir($path,0777);
            $database = config('database.database');
            $info = "-- ----------------------------\r\n";
            $info .= "-- 日期：".date("Y-m-d H:i:s")."\r\n";
            $info .= "-- MySQL - ".Db::query('SELECT VERSION() AS ver')[0]['ver']."-MariaDB : Database - ".$database."\r\n";
            $info .= "-- ----------------------------\r\n\r\n";
            $info .= "CREATE DATAbase IF NOT EXISTS `".$database."` DEFAULT CHARACTER SET utf8 ;\r\n\r\n";
            $info .= "USE `".$database."`;\r\n\r\n";

            $file_name = $path.date("YmdHis").'.sql';
            file_put_contents($file_name,$info,FILE_APPEND);//FILE_APPEND文件中追加数据信息

            //查询数据库的所有表
            $result = Db::query('show tables');
            foreach ($result as $k=>$v) {
                //查询表结构
                $val = $v['Tables_in_'.$database];
                $sql_table = "show create table ".$val;
                $res = Db::query($sql_table);
                //print_r($res);exit;
                $info_table = "-- ----------------------------\r\n";
                $info_table .= "-- Table structure for `".$val."`\r\n";
                $info_table .= "-- ----------------------------\r\n\r\n";
                $info_table .= "DROP TABLE IF EXISTS `".$val."`;\r\n\r\n";
                $info_table .= $res[0]['Create Table'].";\r\n\r\n";
                //查询表数据
                $info_table .= "-- ----------------------------\r\n";
                $info_table .= "-- Data for the table `".$val."`\r\n";
                $info_table .= "-- ----------------------------\r\n\r\n";
                file_put_contents($file_name,$info_table,FILE_APPEND);
                $sql_data = "select * from ".$val;
                $data = Db::query($sql_data);
                $count= count($data);
                if($count<1) continue;
                foreach ($data as $key => $value){
                    $sqlStr = "INSERT INTO `".$val."` VALUES (";
                    //需要特别注意对数据的单引号进行转义处理,NULL值无需单引号
                    foreach($value as $v_d){
                        if($v_d === NULL){
                            $sqlStr .= "NULL, ";
                        }else{
                            $v_d = str_replace("'","\'",$v_d);
                            $sqlStr .= "'".$v_d."', ";
                        }
                    }
                    //去掉最后一个逗号和空格
                    $sqlStr = substr($sqlStr,0,strlen($sqlStr)-2);
                    $sqlStr .= ");\r\n";
                    file_put_contents($file_name,$sqlStr,FILE_APPEND);
                }
                $info = "\r\n";
                file_put_contents($file_name,$info,FILE_APPEND);
            }
            $this->success('数据备份完成');
        }
    }
    public function hy($fname){
        if($this->request->isAjax()){
            $this->config = config('database');
            try{
                $mm = new \PDO("{$this->config['type']}:host={$this->config['hostname']};port={$this->config['hostport']};dbname={$this->config['database']};",
                    $this->config['username'],
                    $this->config['password'],
                    array(
                        \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES {$this->config['charset']};",
                        \PDO::ATTR_ERRMODE =>  \PDO::ERRMODE_EXCEPTION,
                        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
                    ));
            }catch (\PDOException $e) {
                $this->error($e->getMessage());
            }
            if (file_exists($fname)) {
                $sql=file_get_contents($fname);
                $sql = explode("\r\n", $sql);
                $sql = array_filter($sql, function ($data) {
                    if (empty($data) || preg_match('/^--.*/', $data)) {
                        return false;
                    } else {
                        return true;
                    }
                });
                $sql = implode('', $sql);
                //删除/**/注释
                $sql = preg_replace('/\/\*.*\*\//', '', $sql);
                $mm->exec($sql);
                $this->success("操作完毕");
            }else{
                $this->error('MySQL备份文件不存在');
            }
        }
    }
    public function delete($path)
    {
        if($this->request->isAjax()){
            if(!$path) $this->error('参数异常');
            if(@unlink($path)){
                $this->success('删除成功');
            }else{
                $this->error('删除失败');
            }
        }
    }
}