<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?>  
  <div id="divCommissionList" class="list-tab commission gray02 clearfix">
            <ul class="listTitle">
            <li class="w40">充值时间</li>
            <li class="w40">资金渠道</li>
            <li class="w20">收入</li>
           
            </ul>
               <?php if($total!=0): ?>
<?php $ln=1;if(is_array($account)) foreach($account AS $at): ?>
                    
                    <ul class="listconfufen">
                        <li class="w40"><?php echo date("Y-m-d H:i:s",$at['time']); ?></li>
                        <li class="w40"><?php echo $at['content']; ?></li>
                        <li class="w20"><?php if($at['type'] == 1): ?>
			<font color="#0c0">￥<?php echo $at['money']; ?></font>
		<?php  else: ?>
			<font color="red">￥<?php echo $at['money']; ?></font>
		<?php endif; ?>	</li>      
                    </ul>
                    
<?php  endforeach; $ln++; unset($ln); ?>
<?php endif; ?>
</div>
    <?php if($total==0): ?>
    <section class="clearfix">
        <ul >
	      <div class="haveNot z-minheight"><s></s><p>未有相应充值记录！</p></div>
        </ul>
    </section>
    <?php endif; ?>