<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php if(!$membergo): ?>
<div class="null-retips-wrapper">
                               <div class="gth-icon transparent-png"></div>
                               <span>最近三个月无记录！</span>
                           </div>
<?php  else: ?>

                           <!--有记录-->
                           <div class="content">
                                <div class="good-list-wrap">
                                    <ul class="good-list">
                                    <?php $ln=1;if(is_array($membergo)) foreach($membergo AS $go): ?>
<?php 
        				$jiexiao = get_shop_if_jiexiao($go['shopid']);
						 if ($jiexiao['q_uid']){
							$url = "dataserver";
						 }else{
							$url = "goods";
						 }
                         $itemzx=$mysql_model->GetOne("select * from `@#_shoplist` where `id`='$go[shopid]'");
 ?>
                                    <li><a class="g-pic" target="_blank" href="<?php echo WEB_PATH; ?>/<?php echo $url; ?>/<?php echo $go['shopid']; ?>"><img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $jiexiao['thumb']; ?>" width="100" height="100">
                                    <?php if(!$jiexiao['q_uid']): ?>
                                    <span class="g-bg"></span>
                                    <span class="g-txt">进行中<span class="dotting"></span></span>
                                    <?php  else: ?>
                                    <span class="g-bg g-end"></span>
                                    <span class="g-txt">已揭晓</span>
                                    <?php endif; ?>
                                    </a>
                                    <div class="g-info"><h2 class="g-title">
                                    <a target="_blank" rel="nofollow" href="<?php echo WEB_PATH; ?>/<?php echo $url; ?>/<?php echo $go['shopid']; ?>">(第<?php echo $go['shopqishu']; ?>期)<?php echo $go['shopname']; ?></a></h2><p class="g-price">价值：<?php echo $jiexiao['money']; ?></p>
                                     <?php if(!$jiexiao['q_uid']): ?>
                                    <div class="g-progress">
                                    <dl class="m-progress">
                                    <dt title="已完成<?php if(($itemzx['canyurenshu'])==0): ?>0%<?php  else: ?><?php echo percent($itemzx['canyurenshu'],$itemzx['zongrenshu']); ?> <?php endif; ?>"><b style="width:<?php if(($itemzx['canyurenshu'])==0): ?>0<?php  else: ?><?php echo percent($itemzx['canyurenshu'],$itemzx['zongrenshu']); ?>; <?php endif; ?>"><i class="cur"></i></b></dt>
                                    <dd>
                                    <span class="orange fl"><em><?php echo $itemzx['canyurenshu']; ?></em>已参与</span>
                                    <span class="gray6 fl"><em><?php echo $itemzx['zongrenshu']; ?></em>总需人次</span>
                                    <span class="blue fr"><em><?php echo $itemzx['shenyurenshu']; ?></em>剩余</span>
                                    </dd>
                                    </dl>
                                    </div>
                                    <?php  else: ?>
                                    <div class="g-older"><p>获得者：<a href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($jiexiao['q_uid']); ?>" target="_blank"><?php echo get_user_name($jiexiao['q_user']); ?></a></p><p>揭晓时间：<?php echo date("Y-m-d H:i:s",$jiexiao['q_end_time']); ?></p></div>
                                    <?php endif; ?>
                                    
                                    </div><div class="g-total">参与&nbsp;<span class="orange"><?php echo $go['gonumber']; ?></span>&nbsp;人次</div>
                                    <?php if(!$jiexiao['q_uid']): ?>
                                    <a class="g-buy" rel="nofollow" target="_blank" href="<?php echo WEB_PATH; ?>/<?php echo $url; ?>/<?php echo $go['shopid']; ?>">跟随<?php echo _cfg('web_name_two'); ?></a><?php  else: ?>
                                    <a class="g-see" target="_blank" href="<?php echo WEB_PATH; ?>/<?php echo $url; ?>/<?php echo $go['shopid']; ?>">查看详情</a>
                                    <?php endif; ?>
                                    <i class="single"><i class="single"></i></i><div class="g-time"><div class="aricle"><div class="cir"></div></div><div class="time-str"><div class="str"><?php echo date("Y-m-d H:i:s",$go['time']); ?></div></div></div><div class="clear"></div></li>
                                    
                                    
                                    <?php  endforeach; $ln++; unset($ln); ?>
                                    </ul>
                                    <div class="s-line">
                                        <div class="s-top"></div>
                                        <div class="s-bottom"></div>
                                    </div>
                                </div>
                                
                            <!--<div class="z-look-more clrfix"><a href="javascript:;" id="buyadd">查看更多</a></div> --></div>
<!--有记录end-->
<?php endif; ?> 

<script>
function onpage(id){
	var buy_url = "<?php echo WEB_PATH; ?>/userbuy/<?php echo idjia($member['uid']); ?>";
	var ehtml = '<div id="divTopicShow"  style="text-align:center; padding:20px 0;" ><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/global/loading.gif" width="30" sytle="vertical-align:middle"/></div>';
	$("#commentList").html(ehtml).show();
	$.ajax({
                        url: base_url,
                        async : true,
		                addidvalue: true,
                        data: {p: id},
                        success: function (data) {
                           $('#commentList').html(data).show();
                        },
                        error: function () {
                            $('#commentList').html(ehtml + "数据加载失败,请重试!").show();
                        }
                    });
	
}
</script>