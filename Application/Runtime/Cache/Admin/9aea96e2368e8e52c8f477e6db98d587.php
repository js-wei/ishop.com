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
		$self='/Admin/flink/index';
		$url='/Admin/Flink';
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
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" href="/Public/media/css/DT_bootstrap.css" />
<!-- END PAGE LEVEL STYLES -->
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
                        <?php if(!empty($breadcrumb)): ?><li><a href="<?php echo U('index');?>"><?php echo ($breadcrumb); ?></a></li>
                            <?php else: ?>
                            <li><a href="<?php echo U('/');?>">Dashboard</a></li><?php endif; ?>
                        <li class="pull-right no-text-shadow">
                            <div id="dashboard-report-range" class="dashboard-date-range tooltips no-tooltip-on-touch-device responsive" data-tablet="" data-desktop="tooltips" data-placement="top" data-original-title="Change dashboard date range">
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
            <!--BEGIN CONTAINER -->
            <!--BEGIN SEARCH -->
            <div class="alert-info alert-error">
                <button class="close alert-btn"></button>
                <span id="alert-info-item"></span>
            </div>
            <div class="clear margin10"></div>
            <script type="text/javascript" src="/Public/plug/My97DatePicker/WdatePicker.js"></script>
            <script type="text/javascript" src="/Public/js/jquery.form.js"></script>
            <script type="text/javascript">
                $(function(){
                    $('#search-submit').click(function(){
                        $('#form-search').submit();
                    });
                });
            </script>
            <div class="row-fluid">
                <div class="span12">
                    <div class="span5">
                        <a href="javascript:void(0);" class="btn grey" id="btn-enable" data-role="enable">启用</a>
                        <a href="javascript:void(0);" class="btn grey" id="btn-forbidden" data-role="forbidden">禁用</a>
                        <a href="javascript:void(0);" class="btn grey" id="btn-delete" data-role="delete">删除</a>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <hr class="divider"/>
            <div class="row-fluid">
                <div class="span12">
                    <div class="btn-group">
                        <a id="sample_editable_1_new" class="btn green" <?php if(!empty($_GET['p'])): ?>href="/Admin/Flink/add?id=<?php echo ($_GET['id']); ?>&p=<?php echo ($_GET['p']); ?>"<?php else: ?> href="/Admin/Flink/add?id=<?php echo ($_GET['id']); ?>&p=1"<?php endif; ?>>
                        添加<i class="icon-plus"></i>
                        </a>
                    </div>
                    <!--  <button class="btn tooltips" data-placement="right" data-original-title="Tooltip in right">Right</button> -->
                </div>
            </div>
            <div class="clear"></div>
            <hr class="divider"/>
            <!--END SEARCH -->
            <!--BEGIN DATA CONTAINER -->
            <div class="row-fluid">
                <div class="span12">
                    <table class="table table-striped table-bordered table-hover dataTable" id="sample_2" aria-describedby="sample_1_info">
                        <thead>
                        <tr role="row" id="dis-sort-simple">
                            <th style="width:24px;" class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="">
                                <div class="checker">
                                    <span><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes"></span>
                                </div>
                            </th>
                            <th class="hidden-480" >编号</th>
                            <th class="sorting_disabled"  tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" >标题</th>
                            <th class="hidden-480"  tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" >说明</th>
                            <th class="hidden-480" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1">链接地址</th>
                            <th class="hidden-480" >状态</th>
                            <th class="hidden-480">添加时间</th>
                            <th class="hidden-480 sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="" ></th>
                        </tr>
                        </thead>
                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                        <?php if(is_array($arclist)): $i = 0; $__LIST__ = $arclist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="gradeX <?php if($key%2==0){echo 'odd';}else{echo 'even';} ?>">
                                <td class=" sorting_1"><div class="checker"><span><input type="checkbox" class="checkboxes" value="<?php echo ($vo["id"]); ?>"></span></div></td>
                                <td><?php echo ($vo["id"]); ?></td>
                                <td class="" style="padding-left:<?php echo ($vo['level']*10); ?>px;"><?php echo ($vo["title"]); ?></td>
                                <td class="hidden-480">
                                    <span style="cursor:pointer;display:block;height:30px;line-height:30px;" class="tooltips" data-placement="right" data-original-title="<?php echo ($vo["description"]); ?>"><?php echo (sub_str(strip_tags(htmlspecialchars_decode($vo["description"])),0,50)); ?></span>
                                </td>
                                <td><?php echo ($vo["url"]); ?></td>
                                <td class="hidden-480 "><?php if(($vo["status"]) == "1"): ?><label class="label label-error">禁用</label><?php else: ?><label class="label label-success">启用</label><?php endif; ?></td>
                                <td class="hidden-480"><?php echo (date('Y-m-d h:i:s',$vo["date"])); ?></td>
                                <td class="text text-center">
                                    <!-- <a href="/Admin/Flink/check?id=<?php echo ($vo["id"]); ?>" class="btn mini">查看</a> -->
                                    <a href="/Admin/Flink/add?id=<?php echo ($vo["id"]); ?>&p=<?php echo ($_GET['p']); ?>" class="btn blue mini">编辑</a>
                                    <?php if(($vo["status"]) == "0"): ?><a href="/Admin/Flink/status?id=<?php echo ($vo["id"]); ?>&t=forbidden&p=<?php echo ($_GET['p']); ?>&ajax=0" class="btn black mini">禁用</a>
                                        <?php else: ?>
                                        <a href="/Admin/Flink/status?id=<?php echo ($vo["id"]); ?>&t=enable&p=<?php echo ($_GET['p']); ?>&ajax=0" class="btn yellow mini">启用</a><?php endif; ?>
                                    <a href="javascript:void(0);" data-role="/Admin/Flink/status?id=<?php echo ($vo["id"]); ?>&t=delete&p=<?php echo ($_GET['p']); ?>&ajax=0" class="btn red mini btn-del">删除</a>
                                </td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                    <div class="clearfix"></div>
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="pagination pagination-small">
                                <ul class="span12 bootpag">
                                    <?php echo ($page); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--END DATA CONTAINER -->
            <!--END CONTAINER -->
        </div>
        <!-- END PAGE CONTAINER-->
    </div>
    <!-- END PAGE -->
