<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $title; ?> - <?php echo $webname; ?>触屏版</title>
    <meta content="app-id=518966501" name="apple-itunes-app" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/comm.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/login.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?php echo G_TEMPLATES_STYLE; ?>/js/js.min.js"></script>
</head>
<body>
    <div class="h5-1yyg-v1" id="content">
        
<!-- 栏目页面顶部 -->


<!-- 内页顶部 -->

    <header class="g-header">
        <div class="head-l">
	        <a href="<?php echo WEB_PATH; ?>/mobile/home/mobilechecking/<?php echo $uids; ?>/" class="z-HReturn"><s></s><b>返回</b></a>
        </div>
        <h2><?php echo $title; ?></h2>
        <div class="head-r">
	        
        </div>
    </header>

        <section>
	        <div class="registerCon">
	            <input name="username" type="hidden" id="username" value="<?php echo $username; ?>" />
    	        <ul>
        	        <li><input type="text" id="txtCode" placeholder="请输入手机验证码" class="rText" maxlength="6"/><s class="rs2"></s></li>
                    <li><a href="javascript:;" id="btnSubmit" class="nextBtn  orgBtn">提交</a></li>
                    <li style="font-size:12px;">如未收到验证短信，请在<?php echo $time; ?>秒后点击重新发送。</li>
                    <li><a id="btnSendSN" class="resendBtn codes grayBtn">(<?php echo $time; ?>)重新发送</a>
                    <a href="javascript:;" class="resendBtn btnSendSN" style="display:none" >重新发送</a></li>
                </ul>
	        </div>
        </section>
<?php include templates("mobile/index","footer");?>
    </div>
    <style>
.wap-tips{ width: 230px; height: 50px; border-radius: 10px; -webkit-border-radius: 10px; text-align: center; line-height: 50px; background: #000; color: #fff; position: absolute; top: 50%; left: 50%; font-family: "微软雅黑"; margin-top: 20px; margin-left: -100px;opacity: 0.8; }
</style>
     <div class="wap-tips" style="display: none">
        
    </div> 
    <script type="text/javascript">



var getAllp = $(function () {
            var base_url = '<?php echo WEB_PATH; ?>/member/home/mobilesuccess';
            var ehtml = '<i class="passport-icon transparent-png"></i>';
			
			
          

            $(".btnSendSN").click(function () {
               
                    username = $("#username").val();
                    txtCode = $("#txtCode").val();
                    
                   $(".codes").show();
							$(".btnSendSN").hide();
					$('.codes').addClass('grayBtn');
                    $.ajax({
                        url: base_url,
                        async : true,
		                addidvalue: true,
                        data: {action: 'mobile', username: username},
                        success: function (data) {
							//alert(data);
							//$(".btnSendSN").addClass("letter-noSpac").html("正在发送...");
							str=data.length;
							arr=data.split(",");
							
							if (str>30) {
								
                    $(".wap-tips").html(ehtml + "验证码已发送，请查收!").show();
					
					setTimeout(function () {
					$(".wap-tips").hide();
                                }, 2000);
                       
							 }else if (arr[1]!=0) {
						
                    $(".wap-tips").html(ehtml + "对不起，请不要频繁获取验证码!").show();
					
					 setTimeout(function () {
					$(".wap-tips").hide();
                                }, 2000);
								return false;
                            
                            } else {
								
								$(".wap-tips").html(ehtml + data).show();
								
                                 setTimeout(function () {
					$(".wap-tips").hide();
                                }, 2000);
								
								return false;
                          }
                        },
                        error: function () {
							
                            $('.wap-tips').html(ehtml + "对不起，请不要频繁获取验证码!").show();
							 setTimeout(function () {
					$(".wap-tips").hide();
                                }, 2000);
							return false;
                        }
                    });
                
            });
      });
</script>
    <script type="text/javascript">
        $(function () {
            var base_url = '<?php echo WEB_PATH; ?>/member/home/mobilecheck/';
            var ehtml = '<i class="passport-icon transparent-png"></i>';


            function checktxtCode() {
                var value = $("#txtCode").val();
                var length = len(value);
				
				
                if (value == '' || value.length == 0) {
					
                    $(".wap-tips").html(ehtml + "你还没有输入验证码哦~").show();
					setTimeout(function () {
					$(".wap-tips").hide();
                                }, 2000);
                    return false;
                }
                else if (value.length == 6) {
                    $(".wap-tips").hide();
                } else {
					
					$(".wap-tips").html(ehtml + "请输入验证码").show();
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


            

           

            $("#btnSubmit").click(function () {
                if (checktxtCode()) {
                    username = $("#username").val();
                    txtCode = $("#txtCode").val();
					$('#btnSubmit').html("正在提交，请稍后...");
					
                    $.ajax({
                        url: base_url,
                        async : true,
		                addidvalue: true,
                        data: {action: 'mobile', username: username, txtCode: txtCode},
                        success: function (data) {
                            if (data != '1000') {
                               
					            $(".wap-tips").html(ehtml + data).show();
								setTimeout(function () {
					$(".wap-tips").hide();
                                }, 2000);
								$("#btnSubmit").removeClass("grayBtn").html("提交");
                            } else {
                              $(".wap-tips").html(ehtml + "绑定成功!").show();
                                    location.href = "<?php echo WEB_PATH; ?>/mobile/home/profile";
                               
                            }
                        },
                        error: function () {
							$('#btnSubmit').removeClass('grayBtn');
					        $(".wap-tips").html(ehtml + "数据提交失败,请重试").show();
                            setTimeout(function () {
					$(".wap-tips").hide();
                                }, 2000);
                        }
                    });
                }
            });
        });
		
		
		$(function(){
	var A=<?php echo $time; ?>;
	var B=function()
	{
		
		
		if(A==1){
			A=<?php echo $time; ?>;
		 $(".btnSendSN").show();
	    $(".codes").hide();
		$('.codes').removeClass('grayBtn');
		$(".codes").html("("+A+")重新发送");
		return false;
		//location.replace("<?php echo WEB_PATH; ?>/member/home")
	}else{
		
		$(".grayBtn").html("("+A+")重新发送");if(A==1){ return false;}else{A--}
		
		}
	}; setInterval(B,1000)
	
})
    </script>
</body>
</html>
