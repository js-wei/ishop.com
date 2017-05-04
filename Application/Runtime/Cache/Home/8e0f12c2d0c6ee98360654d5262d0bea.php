<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>首页_<?php echo ($site["title"]); ?></title>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link rel="bookmark" href="/favicon.ico"/>
	<meta content="<?php echo ($site["description"]); ?>" name="description" />
	<meta content="<?php echo ($site["keywords"]); ?>" name="keywords" />
    <link rel="stylesheet" type="text/css" href="/Public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/Public/plug/bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="/Public/js/jquery-1.11.3.min.js"></script>
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
			<a href="<?php echo ($site["url"]); ?>" class="navbar-brand logo"><img src="<?php echo ($site["image"]); ?>" alt="LOGO"></a>
		</div>
		<div class="collapse navbar-collapse kj-nav-pro navbar-right" id="example-navbar-collapse">
			<ul class="nav navbar-nav">
				<?php if(is_array($nav_list)): $i = 0; $__LIST__ = $nav_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?><li class="navTwoBox borderB <?php if(!empty($nav["child"])): ?>dropdown<?php endif; ?>" >
						<a href="<?php if(($nav["type"]) == "6"): echo ($nav['uri']); else: echo U('/'.$nav['name']); endif; ?>" <?php if(!empty($nav["child"])): ?>class="dropdown-toggle" data-toggle="dropdown"<?php endif; ?>><?php echo ($nav["title"]); ?></a>
							<ul class="dropdown-menu">
								<?php if(is_array($nav["child"])): $i = 0; $__LIST__ = $nav["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$n_1): $mod = ($i % 2 );++$i;?><li><a href="<?php if(($n_1["type"]) == "6"): echo ($n_1['uri']); else: echo U('/'.$n_1['name']); endif; ?>"><?php echo ($n_1["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
							</ul>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>
	</div>
</div>
<?php if(!empty($carousel)): ?><div class="carousel slide jdt" id="myCarousel" data-ride="carousel" data-interval="3000">
	<div class="carousel-inner">
		<?php if(is_array($carousel)): $i = 0; $__LIST__ = $carousel;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$car): $mod = ($i % 2 );++$i;?><div class="item jdtbox1 <?php if($key == 0): ?>active<?php endif; ?>">
				<a href="<?php echo ($car["url"]); ?>"><img src="<?php echo ($car["image"]); ?>" alt="<?php echo ($car["title"]); ?>"></a>
			</div><?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
	<a href="#myCarousel" class="carousel-control left" data-slide="prev"></a>
	<a href="#myCarousel" class="carousel-control right" data-slide="next"></a>
