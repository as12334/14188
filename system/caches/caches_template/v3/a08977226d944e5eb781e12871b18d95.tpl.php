<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>会员注册_<?php echo _cfg("web_name"); ?></title>
    <meta name="Description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/newcss/sslComm.css?date=11" />

    <link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/newcss/layout.css?date=11" />
    <script type="text/javascript" src="<?php echo G_TEMPLATES_STYLE; ?>/js/js.min.js"></script>
</head>
<body>
    <div class="wrapper">
        <input name="username" type="hidden" id="username" value="<?php echo $username; ?>" />

        
         <div class="g-logo-top">
            <a rel="nofollow" href="<?php echo G_WEB_PATH; ?>"><img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo Getlogo(); ?>"></a>
            <span class="fr">已有账号？<a id="hylinkLoginPage" class="blue" href="<?php echo WEB_PATH; ?>/login">立即登录</a></span>
        </div>

        <div class="g-contentCon clrfix">

            <div class="m-main clrfix">
                <h2 class="gray3">验证信息</h2>
                <div class="security-code-con clrfix">
                    <dl>
                        <dt>验证码已发送至<b class="blue"><?php echo $username; ?></b><a id="hylinkRegisterPageA" href="<?php echo WEB_PATH; ?>/register">更换</a></dt>
                        <dd class="code-form">
                            <input id="txtCode" type="text"  maxlength="6" value="请输入6位验证码">
                            <a id="btnSendSN" href="javascript:;" class="codes grayBtn" >(<?php echo $time; ?>)重新发送</a>
                            <a href="javascript:;" class="btnSendSN" style="display:none" >重新发送</a>
                             <em style="display:none;">请输入6位验证码</em>
                            <span class="orange" style="display:none;"></span>
                        </dd>
                        <dd><a id="btnSubmit" href="javascript:;" class="z-agreeBtn">提交</a></dd>
                    </dl>
                </div>
            </div>
        </div>

        <!--版权-->
         <div class="footer">
	<div class="footer_links">
		<a href="<?php echo WEB_PATH; ?>">首页</a>
		<b></b>
		<?php echo Getheader('foot'); ?>
  	</div>
	<div class="copyright"><a href="http://www.miibeian.gov.cn/" target="_blank"><?php echo _cfg("web_copyright"); ?></a></div>
</div>
    </div>
    <div class='copy-tips' style="display:none;"><div class='wap-tips' ></div></div>
    <style type="text/css">
.copy-tips{position:fixed;z-index:999;bottom:50%;left:50%;margin:0 0 -50px -170px;background-color:rgba(0, 0, 0, 0.2);filter:progid:DXImageTransform.Microsoft.Gradient(startColorstr=#30000000, endColorstr=#30000000);padding:3px;}
.wap-tips{padding:30px 80px;text-align:center;border:1px solid #F4D9A6;background-color:#FFFDEE;font-size:14px;vertical-align:middle; }

</style>
<script type="text/javascript">
$(function(){
	var A=<?php echo $time; ?>;
	var B=function()
	{
		
		
		if(A==1){
			A=<?php echo $time; ?>;
			$(".codes").removeClass('grayBtn').html("(<?php echo $time; ?>)重新发送");
		 $(".btnSendSN").show();
	    $(".codes").hide();
		
		
		//location.replace("<?php echo WEB_PATH; ?>/member/home")
	}else{
		
		$(".grayBtn").html("("+A+")重新发送");A--
		}
	};setInterval(B,1000)
	
})


var getAllp = $(function () {
            var base_url = '<?php echo WEB_PATH; ?>/member/user/dorecode/';
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
                        data: {action: 'login_user', username: username, txtCode: txtCode},
                        success: function (data) {
							//alert(data);
							//$(".btnSendSN").addClass("letter-noSpac").html("正在发送...");
							str=data.length;
							arr=data.split(",");
							
							if (str>30) {
								$(".copy-tips").show();
                    $(".wap-tips").html(ehtml + "验证码已发送，请查收!").show();
					
					setTimeout(function () {
					$(".copy-tips").hide();
                                }, 2000);
                       
							 }else if (arr[1]!=0) {
							$(".copy-tips").show();
                    $(".wap-tips").html(ehtml + "对不起，请不要频繁获取验证码!").show();
					
					setTimeout(function () {
									
                                 $(".copy-tips").hide();
                                }, 2000);
								return false;
                            
                            } else {
								$('.code-form').addClass('error-text');
								$(".orange").html(ehtml + data).show();
								
                                setTimeout(function () {
									
                                 $(".orange").hide();
                                }, 2000);
								
								return false;
                          }
                        },
                        error: function () {
							$('.code-form').addClass('error-text');
                            $('.orange').html(ehtml + "对不起，请不要频繁获取验证码!").show();
							return false;
                        }
                    });
                
            });
      });
</script>
    <script type="text/javascript">
        $(function () {
            var base_url = '<?php echo WEB_PATH; ?>/member/user/Ajaxcode/';
            var ehtml = '<i class="passport-icon transparent-png"></i>';
			$("#txtCode").focus(function(){		
	     	var va1=$("#txtCode").val();
		    if(va1=='请输入6位验证码'){
			$("#txtCode").val("");
		         }
	        });
			$("#txtCode").blur(function(){		
	     	var va1=$("#txtCode").val();
		    if(va1==''){
			$("#txtCode").val("请输入6位验证码");
		         }
	        });

            function checktxtCode() {
                var value = $("#txtCode").val();
                var length = len(value);
				
				
                if (value == '' || value.length == 0) {
					$('.code-form').addClass('error-text');
                    $(".orange").html(ehtml + "你还没有输入验证码哦~").show();
                    return false;
                }
                else if (value.length == 6 && value != '请输入6位验证码') {
                    $(".orange").hide();
                } else {
					$('.code-form').addClass('error-text');
					$(".orange").html(ehtml + "请输入验证码").show();
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


            $("#txtCode").on('blur', function () {
				$('.enter-focus').removeClass('enter-focus');
				$('.enter-focus').addClass('click');
                checkUserName();
				
            });
			$("#txtCode").on('focus', function () {
				$('.click').addClass('enter-focus');
				
               
				
            });

           

            $("#btnSubmit").click(function () {
                if (checktxtCode()) {
                    username = $("#username").val();
                    txtCode = $("#txtCode").val();
					
					$("#btnSubmit").addClass("letter-noSpac").html("正在提交，请稍后...");
                    $.ajax({
                        url: base_url,
                        async : true,
		                addidvalue: true,
                        data: {action: 'login_user', username: username, txtCode: txtCode},
                        success: function (data) {
                            if (data != '1000') {
                                $('.code-form').addClass('error-text');
					            $(".orange").html(ehtml + data).show();
								$("#btnSubmit").removeClass("letter-noSpac").html("提交");
                            } else {
								setTimeout(function () {
					 location.href = "<?php echo WEB_PATH; ?>/member/home/modify";
                                }, 1);
                               // $(".login-success").show();
							//	$("#btnSubmit").addClass("letter-noSpac").html("提交成功");
                                    
                               
                            }
                        },
                        error: function () {
							$('.code-form').addClass('error-text');
					            $(".orange").html(ehtml + "数据提交失败,请重试").show();
                           
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
