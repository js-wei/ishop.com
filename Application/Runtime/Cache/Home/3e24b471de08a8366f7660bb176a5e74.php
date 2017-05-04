<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
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
<div class="info news">
    <div class="container">
        <div class="row pin">
            <div class="col-md-2 col-sm-2 hidden-xs" id="myScrollspy">
                <ul class="nav nav-tabs nav-stacked affix-top">
                    <?php if(is_array($child_nav)): $i = 0; $__LIST__ = $child_nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$child): $mod = ($i % 2 );++$i;?><li <?php if(empty($_GET['id'])): if(($key) == "0"): ?>class="active"<?php endif; else: if(($child["name"]) == $_GET['id']): ?>class="active"<?php endif; endif; ?>   ><a  href="<?php echo U('/news/'.$child['name']);?>"><?php echo ($child["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <div class="col-md-10 col-sm-10 col-xs-12">
                <?php if(!empty($list)): if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="news-list">
                            <h3 class="news-title"><a href="<?php echo U('/details?id='.$vo['id']);?>" target="_blank"><?php echo ($vo["title"]); ?></a></h3>
                            <div class="news-info">
                                <strong class="persent">官方新闻</strong>
                                <span class="time"><?php echo (date('Y-m-d',$vo["create_time"])); ?></span>
                            </div>
                            <p class="news-content"><?php echo ($vo["description"]); ?></p>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                    <?php else: ?>
                    <div class="text-center" style="line-height:150px;">
                        暂无内容
                    </div><?php endif; ?>
                <div class="col-md-12 col-sm-12 hidden-xs">
                    <?php echo ($page); ?>
                </div>
            </div>
        </div>
    </div>
</div>
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