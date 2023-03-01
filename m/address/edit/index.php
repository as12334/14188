<?php 
session_start();
require"../../../conn.php";
if (!isset($_SESSION['user'])||$_SESSION['user']==''){
		msg('','location="/m/login/"');
	}
	$sqlip='select * from `'.$tablepre.'member_co` where pass="yes"   and email="'.$_SESSION['user'].'" or user="'.$_SESSION['user'].'" order by id desc';		 
$rrip=$db->query($sqlip);
$row=$db->getrow($rrip);
$sqladdr='select * from `'.$tablepre.'address` where `email`="'.$row['email'].'"';
$resultaddr=$db->query($sqladdr);
$rowaddr=$db->getrow($resultaddr);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
        <meta name="full-screen" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="format-detection" content="telephone=no">
        <meta name="format-detection" content="address=no">
        <link href="//<?php echo $yumin; ?>" rel="dns-prefetch">
        <title>编辑地址</title>
        <meta content="" name="keywords">
        <meta content="" name="description">
        <meta content="" name="robots">
        <!-- head css -->
        
       <link href="<?php echo $url; ?>/m/css/other.css?ts=<?php echo date("YmdHis"); ?>" rel="stylesheet" type="text/css" />
       <script src="<?php echo $url; ?>/m/js/js.min.js?ts=<?php echo date("YmdHis"); ?>"></script>
        <!-- head js  库文件js-->
        
        <script type="text/javascript">
            var versionNumber="ts=3b5d42560ca10c23_1445665610";
        </script>
        <!-- H5 -->
    </head>
    <body>
        <!-- 主体 -->
        
     <!-- 废弃了 -->
 <style>
 	#top_weixin{
 		width: 100%; z-index: 9999; position:fixed;top:0;display: none; background:#e4e4e4;
 	}
 	#open_d{
		height: 36px;  z-index: 99999; width: 100%; margin: 0 auto; position: relative; max-width: 476px; min-width: 320px; line-height: 36px; font-size: 14px; font-family: '微软雅黑';background: #e4e4e4;border: 1px solid rgba(255,56,56,1);margin: 1px auto;color:rgba(255,56,56,1);
 	}
 	#xq_a{
 		z-index: 99999;  margin: 0 auto; position: relative;max-width: 480px; min-width: 320px;display:none;
 	}
 </style>

    <div class="main">
        <div class="app">
            <header id="head" class="head">
                <div class="fixtop">
                    <span class="classify" id="t-find">
                        <a class="btn btn-left btn-back" id="historyBack"></a>
                    </span>
                    <span id="t-index">编辑地址</span>
                    <span id="t-user">
                        <a href="javascript:;" class="normal js-submit" disabled="true" id="btn_address">保存</a>
                    </span>
                </div>
            </header>
            <form id="global-form" action="" method="get">
                <input type="hidden" name="id" value="49097"/>
                <input type="hidden" name="type_address" value="">
                <input id="cdcode-input" type="hidden" name="cdcode" value="440306">
                  <ul class="address-show">
                    <li class="normal">
                        <span class="fl">
                            <!-- <em>*</em> -->
                            <em>&nbsp;</em>
                            收货人：
                        </span>
                        <input type="text" autocomplete="off" placeholder="" x-webkit-speech="" id="username"
                               name="username" class="normal-input fl" value="<?php echo $rowaddr['name']?>" maxlength="16" clearinput="on" required>
                        
                        
                    </li>
                    <li class="normal">
                        <span class="fl">
                            <!-- <em>*</em> -->
                            <em>&nbsp;</em>
                            手机号：
                        </span>
                        <input type="text" autocomplete="off" placeholder="" x-webkit-speech="" id="mobile"
                               name="mobile" class="normal-input fl" value="<?php echo $rowaddr['mobile']?>" maxlength="11" clearinput="on" required>

                        
                    </li>
                    <li class="normal">
                        <span class="auto-location"><i><img src="<?php echo $url; ?>/m/images/icon/location-ico.png"></i></span>
                        <span class="fl">
                            <!-- <em>*</em> -->
                            <em>&nbsp;</em>
                            省份：
                        </span>
                        <span class="tbl-cell">
                            <span class="new-input-span">
                                <span class="new-sel-box new-p-re">
                                    <input type="hidden" name="province" id="province" value="<?php echo $rowaddr['province']?>"/>
                                    <label id="province_label" data-province="<?php echo $rowaddr['province']?>"><?php echo $rowaddr['province']?></label>
                                    <select style="width:200px;" class="new-select" id="province-select"
                                            data-province="<?php echo $rowaddr['province']?>">
                                    </select>
                                </span>
                            </span>
                        </span>

                        
                    </li>
                    <li class="normal">
                        <span class="fl">
                            <!-- <em>*</em> -->
                            <em>&nbsp;</em>
                            城市：
                        </span>
                        <span class="tbl-cell">
                            <span class="new-input-span">
                                <span class="new-sel-box new-p-re">
                                    <input type="hidden" name="city" id="city" value="<?php echo $rowaddr['city']?>"/>
                                    <label id="city_label" data-city="<?php echo $rowaddr['city']?>"><?php echo $rowaddr['city']?></label>
                                    <select style="width:200px;" class="new-select" id="city-select"
                                            data-city="<?php echo $rowaddr['city']?>">
                                    </select>
                                </span>
                            </span>
                        </span>

                        
                    </li>
                    <li class="normal">
                        <span class="fl">
                            <em>&nbsp;</em>
                            区县：
                        </span>
                        <span class="tbl-cell">
                            <span class="new-input-span">
                                <span class="new-sel-box new-p-re">
                                    <input type="hidden" name="town" id="town" value="<?php echo $rowaddr['town']?>"/>
                                    <label id="town_label" data-town="<?php echo $rowaddr['town']?>"><?php echo $rowaddr['town']?></label>
                                    <select style="width:200px;" id="town-select" class="new-select"
                                            data-town="<?php echo $rowaddr['town']?>">
                                    </select>
                                </span>
                            </span>
                        </span>
                        
                    </li>
                    <li class="normal">
                        <span class="fl"  style="width:28%;">
                            <!-- <em>*</em> -->
                            <em>&nbsp;</em>
                            详细地址：
                        </span>
                        <textarea rows="3" cols="20" class="normal-area" name="addr" id="addr" maxlength="40"><?php echo $rowaddr['addr']?></textarea>

                        
                    </li>
                    
                </ul>
            </form>
            <!--<button id="delAddress" class="delAddress" data-addr_id="49097">删除地址</button> -->
            <?php require_once('../../bottom.php');?>



        </div>
    </div>
    <div class="alert_fullbg" style="display: none; z-index: 201;"></div>
    <div class="normal-alert" style="display:none;" id="bind-other-alert">
        <div class="box">
            正在获取地址，请稍等...
        </div>
    </div>
    
    <div class=" wap-tips" style="display: none">
        
    </div>
    
        <!-- 业务js -->
        
    <script src="<?php echo $url; ?>/m/js/address/sea.js?ts=<?php echo date("YmdHis"); ?>"></script>
    <script src="<?php echo $url; ?>/m/js/address/sea-config.js?ts=<?php echo date("YmdHis"); ?>"></script>
    <script charset="utf-8" src="http://map.qq.com/api/js?v=2.exp&libraries=convertor"></script>
    <script type="text/javascript">
       use('editAddress');
    </script>
    <script type="text/javascript">
        $(function () {
            var base_url = '<?php echo $url; ?>/m/address/update';
            var ehtml = '';

            function checkUserName() {
                var value = $("#username").val();
                var length = len(value);
                if (value == '' || value.length == 0) {
					$(".wap-pide").show();
                    $(".wap-tips").html("收货人不能为空哦~").show();
					setTimeout(function () {
						            $(".wap-pide").hide();
                                    $(".wap-tips").hide();
                                }, 1200);
                    return false;
                }
                
                return true;
            }
            function checkMobile() {
                var value = $("#mobile").val();
				var pregMobile = /^1[3,4,5,8]\d{9}$/;  //读取php配置的正则
                if (value == '' || value.length == 0) {
                    $(".wap-tips").html(ehtml + "手机不能为空哦~").show();
					setTimeout(function () {
                                    $(".wap-tips").hide();
                                }, 1200);
                    return false;
                } else if (!pregMobile.test(value)) {
                    $(".wap-tips").html(ehtml + "手机格式不对~").show();
					setTimeout(function () {
                                    $(".wap-tips").hide();
                                }, 1200);
                    return false;
                } else {
                    $(".wap-tips").hide();
                }
                return true;
            }
            function checkProvince() {
                var value = $("#province").val();
                var length = len(value);
                if (value == '' || value.length == 0) {
                    $(".wap-tips").html("省份不能为空哦~").show();
					setTimeout(function () {
                                    $(".wap-tips").hide();
                                }, 1200);
                    return false;
                }
                
                return true;
            }
			function checkCity() {
                var value = $("#city").val();
                var length = len(value);
                if (value == '' || value.length == 0) {
                    $(".wap-tips").html("城市不能为空哦~").show();
					setTimeout(function () {
                                    $(".wap-tips").hide();
                                }, 1200);
                    return false;
                }
                
                return true;
            }
			function checkAown() {
                var value = $("#town").val();
                var length = len(value);
                if (value == '' || value.length == 0) {
                    $(".wap-tips").html("区县不能为空哦~").show();
					setTimeout(function () {
                                    $(".wap-tips").hide();
                                }, 1200);
                    return false;
                }
                
                return true;
            }
			function checkAddr() {
                var value = $("#addr").val();
                var length = len(value);
                if (value == '' || value.length == 0) {
                    $(".wap-tips").html("详细地址不能为空哦~").show();
					setTimeout(function () {
                                    $(".wap-tips").hide();
                                }, 1200);
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
				
          //      checkUserName();
            });

            $("#mobile").on('blur', function () {
          //      checkMobile();
            });

            $("#btn_address").click(function () {
                if (checkUserName() && checkMobile() && checkProvince() && checkCity() && checkAown() && checkAddr()) {
                    username = $("#username").val();
                    mobile = $("#mobile").val();
					province = $("#province").val();
					city = $("#city").val();
                    town = $("#town").val();
					addr = $("#addr").val();
                    
                    $.ajax({
                        url: base_url,
                        async : true,
		                addidvalue: true,
                        data: {type_address: 'edit', username: username, mobile: mobile, province: province,city: city, town: town, addr: addr},
                        success: function (data) {
                            $(".wap-tips").html(ehtml + "编辑地址成功~").show();
                                setTimeout(function () {
                                    location.href = "javascript:window.history.go(-1);";
                                }, 2000);
                        },
                        error: function () {
                            $('.wap-tips').html(ehtml + "数据提交失败,请重试!").show();
                        }
                    });
                }
            });
        });
    </script>
      


    </body>
</html>