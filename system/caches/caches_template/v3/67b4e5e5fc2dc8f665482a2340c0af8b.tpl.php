<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/newcss/List.css"/>

<script>
function MM_over(ti) {
	var mSubObj=document.getElementById("single-hover"+ti);
	$("#single-hover"+ti).addClass("single-hover");
	
}
function MM_out(ti) {
	var mSubObj=document.getElementById("single-hover"+ti);
$("#single-hover"+ti).removeClass("single-hover");
	
}
</script>

<!--晒单-->
        <!--内容部分-->
        <div class="g-main-con clrfix">
            <div class="w1190">
                <!--导航开始-->
                <div class="g-single-part1 clrfix">
                    <div class="m-single-title">
                        <em class="gray3">晒单分享</em>
                     
                        <span class="gray9 fr">共<i class="orange"><?php echo $total; ?></i>个幸运获得者晒单</span>
                    </div>
                    <div class="m-single-menu">
                        
                        <ul class="fl z-type-con" id="ul_order">
                            <li <?php if($sdtype==''): ?>class="current"<?php endif; ?>><a href="<?php echo WEB_PATH; ?>/go/shaidan" title="全部">全部</a></li>
                            <li <?php if($sdtype==10): ?>class="current"<?php endif; ?>><a href="<?php echo WEB_PATH; ?>/go/shaidan?sdtype=10" title="最新">最新</a></li>
                            <li <?php if($sdtype==40): ?>class="current"<?php endif; ?>><a href="<?php echo WEB_PATH; ?>/go/shaidan?sdtype=40" title="精华">精华</a></li>
                            <li <?php if($sdtype==30): ?>class="current"<?php endif; ?>><a href="<?php echo WEB_PATH; ?>/go/shaidan?sdtype=30" title="推荐">推荐</a></li>
                            <li <?php if($sdtype==20): ?>class="current"<?php endif; ?>><a href="<?php echo WEB_PATH; ?>/go/shaidan?sdtype=20" title="人气">人气</a></li>
                        </ul>

                    </div>
                </div>
                <!--导航结束-->
                <!--列表开始-->
                <div id="loadingSinglePic" class="g-single-part2 clrfix" style="border-left:1px solid #e4e4e4;">
                
                <?php $ln=1;if(is_array($shaidan)) foreach($shaidan AS $sd): ?>
                <?php 
        	         $sd_content = strip_tags($sd['sd_content']);
                     $sd_id = $sd['sd_id'];
                     $total=$this->db->GetCount("select * from `@#_shaidan_hueifu` where `sdhf_id`='$sd_id'");
                   
                     
                 ?>
                
                <div class="m-single  " onmouseover="MM_over(<?php echo $sd['sd_id']; ?>)" onmouseout="MM_out(<?php echo $sd['sd_id']; ?>)" id="single-hover<?php echo $sd['sd_id']; ?>"><div class="single-list">
                <ul>
                <li class="sig-pic"><a target="_blank" href="<?php echo WEB_PATH; ?>/go/shaidan/detail/<?php echo $sd['sd_id']; ?>"><img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $sd['sd_thumbs']; ?>"></a></li>
                <li class="sig-title"><a target="_blank" href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($sd['sd_userid']); ?>"><b><?php echo $sd['sd_title']; ?></b></a></li>
                <li class="sig-text"><?php echo _strcut($sd_content,80); ?></li>
                <li class="gray9"><?php echo date("Y-m-d H:i",$sd['sd_time']); ?></li>
                <li class="sig-xmjdh"><span class="xmjdh_left"><a target="_blank" href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($sd['sd_userid']); ?>"><cite class="fl"><img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo get_user_key($sd['sd_userid'],'img',''); ?>" width="30"><s class="transparent-png"></s></cite><em class="fl"><?php echo get_user_name($sd['sd_userid'],'username'); ?></em></a></span>
                <span class="xmjdh_right">
                <a href="javascript:;" class="xianmu" id="xianmu<?php echo $sd['sd_id']; ?>" num="0" postid="<?php echo $sd['sd_id']; ?>"><i class="transparent-png"></i><em><?php echo $sd['sd_zhan']; ?></em>
                <b class="gray9"  id="gray<?php echo $sd['sd_id']; ?>" style="display:none">已羡慕</b>
                </a>
                <a target="_blank" href="<?php echo WEB_PATH; ?>/go/shaidan/detail/<?php echo $sd['sd_id']; ?>" class="pinglun"><i class="transparent-png"></i><em>(<?php echo $total; ?>)</em></a></span></li>
                </ul>
                <b class="curr-arrow"><s></s></b></div></div>
               <script>

$(function(){
	if($.cookie("xianmu<?php echo $sd['sd_id']; ?>")==<?php echo $sd['sd_id']; ?>){
		$("#xianmu<?php echo $sd['sd_id']; ?>").addClass("xianmu-past");
		
		
	}
	$("#xianmu<?php echo $sd['sd_id']; ?>").click(function(){		
	
		$.post(
			"<?php echo WEB_PATH; ?>/go/shaidan/xianmu",
			{id:<?php echo $sd['sd_id']; ?>},
			function(data){
				
				
				
				if($.cookie("xianmu<?php echo $sd['sd_id']; ?>")==<?php echo $sd['sd_id']; ?>){
					
				
				$("#xianmu<?php echo $sd['sd_id']; ?>").addClass("xianmu-past");	
		        $("#gray<?php echo $sd['sd_id']; ?>").show();
		        setTimeout(function () {
					$("#gray<?php echo $sd['sd_id']; ?>").hide();
                                }, 1000);
		        return false;
		
	           }else{$("#xianmu<?php echo $sd['sd_id']; ?> em").text(data);
			
			   }
				
				$("#xianmu<?php echo $sd['sd_id']; ?>").addClass("xianmu-past");
				
				$.cookie("xianmu<?php echo $sd['sd_id']; ?>",<?php echo $sd['sd_id']; ?>, { expires:7,path: '/'});
	
			}
		);
	})
})
		
</script>
                <?php  endforeach; $ln++; unset($ln); ?>
                
       
         </div>
         
                <!--列表结束-->
                <!--翻页开始-->
                <div class="g-pagination w1190">
                <?php if($total>$num): ?>
		<?php echo $page->show('two'); ?>
		<?php endif; ?></div>
                
                <!--翻页结束-->
            </div>
            
        </div>
       
<!--底部-->
<?php include templates("index","footer");?>