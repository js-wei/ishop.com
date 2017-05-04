<?php
namespace Home\Controller;
use Think\Controller;

class PublicController extends Controller{
	
	/**
     * [logout 退出登录]
     * @return [type] [description]
     */
    public function logout(){
        Session('_id',null);
        Session('_name',null);
        Session('logined',null);
        $this->ajaxReturn(['status'=>1,'msg'=>'退出成功','redirect'=>U('/shop')]);
    }
	
	/**
     * 验证码生成
     */
    public function verify(){
        $verify = new \Think\Verify();
		$verify->fontSize=20;
		$verify->length=4;
        $verify->entry();
    }
	
	
    /**
     * 验证码检查
     */
    function check($code, $id =""){
        $verify = new \Think\Verify();
        return $verify->check($code,$id);
    }
}
