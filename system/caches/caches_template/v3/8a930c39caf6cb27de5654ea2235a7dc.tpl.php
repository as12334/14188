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
    
	
	<link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/login.css" rel="stylesheet" type="text/css" />
	<style>
.login-success{ width: 130px; height: 50px; border-radius: 10px; -webkit-border-radius: 10px; text-align: center; line-height: 50px; background: #000; color: #fff; position: absolute; top: 50%; left: 50%; font-family: "微软雅黑"; margin-top: 20px; margin-left: -62px;opacity: 0.8; }
</style>
	

       <script src="<?php echo G_TEMPLATES_JS; ?>/mobile/address/js.min.js" language="javascript" type="text/javascript"></script>
        <!-- head js  库文件js-->
        
        <script type="text/javascript">
            var versionNumber="ts=3b5d42560ca10c23_1445665610";
        </script>
        <!-- H5 -->
	<script src="<?php echo G_TEMPLATES_JS; ?>/mobile/jquery190.js" language="javascript" type="text/javascript"></script>
    <SCRIPT type=text/javascript>
function postcheck(){
	if (document.wfform.username.value==""){
		alert('请输入昵称！');
		document.wfform.username.focus();
		return false;
	}
	if (document.wfform.qianming.value==""){
		alert('请输入签名！');
		document.wfform.qianming.focus();
		return false;
	}
	
	
	document.wfform.wfsubmit.disabled=true;
	document.wfform.wfsubmit.style.backgroundImage = "url(style/sub2.gif)";
	return true;	
}
</SCRIPT>
</head>
<body>
<div class="h5-1yyg-v1" id="content">

    
<!-- 栏目页面顶部 -->


<!-- 内页顶部 -->

    <header class="g-header">
        <div class="head-l">
	        <a  href="<?php echo WEB_PATH; ?>/mobile/home" class="z-HReturn"><s></s><b>返回</b></a>
        </div>
        <h2>编辑资料</h2>
        <div class="head-r">
	        <a href="<?php echo WEB_PATH; ?>/mobile/mobile/?yid=<?php echo $uids; ?>" class="z-Home"></a>
        </div>
    </header>
<section>
     <form id="wfform" name="wfform" action="" method="post">
     <input type="hidden" name="type_pro" value="/mobile/home">
	          <section>
	        <div class="registerCon">
    	        <ul class="form">
        	        <li>
						账号:
													<b><?php echo $member['mobile']; ?></b>
						                    </li>
        	        <li>
						<input name="username" id="username" type="text" placeholder="请输入昵称" value="<?php echo $member['username']; ?>">
                    </li>
                    <li>
						<input name="txtQQ" id="txtQQ" type="text" placeholder="请输入qq" value="<?php echo $member['qq']; ?>">
                    </li>
                    
        	        <li>
						<input name="qianming" id="qianming" type="text" placeholder="请输入签名" value="<?php echo $member['qianming']; ?>">
                    </li>
                    <li><input name="submit" type="button"    id="orgBtn" value="保存" >
						
					</li>
                </ul>
	        </div>
        </section>

</form>

  <?php include templates("mobile/index","footer");?>

<script type="text/javascript">
        $(function () {
            var base_url = '<?php echo WEB_PATH; ?>/member/home/usermodify';
            var ehtml = '';
			

            function checkUserName() {
                var value = $("#username").val();
                var length = len(value);
				var regn = /^[A-Za-z0-9_\u4e00-\u9fa5]{2,20}$/;
				var regE =  /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				
                if (value == '' || value.length == 0) {
					$(".login-success").show();
                    $(".login-success p").html(ehtml + "请填写昵称~").show();
					 setTimeout(function () {
									$(".login-success").hide();
                                }, 1000);
                    return false;
                }
                else if (regn.test(value)) {
                    $(".login-success").hide();
                } else {
					$(".login-success").html(ehtml + "2-20个字符，汉字、字母、数字、“_-”组成").show();
					setTimeout(function () {
									$(".login-success").hide();
                                }, 1000);
                    return false;
                    
                }
                return true;
				
            }
 
			function checktxtQQ() {
                var value = $("#txtQQ").val();
                var length = len(value);
				var regn = /^[A-Za-z0-9_\u4e00-\u9fa5]{2,20}$/;
				var regq = /^[0-9]{3,12}$/;
				var regE =  /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				
                if (value == '' || value.length == 0) {
					
                    $(".login-success").html(ehtml + "请填写QQ~").show();
					 setTimeout(function () {
									$(".login-success").hide();
                                }, 1000);
                    return false;
                }
                else if (regq.test(value)) {
                    $(".login-success").hide();
                } else {
					$(".login-success").html(ehtml + "QQ格式不对").show();
					setTimeout(function () {
									$(".login-success").hide();
                                }, 1000);
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


            $("#username").on('blur', function () {
				
                checkUserName();
				
            });
			

          
			$("#txtQQ").on('blur', function () {
				
                checktxtQQ();
				
            });
			
			
            $("#orgBtn").click(function () {
                if (checkUserName() && checktxtQQ()) {
                    username = $("#username").val();
                    txtQQ = $("#txtQQ").val();
					qianming = $("#qianming").val();
					$("#orgBtn").addClass("letter-noSpac").val("正在保存...");
                    $.ajax({
                        url: base_url,
                        async : true,
		                addidvalue: true,
                        data: {action: 'usermodify', username: username, txtQQ: txtQQ, qianming: qianming},
                        success: function (data) {
                            if (data != '1000') {
                                $('.login-success').html(ehtml + data).show();
								setTimeout(function () {
									$(".login-success").hide();
                                }, 1000);
								$("#orgBtn").removeClass("letter-noSpac").val("保存");
                            } else {
                                $('.login-success').html(ehtml + "保存成功").show();
                                setTimeout(function () {
									$("#orgBtn").addClass("letter-noSpac").val("保存成功");
                                    location.href = "<?php echo WEB_PATH; ?>/mobile/home/?id=<?php echo $uids; ?>";
                                }, 2000);
                            }
                        },
                        error: function () {
                            $('.login-success').html(ehtml + "数据提交失败,请重试!").show();
							setTimeout(function () {
									$(".login-success").hide();
                                }, 1000);
                        }
                    });
                }
            });
        });
    </script>


</div>
<div class="login-success" style="display: none">
        <p></p>
    </div>  

</body>
</html>
