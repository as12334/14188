<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php if($recount==1): ?>
			              <?php $ln=1;if(is_array($recordarr)) foreach($recordarr AS $val): ?>
			            <ul>
                        <li class="w140"><?php echo date('Y-m-d',$val['time']); ?></li>
                        <li class="w90"><?php echo $val['username']; ?></li>
                        <li class="w140"><?php echo $val['banknumber']; ?></li>
                        <li class="w140"><?php echo $val['money']; ?></li>
                        <li class="w90"><?php if($val['money']>100): ?> 0 <?php  else: ?> <?php echo $fufen['fufen_yongjintx']; ?> <?php endif; ?></li>
                        <li class="w90"><?php if($val['auditstatus']==1): ?>审核通过<?php  else: ?>待审核<?php endif; ?></li>
                        </ul>
			              <?php  endforeach; $ln++; unset($ln); ?>
			              <?php  else: ?>		
                       <div class="null-retips-wrapper"><div class="gth-icon transparent-png"></div><span>未有相应提现记录！</span></div>	  
			    
			             <?php endif; ?>