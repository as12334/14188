<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><!DOCTYPE html>
<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>注册 - <?php echo $webname; ?>触屏版</title>
    <meta content="app-id=518966501" name="apple-itunes-app" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    
    <link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/comm.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/login.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?php echo G_TEMPLATES_STYLE; ?>/js/js.min.js"></script>
	<!--<script src="<?php echo G_TEMPLATES_JS; ?>/mobile/jquery190.js" language="javascript" type="text/javascript"></script>
	<script id="pageJS" data="<?php echo G_TEMPLATES_JS; ?>/mobile/Register.js" language="javascript" type="text/javascript"></script> -->

</head>
<body>
    <div class="h5-1yyg-v1" id="content">
        
<!-- 栏目页面顶部 -->


<!-- 内页顶部 -->

    <header class="g-header">
        <div class="head-l">
	        <a href="javascript:;" onClick="history.go(-1)" class="z-HReturn"><s></s><b>返回</b></a>
        </div>
        <h2>注册</h2>
        <div class="head-r">
	        <a href="<?php echo WEB_PATH; ?>/mobile/mobile/<?php echo $uids; ?>/" class="z-Home"></a>
        </div>
    </header>

        <section>
        <div class="registerCon">
	        <ul>
    	        <li><input id="username" type="tel" placeholder="请输入您的手机号码" class="rText" maxlength="11"><s class="rs1"></s>
				</li>
				<li><input type="password" id="password" placeholder="密码" class="rText"><s class="rs3"></s>
				</li>
                <li><input type="password" id="repassword" placeholder="确认密码" class="rText"><s class="rs3"></s>
				</li>
                <?php if(_cfg("code_member_off")==1): ?>
                <li><input type="text" id="decode" placeholder="验证码" class="rVerify"><span class="fog"><img id="checkcode" src="<?php echo WEB_PATH; ?>/api/checkcode/image/85_27/"/></span><s class="rs3"></s>
                </li>
                <?php endif; ?>
                
                <li><a id="btnNext" class="nextBtn  orgBtn">下一步</a>
                <a id="btnNexts" href="javascript:;" class="nextBtn  orgBtn grayBtn" style="display:none">正在提交，请稍后...</a></li>
                <li><span id="isCheck" ><em></em>我已阅读并同意</span><a href="<?php echo WEB_PATH; ?>/mobile/mobile/terms/<?php echo $uids; ?>/"><?php echo _cfg('web_name_two'); ?>用户服务协议</a></li>
            </ul>
        </div>
        </section>
        
<?php include templates("mobile/index","footer");?>

<script type="text/javascript">

