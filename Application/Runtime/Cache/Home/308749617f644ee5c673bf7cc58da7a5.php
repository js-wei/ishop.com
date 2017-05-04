<?php if (!defined('THINK_PATH')) exit();?><link rel="stylesheet" href="/Public/plug/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/Public/css/base.css"/>
<link rel="stylesheet" type="text/css" href="/Public/plug/Font-Awesome-3.2.1/css/font-awesome.min.css"/>
<script src="/Public/js/jquery-1.10.1.min.js"></script>
<script src="/Public/plug/bootstrap/js/bootstrap.min.js"></script>
<script src="/Public/plug/layer/layer.js" type="text/javascript"></script>
<div class="container margin-top-10">
    <div class="row">
        <div class="col-xs-12 col-lg-4 col-md-4 col-lg-offset-4 col-md-offset-4 register-link register-link-bold register-link-margin">
            <form action="<?php echo U('user/setTel');?>" role="form" autocomplete="off">
                <div class="form-group form-group-lg padding-top-10">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="icon-phone" style="font-size:12px;"></i></div>
                        <input class="form-control" type="text" id="tel" name="tel" placeholder="请输入安全手机">
                    </div>
                </div>
                <div class="form-group form-group-lg padding-top-10">
                    <div class="input-group">
                    	<div class="input-group-addon"><i class="icon-key" style="font-size:12px;"></i></div>
                        <input class="form-control" type="text" id="verify" name="verify" placeholder="验证码">
                        <div class="input-group-addon pointer">获取验证码</div>
                    </div>
                </div>
                <div class="form-group">
                    <button class="col-xs-12 col-md-12 col-lg-12 register-button">修改邮箱</button>
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
	            verify:{
	            	required:true,
	            },
	            tel:{
	            	required:true,
	            	tel:true
	            }
	        },
	        messages: { // custom messages for radio buttons and checkboxes
	            verify:{
	            	required:'*请填写验证码',
	            },
	            tel:{
	            	required:'*请填写手机号',
	            	tel:'*手机号格式不正确'
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
	        },  
	    });
		
		$('form').submit(function(e){
			e.preventDefault();
			if($('form').valid()){
				var json = $('form').serialize();
				$.post($(this).attr('action'),json,function(result){
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
		
		$('.pointer').click(function(e){
			e.preventDefault();
			var email = $(this).parent().parent().prev().find('input[type="text"]').val();
			if(email==''){
				layer.alert('请先填写手机号',{icon:11});
				return false;
			}else{
				if(strat_flag){
					settime();
					$.post('<?php echo U("user/send_tel");?>'+'?_id='+Math.random(),{mail:email},function(result){
						if(result.status==0){
							layer.alert(result.msg,{icon:11});
						}else{
							layer.alert(result.msg,{icon:1});
						}
					});
					strat_flag = false;
				}
			}
			
		});
	});
	function settime() { 
		if (countdown == 0) { 
			strat_flag = true;   
			$('.pointer').text("获取验证码"); 
			countdown = 60; 
		}else{ 
			strat_flag = false;
			$('.pointer').html("重新发送(" + countdown + ")"); 
			countdown--; 
			setTimeout(function() {
				settime();
			},1000);
		} 
	} 
</script>