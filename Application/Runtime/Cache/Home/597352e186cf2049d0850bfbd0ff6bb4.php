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
        <li class="active">建议反馈</li>
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
                <li><a href="tickling.html" class="active">建议反馈</a></li>
            </ul>
            <ul>
                <li class="title"><i class="glyphicon glyphicon-credit-card"></i>资产中心</li>
                <!--<li><a href="">我的余额</a></li>-->
                <li><a href="coupon.html">我的优惠券</a></li>
            </ul>
            <ul>
                <li class="title"><i class="glyphicon glyphicon-cloud"></i>服务中心</li>
                <li><a href="">退款/退换货跟踪</a></li>
                <li><a href="">意外保</a></li>
            </ul>
        </div>
        <div class="col-xs-6 col-md-10 col-lg-10">
            <div class="col-xs-12 col-md-11 col-lg-11 service-continer">
                <div class="col-xs-12 col-md-2 col-lg-2">
                    <img src="/Public/img/s1.png" class="img-rounded img-responsive">
                </div>
                <div class="col-xs-12 col-md-7 col-lg-7">
                    <h4 class="col-xs-12 col-md-11 col-lg-11 padding-top-10">
                        <p>亲爱的友友:</p>
                        <p>为了更好的为您提供优质的购物体验,若你有任何的意见或建议,欢迎及时反馈,我们将对您提出的问题不断改进.谢谢您一直以来的支持和陪伴.有您的加入我们明天回更好!</p>
                        <p class="pull-right">魅族商城</p>
                    </h4>
                </div>
            </div>
            <div class="col-xs-12 col-md-11 col-lg-11">
                <form action="<?php echo U('user/add_question');?>" role="form" class="form-adddress" autocomplete="off">
                    <div class="form-group">
                        <label>提出的问题类型<span class="text-danger">&nbsp;*</span></label>
                        <select name="type" id="type" class="form-control">
                            <option value="-1">请选择问题类型</option>
                            <option value="1">购物体验</option>
                            <option value="2">支付流程</option>
                            <option value="3">活动建议</option>
                            <option value="4">商品建议</option>
                            <option value="5">其他建议</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>详细的问题描述<span class="text-danger">&nbsp;*</span></label>
                        <textarea name="question" id="question" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="col-xs-5 col-md-2 col-lg-2 register-button">提价</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="/Public/plug/jquery.validate/jquery.validate.min.js" type="text/javascript"></script>
<script src="/Public/plug/jquery.validate/my.rules.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function(){
        $('form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                question: {
                    required: true
                }
            },
            messages: { // custom messages for radio buttons and checkboxes
                question: {
                    required: "请输入您的问题"
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
                element.parent('div').append(error);
            }
        });

        $('form').submit(function(e){
            e.preventDefault();
            if($('form').valid()){
            	if($('select[name="type"]').val() ==-1){
            		layer.alert("请选择问题类型",{icon:11});
            		return false;
            	}
                var index = layer.load(2,{
					shade: [0.5,'#000'] //0.1透明度的白色背景
				});
				var json = $('form').serialize();
				$.post($(this).attr('action'),json,function(result){
					layer.close(index);
					if(result.status==1){
						layer.alert(result.msg,{icon:1,end:function(){
							$('form')[0].reset();
						}});
					}else{
						layer.alert(result.msg,{icon:11});
					}
				});
            }
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