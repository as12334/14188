<?php defined('G_IN_ADMIN')or exit('No permission resources.'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>系统后台登陆</title>
<link rel="stylesheet" href="<?php echo G_GLOBAL_STYLE; ?>/global/css/global.css" type="text/css">
<link rel="stylesheet" href="<?php echo G_GLOBAL_STYLE; ?>/global/css/login.css" type="text/css">
<style>
.login_index{ position:absolute; width:512px; height:344px;left:50%; top:120px; margin-left:-256px;}
.footer{ position:absolute; bottom:10px; width:100%; text-align:center; color:#ccc}
.login { 

	background-color:#ecebeb; position:absolute; width:451px; height:300px;opacity:1;filter:alpha(opacity=100);
	box-shadow:0px 0px 0px #b4641c; left:31px; top:23px;
}
.login_header{background-color:#9dcc5a;width:451px; height:25px;}
.login_header span{ display:inline-block; width:112px; height:25px;float:left;}
.login_header_span1{ background-color:#f17564;}
.login_header_span2{ background-color:#8ccfb3; border-right:3px solid #8ccfb3}
.login_header_span3{ background-color:#7298a6}
.login_header_span4{ background-color:#9dcc5a}

.login_title{ height:50px; line-height:50px; font-size:22px; color:#809eaa; text-align:center}

.login_form{width:451px; height:220px;}
.login_form li{ height:40px; line-height:40px; position:relative;}
.login_form span{margin:0px; display:inline-block; width:85px;line-height:40px; padding-left:40px; text-align:left;font-size:15px; color:#809eaa;}
.textinput{ border:1px solid #809eaa;font-size:15px; position:absolute;top:5px;width:160px; height:25px; color:#db9140;
			padding:0px 10px;background-color:#fff; line-height:25px;}
#form_but{ width:183px; height:44px; margin-top:10px; border:0px; overflow:hidden; cursor:pointer; line-height:44px; 
		 font-size:18px; color:#f17564;font-family: "微软雅黑",Arial,"宋体";
}
#checkcode{display:inline-block; position:absolute;right:145px; top:5px; cursor:pointer}

</style>
</head>
<body>
<div class="login_index">
    <div class="login">
        <div class="login_header">
            <span class="login_header_span1"></span>
            <span class="login_header_span2"></span>
            <span class="login_header_span3"></span>
            <span class="login_header_span4"></span>
        </div> 
   		<!--[if !IE]><!--><div class="login_yun1"></div><!--<![endif]-->
        <!--[if gte IE 8]><div class="login_yun1"></div><![endif]-->
        <div class="login_title">欢迎登陆  </div>
        <div class="login_form">
        <ul>
        <form action="#" method="post" id="form">
        <li><span>管理账号:</span><input type="text" id="username" name="username" style="color:#f17564;" class="textinput" value="" /></li>
        <li><span>管理密码:</span><input type="password" id="password" name="password" style="color:#8ccfb3;" class="textinput"  value="" /></li>
		<?php if(_cfg("code_admin_off")==1){ ?>
        <li><span>验证码:</span><input type="text" id="decode" name="code" style="color:#9dcc5a;width:60px;text-transform:uppercase;" class="textinput" value="" />
        <img id="checkcode" src="<?php echo WEB_PATH; ?>/api/checkcode/image/80_27/"/>
        </li>
		<?php } ?>
        <li><span></span><input type="button" id="form_but"  value="登录" /></li>
        </form>
        </ul>
        </div>
    </div><!--login end-->
</div><!--index end-->
<div class="footer">

</div>
<div class='copy-tips' style="display:none;"><div class='wap-tips' ></div></div>
<style type="text/css">
.copy-tips{position:fixed;z-index:999;bottom:50%;left:50%;margin:0 0 -50px -170px;background-color:rgba(0, 0, 0, 0.2);filter:progid:DXImageTransform.Microsoft.Gradient(startColorstr=#30000000, endColorstr=#30000000);padding:3px;}
.wap-tips{padding:30px 80px;text-align:center;border:1px solid #F4D9A6;background-color:#FFFDEE;font-size:14px;vertical-align:middle; }

</style>
<script src="<?php echo G_GLOBAL_STYLE; ?>/global/js/jquery-1.8.3.min.js"></script>
<script src="<?php echo G_GLOBAL_STYLE; ?>/global/js/global.js"></script>
<script src="<?php echo G_PLUGIN_PATH; ?>/layer/layer.min.js"></script>

<script type="text/javascript">
        $(function () {
            var base_url = '<?php echo WEB_PATH; ?>/member/user/adminajax/';
            var ehtml = '';

            function checkUserName() {
                var value = $("#username").val();
                var length = len(value);
				var regM = /^1\d{10}$/;
				var regE =  /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				
                if (value == '' || value.length == 0) {
					$(".copy-tips").show();
                    $(".wap-tips").html(ehtml + "你还没有输入用户名哦~").show();
					setTimeout(function () {
									
                                 $(".copy-tips").hide();
                                }, 1000);
                    return false;
              
                    
                }
                return true;
				
            }
            function checkPassword() {
                var value = $("#password").val();
                if (value == '' || value.length == 0) {
                    $(".wap-tips").html(ehtml + "你还没有输入密码哦~").show();
					$(".copy-tips").show();
					setTimeout(function () {
									
                                 $(".copy-tips").hide();
                                }, 1000);
                    return false;
                } else if (value.length < 6) {
                    $(".wap-tips").html(ehtml + "密码至少6个字符~").show();
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


            

            $("#form_but").click(function () {
                if (checkUserName() && checkPassword()) {
                    username = $("#username").val();
                    password = $("#password").val();
					decode = $("#decode").val();
					getType = $("#getType").val();
					$("#form_but").addClass("letter-noSpac").val("正在登录...");
                    $.ajax({
                        url: base_url,
                        async : true,
		                addidvalue: true,
                        data: {action: 'login_user', username: username, password: password, decode: decode, getType: getType},
                        success: function (data) {
                            if (data != '1000') {
								$(".copy-tips").show();
					setTimeout(function () {
									
                                 $(".copy-tips").hide();
                                }, 1000);
                                $('.wap-tips').html(ehtml + data).show();
								$("#form_but").removeClass("letter-noSpac").val("登录");
                            } else {
								
					 location.href = "<?php echo WEB_PATH.'/'.ROUTE_M.'/index'; ?>";
                               
                               // $(".login-success").show();
							  //	$("#btn_login").addClass("letter-noSpac").html("登录成功");
                                   
                               
                            }
                        },
                        error: function () {
							$(".copy-tips").show();
					setTimeout(function () {
									
                                 $(".copy-tips").hide();
                                }, 1000);
                            $('.wap-tips').html(ehtml + "数据提交失败,请重试!").show();
                        }
                    });
                }
            });
        });
    </script>
</body>
</html> 
