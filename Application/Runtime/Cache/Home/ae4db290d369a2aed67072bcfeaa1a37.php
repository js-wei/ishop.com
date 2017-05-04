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
                        <a href="#3" class="list-items-dropdown">用户魏巍的商城<span class="caret"></span>
                            <ul class="list-items list-items-position text-left" style="display:none;">
                                <li><a href="address.html">地址管理</a></li>
                                <li><a href="coupon.html">我的优惠券</a></li>
                                <li><a href="tickling.html">问题反馈</a></li>
                                <hr class="hr" />
                                <li><a href="#1">退出</a></li>
                            </ul>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="navbar-header margin-top-20">
            <button class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse">
                <i class="glyphicon glyphicon-align-justify" style="color:#fff;"></i>
            </button>
            <a href="<?php echo ($site["url"]); ?>" class="navbar-brand logo"><img src="<?php echo ($site["image"]); ?>" alt="<?php echo ($site["title"]); ?>"></a>
        </div>
        <div class="collapse navbar-collapse navbar-right" id="example-navbar-collapse">

        </div>
    </div>
    <hr />
</header>
<div class="container margin-top-10">
    <div class="row">
        <div class="col-xs-12 col-lg-4 col-md-4 col-lg-offset-4 col-md-offset-4 register-link register-link-bold register-link-margin">
            <div class="text-center">
                <a href="login.html"   class="active">普通登录 </a>|<a href="login1.html">验证码登录</a>
            </div>
            <form action="" role="form">
                <div class="form-group form-group-lg padding-top-10">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="glyphicon glyphicon-user"></i></div>
                        <input class="form-control" type="text" placeholder="请输入账号/手机号">
                    </div>
                </div>
                <div class="form-group form-group-lg padding-top-10">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></div>
                        <input class="form-control" type="text" placeholder="请输入密码">
                    </div>
                </div>
                <div class="form-group form-group-lg padding-top-10">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="验证码">
                        <div class="input-group-addon"><img src="img/verify.png" width="120" height="32"/></div>
                    </div>

                </div>
                <div class="form-group">
                    <div class="radio" style="">
                        <label class="padding-none"><input type="checkbox">&nbsp;我已阅读并接受</label>
                        <a href="" class="fz active margin-left-none">《Flyme服务协议条款》</a>
                    </div>
                </div>
                <div class="form-group">
                    <button class="col-lg-12 col-md-12 register-button">注册</button>
                </div>
            </form>
        </div>
    </div>
</div>
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