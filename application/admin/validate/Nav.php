<?php

namespace app\admin\validate;

use think\Validate;

class Nav extends Validate
{
    protected $rule = [
        'name|菜单名称'   => 'require',//username字段的值是否在admin_user表（不包含前缀）中唯一
        'sort|排序' => 'number',
    ];
}