<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title><?php echo ((isset($$config["title"]) && ($$config["title"] !== ""))?($$config["title"]):'首页'); ?>_PHPCMS内容管理系统</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="/Public/media/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="/Public/media/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
	<!--<link href="/Public/media/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>-->
	<link href="/Public/plug/Font-Awesome-3.2.1/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="/Public/media/css/style-metro.css" rel="stylesheet" type="text/css"/>
	<link href="/Public/media/css/style.css" rel="stylesheet" type="text/css"/>
	<link href="/Public/media/css/style-responsive.css" rel="stylesheet" type="text/css"/>
	<link href="/Public/media/css/default.css" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="/Public/media/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link rel="stylesheet" href="/Public/media/css/common.css" />
	<!-- END PAGE LEVEL STYLES -->
	<link rel="shortcut icon" href="/Public/media/image/favicon.ico" />
    <!--BEGIN JQUERY -->
    <script src="/Public/media/js/jquery-1.10.1.min.js" type="text/javascript"></script>
    <!--END JQUERY  -->
	<script type="text/javascript">
		$self='/Admin/Ad/add?id=1&amp;p=';
		$url='/Admin/Ad';
		$module ='<?php echo (MODULE_NAME); ?>';
		$controller ='<?php echo (CONTROLLER_NAME); ?>';
		$action = '<?php echo (ACTION_NAME); ?>';
	</script>
	<style>
		.inline-width{display:inline-block;}
	</style>
</head>
<body class="page-header-fixed">	
	<!-- BEGIN HEADER -->
	<div class="header navbar navbar-inverse navbar-fixed-top">
		<!-- BEGIN TOP NAVIGATION BAR -->
		<div class="navbar-inner">
			<div class="container-fluid">
				<!-- BEGIN LOGO -->
				<a class="brand" href="index.html">
				<img src="/Public/media/image/logo.png" alt="logo"/>
				</a>
				<!-- END LOGO -->
				<!-- BEGIN RESPONSIVE MENU TOGGLER -->
				<a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-list text-lg"></span>
				</a>          
				<!-- END RESPONSIVE MENU TOGGLER -->
				<!-- BEGIN TOP NAVIGATION MENU -->              
				<ul class="nav pull-right">
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<li class="dropdown user">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img alt="" src="/Public/media/image/avatar1_small.jpg" />
						<span class="username"><?php echo ((isset($user["username"]) && ($user["username"] !== ""))?($user["username"]):'Admin'); ?></span>
						<i class="icon-angle-down"></i>
						</a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo U('User/setPassword');?>"><i class="icon-lock"></i>修改密码</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo U('Login/logout');?>"><i class="icon-key"></i>退　　出</a></li>
						</ul>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
				</ul>
				<!-- END TOP NAVIGATION MENU --> 
			</div>
		</div>
		<!-- END TOP NAVIGATION BAR -->
	</div>
	<!-- END HEADER -->
