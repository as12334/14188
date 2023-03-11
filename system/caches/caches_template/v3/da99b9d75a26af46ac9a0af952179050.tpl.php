<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>签到赚钱 - <?php echo $webname; ?>触屏版</title>
    <meta content="app-id=518966501" name="apple-itunes-app" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0"/>
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/comm.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/member.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/help.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="<?php echo G_TEMPLATES_STYLE; ?>/js/js.min.js"></script>
</head>
<body>
<div class="h5-1yyg-v1" id="loadingPicBlock">
    
<!-- 栏目页面顶部 -->


<!-- 内页顶部 -->

    <header class="g-header">
        <div class="head-l">
	        <a href="javascript:;" onclick="history.go(-1)" class="z-HReturn"><s></s><b>返回</b></a>
        </div>
        <h2>签到赚钱</h2>
        <div class="head-r">
	        <a href="<?php echo WEB_PATH; ?>/mobile/home/?yid=<?php echo $uids; ?>" class="z-Member"></a>
        </div>
    </header>

    <section class="clearfix g-member">
	    <div class="clearfix m-round m-name">
<style>
.u-mbr-info li:nth-child(1) {
border-top: none;
}
.u-mbr-info li:nth-child(3n-1) {
width: 100%;
text-indent: 5px;
line-height: 27px;
border-left: none;
border-top: 1px solid #EFEFEF;
box-shadow: none;
}
.u-mbr-info li:nth-child(3n-3) {
width: 100%;
text-indent: 5px;
line-height: 27px;
border-left: none;
border-top: 1px solid #EFEFEF;
box-shadow: none;
}
.u-mbr-info li {
width: 100%;
text-indent: 5px;
line-height: 27px;
border-left: none;
border-top: 1px solid #EFEFEF;
box-shadow: none;
}
</style>

				<p class="u-name">
					<b class="z-name gray01"><?php echo get_user_name($member['uid']); ?></b><em></em>
				</p>
				<ul class="clearfix u-mbr-info">
				<li>可用微积分 <span class="orange"><?php echo $member['score']; ?></span></li>
				<li>您已连续签到 <span class="orange"><?php echo $member['sign_in_time']; ?></span>天</li>
				<li>总共签到 <span class="orange"><?php echo $member['sign_in_time_all']; ?></span>天</li>
				<li>最后签到 <span class="orange"><?php echo $member['sign_in_date']; ?></span></li>
				<li style="text-align: center;">
                <form class="registerform" method="post" action="<?php echo WEB_PATH; ?>/mobile/home/qiandao/<?php echo $uids; ?>/">
                <input name="submit" id="btn_login" type="button" class="z-Recharge-btn" value="马上签到">
			
		        </form>
                </li>
				</ul>
		</div>
		

	    <div class="helpCon" style="padding: 0;">
    	    <div class="helpMain m-round">
        	    <div class="helpInfo">
            	    <dt>
                	    <h3 style="">签到说明</h3>
                    </dt>
                    <dd id="dd1" class="helpBox">
						1.每天签到时间为00:01到23:59<br />
						2.每次签到可获得<?php echo $u_jf; ?>积分（<?php echo $fufen_yuan; ?>积分=1微币）<br />
						3.同一IP、同一地址、同一联系人、同一台电脑只允许一个账号签到，发现多个账号签到的全部封号。<br />
                    </dd>
					<p>
    <strong><span style="color: rgb(255, 0, 0);">微积分使用方法：</span></strong>
</p>
<p>
    <strong><span style="color: rgb(255, 0, 0);"></span></strong>
</p>
<p>
    <img src="<?php echo G_TEMPLATES_STYLE; ?>/newimages/fufen.png" width="100%" />
</p>
                </div>
			</div>
		</div>
		
    </section>

    
<?php include templates("mobile/index","footer");?>

</div>

<div class='copy-tips' style="display:none;"><div class='wap-tips' ></div></div>
<style type="text/css">
.wap-tips{ width: 50%; height: 50px; border-radius: 10px; -webkit-border-radius: 10px; text-align: center; line-height: 50px; background: #000; color: #fff; position: absolute; top: 50%; left: 25%; font-family: "微软雅黑"; margin-top: 20px; margin-left: 0px;opacity: 0.8; }

</style>

<script type="text/javascript">
        $(function () {
            var base_url = '<?php echo WEB_PATH; ?>/mobile/home/qiandao';
            var ehtml = '<i class="passport-icon transparent-png"></i>';
			


            $("#btn_login").click(function () {
                
                   
					$("#btn_login").val("正在签到...");
					
                    $.ajax({
                        url: base_url,
                        async : true,
		                addidvalue: true,
                        data: {action: 'qiandao'},
                        success: function (data) {
							
							if(data==1000){
								$(".copy-tips").show();
                                $(".wap-tips").html('签到成功').show();
								setTimeout(function () {
					location.href = "<?php echo WEB_PATH; ?>/mobile/home/qiandao/<?php echo $uids; ?>/";
                                }, 2000);
								
								}else{
								$("#btn_login").val("马上签到");	
								$(".copy-tips").show();
                                $(".wap-tips").html(data).show();
								setTimeout(function () {
					             $(".copy-tips").hide();
                                }, 2000);
									}
							    
								
                           
                        },
                        error: function () {
						
							$(".copy-tips").show();
                    $(".wap-tips").html(ehtml + "数据提交失败,请重试!").show();
					$("#btn_login").removeClass("letter-noSpac").val("马上签到");
					setTimeout(function () {
					$(".copy-tips").hide();
                                }, 2000);
                         
                        }
                    });
                
            });
        });
    </script>
</body>
</html>
