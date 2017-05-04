<?php if (!defined('THINK_PATH')) exit(); if(!empty($list)): ?><table class="table table-bordered table-responsive table-order" style="border-top:none;">
	    <tr>
	        <th style="border-top:none;">优惠券名称</th>
	        <th style="border-top:none;">优惠券类型</th>
	        <th style="border-top:none;">过期时间</th>
	        <th style="border-top:none;">是否过期</th>
	        <th style="border-top:none;">使用状态</th>
	        <th style="border-top:none;">操作</th>
	    </tr>
	    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
	            <td width="154">
	                <?php echo ($vo["coupon_number"]); ?>
	            </td>
	            <td>
	               	<?php echo ($vo["offset_cash"]); ?>折
	            </td>
	            <td>
	               	<?php if(($vo["validity_time"]) == "1"): echo (date('Y-m-d',$vo["end_time"])); else: ?>永久<?php endif; ?>
	            </td>
	            <td>
	               	<?php if(($vo["validity_time"]) == "1"): if($vo['end_time']>time()){ echo '<span class="text-green">否</span>'; }else{ echo '<span class="text-danger">是</span>'; } ?>
	               		<?php else: ?>
	               		<span class="text-green">未过期</span><?php endif; ?>
	            </td>
	            <td>
	            	<?php if(empty($vo["order_id"])): ?><span class="text-green">未使用</span><?php else: ?><span class="text-danger">已使用</span><?php endif; ?>
	            </td>
	            <td><a href="" class="click">现在使用</a>|<a href="" class="click">删除优惠券</a></td>
	        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</table>
	<div class="col-xs-12 col-md-12 col-lg-12 tcdPageCode tcdPageCode1" style="padding:0px;"></div>
	<!--<script src="/Public/plug/jquery.page.js" type="text/javascript" charset="utf-8"></script>-->
	<script type="text/javascript">
	    $(function(){
	    	var count = $('li[role="presentation"].active>a').attr('data-count');
	    	var _p = $('li[role="presentation"].active>a').attr('data-index');
	        $(".tcdPageCode1").createPage({
	            pageCount:count,
	            current:<?php echo ($p); ?>,
	            backFn:function(p){
	            	if(p<=count){
	            		var type = $('li[role="presentation"].active>a').attr('data-type');
	            		var href = $('li[role="presentation"].active>a').attr('href').substr(1);
	            		var index = layer.load(2,{
							shade: [0.5,'#fff'] //0.1透明度的白色背景
						});
	            		$.post('<?php echo U("user/coupon");?>',{type:type,p:p},function(result){
	            			layer.close(index);
	            			if(result.status=1){
	            				$('#'+href).empty().html(result.list);
	            				$('li[role="presentation"].active>a').attr('data-index',result.p);
	            			}
	            		});
	            	}
	            }
	        });
	        $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
	        	//当前激活项
	        	var taregt = e.target.toString().split("#");
	        	$('#'+taregt[1]).empty();
			})
	    });
	</script>
	<?php else: ?>
	<div class="nothing text-center">
  		<h3>暂无相应的优惠券</h3>
  		<img src="/Public/img/noData.png"/>
  	</div><?php endif; ?>