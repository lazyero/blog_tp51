<?php
namespace app\index\controller;
use app\common\controller\IndexBase;

class Index extends IndexBase
{
    public function index()
    {
        $lists = model('article')->select();
       	return view('index.index.index',['lists'=>$lists]);
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }

    public function article($id)
    {
        $data = model('article')->where('id',$id)->find();
        return view('index.index.article',['data'=>$data]);
    }
}
