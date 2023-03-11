<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?>  <div id="divCommissionList" class="list-tab commission gray02">
  <ul class="listTitle">
            <li class="w25">时间</li>
            
            <li class="w25">金额</li>
            <li class="w25">手续费</li>
            <li class="w25">审核状态</li>
            </ul>
               <?php if($recount!=0): ?>
			              <?php $ln=1;if(is_array($recordarr)) foreach($recordarr AS $val): ?>
                    
                    <ul class="listconfufen">
                        <li class="w25"><?php echo date('Y-m-d',$val['time']); ?></li>
                       
                        <li class="w25"><?php echo $val['ygmoney']; ?></li>
                        <li class="w25 orange"><?php echo $val['money']; ?></li>
                        <li class="w25"><?php if($val['money']>=100): ?> 0 <?php  else: ?> <?php echo $fufen['fufen_yongjintx']; ?> <?php endif; ?></li>
                        <li class="w25"><?php if($val['auditstatus']==1): ?>审核通过<?php  else: ?>待审核<?php endif; ?></li>
                        
                    </ul>
                   <?php  endforeach; $ln++; unset($ln); ?>
			              <?php  else: ?>		
                       
			    
			             <?php endif; ?>
                         </div>
    <?php if($recount==0): ?>
    <section class="clearfix">
        <ul >
	      <div class="haveNot z-minheight"><s></s><p>未有相应提现记录！</p></div>
        </ul>
    </section>
    <?php endif; ?>