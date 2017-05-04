<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * @author 魏巍
 * @date 2016-10-19
 * @description 友情链接
 */
class FlinkController extends BaseController{
	/**
	 * [index 友情链接]
	 * @return [type]
	 */
	public function index($id=0){
	
		$map = $this->_search_arc();
        $map['column_id']=$id;
        //排序
        $ordermap = $this->ordermap(I('sort'),I('order'));
        //获取数据
		$this->arclist=$arclist=$this->getlist(M('flink'), $map, $ordermap);
		$this->display();
	}

	public function add($id=0){
		if($id){
			$m = D('flink');
			$this->article = $article =$m->find($id);
		}
		$this->display();
	}
	/**
	 * [status 修改状态]
	 * @return [type]
	 */
	public function status(){
		if(!$this->_status(I('id'),'flink',I('t'))){
			$this->error('操作失败');
		}
	}
	/**
	 * @author 魏巍
	 * @date 2016-10-19
	 * @description 添加友情链接
	 */
	public function add_flink(){
		$m = D('flink');
		if(!$m->create($_POST)){
			$this->ajaxReturn(['status'=>0,'msg'=>$m->getError()]);
		}
		$data = $this->_param();
		$u = new UploadifyController();
		$u->delmgByWhere1($m,['id'=>$data['id']],'ico');		//删除原先图片
		if($data['id']){
			$data['dates']=time();
			if(!$m->save($data)){
				$this->ajaxReturn(['status'=>0,'msg'=>'修改失败']);
			}
			$this->ajaxReturn(['status'=>1,'msg'=>'修改成功','redirect'=>U('index?p='.I('p'))]);
		}else{
			$data['date']=time();
			if(!$m->add($data)){
				$this->ajaxReturn(['status'=>0,'msg'=>'添加失败']);
			}
			$this->ajaxReturn(['status'=>1,'msg'=>'添加成功','redirect'=>U('index?p='.I('p'))]);
		}
	}

	/**
	 * [delete 删除操作]
	 * @return [type]
	 */
	public function delete(){
		if(!M('flink')->delete(I('id'))){
			$this->error('操作失败');
		}
		$this->_redirect('index?id='.I('cid').'&p='.I('p'));
	}
	/**
	 * [_search_arc 搜索]
	 * @return [type]
	 */
	protected function _search_arc(){
		$map=array();
		$username=I('k');
		$status=I('q');
		if($status>-1&&$status!=""){
			$map['status']=array('eq',$status);
		}
		
		$map['title']=array('like','%'.I('k').'%');
		$this->search=array(
			'k'=>$username,
			'q'=>$status
			);
		//p($map);die;
		return $map;
	}
}