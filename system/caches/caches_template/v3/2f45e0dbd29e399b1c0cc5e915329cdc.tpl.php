<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>
<link href="<?php echo G_TEMPLATES_STYLE; ?>/newcss/member_x.css?v=150728" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="<?php echo G_TEMPLATES_STYLE; ?>/js/js.min.js"></script>



<div class="p-center-main clrfix">
            <!--左边导航-->
            
  	<?php include templates("member","left");?>
            <div class="sidebar_main clrfix fr">
            
            <?php include templates("member","shezhi");?>
              

               <!-- <div class="g-purchase-title bor-bot">
                    <span class="gray3">个人资料</span>
                </div> -->
                <div class="z-content">
                    <div class="con">
                        <div class="pic-side">
                            <div class="pic-wrap">
                                <a href="<?php echo WEB_PATH; ?>/member/home/userphoto" class="h-pic"><img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo get_user_img(); ?>" width="120" height="120" /></a><a href="<?php echo WEB_PATH; ?>/member/home/userphoto" class="h-txt">修改头像</a>
                            </div>
                            <div class="pic-wrap">
                             <?php if($member['mobile']!=null && $member['mobilecode']=='1'): ?>

                                    
                                    <a href="javascript:;"><span class="p-icon"><i class="tel"></i></span><p class="gray9">已绑定</p><p class="gray6"><?php echo $member['mobile']; ?></p></a>
                                    <?php  else: ?>
                                    <a href="<?php echo WEB_PATH; ?>/member/home/mobilechecking"><span class="p-icon"><i class="tel"></i></span><p class="gray9">未绑定</p><p class="gray6"></p></a>
                                    
                                    <?php endif; ?>
                                
                            </div>
                            <div class="pic-wrap">
                            <?php if($member['email']!=null && $member['emailcode']=='1'): ?>	
                            <a href="javascript:;"><span class="p-icon"><i class="mail"></i></span><p class="gray9">已绑定</p><p class="gray6"><?php echo $member['email']; ?></p></a>
                                   
                                    <?php  else: ?>
                                    <a href="<?php echo WEB_PATH; ?>/member/home/mailchecking"><span class="p-icon"><i class="mail"></i></span><p class="gray9">未绑定</p></a>
                                   
                                    <?php endif; ?>
                                
                            </div>
                        </div>
                        <div class="info-side">
                            <div class="info-sign"><i></i>温馨提示：完善以下资料即可获得<?php echo $funfenset; ?>微积分，<?php echo _cfg('web_name_two'); ?>不会以任何形式公开您的个人隐私！   QQ登录密码为123456</div>
                            <ul class="info-list">
                                <li>
                                    <span class="label">昵　　称：</span>
                                    <input name="txtName" type="text" id="username" class="inp-long" value="<?php echo $member['username']; ?>" />
                                    <em class="orange">*</em>
                                    <span class="orange orangename"></span>
                                </li>
                                
                                <li>
                                    <span class="label">QQ&nbsp;号码：</span>
                                    <input name="txtQQ" type="text" id="txtQQ" class="inp-long" value="<?php echo $member['qq']; ?>" onkeyup="value=value.replace(/\D/g,'')" />
                                    <em class="orange">*</em>
                                    <span class="orange orangetxtQQ"></span>
                                    
                                </li>
                                
                               
                                <li>
                                    <span class="label">签　　名：</span>
                                    <textarea name="qianming" id="qianming" rows="5" cols="10" class="u-sign"><?php if($member['qianming']==null): ?>让别人看到不一样的你<?php  else: ?><?php echo $member['qianming']; ?><?php endif; ?></textarea>
                                    
                                </li>
                                <li>
                                    <a id="btnSave" href="javascript:;" class="save-btn">保存</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
<div class='copy-tips' style="display:none;"><div class='wap-tips' ></div></div>
    <style type="text/css">
