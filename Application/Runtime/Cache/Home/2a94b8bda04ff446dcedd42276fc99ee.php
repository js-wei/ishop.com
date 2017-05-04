<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>首页_<?php echo ($site["title"]); ?></title>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link rel="bookmark" href="/favicon.ico"/>
	<meta content="<?php echo ($site["description"]); ?>" name="description" />
	<meta content="<?php echo ($site["keywords"]); ?>" name="keywords" />
	<!-- 新 Bootstrap 核心 CSS 文件 -->
	<link rel="stylesheet" href="/Public/plug/bootstrap/css/bootstrap.min.css">
	<!-- 可选的Bootstrap主题文件（一般不用引入） -->
	<link rel="stylesheet" href="/Public/plug/bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="/Public/css/base.css"/>
	<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
	<script src="/Public/js/jquery-1.10.1.min.js"></script>
	<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
	<script src="/Public/plug/bootstrap/js/bootstrap.min.js"></script>
	<script src="/Public/js/jquery.SuperSlide.2.1.1.js"></script>
</head>
<body>
<header class="container-fluid navbar-fixed-top navbar1">
	<div class="container">
		<div class="navbar-header">
			<button class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse">
				<i class="glyphicon glyphicon-align-justify" style="color:#fff;"></i>
			</button>
			<a href="<?php echo ($site["url"]); ?>" class="navbar-brand logo"><img src="<?php echo ($site["logo"]); ?>" alt="LOGO"></a>
		</div>
		<div class="collapse navbar-collapse navbar-right" id="example-navbar-collapse">
			<ul class="nav navbar-nav">
				<li class="home-link">
					<a href="shop.html"><?php echo ($site["title"]); ?></a>
				</li>
				<?php if(is_array($nav_list)): $i = 0; $__LIST__ = $nav_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?><li class="<?php if(!empty($nav["child"])): ?>dropdown<?php endif; ?>">
						<a href="<?php if(($nav["type"]) == "6"): echo ($nav['uri']); else: echo U('/'.$nav['name']); endif; ?>"  <?php if(!empty($nav["child"])): ?>class="dropdown-toggle" data-toggle="dropdown"<?php endif; ?>><?php echo ($nav["title"]); ?></a>
						<div class="dropdown-menu">
							<?php if(is_array($nav["art"])): $i = 0; $__LIST__ = $nav["art"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$n_1): $mod = ($i % 2 );++$i;?><div class="col-xs-6 col-md-3 text-center product-items">
									<a href="<?php echo U('/detail/'.$n_1['id']);?>" class="">
										<img src="<?php echo ($n_1["image"]); ?>" alt="<?php echo ($n_1["title"]); ?>">
										<h5><?php echo ($n_1["title"]); ?></h5>
									</a>
								</div><?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
				<li class="dropdown">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						<i class="glyphicon glyphicon-user"></i>
					</a>
					<ul class="dropdown-menu login-tool">
						<li><a href="<?php echo U('/login');?>"><i class="glyphicon glyphicon-log-in"></i>&nbsp;&nbsp;立即登录</a></li>
						<li><a href="<?php echo U('/register');?>">没有账号?立即注册</a></li>
						<li class="divider"></li>
						<li><a href="cart.html"><i class="glyphicon glyphicon-shopping-cart"></i>&nbsp;&nbsp;我的购物车</a></li>
						<li><a href="order.html"><i class="glyphicon glyphicon-list-alt"></i>&nbsp;&nbsp;我的订单</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</header>
<div class="thumbnailb">
	<div class="fullSlide margin-none padding-none">
		<div class="bd">
			<ul>
				<?php if(is_array($carousel)): $i = 0; $__LIST__ = $carousel;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li style="background:url(<?php echo ($vo["image"]); ?>) center 0 no-repeat;" data-image="<?php echo ($vo["image"]); ?>"><a  href="<?php echo ($vo["url"]); ?>" target="_blank"></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>
		<div class="hd">
			<ul></ul>
		</div>
	</div>
</div>

<div class="container-fluid margin-top-10">
	<div class="col-xs-12 col-lg-4 col-md-4">
		<a href="">
			<img src="/Public/img/5.jpg" width="90%" alt="" class="img-rounded">
		</a>
	</div>
	<div class="col-xs-12 col-lg-4 col-md-4">
		<a href="">
			<img src="/Public/img/9.jpg"  width="90%" alt="" class="img-rounded">
		</a>
	</div>
	<div class="col-xs-12 col-lg-4 col-md-4">
		<a href="">
			<img src="/Public/img/6.jpg"  width="99.8%" alt="" class="img-rounded">
		</a>
	</div>
