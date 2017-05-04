<?php
namespace Home\Controller;
use Think\Controller;

class UserController extends BaseController {
	/**
     * [Login 登陆处理]
     */
    public function login_handler(){
        if(!IS_POST)
            $this->ajaxReturn(['status'=>0,'msg'=>'页面不存在']);
       
      if(!$this->check(I('verify','')))
			$this->ajaxReturn(['status'=>0,'msg'=>'验证码错误，请重新登录']);
        
        $pwd = substr(I('password','','MD5'),10,10);

        $username=strtolower(I('username'));
		
		if(strstr($username,'@')){
			$where=[
				'email'=>$username
			];
		}else{
			$where=[
				'username'=>$username
			];
		}
		
        $admin = M("member")->field('date',true)->where($where)->find();
		
		//逻辑判断
        if(empty($_POST['username'])){
			$this->ajaxReturn(['status'=>0,'msg'=>'账号不能为空']);
        }
		if(empty($_POST['password'])){
        	$this->ajaxReturn(['status'=>0,'msg'=>'密码不能为空']);
        }
        if(!$admin){
        	$this->ajaxReturn(['status'=>0,'msg'=>'账号错误']);
        }
		if($admin['password']!=$pwd){
        	$this->ajaxReturn(['status'=>0,'msg'=>'密码错误']);
        }
        if($admin['status']==1){
        	$this->ajaxReturn(['status'=>0,'msg'=>'非法操作账号已锁定，请联系管理员解封']);
        }
        //更新登录信息
        $data=array(
	        'id'=>$admin['id'],
	        'last_login_time'=>time(),
	        'last_login_ip'=>get_client_ip(),
	        'type'=>($_POST['type']=='user')?0:1
        );
		
        M("member")->save($data);
		
        //保存登录状态
        Session('_id',$admin['id']);
        Session('_name',ucfirst($admin['username']));
        Session('_nickname',$admin['nickname']);
        Session('logined',$admin);
        //跳转目标页
		$this->ajaxReturn(['status'=>1,'msg'=>'登录成功','redirect'=>U('user/userinfo')]);
    }

	/**
	 * @author 魏巍
	 * @description 发送验证码邮件
	 * @return 返回发送结果
	 */
	public function send_email($mail=''){
		if(empty($mail)){
			$this->ajaxReturn(['status'=>0,'msg'=>'请填写邮箱']);
		}
		if(!check_email($mail)){
			$this->ajaxReturn(['status'=>0,'msg'=>'抱歉邮箱格式错误']);
		}
		if(cookie('?_session_code')){
			cookie('_session_code',null,time()-60*2);
		}
		
		$_code = NoRand(0,9,6);
		cookie('_session_code',$_code,60*2);
		$html = "【".$this->site['title']."验证码】:您在正在注册".$this->site['title']
				."的会员账号,您的验证码是:".$_code.",有效时间为2分钟.如果您没有注册".$this->site['title']
				."的会员,请自动忽略此邮件谢谢!";
		
		if(!think_send_mail($mail,$mail,"【".$this->site['title']."】注册用户验证码",$html)){
			$this->ajaxReturn(['status'=>0,'msg'=>'验证码发送失败,请稍后重试!']);
		}
		$this->ajaxReturn(['status'=>1,'msg'=>'验证码发送成功,请及时查收!']);
	}

    /**
     * @author 魏巍
     * @descrition 注册方法
     */
	public function register_handler(){
		if(empty(cookie('_session_code'))){
			$this->ajaxReturn(['status'=>0,'msg'=>'验证码已失效']);
		}
		if(I('post.verify')==''){
			$this->ajaxReturn(['status'=>0,'msg'=>'请输入验证码']);
		}
		if(I('post.username')==''){
			$this->ajaxReturn(['status'=>0,'msg'=>'请输入用户名']);
		}
		if(I('post.email')==''){
			$this->ajaxReturn(['status'=>0,'msg'=>'请输入邮箱']);
		}
		if(I('post.verify')!=cookie('_session_code')){
			$this->ajaxReturn(['status'=>0,'msg'=>'验证码错误,请重试!']);
		}
		$member = [
			'username'=>strtolower(I('post.username')),
			'email'=>I('post.email'),
			'password'=>substr(I('post.password','','md5'),10,10),
			'create_time'=>time()
		];
		
		if(!M('member')->add($member)){
			$this->ajaxReturn(['status'=>0,'msg'=>'注册失败,请重试!']);
		}
		$this->ajaxReturn(['status'=>1,'msg'=>'恭喜您注册成功,现在就去登录','redirect'=>U('user/login')]);
	}

