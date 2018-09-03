<?php
namespace app\admin\controller;

use app\common\controller\AdminBase;
use app\admin\model\AdminUser;
use app\admin\model\AuthGroup;
use app\admin\model\AuthRule;

class Sysadmin extends AdminBase
{   
    /**
     * [initialize 初始化控制器]
     * @Author   lzy
     * @DateTime 2018-06-11T19:06:03+0800
     * @return   [type]                   [无返回值]
     */
    protected function initialize()
    {   
        parent::initialize();
        $this->assign('auth_group_list',AuthGroup::all());
    }
    public function index()
    {
        return view('admin.sysadmin.index', ['admin_user_list' => AdminUser::all()]);
    }

    public function add()
    {
        return view('admin.sysadmin.add');
    }
    /**
     * [save 保存管理员]
     * @Author   lzy
     * @DateTime 2018-06-11T10:34:00+0800
     * @return   [type]                   [description]
     */
    public function save()
    {
        if ($this->request->isAjax()) {
            $data  = input('post.');
            $adminuser = AdminUser::onlyTrashed()->where(['username'=>$data['username']])->find();
            if ($adminuser) {
                $this->error('该账户已存在,您可到已删除户界面恢复账户');
            }
            if(true === $result = $this->validate($data,'AdminUser.add')){
                $model = model('AdminUser');
                return $model->_save($data);
            }else{
                $this->error($result);
            }
        }
    }

    public function edit($id)
    {
        return view('admin.sysadmin.edit', ['admin_user' => AdminUser::get($id)]);
    }
    /**
     * [update 更新管理员信息]
     * @Author   lzy
     * @DateTime 2018-06-11T12:01:13+0800
     * @return   [type]                   [description]
     */
    public function update()
    {   
        if ($this->request->isAjax()) {
            $data = input('post.');
            if(true === $result = $this->validate($data,'AdminUser.edit')){
                $model = model('AdminUser');
                return $model->_update($data);
            }else{
                $this->error($result);
            }
        }
    }   
    /**
     * [delete 软删除管理员]
     * @Author   lzy
     * @DateTime 2018-06-11T12:01:40+0800
     * @param    [type]                   $id [description]
     * @return   [type]                       [description]
     */
    public function delete($id)
    {
        if($this->request->isAjax()){
            if ($id == 1) $this->error('默认管理员不可删除');
            $model = model('AdminUser');
            return $model->_delete($id);
        }
    }
    //角色组
    public function group_index()
    {
        return view('admin.sysadmin.group_index', ['auth_group_list' => AuthGroup::all()]);
    }
    /*添加角色组*/
    public function group_add()
    {
        return view('admin.sysadmin.group_add');
    }
    //保存权限组
    public function group_save()
    {
        if ($this->request->isAjax()) {
            $data = input('post.');
            $authgroup = AuthGroup::onlyTrashed()->where(['title'=>$data['title']])->find();
            if ($authgroup) {
                $this->error('该角色已存在,您可到已删除户界面恢复账户');
            }
            if(true === $result = $this->validate($data,'AuthGroup')){
                $model = model('AuthGroup');
                return $model->_save($data);
            }else{
                $this->error($result);
            }
        }
    }
    /*编辑权限组*/
    public function group_edit($id)
    {
        return view('admin.sysadmin.group_edit', ['auth_group' => AuthGroup::get($id)]);
    }
    //更新权限组
    public function group_update()
    {
        if ($this->request->isAjax()) {
            $data = input('post.');
            if ($data['id'] == 1 && $data['status'] != 1) return ajax_return(0,'超级管理组不可禁用');
            if(true === $result = $this->validate($data,'AuthGroup')){
                $model = model('AuthGroup');
                return $model->_update($data);
            }else{
                $this->error($result);
            }
        }
    }
    //删除权限组
    public function group_delete($id)
    {
        if($this->request->isAjax()){
            if ($id == 1) $this->error('超级管理组不可删除');
            $model = model('AuthGroup');
            return $model->_delete($id);
        }
    }
    /*授权*/
    public function auth($id)
    {
        return view('admin.sysadmin.auth', ['id' => $id]);
    }
    /**
     * AJAX获取规则数据
     * @param $id
     * @return mixed
     */
    public function getJson($id)
    {
        if($this->request->isAjax()){
            $model = model('AuthRule');
            $auth_group_data = AuthGroup::get($id);
            $auth_rules      = explode(',', $auth_group_data['rules']);
            $auth_rule_list  = $model->field('id,pid,title')->order('sort desc,id')->select();
            foreach ($auth_rule_list as $key => $value) {
                in_array($value['id'], $auth_rules) && $auth_rule_list[$key]['checked'] = true;
            }
            return $auth_rule_list;
        }
    }
    /**
     * 更新权限组规则
     * @return array
     */
    public function updateAuthGroupRule()
    {
        if ($this->request->isAjax()) {
            $model = model('AuthGroup');
            return $model->_updateAuthGroupRule();
        }
    }
}