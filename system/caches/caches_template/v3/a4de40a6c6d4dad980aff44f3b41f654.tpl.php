<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?>                           <?php if(!$memberhuode): ?>
                           <div class="null-retips-wrapper">
                               <div class="gth-icon transparent-png"></div>
                               <span><?php if($memberself['uid']==$member['uid']): ?>您<?php  else: ?>TA<?php endif; ?>还没有获得商品哦！</span>
                           </div>
                           <?php  else: ?>
                           <div class="content">
                                <div class="good-list-wrap">
                                    <ul class="good-list">
                                    <?php $ln=1;if(is_array($memberhuode)) foreach($memberhuode AS $go): ?>
        <?php 
        	$jiexiao = get_shop_if_jiexiao($go['shopid']);
    	 ?>
        <?php if($jiexiao): ?>
                                    <li><a class="g-pic" target="_blank" href="<?php echo WEB_PATH; ?>/go/index/dataserver/<?php echo $go['shopid']; ?>"><img alt="" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo yunjl($go['shopid']); ?>" width="100" height="100"></a><div class="g-info"><h2 class="g-title owner"><a rel="nofollow" target="_blank" href="<?php echo WEB_PATH; ?>/go/index/dataserver/<?php echo $go['shopid']; ?>">(第<?php echo $go['shopqishu']; ?>期)<?php echo $go['shopname']; ?></a></h2><div class="g-older"><p class="g-price">价值：￥<?php echo $jiexiao['money']; ?></p><p>幸运<?php echo _cfg('web_name_two'); ?>码：<b class="orange"><?php echo $go['huode']; ?></b></p></div></div><div class="g-total">参与&nbsp;<span class="orange"><?php echo $go['gonumber']; ?></span>&nbsp;人次</div><a rel="nofollow" class="g-see" target="_blank" href="<?php echo WEB_PATH; ?>/go/index/dataserver/<?php echo $go['shopid']; ?>">查看详情</a><i class="single"><i class="single"></i></i><div class="g-time"><div class="aricle"><div class="cir"></div></div><div class="time-str"><div class="str"><?php echo date("Y-m-d H:i:s",$go['time']); ?></div></div></div><div class="clear"></div></li>
                                     <?php endif; ?>
                                    <?php  endforeach; $ln++; unset($ln); ?>
                                    </ul>
                                    <div class="s-line">
                                        <div class="s-top"></div>
                                        <div class="s-bottom"></div>
                                    </div>
                                </div>
                            <!--<div class="z-look-more clrfix"><a href="javascript:;">查看更多</a></div> --></div>
                           
                           <?php endif; ?>