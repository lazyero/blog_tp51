<?php
namespace app\admin\controller;

use app\common\controller\AdminBase;
use app\admin\model\Article;
use think\Request;

/**
 * 
 */
class Webarticle extends AdminBase
{
	
	protected function initialize()
	{	
	    parent::initialize();
	    $this->db = model('Article');
	    $nav = model('nav')->where(['pid'=>5])->field('id,name')->select();
        $this->assign('navs',$nav);
	}
	public function index()
	{
		$this->assign('lists', Article::All());
		return view('admin.webarticle.index');
	}
	public function add()
	{
		return view('admin.webarticle.add');
	}
	public function save(Request $request)
	{
		return $this->db->mSave($request->post());
	}

    public function edit($id)
    {
        $res = $this->db->get($id);
//        vd($id);
        return view('admin.webarticle.edit',['res'=>$res]);
	}

    public function update(Request $request)
    {
        $data = input('post.');
//        var_dump($data);die;
        return $this->db->mUpdate($data);
	}

    public function delete($id = 0,$ids = [],$force = false)
    {
        $force = (bool)$force;
        $id = $ids ? $ids : $id;
        return $this->db->mDelete($id,$force);
	}

    public function flag(Request $request,$id)
    {
        $data=$request->post();
        $data['id'] = $id;
        return $this->db->mUpdate($data);
	}

    public function rb()
    {
        $this->assign('lists', Article::onlyTrashed()->select());
        return view('admin.webarticle.rb');
    }

    public function restore($id = 0,$ids = [],$bool = false ,Article $article)
    {
        return $article->mRestore($id,$ids);
    }
    /**
     * 编辑器内嵌单独页面
     * @return \think\response\View
     */
    public function markdown()
    {
        return view('admin.markdown.index');
    }

    /**
     * markdown 中的图片上传方法
     */
    public function uploads()
    {
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            $address = upload_weibo($_FILES['file']['tmp_name']);
            $address = json_decode($address);
            $address = getWeiboImageUrl($address->data->pics->pic_1->pid);
            $arr = ['filename' => $address];
            echo json_encode($arr);
        }
    }

}