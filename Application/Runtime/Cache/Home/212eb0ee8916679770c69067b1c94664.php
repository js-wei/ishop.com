<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>魅族官网-魅族智能手机官方网站</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="/Public/plug/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/css/base.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/plug/Font-Awesome-3.2.1/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/css/city-picker.css"/>
    <script src="/Public/js/jquery-1.10.1.min.js"></script>
    <script src="/Public/plug/bootstrap/js/bootstrap.min.js"></script>
    <script src="/Public/js/jquery.SuperSlide.2.1.1.js"></script>
    <script src="/Public/js/city-picker.data.js" type="text/javascript" charset="utf-8"></script>
    <script src="/Public/js/city-picker.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<header class="container-fluid margin-top-20 navbar1">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-lg-8 col-md-8">
                <ul class="list-inline list-items list-margin">
                    <li><a href="<?php echo ($site["url"]); ?>"><?php echo ($site["title"]); ?>首页</a></li>
                    <li><a href="<?php echo U('/shop');?>"><?php echo ($site["title"]); ?></a></li>
                    <li><a href="#2">服务</a></li>
                    <li><a href="#3">社区</a></li>
                    <li><a href="#4">关于我们</a></li>
                </ul>
            </div>

            <div class="col-xs-12 col-lg-4 col-md-4 text-right">
                <ul class="list-inline list-items">
                    <li><a href="index.html">消息</a></li>
                    <li><a href="#1">我的收藏</a></li>
                    <li><a href="#2">我的订单</a></li>
                    <li class="list-items-position-relative">
                        <?php if(!empty($_SESSION['member']['_id'])): ?><a href="<?php echo U('user/userinfo');?>" class="list-items-dropdown">用户<?php if(empty($_SESSION['member']['_nickname'])): echo (session('_name')); else: echo (session('_nickname')); endif; ?>的商城<span class="caret"></span></a>
                            <ul class="list-items list-items-position text-left" style="display:none;">
                                <li><a href="address.html">地址管理</a></li>
                                <li><a href="coupon.html">我的优惠券</a></li>
                                <li><a href="tickling.html">问题反馈</a></li>
                                <hr class="hr" />
                                <li><a href="<?php echo U('public/logout');?>"  class="logout">退出</a></li>
                            </ul>
                            <?php else: ?>
                            <a href="<?php echo U('/login');?>">立即登录</a><?php endif; ?>

                    </li>
                </ul>
            </div>
        </div>
        <div class="navbar-header margin-top-20">
            <button class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse">
                <i class="glyphicon glyphicon-align-justify" style="color:#fff;"></i>
            </button>
            <a href="<?php echo ($site["url"]); ?>" class="navbar-brand logo"><img src="<?php echo ($site["logo"]); ?>" alt="<?php echo ($site["title"]); ?>"></a>
        </div>
        <div class="collapse navbar-collapse navbar-right" id="example-navbar-collapse">

        </div>
    </div>
    <hr />
</header>
<div class="container margin-top-10">
    <div class="row">
        <div class="col-xs-12 col-lg-4 col-md-4 col-lg-offset-4 col-md-offset-4 register-link register-link-bold register-link-margin">
            <div class="text-center">
                <a href="<?php echo U('/register');?>">安全手机找回</a>|<a href="<?php echo U('/register1');?>"  class="active">安全邮箱找回</a>
            </div>
            <form action="<?php echo U('user/register_handler');?>" role="form" autocomplete="off">
                <div class="form-group form-group-lg padding-top-10">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="icon-user" style="font-size:16px;"></i></div>
                        <input class="form-control" type="text" id="username" name="username" placeholder="请输入账号">
                    </div>
                </div>
                <div class="form-group form-group-lg padding-top-10">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="icon-envelope" style="font-size:12px;"></i></div>
                        <input class="form-control" type="text" id="email" name="email" placeholder="请输入安全邮箱">
                    </div>
                </div>
                <div class="form-group form-group-lg padding-top-10">
                    <div class="input-group">
                    	<div class="input-group-addon"><i class="icon-key" style="font-size:12px;"></i></div>
                        <input class="form-control" type="text" id="verify" name="verify" placeholder="验证码">
                        <div class="input-group-addon pointer">获取验证码</div>
                    </div>
                </div>
                <div class="form-group">
                    <button class="col-xs-12 col-md-12 col-lg-12 register-button">找回密码</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="/Public/plug/jquery.validate/jquery.validate.min.js" type="text/javascript"></script>
