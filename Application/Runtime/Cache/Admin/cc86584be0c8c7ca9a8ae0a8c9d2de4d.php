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
		var self='/Admin/Coupons/';
		var url='/Admin/Coupons';
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
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" href="/Public/media/css/DT_bootstrap.css" />
<link rel="stylesheet" type="text/css" href="/Public/media/css/bootstrap-wysihtml5.css" />
<link rel="stylesheet" type="text/css" href="/Public/media/css/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="/Public/media/css/datetimepicker.css" />
<link rel="stylesheet" type="text/css" href="/Public/media/css/multi-select-metro.css" />
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
                    <div class="span3">
                        <a href="javascript:void(0);" class="btn green" id="btn-enable" data-role="enable">启用</a>
                        <a href="javascript:void(0);" class="btn yellow" id="btn-forbidden" data-role="forbidden">禁用</a>
                        <a href="javascript:void(0);" class="btn red" id="btn-delete" data-role="delete">删除</a>
                    </div>
                    <form action="/Admin/Coupons/index"  method="get" id="form-search" class="form-horizontal">
                        <div class="span9">
                            <style type="text/css">
                                select.m-wrap.small {
                                    width:70px !important;
                                }
                            </style>
                            <div class="control-group">
                                <label class="control-label"></label>
                                <div class="controls">
                                   <select name="status" class="m-wrap small" style="width:80px; height:34px">
                                        <option value="-1">所有</option>
                                        <option value="0" <?php if(($search["status"]) == "0"): ?>selected<?php endif; ?>>启用</option>
                                        <option value="1" <?php if(($search["status"]) == "1"): ?>selected<?php endif; ?>>禁用</option>
                                    </select>
                                    <input type="text" name="name" value="<?php echo ($search["name"]); ?>" class="m-wrap small" placeholder="关键词"  style="">
                                    <input type="hidden" name="id" value="<?php echo ($_GET['id']); ?>" >
                                    <div class="input-prepend">
                                        <span class="add-on"><i class="icon-calendar"></i></span>
                                        <input type="text" name="date" value="<?php echo ($search["date"]); ?>" class="m-wrap small date-range" readonly/>
                                    </div> 
                                    <botton id="search-submit" class="btn grey" >搜索</botton>
                                    <a href="/Admin/Coupons/index?id=<?php echo ($_GET['id']); ?>" class="btn yellow" >全部</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="clear"></div>
            <hr class="divider"/>
            <div class="row-fluid">
                <div class="span12">
                    <div class="btn-group">
                        <a id="sample_editable_1_new" class="btn green" <?php if(!empty($_GET['p'])): ?>href="/Admin/Coupons/add?id=<?php echo ($_GET['id']); ?>&p=<?php echo ($_GET['p']); ?>"<?php else: ?> href="/Admin/Coupons/add?id=<?php echo ($_GET['id']); ?>&p=1"<?php endif; ?>>
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
                            <th class="sorting_disabled"  tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" >优惠券号</th>
                            <th class="hidden-480"  tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" >优惠券名称</th>
                            <th class="hidden-480" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1">优惠券类型</th>
                            <th class="hidden-480" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1">优惠券面值</th>
                            <th class="hidden-480" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1">优惠券栏目</th>
                            <th class="hidden-480" >使用状态</th>
                            <th class="hidden-480">创建时间</th>
                            <th class="hidden-480 sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="" ></th>
                        </tr>
                        </thead>
                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                        <?php if(is_array($arclist)): $i = 0; $__LIST__ = $arclist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="gradeX <?php if($key%2==0){echo 'odd';}else{echo 'even';} ?>">
                                <td class="sorting_1"><div class="checker"><span><input type="checkbox" class="checkboxes" value="<?php echo ($vo["id"]); ?>"></span></div></td>
                                <td><?php echo ++$key;?></td>
                                <td class="" style="padding-left:<?php echo ($vo['level']*10); ?>px;"><?php echo ($vo["coupons_no"]); ?></td>
                                <td class="hidden-480">
                                    <span style="cursor:pointer;display:block;height:30px;line-height:30px;" class="tooltips" data-placement="right" data-original-title="<?php echo ($vo["coupons_title"]); ?>"><?php echo (sub_str(strip_tags(htmlspecialchars_decode($vo["coupons_title"])),0,50)); ?></span>
                                </td>
                                <td>
                                	<?php if(($vo["coupons_type"]) == "0"): ?>实物<?php endif; ?>
                                	<?php if(($vo["coupons_type"]) == "1"): ?>折扣<?php endif; ?>
                                	<?php if(($vo["coupons_type"]) == "2"): ?>现金<?php endif; ?>
                                </td>
                                <td>
                                	<?php if(($vo["coupons_type"]) == "0"): echo ($vo["coupons_val"]); endif; ?>
                                	<?php if(($vo["coupons_type"]) == "1"): echo ($vo['coupons_val']*10); ?>折<?php endif; ?>
                                	<?php if(($vo["coupons_type"]) == "2"): echo ($vo["coupons_val"]); endif; ?>
                                </td>
                                <td>
                                	<?php echo (get_column($vo["coupon_cid"])); ?>
                                </td>
                                <td class="hidden-480 ">
                                	<?php if(($vo["coupons_status"]) == "0"): ?><label class="label label-success">未发放</label><?php endif; ?>
                                	<?php if(($vo["coupons_status"]) == "1"): ?><label class="label label-info">已发放</label><?php endif; ?>
                                	<?php if(($vo["coupons_status"]) == "2"): ?><label class="label label-error">已使用</label><?php endif; ?>
                                </td>
                                <td class="hidden-480"><?php echo (date('Y-m-d h:i:s',$vo["coupons_date"])); ?></td>
                                <td class="text text-center">
                                    <!-- <a href="/Admin/Coupons/check?id=<?php echo ($vo["id"]); ?>" class="btn mini">查看</a> -->
                                    <a href="/Admin/Coupons/add?id=<?php echo ($vo["id"]); ?>&p=<?php echo ($_GET['p']); ?>" class="btn blue mini">编辑</a>
                                    <a href="javascript:void(0);" data-role="/Admin/Coupons/status?id=<?php echo ($vo["id"]); ?>&t=delete&p=<?php echo ($_GET['p']); ?>&ajax=0" class="btn red mini btn-del">删除</a>
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
        $('.date-range').daterangepicker({
                opens: (App.isRTL() ? 'left' : 'right'),
                format: 'yyyy/MM/dd',
                separator: '-',
                startDate: Date.today(),
                locale: {
                    applyLabel: '确定',
                    fromLabel: '从',
                    toLabel: '到',
                    customRangeLabel: '选择日期',
                    daysOfWeek: ['日', '1', '2', '3', '4', '5', '6'],
                    monthNames: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
                    firstDay: 1
                }
        });
    });
</script>
<script type="text/javascript" src="/Public/media/js/date.js"></script>
<script type="text/javascript" src="/Public/media/js/daterangepicker.js"></script>
<script type="text/javascript" src="/Public/media/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="/Public/media/js/bootstrap-timepicker.js"></script>
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
                $.post('/Admin/Coupons/',{l:$uri},function(d){
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
                $.post('/Admin/Coupons/status',{k:$q,t:$t,p:$p},function(data){
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