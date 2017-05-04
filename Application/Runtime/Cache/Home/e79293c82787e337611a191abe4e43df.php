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
	<ol class="list-inline list-items thumb">
		<li><a href="#">首页</a></li>
		<li><a href="">我的商城</a></li>
		<li><a href="#">个人中心</a></li>
		<li class="active">用户管理</li>
	</ol>
	<div class="row">
		<div class="col-xs-12 col-md-12 col-lg-12">
			<div class="col-xs-12 col-md-2 col-lg-2" style="position:relative;height:150px;">
				<style type="text/css">
					#head_pic{position:absolute;top:60px;left:30px;display:block;width:120px;height:40px;line-height:40px;color:#fff;background-color:#222;opacity:.4;border-radius:4.8px;border:1px solid #fff;}
				</style>
				<img id="user_head" src="<?php if(!empty($user["hd_big"])): echo ($user["hd_big"]); else: ?>/Public/img/h1.png<?php endif; ?>	" class="img-rounded" width="150"/>
				<input type="button" id="head_pic" class="border" size="16" value="修改头像" />
			</div>
			<div class="col-xs-12 col-md-10 col-lg-10">
				<h2>用户<?php if(empty($_SESSION['member']['_nickname'])): echo (session('_name')); else: echo (session('_nickname')); endif; ?>&nbsp;<a href="javascript:void(0);" class="edit-username"><i class="glyphicon glyphicon-pencil" style="font-size:15px;"></i></a></h2>
			</div>
		</div>
		<div class="col-xs-12 col-md-10 col-lg-10">
			<div class="header">
				<h3 class="pull-left">账号安全</h3>
				<h3 class="pull-right">安全等级: <span class="text-warning"><?php echo ($safe); ?></span>&nbsp;<i class="glyphicon glyphicon-question-sign fz pointer question"></i></h3>
			</div>
			<table class="table table-responsive">
				<tr>
					<td><span style="display:block;margin-top:20px;">密码</span></td>
					<td><h4>已填写</h4><i class="glyphicon glyphicon-eye-close"></i></td>
					<td><a href="javascript:void(0);" class="check_info" data-type="1" data-string="修改密码">修改</a></td>
				</tr>
				<tr>
					<td><span style="display:block;margin-top:20px;">邮箱</span></td>
					<td><?php if(empty($user["email"])): ?><h4>未绑定</h4><small>绑定后可通过邮箱找回密码</small><?php else: ?><h4 class="text-danger">已绑定</h4><small>可通过邮箱找回密码</small><?php endif; ?></td>
					<td><?php if(empty($user["email"])): ?><a href="javascript:void(0);" class="check_info" data-type="2" data-string="绑定邮箱">绑定</a><?php else: ?><a href="javascript:void(0);" class="check_info" data-type="3"  data-string="修改邮箱">修改</a><?php endif; ?></td>
				</tr>
				<tr>
					<td><span style="display:block;margin-top:20px;">手机</span></td>
					<td><?php if(empty($user["tel"])): ?><h4>未绑定</h4><small>绑定后可通过手机找回密码</small><?php else: ?><h4 class="text-danger">已绑定</h4><small>可通过手机找回密码</small><?php endif; ?></td>
					<td><?php if(empty($user["tel"])): ?><a href="javascript:void(0);" class="check_info" data-type="4" data-string="绑定手机">绑定</a><?php else: ?><a href="javascript:void(0);" class="check_info" data-type="5"  data-string="修改手机">修改</a><?php endif; ?></td>
				</tr>
			</table>
		</div>
	</div>
</div>
<link rel="stylesheet" type="text/css" href="/Public/plug/tapmodo/css/jquery.Jcrop.css"/>
<script src="/Public/plug/tapmodo/js/jquery.Jcrop.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="/Public/plug/Uploadify/uploadify1.css" />
<script type="text/javascript" src="/Public/plug/Uploadify/jquery.uploadify.js"></script>
<script type="text/javascript">
	$(function(){
		$('.question').click(function(e){
			e.preventDefault();
			layer.alert("设置密码+30，验证邮箱+30，绑定手机号+40，账号安全等着你拿100满分哦");
		});
		$('.edit-username').click(function(e){
			e.preventDefault();
			layer.open({
				title:'修改用户名',
				type: 2,
				closeBtn: 1, //不显示关闭按钮
				anim: 2,
				area: ['450px', '350px'],
				shadeClose: true, //开启遮罩关闭
				content: 'edit_user.html'
			});
		});
		$('.check_info').on('click',function (e) {
			e.preventDefault();
			var t = $(this).attr('data-type');
			var title = $(this).attr('data-string');
			layer.open({
				title:title,
				type: 2,
				closeBtn: 1, //不显示关闭按钮
				anim: 2,
				area: ['590px', '520px'],
				shadeClose: true, //开启遮罩关闭
				content: '<?php echo U("user/update_info");?>'+"?type="+t
			});
		});
		
		$('#head_pic').on('click',function(){
			layer.open({
				title:'修改头像',
				type: 2,
				closeBtn: 1, //不显示关闭按钮
				anim: 2,
				area: ['670px', '550px'],
				shadeClose: true, //开启遮罩关闭
				content: '<?php echo U("user/set_header");?>'
			});
		});
	});
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