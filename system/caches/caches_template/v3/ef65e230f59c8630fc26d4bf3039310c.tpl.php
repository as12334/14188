<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php if($shaidan==null): ?>
<div class="null-retips-wrapper">
                               <div class="gth-icon transparent-png"></div>
                               <span><?php if($memberself['uid']==$member['uid']): ?>您<?php  else: ?>TA<?php endif; ?>还没有晒单哦！</span>
                           </div>
                           <?php  else: ?>
                           <div class="content">
                                <div class="good-list-wrap">
                                    <ul class="good-list good-share">
                                    <?php $ln=1;if(is_array($shaidan)) foreach($shaidan AS $sd): ?>
                                    <?php 
                        
                         $sd_content = strip_tags($sd['sd_content']);
        	             $substrnew=substr($sd['sd_photolist'],0,-1);
                         
                         $sd_photolistnew1=explode(";",$substrnew);
                   
                     
                        ?>
                                    <li><h3 class="s-title"><a target="_blank" href="<?php echo WEB_PATH; ?>/go/shaidan/detail/<?php echo $sd['sd_id']; ?>"><?php echo $sd['sd_title']; ?></a></h3><p class="s-info"><a rel="nofollow" target="_blank" href="http://post.1yyg.com/detail-178730.html"><?php echo _strcut($sd_content,96); ?></a></p><div class="pic-list-wrap"><ol class="pic-list" style="height:75px; overflow:hidden">
                                    <?php $ln=1;if(is_array($sd_photolistnew1)) foreach($sd_photolistnew1 AS $sdimg): ?>
                                    <li pic="<?php echo $sdimg; ?>" ><span><img width="71px" height="71px" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $sdimg; ?>"></span><div class="pic-hover transparent-png" style="display: none;"></div></li>
                                    <?php  endforeach; $ln++; unset($ln); ?>
                                    
                                    
                                    </ol></div><i class="single"><i class="single"></i></i><div class="g-time"><div class="aricle"><div class="cir"></div></div><div class="time-str"><div class="str"><?php echo date("Y-m-d H:i:s",$sd['sd_time']); ?></div></div></div><div class="clear"></div></li>
                                    <?php  endforeach; $ln++; unset($ln); ?>
                                    </ul>
                                    <div class="s-line">
                                        <div class="s-top"></div>
                                        <div class="s-bottom"></div>
                                    </div>
                                </div>
                            </div>
                           <?php endif; ?>