$("#checkcode").attr("data",$("#checkcode").attr("src"));
$("#checkcode").click(function(){
	$(this).attr("src",$(this).attr("data")+"&="+new Date().getTime());
});

        $(function () {
            <?php if(_cfg("code_reg_off")==1): ?>
            var base_url = '<?php echo WEB_PATH; ?>/member/user/regAjax/';
			
			<?php  else: ?>
			
			var base_url = '<?php echo WEB_PATH; ?>/member/user/regAjax0/';
			<?php endif; ?>	
            var ehtml = '<i class="passport-icon transparent-png"></i>';
			
			

            function checkUserName() {
                var value = $("#username").val();
                var length = len(value);
				var regM = /^1\d{10}$/;
				var regE =  /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				
                if (value == '' || value.length == 0) {
					
                    $(".wap-tips").html(ehtml + "请输入手机号").show();
					 setTimeout(function () {
					$(".wap-tips").hide();
                                }, 2000);
                    return false;
                }
                else if (regM.test(value)) {
                    $(".wap-tips").hide();
                } else {
					
					$(".wap-tips").html(ehtml + "请输入正确的手机").show();
					 setTimeout(function () {
					$(".wap-tips").hide();
                                }, 2000);
                    return false;
                    
                }
				
                return true;
				
            }
            function checkPassword() {
                var value = $("#password").val();
                if (value == '' || value.length == 0) {
					
                    $(".wap-tips").html(ehtml + "你还没有输入密码哦").show();
                     setTimeout(function () {
					$(".wap-tips").hide();
                                }, 2000);
                    return false;
                } else if (value.length < 6) {
					
                    $(".wap-tips").html(ehtml + "密码至少6个字符").show();
                     setTimeout(function () {
					$(".wap-tips").hide();
                                }, 2000);
                    return false;
                } else {
                    $(".wap-tips").hide();
                }
				
                return true;
            }
			function checkrePassword() {
                var value = $("#repassword").val();
				var valp = $("#password").val();
                if (value == '' || value.length == 0) {
					
                    $(".wap-tips").html(ehtml + "你还没有输入确认密码哦").show();
                    setTimeout(function () {
					$(".wap-tips").hide();
                                }, 2000);
                    return false;
                } else if (value!=valp) {
					
                    $(".wap-tips").html(ehtml + "两次输入的密码不一致").show();
                     setTimeout(function () {
					$(".wap-tips").hide();
                                }, 2000);
                    return false;
                } else {
                    $(".repass-tips").hide();
                }
				$('.regrepass').addClass('correct-text');
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


           

           

            $("#btnNext").click(function () {
                if (checkUserName() && checkPassword() && checkrePassword()) {
                    username = $("#username").val();
                    password = $("#password").val();
					repassword = $("#repassword").val();
					getType = $("#getType").val();
					decode = $("#decode").val();
					$("#btnNext").addClass("grayBtn").html("正在提交，请稍后...");
					$("#btnNexts").show();
					$("#btnNext").hide();
                    $.ajax({
                        url: base_url,
                        async : true,
		                addidvalue: true,
                        data: {action: 'login_user', username: username, password: password, repassword: repassword, getType: getType, decode: decode},
                        success: function (data) {
							
							str=data.length;
							arr=data.split(",");
							
							//开启发送验证码
							
							<?php if(_cfg("code_reg_off")==1): ?>
							if (str>30) {
								
								location.href = "<?php echo WEB_PATH; ?>/mobile/user/mobcheck/"+username;
                                }else if (arr[1]>=1) {
							$("#btnNexts").hide();
					$("#btnNext").show();
                    $(".wap-tips").html(ehtml + "系统还没开通短信套餐!").show();
					//$("#btnNex").removeClass("letter-noSpac").html("下一步");
					setTimeout(function () {
									
                                 $(".wap-tips").hide();
                                }, 2000);
								$("#btnNext").removeClass("grayBtn").html("下一步");
								return false;
                            } else {
                              
                              $("#btnNexts").hide();
					$("#btnNext").show();
                    $(".wap-tips").html(ehtml + data).show();
					$("#btnNext").removeClass("grayBtn").html("下一步");
					setTimeout(function () {
					$(".wap-tips").hide();
                                }, 2000);
                            }
							<?php  else: ?>
			
			                //关闭发送验证码
							if (data==1000) {
								
								location.href = "<?php echo WEB_PATH; ?>/mobile/home/profile";
                            } else {
                              
                            
                    $(".wap-tips").html(ehtml + data).show();
					$("#btnNext").removeClass("grayBtn").html("下一步");
					setTimeout(function () {
					$(".wap-tips").hide();
                                }, 2000);
                            }
							
							<?php endif; ?>	
                           
                        },
                        error: function () {
							$("#btnNexts").hide();
					$("#btnNext").show();
                    $(".wap-tips").html(ehtml + "系统还没开通短信套餐!").show();
					$("#btnNext").removeClass("grayBtn").html("下一步");
					setTimeout(function () {
					$(".wap-tips").hide();
                                }, 2000);
                         
                        }
                    });
                }
            });
        });
    </script>

 
    </div>
    
    <style>
.wap-tips{ width: 230px; height: 50px; border-radius: 10px; -webkit-border-radius: 10px; text-align: center; line-height: 50px; background: #000; color: #fff; position: absolute; top: 50%; left: 50%; font-family: "微软雅黑"; margin-top: 20px; margin-left: -112px;opacity: 0.8; }
</style>
     <div class="wap-tips" style="display: none">
        
    </div>  
</body>
</html>