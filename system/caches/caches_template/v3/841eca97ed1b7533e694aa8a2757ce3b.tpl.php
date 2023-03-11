<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>
<link href="<?php echo G_TEMPLATES_STYLE; ?>/newcss/member_q.css?v=150728" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo G_TEMPLATES_STYLE; ?>/js/js.min.js"></script>
<div class="p-center-main clrfix">
            <!--左边导航-->
            
  	<?php include templates("member","left");?>
            <div class="sidebar_main clrfix fr">
                <div class="g-purchase-title">
					<span class="gray3"><?php echo _cfg('web_name_two'); ?>记录</span>
                </div>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/layout-setUp.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/layout-invitation.css"/>

<div class="R-content">
	

	<div class="total">
	<dt>
		</dt><dd>您已连续签到：<b class="orange"><?php echo $member['sign_in_time']; ?></b>天</dd>  <dd>总共签到：<b class="orange"><?php echo $member['sign_in_time_all']; ?></b>天</dd>  <dd>最后签到日期：<b class="orange"><?php echo $member['sign_in_date']; ?></b></dd><dd><form class="registerform" method="post" action="<?php echo WEB_PATH; ?>/member/home/qiandao">
        
			<table border="0" cellpadding="0" cellspacing="8">
				<tr>
					<td><em>&nbsp;</em></td>
					<td><input name="submit" id="btn_login" type="button" class="bluebut" value="马上签到"></td>
				</tr>
			</table>
		</form></dd>

   </div>
	<br />
	<div class="divSQTX">
	<font size="+1" color="#FF0000">
		<span class = "gray02"><font size="+1" color="#FF0000"><b>签到说明</font></b></span>
	</font><br><br>

	1.每天签到时间为<?php echo $time_start; ?>到<?php echo $time_stop; ?><br>
    <br>
	2.每次签到可获得<?php echo $u_jf; ?>积分（<?php echo $fufen_yuan; ?>积分=1微币）<br>

	<br>
	<br>
	<font size="+1" color="#FF0000">
		<span class = "gray02"><font size="+1" color="#FF0000"><b>微积分使用说明</font></b></span>
	</font><br>

	<img src="<?php echo G_TEMPLATES_STYLE; ?>/newimages/fufen.png" />
	<br><br><br>

	签到送微积分<?php echo _cfg('web_name_two'); ?>将进行到底！！！
	</div></div>
</div>
</div>
<?php include templates("index","footer");?>

<div class='copy-tips' style="display:none;"><div class='wap-tips' ></div></div>
<style type="text/css">
.copy-tips{position:fixed;z-index:999;bottom:50%;left:50%;margin:0 0 -50px -170px;background-color:rgba(0, 0, 0, 0.2);filter:progid:DXImageTransform.Microsoft.Gradient(startColorstr=#30000000, endColorstr=#30000000);padding:3px;}
.wap-tips{padding:30px 80px;text-align:center;border:1px solid #F4D9A6;background-color:#FFFDEE;font-size:14px;vertical-align:middle; }

</style>

<script type="text/javascript">
        $(function () {
            var base_url = '<?php echo WEB_PATH; ?>/mobile/home/qiandao';
            var ehtml = '<i class="passport-icon transparent-png"></i>';
			


            $("#btn_login").click(function () {
                
                   
					$("#btn_login").addClass("letter-noSpac").val("正在签到...");
					
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
					location.href = "<?php echo WEB_PATH; ?>/member/home/qiandao";
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
					$("#btn_login").removeClass("letter-noSpac").html("马上签到");
					setTimeout(function () {
					$(".copy-tips").hide();
                                }, 2000);
                         
                        }
                    });
                
            });
        });
    </script>