.copy-tips{position:fixed;z-index:999;bottom:50%;left:50%;margin:0 0 -50px -170px;background-color:rgba(0, 0, 0, 0.2);filter:progid:DXImageTransform.Microsoft.Gradient(startColorstr=#30000000, endColorstr=#30000000);padding:3px;}
.wap-tips{padding:30px 80px;text-align:center;border:1px solid #F4D9A6;background-color:#FFFDEE;font-size:14px;vertical-align:middle; }

</style>
<script type="text/javascript">
        $(function () {
            var base_url = '<?php echo WEB_PATH; ?>/member/home/usermodify';
            var ehtml = '';
			
			$("#txtQQ").focus(function(){
		
	     	var va1=$("#txtQQ").val();
		    if(va1=='您的QQ号码'){
			$("#txtQQ").val("");
		         }
	        });
			$("#txtQQ").blur(function(){
		
	     	var va1=$("#txtQQ").val();
		    if(va1==''){
			$("#txtQQ").val("您的QQ号码");
		         }
	        });
			
			$("#qianming").focus(function(){
		
	     	var va1=$("#qianming").val();
		    if(va1=='让别人看到不一样的你'){
			$("#qianming").val("");
		         }
	        });
			$("#qianming").blur(function(){
		
	     	var va1=$("#qianming").val();
		    if(va1==''){
			$("#qianming").val("让别人看到不一样的你");
		         }
	        });
            function checkUserName() {
                var value = $("#username").val();
                var length = len(value);
				var regn = /^[A-Za-z0-9_\u4e00-\u9fa5]{2,20}$/;
				var regE =  /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				
                if (value == '' || value.length == 0) {
					
                    $(".orangename").html(ehtml + "请填写昵称~").show();
					 setTimeout(function () {
									$(".orangename").hide();
                                }, 1000);
                    return false;
                }
                else if (regn.test(value)) {
                    $(".orangename").hide();
                } else {
					$(".orangename").html(ehtml + "2-20个字符，汉字、字母、数字、“_-”组成").show();
					setTimeout(function () {
									$(".orangename").hide();
                                }, 1000);
                    return false;
                    
                }
                return true;
				
            }
 
			function checktxtQQ() {
                var value = $("#txtQQ").val();
                var length = len(value);
				var regn = /^[A-Za-z0-9_\u4e00-\u9fa5]{2,20}$/;
				var regE =  /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				
                if (value == '' || value.length == 0) {
					
                    $(".orangetxtQQ").html(ehtml + "请填写QQ~").show();
					 setTimeout(function () {
									$(".orangetxtQQ").hide();
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
			

          
			
			
			
            $("#btnSave").click(function () {
                if (checkUserName() && checktxtQQ()) {
                    username = $("#username").val();
                    txtQQ = $("#txtQQ").val();
					qianming = $("#qianming").val();
					$("#btnSave").addClass("letter-noSpac").html("正在保存...");
                    $.ajax({
                        url: base_url,
                        async : true,
		                addidvalue: true,
                        data: {action: 'usermodify', username: username, txtQQ: txtQQ, qianming: qianming},
                        success: function (data) {
                            if (data != '1000') {
								$(".copy-tips").show();
                                $('.wap-tips').html(ehtml + data).show();
								 setTimeout(function () {
									$(".copy-tips").hide();
                                }, 1000);
								$("#btnSave").removeClass("letter-noSpac").html("保存");
                            } else {
                                $(".login-success").show();
                                setTimeout(function () {
									$("#btnSave").addClass("letter-noSpac").html("保存成功");
                                    location.href = "<?php echo WEB_PATH; ?>/member/home/modify";
                                }, 2000);
                            }
                        },
                        error: function () {
                            $('.wap-tips').html(ehtml + "数据提交失败,请重试!").show();
							setTimeout(function () {
									$(".wap-tips").hide();
                                }, 1000);
                        }
                    });
                }
            });
        });
    </script>
<?php include templates("index","footer");?>