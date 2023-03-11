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
    <script type="text/javascript">
       
            var base_url_qq = "<?php echo WEB_PATH; ?>/api/qqlogin/callback/<?php echo $yid; ?>";
			
			<?php if(_cfg("code_reg_off")==1): ?>
            var base_url_yaoqing = "<?php echo WEB_PATH; ?>/member/user/regAjax/<?php echo $yid; ?>";
			
			<?php  else: ?>
			
			var base_url_yaoqing = "<?php echo WEB_PATH; ?>/member/user/regAjax0/<?php echo $yid; ?>";
			<?php endif; ?>	
			
            var ehtml = '';
			//$("#commentList").html(ehtml).show();



            var getAllp = function(){
                    
				//	$("#commentList").html(ehtml);
                    $.ajax({
                        url: base_url_yaoqing,
                        async : true,
		                addidvalue: true,
                        data: {action: 'login_user'},
                        success: function (data) {
                          $('#commentList').html(data).show();
                        },
                        error: function () {
                            $('#commentList').html("数据加载失败,请重试!").show();
                        }
                    });
             	
};
getAllp();
  var getqq = function(){
                    
				//	$("#commentList").html(ehtml);
                    $.ajax({
                        url: base_url_qq,
                        async : true,
		                addidvalue: true,
                        data: {action: 'login_user'},
                        success: function (data) {
                        //  $('#commentList').html(data).show();
                        },
                        error: function () {
                        //    $('#commentList').html("数据加载失败,请重试!").show();
                        }
                    });
             	
};
getqq();       
    </script>

