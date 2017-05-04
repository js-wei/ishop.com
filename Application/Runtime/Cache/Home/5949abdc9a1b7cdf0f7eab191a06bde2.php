<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>首页_<?php echo ($site["title"]); ?></title>
	<meta content="<?php echo ($site["description"]); ?>" name="description" />
	<meta content="<?php echo ($site["keywords"]); ?>" name="keywords" />
    <link rel="stylesheet" type="text/css" href="/Public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/Public/lib/bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="/Public/lib/jquery/jquery-1.11.3.min.js"></script>
</head>
<body>
<!-- 导航 -->
<div class="navbar kj-nav nav-title navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse">
				<span class="sr-only">切换导航</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="<?php echo ($site["url"]); ?>" class="navbar-brand logo"><img src="/Public/img/logo3.fw.png"></a>
		</div>
		<div class="collapse navbar-collapse kj-nav-pro navbar-right" id="example-navbar-collapse">
			<ul class="nav navbar-nav">
				<?php if(is_array($nav_list)): $i = 0; $__LIST__ = $nav_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?><li class="navTwoBox">
                        <?php if(!empty($nav["child"])): ?><a href="javascript:viod(0);"><?php echo ($nav["title"]); ?></a>
                            <ul class="hidden-xs navTwo">
                                <?php if(is_array($nav["child"])): $i = 0; $__LIST__ = $nav["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$n_1): $mod = ($i % 2 );++$i;?><li><a href="<?php if(($n_1["type"]) == "6"): echo ($n_1['uri']); else: echo U('/'.$n_1['name']); endif; ?>"><?php echo ($n_1["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
							<?php else: ?>
			              <a href="<?php if(($nav["type"]) == "6"): echo ($nav['uri']); else: echo U('/'.$n_1['name']); endif; ?>"><?php echo ($nav["title"]); ?></a><?php endif; ?>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>
	</div>
</div>
<?php if(!empty($carousel)): ?><div class="carousel jdt" id="myCarousel">
	<div class="carousel-inner">
		<?php if(is_array($carousel)): $i = 0; $__LIST__ = $carousel;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$car): $mod = ($i % 2 );++$i;?><div class="item active jdtbox1">
				<a href="<?php echo ($car["url"]); ?>"><img src="<?php echo ($car["image"]); ?>" alt="<?php echo ($car["title"]); ?>"></a>
			</div><?php endforeach; endif; else: echo "" ;endif; ?>
	</div>	
</div><?php endif; ?>
<div class="container">
<?php echo ($location); ?>
</div>
<div class="info news">
    <div class="container">
        <div class="row pin">
            <div class="col-md-2 col-sm-2 hidden-xs" id="myScrollspy">
    <ul class="nav nav-tabs nav-stacked affix-top">
        <?php if(is_array($navbar)): $i = 0; $__LIST__ = $navbar;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$child): $mod = ($i % 2 );++$i;?><li <?php if(($current['name']) == $child['name']): ?>class="active"<?php endif; ?> >
            <a  href="<?php echo U('/'.$child['name']);?>"><?php echo ($child["title"]); ?></a>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</div>
            <div class="col-md-10 col-sm-10 col-xs-12">
                <div class="contentA">
                    <?php echo (htmlspecialchars_decode($list["content"])); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 站底 -->
<div class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-8 col-xs-12 foot-top">
				<h4 class="footer-title">联系地址</h4>
				<ul class="style-none foot-ul">
					<li class="footer-icon1"><?php echo ($site["address"]); ?></li>
					<li class="footer-icon2">
						手机：<?php echo ($site["phone"]); ?>
						<br>
						电话/传真：<?php echo ($site["tel"]); ?>
					</li>
					<li class="footer-icon3">
						邮箱：<?php echo ($site["email"]); ?>
					</li>
				</ul>
			</div>
			<div class="col-md-2 col-sm-4 col-xs-12 foot-top">
				<h4 class="footer-title">栏目</h4>
				<ul class="style-none foot-ul">
					<?php if(is_array($nav_list)): $i = 0; $__LIST__ = $nav_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i; if(($nav["type"]) != "6"): ?><li><a href="<?php echo U('/'.$nav['name']);?>"><?php echo ($nav["title"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			<div class="col-md-3 col-sm-4 col-xs-12 foot-top">
				<h4 class="footer-title">成功案例</h4>
				<ul class="style-none foot-ul successAL">
					<?php if(is_array($case)): $i = 0; $__LIST__ = $case;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cs): $mod = ($i % 2 );++$i;?><li class="case_<?php if(($$key%2) == "0"): ?>odd<?php else: ?>even<?php endif; ?>"><a href="<?php echo U('/detail/'.$cs['id']);?>"><?php echo ($cs["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			<div class="col-md-4 col-sm-8 col-xs-12 foot-top">
				<h4 class="footer-title">互动</h4>				
				<a href="<?php echo ($site["url"]); ?>"><img src="/Public/img/logo3.fw.png"></a>
				<span><?php echo ($site["icp"]); ?></span>
			</div>
		</div>
	</div>
</div>
</body>
<script type="text/javascript" src="/Public/lib/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/Public/lib/jquery.pin.js"></script>
<script type="text/javascript">
	$(function(){
		$(".nav-stacked").pin({
			containerSelector: ".pin"
		});
		$('.navTwoBox').hover(function() {
			var obj = $(this);
			$(this).css({backgroundColor: 'rgba(0, 0, 0, 0.5)'});
			$(this).children('ul.navTwo').stop().slideDown();
		},function(){
			var obj = $(this);
			$(this).children('ul.navTwo').stop().slideUp();
			setTimeout(function(){
				obj.css({backgroundColor: 'transparent'});
			}, 325);
		});
	});
</script>
</html>