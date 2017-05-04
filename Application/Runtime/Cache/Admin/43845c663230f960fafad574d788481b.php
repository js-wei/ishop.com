<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title><?php echo ((isset($config["title"]) && ($config["title"] !== ""))?($config["title"]):'首页'); ?>_PHPCMS内容管理系统</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="/Public/media/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="/Public/media/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
	<link href="/Public/media/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
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
		var self='/Admin/Column/edit?id=11';
		var url='/Admin/Column';
		var module ='<?php echo (MODULE_NAME); ?>';
		var controller ='<?php echo (CONTROLLER_NAME); ?>';
		var action = '<?php echo (ACTION_NAME); ?>';
		var intval;
		var editor1;
		var key;
	</script>
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
<script type="text/javascript" src="/Public/plug/Uploadify/jquery.uploadify.min.js"></script>
<link rel="stylesheet" type="text/css" href="/Public/media/css/uniform.default.css"/>
<link rel="stylesheet" type="text/css" href="/Public/media/css/colorpicker.css" />
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
												<li  class="nav-item-sub  <?php if(strtolower($volt2['title'])==strtolower(ACTION_NAME)){echo 'active';} ?>">
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
									<li  class="nav-item <?php if(strtolower($volt1['title'])==strtolower(ACTION_NAME) && $_GET['id']=='' && strtolower($volt['title'])==strtolower(CONTROLLER_NAME)){echo 'active';} ?> ">
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
			<?php if(is_array($articleList)): $i = 0; $__LIST__ = $articleList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$volt): $mod = ($i % 2 );++$i; if(!empty($volt["child"])): ?><li class="nav">
						<a href="javascript:;">
							<?php if(!empty($volt["ico"])): ?><i class="<?php echo ($volt["ico"]); ?>"></i>
								<?php else: ?>
								<i class="icon-won"></i><?php endif; ?>
							<span class="title"><?php echo ($volt["title"]); ?></span>
							<span class="arrow"></span>
						</a>
						<ul class="sub-menu">
							<?php if(is_array($volt["child"])): $i = 0; $__LIST__ = $volt["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$volt1): $mod = ($i % 2 );++$i; if(!empty($volt1["child"])): ?><ul class="sub-menu">
										<li  class="nav-item">
											<a href="javascript:;">
												<?php if(!empty($volt1["ico"])): ?><i class="<?php echo ($volt1["ico"]); ?>"></i>
													<?php else: ?>
													<i class="icon-won"></i><?php endif; ?>
												<span class="title"><?php echo ($volt1["title"]); ?></span>
												<span class="arrow "></span>
											</a>
											<volost name="volt1.child" id="volt2">
												<li  class="nav-item-sub">
													<a href="<?php echo ($rd); ?>/Article/index?id=<?php echo ($volt2["id"]); ?>">
														<?php if(!empty($volt2["ico"])): ?><i class="<?php echo ($volt2["ico"]); ?>"></i>
															<?php else: ?>
															<i class="icon-won"></i><?php endif; ?>
														<?php echo ($volt2["title"]); ?>
													</a>
												</li>
											</volost>
										</li>
									</ul>
									<?php else: ?>
									<li  class="nav-item <?php if(($volt1["id"]) == $_GET['id']): ?>active<?php endif; ?>">
										<a href="<?php if(($volt1["type"]) == "5"): echo U('form/index?id='.$volt1['id']); endif; if(($volt1["type"]) == "3"): echo U('Single/index?id='.$volt1['id']); endif; if(($volt1["type"]) == "1"): echo U('Article/index?id='.$volt1['id']); endif; ?>">
											<?php if(!empty($volt1["ico"])): ?><i class="<?php echo ($volt1["ico"]); ?>"></i>
												<?php else: ?>
												<i class="icon-won"></i><?php endif; ?>
											<?php echo ($volt1["title"]); ?>
										</a>
									</li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
						</ul>
					</li>
				<?php else: ?>
				<li  class="nav <?php if(($volt["id"]) == $_GET['id']): ?>active<?php endif; ?> ">
					<a href="<?php if(($volt["type"]) == "5"): echo U('form/index?id='.$volt['id']); endif; if(($volt["type"]) == "3"): echo U('Single/index?id='.$volt['id']); endif; if(($volt["type"]) == "1"): echo U('Article/index?id='.$volt['id']); endif; ?>">
						<?php if(!empty($volt["ico"])): ?><i class="<?php echo ($volt["ico"]); ?>"></i>
							<?php else: ?>
							<i class="icon-won"></i><?php endif; ?>
						<?php echo ($volt["title"]); ?>
					</a>
				</li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
		</li>
	</ul>
	<!-- END SIDEBAR MENU -->
  </div>
<script type="text/javascript">
	if($('li.active').text()===''){
		$('li.nav-item').each(function(){
			controller = controller.toLowerCase();
			if($(this).find('a').attr('href').indexOf(controller)>-1){
				$(this).addClass('active');
				$(this).parent().parent().addClass('open');
			}
		});
	}
	$('li.active').parent().parent().addClass('active open');
</script>
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
                        <?php if(!empty($breadcrumb)): echo ($breadcrumb); ?>
                            <?php else: ?>
                            <li><a href="#">Dashboard</a></li><?php endif; ?>
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
                            <div class="caption"><i class="icon-reorder"></i><?php echo ((isset($model["name"]) && ($model["name"] !== ""))?($model["name"]):'修改栏目'); ?></div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"></a>
                                <a href="#portlet-config" data-toggle="modal" class="config"></a>
                                <a href="javascript:;" class="reload" data-role="/Public/media/image/fancybox_loading.gif" data-form="form_sample_1" data-reset="1"></a>
                                <a href="javascript:;" class="remove"></a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <form action="/Admin/Column/edithandler" method="post" id="form_sample_3" class="form-horizontal" novalidate="novalidate" enctype="multipart/form-data">
                                <div class="alert alert-error hide">
                                    <button class="close" data-dismiss="alert"></button>
                                    *请填写完表单
                                </div>
                                <div class="alert alert-success hide">
                                    <button class="close" data-dismiss="alert"></button>
                                                                        表单填写正确
                                </div>
                                <div class="alert alert-error hide control-name">
                                    <button class="close" data-dismiss="alert"></button>
                                    *请填写栏目名称
                                </div>
                                <input type="hidden" name="id" value="<?php echo ($column["id"]); ?>"/>
                                <div class="control-group">
                                    <label class="control-label">父级栏目<span class="required">*</span></label>
                                    <div class="controls">
                                        <select class="span4 m-wrap" name="fid">
                                            <option value="0">顶级栏目</option>
                                            <?php if(is_array($column_list)): $i = 0; $__LIST__ = $column_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?><option value="<?php echo ($cate["id"]); ?>" <?php if(($cate["id"]) == $column["fid"]): ?>selected='selected'<?php endif; ?> ><?php echo ($cate["html"]); echo ($cate["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">栏目中文名<span class="required">*</span></label>
                                    <div class="controls">
                                        <input type="text" name="title" id="control-name" value="<?php echo ($column["title"]); ?>" data-required="1" class="span4 m-wrap" placeholder="栏目中文名">
                                        <button type="button" id="Pinyin" class="btn blue">拼音</button>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">栏目英文名<span class="required">*</span></label>
                                    <div class="controls">
                                        <input type="text" name="name" id="control-title" value="<?php echo ($column["name"]); ?>" class="span4 m-wrap" placeholder="栏目英文名">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">栏目ICO<span class="required">*</span></label>
                                    <div class="controls">
                                        <input type="text" name="ico" value="<?php echo ($column["ico"]); ?>" id="control-title" class="span4 m-wrap" placeholder="栏目ICO推荐使用字体图标">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">栏目颜色<span class="required">*</span></label>
                                    <div class="controls">
                                        <input type="text" name="color" class="colorpicker-rgba m-wrap" placeholder="栏目颜色" value="<?php echo ($column["color"]); ?>" data-color-format="rgba">
                                    </div>
                                </div>
                                <div class="control-group">
									<label class="control-label">图片</label>
									<div class="controls">
										<div>
											<div style="float:left; margin-top:8px;"><input type="button" name="fileImg" id="fileImg" size="16" value="上传" class="table_btn"/></div>
											<div class="btn mini blue" onclick="imgView('master');return false;" id="img_b"><i class="icon-zoom-in"></i></div>
											<div  class="btn mini red" onclick="noMasterImg()"><i class=" icon-trash" style="cursor:pointer;display:block" ></i></div>
											<div style="clear:both;"></div>
										</div>
										<div>
											<?php if(!empty($column["image"])): ?><img src="<?php echo ($column["image"]); ?>" id="images_preview" width="380" height="auto">
												<input type="hidden" value="<?php echo ($column["image"]); ?>" name="image" id="reply_img">
												<?php else: ?>
												<img src="" id="images_preview" width="380" height="auto" style="display:none;">
												<input type="hidden" name="image" id="reply_img"><?php endif; ?>
										</div>
									</div>
								</div>
                                <div class="control-group">
                                    <label class="control-label">栏目关键词</label>
                                    <div class="controls">
                                        <textarea name="keywords" class="span4 m-wrap" placeholder="栏目关键词"><?php echo ($column["keywords"]); ?></textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">栏目说名</label>
                                    <div class="controls">
                                        <textarea name="description" class="span4 m-wrap" placeholder="栏目说名"><?php echo ($column["description"]); ?></textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">栏目类型</label>
                                    <div class="controls">
                                        <label class="radio">
                                            <input type="radio" name="type"  value="1" class="reset-radio" <?php if(($column["type"]) == "1"): ?>checked<?php endif; ?>>列表页
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="type" class="reset-radio"  value="2" <?php if(($column["type"]) == "2"): ?>checked<?php endif; ?>>下载页
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="type" class="reset-radio"  value="3" <?php if(($column["type"]) == "3"): ?>checked<?php endif; ?>>单页面
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="type" class="reset-radio"  value="5" <?php if(($column["type"]) == "5"): ?>checked<?php endif; ?>>表单
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="type" class="reset-radio"  value="6" <?php if(($column["type"]) == "6"): ?>checked<?php endif; ?>>跳转页
                                        </label>
                                        <label for="uri" class="<?php if(($column["type"]) != "6"): ?>hide<?php endif; ?> data-redirect"><input type="text" placeholder="跳转页地址(eg:http://baidu.com)" value="<?php echo ($column["uri"]); ?>" id="uri" class="span5" name="uri"/></label>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">栏目位置</label>
                                    <div class="controls">
                                        <label class="radio">
                                            <input type="radio" name="position"  value="1" class="reset-radio"  <?php if(($column["position"]) == "1"): ?>checked<?php endif; ?>>头部
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="position" class="reset-radio"  value="2" <?php if(($column["position"]) == "2"): ?>checked<?php endif; ?>>中间
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="position" class="reset-radio"  value="3" <?php if(($column["position"]) == "3"): ?>checked<?php endif; ?>>左边
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="position" class="reset-radio"  value="4" <?php if(($column["position"]) == "4"): ?>checked<?php endif; ?>>右边
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="position" class="reset-radio"  value="5" <?php if(($column["position"]) == "5"): ?>checked<?php endif; ?>>底部
                                        </label>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">栏目模板</label>
                                    <div class="controls">
                                        <input type="text" name="tpl"  value="<?php echo ($column["tpl"]); ?>" />
                                        <div class="text-error">*0默认模板;1使用栏目英文名;其他自定义(非开发人员谨慎使用)</div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">最终页面</label>
                                    <div class="controls">
                                        <label class="radio">
                                            <input type="radio" name="last"  value="0" class="reset-radio"  <?php if(($column["last"]) == "0"): ?>checked<?php endif; ?>>否
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="last" class="reset-radio"  value="1" <?php if(($column["last"]) == "1"): ?>checked<?php endif; ?>>是
                                        </label>
                                        <?php if(($column["last"]) == "1"): ?><div class="last_tpl">
                                            <input type="text" value="<?php echo ($column["last_tpl"]); ?>" class="m-wrap small" placeholder="最终显示模板" name="last_tpl">
                                            <div class="text-error">*默认使用detail.html模板</div>
                                            </div>
                                            <?php else: ?>
                                            <div class="last_tpl hide">
                                                <input type="text" value="" class="m-wrap small" placeholder="最终显示模板" name="last_tpl">
                                                <div class="text-error">*默认使用detail.html模板</div>
                                            </div><?php endif; ?>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">栏目状态</label>
                                    <div class="controls">
                                        <label class="radio">
                                            <input type="radio" name="status"  value="0" class="reset-radio"  <?php if(($column["status"]) == "0"): ?>checked<?php endif; ?>>启用
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="status" class="reset-radio"  value="1" <?php if(($column["status"]) == "1"): ?>checked<?php endif; ?>>禁用
                                        </label>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">栏目排序</label>
                                    <div class="controls">
                                        <input type="text" name="sort" value="<?php echo ($column["sort"]); ?>" placeholder="<?php echo (L("sort")); ?>"/>
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
<script type="text/javascript" src="/Public/media/js/bootstrap-fileupload.js"></script>
<script type="text/javascript" src="/Public/media/js/select2.min.js"></script>
<script type="text/javascript" src="/Public/media/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="/Public/media/js/jquery.inputmask.bundle.min.js"></script>
<script type="text/javascript" src="/Public/media/js/jquery.input-ip-address-control-1.0.min.js"></script>
<script type="text/javascript" src="/Public/media/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="/Public/media/js/bootstrap-colorpicker.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL STYLES -->
<script type="text/javascript" src="/Public/media/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="/Public/media/js/form-validation.js"></script>
<script type="text/javascript" src="/Public/js/jquery.han2pin.min.js"></script>
<script type="text/javascript">
    $(function(){
        FormValidation.init();
        $('.colorpicker-rgba').colorpicker();
        $('#Pinyin').click(function(){
            if($('#control-name').val()==''){
                $('.control-name').show();
                return false;
            }else{
                $('#control-title').val($('#control-name').toPinyin());
                $('.control-name').hide();
            }
        });
        $('#form_sample_3').submit(function(e){
            e.preventDefault();
            if($('#form_sample_3').valid()){
            	var index = layer.load(2,{
					shade: [0.4,'#000'] //0.1透明度的白色背景
				});
	            $.post('/Admin/Column/edithandler',$('#form_sample_3').serialize(),function(data){
	                layer.closeAll(index);
					if(data.status==1){
	                    layer.alert(data.msg,{icon:6,end:function(){
	                        location.href = data.redirect;
	                    }});
	                }else {
	                    layer.alert(data.msg,{icon:5});
	                }
	            });
           }
        });
        $('.reset-radio').click(function(){
            $val=$(this).val();
            if($val==6 || $val==4){
                if($val==6){
                    $('.data-redirect').show();
                    $('#cover').val('');
                    $('.data-cover').hide();
                }
                if($val==4){
                    $('.data-cover').show();
                    $('#uri').val('');
                    $('.data-redirect').hide();
                }
            }else{
                $('.data-redirect').hide();
                $('.data-cover').hide();
                $('#uri').val('');
                $('#cover').val('');
            }
        });
        $('input[name="last"]').change(function () {
            if($(this).val()==1){
                $('.last_tpl').show();
            }else {
                $('.last_tpl').hide();
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
    <script src="/Public/media/js/jquery.fancybox.pack.js"></script>
	<script src="/Public/media/js/gallery.js"></script>
	<!-- END PAGE LEVEL SCRIPTS -->

	<script type="text/javascript">
		$(function(){
			App.init(); // init layout and core plugins
			Gallery.init();
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
                $.post('/Admin/Column/edit?id=11',{l:$uri},function(d){
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
				layer.load(2,{
					shade:[0.5,'#000']
				});
                $.post(url,function(data){
                	window.location.href=$self;
                });
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
            $p = $(this).attr('data-paramter');
            $q='';
            $('.checkboxes').each(function(){
                if($(this).attr('checked')=='checked'){
                    $q += ','+$(this).val();
                }
            });
            $q = $q.substr(1);
            if($q!=''){
            	layer.load(2,{
            		shade:[0.5,'#000']
            	});
                $.post('/Admin/Column/status',{k:$q,t:$t,p:$p},function(data){
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