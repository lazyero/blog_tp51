<?php 

namespace app\admin\model;

use think\model\concern\SoftDelete;
/**
 * 管理员模型层
 */
class AuthGroup extends Base
{
	//在实际项目中，对数据频繁使用删除操作会导致性能问题，软删除的作用就是把数据加上删除标记，而不是真正的删除，同时也便于需要的时候进行数据的恢复。
	//要使用软删除功能，需要引入SoftDelete trait
	use softDelete;
	protected $deleteTime = 'delete_time';
	//写入和读取时会自动处理成时间字符串 Y-m-d H:i:s 格式
    protected $type = ['delete_time' => 'datetime'];

	public function _save($data)
    {
        $res = $this->allowField(['title','status'])->save($data);   //过滤非数据表字段数据
        if($res !== false){
            return ajax_return(1,'新增成功','group_index');
        }else{
            return ajax_return(0,$this->getError());
        }
    }

    public function _update($data)
    {
        $res = $this->allowField(true)->isUpdate(true)->save($data);//isUpdate(true)显式指定更新数据操作
        if($res !== false){
            return ajax_return(1,'更新成功','group_index');   //更新成功后跳转编辑前页面
        }else{
            return ajax_return(0,$this->getError());
        }
    }
    //更新权限
    public function _updateAuthGroupRule()
    {
        $data = input('post.');
        $data['rules'] = is_array($data['auth_rule_ids']) ? implode(',', $data['auth_rule_ids']) : '';
        $res = $this->allowField(true)->isUpdate(true)->save($data);//isUpdate(true)显式指定更新数据操作
        if($res !== false){
            return ajax_return(1,'更新成功','group_index');   //更新成功后跳转编辑前页面
        }else{
            return ajax_return(0,$this->getError());
        }
    }
    /**
     * 软删除操作
     * @param mixed $id 待删除列表主键
     * @param bool $force   是否真实删除
     * @return array
     */
    public function _delete($id,$force = false)
    {
        if ($id){
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