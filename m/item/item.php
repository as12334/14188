

    <ul  >
       <?php
	
		$sq  = ''; 
		
		
		
$sqlcountip='select COUNT(*) from `'.$tablepre.'pro_co` where pass="yes" '.$sq.'';
$counterip=$db->getqueryallrow($sqlcountip);
$sqlip='select * from `'.$tablepre.'pro_co` where pass="yes" '.$sq.' order by id desc';				
$pip=new page();
$pip->setpage($counterip,100);
$sqlip.=$pip->getlimit();  
$rrip=$db->query($sqlip);
while($row=$db->getrow($rrip)){?>
    <li   style="overflow:hidden">        <a  href="<?php echo $url; ?>/m/item/?id=<?php echo $row['id'] ?>">      
    <img class="lazy" _src="<?php echo $url; ?>statics/uploads/<?php echo $row['img_sl0'] ?>" src="<?php echo $url; ?>/<?php echo $rowSeo['img_sl3']; ?>" onload="if (this.width!=this.height){this.height=this.width;}" > 
   <!-- <span class="icon new">新品</span> -->
         </a>        <a href="<?php echo $url; ?>/m/item/?id=<?php echo $row['id'] ?>"  target="_blank">			<h3><?php echo $row['title'] ?></h3>            <div class="list-price buy ">                <span class="price-new"><i>￥</i><?php echo $row['pro_can2'] ?></span><!--<i class="del">￥<?php echo $row['pro_can1'] ?></i> -->                <span class="good-btn">
         <?php if($row['id']=="A"){?>
    <img src="<?php echo $url; ?>/m/images/icon/brand.png">
 品牌折扣<?php }elseif($row['id']=="B"){?> <img src="<?php echo $url; ?>/m/images/icon/t.gif">
 去天猫<?php }elseif($row['id']=="C"){?> <img src="<?php echo $url; ?>/m/images/icon/tb.png">
 去淘宝<?php }else{?><?php }?><img src="<?php echo $url; ?>/m/images/icon/kimi.png">
 特卖</span>            </div>        </a>    </li>
 
 <?php }?>
 
 
    </ul>


