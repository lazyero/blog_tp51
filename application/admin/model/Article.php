<?php

namespace app\admin\model;

use think\model\concern\SoftDelete;

class Article extends Base
{
	//在实际项目中，对数据频繁使用删除操作会导致性能问题，软删除的作用就是把数据加上删除标记，而不是真正的删除，同时也便于需要的时候进行数据的恢复。
	//要使用软删除功能，需要引入SoftDelete trait
	use softDelete;
	protected $deleteTime = 'delete_time';
    //写入和读取时会自动处理成时间字符串 Y-m-d H:i:s 格式
    protected $type = ['delete_time' => 'datetime'];

    /**
     * 保存操作
     * @param $data     传入数据
     * @return string   结果提示
     */

    public function mSave($data)
    {
        if($this->save($data) !== false){
            return ajax_return(1,'新增成功','index');
        }else{
            return ajax_return(0,$this->getError());
        }
    }

    /**
     * 更新操作
     * @param $data     传入数据
     * @return string   结果提示
     */
    public function mUpdate($data)
    {
        if($this->allowField(true)->isUpdate(true)->save($data) !== false){
            return ajax_return(1,'更新成功');
        }else{
            return ajax_return(0,$this->getError());
        }
    }

    /**
     * 删除操作
     * @param $id           传入id
     * @param bool $force   是否是真删除（true）还是软删除（false）
     * @return string       结果提示
     */

    public function mDelete($id,$force = false)
    {
        if ($id){
//            var_dump($id,$force);die;
            $res = $this::destroy($id,$force);  //返回删除成功数（int）
            if($res){
                return ajax_return(1,'删除成功');
            }else{
                return ajax_return(0,$this->getError());
            }
        }else{
            return ajax_return(0,'请选择需要删除的项目');
        }
    }

    public function mRestore($id,$ids)
    {
        $id = $ids ? $ids : $id;
        if ($ids){
            foreach ($ids as $id) {
                $article = Article::onlyTrashed()->find($id);
                $res = $article->restore();
            }
        }else{
            $article = Article::onlyTrashed()->find($id);
            $res = $article->restore();
        }
        if($res){
            return ajax_return(1,'还原成功');
        }else{
            return ajax_return(0,'请重试');
        }
    }
}