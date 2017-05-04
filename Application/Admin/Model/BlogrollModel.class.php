<?php

/**
 * Created by PhpStorm.
 * User: dong
 * Date: 2016/5/4
 * Time: 15:18
 */
namespace Admin\Model;
use Think\Model;

class BlogrollModel extends Model{
    protected $_validate = array(
        array('title','require','标题不能为空！'), 
        array('url','require','地址不能为空！'),
    );
}