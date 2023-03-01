<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><!DOCTYPE html>
<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>登录 - <?php echo $webname; ?>触屏版</title>
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
	        <a href="javascript:;" onclick="history.go(-1)" class="z-HReturn"><s></s><b>返回</b></a>
        </div>
        <h2>登录</h2>
        <div class="head-r">
	        <a href="<?php echo WEB_PATH; ?>/mobile/mobile/<?php echo $uids; ?>/" class="z-Home"></a>
        </div>
    </header>

        <section>
	        <div class="registerCon">
    	        <ul>
        	        <li class="accAndPwd">
            	        <dl><input id="username" type="text" placeholder="请输入您的手机号码" class="lEmail"><s class="rs4"></s></dl>
                        <dl>
                            <input type="password" id="password" class="lPwd" placeholder="密码">
                            <s class="rs3"></s>
                        </dl>
                        <!--<dl>
                            <input type="text" id="txtVerify" class="lVerify" placeholder="验证码"><span class="fog"><img id="checkcode" src="<?php echo WEB_PATH; ?>/api/checkcode/image/80_27/"/></span>
                            <s class="rs3"></s>
                        </dl> -->
                    </li>
                    <li><a href="javascript:;" id="btn_login" class="nextBtn orgBtn">登 录</a>
					
					<input name="hidLoginForward" type="hidden" id="hidLoginForward" value="<?php echo WEB_PATH; ?>/mobile/home" /></li>
                    <li class="rSelect"><a href="<?php echo WEB_PATH; ?>/mobile/user/findpassword/<?php echo $uids; ?>/">忘记密码？</a>
					<b></b><a href="<?php echo WEB_PATH; ?>/mobile/user/register/<?php echo $uids; ?>/">新用户注册</a></li>
                </ul>
            <?php 
            if(_cfg("web_wx_url")==''){  $wxurl=WEB_PATH;}else{ $wxurl='http://'._cfg("web_wx_url").'/index.php';}
            
            if(isset($_SERVER['HTTP_REFERER'])==1){
	$reurl = $_SERVER['HTTP_REFERER'];
    
    $kurl = strstr($reurl,"findok");
 if(!$kurl){
	 $reurl = $_SERVER['HTTP_REFERER'];
 }else{$reurl = WEB_PATH."/mobile/home/".$uids;}
 
	}else{$reurl = WEB_PATH."/mobile/home/".$uids;}
    
			$conn_cfg = System::load_app_config("connect",'','api');
             ?>
            <?php if($conn_cfg['qq']['off'] || $conn_cfg['weixin']['off']): ?>                
                <div class="fastLogin">
                  
                                  <h2>        
                                      <span class="line_l"></span> 一键登录<span class="line_r"></span>
                                    </h2>     
                                    <div class="fastInfo">
                                          <?php if($conn_cfg['qq']['off']): ?>
                                          <a  href="<?php echo WEB_PATH; ?>/api/qqlogin">
                                                                                
                                              <img src="<?php echo G_TEMPLATES_STYLE; ?>/images/mobile//qq.png" alt="" class="user_login_q">
                                     
                                              </a>
                                              <?php endif; ?>
                                             <?php if($conn_cfg['weixin']['off']): ?> <a  href="<?php echo WEB_PATH; ?>/api/wxlogin">
                                       
                                              <img src="<?php echo G_TEMPLATES_STYLE; ?>/images/mobile/wx.png" alt="" class="user_login_w">
                                     
                                          </a> 
                                          <?php endif; ?>
                                     </div>
                  </div>
                  <?php endif; ?>	
	        </div>
            
            

        </section>
  
<?php include templates("mobile/index","footer");?>
<script type="text/javascript">
        $(function () {
            var base_url = '<?php echo WEB_PATH; ?>/member/user/pcAjax/';
            var ehtml = '<i></i>';

            function checkUserName() {
                var value = $("#username").val();
                var length = len(value);
				var regM = /^1\d{10}$/;
				var regE =  /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				
                if (value == '' || value.length == 0) {
					
                    $(".wap-tips").html(ehtml + "你还没有输入用户名哦~").show();
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
                    $(".wap-tips").html(ehtml + "你还没有输入密码哦~").show();
					setTimeout(function () {
					$(".wap-tips").hide();
                                }, 2000);
                    return false;
                } else if (value.length < 6) {
                    $(".wap-tips").html(ehtml + "密码至少6个字符~").show();
					setTimeout(function () {
					$(".wap-tips").hide();
                                }, 2000);
                    return false;
                } else {
                    $(".wap-tips").hide();
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


            $("#username").on('blur', function () {
				$('.enter-focus').removeClass('enter-focus');
				$('.enter-focus').addClass('click');
                checkUserName();
				
            });
			$("#username").on('focus', function () {
				$('.click').addClass('enter-focus');
				
               
				
            });

            $("#password").on('blur', function () {
				$('.enter-focus').removeClass('enter-focus');
				$('.enter-focus').addClass('clicks');
                checkPassword();
            });
			$("#password").on('focus', function () {
				$('.clicks').addClass('enter-focus');
				
               
				
            });

            $("#btn_login").click(function () {
                if (checkUserName() && checkPassword()) {
                    username = $("#username").val();
                    password = $("#password").val();
					getType = $("#getType").val();
					$("#btn_login").addClass("letter-noSpac").html("正在登录...");
                    $.ajax({
                        url: base_url,
                        async : true,
		                addidvalue: true,
                        data: {action: 'login_user', username: username, password: password, getType: getType},
                        success: function (data) {
                            if (data != '1000') {
                                $('.wap-tips').html(ehtml + data).show();
								setTimeout(function () {
					$(".wap-tips").hide();
                                }, 2000);
								$("#btn_login").removeClass("letter-noSpac").html("登录");
                            } else {
                               // $(".login-success").show();
								//$("#btn_login").addClass("letter-noSpac").html("登录成功");
                                    location.href = "<?php echo $reurl; ?>";
                               
                            }
                        },
                        error: function () {
                            $('.wap-tips').html(ehtml + "数据提交失败,请重试!").show();
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
