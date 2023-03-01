<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php $ln=1;if(is_array($orderlist)) foreach($orderlist AS $renqi): ?>
<li id="<?php echo $renqi['id']; ?>">
<a href="<?php echo WEB_PATH; ?>/mobile/mobile/item/<?php echo $renqi['id']; ?>/<?php echo $uids; ?>/" class="g-pic">
			                        <img src1="<?php echo G_TEMPLATES_IMAGE; ?>/loading.gif" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $renqi['thumb']; ?>" border=0 alt="" width="136" height="136"/>
			                    </a>


<p class="g-name"><?php echo $renqi['title']; ?></p>
<ins class="gray9">价值：￥<?php echo $renqi['money']; ?></ins>
<div class="Progress-bar"><p class="u-progress"><span class="pgbar" style="width: <?php echo $renqi['canyurenshu']/$renqi['zongrenshu']*100; ?>%;"><span class="pging"></span></span></p></div>
<div class="btn-wrap"><a href="<?php echo WEB_PATH; ?>/mobile/mobile/item/<?php echo $renqi['id']; ?>/<?php echo $uids; ?>/" class="buy-btn" >立即<?php echo _cfg('web_name_two'); ?></a><div class="gRate" codeid="<?php echo $renqi['id']; ?>" <?php if($renqi['yunjiage'] == 0): ?> style="display:none;" <?php endif; ?>><a href="javascript:;"><s></s></a></div></div>
</li>

<?php  endforeach; $ln++; unset($ln); ?>
 <div class='copy-tips' style="display:none;"><div class='wap-tips' ></div></div>
    <style type="text/css">
.copy-tips{position:fixed;z-index:999;top: 50%; left: 35%;width: 30%; height: 50px;}
.wap-tips{width: 100%; height: 50px; border-radius: 10px; -webkit-border-radius: 10px; text-align: center; line-height: 50px; background: #000; color: #fff; position: absolute; top: 50%; font-family: "微软雅黑"; margin-top: 20px; margin-left: 0px;opacity: 0.8; }

</style>
<script type="text/javascript">
//添加到购物车
	$(document).on("click",'.gRate',function(){
		var codeid=$(this).attr('codeid');
		var ehtml = '<i class="passport-icon transparent-png"></i>';
		$.getJSON('<?php echo WEB_PATH; ?>/mobile/ajax/addShopCart/'+codeid+'/1',function(data){
			if(data.code==1){
				  $(".copy-tips").show();
				 $(".wap-tips").html(ehtml + "添加失败").show();
                     setTimeout(function () {
					$(".copy-tips").hide();
                                }, 2000);
				
			}else if(data.code==0){
				//购物车数量
	$.getJSON('<?php echo WEB_PATH; ?>/mobile/ajax/cartnum',function(data){
		if(data.num){
			$("#btnCarts i").append('<b>'+data.num+'</b>');
		}
	});
				
				 $(".copy-tips").show();
				 $(".wap-tips").html(ehtml + "添加成功").show();
                     setTimeout(function () {
					$(".copy-tips").hide();
                                }, 2000);
				
				return false;				
			}return false;
		});
	});
	
</script>
