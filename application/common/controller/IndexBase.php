<?php
/*前台父级控制器*/
namespace app\common\controller;
use think\Controller;

class IndexBase extends Controller
{
	protected $web;
	protected function initialize()
    {
        parent::initialize();
        //获取网站配置信息
        $this->web = model('system')->getValue('site_config');
        $nav = $this->getMenu(1);//导航
        $this->assign([
        	'web'=>$this->web,
            'nav'=>$nav,
        ]);
        // vd($nav);
    }
    protected function getMenu($nav_cid)
    {
        $menu = model('nav')->where(['nav_cid' => $nav_cid,'status' => 1])->whereOr(['id' => $nav_cid])->order(['sort' => 'DESC', 'id' => 'ASC'])->select()->toArray();
        $menu = !empty($menu) ? list_to_tree($menu,'id','pid','child') : [];
        return $menu;
    }
}