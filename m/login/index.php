<?php 
session_start();
require"../../conn.php";?>
 <?php if(isset($_SERVER['HTTP_REFERER'])==1){$reurl = $_SERVER['HTTP_REFERER'];}else{$reurl = $url;}?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no">
        <meta name="viewport" content="initial-scale=1.0,user-scalable=no,maximum-scale=1" media="(device-height: 568px)">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
        <meta name="full-screen" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="format-detection" content="telephone=no">
        <meta name="format-detection" content="address=no">
        <link href="//<?php echo $yumin; ?>" rel="dns-prefetch">
        
        <link href="<?php echo $url; ?>/m/css/style.css?ts=<?php echo date("YmdHis"); ?>" rel="stylesheet" type="text/css" />
        
        <title><?php echo $rowSeo['name'] ?>网-登录</title>
        <meta content="<?php echo $rowSeo['keys'] ?>" name="keywords">
        <meta content="<?php echo $rowSeo['description'] ?>" name="description">
<script src="<?php echo $url; ?>/m/js/js.min.js?ts=<?php echo date("YmdHis"); ?>"></script>
<script src="<?php echo $url; ?>/m/js/underscore.js?ts=<?php echo date("YmdHis"); ?>"></script>
</head>
<body>
    
    <!-- 主体 -->


    <div class="main">
        <div class="app">
                        <div id="head">
                <div class="fixtop">
                    <span id="t-find"><a href="<?php echo $url; ?>/m/user" class="btn btn-left btn-back02"></a></span>
                    <span id="t-index">登录</span>
                    <span id="t-user"><a href="<?php echo $url; ?>/m/register" class="free-reg" rel="nofollow">注册</a></span>
                </div>
            </div>
            
            <div class="wap-login">
                <form action="<?php echo $url; ?>/m/login" method="post">
                    <div class="login-info mt3">
                        <div class="third-txt">
                            <h5><?php echo $rowSeo['name'] ?>账号登录</h5>
                        </div>
                        <ul class="info-input clear">
                            <li>
                                <div class="clear">
                                    <i><img src="<?php echo $url; ?>/m/images/login/person.png" /></i>
                                    <input type="text" name="username" id="username" placeholder="邮箱/用户名" class="txt" />
                                </div>       				
                            </li>
                            <li><p class="line-on"></p></li>
                            <li>
                                <div class="clear">
                                    <i><img src="<?php echo $url; ?>/m/images/login/pass.png" /></i>
                                    <input type="password" name="password" id="password" placeholder="密码" class="txt"/>
                                </div>       				
                            </li>
                        </ul>
                        <div style="min-height:22px;margin-top: 3%">
                        <p style="display: none;" class="wap-tips"></p>
                        </div>
                        <a id="btn_login" class="sub"  rel="nofollow">登  录</a>
                        <a href="#" class="free-reg" ></a>

                      
                    <input type="hidden" name="reurl" value="<?php echo $reurl;?>">
                    </div> 
                </form> 	
            </div>
        </div>
    </div>
    <div class="login-success" style="display: none">
        <p>登录成功~</p>
    </div>

<!-- /主体 -->

    <script type="text/javascript">
        $(function () {
            var base_url = '<?php echo $url; ?>/m/ajax';
            var ehtml = '<i><img src="<?php echo $url; ?>/m/images/login/tips-ico.png" /></i>';

            function checkUserName() {
                var value = $("#username").val();
                var length = len(value);
                if (value == '' || value.length == 0) {
                    $(".wap-tips").html(ehtml + "你还没有输入用户名哦~").show();
                    return false;
                }
                else if (length < 4 || length > 25) {
                    $(".wap-tips").html(ehtml + "用户名长度应为4~25个字符,一个中文算2个字符").show();
                    return false;
                } else {
                    $(".wap-tips").hide();
                }
                return true;
            }
            function checkPassword() {
                var value = $("#password").val();
                if (value == '' || value.length == 0) {
                    $(".wap-tips").html(ehtml + "你还没有输入密码哦~").show();
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


            $("#username").on('blur', function () {
                checkUserName();
            });

            $("#password").on('blur', function () {
                checkPassword();
            });

            $("#btn_login").click(function () {
                if (checkUserName() && checkPassword()) {
                    username = $("#username").val();
                    password = $("#password").val();
                    $.ajax({
                        url: base_url,
                        async : true,
		                addidvalue: true,
                        data: {action: 'login_user', username: username, password: password},
                        success: function (data) {
                            if (data != '1000') {
                                $('.wap-tips').html(ehtml + data).show();
                            } else {
                                $(".login-success").show();
                                setTimeout(function () {
                                    location.href = "<?php echo $reurl;?>";
                                }, 2000);
                            }
                        },
                        error: function () {
                            $('.wap-tips').html(ehtml + "数据提交失败,请重试!").show();
                        }
                    });
                }
            });
        });
    </script>

<script type="text/javascript">
            $(function(){
            function hideMenu() {
                setTimeout("window.scrollTo(0, 0)", 1);
            }

            $('.alert_black_bg .close').on('click', function(){
                $('.alert_black_bg').hide();
                $('#foot').height(120);
            });
            });
            $(".go-app .closed").on("click",function(){
                $(".go-app").hide();
                return false;
            })

</script>


</body>
</html>