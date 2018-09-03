<?php
namespace app\admin\controller;

use app\common\controller\AdminBase;
use app\admin\model\Nav;

class Webnav extends AdminBase
{

    protected function initialize()
    {
        parent::initialize();
        $this->db = model('Nav');
        $navcat_list = $this->db->where(['pid'=>0])->order('sort','id')->column(['id','name']);
        $this->assign('navcat_list',$navcat_list);
        $nav_cid = input('nav_cid');//array_keys($navcat_list)[0]
        if ($nav_cid) {
            $where1['id']  = $nav_cid;
            $where2['nav_cid'] = $this->db->where(['id'=> $nav_cid])->value('id');
        }else{
            $where1 = true;  
            $where2 = true;
        }
        $nav_list   = $this->db->where($where2)->whereOr($where1)->order(['sort','id'])->select();
        $nav_level_list = array2level($nav_list);
        $this->assign('nav_level_list',$nav_level_list);
        $this->assign('nav_cid',$nav_cid);
    }

    public function index()
    {   
        return view('admin.webnav.index');
    }

    public function add($pid = '',$nav_cid = '')
    {   

        return view('admin.webnav.add',['pid' => $pid,'nav_cid' => $nav_cid]);
    }

    public function save()
    {
        if ($this->request->isAjax()) {
            $data = request()->except('content','post');//排除content，接收post值
            $data['content'] = $_POST['content'];
            if(true === $result = $this->validate($data,'Nav')){
                return $this->db->_save($data);
            }else{
                $this->error($result);
            }   
        }
    }

    public function edit($id)
    {   
        return view('admin.webnav.edit', ['nav' => Nav::get($id)]);
    }

    public function update()
    {
        if ($this->request->isAjax()) {
            $data = request()->except('content','post');//排除content，接收post值
            $data['content'] = $_POST['content'];
            if(true === $result = $this->validate($data,'Nav')){
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
                $this->error($m->getError());
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