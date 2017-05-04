<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title><?php echo ((isset($$config["title"]) && ($$config["title"] !== ""))?($$config["title"]):'首页'); ?>_PHPCMS内容管理系统</title>
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
		$self='/Admin/Article/edit?aid=5&amp;id=3&amp;p=';
		$url='/Admin/Article';
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
    <link rel="stylesheet" type="text/css" href="/Public/media/css/uniform.default.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/media/css/select2_metro.css" />
    <link rel="stylesheet" type="text/css" href="/Public/media/css/chosen.css" />
    <link rel="stylesheet" type="text/css" href="/Public/plug/kindeditor/themes/default/default.css">
    <link rel="stylesheet" href="/Public/plug/kindeditor/plugins/code/prettify.css" />
    <script charset="utf-8" src="/Public/plug/kindeditor/kindeditor.js"></script>
    <script charset="utf-8" src="/Public/plug/kindeditor/lang/zh_CN.js"></script>
    <script charset="utf-8" src="/Public/plug/kindeditor/plugins/code/prettify.js"></script>
    <!--END FORM STYLE-->
	<!-- BEGIN CONTAINER -->
	<div class="page-container">
		<!-- BEGIN SIDEBAR -->
		<div class="page-sidebar nav-collapse collapse">
	<!-- BEGIN SIDEBAR MENU -->        
	<ul class="page-sidebar-menu">
		<li>
			<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
			<div class="sidebar-toggler hidden-phone"></div>
			<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
		</li>
		<li>
			<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
			<form class="sidebar-search">
				<div class="input-box">
					<a href="javascript:;" class="remove"></a>
					<input type="text" placeholder="搜索..." />
					<input type="button" class="submit" value="" />
				</div>
			</form>
			<!-- END RESPONSIVE QUICK SEARCH FORM -->
		</li>
		<li class="<?php if(($control) == "index"): ?>start active<?php endif; ?>">
			<a href="<?php echo U('Index/index');?>">
				<i class="icon-home"></i> 
				<span class="title">Dashboard</span>
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
                                <a href="/Admin/Article/index?id=<?php echo ($_GET['id']); ?>"><?php echo ($column["title"]); ?></a>
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
                                <div class="caption"><i class="icon-reorder"></i><?php echo ((isset($model["name"]) && ($model["name"] !== ""))?($model["name"]):'修改文章'); ?></div>
                                <div class="tools">
                                    <a href="javascript:;" class="collapse"></a>
                                    <a href="#portlet-config" data-toggle="modal" class="config"></a>
                                    <a href="javascript:;" class="reload" data-role="/Public/media/image/fancybox_loading.gif" data-form="form_sample_3" data-reset="1"></a>
                                    <a href="javascript:;" class="remove"></a>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <!-- BEGIN FORM-->
                                <form action="/Admin/Article/updatehandler" method="post" id="form_sample_3" class="form-horizontal" novalidate="novalidate"  enctype="multipart/form-data">
                                    <div class="alert alert-error hide">
                                        <button class="close" data-dismiss="alert"></button>
                                        请填写完表单在提交
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">栏目<span class="required">*</span></label>
                                        <div class="controls">
                                            <select class="span4 m-wrap" name="column_id">
                                                <option value="0">请选择栏目</option>
                                                <?php if(is_array($column_list)): $i = 0; $__LIST__ = $column_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?><option value="<?php echo ($cate["id"]); ?>" <?php if(($cate["id"]) == $article["column_id"]): ?>selected='selected'<?php endif; ?> ><?php echo ($cate["html"]); echo ($cate["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">标题<span class="required">*</span></label>
                                        <div class="controls">
                                            <input type="text" name="title" id="control-name" data-required="1" class="span4 m-wrap" placeholder="标题" value="<?php echo ($article["title"]); ?>">
                                            <input type="hidden" name="id" value="<?php echo ($article["id"]); ?>">
                                            <input type="hidden" name="cid" value="<?php echo ($_GET['id']); ?>">
                                            <input type="hidden" name="p" value="<?php echo ($_GET['p']); ?>">
                                            <!-- <button type="button" id="Pinyin" class="btn blue">拼音</button> -->
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">作者</label>
                                        <div class="controls">
                                            <input type="text" name="author" id="control-name" data-required="1" class="span4 m-wrap" placeholder="作者" value="<?php echo ($article["author"]); ?>">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">关键词</label>
                                        <div class="controls">
                                             <textarea name="keywords" class="span4 m-wrap" placeholder="关键词"><?php echo ($article["keywords"]); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">说明</label>
                                        <div class="controls">
                                            <textarea name="description" class="span4 m-wrap" placeholder="说明"><?php echo ($article["description"]); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">内容</label>
                                        <div class="controls">
                                            <textarea name="content" style="height:350px;" class="span7 m-wrap" placeholder="内容"><?php echo (htmlspecialchars_decode($article["content"])); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">属性</label>
                                        <div class="controls" style="line-height:33px;">
                                            <span><input type="checkbox" name="attr[com]" value="1" <?php if(($article["com"]) == "1"): ?>checked="checked"<?php endif; ?>>推荐</span>
                                            <span><input type="checkbox" name="attr[hot]" value="1" <?php if(($article["hot"]) == "1"): ?>checked="checked"<?php endif; ?>>最热</span>
                                            <span><input type="checkbox" name="attr[new]" value="1" <?php if(($article["new"]) == "1"): ?>checked="checked"<?php endif; ?>>最新</span>
                                            <span><input type="checkbox" name="attr[head]" value="1" <?php if(($article["head"]) == "1"): ?>checked="checked"<?php endif; ?>>头条</span>
                                            <span><input type="checkbox" name="attr[top]" value="1" <?php if(($article["top"]) == "1"): ?>checked="checked"<?php endif; ?>>置顶</span>
                                            <span><input type="checkbox" name="attr[img]" value="1" <?php if(($article["img"]) == "1"): ?>checked="checked"<?php endif; ?>>图文</span>
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
                                            <label class="radio-inline inline-width">
                                                <input type="radio" name="status"  value="0" <?php if(($article["status"]) == "0"): ?>checked<?php endif; ?> >启用
                                            </label>
                                            <label class="radio-inline inline-width">
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
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <script type="text/javascript" src="/Public/media/js/form-validation.js"></script>
    <script type="text/javascript" src="/Public/js/jquery.han2pin.min.js"></script>
    <script type="text/javascript">
        $(function(){
            KindEditor.ready(function(K) {
                var editor1 = K.create('textarea[name="content"]', {
                    cssPath : '/Public/plug/kindeditor/plugins/code/prettify.css',
                    uploadJson : "<?php echo U('Uploadify/KindEditorUploadImage');?>",
                    height:250,
                    newlineTag:"p",
                    allowFileManager : false,
                    afterBlur: function(){this.sync();}
                });
                prettyPrint();
            });
            FormValidation.init();
            $('#Pinyin').click(function(){
                if($('#control-name').val()==''){
                    $('.control-name').show();
                    return false;
                }else{
                    $('#control-title').val($('#control-name').toPinyin());
                    $('.control-name').hide();
                }
            });
            $('form').submit(function(e){
                e.preventDefault();
                var index = layer.load();
                $.post('/Admin/Article/updatehandler',$('form').serialize(),function(data){
                    layer.closeAll(index);
                    if(data.status==1){
                        layer.alert(data.msg,{icon:6,end:function(){
                            location.href = data.redirect;
                        }});
                    }else {
                        layer.alert(data.msg,{icon:5});
                    }
                })
            });
        });
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
                $.post('/Admin/Article/edit?aid=5&amp;id=3&amp;p=',{l:$uri},function(d){
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
                $.post('/Admin/Article/status',{k:$q,t:$t},function(data){
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