</head>
<body>
    <div class="wrapper">
      
        <div class="g-logo-top">
            <a rel="nofollow" href="<?php echo G_WEB_PATH; ?>"><img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo Getlogo(); ?>"></a>
            <span class="fr">已有账号？<a id="hylinkLoginPage" class="blue" href="<?php echo WEB_PATH; ?>/login">立即登录</a></span>
        </div>

        <div class="g-contentCon clrfix">

            <div class="m-main clrfix">
                <h2 class="gray3">新用户注册</h2>
                <div class="register-form-con clrfix">
                    <ul>
                        <li class="regus" >
                            <input id="username" type="text"  maxlength="11" placeholder="请输入您的手机号码"  style="color: rgb(187, 187, 187);"/>
                            <b class="passport-icon user-name transparent-png"></b>
                            <em style="display: none;">手机号</em>
                            <span class="orange us-tips" style="display: none;"></span>
                            <s class="passport-icon" style="display: none;"></s>
                        </li>
                        <li class="regpass">
                            <input id="password" type="password" maxlength="20" placeholder="密码"/>
                            <b class="passport-icon login-password transparent-png"></b>
                            <em style="display: none;">设置登录密码</em>
                            <span class="orange pass-tips" style="display: none;"></span>
                            <s class="passport-icon" style="display: none;"></s>
                            <span id="pwdStrength" style="display: none;"></span>

                        </li>
                        <li class="regrepass">
                            <input id="repassword" type="password" maxlength="20" placeholder="确认密码"/>
                            <b class="passport-icon login-password transparent-png"></b>
                            <em style="display: none;">确认密码</em>
                            <span class="orange repass-tips" style="display: none;"></span>
                            <s class="passport-icon" style="display: none;"></s>
                        </li>
                        <?php if(_cfg("code_member_off")==1): ?>
                       
                        <li class="txtCode">
                    	    <div class="z-code clrfix">
                        	    <input id="decode" type="text" maxlength="6">
                                <b class="passport-icon verification-code transparent-png"></b>
                                <em style="display:none;">验证码</em>
                                <img src="<?php echo WEB_PATH; ?>/api/checkcode/image/80_27/" alt="" id="checkcode" />
                                
                            </div>
                            <span class="orange"></span>
                        </li> 
                   <?php endif; ?>
                    </ul>
                </div>
                <div class="link-con clrfix">
                    <a id="btn_login" href="javascript:;" class="z-agreeBtn">同意协议并注册</a>
                    <a id="btn_logins" href="javascript:;" class="z-agreeBtn" style="display:none">正在提交，请稍后...</a>
                    <a id="btnAgreement" href="<?php echo WEB_PATH; ?>/help/3" target="_blank" class="z-agreement">《<?php echo _cfg('web_name'); ?>服务协议》</a>
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
				
                if (value == '手机号' || value.length == 0) {
					$('.regus').addClass('error-text');
					$('.regus').removeClass('correct-text');
                    $(".us-tips").html(ehtml + "请输入手机号").show();
					 setTimeout(function () {
					$(".us-tips").hide();
                                }, 2000);
                    return false;
                }
                else if (regM.test(value)) {
                    $(".us-tips").hide();
                } else {
					$('.regus').addClass('error-text');
					$('.regus').removeClass('correct-text');
					$(".us-tips").html(ehtml + "请输入正确的手机号").show();
					 setTimeout(function () {
					$(".us-tips").hide();
                                }, 2000);
                    return false;
                    
                }
				$('.regus').addClass('correct-text');
                return true;
				
            }
            function checkPassword() {
                var value = $("#password").val();
                if (value == '' || value.length == 0) {
					$('.regpass').addClass('error-text');
					$('.regpass').removeClass('correct-text');
                    $(".pass-tips").html(ehtml + "你还没有输入密码哦").show();
                     setTimeout(function () {
					$(".pass-tips").hide();
                                }, 2000);
                    return false;
                } else if (value.length < 6) {
					$('.regpass').addClass('error-text');
					$('.regpass').removeClass('correct-text');
                    $(".pass-tips").html(ehtml + "密码至少6个字符").show();
                     setTimeout(function () {
					$(".pass-tips").hide();
                                }, 2000);
                    return false;
                } else {
                    $(".pass-tips").hide();
                }
				$('.regpass').addClass('correct-text');
                return true;
            }
			function checkrePassword() {
                var value = $("#repassword").val();
				var valp = $("#password").val();
                if (value == '' || value.length == 0) {
					$('.regrepass').addClass('error-text');
					$('.regrepass').removeClass('correct-text');
                    $(".repass-tips").html(ehtml + "你还没有输入确认密码哦").show();
                    setTimeout(function () {
					$(".repass-tips").hide();
                                }, 2000);
                    return false;
                } else if (value!=valp) {
					$('.regrepass').addClass('error-text');
					$('.regrepass').removeClass('correct-text');
                    $(".repass-tips").html(ehtml + "两次输入的密码不一致").show();
                     setTimeout(function () {
					$(".repass-tips").hide();
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


            $("#username").on('blur', function () {
				$('.regus').removeClass('enter-focus');
				$('.passport-icon').show();
                checkUserName();
				
            });
			$("#username").on('focus', function () {
				$('.regus').addClass('enter-focus');
				
				
               
				
            });

            $("#password").on('blur', function () {
				$('.regpass').removeClass('enter-focus');
				
                checkPassword();
            });
			$("#password").on('focus', function () {
				$('.regpass').addClass('enter-focus');	
            });
			
			$("#repassword").on('blur', function () {
				$('.regrepass').removeClass('enter-focus');
				
                checkrePassword();
            });
			$("#repassword").on('focus', function () {
				$('.regrepass').addClass('enter-focus');	
            });
			
			
			$("#decode").on('blur', function () {
				$('.txtCode').removeClass('enter-focus');
				
               
            });
			$("#decode").on('focus', function () {
				$('.txtCode').addClass('enter-focus');	
            });

            $("#btn_login").click(function () {
                if (checkUserName() && checkPassword() && checkrePassword()) {
                    username = $("#username").val();
                    password = $("#password").val();
					repassword = $("#repassword").val();
					getType = $("#getType").val();
					decode = $("#decode").val();
					$("#btn_login").addClass("letter-noSpac").html("正在提交，请稍后...");
					$("#btn_logins").show();
					            $("#btn_login").hide();
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
								setTimeout(function () {
					 location.href = "<?php echo WEB_PATH; ?>/member/user/mobcheck/"+username;
                                }, 1);
								
                                }else if (arr[1]>=1) {
							$(".copy-tips").show();
                    $(".wap-tips").html(ehtml + "系统还没开通短信套餐!").show();
					$("#btn_login").removeClass("letter-noSpac").html("同意协议并注册");
					$("#btn_logins").hide();
					$("#btn_login").show();
					setTimeout(function () {
									
                                 $(".copy-tips").hide();
                                }, 2000);
								return false;
                            } else {
                              $("#btn_logins").hide();
					$("#btn_login").show();
                              $(".copy-tips").show();
                    $(".wap-tips").html(ehtml + data).show();
					$("#btn_login").removeClass("letter-noSpac").html("同意协议并注册");
					setTimeout(function () {
					$(".copy-tips").hide();
                                }, 2000);
                            }
			
			                <?php  else: ?>
			
			                //关闭发送验证码
							if (data==1000) {
								
								location.href = "<?php echo WEB_PATH; ?>/member/home/modify";
                               
                            } else {
                   
                    $(".copy-tips").show();
                    $(".wap-tips").html(ehtml + data).show();
					$("#btn_login").removeClass("letter-noSpac").html("同意协议并注册");
					setTimeout(function () {
					$(".copy-tips").hide();
                                }, 2000);
                            }
							
			                <?php endif; ?>	
							
							
							
							
							
                           
                        },
                        error: function () {
							$("#btn_logins").hide();
					$("#btn_login").show();
							$(".copy-tips").show();
                    $(".wap-tips").html(ehtml + "系统还没开通短信套餐!").show();
					$("#btn_login").removeClass("letter-noSpac").html("同意协议并注册");
					setTimeout(function () {
					$(".copy-tips").hide();
                                }, 2000);
                         
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