<script src="/Public/plug/jquery.validate/my.rules.js" type="text/javascript"></script>
<script type="text/javascript">
	var strat_flag = true;
	var countdown=60;
	$(function(){
		$('form').validate({
	        errorElement: 'span', //default input error message container
	        errorClass: 'help-block', // default input error message class
	        focusInvalid: false, // do not focus the last invalid input
	        ignore: "",
	        rules: {
	            username: {
	              	required: true,
            		stringCheck: true,
            		byteRangeLength: [6, 15],
            		remote:{                                          //验证用户名是否存在
		               type:"POST",
		               url:"<?php echo U('user/check_username');?>",             //servlet
		               data:{
		                 username:function(){return $('#username').val();}
		               } 
		            } 
	            },
	            password:{
	            	required:true,
	            	chrnum: true,
	            	byteRangeLength:[6,15]
	            },
	            phone:{
	            	required:true,
	            	mobile:true
	            },
	            verify:{
	            	required:true,
	            },
	            email:{
	            	required:true,
	            	email:true
	            }
	        },
	        messages: { // custom messages for radio buttons and checkboxes
	            username: {
	               required: "*请填写用户名",
	               chrnum: "*用户名只能包括中文字、英文字母、数字和下划线",
	               byteRangeLength: "*用户名必须在3-15个字符之间(一个中文字算2个字符)",
	               remote:"*用户名已经被注册"
	            },
	            password:{
	            	required:'*请填写密码',
	            	chrnum: "*用户名只能包括英文字母、数字和下划线",
	            	byteRangeLength:'*长度必须在6-12之间'
	            },
	            phone:{
	            	required:"*请填写手机号",
	            	mobile:"*手机格式不正确"
	            },
	            verify:{
	            	required:'*请填写验证码',
	            },
	            email:{
	            	required:'*请填写邮箱',
	            	email:'*邮箱格式不正确'
	            }
	        },
	        highlight : function(element) {  
	            $(element).closest('.form-group').removeClass('has-success').addClass('has-error'); 
	        },  
	        success : function(label) {  
	            label.closest('.form-group').removeClass('has-error').addClass('has-success');  
	            label.remove();  
	        },  
	        errorPlacement : function(error, element) {  
	            element.parent('div').parent('div').append(error);  
	        },  
	    });
		
		$('form').submit(function(e){
			e.preventDefault();
			if($('form').valid()){
				if(!$('input[type="checkbox"]').is(':checked')){
					layer.alert('您没有同意服务条款,请先同意服务条款.',{icon:11});
					return false;
				}
				var json = $('form').serialize();
				$.post($(this).attr('action'),json,function(result){
					if(result.status==1){
						layer.alert(result.msg,{icon:1,end:function(){
							window.location.href = result.redirect;
						}});
					}else{
						layer.alert(result.msg,{icon:11});
					}
				});
			}
		});
		
		$('.pointer').click(function(e){
			e.preventDefault();
			
			var email = $(this).parent().parent().prev().find('input[type="text"]').val();
			if(email==''){
				layer.alert('请先填写邮箱.',{icon:11});
				return false;
			}else{
				if(strat_flag){
					settime();
					$.post('<?php echo U("user/send_email");?>'+'?_id='+Math.random(),{mail:email},function(result){
						if(result.status==0){
							layer.alert(result.msg,{icon:11});
						}else{
							layer.alert(result.msg,{icon:1});
						}
					});
					strat_flag = false;
				}
			}
			
		});
	});
	function settime() { 
		if (countdown == 0) { 
			strat_flag = true;   
			$('.pointer').text("获取验证码"); 
			countdown = 60; 
		}else{ 
			strat_flag = false;
			$('.pointer').html("重新发送(" + countdown + ")"); 
			countdown--; 
			setTimeout(function() {
				settime();
			},1000);
		} 
	} 
</script>
<footer class="container margin-top-20 ">
    <div class="row">
        <div class="col-xs-12 col-lg-12 col-md-12 margin-top-10">
            <div class="col-xs-12 col-lg-10 col-md-10">
                <p class="footer-copyright">
                    <a href=""><?php echo ((isset($site["icp"]) && ($site["icp"] !== ""))?($site["icp"]):'粤B2-20130198'); ?></a>
                    <a href=""><?php echo ((isset($site["copyright"]) && ($site["copyright"] !== ""))?($site["copyright"]):'粤ICP备13003602号-2'); ?></a>
                    <a href="">营业执照</a>
                    <a href="">法律声明</a>
                </p>
            </div>
            <div class="col-xs-12 col-lg-2 col-md-2 text-right">
                <span class="">关注我们:</span>
            </div>
        </div>
    </div>
</footer>
<script src="/Public/plug/layer/layer.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function () {
        $('.list-items-position-relative').hover(function(){
            $(this).find('ul').show();
        },function(){
            $(this).find('ul').hide();
        });

        $('.logout').click(function (e) {
            e.preventDefault();
            $.post($(this).attr('href'),function (result) {
                window.location.href =  "<?php echo U('/shop');?>";
            })
        });
    });
</script>
</body>
</html>