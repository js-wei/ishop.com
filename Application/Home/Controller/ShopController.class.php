<?php
namespace Home\Controller;
use Think\Controller;
class ShopController extends BaseController {

    public function _initialize(){
        parent::_initialize(); // TODO: Change the autogenerated stub
		$this->carousel = $this->get_site_carousel();
        foreach ($this->nav_list as $k =>$v){
           if($v['child']){
               foreach ($v['child'] as $j => $i){
                   $fid = ','.$i['id'];
               }
               $fid = substr($fid,1);
               $temp = M('article')->where(['column_id'=>['in',$fid],'com'=>1])->limit(8)->select();
               $v['art'] = $temp;
               $__[$k]=$v;
           }
        }
        $this->nav_list=$__;
    }

    public function index() {
        $this->display();
    }
}