<?php
namespace app\admin\validate;

use think\Validate;

class AuthGroup extends Validate
{
    protected $rule = [
        'title|用户名'   => 'require|unique:auth_group',//username字段的值是否在admin_user表（不包含前缀）中唯一
    ];
}