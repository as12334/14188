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
    
	<link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/other.css" rel="stylesheet" type="text/css" />


	<script src="<?php echo G_TEMPLATES_JS; ?>/mobile/jquery190.js" language="javascript" type="text/javascript"></script>

</head>
<body>
<div class="h5-1yyg-v11">
    
<!-- 栏目页面顶部 -->


<!-- 内页顶部 -->

    <header class="g-header">
        <div class="head-l">
	        <a href="javascript:;" onclick="history.go(-1)" class="z-HReturn"><s></s><b>返回</b></a>
        </div>
        <h2><?php echo $title; ?></h2>
        <div class="head-r">
	        <a href="<?php echo WEB_PATH; ?>/mobile/mobile/?yid=<?php echo $uids; ?>" class="z-Home"></a>
        </div>
    </header>
<section>
     
	  <div class="main">
        <div class="app">
            
            <form id="wfform" name="wfform" onSubmit="return postcheck()" action="" method="post">
                <input type="hidden" name="id" value="49097"/>
                <input type="hidden" name="type_address" value="mobile/home/address/<?php echo $uids; ?>/">
                <input id="cdcode-input" type="hidden" name="cdcode" value="440306">
                  <ul class="address-show">
                    <li class="normal">
                        <span class="fl">
                            <!-- <em>*</em> -->
                            <em>&nbsp;</em>
                            商品链接：
                        </span>
                        <input type="text" autocomplete="off" placeholder="" x-webkit-speech="" id="tburl"
                               name="tburl" class="normal-input fl" value=""  clearinput="on" required>
                        
                        
                    </li>
                    <li class="normal">
                        <span class="fl">
                            <!-- <em>*</em> -->
                            <em>&nbsp;</em>
                            开店掌柜：
                        </span>
                        <input type="text" autocomplete="off" placeholder="" x-webkit-speech="" id="shopid"
                               name="shopid" class="normal-input fl" value="<?php echo $member_dealer['shopid']; ?>" maxlength="16" clearinput="on" required>
                        
                        
                    </li>
                    <li class="normal">
                        <span class="fl">
                            <!-- <em>*</em> -->
                            <em>&nbsp;</em>
                            联系电话：
                        </span>
                        <input type="text" autocomplete="off" placeholder="" x-webkit-speech="" id="mobile1"
                               name="mobile1" class="normal-input fl" value="<?php echo $member_dealer['mobile']; ?>" maxlength="11" clearinput="on" required>

                        
                    </li>
                     <li class="normal">
                        <span class="fl">
                            <!-- <em>*</em> -->
                            <em>&nbsp;</em>
                            联系邮箱：
                        </span>
                        <input type="text" autocomplete="off" placeholder="" x-webkit-speech="" id="emails"
                               name="emails" class="normal-input fl" value="<?php echo $member_dealer['email']; ?>" maxlength="20" clearinput="on" required>

                        
                    </li>
                    
                    <li class="normal">
                   
                     <em>&nbsp;</em>京东链接：http://item.jd.com/410027264.html<br />
                     <em>&nbsp;</em>淘宝链接：http://item.taobao.com/item.htm?id=410027264<br />
                     <em>&nbsp;</em>天猫链接：https://detail.tmall.com/item.htm?id=410027264   
                    </li>
                    
                </ul>
                 <a href="javascript:;" class="upAddress"  id="btn_auth">提 交</a>
                 <a href="<?php echo WEB_PATH; ?>/mobile/home/reg_shop/<?php echo $uids; ?>/" class="goAddress" >上一步</a>
                
            </form>
            

            


    

<?php include templates("mobile/index","footer");?>
        </div>
    </div>

    <div class="wap-tips" style="display: none">
        
    </div>
        <!-- 业务js -->

    

    

</section>


 <script type="text/javascript">
        $(function () {
            var base_url = '<?php echo WEB_PATH; ?>/member/home/check_Ajax';
             var ehtml = '';
			 
			 function checktburl() {
                var value = $("#tburl").val();
                var length = len(value);
				
				
                if (value == '' || value.length == 0) {
					
                    $(".wap-tips").html(ehtml + "请输入商品链接~").show();
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

			
			
            $("#btn_auth").click(function () {
                 if (checktburl()) {
                    shopid = $("#shopid").val();
                    tburl = $("#tburl").val();
					code = $("#code").val();
					 mobile1 = $("#mobile1").val();
					emails = $("#emails").val();
					$("#btn_auth").addClass("letter-noSpac").html("正在提交...");
                    $.ajax({
                        url: base_url,
                        async : true,
		                addidvalue: true,
                        data: {type: 'tburl', shopid: shopid, tburl: tburl, code: code, mobile: mobile1, emails: emails},
                        success: function (data) {
							
							
							
                            if (data != '1000') {
                                $('.wap-tips').html(ehtml + data).show();
								setTimeout(function () {
					$(".wap-tips").hide();
                                }, 2000);
								$("#btn_auth").removeClass("letter-noSpac").html("提交");
                            } else {
							
							location.href = "<?php echo WEB_PATH; ?>/mobile/home/check_shop1/<?php echo $uids; ?>/";
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
</body>
</html>
