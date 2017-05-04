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
    	<?php if(!empty($message)): ?><div class="alert alert-danger" role="alert"><i class="icon-warning-sign"></i>&nbsp;<?php echo ($message); ?>!&nbsp;<span id="wait">5</span>秒钟后返回找回密码.等不及了:<a id="href"  href="<?php echo U('user/forget_email');?>">现在跳转</a></div><?php endif; ?>
        <div class="col-xs-12 col-lg-4 col-md-4 col-lg-offset-4 col-md-offset-4 register-link register-link-bold register-link-margin">
            <div class="text-center">
                <h3>安全邮箱找回</h3>
            </div>
            <form action="<?php echo U('user/set_new_password');?>" role="form" autocomplete="off">
                <div class="form-group form-group-lg padding-top-10">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="icon-lock" style="font-size:16px;"></i></div>
                        <input class="form-control" type="password" id="new_password" name="new_password" <?php if(!empty($message)): ?>disabled="disabled"<?php endif; ?> placeholder="请输入新的密码">
                    	<input type="hidden" name="muid" id="muid" value="<?php echo ($member["id"]); ?>" />
                    </div>
                </div>
                <div class="form-group form-group-lg padding-top-10">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="icon-lock" style="font-size:16px;"></i></div>
                        <input class="form-control" type="password" id="comfr_password" name="comfr_password" <?php if(!empty($message)): ?>disabled="disabled"<?php endif; ?> placeholder="请输入确认密码">
                    </div>
                </div>
                <div class="form-group form-group-lg padding-top-10">
                    <div class="input-group">
                    	<div class="input-group-addon"><i class="icon-key" style="font-size:12px;"></i></div>
                        <input class="form-control" type="text" id="verify" name="verify" <?php if(!empty($message)): ?>disabled="disabled"<?php endif; ?> placeholder="验证码">
                        <div class="input-group-addon pointer">
                        	<img src="<?php echo U('public/verify');?>" width="110" height="32" onclick="javascript:this.src=this.src+'?_id='+Math.random()"/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button class="col-xs-12 col-md-12 col-lg-12 register-button"  <?php if(!empty($message)): ?>disabled="disabled"<?php endif; ?>>修改密码</button>
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
	            verify:{
	            	required:true,
	            },
	            new_password: {
                    required: true,
                    stringCheck: true,
                    byteRangeLength: [6, 15]
                },
                comfr_password:{
                    required:true,
                    chrnum: true,
                    byteRangeLength:[6,15],
                    equalTo:"#new_password"
                }
	        },
	        messages: { // custom messages for radio buttons and checkboxes
	            verify:{
	            	required:'*请填写验证码',
	            },
	            new_password: {
                    required: "*请填写密码",
                    chrnum: "*密码只能包括英文字母、数字和下划线",
                    byteRangeLength: "*用户名必须在6-15个字符之间"
                },
                comfr_password:{
                    required:'*请填写密码',
                    chrnum: "*密码只能包括英文字母、数字和下划线",
                    byteRangeLength:'*长度必须在6-12之间',
                    equalTo:"*两次输入密码不一致"
                },
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
				var json = $('form').serialize();
				var index = layer.load(2,{
					shade: [0.5,'#000'] //0.1透明度的白色背景
				});
				$.post($(this).attr('action'),json,function(result){
					layer.close(index);
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
		
		var timespan = parseInt($('#timespan').text());
		setTimeout(function(){
			timespan--;
			if(timespan==0){
				window.location.href="U('user/forget_email')";
			}else{
				$('#timespan').text(timespan)
			}
		},5);
	});
</script>
<?php if(!empty($message)): ?><script type="text/javascript">
	(function(){
	var wait = document.getElementById('wait'),href = document.getElementById('href').href;
	var interval = setInterval(function(){
		var time = --wait.innerHTML;
		if(time <= 0) {
			location.href = href;
			clearInterval(interval);
		};
	}, 1000);
	})();
	</script><?php endif; ?>
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