    /**
     * @author 魏巍
     * @descriptionn 检测用户是否存在
     * @param string $username  用户名
     */
	public function check_username($username=''){
		if(empty($username)){
			$this->ajaxReturn(['status'=>0,'msg'=>'请输入用户名!']);
		}
		$member = M('member')->where(['username'=>$username])->find();
		if(empty($member)){
			//$this->ajaxReturn(['status'=>0,'msg'=>'恭喜您用户名未被注册!']);
			exit( "true" ); //用户名不存在，验证通过
		}else{
			//$this->ajaxReturn(['status'=>1,'msg'=>'抱歉用户名已存在!']);
			exit( "false" ); //用户名已存在
		}
		
	}
    /**
     * @author 魏巍
     * @descriptionn 检昵称是否存在
     * @param $nickname string 昵称
     */
    public function check_nickname($nickname=''){
        if(empty($nickname)){
            $this->ajaxReturn(['status'=>0,'msg'=>'请输入用户名!']);
        }
        $member = M('member')->where(['username'=>$nickname])->find();
        if(empty($member)){
            //$this->ajaxReturn(['status'=>0,'msg'=>'恭喜您用户名未被注册!']);
            exit( "true" ); //用户名不存在，验证通过
        }else{
            //$this->ajaxReturn(['status'=>1,'msg'=>'抱歉用户名已存在!']);
            exit( "false" ); //用户名已存在
        }

    }
	
    public function edit_user(){
        $this->display();
    }

    /**
     * 修改昵称
     * @param string $nickname 昵称
     * @param string $verify 验证码
     */
    public function update_nickname($nickname='',$verify=''){
        if(empty($verify)){
            $this->ajaxReturn(['status'=>0,'msg'=>'请填写验证码']);
        }
        if(empty($nickname)){
            $this->ajaxReturn(['status'=>0,'msg'=>'请填写昵称']);
        }
        if(!$this->check(I('verify','')))
			$this->ajaxReturn(['status'=>0,'msg'=>'验证码错误,请重新登录']);

        if(!M('member')->save([
            'id'=>session('_id'),
            'nickname'=>$nickname,
            'date'=>time()
        ])){
            $this->ajaxReturn(['status'=>0,'msg'=>'昵称修改失败,请稍后重试']);
        }
        session('_nickname',$nickname);
        $this->ajaxReturn(['status'=>1,'msg'=>'修改成功','redirect'=>U('user/userinfo')]);
    }
	
   
	
	/**
	 * @author 魏巍
     * @description 计算安全分数
	 */
	public function userinfo(){
        $this->user =$user =  M('member')->field('date',true)->find(session('_id'));
        $safe  = 30;
        if(!empty($user['email'])){
            $safe += 30;
        }
        if(!empty($user['tel'])){
            $safe += 40;
        }
        $this->safe = $safe;
		$this->display();
	}

