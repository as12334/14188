<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><section id="buyRecordPage" class="goodsCon">
        <div id="divRecordList" class="recordCon z-minheight" style="display:block;">
           <?php $ln=1;if(is_array($cords)) foreach($cords AS $c): ?> 
			<ul>
				<li class="rBg"><a href="<?php echo WEB_PATH; ?>/mobile/mobile/userindex/<?php echo $c['uid']; ?>/<?php echo $uids; ?>/">
					<img id="imgUserPhoto" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo get_user_key($c['uid'],'img'); ?>"   border="0"/>
					<s></s></a>
				</li>
				<li class="rInfo"><a href="<?php echo WEB_PATH; ?>/mobile/mobile/userindex/<?php echo $c['uid']; ?>/<?php echo $uids; ?>/"><?php echo get_user_name($c['uid'],'username'); ?></a>
					<strong><?php if($c['ip']): ?>
							(<?php echo get_ip($c['id'],'ipcity'); ?> <!--IP:<?php echo get_ip($c['id'],'ipmac'); ?> -->)
							<?php endif; ?></strong><br>
					<span><?php echo _cfg('web_name_two'); ?>了<b class="orange"><?php echo $c['gonumber']; ?></b>人次</span><em class="arial"><?php echo date("Y-m-d H:i:s",$c['time']); ?></em>
				</li><i></i>
			</ul>
		   <?php  endforeach; $ln++; unset($ln); ?>
        </div>
    </section>