<?php 

namespace app\admin\controller;

use think\Db;

use app\common\controller\AdminBase;
use app\admin\model\System;
use app\admin\model\AdminUser;

class Index extends AdminBase
{	
    protected function initialize()
    {   
        // parent::__construct();
        parent::initialize();
        $web = System::where(['name'=>'site_config'])->value('value');
        $this->assign('web',unserialize($web));
    }
	public function index()
	{
		return view('admin.index.index');
	}
	/**
	 * [webSite description]
	 * @Author   lzy
	 * @DateTime 2018-06-08T09:35:40+0800
	 * @return   [type]                   [description]
	 */
	public function webSite()
    {
        $version = Db::query('SELECT VERSION() AS ver');
        return view('admin.index.welcome', ['mysql_version' => $version[0]['ver']]);
    }
    /**
     * [siteConfig description]
     * @Author   lzy
     * @DateTime 2018-06-08T10:16:05+0800
     * @return   [type]                   [description]
     */
    public function siteConfig()
    {
        $system = System::all();
        foreach($system as $key=>$val){
            $system_value = unserialize($val['value']);
            $this->assign($val['name'],$system_value);
        }
        return view('admin.index.site_config');
    }
    /**
     * [updateConfig 更新配置]
     * @Author   lzy
     * @DateTime 2018-06-08T11:22:43+0800
     * @return   [type]                   [description]
     */
    public function updateConfig()
    {
        if ($this->request->isAjax()) {
            $model = model('System');
            $res = $model->updateConfig();
            return $res;
        }
    }
    /*修改密码*/
    public function changePassword()
    {   
        return view('admin.index.change_password');
    }
    // 更新密码
    public function updatePassword()
    {
        if ($this->request->isAjax()) {
            $data   = input('post.');
            if(true === $result = $this->validate($data,'AdminUser')){
                $model = model('AdminUser');
                $res = $model->updatePassword($data);
                return $res;
            }else{
                $this->error($result);
            }
        }
    }

}