    /**
     * @author 魏巍
     * @description 修改用户信息
     * @param int $type 修改类型
     */
    public function update_info($type=0){
        switch ($type){
            case 1:     //修改密码
                $this->display('password');
                break;
            case 2:     //绑定/修改邮箱
            case 3:
				$this->display('email');
                break;
            case 4:     //绑定/修改手机号
            case 5:     
				$this->display('tel');
                break;
            default:
                $this->ajaxReturn(['status'=>0,'msg'=>'操作失败,请稍后重试']);
        }
    }
	/**
     * @author 魏巍
	 * @description 修改密码
     * @param string $old_password
     * @param string $new_password
     * @param string $comfr_password
	 * @param string $verify
     */
    public function setPasswordHandler($old_password='',$new_password='',$comfr_password='',$verify=''){
    	if(empty($verify)){
    		$this->ajaxReturn(['status'=>0,'msg'=>'验证码不能为空']);
    	}
        if(empty($old_password)){
            $this->ajaxReturn(['status'=>0,'msg'=>'原始密码不能为空']);
        }
        if(empty($new_password)){
            $this->ajaxReturn(['status'=>0,'msg'=>'新密码不能为空']);
        }
        if(empty($comfr_password)){
            $this->ajaxReturn(['status'=>0,'msg'=>'确认密码不能为空']);
        }
		
        $id =  session('_id');
        $admin = M('member')->find($id);
		
        if($admin['password']!=substr(md5($old_password),10,10)){
            $this->ajaxReturn(['status'=>0,'msg'=>'原始密码不正确']);
        }

		if(!M('member')->save([
            'id'=>$id,
            'password'=>substr(md5($new_password),10,10),
            'date'=>time()
        ])){
            $this->ajaxReturn(['status'=>0,'msg'=>'修改失败请重试']);
        }
		
		session('_id',null);
		session('_name',null);
		session('_nickname',null);
		session('logined',null);
        $this->ajaxReturn(['status'=>1,'msg'=>'修改成功','redirect'=>U('/login')]);
    }
	/**
     * @author 魏巍
	 * @description 设置新密码
     * @param string $new_password		
     * @param string $comfr_password
	 * @param string $verify
	 * @param int	$muid
     */
	public function set_new_password($new_password='',$comfr_password='',$verify='',$muid=0){
		if(empty($verify)){
    		$this->ajaxReturn(['status'=>0,'msg'=>'验证码不能为空']);
    	}
        if(empty($new_password)){
            $this->ajaxReturn(['status'=>0,'msg'=>'新密码不能为空']);
        }
        if(empty($comfr_password)){
            $this->ajaxReturn(['status'=>0,'msg'=>'确认密码不能为空']);
        }
		if(empty($muid)){
			$this->ajaxReturn(['status'=>0,'msg'=>'修改失败请重试']);
		}
		if(!$this->check($verify)){
			$this->ajaxReturn(['status'=>0,'msg'=>'验证码错误']);
		}
			
        $admin = M('member')->find($muid);
		
		if(!M('member')->save([
            'id'=>$muid,
            'password'=>substr(md5($new_password),10,10),
            'date'=>time()
        ])){
            $this->ajaxReturn(['status'=>0,'msg'=>'修改失败请重试']);
        }
		
		session('_id',null);
		session('_name',null);
		session('_nickname',null);
		session('logined',null);
        $this->ajaxReturn(['status'=>1,'msg'=>'修改成功','redirect'=>U('/login')]);
	}

	
	/**
	 * @author 魏巍
	 * @description 设置邮箱
	 * @param string $email 邮箱
	 * @param string $verify 验证码
	 */
	public function setEmail($email='',$verify=''){
		if(empty($email)){
			$this->ajaxReturn(['status'=>0,'msg'=>'请输入邮箱']);
		}
		if(empty($verify)){
			$this->ajaxReturn(['status'=>0,'msg'=>'请输入验证码']);
		}
		if(cookie('?_session_code')){
			$this->ajaxReturn(['status'=>0,'msg'=>'验证码已失效']);
		}
		if($verify!=cookie('_session_code')){
			$this->ajaxReturn(['status'=>0,'msg'=>'请输入正确的验证码']);
		}
		if(!M('member')->save([
			'id'=>session('_id'),
			'email'=>$email,
			'date'=>time()
		])){
			$this->ajaxReturn(['status'=>0,'msg'=>'修改失败,请重试']);
		}
		$this->ajaxReturn(['status'=>1,'msg'=>'修改成功','redirect'=>U('user/userinfo')]);
	}
	
	/**
	 * @author 魏巍
	 * @description 设置手机
	 * @param string $tel 手机
	 * @param string $verify 验证码
	 */
	public function setTel($tel='',$verify=''){
		if(empty($tel)){
			$this->ajaxReturn(['status'=>0,'msg'=>'请输入邮箱']);
		}
		if(empty($verify)){
			$this->ajaxReturn(['status'=>0,'msg'=>'请输入验证码']);
		}
		if(cookie('?_session_code')){
			$this->ajaxReturn(['status'=>0,'msg'=>'验证码已失效']);
		}
		if($verify!=cookie('_session_code')){
			$this->ajaxReturn(['status'=>0,'msg'=>'请输入正确的验证码']);
		}
		if(!M('member')->save([
			'id'=>session('_id'),
			'email'=>$tel,
			'date'=>time()
		])){
			$this->ajaxReturn(['status'=>0,'msg'=>'修改失败,请重试']);
		}
		$this->ajaxReturn(['status'=>1,'msg'=>'修改成功','redirect'=>U('user/userinfo')]);
	}

