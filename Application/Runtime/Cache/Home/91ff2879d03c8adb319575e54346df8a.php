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
        <li class="active">地址管理</li>
    </ol>
    <div class="row">
        <div class="col-xs-6 col-lg-2 col-md-2 left-section">
            <ul>
                <li class="title"><i class="glyphicon glyphicon-list-alt"></i>订单中心</li>
                <li><a href="order.html">我的订单</a></li>
            </ul>
            <ul>
                <li class="title"><i class="glyphicon glyphicon-user"></i>个人中心</li>
                <li><a href="address.html" class="active">地址管理</a></li>
                <li><a href="enshrine.html">我的收藏</a></li>
                <li><a href="message.html">消息提醒</a></li>
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
        <div class="col-xs-6 col-lg-10 col-md-10">
            <h4 class="margin-none padding-none">新增收货地址<small>（您目前已有地址<?php echo ($count); ?>个，最多还可以增加8个）</small></h4>
            <hr />
            <div class="add-address">
                <form action="<?php echo U('user/add_address');?>" class="form-horizontal form-adddress" role="form" autocomplete="off">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">收货人姓名<span class="text-danger">&nbsp;*</span></label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="name" name="name" placeholder="收货人姓名">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">收货人手机号<span class="text-danger">&nbsp;*</span></label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="收货人手机号">
                        </div>
                    </div>
                    <!--<div class="form-group">
                        <label class="col-sm-2 control-label">邮编<span class="text-danger">&nbsp;*</span></label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="请输入邮编">
                        </div>
                    </div>-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">收货人地址<span class="text-danger">&nbsp;*</span></label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="city" name="city"  readonly="readonly" value="江苏省-苏州市-姑苏区">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">详细地址<span class="text-danger">&nbsp;*</span></label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="address" name="address" placeholder="详细地址">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12 col-md-2 col-lg-2 col-md-offset-2 col-lg-offset-2">
                            <label style="line-height:24px;"><input type="checkbox" name="default" id="isDefault" value="1" style="position:relative;top:2px;"/>设为默认</label>
                            <button type="submit" class="col-xs-12 col-md-12 col-lg-12 register-button">保存</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="page-header">
                <h4>已有地址<small>（您目前已有地址<?php echo ($count); ?>个可以使用）</small></h4>
            </div>
            <table class="table table-bordered table-striped table-hover">
                <tr>
                    <td>收货人姓名</td>
                    <td>收货人地址</td>
                    <td>收货人手机号</td>
                    <td>操作</td>
                </tr>
                <?php if(is_array($address)): $i = 0; $__LIST__ = $address;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
	                    <td><?php echo ($vo["name"]); ?></td>
	                    <td><?php echo ($vo["city"]); ?>  <?php echo ($vo["address"]); if(($vo["isdefault"]) == "1"): ?><sup class="badge red">默认</sup><?php endif; ?></td>
	                    <td><?php echo ($vo["phone"]); ?></td>
	                    <td><?php if(($vo["isdefault"]) == "1"): ?><a href="javascript:void(0);" data-type = "cancel" data-id = "<?php echo ($vo["id"]); ?>" class="click">取消默认</a><?php else: ?><a href="javascript:void(0);" data-type = "set" data-id = "<?php echo ($vo["id"]); ?>" class="click">设置默认</a><?php endif; ?>|<a href="javascript:void(0);" data-type = "del" data-id = "<?php echo ($vo["id"]); ?>" class="click">删除</a></td>
	                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                
            </table>
        </div>
    </div>
</div>
<link rel="stylesheet" type="text/css" href="/Public/plug/city/city.css">
<script src="/Public/plug/city/Popt.js" type="text/javascript"></script>
<script src="/Public/plug/city/cityJson.js" type="text/javascript"></script>
<script src="/Public/plug/city/citySet.js" type="text/javascript"></script>
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
                name: {
                    required: true
                },
                address:{
                    required:true
                },
//              zipcode:{
//              	required: true
//              },
                phone:{
                    required:true,
                    isMobile:true
                }
            },
            messages: { // custom messages for radio buttons and checkboxes
                name: {
                    required: "请输入收货人"
                },
                address: {
                    required: "请输入详细地址"
                },
//              zipcode:{
//              	required: '请输入邮编'
//              },
                phone:{
                    required:"请输入收货人手机号",
                    isMobile:"手机格式不正确"
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
                var index = layer.load(2,{
					shade: [0.5,'#000'] //0.1透明度的白色背景
				});
				var json = $('form').serialize();
				$.post($(this).attr('action'),json,function(result){
					layer.close(index);
					if(result.status==1){
						layer.alert(result.msg,{icon:1,end:function(){
							window.location.href = result.redirect;
						}});
					}else{
						layer.alert(result.msg,{icon:11});
					}
				});
            }
        });
        $("#city").click(function (e) {
            SelCity(this,e);
        });
        $('.click').on('click',function(e){
        	e.preventDefault();
        	var index = layer.load(2,{
				shade: [0.5,'#000'] //0.1透明度的白色背景
			});
        	$.post('<?php echo U("user/set_address");?>',{type:$(this).attr('data-type'),id:$(this).attr('data-id')},function(result){
        		layer.close(index);
				if(result.status==1){
					layer.alert(result.msg,{icon:1,end:function(){
						window.location.href = result.redirect;
					}});
				}else if(result.status==3){
					layer.alert(result.msg,{icon:11,end:function(){
						window.location.href = result.redirect;
					}});
				}else{
					layer.alert(result.msg,{icon:11});
				}
        	});
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