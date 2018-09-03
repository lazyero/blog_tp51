<?php 

namespace app\admin\controller;

use app\common\controller\AdminBase;

use app\admin\model\AdminUser;
use app\admin\model\AuthGroup;
/**
 * 
 */


class Syslogin extends AdminBase
{
	protected function initialize()
	{
	    
	}
	/**
	 * [login description]
	 * @Author   lzy
	 * @DateTime 2018-06-05T15:20:42+0800
	 * @return   [type]                   [description]
	 */
	public function login()
	{	
		if (request()->isAjax()) {
			$name = input('post.username');
			$password = input('post.password');
			$captcha = input('post.captcha');
			//验证验证码
			if (!captcha_check($captcha)) $this->error('验证码错误或过期');
			//实例化用户类模型
			$model = model('AdminUser');
			//获取账户信息
			$user_data =  $model->get(['username'=>$name]);
			if ($user_data) {
				//验证密码
				if (!password_verify($password,$user_data->password)) $this->error('密码错误');
				//验证用户状态
				if ($user_data->status != 1) $this->error('当前用户已禁用');
				//验证用户组状态
				if (model('AuthGroup')->where(['id'=>$user_data->group_id])->value('status') == 0) $this->error('当前用户组已禁用');
				//session赋值
				session('admin_id',$user_data->id);
				session('admin_name',$user_data->username);
				session('group_id',$user_data->group_id);
				session('admin_img',$user_data->img);
				//更新用户信息
				$model->save(['last_login_time'=>date('Y-m-d H:i:s'),'last_login_ip'=>request()->ip()],['id'=>$user_data->id]);
				$this->success('登陆成功','index/index');
			}else{
				$this->error('用户名错误');
			}
		}else{
			if (session('admin_id')) $this->redirect('index/index');
			return view('admin.syslogin.login');
		}
	}
    /**
     * [logout 退出登录]
     * @Author   lzy
     * @DateTime 2018-06-08T12:01:34+0800
     * @return   [type]                   [description]
     */
    public function logout()
    {
        session('admin_id',null);
        session('group_id',null);
        session('admin_name',null);
        session('admin_img',null);
        $this->success('退出成功', 'Syslogin/login');
    }

}