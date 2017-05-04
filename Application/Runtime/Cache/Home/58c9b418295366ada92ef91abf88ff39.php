<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>魅族官网-魅族智能手机官方网站</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="/Public/plug/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/plug/Font-Awesome-3.2.1/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/css/base.css"/>
    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script src="/Public/js/jquery-1.10.1.min.js"></script>
    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="/Public/plug/bootstrap/js/bootstrap.js"></script>
    <script src="/Public/js/jquery.SuperSlide.2.1.1.js"></script>
</head>
<body  data-spy="scroll" data-target=".pin-link" data-offset="50" id="myScrollspy">
<header class="container-fluid margin-top-20 navbar1">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-lg-8 col-md-8">
                <ul class="list-inline list-items list-margin">
                    <li><a href="<?php echo ($site["url"]); ?>"><?php echo ($site["title"]); ?>首页</a></li>
                    <li><a href="<?php echo U('/shop');?>"><?php echo ($site["title"]); ?></a></li>
                    <li><a href="#2">服务</a></li>
                    <li><a href="#3">社区</a></li>
                    <li><a href="<?php echo U('/about');?>">关于我们</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-lg-4 col-md-4 text-right">
                <ul class="list-inline list-items">
                    <li><a href="<?php echo U('/message');?>">消息</a></li>
                    <li><a href="<?php echo U('/enshrine');?>">我的收藏</a></li>
                    <li><a href="<?php echo U('/order');?>">我的订单</a></li>
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
<link rel="stylesheet" type="text/css" href="/Public/plug/Font-Awesome-3.2.1/css/layout.css"/>
<div class="thumbnailb">
    <div class="fullSlide1">
        <div class="bd">
            <ul>
                <?php  $_result_content=M("Ad")->field("*")->where("column_id = 0 and status = 0")->order("")->limit("6")->select(); $myad=$_result_content; if(is_array($myad)): $i = 0; $__LIST__ = $myad;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ad): $mod = ($i % 2 );++$i;?><li style="background:url(<?php echo ($ad["image"]); ?>) center 0 no-repeat;" data-image="<?php echo ($ad["image"]); ?>"><a  href="<?php echo ($ad["url"]); ?>" target="_blank"></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <a href="javascript:void(0);" class="prev left"></a>
            <a href="javascript:void(0);" class="next"></a>
        </div>
        <div class="hd">
            <ul></ul>
        </div>
    </div>
    <div class="container">
        <div class="nav-menu padding-top-20">
            <ul class="nav-menu-list">
                <li><a href="">全部分类</a></li>
                <?php  $parent=M("Column")->field("*")->find(); $_result_channellist=M("Column")->field("*")->where("isnav = 0 and status = 0")->order("")->limit("")->select(); $channellist=\Service\Category::unlimitedForLevel($_result_channellist); if(is_array($channellist)): $i = 0; $__LIST__ = $channellist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; $_ss = ''; ?>
                        <li>
                            <a href=""><?php echo ($vo["title"]); ?></a>
                            <div class="menu-content">
                                <div class="col-xs-12 col-md-8 col-lg-8 product-content">
                                	<?php if(is_array($vo["child"])): $i = 0; $__LIST__ = $vo["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><div class="col-xs-12 col-md-6 col-lg-6">
	                                        <img src="<?php echo ($vo1["image"]); ?>" width="108"  alt="<?php echo ($vo1["title"]); ?>" class="img-rounded"/>
	                                        <a href=""><?php echo ($vo1["title"]); ?></a>
	                                    </div>
                                        <?php $_ss .= ','.$vo1['id']; endforeach; endif; else: echo "" ;endif; ?>
                                </div>
                                <?php $_ss =substr($_ss,1); ?>
                                <div class="col-xs-0 col-md-4 col-lg-4 text-center">
                                    <div class="push-title col-md-12">
                                        <span class="line left"></span>
                                        <h4 class="push">本周推荐</h4>
                                        <span class="line right"></span>
                                    </div>
                                    <div class="col-md-12 col-lg-12">
                                        <div class="push-content">
                                        	<?php $day = get_first_last_week_day(); $first = strtotime($day['first']); $last = strtotime($day['last']); $__list = M('Article')->where("column_id in ($_ss) and status=0 and head=1 and date between $first and $last")->limit(2)->order('date desc')->select(); ?>
                                        	<?php if(is_array($$__list)): $i = 0; $__LIST__ = $$__list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('/detail/'.$vo['id']);?>">
				        							<img src="$vo['image']" class="img-rounded"/>
				        						</a><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
</div>
<div class="container">
    <div class="row margin-top-20 product-list">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <h1>热品推荐</h1>
            <div class="picScroll-left">
                <div class="hd">
                    <i class="icon-chevron-left next"></i>
                    <i class="icon-chevron-right prev"></i>
                </div>
                <div class="bd">
                    <div class="tempWrap" style="overflow:hidden; position:relative;">
                        <ul class="picList">
                            <?php $_list_news=M(Article)->field("*")->where("top = 1 and status = 0")->limit(8)->order("date desc")->select();$_column=M("Column")->find();$column=$_column; $key=0;foreach ($_list_news as $_list_value):$list=$_list_value;++$key;?><li>
                                    <div class="pic">
                                        <a href="<?php echo U('/detail/'.$list['id']);?>" target="_blank"><img src="<?php echo ($list["image"]); ?>"></a>
                                        <div class="title"><a href="<?php echo U('/detail/'.$list['id']);?>" target="_blank"><?php echo ($list["title"]); ?></a></div>
                                    </div>
                                </li><?php endforeach ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="nav-content">
    <div class="container">
        <div class="row">
            <div class="product-block margin-top-10">
                <div class="col-xs-12 col-md-12 col-lg-12 product-block-title" id="first">
                    <h3 class="text-first"><span class="">1F</span>为您推荐</h3>
                    <a href=""><i class="icon-circle-arrow-right"></i>&nbsp;更多</a>
                </div>
                <div class="col-xs-12 col-md-12 col-lg-12 text-center product-block-content">
                    <?php $_list_news=M(Article)->field("*")->where("new = 1 and status = 0")->limit(6)->order("date desc")->select();$_column=M("Column")->find();$column=$_column; $key=0;foreach ($_list_news as $_list_value):$list=$_list_value;++$key;?><li>
                            <div class="pic">
                                <a href="<?php echo U('/detail/'.$list['id']);?>" target="_blank"><img src="<?php echo ($list["image"]); ?>"></a>
                                <div class="title"><a href="<?php echo U('/detail/'.$list['id']);?>" target="_blank"><?php echo ($list["title"]); ?></a></div>
                            </div>
                        </li>
                        <div class="col-xs-6 col-md-3 col-lg-3 product-block-content-items">
                            <?php if(($list["new_product"]) == "1"): ?><span class="badge bg-badge bg-new">新品</span><?php endif; ?>
                            <?php if(($list["hot_product"]) == "1"): ?><span class="badge bg-badge bg-hot">热卖</span><?php endif; ?>
                            <?php if(($list["sales_product"]) == "1"): ?><span class="badge bg-badge bg-sales">促销</span><?php endif; ?>
                            <?php if(($list["limitation_product"]) == "1"): ?><span class="badge bg-badge bg-limitation">限量</span><?php endif; ?>
                            <div class="product-block-content-desc">
                                <a href="<?php echo U('/detail/'.$list['id']);?>">
                                    <img src="<?php echo ($list["image"]); ?>" alt="" class="img-rounded" />
                                    <h4><?php echo ($list["title"]); ?></h4>
                                    <p><?php echo ($list["description"]); ?></p>
                                    <p class="text-danger"><i class="icon-money"></i>:<?php echo ($list["tprice"]); ?>￥</p>
                                </a>
                            </div>
                        </div><?php endforeach ?>
                </div>
            </div>
            <div class="product-block margin-top-10">
                <div class="col-xs-12 col-md-12 col-lg-12 product-block-title" id="secend">
                    <h3 class="text-secend"><span class="">2F</span>服装</h3>
                    <a href=""><i class="icon-circle-arrow-right"></i>&nbsp;更多</a>
                </div>
                <div class="col-xs-12 col-md-12 col-lg-12 text-center product-block-content">
                    <?php $_list_news=M(Article)->field("*")->where("com = 1 and status = 0 and column_id in (3,4,5,2)")->limit(6)->order("date desc")->select();$_column=M("Column")->find(2);$column=$_column; $key=0;foreach ($_list_news as $_list_value):$list=$_list_value;++$key;?><li>
                            <div class="pic">
                                <a href="<?php echo U('/detail/'.$list['id']);?>" target="_blank"><img src="<?php echo ($list["image"]); ?>"></a>
                                <div class="title"><a href="<?php echo U('/detail/'.$list['id']);?>" target="_blank"><?php echo ($list["title"]); ?></a></div>
                            </div>
                        </li>
                        <div class="col-xs-6 col-md-3 col-lg-3 product-block-content-items">
                            <?php if(($list["new_product"]) == "1"): ?><span class="badge bg-badge bg-new">新品</span><?php endif; ?>
                            <?php if(($list["hot_product"]) == "1"): ?><span class="badge bg-badge bg-hot">热卖</span><?php endif; ?>
                            <?php if(($list["sales_product"]) == "1"): ?><span class="badge bg-badge bg-sales">促销</span><?php endif; ?>
                            <?php if(($list["limitation_product"]) == "1"): ?><span class="badge bg-badge bg-limitation">限量</span><?php endif; ?>
                            <div class="product-block-content-desc">
                                <a href="<?php echo U('/detail/'.$list['id']);?>">
                                    <img src="<?php echo ($list["image"]); ?>" alt="" class="img-rounded" />
                                    <h4><?php echo ($list["title"]); ?></h4>
                                    <p><?php echo ($list["description"]); ?></p>
                                    <p class="text-danger"><i class="icon-money"></i>:<?php echo ($list["tprice"]); ?>￥</p>
                                </a>
                            </div>
                        </div><?php endforeach ?>
                </div>
            </div>
            <div class="product-block margin-top-10" >
                <div class="col-xs-12 col-md-12 col-lg-12 product-block-title" id="third">
                    <h3 class="text-third"><span class="">3F</span>鞋靴</h3>
                    <a href=""><i class="icon-circle-arrow-right"></i>&nbsp;更多</a>
                </div>
                <div class="col-xs-12 col-md-12 col-lg-12 text-center product-block-content">
                    <?php $_list_news=M(Article)->field("*")->where("com = 1 and status = 0 and column_id in (7,8,9,10,11,6)")->limit(6)->order("date desc")->select();$_column=M("Column")->find(6);$column=$_column; $key=0;foreach ($_list_news as $_list_value):$list=$_list_value;++$key;?><li>
                            <div class="pic">
                                <a href="<?php echo U('/detail/'.$list['id']);?>" target="_blank"><img src="<?php echo ($list["image"]); ?>"></a>
                                <div class="title"><a href="<?php echo U('/detail/'.$list['id']);?>" target="_blank"><?php echo ($list["title"]); ?></a></div>
                            </div>
                        </li>
                        <div class="col-xs-6 col-md-3 col-lg-3 product-block-content-items">
                            <?php if(($list["new_product"]) == "1"): ?><span class="badge bg-badge bg-new">新品</span><?php endif; ?>
                            <?php if(($list["hot_product"]) == "1"): ?><span class="badge bg-badge bg-hot">热卖</span><?php endif; ?>
                            <?php if(($list["sales_product"]) == "1"): ?><span class="badge bg-badge bg-sales">促销</span><?php endif; ?>
                            <?php if(($list["limitation_product"]) == "1"): ?><span class="badge bg-badge bg-limitation">限量</span><?php endif; ?>
                            <div class="product-block-content-desc">
                                <a href="<?php echo U('/detail/'.$list['id']);?>">
                                    <img src="<?php echo ($list["image"]); ?>" alt="" class="img-rounded" />
                                    <h4><?php echo ($list["title"]); ?></h4>
                                    <p><?php echo ($list["description"]); ?></p>
                                    <p class="text-danger"><i class="icon-money"></i>:<?php echo ($list["tprice"]); ?>￥</p>
                                </a>
                            </div>
                        </div><?php endforeach ?>
                </div>
            </div>
            <div class="product-block margin-top-10">
                <div class="col-xs-12 col-md-12 col-lg-12 product-block-title" id="four">
                    <h3 class="text-four"><span class="">4F</span>箱包</h3>
                    <a href=""><i class="icon-circle-arrow-right"></i>&nbsp;更多</a>
                </div>
                <div class="col-xs-12 col-md-12 col-lg-12 text-center product-block-content">
                    <?php $_list_news=M(Article)->field("*")->where("com = 1 and status = 0 and column_id in (13,14,15,16,17,12)")->limit(6)->order("date desc")->select();$_column=M("Column")->find(12);$column=$_column; $key=0;foreach ($_list_news as $_list_value):$list=$_list_value;++$key;?><li>
                            <div class="pic">
                                <a href="<?php echo U('/detail/'.$list['id']);?>" target="_blank"><img src="<?php echo ($list["image"]); ?>"></a>
                                <div class="title"><a href="<?php echo U('/detail/'.$list['id']);?>" target="_blank"><?php echo ($list["title"]); ?></a></div>
                            </div>
                        </li>
                        <div class="col-xs-6 col-md-3 col-lg-3 product-block-content-items">
                            <?php if(($list["new_product"]) == "1"): ?><span class="badge bg-badge bg-new">新品</span><?php endif; ?>
                            <?php if(($list["hot_product"]) == "1"): ?><span class="badge bg-badge bg-hot">热卖</span><?php endif; ?>
                            <?php if(($list["sales_product"]) == "1"): ?><span class="badge bg-badge bg-sales">促销</span><?php endif; ?>
                            <?php if(($list["limitation_product"]) == "1"): ?><span class="badge bg-badge bg-limitation">限量</span><?php endif; ?>
                            <div class="product-block-content-desc">
                                <a href="<?php echo U('/detail/'.$list['id']);?>">
                                    <img src="<?php echo ($list["image"]); ?>" alt="" class="img-rounded" />
                                    <h4><?php echo ($list["title"]); ?></h4>
                                    <p><?php echo ($list["description"]); ?></p>
                                    <p class="text-danger"><i class="icon-money"></i>:<?php echo ($list["tprice"]); ?>￥</p>
                                </a>
                            </div>
                        </div><?php endforeach ?>
                </div>
            </div>
            <div class="product-block margin-top-10">
                <div class="col-xs-12 col-md-12 col-lg-12 product-block-title" id="five">
                    <h3 class="text-five"><span class="">5F</span>家电</h3>
                    <a href=""><i class="icon-circle-arrow-right"></i>&nbsp;更多</a>
                </div>
                <div class="col-xs-12 col-md-12 col-lg-12 text-center product-block-content">
                    <?php $_list_news=M(Article)->field("*")->where("com = 1 and status = 0 and column_id in (19,18)")->limit(6)->order("date desc")->select();$_column=M("Column")->find(18);$column=$_column; $key=0;foreach ($_list_news as $_list_value):$list=$_list_value;++$key;?><li>
                            <div class="pic">
                                <a href="<?php echo U('/detail/'.$list['id']);?>" target="_blank"><img src="<?php echo ($list["image"]); ?>"></a>
                                <div class="title"><a href="<?php echo U('/detail/'.$list['id']);?>" target="_blank"><?php echo ($list["title"]); ?></a></div>
                            </div>
                        </li>
                        <div class="col-xs-6 col-md-3 col-lg-3 product-block-content-items">
                            <?php if(($list["new_product"]) == "1"): ?><span class="badge bg-badge bg-new">新品</span><?php endif; ?>
                            <?php if(($list["hot_product"]) == "1"): ?><span class="badge bg-badge bg-hot">热卖</span><?php endif; ?>
                            <?php if(($list["sales_product"]) == "1"): ?><span class="badge bg-badge bg-sales">促销</span><?php endif; ?>
                            <?php if(($list["limitation_product"]) == "1"): ?><span class="badge bg-badge bg-limitation">限量</span><?php endif; ?>
                            <div class="product-block-content-desc">
                                <a href="<?php echo U('/detail/'.$list['id']);?>">
                                    <img src="<?php echo ($list["image"]); ?>" alt="" class="img-rounded" />
                                    <h4><?php echo ($list["title"]); ?></h4>
                                    <p><?php echo ($list["description"]); ?></p>
                                    <p class="text-danger"><i class="icon-money"></i>:<?php echo ($list["tprice"]); ?>￥</p>
                                </a>
                            </div>
                        </div><?php endforeach ?>
                </div>
            </div>
            <div class="product-block margin-top-10">
                <div class="col-xs-12 col-md-12 col-lg-12 product-block-title" id="six">
                    <h3 class="text-six"><span class="">6F</span>食品</h3>
                    <a href=""><i class="icon-circle-arrow-right"></i>&nbsp;更多</a>
                </div>
                <div class="col-xs-12 col-md-12 col-lg-12 text-center product-block-content">
                    <?php $_list_news=M(Article)->field("*")->where("com = 1 and status = 0 and column_id in (26,27,28,29,20)")->limit(6)->order("date desc")->select();$_column=M("Column")->find(20);$column=$_column; $key=0;foreach ($_list_news as $_list_value):$list=$_list_value;++$key;?><li>
                            <div class="pic">
                                <a href="<?php echo U('/detail/'.$list['id']);?>" target="_blank"><img src="<?php echo ($list["image"]); ?>"></a>
                                <div class="title"><a href="<?php echo U('/detail/'.$list['id']);?>" target="_blank"><?php echo ($list["title"]); ?></a></div>
                            </div>
                        </li>
                        <div class="col-xs-6 col-md-3 col-lg-3 product-block-content-items">
                            <?php if(($list["new_product"]) == "1"): ?><span class="badge bg-badge bg-new">新品</span><?php endif; ?>
                            <?php if(($list["hot_product"]) == "1"): ?><span class="badge bg-badge bg-hot">热卖</span><?php endif; ?>
                            <?php if(($list["sales_product"]) == "1"): ?><span class="badge bg-badge bg-sales">促销</span><?php endif; ?>
                            <?php if(($list["limitation_product"]) == "1"): ?><span class="badge bg-badge bg-limitation">限量</span><?php endif; ?>
                            <div class="product-block-content-desc">
                                <a href="<?php echo U('/detail/'.$list['id']);?>">
                                    <img src="<?php echo ($list["image"]); ?>" alt="" class="img-rounded" />
                                    <h4><?php echo ($list["title"]); ?></h4>
                                    <p><?php echo ($list["description"]); ?></p>
                                    <p class="text-danger"><i class="icon-money"></i>:<?php echo ($list["tprice"]); ?>￥</p>
                                </a>
                            </div>
                        </div><?php endforeach ?>
                </div>
            </div>
            <div class="product-block margin-top-10">
                <div class="col-xs-12 col-md-12 col-lg-12 product-block-title" id="seven">
                    <h3 class="text-seven"><span class="">7F</span>户外</h3>
                    <a href=""><i class="icon-circle-arrow-right"></i>&nbsp;更多</a>
                </div>
                <div class="col-xs-12 col-md-12 col-lg-12 text-center product-block-content">
                    <?php $_list_news=M(Article)->field("*")->where("com = 1 and status = 0 and column_id in (22,23,24,25,21)")->limit(6)->order("date desc")->select();$_column=M("Column")->find(21);$column=$_column; $key=0;foreach ($_list_news as $_list_value):$list=$_list_value;++$key;?><li>
                            <div class="pic">
                                <a href="<?php echo U('/detail/'.$list['id']);?>" target="_blank"><img src="<?php echo ($list["image"]); ?>"></a>
                                <div class="title"><a href="<?php echo U('/detail/'.$list['id']);?>" target="_blank"><?php echo ($list["title"]); ?></a></div>
                            </div>
                        </li>
                        <div class="col-xs-6 col-md-3 col-lg-3 product-block-content-items">
                            <?php if(($list["new_product"]) == "1"): ?><span class="badge bg-badge bg-new">新品</span><?php endif; ?>
                            <?php if(($list["hot_product"]) == "1"): ?><span class="badge bg-badge bg-hot">热卖</span><?php endif; ?>
                            <?php if(($list["sales_product"]) == "1"): ?><span class="badge bg-badge bg-sales">促销</span><?php endif; ?>
                            <?php if(($list["limitation_product"]) == "1"): ?><span class="badge bg-badge bg-limitation">限量</span><?php endif; ?>
                            <div class="product-block-content-desc">
                                <a href="<?php echo U('/detail/'.$list['id']);?>">
                                    <img src="<?php echo ($list["image"]); ?>" alt="" class="img-rounded" />
                                    <h4><?php echo ($list["title"]); ?></h4>
                                    <p><?php echo ($list["description"]); ?></p>
                                    <p class="text-danger"><i class="icon-money"></i>:<?php echo ($list["tprice"]); ?>￥</p>
                                </a>
                            </div>
                        </div><?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
    <div class="pinlink navbar-example" id="navbar-example">
        <div class="pin-link">
            <ul class="nav">
                <li class="active">
                    <a href="#first">
                        <div class="floor">1F</div>
                        <div class="title">为您推荐</div>
                    </a>
                </li>
                <li>
                    <a href="#secend">
                        <div class="floor">2F</div>
                        <div class="title">服装</div>
                    </a>
                </li>
                <li>
                    <a href="#third">
                        <div class="floor">3F</div>
                        <div class="title">鞋袜</div>
                    </a>
                </li>
                <li>
                    <a href="#four">
                        <div class="floor">4F</div>
                        <div class="title">箱包</div>
                    </a>
                </li>
                <li>
                    <a href="#five">
                        <div class="floor">5F</div>
                        <div class="title">家电</div>
                    </a>
                </li>
                <li>
                    <a href="#six">
                        <div class="floor">6F</div>
                        <div class="title">食品</div>
                    </a>
                </li>
                <li>
                    <a href="#seven">
                        <div class="floor">7F</div>
                        <div class="title">户外</div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<script type="text/javascript" src="/Public/plug/jquery-pin/jquery.pin.js"></script>
<script src="/Public/js/jquery.scrollToTop.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="/Public/plug/rgbaster.js"></script>
<script type="text/javascript">
    $(function(){
        $(".side ul li").hover(function(){
            $(this).find(".sidebox").stop().animate({"width":"124px"},200).css({"opacity":"1","filter":"Alpha(opacity=100)","background":"#ae1c1c"})
        },function(){
            $(this).find(".sidebox").stop().animate({"width":"54px"},200).css({"opacity":"0.8","filter":"Alpha(opacity=80)","background":"#000"})
        });

        var pin_top = $('#first').offset().top - $('.pinlink').height()/2;
        var pin_left = $('.picScroll-left').offset().left-$('.pinlink').width()-10;

        $(".pin-link").pin({
            containerSelector: ".nav-content"
        });

        $('.pinlink').css({'top':pin_top+'px','left':pin_left+'px'});

        var width = $('.nav-menu').width();
        var left = $('.nav-menu').offset().left;
        $('a.left').css('left',left+width+"px");

        var pull_left = $('.product-block:first').offset().left+$('.product-block:first').width()+20;
        $('#Fixed').css('left',pull_left+'px');

		$(".fullSlide1").slide({ 
            titCell:".hd ul", 
            mainCell:".bd ul", 
            effect:"fold",  
            autoPlay:true, 
            autoPage:true, 
            trigger:"click" ,
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

        $(".picScroll-left").slide({
            titCell:".hd ul",
            mainCell:".bd ul",
            autoPage:true,
            effect:"left",
            autoPlay:true,
            vis:6
        });

        $('.nav-menu-list li').hover(function(){
            $(this).addClass('active');
            $(this).find('.menu-content').show();
        },function(){
            $(this).removeClass('active');
            $(this).find('.menu-content').hide();
        });

        $('.list-items-position-relative').hover(function(){
            $(this).find('ul').show();
        },function(){
            $(this).find('ul').hide();
        });

        $(window).bind('scroll', {
            fixedOffsetBottom: parseInt($('.scroll-top').css('bottom')),
            fiexdElement:$('.scroll').children('div').attr('id')
        },function(e) {
            var top = $('.product-block:first').offset().top;
            var scrollTop = $(window).scrollTop();
            if(scrollTop<top){
                $('.pin-link ul li:first').addClass('active first');
            }
            if(scrollTop>300){
                $('#goTop').show()
            }else{
                $('#goTop').hide();
            }
        });

        $('#goTop').click(function() {
            $('body,html').stop().animate({
                'scrollTop': 0,
                'duration': 500,
                'easing': 'ease-in'
            })
        });

        $(".pin-link ul li a").click(function(){
            var href = $(this).attr("href");
            var pos = $(href).offset().top;
            $("html,body").animate({scrollTop: pos}, 500);
            return false;
        });

        $('#myScrollspy').on('activate.bs.scrollspy', function () {
            var currentItem = $(".nav li.active > a").attr('href');
            var className = currentItem.replace('#','');
            $('#'+className).children('h3').addClass('text-'+className);
            $(".nav li.active").addClass(className);
        });
    });
</script>
<footer class="container margin-top-20 " id="newBottomHtml">
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <div class="col-xs-6 col-lg-3 col-md-3 text-center">
                <i class="layout-font layout-font-foot1"></i>
                <h5><b>7天</b>&nbsp;无理由退货</h5>
            </div>
            <div class="col-xs-6 col-lg-3 col-md-3 text-center">
                <i class="layout-font layout-font-foot2"></i>
                <h5><b>15天</b>&nbsp;换货保障</h5>
            </div>
            <div class="col-xs-6 col-lg-3 col-md-3 text-center">
                <i class="layout-font layout-font-foot4"></i>
                <h5><b>百城</b>&nbsp;速达</h5>
            </div>
            <div class="col-xs-6 col-lg-3 col-md-3 text-center">
                <i class="layout-font layout-font-foot5"></i>
                <h5><b>满150</b>&nbsp;包邮</h5>
            </div>
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col-xs-12 col-lg-10 col-md-10">
            <div class="col-xs-6 col-lg-3 col-md-3 margin-none padding-none">
                <h5>魅族商城</h5>
                <ul class="list-style list-items">
                    <li><a href="">MX6</a></li>
                    <li><a href="">PRO 6</a></li>
                    <li><a href="">魅蓝 E</a></li>
                    <li><a href="">魅蓝 3s</a></li>
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
                <h5>爱码通道</h5>
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
        </div>
        <div class="col-xs-12 col-lg-2 col-md-2 text-right">
            <span>24小时全国服务热线</span>
            <h3>400-788-3333</h3>
            <a href="javascript:void(0);" class="sevice">24小时在线客服</a>
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col-xs-12 col-lg-12 col-md-12">
            <div class="col-xs-12 col-md-9 col-lg-9">
                <p class="footer-copyright">
                    <a href="">粤ICP备13003602号-2</a>
                    <a href="">粤B2-20130198</a>
                    <a href="">营业执照</a>
                    <a href="">法律声明</a>
                </p>
                <p class="footer-copyright">
                    ©2016 Meizu Telecom Equipment Co., Ltd. All rights reserved.
                </p>
            </div>
            <div class="col-xs-12 col-md-3 col-lg-3 text-right">
                <span class="">关注我们:</span>
            </div>
        </div>
    </div>
</footer>
<div class="side" id="side">
    <ul>
        <li>
            <a href="#"><div class="sidebox"><img src="/Public/img/side_icon01.png">客服中心</div></a>
        </li>
        <li class="side-sub">
            <a href="#"><div class="sidebox" ><i class="icon-qrcode"></i>微信</div></a>
            <ul class="side-sub-item">
                <li><img src="/Public/img/qrcode.png"/></li>
                <li><img src="/Public/img/qrcode.png"/></li>
                <li><img src="/Public/img/qrcode.png"/></li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0);" ><div class="sidebox"><img src="/Public/img/side_icon04.png">QQ客服</div></a>
        </li>
        <li>
            <a href="javascript:void(0);" ><div class="sidebox"><img src="/Public/img/side_icon03.png">新浪微博</div></a>
        </li>
        <li style="border:none;display:none;" id="goTop">
            <a href="javascript:void(0);" class="sidetop"><img src="/Public/img/side_icon05.png"></a>
        </li>
    </ul>
</div>
<script src="/Public/plug/layer/layer.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function(){
        $('.logout').click(function (e) {
            e.preventDefault();
            $.post($(this).attr('href'),function (result) {
                window.location.href =  "<?php echo U('/shop');?>";
            })
        })
    });
</script>
</body>
</html>