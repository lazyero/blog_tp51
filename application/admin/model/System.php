<?php

namespace app\admin\model;

class System extends Base
{
    public static function getValue($data)
    {
        $res = db('System')->where(['name'=>$data])->value('value');
        return unserialize($res);
    }

    public function updateConfig()
    {
        $config_type = input('post.config_type');
        switch ($config_type){
            case 'site_config': //站点配置
                $site_config   = input('post.site_config/a');
                //$site_config['site_tongji'] = htmlspecialchars_decode($site_config['site_tongji'],ENT_QUOTES);//反转转义字符
                $data['value'] = serialize($site_config);
                break;
            default:
                $data['value'] = serialize(input($config_type.'/a'));
                break;
        }
        if($this->where(['name'=>$config_type])->count() > 0){
            if($this->save($data,['name'=>$config_type]) !== false){
                return ajax_return(1,'提交成功');
            }else{
                return ajax_return(0,'提交失败');
            }
        }else{
            $data['name'] = $config_type;
            if($this->save($data) !== false){
                return ajax_return(1,'提交成功');
            }else{
                return ajax_return(0,'提交失败');
            }
        }
    }
}