<!--BEGIN FORM STYLE-->
<link rel="stylesheet" href="/Public/plug/Uploadify/uploadify.css" />
<link rel="stylesheet" type="text/css" href="/Public/media/css/datepicker.css" />
<link rel="stylesheet" type="text/css" href="/Public/media/css/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="/Public/media/css/datetimepicker.css" />
<link href="/Public/media/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="/Public/plug/Uploadify/jquery.uploadify.min.js"></script>
<link rel="stylesheet" href="//apps.bdimg.com/libs/jqueryui/1.10.4/css/jquery-ui.min.css">
<script src="//apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
<!--END FORM STYLE-->
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar nav-collapse collapse">
	<!-- BEGIN SIDEBAR MENU -->        
	<ul class="page-sidebar-menu">
		<li>
			<div class="sidebar-toggler hidden-phone"></div>
		</li>
		<li class="<?php if(($control) == "index"): ?>start active<?php endif; ?>">
			<a href="<?php echo ($site["url"]); ?>" target="_blank">
				<i class="icon-home"></i> 
				<span class="title">网站首页</span>
				<span class="selected"></span>
			</a>
		</li>
		<?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$volt): $mod = ($i % 2 );++$i;?><li class="nav">
				<a href="javascript:;">
                    <?php if(!empty($volt["ico"])): ?><i class="<?php echo ($volt["ico"]); ?>"></i>
                        <?php else: ?>
                        <i class="icon-folder-open"></i><?php endif; ?>
                    <span class="title"><?php echo ($volt["name"]); ?></span>
                    <span class="arrow"></span>
				</a>
				<?php if(!empty($volt["child"])): ?><ul class="sub-menu">
							<?php if(is_array($volt["child"])): $i = 0; $__LIST__ = $volt["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$volt1): $mod = ($i % 2 );++$i; if(!empty($volt1["child"])): ?><ul class="sub-menu">
										<li  class="nav-item">
											<a href="javascript:;">
												<?php if(!empty($volt1["ico"])): ?><i class="<?php echo ($volt1["ico"]); ?>"></i>
													<?php else: ?>
													<i class="icon-folder-open"></i><?php endif; ?>
												<span class="title"><?php echo ($volt1["name"]); ?></span>
												<span class="arrow "></span>
											</a>
											<volost name="volt1.child" id="volt2">
												<li  class="nav-item-sub">
													<a href="#">
														<?php if(!empty($volt2["ico"])): ?><i class="<?php echo ($volt2["ico"]); ?>"></i>
															<?php else: ?>
															<i class="icon-folder-open"></i><?php endif; ?>
														<?php echo ($volt2["name"]); ?>
													</a>
												</li>
											</volost>
										</li>
									</ul>
									<?php else: ?>
									<li  class="nav-item <?php if(volt.title == control and volt1.title == action): ?>active<?php endif; ?> ">
										<a href="<?php echo ($rd); ?>/<?php echo (strtolower($volt["title"])); ?>/<?php echo (strtolower($volt1["title"])); ?>">
											<?php if(!empty($volt1["ico"])): ?><i class="<?php echo ($volt1["ico"]); ?>"></i>
												<?php else: ?>
												<i class="icon-folder-open"></i><?php endif; ?>
											<?php echo ($volt1["name"]); ?>
										</a>
									</li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
						</ul>
					<?php else: ?>
						<li  class="nav">
							<a href="<?php echo ($uri); ?>/<?php echo (strtolower($volt["title"])); ?>">
								<?php if(!empty($volt["ico"])): ?><i class="<?php echo ($volt["ico"]); ?>"></i>
									<?php else: ?>
									<i class="icon-folder-open"></i><?php endif; ?>
								<?php echo ($volt["name"]); ?>
							</a>
						</li><?php endif; ?>
			</li><?php endforeach; endif; else: echo "" ;endif; ?>		
		<li  class="nav">
			<?php if(is_array($articleList)): $i = 0; $__LIST__ = $articleList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$volt): $mod = ($i % 2 );++$i;?><li class="nav">
					<a href="javascript:;">
	                    <?php if(!empty($volt["ico"])): ?><i class="<?php echo ($volt["ico"]); ?>"></i>
	                        <?php else: ?>
	                        <i class="icon-folder-open"></i><?php endif; ?>
	                    <span class="title"><?php echo ($volt["title"]); ?></span>
	                    <span class="arrow"></span>
					</a>
					<?php if(!empty($volt["child"])): ?><ul class="sub-menu">
								<?php if(is_array($volt["child"])): $i = 0; $__LIST__ = $volt["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$volt1): $mod = ($i % 2 );++$i; if(!empty($volt1["child"])): ?><ul class="sub-menu">
											<li  class="nav-item">
												<a href="javascript:;">
													<?php if(!empty($volt1["ico"])): ?><i class="<?php echo ($volt1["ico"]); ?>"></i>
														<?php else: ?>
														<i class="icon-folder-open"></i><?php endif; ?>
													<span class="title"><?php echo ($volt1["title"]); ?></span>
													<span class="arrow "></span>
												</a>
												<volost name="volt1.child" id="volt2">
													<li  class="nav-item-sub">
														<a href="<?php echo ($rd); ?>/Article/index?id=<?php echo ($volt2["id"]); ?>">
															<?php if(!empty($volt2["ico"])): ?><i class="<?php echo ($volt2["ico"]); ?>"></i>
																<?php else: ?>
																<i class="icon-folder-open"></i><?php endif; ?>
															<?php echo ($volt2["title"]); ?>
														</a>
													</li>
												</volost>
											</li>
										</ul>
										<?php else: ?>
										<li  class="nav-item <?php if(volt.title == control and volt1.title == action): ?>active<?php endif; ?> ">
											<a href="<?php if(($volt1["type"]) == "3"): echo ($rd); ?>/Single/index?id=<?php echo ($volt1["id"]); else: echo ($rd); ?>/Article/index?id=<?php echo ($volt1["id"]); endif; ?>">
												<?php if(!empty($volt1["ico"])): ?><i class="<?php echo ($volt1["ico"]); ?>"></i>
													<?php else: ?>
													<i class="icon-folder-open"></i><?php endif; ?>
												<?php echo ($volt1["title"]); ?>
											</a>
										</li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
							</ul>
						<?php else: ?>
							<li  class="nav">
								<a href="<?php echo ($uri); ?>/Article/index?id=<?php echo ($volt["id"]); ?>">
									<?php if(!empty($volt["ico"])): ?><i class="<?php echo ($volt["ico"]); ?>"></i>
										<?php else: ?>
										<i class="icon-folder-open"></i><?php endif; ?>
									<?php echo ($volt["title"]); ?>
								</a>
							</li><?php endif; ?>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
		</li>
	</ul>
	<!-- END SIDEBAR MENU -->
  </div>		

    <!-- END SIDEBAR -->
    <!-- BEGIN PAGE -->
    <div class="page-content fill-content">
        <!-- BEGIN PAGE CONTAINER-->
        <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->
            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                    <h3 class="page-title">
                        Dashboard <small>statistics and more</small>
                    </h3>
                    <ul class="breadcrumb">
                        <li>
                            <i class="icon-home"></i>
                            <a href="<?php echo U('Index/index');?>">首页</a>
                            <i class="icon-angle-right"></i>
                        </li>
                        <li>
                            <?php $column = M('column')->find($_GET['id']); ?>
                            <a href="/Admin/Ad/index?id=<?php echo ($_GET['id']); ?>"><?php echo ($column["title"]); ?></a>
                        </li>
                        <li class="pull-right no-text-shadow">
                            <div id="dashboard-report-range" class="dashboard-date-range tooltips no-tooltip-on-touch-device responsive"
                                 data-tablet="" data-desktop="tooltips" data-placement="top" data-original-title="Change dashboard date range">
                                <i class="icon-calendar"></i>
                                <span></span>
                                <i class="icon-angle-down"></i>
                            </div>
                        </li>
                    </ul>
                    <!-- END PAGE TITLE & BREADCRUMB-->
                </div>
            </div>
            <!-- END PAGE HEADER-->
            <!--BEGIN PAGER FORM-->
            <div class="row-fluid">
                <div class="span12">
                    <div class="portlet box purple">
                        <div class="portlet-title">
                            <div class="caption"><i class="icon-reorder"></i><?php echo ((isset($model["name"]) && ($model["name"] !== ""))?($model["name"]):'添加广告'); ?></div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"></a>
                                <a href="#portlet-config" data-toggle="modal" class="config"></a>
                                <a href="javascript:;" class="reload" data-role="/Public/media/image/fancybox_loading.gif" data-form="form_sample_1" data-reset="1"></a>
                                <a href="javascript:;" class="remove"></a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <form action="/Admin/Ad/add_ad" method="post" id="form_sample_4" class="form-horizontal" novalidate="novalidate"  enctype="multipart/form-data">
                                <div class="alert alert-error hide">
                                    <button class="close" data-dismiss="alert"></button>
                                    	请填写完表单在提交
                                </div>
                                <div class="alert alert-success hide">
                                    <button class="close" data-dismiss="alert"></button>
                                    	请填写完表单完成
                                </div>
                                <div class="control-group">
                                    <label class="control-label">所属栏目<span class="required">*</span></label>
                                    <div class="controls">
                                        <select name="column_id">
                                        	<option value="0">全站</option>
                                        	<?php if(is_array($column_list)): $i = 0; $__LIST__ = $column_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?><option value="<?php echo ($cate["id"]); ?>"><?php echo ($cate["html"]); echo ($cate["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">标题<span class="required">*</span></label>
                                    <div class="controls">
                                        <input type="text" name="title" id="control-name" data-required="1" class="span4 m-wrap" placeholder="标题" value="<?php echo ($article["title"]); ?>">
                                        <input type="hidden" value="<?php echo ($_GET['p']); ?>" name="p">
                                        <input type="hidden" value="<?php echo ($article["id"]); ?>" name="id">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">网址<span class="required">*</span></label>
                                    <div class="controls">
                                        <input type="url" name="url" class="span4 m-wrap" placeholder="网址" value="<?php echo ($article["url"]); ?>">
                                        <input type="hidden" value="<?php echo ($_GET['p']); ?>" name="p">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">说明</label>
                                    <div class="controls">
                                        <textarea name="description" class="span4 m-wrap" placeholder="说明"><?php echo ($article["description"]); ?></textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">广告图片</label>
                                    <div class="controls">
                                        <div>
                                            <div style="float:left; margin-top:8px;"><input type="button" name="fileImg" id="fileImg" size="16" value="上传" class="table_btn"/></div>
                                            <div class="btn mini blue" onclick="imgView('master');return false;" id="img_b"><i class="icon-zoom-in"></i></div>
                                            <div  class="btn mini red" onclick="noMasterImg()"><i class=" icon-trash" style="cursor:pointer;display:block" ></i></div>
                                            <div style="clear:both;"></div>
                                        </div>
                                        <div>
                                            <?php if(!empty($article["image"])): ?><img src="<?php echo ($article["image"]); ?>" id="images_preview" width="380" height="auto">
                                                <input type="hidden" value="<?php echo ($article["image"]); ?>" name="image" id="reply_img">
                                                <?php else: ?>
                                                <img src="" id="images_preview" width="380" height="auto" style="display:none;">
                                                <input type="hidden" name="image" id="reply_img"><?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">有效时间</label>
                                    <div class="controls">
	                                    <?php if(($article["effective"]) == "0"): ?><div class="input-append date date-picker">
												<input class="m-wrap m-ctrl-medium date-picker" id="datepicker" size="16" type="text" name="effective" value="0" />
												<span class="add-on"><i class="icon-calendar"></i></span>
											</div>
		                                    <?php else: ?>
	                                    	<div class="input-append date date-picker">
												<input class="m-wrap m-ctrl-medium date-picker" id="datepicker" size="16" type="text" name="effective" value="<?php echo (date('Y-m-d',$article["effective"])); ?>" />
												<span class="add-on"><i class="icon-calendar"></i></span>
											</div><?php endif; ?>
	                                    <div class="text-error">*0表示永久不限制</div>
	                                </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">排序</label>
                                    <div class="controls">
                                        <input type="text" name="sort" value="<?php echo ((isset($article["sort"]) && ($article["sort"] !== ""))?($article["sort"]):'100'); ?>" placeholder="控制器排序"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">状态</label>
                                    <div class="controls">
                                        <label class="radio">
                                            <input type="radio" name="status"  value="0" <?php if(($article["status"]) == "0"): ?>checked<?php else: ?> checked="checked"<?php endif; ?> >启用
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="status"  value="1" <?php if(($article["status"]) == "1"): ?>checked<?php endif; ?>>禁用
                                        </label>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn purple">提交</button>
                                    <button type="button" class="btn" onclick="window.history.go(-1);">返回</button>
                                </div>
                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>
                </div>
            </div>
            <!--END PAGER FORM-->
        </div>
        <!-- END PAGE CONTAINER-->
    </div>
    <!-- END PAGE -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="/Public/media/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="/Public/media/js/additional-methods.min.js"></script>
<script type="text/javascript" src="/Public/media/js/select2.min.js"></script>
<script type="text/javascript" src="/Public/media/js/chosen.jquery.min.js"></script>
<script type="text/javascript" src="/Public/media/js/bootstrap-datepicker.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL STYLES -->
<script type="text/javascript" src="/Public/media/js/form-validation.js"></script>
<script type="text/javascript" src="/Public/media/js/form-checked.js"></script>
<script type="text/javascript">
    $(function(){
    	$( "#datepicker" ).datepicker({
    		showButtonPanel:true,//是否显示按钮面板  
            dateFormat: 'yy-mm-dd',//日期格式  
            clearText:"清除",//清除日期的按钮名称  
            closeText:"关闭",//关闭选择框的按钮名称  
            monthNames: ['一月','二月','三月','四月','五月','六月','七月','八月','九月','十月','十一月','十二月'],  
            dayNames: ['星期日','星期一','星期二','星期三','星期四','星期五','星期六'],  
            dayNamesShort: ['周日','周一','周二','周三','周四','周五','周六'],  
            dayNamesMin: ['日','一','二','三','四','五','六'], 
    	});
        $('#form_sample_4').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-inline', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                title: {
                    required: true
                },
                url:{
                    required:true,
                    url:true
                }
            },
            messages: { // custom messages for radio buttons and checkboxes
                title: {
                    required: "字段不能为空"
                },
                url: {
                    required: "字段不能为空",
                    url:'格式不正确'
                }
            },
            highlight: function (element) { // hightlight error inputs
                $(element)
                        .closest('.help-inline').removeClass('ok'); // display OK icon
                $(element)
                        .closest('.control-group').removeClass('success').addClass('error'); // set error class to the control group
            },

            unhighlight: function (element) { // revert the change dony by hightlight
                $(element)
                        .closest('.control-group').removeClass('error'); // set error class to the control group
            },

            success: function (label) {
                label
                        .addClass('valid').addClass('help-inline ok') // mark the current input as valid and display OK icon
                        .closest('.control-group').removeClass('error').addClass('success'); // set success class to the control group
            }
        });

        $('#form_sample_4').submit(function(e){
            e.preventDefault();
            if($('#form_sample_4').valid()){
                $.post($('#form_sample_4').attr('action'),$('#form_sample_4').serialize(),function (data) {
                    if(data.status==1){
                        layer.alert(data.msg,{icon:6,end:function () {
                            location.href = data.redirect;
                        }});
                    }else {
                        layer.alert(data.msg,{icon:5});
                    }
                });
            }
        });
    });
    function imgView(pic_url){
        if(pic_url == 'master'){
            pic_url = $('#reply_img').val();
        }
        if(pic_url==''){
            layer.alert('你还没有上传图片',{icon:5});
            return false;
        }
        layer.open({
            type: 1,
            title: '查看图片',
            skin: 'layui-layer-rim', //加上边框
            area: ['500px', '400px'], //宽高
            content: "<div style='max-width:500px; max-height:400px; overflow:auto;'><img style='max-width:500px; max-height:400px; overflow:auto;' src='"+pic_url+"'  /></div>"
        });
    }

    //照片
    $("#fileImg").uploadify({
        fileTypeDesc    : '图片文件',
        fileTypeExts    : '*.png;*.jpg;*.jpeg;*.gif;',
        buttonText      : '选择图片',
        buttonClass     : 'upload_button',
        swf             : '/Public/plug/Uploadify/uploadify.swf',
        uploader        : "<?php echo U('Uploadify/uploadImg');?>",
        multi           : false,
        onUploadSuccess : function(file, data, response) {
            $("#reply_img").val(data);
            $("#images_preview").attr('src',data);
            $('#images_preview').show();
            $('#img_b').show();
            $('#img_c').show();
        }
    });
    function noMasterImg(){
        $src = $("#images_preview").attr('src');
        if($src==''){
            layer.alert('您好没有上传图片',{icon:5});
            return false;
        }
        $.post("<?php echo U('Uploadify/delmg');?>",{src:$src},function(data){
            if(data.status==1){
                layer.msg(data.msg,{icon:1});
                $("#reply_img").val('');
                $('#images_preview').attr('src','');
                $('#img_c').hide();
                $('#images_preview').hide();
            }else{
                layer.alert(data.msg,{icon:5});
            }
        });
    }
    function deleteImage(obj) {
        var url = $(obj).attr('data-path');
        if(url==''){
            layer.alert('删除图片不存在',{icon:2});
        }
        var index = layer.load(2, {
            shade: [0.4,'#fff'] //0.1透明度的白色背景
        });
        $.post("<?php echo U('Uploadify/delmg');?>",{src:url},function(data){
            if(data.status==1){
                layer.msg(data.msg,{icon:1,end:function () {
                    layer.closeAll();
                    $(obj).parent('span.imageDiv').remove();
                }});
            }else{
                layer.msg(data.msg,{icon:5});
            }
        });
    }
