<?php defined('G_IN_ADMIN')or exit('No permission resources.'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台首页</title>
<link rel="stylesheet" href="<?php echo G_GLOBAL_STYLE; ?>/global/css/global.css" type="text/css">
<link rel="stylesheet" href="<?php echo G_GLOBAL_STYLE; ?>/global/css/style.css" type="text/css">
<script type="text/javascript" src="<?php echo G_PLUGIN_PATH; ?>/calendar/js.min.js"></script>
<style>
body{ background-color:#fff}
</style>
</head>
<body>

<div class="header lr10">
	<?php echo $this->headerment();?>
</div>
<div class="bk10"></div>
<div class="table_form lr10">
<form method="post" action="" onSubmit="">
	<table width="100%"  cellspacing="0" cellpadding="0">
		<tr>
			<td align="right" style="width:120px">晒单标题：</td>
			<td>
            <?php echo $shaidan['sd_title'];?>
            </td>
		</tr>
         <!------201409101增加---------------->        
            
        <tr>
			<td align="right" style="width:120px">缩略图：</td>
			<td>
            <?php foreach($sd_photolist as $k=>$v){ ?>
            <img src="<?php echo G_UPLOAD_PATH.'/'.$v;?>" width="180"> 
            <?php }?>
           
            </td>
		</tr>
<!---------------------->     
        <tr>
			<td align="right" style="width:120px">晒单内容：</td>
			<td>
            	<?php echo $shaidan['sd_content'];?>
			</td>
		</tr>      
        
        <tr>
			<td align="right" style="width:120px">奖励微积分：</td>
			<td>
            <?php if( $shaidan['sd_fufen']==0 && $shaidan['sd_pass']==0){?>
            <input type="text" id="sd_fufen"  name="sd_fufen" onKeyUp="value=value.replace(/\D/g,'')" style="width:65px; padding-left:0px; text-align:center" class="input-text"><span class="wap-tips" style="color:red"></span>
            <?php }else{ echo $shaidan['sd_fufen'];?>
            
           <?php }?>
            </td>
		</tr>
        <tr>
			<td align="right" style="width:120px">晒单状态：</td>
			<td><?php if( $shaidan['sd_pass']==0){?>正常<?php }elseif( $shaidan['sd_pass']==1){?><span style="color: #03F;">通过</span><?php }elseif( $shaidan['sd_pass']==2){?><span style="color:red;">不通过</span><?php }?>
           
            </td>
		</tr>
        <tr height="60px">
			<td align="right" style="width:120px"></td>
			<td>
            <?php if( $shaidan['sd_fufen']==0 && $shaidan['sd_pass']==0){?>
            <input type="button" id="btnSubmitMsg" name="dosubmit" class="button" value="提 交" />
            <?php }else{?>
            
           <?php }?>
            
            &nbsp;<input class="button" type="button" id="Cancel" value="返 回" onClick="location.href='<?php echo G_MODULE_PATH;?>/shaidan_admin/';" /></td>
		</tr>
	</table>
</form>
</div>
<script type="text/javascript">
        $(function () {
			    
				
            var base_url = "<?php echo G_MODULE_PATH;?>/shaidan_admin/sd_fufen/";
            var ehtml = '';


				
				
               
			 
			  function checkUserName() {
                var value = $("#sd_fufen").val();
                var length = len(value);
				var regM = /^1\d{10}$/;
				var regE =  /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				
				 

                if (value == '' || value.length == 0) {
					$(".copy-tips").show();
                    $(".wap-tips").html(ehtml + "奖励微积分不能为空！~").show();
					setTimeout(function () {
					$(".wap-tips").hide();
                                }, 2000);
                    return false;
                }
               
                return true;
				
            }


            function len(value) {
                var total = 0;
                for (i = 0; i < value.length; i++) {
                    var char = value.charCodeAt(i);
                    if ((char >= 0x0001 && char <= 0x007e) || (0xff60 <= char && char <= 0xff9f)) {
                        total++;
                    }
                    else {
                        total += 2;
                    }
                }
                return total;
            }


           

            $("#btnSubmitMsg").click(function () {
                 if (checkUserName()) {
                    sd_fufen = $("#sd_fufen").val();
					id = <?php echo $shaidan['sd_id'];?>
                   
					$("#btnSubmitMsg").addClass("letter-noSpac").val("提交...");
                    $.ajax({
                        url: base_url,
                        async : true,
		                addidvalue: true,
                        data: {action: 'sd_fufen', sd_fufen: sd_fufen, id: id},
                        success: function (data) {
                            if (data != '1000') {
                                
                                $(".wap-tips").html(ehtml + data).show();
					            setTimeout(function () {
				             	$(".wap-tips").hide();
                                }, 2000);
								$("#btnSubmitMsg").val("提交");
                            } else {
								$("#btnSubmitMsg").addClass("letter-noSpac").val("提交...");
								
                               // $(".login-success").show();
								//$("#btnSubmitMsg").addClass("letter-noSpac").html("登录成功");
                                    location.href = "<?php echo G_MODULE_PATH;?>/shaidan_admin/";
                               
                            }
                        },
                        error: function () {
                            $('.wap-tips').html(ehtml + "数据提交失败,请重试!").show();
                        }
                    });
				 }
            });
        });
    </script>
</body>
</html> 
