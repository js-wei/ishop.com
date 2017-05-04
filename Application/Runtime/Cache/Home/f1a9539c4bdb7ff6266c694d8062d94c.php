<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>首页_<?php echo ($site["title"]); ?>_<?php echo ($detail["title"]); ?></title>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link rel="bookmark" href="/favicon.ico"/>
	<meta name="keywords" content="<?php if(!empty($detail["keywords"])): echo (trim_all($detail["keywords"])); else: echo (trim_all($site["keywords"])); endif; ?>" />  
    <meta name="description" content="<?php if(!empty($detail["description"])): echo (trim_all($detail["description"])); else: echo (trim_all($site["description"])); endif; ?>" />
    <link rel="stylesheet" type="text/css" href="/Public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/Public/plug/bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="/Public/js/jquery-1.11.3.min.js"></script>
</head>
<body>

<!-- 导航 -->
<div class="navbar nav-title navbar-inverse navbar-fixed-top" role="navigation">
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
				<?php if(is_array($nav_list)): $i = 0; $__LIST__ = $nav_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?><li class="navTwoBox <?php if(!empty($nav["child"])): ?>dropdown<?php endif; ?>" >
						<a href="<?php if(($nav["type"]) == "6"): echo ($nav['uri']); else: echo U('/'.$nav['name']); endif; ?>" <?php if(!empty($nav["child"])): ?>class="dropdown-toggle" data-toggle="dropdown"<?php endif; ?>><?php echo ($nav["title"]); ?></a>
							<ul class="dropdown-menu">
								<?php if(is_array($nav["child"])): $i = 0; $__LIST__ = $nav["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$n_1): $mod = ($i % 2 );++$i;?><li><a href="<?php if(($n_1["type"]) == "6"): echo ($n_1['uri']); else: echo U('/'.$n_1['name']); endif; ?>"><?php echo ($n_1["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
							</ul>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>
    </div>
</div>
<div style="height:50px;"></div>
<div class="container foot-top kj-navtabs">
    <?php echo ($location); ?>
</div>


<div class="info news-con">
    <div class="container">
        <div class="contentA">
            <h3 class="news-title"><a><?php echo ($vo["title"]); ?></a></h3>
			<hr />
            <div class="news-info">
                <strong class="persent"><?php echo ($vo["column"]); ?></strong>
                <span class="time"><?php echo (date('Y-m-d',$vo["create_time"])); ?></span>
				<span class="nesw-num" style="padding-left:10px;"><i class="glyphicon glyphicon-eye-open"></i>&nbsp;<?php echo ($vo["hits"]); ?></span>
				<span class="nesw-num" style="padding-left:10px;"><i class="glyphicon glyphicon-user"></i>&nbsp;<?php echo ((isset($vo["author"]) && ($vo["author"] !== ""))?($vo["author"]):"官方发布"); ?></span>
				<?php if(($site["is_shard"]) == "0"): ?><div class="pull-right">分享到:<?php echo (htmlspecialchars_decode($site["shard"])); ?></div><?php endif; ?>
            </div>
            <div class="detail_cont">
                <?php echo (htmlspecialchars_decode($vo["content"])); ?>	
            </div>
            <div class="news_catalog">
                <p><?php if(!empty($prev)): ?><a href="<?php echo U('/detail/'.$prev['id']);?>">下一篇 <?php echo ($prev["title"]); ?></a><?php else: ?><a>下一篇 没有了</a><?php endif; ?></p>
                <p><?php if(!empty($next)): ?><a href="<?php echo U('/detail/'.$next['id']);?>">下一篇 <?php echo ($next["title"]); ?></a><?php else: ?><a>下一篇 没有了</a><?php endif; ?></p>
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
					<li><i class="glyphicon glyphicon-home"></i>&nbsp;<?php echo ($site["address"]); ?></li>
					<li><i class="glyphicon glyphicon-phone"></i>&nbsp;手机：<?php echo ($site["phone"]); ?></li>
					<li><i class="glyphicon glyphicon-phone-alt"></i>&nbsp;电话/传真：<?php echo ($site["tel"]); ?></li>
					<li><i class="glyphicon glyphicon-envelope"></i>&nbsp;邮箱：<?php echo ($site["email"]); ?></li>
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
					<?php if(is_array($case)): $i = 0; $__LIST__ = $case;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cs): $mod = ($i % 2 );++$i;?><li class="<?php if($key%2 == 0): ?>col-md-6 col-sb-12 col-xs-12<?php else: ?>col-md-6 col-sb-12 col-xs-12<?php endif; ?>"><a href="<?php echo U('/detail/'.$cs['id']);?>"><?php echo ($cs["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			<div class="col-md-4 col-sm-8 col-xs-12 foot-top">
				<h4 class="footer-title">互动</h4>				
				<div class="col-md-3">
					<img src="<?php echo ($site["image"]); ?>" alt="LOGO" width="80px" style="margin-top:13px;">
				</div>
				<div class="col-md-9">
					<h4><?php echo ($site["title"]); ?></h4>
					<?php if(!empty($site["copyright"])): ?><h6>&copy; <?php echo ($site["copyright"]); ?></h6><?php endif; ?>
					<?php if(!empty($site["icp"])): ?><h6><?php echo ($site["icp"]); ?></h6><?php endif; ?>
					<h6>技术支持：Jswei、Jason</h6>
				</div>
			</div>
		</div>
		<?php echo (htmlspecialchars_decode($site["code"])); ?>
	</div>
</div>
<script type="text/javascript" src="/Public/plug/bootstrap/js/bootstrap.min.js"></script>
<script src="//cdn.bootcss.com/jquery.pin/1.0.1/jquery.pin.min.js"></script>
</body>
</html>