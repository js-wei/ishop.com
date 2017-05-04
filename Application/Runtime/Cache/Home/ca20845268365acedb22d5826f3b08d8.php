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
        <li class="active">我的优惠券</li>
    </ol>
    <div class="row">
        <div class="col-xs-6 col-lg-2 col-md-2 left-section">
            <ul>
                <li class="title"><i class="glyphicon glyphicon-list-alt"></i>订单中心</li>
                <li><a href="order.html">我的订单</a></li>
            </ul>
            <ul>
                <li class="title"><i class="glyphicon glyphicon-user"></i>个人中心</li>
                <li><a href="address.html">地址管理</a></li>
                <li><a href="enshrine.html">我的收藏</a></li>
                <li><a href="message.html">消息提醒</a></li>
                <li><a href="tickling.html">建议反馈</a></li>
            </ul>
            <ul>
                <li class="title"><i class="glyphicon glyphicon-credit-card"></i>资产中心</li>
                <!--<li><a href="">我的余额</a></li>-->
                <li><a href="coupon.html" class="active">我的优惠券</a></li>
            </ul>
            <ul>
                <li class="title"><i class="glyphicon glyphicon-cloud"></i>服务中心</li>
                <li><a href="">退款/退换货跟踪</a></li>
                <li><a href="">意外保</a></li>
            </ul>
        </div>
        <div class="col-xs-6 col-lg-10 col-md-10">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#all" role="tab" data-toggle="tab" data-index = "1" data-type = "0" data-count = "<?php echo ($count1); ?>">可使用</a></li>
                <li role="presentation"><a href="#payfor" role="tab" data-toggle="tab" data-type = "1" data-index = "1" data-count = "<?php echo ($count2); ?>">已使用</a></li>
                <li role="presentation"><a href="#got" role="tab" data-toggle="tab" data-type = "2" data-index = "1" data-count = "<?php echo ($count3); ?>">已过期</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="all" data-type = "0" data-count = "<?php echo ($count1); ?>">
                <?php if(!empty($list)): ?><table class="table table-bordered table-responsive table-order" style="border-top:none;">
                        <tr>
                            <th style="border-top:none;">优惠券名称</th>
                            <th style="border-top:none;">优惠券类型</th>
                            <th style="border-top:none;">过期时间</th>
                            <th style="border-top:none;">是否过期</th>
                            <th style="border-top:none;">使用状态</th>
                            <th style="border-top:none;">操作</th>
                        </tr>
                        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
	                            <td>
	                                <?php echo ($vo["coupon_number"]); ?>
	                            </td>
	                            <td>
	                               	<?php echo ($vo["offset_cash"]); ?>折
	                            </td>
	                            <td>
	                               	<?php if(($vo["validity_time"]) == "1"): echo (date('Y-m-d',$vo["end_time"])); else: ?>永久<?php endif; ?>
	                            </td>
	                            <td>
	                               	<span class="text-green">未过期</span>
	                            </td>
	                            <td>
	                            	<?php if(empty($vo["order_id"])): ?><span class="text-green">未使用</span><?php else: ?><span class="text-danger">已使用</span><?php endif; ?>
	                            </td>
	                            <td><a href="" class="click">现在使用</a>|<a href="" class="click">删除优惠券</a></td>
	                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </table>
                    <div class="col-xs-12 col-md-12 col-lg-12 tcdPageCode tcdPageCode1" style="padding:0px;" data-count="<?php echo ($count1); ?>"></div>
                    <?php else: ?>
					<div class="nothing text-center">
				  		<h3>暂无相应的优惠券</h3>
				  		<img src="/Public/img/noData.png"/>
				  	</div><?php endif; ?>
                </div>
                <div role="tabpanel" class="tab-pane" id="payfor">
                </div>
                <div role="tabpanel" class="tab-pane" id="got">
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/Public/plug/jquery.page.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    $(function(){
    	//分页数据
    	var count = $('li[role="presentation"].active>a').attr('data-count')
        $(".tcdPageCode1").createPage({
            pageCount:count,
            current:<?php echo ($p); ?>,
            backFn:function(p){
            	if(p<=count){
            		var type = $('li[role="presentation"].active>a').attr('data-type');
            		var href = $('li[role="presentation"].active>a').attr('href').substr(1);
            		var index = layer.load(2,{
						shade: [0.5,'#fff'] //0.1透明度的白色背景
					});
            		$.post('<?php echo U("user/coupon");?>',{type:type,p:p},function(result){
            			layer.close(index);
            			if(result.status=1){
            				$('#'+href).empty().html(result.list);
            				$('li[role="presentation"].active>a').attr('data-index',<?php echo ($p); ?>);
            			}
            		});
            	}
            }
        });
        //请求类型
        $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
        	//当前激活项
        	var taregt = e.target.toString().split("#");
        	var type = $(this).attr('data-type');
        	var index = layer.load(2,{
				shade: [0.5,'#fff'] //0.1透明度的白色背景
			});
    		$.post('<?php echo U("user/coupon");?>',{type:type,p:1},function(result){
    			layer.close(index);
    			if(result.status=1){
    				$('#'+taregt[1]).empty().html(result.list);
    				$('li[role="presentation"].active>a').attr('data-index',<?php echo ($p); ?>);
    			}
    		});
		})
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