	/**
	 * @author 魏巍
	 * @description		忘记密码找回
	 * @param string $username 	用户名
	 * @param string $email 	安全邮箱
	 * @param string $verify	验证码
	 */
	public function forget_handler($username='',$email='',$verify=''){
		if(empty($username)){
			$this->ajaxReturn(['status'=>0,'msg'=>'请输入用户名']);
		}
		if(empty($verify)){
			$this->ajaxReturn(['status'=>0,'msg'=>'请输入验证码']);
		}
		if(session('?_session_code')){
			$this->ajaxReturn(['status'=>0,'msg'=>'验证码已失效']);
		}
//		if(!$this->check(I('verify',''))){
//			$this->ajaxReturn(['status'=>0,'msg'=>'请输入正确的验证码']);
//		}
		
		$member = M('member')->field('date',true)->where(['username'=>$username,'email'=>$email])->find();
		
		if(empty($member)){
			$this->ajaxReturn(['status'=>0,'msg'=>'用户名不存在,请输入正确的账号']);
		}
	
		$_url = $this->site['url']."/find_passwords.html?email=".$email."&timespan=".base64_encode(time())."&ucion=".base64_encode("_get_".$member['id']."_mud");
		$_link = "<a href='".$_url."'>".$_url."</a>";

		$html = "【".$this->site['title']."密码找回】:您在正在使用".$this->site['title']
				."的密码找回功能,请点击以下链接修改:".$_link.",有效时间为30分钟.如果您没有使用".$this->site['title']
				."的密码找回功能,请自动忽略此邮件谢谢!";
		//p($html);die;
		if(!think_send_mail($email,$email,"【".$this->site['title']."】用户找回密码",$html)){
			$this->ajaxReturn(['status'=>0,'msg'=>'验证码发送失败,请稍后重试!']);
		}
		$this->ajaxReturn(['status'=>1,'msg'=>'发送成功,请到'.$email.'进行重置密码','redirect'=>U('/login')]);
	}
	
	/**
	 * @author 魏巍
	 * @description		忘记密码找回处理函数
	 * @param string $email 	安全邮箱
	 * @param int 	$timespan	安全时间戳
	 * @param string $ucion 	用户主键
	 */
	public function find_passwords($email='',$timespan=0,$ucion=''){
		$_result = '';
		if(empty($email)){
			$_result = '参数错误:安全邮箱为空';
		}
		if(empty($timespan)){
			$_result = '参数错误:时间戳为空';
		}
		if(empty($ucion)){
			$_result = '参数错误:用户标识为空';
		}
		$timespan = base64_decode($timespan);
		$_timespan = time_diff($timespan, time());
		
		if($_timespan['min']>30){
		    $_result = '参数错误:链接已经失效';
		}
		
		$uid = explode('_', base64_decode($ucion))[2];
		$member = M('member')->field('date,password',true)->where(['id'=>$uid,'email'=>$email])->find();
		if(empty($member)){
			$_result = '参数错误:查无此用户';
		}
		if(empty($_result) && $member['email']!=$email){
			$_result = '参数错误:安全邮箱错误';
		}
		$this->message = $_result;
		$this->member = $member;
		$this->display();
	}
	/**
	 * @author 魏巍
	 * @description 添加新地址
	 */
	public function add_address($name='',$phone='',$zipcode='',$city='',$address='',$default=0){
		if(empty($name)){
			$this->ajaxReturn(['status'=>0,'msg'=>'请输入收件人']);
		}
		if(empty($phone)){
			$this->ajaxReturn(['status'=>0,'msg'=>'请输入收件人手机号']);
		}
//		if(empty($zipcode)){
//			$this->ajaxReturn(['status'=>0,'msg'=>'请输入邮政编码']);
//		}
		if(empty($city)){
			$this->ajaxReturn(['status'=>0,'msg'=>'请输入收件城市']);
		}
		if(empty($address)){
			$this->ajaxReturn(['status'=>0,'msg'=>'请输入收件详细地址']);
		}
		$_id = session('_id');
		if(!$_id){
			$this->ajaxReturn(['status'=>0,'msg'=>'用户没有登录']);
		}
		$_count = M('address')->count('id');
		if($_count>=8){
			$this->ajaxReturn(['status'=>0,'msg'=>'您添加的地址已经到最大数,请删除不用的地址在添加']);
		}
		if($default){
			M('address')->execute("UPDATE __PREFIX__address SET `isdefault`=0 WHERE `mid`=$_id");
		}
		
		if(!M('address')->add([
			'mid'=>$_id,
			'name'=>$name,
			'city'=>$city,
			'address'=>$address,
			'zipcode'=>$zipcode,
			'phone'=>$phone,
			'isdefault'=>$default,
			'date'=>time()
		])){
			$this->ajaxReturn(['status'=>0,'msg'=>'添加失败请重试']);
		}
		$this->ajaxReturn(['status'=>1,'msg'=>'添加成功','redirect'=>U('/address')]);
	}
	
	
	
