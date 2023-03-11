<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>
<link href="<?php echo G_TEMPLATES_STYLE; ?>/newcss/member_x.css?v=150728" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo G_TEMPLATES_STYLE; ?>/js/js.min.js"></script>
<div class="p-center-main clrfix">
            <!--左边导航-->
            
<?php include templates("member","left");?>
            <div class="sidebar_main clrfix fr">
            <?php include templates("member","shezhi");?>
                <div class="g-purchase-title bor-bot">
					<span class="gray3">新邮箱验证</span><a href="<?php echo WEB_PATH; ?>/member/home/Security" class="return-btn">返回</a>
                </div>
                <div class="z-content">
                     <!--输入新手机号-->
                    <div class="person-wrap" id="divSend">
                        <ul class="person-list">
                            <li>
                                <span class="l-side">输入新邮箱号：</span>
                                <span class="r-side">
                                    <div class="inp-wrap ">
                                        <input id="txtEmail" maxlength="50" type="text" class="code-inner inp-long" value="请输入新邮箱号" />
                                    </div>
                                </span>
                                <div id="div_tips1"></div>
                            </li>
                            <li>
                                <span class="l-side"></span>
                                <span class="r-side">
                                    <a id="butSubmit" href="javascript:;" class="set-save-btn">发送</a>
                                </span>
                               
                            </li>
                        </ul>
                    </div>
                    <!--发送状态-->
                    <div class="person-wrap" id="divChecking" style="display:none;">
                        <ul class="person-list">
                            <li>
                                <span class="l-side"></span>
                                <span class="r-side">验证邮件已发送至邮箱：<b class="blue" id="b_account"></b>
                                    <a href="<?php echo WEB_PATH; ?>/member/home/mailchecking" class="change">更换</a>
                                </span>
                            </li>
                            <!--<li>
                                <span class="l-side">验证码：</span>
                                <span class="r-side">
                                    <div class="inp-wrap ">
                                        <input id="txtEmailSN" maxlength="12" type="text" class="code-inner" value="请输入6位验证码" />
                                        <a id="btnSendSN" href="javascript:;" class="get-code-btn">(120)重新发送</a>
                                    </div>
                                </span>
                                <div id="div_tips2"></div>
                            </li>
                            <li>
                                <span class="l-side"></span>
                                <span class="r-side">
                                    <a id="butSaveSubmit" href="javascript:;" class="set-save-btn">发送</a>
                                </span>
                            </li> -->
                        </ul>
                    </div>

                </div>

                
            </div>

        </div>
<script type="text/javascript">
        $(function () {
            var base_url = '<?php echo WEB_PATH; ?>/member/home/sendsuccess';
            var ehtml = '';
			
			$("#txtEmail").focus(function(){
		
	     	var va1=$("#txtEmail").val();
		    if(va1=='请输入新邮箱号'){
			$("#txtEmail").val("");
		         }
	        });
			$("#txtEmail").blur(function(){
		
	     	var va1=$("#txtEmail").val();
		    if(va1==''){
			$("#txtEmail").val("请输入新邮箱号");
		         }
	        });

            function checktxtEmail() {
                var value = $("#txtEmail").val();
				var regE =  /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				
                if (value == '请输入新邮箱号' || value.length == 0) {
					var ehtml = '<div class="form-orange-tips">请输入新邮箱号</div>';
                    $("#div_tips1").html(ehtml).show();
					setTimeout(function () {
					$("#div_tips1").hide();
                                }, 2000);
                    return false;
                } else if (!regE.test(value)) {
					var ehtml = '<div class="form-orange-tips">邮箱格式不对</div>';
                    $("#div_tips1").html(ehtml).show();
					setTimeout(function () {
					$("#div_tips1").hide();
                                }, 2000);
                    return false;
                } else {
                    $("#div_tips1").hide();
					return true;
                }
                
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


          

            $("#butSubmit").click(function () {
                if (checktxtEmail() ) {
                    txtEmail = $("#txtEmail").val();
                    
                   
					$("#butSubmit").addClass("letter-noSpac").html("正在发送...");
                    $.ajax({
                        url: base_url,
                        async : true,
		                addidvalue: true,
                        data: {action: 'email', email: txtEmail},
                        success: function (data) {
							
                            if (data == '1000') {
								
								
								var ehtml = '<div class="form-orange-tips">'+ data +'</div>';
                                $('#div_tips1').html(ehtml).show();
								setTimeout(function () {
									$("#div_tips1").hide();
                                }, 2000);
								$("#butSubmit").removeClass("letter-noSpac").html("发送");
                            } else {
								$("#butSubmit").addClass("letter-noSpac").html("发送成功");
                                $('#divChecking').show();
								$("#divSend").hide();
								$('#b_account').html(txtEmail).show();
								
                                setTimeout(function () {
									
                                 //   location.href = "<?php echo WEB_PATH; ?>/member/home/address/";
                                }, 2000);
                            }
                        },
                        error: function () {
                            $("#div_tips1").html(ehtml + "数据提交失败,请重试!").show();
                        }
                    });
                }
            });
        });
    </script>
<?php include templates("index","footer");?>