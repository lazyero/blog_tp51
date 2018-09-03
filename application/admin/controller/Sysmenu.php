<?php
namespace app\admin\controller;

use app\common\controller\AdminBase;
use app\admin\model\AuthRule;

class Sysmenu extends AdminBase
{   
    protected function initialize()
    {   
        parent::initialize();
        $this->db = model('AuthRule');
        $this->assign('admin_menu_level_list', model('AuthRule')->getAll());
    }

    public function index()
    {
        return view('admin.sysmenu.index');
    }

    public function add($pid = '')
    {
        return view('admin.sysmenu.add',['pid' => $pid]);
    }

    /**
     * 保存菜单
     */
    public function save()
    {
        if ($this->request->isAjax()) {
            $data = input('post.');
            if(true === $result = $this->validate($data,'AuthRule')){
                return $this->db->_save($data);
            }else{
                $this->error($result);
            }
        }
    }

    public function edit($id)
    {   
        return view('admin.sysmenu.edit', ['admin_menu' => AuthRule::get($id)]);
    }

    public function update()
    {
        if ($this->request->isAjax()) {
            $data = input('post.');
            if(true === $result = $this->validate($data,'AuthRule')){
                return $this->db->_update($data);
            }else{
                $this->error($result);
            }
        }
    }

    public function setStatus($id)
    {
        if ($this->request->isAjax()) {
            if ($this->db->allowField('status,sort')->save(input('post.'),['id'=>$id]) !== false) {
                $this->success('更新成功');
            } else {
                $this->error($this->db->getError());
            }
        }
    }

    public function delete($id)
    {
        if ($this->request->isAjax()) {
            return $this->db->_delete($id);
        }
    }
}