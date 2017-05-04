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
        <li class="active">消息提醒</li>
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
                <li><a href="message.html"  class="active">消息提醒</a></li>
                <li><a href="tickling.html">建议反馈</a></li>
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
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#all" role="tab" data-toggle="tab">活动消息</a></li>
                <li role="presentation"><a href="#payfor" role="tab" data-toggle="tab">交易消息</a></li>
                <li role="presentation"><a href="#wait" role="tab" data-toggle="tab">系统消息</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content margin-top-20">
                <div role="tabpanel" class="tab-pane active" id="all-items">
                    <ul class="list-unstyled list-message">
                        <li>
                            <span class="time-line">2016-11-10<br/>15:20<i class="glyphicon glyphicon-record"></i></span>
                            <h5><input type="checkbox" name="index[]" />
                                <span class="text-warning">[未读]</span>【魅族商城】11.11买一得二，抢券折上折！活动时间：11月10日－11月12日<a href="">点击查看详情>></a></h5>
                            <img src="/Public/img/l1.jpg" class="img-rounded"/>
                        </li>
                        <li>
                            <span class="time-line">2016-11-10<br/>15:20<i class="glyphicon glyphicon-record"></i></span>
                            <h5><input type="checkbox" name="index[]" />
                                <span>[已读]</span>【魅族商城】11.11买一得二，抢券折上折！活动时间：11月10日－11月12日<a href="">点击查看详情>></a></h5>
                            <img src="/Public/img/l2.jpg" class="img-rounded"/>
                        </li>
                        <li>
                            <span class="time-line">2016-11-10<br/>15:20<i class="glyphicon glyphicon-record"></i></span>
                            <h5><input type="checkbox" name="index[]" />
                                <span class="text-warning">[未读]</span>【魅族商城】11.11买一得二，抢券折上折！活动时间：11月10日－11月12日<a href="">点击查看详情>></a></h5>
                            <img src="/Public/img/l3.jpg" class="img-rounded"/>
                        </li>
                    </ul>
                    <hr />
                    <div class="col-xs-12 col-md-12 col-lg-offset-1 margin-top-10">
                        <label class="padding-left-10 bold-none">
                            <input type="checkbox" name="all" id="all" value="1" class="checkbox"/>全选本页
                        </label>
                        <a href="" class="btn btn-warning"><i class="glyphicon glyphicon-eye-open"></i>&nbsp;标为已读</a>&nbsp;<a href="" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>&nbsp;删除消息</a>
                    </div>

                </div>
                <div role="tabpanel" class="tab-pane" id="payfor">
                    <div class="nothing text-center">
                        <h3>您暂无此类消息提醒！</h3>
                        <img src="/Public/img/noData.png"/>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="wait">
                    <div class="nothing text-center">
                        <h3>您暂无此类消息提醒！</h3>
                        <img src="/Public/img/noData.png"/>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-12 col-lg-12 tcdPageCode"></div>
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