</div>
<script type="text/javascript">
    $(function(){
        $checkboxes = $('.checkboxes');
        $('.group-checkable').click(function(){
            $this = $(this);
            if($this.attr('checked')=='checked'){
                $this.parent('span').addClass('checked');
                $checkboxes.each(function(){
                    $(this).attr('checked','checked');
                    $(this).parent('span').addClass('checked');
                });
            }else{
                $this.parent('span').removeClass('checked');
                $checkboxes.each(function(){
                    $(this).removeAttr('checked');
                    $(this).parent('span').removeClass('checked');
                });
            }
        });
        $checkboxes.click(function(){
            if($(this).attr('checked')=='checked'){
                $(this).attr('checked','checked');
                $(this).parent('span').addClass('checked');
            }else{
                $(this).removeAttr('checked');
                $(this).parent('span').removeClass('checked');
            }
        });
        $('.alert-btn').click(function(){
            $(this).parent('.alert-error').hide();
        });

        $('#search-date').click(function(e){
            e.preventDefault();
            $i = $(this).attr('i');
            if($i=='0'){
                $('.search-time').show();
                $(this).attr('i',1);
            }else{
                $('.search-time').hide();
                $(this).attr('i',0);
            }
        });
        $('#clear-date').click(function(){
            $('#start,#end').val('');
        });
        $('#ok-date').click(function(){
            $('.search-time').hide();
            $(this).attr('i',1);
        });
    });
</script>
<script type="text/javascript" src="/Public/media/js/select2.min.js"></script>
<script type="text/javascript" src="/Public/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="/Public/media/js/DT_bootstrap.js"></script>
<script type="text/javascript" src="/Public/media/js/table-managed.js"></script>
<script src="/Public/media/js/ui-general.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        TableManaged.init();
        //UIGeneral.init();
        $('#sample_2_wrapper').children('.row-fluid').first().remove();
        $('#sample_2_wrapper').children('.row-fluid').last().remove();
        $('#sample_1_wrapper').children('.row-fluid').first().remove();
        $('#sample_1_wrapper').children('.row-fluid').last().remove();
    });
</script>
<!-- END CONTAINER -->
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
                $.post('/Admin/flink/index',{l:$uri},function(d){
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
                $.post('/Admin/Flink/status',{k:$q,t:$t},function(data){
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