</script>
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN FOOTER -->
	<div class="footer">
		<div class="footer-inner">
			<?php echo ((isset($config["copyright"]) && ($config["copyright"] !== ""))?($config["copyright"]):'2013 &copy; Metronic by keenthemes.'); ?>
		</div>
		<div class="footer-tools">
			<span class="go-top">
				<i class="icon-angle-up"></i>
			</span>
		</div>
	</div>
	<!-- END FOOTER -->
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->
	<script src="/Public/media/js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="/Public/media/js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      
	<script src="/Public/media/js/bootstrap.min.js" type="text/javascript"></script>
    <!--[if lt IE 9]>
    <script src="/Public/media/js/excanvas.min.js"></script>
    <script src="/Public/media/js/respond.min.js"></script>
    <![endif]-->
    <script src="/Public/media/js/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="/Public/media/js/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="/Public/media/js/jquery.uniform.min.js" type="text/javascript" ></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="/Public/media/js/app.js" type="text/javascript"></script>
    <script src="/Public/plug/layer/layer.js" type="text/javascript"></script>
	<!-- END PAGE LEVEL SCRIPTS -->

	<script type="text/javascript">
		$(function(){
			App.init(); // init layout and core plugins
			$us = $u = window.location.pathname;

            if($us.indexOf('?')<0){
                $u1 = $us.replace('<?php echo ($rd); ?>/','').split('/');
                $controller =$u1[0];
                $action = $u1[1];
                $ii = $us.indexOf($action)+$action.length+1;
                $temp = $us.substring($ii).split('/');
                $tempArr =new Array();
                if($temp.length>2){
                    $str = '';
                    for (var i = 0; i <=$temp.length/2; i+=2){
                        $str +='&'+$temp[i]+'='+$temp[i+1];
                        $tempArr[i]=$temp[i]+"_"+$temp[i+1];
                    }
                    $u = '<?php echo ($rd); ?>/'+$controller+'/'+$action+'?'+$str.substring(1);
                   
                }     
            }
           
			$u = $u.replace('<?php echo ($rd); ?>/','').split('/');
            $controller =$u[0];
            $action = $u[1];

			$r = $controller+"/"+$action;
            $r = $r.toLowerCase();
            $id = getQueryString('id');
            if($id==null){
                for (var i = 0; i < $tempArr.length; i++) {
                    if($tempArr[i].indexOf('id')>-1){
                        $tempstr =  $tempArr[i].split('_');
                        $id =$tempstr[1];
                        break;
                    }
                }
            }
            //更改高亮地址
            if($action=='add' || $action=='del' || $action=='edit' || $action=='check'|| $action=='search'){
                $r = $controller+"/index";
                $r = $r.toLowerCase();
            }

            //循环高亮
            $('li.nav-item').each(function(e){
                $this = $(this);
                $c = $this.children('a').attr('href');
               
                if($c.indexOf($r) > 0 || $c.indexOf('?') > 0){
                    if($c.indexOf('?') > 0){
                        $t = $c.split('=');
                        if($t[1]==$id){
                            $this.addClass('active');
                            $p = $this.parent('ul');
                            $p.show();
                            $p.parent('li').addClass('start active open');
                        }
                        
                    }else{
                        $this.addClass('active');
                        $p = $this.parent('ul');
                        $p.show();
                        $p.parent('li').addClass('start active open');
                    }
                   
                }
            });
            //退出登陆
            $(document).keypress(function(e){
            	$code = e.keyCode | e.which;
                // if($code==32){
                //     window.location.href='<?php echo U("Login/logout");?>';
                //     return false;
                // }
            });
            //提交搜索
            $(document).keypress(function(e){
                $code = e.keyCode | e.which;
                if($code==13){
                    $('#form-search').submit();
                    return false;
                }
            });
            $('#change-lang li').click(function(e){
                e.preventDefault();
                $uri = $(this).children('a').attr('href');
                $.post('/Admin/Ad/add?id=1&amp;p=',{l:$uri},function(d){
                    window.location.reload();
                });
            });
		});
        //获取url参数
        function GetRequest() {
            var url = location.search; //获取url中"?"符后的字串
            var theRequest = new Object();
            if (url.indexOf("?") != -1) {
                var str = url.substr(1);
                strs = str.split("&");
                for(var i = 0; i < strs.length; i ++) {
                    theRequest[strs[i].split("=")[0]]=unescape(strs[i].split("=")[1]);
                }
            }
            return theRequest;
        }
        $('.btn-del').click(function(e){
            e.preventDefault();
            var url = $(this).attr('data-role');
            layer.confirm('你确定要删除？删除后不可恢复', {
                btn: ['确定','不了'] //按钮
            }, function(){
                //alert(url);
                window.location.href=url;
            });
        });
        /**
         * 获取url参数
         * @param name   url地址
         * @returns {*} 获取参数
         */
        function getQueryString(name) {
            var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
            var r = window.location.search.substr(1).match(reg);
            if (r != null) return unescape(r[2]); return null;
        }

        $('#btn-enable,#btn-forbidden,#btn-delete').click(function(e){
            e.preventDefault();
            $t = $(this).attr('data-role');
            $q='';
            $('.checkboxes').each(function(){
                if($(this).attr('checked')=='checked'){
                    $q += ','+$(this).val();
                }
            });
            $q = $q.substr(1);
            if($q!=''){
                $.post('/Admin/Ad/status',{k:$q,t:$t},function(data){
                    window.location.reload();
                });
            }else{
                $('#alert-info-item').text('请选择需要操作项');
                $('.alert-info').show();
            }
        });
	</script>
</body>
</html>