</div>
<script type="text/javascript" src="/Public/plug/rgbaster.js"></script>
<script type="text/javascript">
	$(function(){
		$(".fullSlide").slide({
			titCell:".hd ul",
			mainCell:".bd ul",
			effect:"fold",
			autoPlay:true,
			autoPage:true,
			trigger:"click",
			startFun:function(i,c,s){
				var elemet = $('div.bd ul li').eq(i);
				var img = elemet.attr('data-image');
				RGBaster.colors(img, {
					exclude: [ 'rgb(255,255,255)', 'rgb(0,0,0)' ],
					success: function(payload) {
						elemet.css("background-color", payload.dominant);
					}
				});
			}
		});
		$('.dropdown').mouseover(function(){
			var width = $('.navbar1').width();
			$('div.dropdown-menu').width(width/2);
			var left = -$(this).offset().left/2;
			var height = $(this).children('.dropdown-menu').height()+90;
			$('.navbar1').height(height).css('background-color',"#FFFFFF");
			$('.navbar-nav a').css('color','#000');
			$('div.dropdown-menu').css('left',left+'px');
			$(this).addClass('open');
			$(this).children('ul.dropdown-menu').css('margin-top','-1px');
		}).mouseleave(function(){
			$(this).removeClass('open');
			$('.navbar1').height(50);
			$('.navbar-nav a').css('color','#fff');
			$('.navbar1').removeAttr('style');
		});

		$('.product-items').mouseover(function(){
			$(this).css('opacity','1').siblings('.product-items').css('opacity','.5');
		});
		$('.home-link').mouseover(function(){
			$(this).css('background','none');
			$(this).children('a').css('background','none');
		});
		$('ul.navbar-nav li.dropdown a').click(function (e) {
			e.preventDefault();
			var url = $(this).attr('href');
			if(url!=''|| url.split('0')<0){
				window.location.href = url;
			}
		});
	});
</script>
<!-- 站底 -->
<footer class="container margin-top-20 ">
	<div class="row">
		<div class="col-xs-12 col-lg-10 col-md-10">
			<div class="col-xs-6 col-lg-3 col-md-3">
				<h5><?php echo ($site["title"]); ?></h5>
				<ul class="list-style list-items">
					<?php if(is_array($nav_list)): $i = 0; $__LIST__ = $nav_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i; if(($nav["type"]) != "6"): ?><li><a href="<?php echo U('/'.$nav['name']);?>"><?php echo ($nav["title"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			<div class="col-xs-6 col-lg-3 col-md-3">
				<h5>服务支持</h5>
				<ul class="list-style list-items">
					<li><a href="">MX6</a></li>
					<li><a href="">PRO 6</a></li>
					<li><a href="">魅蓝 E</a></li>
					<li><a href="">魅蓝 3s</a></li>
				</ul>
			</div>
			<div class="col-xs-6 col-lg-3 col-md-3">
				<h5>关于我们</h5>
				<ul class="list-style list-items">
					<li><a href="">MX6</a></li>
					<li><a href="">PRO 6</a></li>
					<li><a href="">魅蓝 E</a></li>
					<li><a href="">魅蓝 3s</a></li>
				</ul>
			</div>
			<div class="col-xs-6 col-lg-3 col-md-3">
				<h5>联系我们</h5>
				<ul class="list-style list-items">
					<li><i class="glyphicon glyphicon-home"></i>&nbsp;<?php echo ($site["address"]); ?></li>
					<li><i class="glyphicon glyphicon-phone"></i>&nbsp;手机：<?php echo ($site["phone"]); ?></li>
					<li><i class="glyphicon glyphicon-phone-alt"></i>&nbsp;电话/传真：<?php echo ($site["tel"]); ?></li>
					<li><i class="glyphicon glyphicon-envelope"></i>&nbsp;邮箱：<?php echo ($site["email"]); ?></li>
				</ul>
			</div>
		</div>
		<div class="col-xs-12 col-lg-2 col-md-2 text-right">
			<span>24小时全国服务热线</span>
			<h3>400-788-3333</h3>
			<a href="javascript:void(0);" class="sevice">24小时在线客服</a>
		</div>
	</div>
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
	<?php echo (htmlspecialchars_decode($site["code"])); ?>
</footer>
<script type="text/javascript">
	$(function () {
		$('.list-items-position-relative').hover(function(){
			$(this).find('ul').show();
		},function(){
			$(this).find('ul').hide();
		});
	});
</script>
</body>
</html>