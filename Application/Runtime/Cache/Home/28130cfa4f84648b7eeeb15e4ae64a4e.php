<?php if (!defined('THINK_PATH')) exit();?><link rel="stylesheet" href="/Public/plug/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/Public/css/base.css"/>
<link rel="stylesheet" type="text/css" href="/Public/plug/Font-Awesome-3.2.1/css/font-awesome.min.css"/>
<script src="/Public/js/jquery-1.10.1.min.js"></script>
<script src="/Public/plug/bootstrap/js/bootstrap.min.js"></script>
<script src="/Public/plug/layer/layer.js" type="text/javascript"></script>
<div class="col-xs-12 col-md-12">
	<div>
		<p id="swfContainer">本组件需要安装Flash Player后才可使用，请从<a href="http://www.adobe.com/go/getflashplayer">这里</a>下载安装。</p>
	</div>
</div>
<script type="text/javascript">
	var full_swf_url='/Public/plug/fullAvatarEditor-2.0/fullAvatarEditor.swf';  
    //同上，避免找不到swf文件，在这里写了之后还要把fullAvatarEditor.js文件的75行下加上  
    //file = full_swf_url;expressInstall    = ex_swf_url;不然这里路径是对的也没用  
    var ex_swf_url='/Public/plug/fullAvatarEditor-2.0/expressInstall.swf';  
</script>
<script type="text/javascript" src="/Public/plug/fullAvatarEditor-2.0/scripts/swfobject.js"></script>
<script type="text/javascript" src="/Public/plug/fullAvatarEditor-2.0/scripts/fullAvatarEditor.js"></script>
<script type="text/javascript"> 
    swfobject.addDomLoadEvent(function () {
        var swf = new fullAvatarEditor("swfContainer", {
			    id: 'swf',
			    file:full_swf_url,
			    expressInstall:ex_swf_url,
				upload_url:'<?php echo U("user/upfile");?>',
				src_upload:2,
				avatar_sizes:'100*100|50*50|32*32',//上传图片的大小,保存多个不同大小的可以用|号隔开  
        		avatar_field_names:'img_1|img_2|img_3'//上传过去的file变量的名称  
			}, function (msg) {
				
				switch(msg.code){
					//case 1 : alert($('#user_head',window.top.document).attr('src'));break;
					//case 2 : alert("已成功加载默认指定的图片到编辑面板。");break;
					case 3 :
						if(msg.type == 1){
							//layer.alert("摄像头已准备就绪但用户未允许使用",{icon:11});
						}
						else{
							//layer.alert("摄像头被占用",{icon:11});
						}
					break;
					case 5 : 
						if(msg.type == 0){
                            layer.alert(msg.content.msg,{icon:1,end:function(){
								//window.top.location.href = "<?php echo U('user/userinfo');?>";
								$('#user_head',window.top.document).attr('src',msg.content.avatarUrls.img_1);
								layer.closeIfream();
							}});
                        }
					break;
				}
			}
		);
    });
</script>