	/**
	 * @author 魏巍
	 * @description 上传头像
	 */
	public function upfile(){
		$result = array();
		$result['success'] = false;
		$msg = '修改成功';
		
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   		=   3145728 ;// 设置附件上传大小
		$upload -> allowExts	=	explode(',', 'jpg,jpeg,png,gif'); //设置附件上传目录
		$upload -> rootPath		=	'./Uploads/';
		$upload -> savePath		=	'HeadPic/';
		$upload->subName    	=   array('date','Ymd');
		$upload -> autoSub 		=	true;
		$upload->saveExt   =    'png';
		// 上传文件 
		$info   =   $upload->upload();
		if(!$info) {// 上传错误提示错误信息
		    $msg = $upload->getError();
		}else{// 上传成功 获取上传文件信息
		    foreach($info as $k => $file){
				if($k == '__source'){
					$result['sourceUrl']='/Uploads/'.$file['savepath'].$file['savename'];
				}else{
					$result['avatarUrls'][$k]='/Uploads/'.$file['savepath'].$file['savename'];
					$_result['avatarUrls'][$k]='/Uploads/'.$file['savepath'].$file['savename'];
				}
		    }
			$result['success'] = true;
		}
		$_id = session('_id');
		$member = M('member')->find($_id);
		$result['msg']=$msg;
		
		if(!empty($member['hd'])){
			unlink('.'.$member['hd']);
		}
		if(!empty($member['hd_big'])){
			unlink('.'.$member['hd_big']);
		}
		if(!empty($member['hd_middle'])){
			unlink('.'.$member['hd_middle']);
		}
		if(!empty($member['hd_small'])){
			unlink('.'.$member['hd_small']);
		}
		
		$_data =[
			'id'=>$_id,
			'hd'=>$result['sourceUrl'],
			'hd_big'=>$_result['avatarUrls']['img_1'],
			'hd_middle'=>$_result['avatarUrls']['img_2'],
			'hd_small'=>$_result['avatarUrls']['img_3'],
			'date'=>time()
		];
		M('member')->save($_data);
		echo json_encode($result);
	}

	public function upfile1() {
		p($_FILES);die;
		$dir = date('Ymd',time());
		$path = "./Uploads/HeadPic/".$dir."/";
       	if(!file_exists($path)){
       		mkdir($path,0777,true);
       	}
		$name = build_order_no();
		$file_src = "src.png"; 
		$filename162 = "b_".$name.".png"; 
		$filename48  = "m_".$name.".png"; 
		$filename20  = "s_".$name.".png";  
		
		$src=base64_decode($_POST['pic']);
		$pic1=base64_decode($_POST['pic1']);   
		$pic2=base64_decode($_POST['pic2']);  
		$pic3=base64_decode($_POST['pic3']);  

		if($src) {
			file_put_contents($file_src,$src);
		}

		file_put_contents($path.$filename162,$pic1);
		file_put_contents($path.$filename48,$pic2);
		file_put_contents($path.$filename20,$pic3);

		//$rs['status'] = 1;
		
		$rs=[
			'status'=>1,
			'former'=>$name.".png",
			'big'=>$filename162,
			'middle'=>$filename48,
			'small'=>$filename20,
		];
		
		echo json_encode($rs);
    }
	/**
	 * @author 魏巍
	 * @description 设置地址
	 * @param int $id 	操作id
	 * @param string $type 操作类型	
	 */
	public function set_address($id=0,$type=''){
		$_id = session('_id');
		if(!$_id){
			$this->ajaxReturn(['status'=>3,'msg'=>'您还没有登录','redirect'=>U('/login')]);
		}
		if(!$id){
			$this->ajaxReturn(['status'=>0,'msg'=>'操作失败']);
		}
		switch($type){
			case 'cancel':
				if(!M('address')->save([
					'id'=>$id,
					'isdefault'=>0
				])){
					$this->ajaxReturn(['status'=>0,'msg'=>'修改失败']);
				}
				$this->ajaxReturn(['status'=>1,'msg'=>'修改成功','redirect'=>U('/address')]);
				break;
			case 'set':
				M('address')->execute("UPDATE __PREFIX__address SET `isdefault`=0 WHERE `mid`=$_id");
				if(!M('address')->save([
					'id'=>$id,
					'isdefault'=>1
				])){
					$this->ajaxReturn(['status'=>0,'msg'=>'修改失败']);
				}
				$this->ajaxReturn(['status'=>1,'msg'=>'修改成功','redirect'=>U('/address')]);
				break;
			case 'del':
				if(!M('address')->delete($_id)){
					$this->ajaxReturn(['status'=>0,'msg'=>'删除失败']);
				}
				$this->ajaxReturn(['status'=>1,'msg'=>'删除成功','redirect'=>U('/address')]);
				break;
			default:
				$this->ajaxReturn(['status'=>0,'msg'=>'出现了错误']);	
		}
		
	}
	/**
	 * @author 魏巍
	 * @description 添加提出问题
	 * @param int $type 问题类型
	 * @param string $question	添加的问题
	 */
	public function add_question($type=0,$question=''){
		$_id = session('_id');
		if(!$_id){
			$this->ajaxReturn(['status'=>3,'msg'=>'您还没有登录','redirect'=>U('/login')]);
		}
		if(!$type){
			$this->ajaxReturn(['status'=>0,'msg'=>'请选择您的问题类型']);
		}
		if(empty($question)){
			$this->ajaxReturn(['status'=>0,'msg'=>'请填写您的问题']);
		}
		if(!M('question')->add([
			'mid'=>$_id,
			'type'=>$type,
			'question'=>$question,
			'status'=>0,
			'date'=>time(),
		])){
			$this->ajaxReturn(['status'=>0,'msg'=>'添加失败']);
		}
		$this->ajaxReturn(['status'=>1,'msg'=>'添加成功,谢谢您的宝贵意见,我们会尽快解决您提出的问题']);
	}
	
	
	public function set_header(){
		$this->display();
	}
	
