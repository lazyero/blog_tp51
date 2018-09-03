<?php

namespace app\admin\validate;

use think\Validate;

class AdminUser extends Validate
{
    protected $rule = [
        'username|用户名'   => 'unique:admin_user',//username字段的值是否在admin_user表（不包含前缀）中唯一
        'old_password|原密码' => 'require|length:6,20|different:password',
        'password|新密码' => 'require|length:6,20|confirm:confirm_password',
        'confirm_password|新密码' => 'require',
    ];

    protected $message = [
        'password.confirm'  =>  '两次新密码输入不一致',
        'old_password.different' => '原密码和新密码不能相同',
    ];
    protected $scene = [
        'add'  =>  ['username','password','confirm_password'],
        'edit' =>  ['username','password'=>'length:6,20|requireWith:confirm_password|confirm:confirm_password','confirm_password'=>'length:6,20|requireWith:password'],
    ];
}