<?php

namespace app\admin\validate;

use think\Validate;

class AuthRule extends Validate
{
    protected $rule = [
        'title|菜单名称'   => 'require',//username字段的值是否在admin_user表（不包含前缀）中唯一
        'icon|图标' => 'alphaDash',
        'sort|排序' => 'number',
    ];
}