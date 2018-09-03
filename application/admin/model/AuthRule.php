<?php

namespace app\admin\model;

use think\model\concern\SoftDelete;

class AuthRule extends Base
{
    use SoftDelete; //软删除功能，实际项目中对数据频繁使用删除操作会导致性能问题
    protected $deleteTime = 'delete_time';  //软删除字段,ThinkPHP5的软删除功能使用时间戳类型（数据表默认值为Null）
    protected $type = ['delete_time'  =>  'datetime'];  //写入和读取数据的时候都会自动处理成时间字符串Y-m-d H:i:s的格式。

    // public static function getAll()
    // {
    //     $list = $this->order(['sort' => 'DESC', 'id' => 'ASC'])->select();
    //     return array2level($list,'auth_rule');
    // }
    public function getAll()
    {
        $list = $this->order(['sort' => 'DESC', 'id' => 'ASC'])->select();
        return array2level($list,'auth_rule');
    }
    /**
     * [_save description]
     * @Author   lzy
     * @DateTime 2018-06-21T13:48:53+0800
     * @return   [type]                   [description]
     */
    public function _save($data)
    {
//        $data['id'] = $this->max('id')+1;
        if($this->allowField(true)->save($data) !== false){
            return ajax_return(1,'新增成功','index');
        }else{
            return ajax_return(0,$this->getError());
        }
    }
    /**
     * [_update description]
     * @Author   lzy
     * @DateTime 2018-06-21T14:06:47+0800
     * @param    [type]                   $data [description]
     * @return   [type]                         [description]
     */
    public function _update($data)
    {
        if ($this->allowField(true)->isUpdate(true)->save($data) !== false) {
            return ajax_return(1,'更新成功','index');
        } else {
            return ajax_return(0,$this->getError());
        }
    }
    /**
     * [_delete description]
     * @Author   lzy
     * @DateTime 2018-06-21T14:06:52+0800
     * @param    [type]                   $id    [description]
     * @param    boolean                  $force [description]
     * @return   [type]                          [description]
     */
    public function _delete($id,$force = false)
    {
        if ($id){
            if($this->where(['pid'=>$id])->count() > 0) return ajax_return(0,'此菜单下存在子菜单，不可删除');
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

}