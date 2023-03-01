<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?>

<?php if($id==6 || $id==7  || $id==8): ?>


       
        
        <?php $ln=1;if(is_array($qz)) foreach($qz AS $tiezi): ?>
        	<li>
                <a class="c_video_img" href="<?php echo WEB_PATH; ?>/mobile/group/nei/<?php echo $tiezi['id']; ?>/<?php echo $uids; ?>/">
                    <img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $tiezi['image']; ?>" width="100%"  />
                    <?php if($tiezi['qzid']==7  || $tiezi['qzid']==8): ?> <span></span><?php endif; ?>
                </a>
                <a class="c_video_text" href="<?php echo WEB_PATH; ?>/mobile/group/nei/<?php echo $tiezi['id']; ?>/<?php echo $uids; ?>/" title="<?php echo $tiezi['title']; ?>"><?php echo _strcut($tiezi['title'],54); ?></a>
                <p><span><?php echo date("Y-m-d",$tiezi['time']); ?></span><span class="c_play_num c_play_num2"><?php echo $tiezi['dianji']; ?></span></p>
            </li>
            <?php  endforeach; $ln++; unset($ln); ?>
                    
              
   
    

<!--<iframe src="<?php echo WEB_PATH; ?>/mobile/group/list_ifram/<?php echo $id; ?>" id="iframepage" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" onLoad="iFrameHeight()"></iframe>


<script type="text/javascript" language="javascript">   
function iFrameHeight() {   
var ifm= document.getElementById("iframepage");   
var subWeb = document.frames ? document.frames["iframepage"].document : ifm.contentDocument;   
if(ifm != null && subWeb != null) {
   ifm.height = subWeb.body.scrollHeight;
   ifm.width = subWeb.body.scrollWidth;
}   
}   
</script> -->

<?php  else: ?>    

      <ul class="c_pay_way c_person_details" id="dicoverList">
<?php $ln=1;if(is_array($qz)) foreach($qz AS $tiezi): ?>
      <a href="<?php echo WEB_PATH; ?>/mobile/group/nei/<?php echo $tiezi['id']; ?>/<?php echo $uids; ?>/"> 
       <li class="c_add_topborder c_newadd_topborder " style="height:100px;background-position: 95% center; border-bottom:1px dashed #f3f3f3;">
       
                    
               
                
                <?php if(userid($tiezi['hueiyuan'],'img')==null): ?>
				<img src="<?php echo G_TEMPLATES_STYLE; ?>/images/prmimg.jpg" class="IImg"/>
				<?php  else: ?>
				<img id="imgUserPhoto" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo userid($tiezi['hueiyuan'],'img'); ?>" class="IImg" border="0"/>
				<?php endif; ?>
       
       <div class="wz1"><?php echo _strcut($tiezi['title'],22); ?><br/><em class="wz2">
       <?php 
                         $neirong = strip_tags($tiezi['neirong']);  
                         $hueifu=$this->db->GetOne("select * from `@#_quanzi_tiezi` WHERE tiezi='$tiezi[id]' and `shenhe` = 'Y' order by id DESC");                  
                        ?>
       <?php echo _strcut($neirong,54); ?></em></div>
       </li>
       </a>
      <?php  endforeach; $ln++; unset($ln); ?>
       </ul> 
   
 <?php endif; ?>
