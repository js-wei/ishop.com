<?php if (!defined('THINK_PATH')) exit();?><link rel="stylesheet" href="/Public/plug/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/Public/css/base.css"/>
<link rel="stylesheet" type="text/css" href="/Public/plug/Font-Awesome-3.2.1/css/font-awesome.min.css"/>
<script src="/Public/js/jquery-1.10.1.min.js"></script>
<script src="/Public/plug/bootstrap/js/bootstrap.min.js"></script>
<script src="/Public/plug/layer/layer.js" type="text/javascript"></script>
<div class="container margin-top-10">
    <div class="row">
        <div class="col-xs-12 col-lg-4 col-md-4 col-lg-offset-4 col-md-offset-4 register-link register-link-bold register-link-margin">
            <form action="<?php echo U('user/setPasswordHandler');?>" role="form" autocomplete="off">
            	<div class="form-group form-group-lg padding-top-10">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="icon-lock" style="font-size:16px;"></i></div>
                        <input class="form-control" type="password" id="old_password" name="old_password" placeholder="请输入原来密码">
                    </div>
                </div>
                <div class="form-group form-group-lg padding-top-10">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="icon-lock" style="font-size:16px;"></i></div>
                        <input class="form-control" type="password" id="new_password" name="new_password" placeholder="请输入新的密码">
                    </div>
                </div>
                <div class="form-group form-group-lg padding-top-10">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="icon-lock" style="font-size:16px;"></i></div>
                        <input class="form-control" type="password" id="$omfr_password" name="comfr_password" placeholder="请输入确认密码">
                    </div>
                </div>
                <div class="form-group form-group-lg padding-top-10">
                    <div class="input-group">
                    	<div class="input-group-addon">
                    		<i class="icon-key"></i>
                    	</div>
                        <input class="form-control" type="text" id="verify" name="verify" placeholder="请输入验证码">
                        <div class="input-group-addon pointer">
                        	<img src="<?php echo U('public/verify');?>" width="110" height="32" onclick="javascript:this.src=this.src+'?_id='+Math.random()"/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button class="col-xs-12 col-md-12 col-lg-12 register-button">修改密码</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="/Public/plug/jquery.validate/jquery.validate.min.js" type="text/javascript"></script>
<script src="/Public/plug/jquery.validate/my.rules.js" type="text/javascript"></script>
<script type="text/javascript">
    var strat_flag = true;
    var countdown=60;
    $(function(){
        $('form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
            	old_password:{
            		required: true
            	},
                new_password: {
                    required: true,
                    stringCheck: true,
                    byteRangeLength: [6, 15]
                },
                comfr_password:{
                    required:true,
                    chrnum: true,
                    byteRangeLength:[6,15],
                    equalTo:"#new_password"
                },
                phone:{
                    required:true,
                    mobile:true
                },
                verify:{
                    required:true
                },
                email:{
                    required:true,
                    email:true
                }
            },
            messages: { // custom messages for radio buttons and checkboxes
            	old_password:{
            		required:"*请输入原来密码"
            	},
                new_password: {
                    required: "*请填写密码",
                    chrnum: "*密码只能包括中文字、英文字母、数字和下划线",
                    byteRangeLength: "*用户名必须在3-15个字符之间(一个中文字算2个字符)"
                },
                comfr_password:{
                    required:'*请填写密码',
                    chrnum: "*密码只能包括英文字母、数字和下划线",
                    byteRangeLength:'*长度必须在6-12之间',
                    equalTo:"*两次输入密码不一致"
                },
                phone:{
                    required:"*请填写手机号",
                    mobile:"*手机格式不正确"
                },
                verify:{
                    required:'*请填写验证码',
                },
                email:{
                    required:'*请填写邮箱',
                    email:'*邮箱格式不正确'
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
                element.parent('div').parent('div').append(error);
            }
        });

        $('form').submit(function(e){
            e.preventDefault();
            if($('form').valid()){
                var json = $('form').serialize();
                $.post($(this).attr('action'),json,function(result){
                	layer.closeAll();
                    if(result.status==1){
                        layer.alert(result.msg,{icon:1,end:function(){
                            window.top.location.href = result.redirect;
                        }});
                    }else{
                        layer.alert(result.msg,{icon:11});
                    }
                });
            }
        });
    });
</script>