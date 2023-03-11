<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0"/>
    <title><?php echo $title; ?> - <?php echo $webname; ?>触屏版</title>
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/newComm.css" rel="stylesheet" type="text/css" />
    
	<link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/other.css" rel="stylesheet" type="text/css" />
       <script src="<?php echo G_TEMPLATES_JS; ?>/mobile/address/js.min.js" language="javascript" type="text/javascript"></script>
        <!-- head js  库文件js-->
        

</head>
<body>
<div class="h5-1yyg-v11">
    
<!-- 栏目页面顶部 -->


<!-- 内页顶部 -->

    <header class="g-header">
        <div class="head-l">
	        <a  href="<?php echo WEB_PATH; ?>/mobile/home" class="z-HReturn"><s></s><b>返回</b></a>
        </div>
        <h2>收货地址</h2>
        <div class="head-r">
	        <a href="<?php echo WEB_PATH; ?>/mobile/home/upadd/<?php echo $uids; ?>/" class="z-HReturn" style="color:#fff; font-size:14px;" >添加</a>
        </div>
    </header>
<section>
     
	 
        <div class="app">
        <?php if($v['default']==''): ?>
        <div class="emptytip bar-normal">
					<img src="<?php echo G_TEMPLATES_STYLE; ?>/images/mobile/address/empty_addr.png?ts=c22b32d0affbd30d_1476700220">
					<p class="empty">你还没有收货地址</p>
					<p class="sub">赶紧添加一个吧</p>
                    <a href="<?php echo WEB_PATH; ?>/mobile/home/upadd/<?php echo $uids; ?>/" class="upAddress"  id="btn_login">增 加</a>
				</div>
        
          
           <?php  else: ?>
           <ul class="my-address">
           <?php $ln=1;if(is_array($member_dizhi)) foreach($member_dizhi AS $v): ?>
											<li class="normal">
							<a href="<?php echo WEB_PATH; ?>/mobile/home/eidtadd/<?php echo $v['id']; ?>/<?php echo $uids; ?>/">
								<p class="baseInfo"><span class="name"><?php echo $v['shouhuoren']; ?></span><span class="phone"><?php echo $v['mobile']; ?></span>
                                <?php if($v['default']=='Y'): ?>
                                <span class="default">默认</span>
                                <?php endif; ?>	
                                </p>
								<p class="address"> <?php echo $v['sheng']; ?>,<?php echo $v['shi']; ?>,<?php echo $v['xian']; ?>,<?php echo $v['jiedao']; ?>    </p>
							</a>
						</li>
										<?php  endforeach; $ln++; unset($ln); ?>
									</ul>
            
               <?php endif; ?>	 

            
            <!--<button id="delAddress" class="delAddress" data-addr_id="49097">删除地址</button> -->
            

<?php include templates("mobile/index","footer");?>

        </div>
    

    

    

</section>







</div>
</body>
</html>