</div><?php endif; ?>
<div class="container foot-top kj-navtabs">
<?php echo ($location); ?>
</div>
<div class="container">
    <!-- 服务 -->
    <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="thumbnail kj-service borderNone bgNone">
                <h3>贴心服务</h3>
                <img src="/Public/img/service.jpg" alt="">
                <div class="caption">
                    <p>我们会为您提供一天24小时的在线服务</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="thumbnail kj-service borderNone bgNone">
                <h3>独特方案</h3>
                <img src="/Public/img/service2.jpg" alt="">
                <div class="caption">
                    <p>专业的实施团队，根据每个项目的特点，制定出最优的实施方案。</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="thumbnail kj-service borderNone bgNone">
                <h3>特色服务</h3>
                <img src="/Public/img/service3.jpg" alt="">
                <div class="caption">
                    <p>拥有专业的技术团队，为您提供优质的服务体验。</p>
                </div>
            </div>
        </div>
    </div>
    <!-- about -->
    <div class="row">
        <div class="col-md-8 col-sm-7 col-xs-12">
            <div class="kj-title clear">
                <h4 class="pull-left">关于我们</h4>
                <a href="<?php echo U('/about');?>" class="btn btn-primary btn-xs marginT10 pull-right">more>></a>
            </div>
            <div class="kj-ab-imgbox pull-left"><img src="/Public/img/service.jpg"></div>
            <div class="kj-ab-conbox">
                <p>南京坤爵信息技术有限公司，主要从事计算机软硬件、网络工程、服务外包及档案数字化相关产业。是一家专注于档案数字化加工领域多年的高科技服务型企业。严格遵守档案数字化行业标准和保密规定，为机关企事业单位、金融、电力、报社、公检法、国土、房产、档案馆等及各类企业提供专业的数字化加工服务。公司拥有专业、先进的数字化加工设备，自主产权的数字化加工软件和丰富的行业加工管理经验，以高效、高质量和优质的服务建立起行业的品牌形象。</p>
                <p>坤爵信息总部设在南京，公司股东均为计算机专业毕业，并有多年数字化软件实施和数字化加工管理经验。下设办公室、财务部、人事部、软件部、技术部、销售部、数字化加工生产部、售后服务部等。公司由原来30多人，发展成目前拥有项目管理人员30多人、员工260多人，其中本科5人...</p>
            </div>
        </div>
        <div class="col-md-4 col-sm-5 col-xs-12">
            <div class="kj-title clear">
                <h4 class="pull-left">为什么会选择我们</h4>
            </div>
            <div class="kj-contetnbox">
				<div class="kj-conttitle">
					<p>
						<strong>宗旨与使命</strong>
					</p>
					<p>携手共进 互赢互利</p>
				</div>
				<div class="kj-conttitle">
					<p class="">
						<strong>愿景与目标</strong>
					</p>
					<p><b>愿景</b>：开拓创新、诚信敬业、精益求精
                    目标：以科学管理、服务社会、追求卓越、不断强化管理、提升技术、苦练内功、拓展市场的精神。以卓越的品质、价值和服务满足客户要求。</p>
				</div>
				<div class="kj-conttitle">
					<p>
						<strong>价值观</strong>
					</p>
					<p><b>核心价值观</b>：努力创造客户认可的产品和服务<br>
                    <b>四个基本理念：</b>客户、务实、创新、团队</p>
				</div>
            </div>
        </div>
    </div>
    <!-- 服务项目 -->
    <div class="row foot-top">
		<div class="col-md-12">
			<div class="kj-title clear">
				<h4 class="pull-left">经营范围</h4>
				<a href="<?php echo U('/archives');?>" class="btn btn-primary btn-xs marginT10 pull-right">more>></a>
			</div>
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="thumbnail borderNone bgNone">
				<img src="/Public/img/pro1.jpg">
				<div class="caption">
					<h4><a href="<?php echo U('/archives');?>">档案数字化</a></h4>
					<p>用计算机技术将模拟信号转换为数字信号的处理过程。纸质档案数字化就是采用扫描仪或数码相机等数码设备对纸质档案进行数字化加工，将其转化为存储在磁带、磁盘、光盘等载体上并能被计算机识别的数字图像或数字文本的处理过程。</p>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="thumbnail borderNone bgNone">
				<img src="/Public/img/pro2.jpg">
				<div class="caption">
					<h4><a href="<?php echo U('/filing');?>">档案管理系统</a></h4>
					<p>档案管理系统,通过建立统一的标准，规范整个文件管理，包括规范各业务系统的文件管理；构建完整的档案资源信息共享服务平台，支持档案管理全过程的信息化处理，包括：采集、移交接收、归档、存储管理、借阅利用和编研发布等等，同时逐步将业务管理模式转换为服务化管理模式，以服务模型为业务管理基础，业务流和数据流建立在以服务为模型的系统平台之上。</p>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="thumbnail borderNone bgNone">
				<img src="/Public/img/pro3.jpg">
				<div class="caption">
					<h4><a href="<?php echo U('/sis');?>">系统集成</a></h4>
					<p>通过结构化的综合布线系统和计算机网络技术，将各个分离的设备(如个人电脑)、功能和信息等集成到相互关联的、统一和协调的系统之中，使资源达到充分共享，实现集中、高效、便利的管理。系统集成应采用功能集成、BSV液晶拼接集成、综合布线、网络集成、软件界面集成等多种集成技术。</p>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="thumbnail borderNone bgNone">
				<img src="/Public/img/pro4.jpg">
				<div class="caption">
					<h4><a href="<?php echo U('/etag');?>">电子标签</a></h4>
					<p>RFID(RadioFrequencyIden—tification)即无线射频识别，常称为感应式电子晶片或感应卡、非接触卡、电子标签、电子条码等。这种容编码、识别、数据采集、自动录入和快速处理等功能于一体的新兴信息技术以其独特的技术性能，广泛应用于各行各业，迅速地改变着人们的工作方式和生产作业管理，极大地提高了生产效率，在各种应用环境中得到了广泛应用。</p>
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