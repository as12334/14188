<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php if($total>=1): ?>
<?php $ln=1;if(is_array($account)) foreach($account AS $at): ?>
	<ul>
		<li class="w150"><?php echo date("Y-m-d H:i:s",$at['time']); ?></li>
        <li class="w90">&nbsp;</li>
		<li class="w150"><?php echo $at['content']; ?></li>
        <li class="w90">&nbsp;</li>
		<li class="w150">
		<?php if($at['type'] == 1): ?>
			<font color="#0c0">￥<?php echo $at['money']; ?></font>
		<?php  else: ?>
			<font color="red">￥<?php echo $at['money']; ?></font>
		<?php endif; ?>		
		</li>
	</ul>
	<?php  endforeach; $ln++; unset($ln); ?>
			              <?php  else: ?>		
                       <div class="null-retips-wrapper"><div class="gth-icon transparent-png"></div><span>未有相应充值记录！</span></div>	  
			    
			             <?php endif; ?>