    public function register($m='') {
        $tpl = $m=='tel'?'register':'register1';
        $this->display($tpl);
    }


    public function login($m=''){
        $tpl = $m=='tel'?'login':'login1';
        $this->display($tpl);
    }


    public function address(){
    	$id=session('_id');
		if(!$id){
			$this->redirect('login');
		}
		$_address = M('address')->field('date',true)->where(['mid'=>$id])->limit(10)->order('isdefault desc')->select();
		$this->count = M('address')->count('id');
		$this->address=$_address;
        $this->display();
    }

    public function order(){
        $this->display();
    }


    public function coupon($type=0,$p=1){
    	$_id = session('_id');
		if(!$_id){
			$this->redirect('/login');
		}
		
		switch($type){
			case 0:
				$map=[
					'user_id'=>$_id,
					'status'=>2,
					'start_time'=>['elt',time()],
					'end_time'=>['egt',time()],
					'validity_time'=>0
				];
				break;
			case 1:
				$map=[
					'user_id'=>$_id,
					'status'=>1
				];
				break;
			case 2:
				$map=[
					'user_id'=>$_id,
					'end_time'=>['lt',time()],
					'validity_time'=>1
				];
				break;
		}
		
        $m = M('coupon'); // 实例化User对象
		// 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
		$list = $m->field('make_time',true)->where($map)->order('make_time desc')->page($p,C('PAGE_SIZE'))->select();
		$sql = $m->getLastSql();
		$this->assign('list',$list);// 赋值数据集
		$count      = $m->where($map)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,C('PAGE_SIZE'));// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
   
        foreach($list as $k =>$v){
        	$list[$k]['offset_cash'] = $v['offset_cash']*100;
        }
       	
       	$count1 = M('coupon')->where(['user_id'=>$_id,'status'=>2])->count('id');
		$count2 = M('coupon')->where(['user_id'=>$_id,'status'=>1])->count('id');
		$count3=M('coupon')->where(['user_id'=>$_id,'end_time'=>['lt',time()],'validity_time'=>1])->count('id');
		$this->count1= ceil($count1/C('PAGE_SIZE'));
		$this->count2=ceil($count2/C('PAGE_SIZE'));
		$this->count3=ceil($count3/C('PAGE_SIZE'));
		$this-> list = $list;
  		$this->p=$p;
		
		if(!IS_POST){
			$this->display();
		}else{
			$tpl = $this->fetch('coupon_list');
			$this->ajaxReturn(['status'=>1,'list'=>$tpl,'p'=>$p,'sql'=>$sql]);
		}
    }

    public function tickling(){
       $this->display();
    }

    public function message(){
        $this->display();
    }
    
    public function enshrine(){
        $this->display();
    }
	
	public function forget_email(){
		$this->display();
	}
	
	public function forget_mobi(){
		$this->display();
	}
}