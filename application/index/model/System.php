<?php

namespace app\index\model;

use app\index\model\Base;
use think\Db;

class System extends Base
{
    public static function getValue($data)
    {
        $res = Db::name('System')->where(['name'=>$data])->value('value');
        return unserialize($res);
    }
}