<?php 

namespace app\admin\model;

use think\model\concern\SoftDelete;
/**
 * 管理员模型层
 */
class AdminUser extends Base
{
	//在实际项目中，对数据频繁使用删除操作会导致性能问题，软删除的作用就是把数据加上删除标记，而不是真正的删除，同时也便于需要的时候进行数据的恢复。
	//要使用软删除功能，需要引入SoftDelete trait
	use softDelete;
	protected $deleteTime = 'delete_time';

	//修改器 密码在使用save保存时自动加密  此 hsah加密依赖 think-helper
	/**
	 * [setPasswordAttr description]
	 * @Author   lzy
	 * @DateTime 2018-06-05T16:43:42+0800
	 * @param    [type]                   $value [description]
	 */
	public function setPasswordAttr($value)
	{
		return password_hash($value,PASSWORD_DEFAULT);
	}
	/**
	 * updatePassword 当前账号修改密码
	 * @Author   lzy
	 * @DateTime 2018-06-08T14:15:18+0800
	 * @param    [type]                   $data [description]
	 * @return   [type]                         [description]
	 */
	public function updatePassword($data)
    {
        $admin_id    = session('admin_id');//当前账号id
        $res = $this->where(['id'=>$admin_id])->value('password');  //当前密码
        if(password_verify($data['old_password'],$res)){
            if($this->save(['password'=>$data['password']],['id'=>$admin_id]) !== false){   //修改器自动加密
                return ajax_return(1,'修改成功,请重新登录','syslogin/logout');
            }else{
                return ajax_return(0,'修改失败,请重试');
            }
        }else {
            return ajax_return(0,'原密码不正确');
        }
    }
    /**
     * _save 新增管理员
     * @Author   lzy
     * @DateTime 2018-06-11T10:21:41+0800
     * @return   [type]                   [description]
     */
    public function _save($data)
    {
        if($this->save($data) !== false){
            return ajax_return(1,'新增成功','index');
        }else{
            return ajax_return(0,$this->getError());
        }
    }
    /**
     * _update 更新管理员信息
     * @Author   lzy
     * @DateTime 2018-06-11T11:28:17+0800
     * @return   [type]                   [description]
     */
    public function _update($data)
    {
        if($data['password'] && $data['confirm_password']){
            $filed = ['username','status','name','group_id','password'];
        }else{
            $filed = ['username','status','name','group_id'];
        }
        if($this->allowField($filed)->isUpdate(true)->save($data) !== false){
            return ajax_return(1,'更新成功','index');
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