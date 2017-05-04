<?php
namespace Admin\Controller;
/**
 * 栏目操作
 * @author 魏巍
 */
class ColumnController extends BaseController {
    /**
     * 列表页
     */
	public function index(){
        $list = M('Column')->order('id asc')->select();
        $this->list= $list =\Service\Category::unlimitForLevel($list);
        
		$this->display();
	}

    /**
     * 添加页
     */
	public function add(){
        $this->column_list = $list = \Service\Category::LimitForLevel(M('column')->order('id asc')->select());
		$this->display();
	}

    /**
     * 删除页
     */
	public function del(){
        $this->display();
    }

    public function edit(){
        $this->column_list = $list = \Service\Category::LimitForLevel(M('column')->order('id asc')->select());
        $this->column=$column=M('column')->find(I('id','',intval));
        $this->display();
    }

    /**
     * 修改操作
     */
    public function status(){
        if(!$this->_status(I('id'),'column',I('t'))){
            $this->error('操作失败');
        }
    }
    /**
     * 添加处理函数
     */
    public function addhandler(){
        $m = M('column');
        $data =$this->_param();
        $data['title']=trim_all(I('title'));
        $data['effective']=strtotime(I('effective'));
        $data['date']=$data['dates']=time();
        $data['name']=strtolower(trim_all($data['name']));
		$u = new UploadifyController();
		$u->delmgByWhere1($m,['id'=>$data['id']],'image');		//删除原先图片
        $data['thumb']=$this->get_thumb_path($data['image']);
        ksort($data);
		
        if(!$m->add($data)){
//          $this->error('操作失败');
			$this->ajaxReturn(['status'=>0,'msg'=>'添加失败']);
        }
        //$this->redirect('index');
        $this->ajaxReturn(['status'=>1,'msg'=>'添加成功','redirect'=>U('index')]);
    }

    /**
     * 修改处理函数
     */
    public function edithandler(){
        $m = M('column');
        $data =$this->_param();
        $data['title']=trim_all(I('title'));
        $data['effective']=strtotime(I('effective'));
        $data['date']=$data['dates']=time();
        $data['name']=strtolower(trim_all($data['name']));
        $u = new UploadifyController();
        $u->delmgByWhere1($m,['id'=>$data['id']],'image');		//删除原先图片
        $data['thumb']=$this->get_thumb_path($data['image']);

        $data['dates']=time();
	
         if(!$m->save($data)){
//          $this->error('操作失败');
			$this->ajaxReturn(['status'=>0,'msg'=>'修改失败']);
        }
        //$this->redirect('index');
        $this->ajaxReturn(['status'=>1,'msg'=>'修改成功','redirect'=>U('index')]);
    }
}
