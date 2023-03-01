<?php 
define('G_IN_SYSTEM', true);
define('G_HTTP',isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://');
define('G_HTTP_HOST', (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : ''));
define("G_WEB_PATH",dirname(G_HTTP.G_HTTP_HOST.$_SERVER['SCRIPT_NAME'])); 


$web = require"../system/config/system.inc.php";

$appurl = $web['apk_url']; //APP下载网址
$appurl2 = $web['ipa_url']; //APP下载网址
$appdown = "http://qr.topscan.com/api.php?bg=ffffff&fg=000000&el=l&w=200&m=10&text=".$appurl; //自动生成二维码
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>手机版_<?php echo $web['web_name']; ?></title>
    <meta name="description" content="<?php echo $web['web_des']; ?>" />
    <meta name="keywords" content="<?php echo $web['web_key']; ?>" />
    <link rel="stylesheet" type="text/css" href="css/Comm.css?date=20140731" />
<!--[if IE 6]>
    <script type="text/javascript" src="js/iepng.js"></script>
    <script type="text/javascript">
        EvPNG.fix('span.Hicon,a.F-icon-guest s,a.F-icon-gray s,s.u-banner-close,.F-number-l,.F-number-r,.M-nav-help a s,.g-good-faith li s,a.pre,a.next,.u-topic-icon i,.u-topic-icon s,.M-security a s,.roll_close a');
    </script>
<![endif]-->
    <link rel="stylesheet" type="text/css" href="css/layout.css?date=20141013" />
    <script language="javascript" type="text/javascript" src="js/JQuery132.js"></script>
    <script language="javascript" type="text/javascript" src="js/mobileFun.js"></script>
    <style type="text/css">
        html {
            overflow-y:hidden;
        }
	.codep{
		background: url(app.png) no-repeat;
		width: 134px;
		height: 134px;
		margin: 39px auto 0;
		border: 1px solid #eee
	}
    </style>
</head>

<body style="overflow-y: hidden">
    <div class="tContent">

        <div class="code-box">
            <div class="code-wrapper">
                <div id="divTip" class="part1_text">
                    <h4>客户端 V1.0</h4>
                    <h3>全新体验  发现更多精彩</h3>
                </div>
                <div class="codeCon">
                    <div class="code">
                    <img src="<?php echo $appdown?>" width="134"/>
                    </div>
                    <p>
                        <span>手机扫描二维码下载</span>
                        <?php echo G_HTTP_HOST?>
                    </p>
                    <div class="download_btn">
                        <p><a href="<?php echo $appurl?>" title="立即下载"></a></p>
                       
                        <p><span><a href="<?php echo $appurl2?>" title="立即下载" ></a></span></p>
                    </div>

                </div>

<!--		<div class="codeCon">
                    <div class="codep"></div>
                    <p>
                        <span>苹果手机扫描二维码下载</span>
                        触屏版请用手机访问m..cc
                    </p>
                   

                    <div class="download_btn">
                        <a href="app.ipa" title="立即下载"></a>
                    </div>
                </div> -->
            </div>
        </div>

        <div class="app_content">
            <div id="divBox" class="part-box">

                <div id="part1" class="part bgcolor1">
                    <div id="divHead" class="tHeader">
                        <div class="tHead">
                            <ul>
                                <li class="tLogo">
                                    <!--<a href="/" class="tHome">
                                        <img alt="" src="images/logo.png" />
                                    </a>
                                    <img alt="" src="images/line.gif" class="line" /> -->
                                    <a href="/index.php/mobile/mobile" title="手机版" class="txt">手机版</a></li>
                                <li class="tNav">
                                    <a href="/" title="<?php echo $web['web_name_two']; ?>首页" class="tReturn"><?php echo $web['web_name_two']; ?>首页</a>
                                    <a href="/index.php/mobile/mobile" title="手机版" class="current">手机版</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="phone-wrapper">
                        <div class="stars1" style="display: none;"></div>
                        <div class="stars2" style="display: none;"></div>
                        <div class="stars3" style="display: none;"></div>
                        <div class="stars4" style="display: none;"></div>
                        <div class="stars5" style="display: none;"></div>
                        <div class="stars6" style="display: none;"></div>
                        <div class="stars7" style="display: none;"></div>
                        <div class="part1_phone"></div>
                        <div class="part1_search" style="display: none;"></div>
                        <div class="part1_card" style="display: none;"></div>
                        <div class="part1_wx" style="display: none;"></div>
                        <div class="part1_circle1" style="display: none;"></div>
                        <div class="part1_circle2" style="display: none;"></div>
                        <div class="part1_pic1" style="display: none;"></div>
                        <div class="part1_pic2" style="display: none;"></div>
                    </div>
                </div>

                <div id="part2" class="part bgcolor2" >
                    <div class="phone-wrapper">
                        <div class="part2_land"></div>
                        <div class="part2_packs" style="display: none;"></div>
                        <div class="part2_phone" style="display: none;"></div>
                        <div class="part2_shape" style="display: none;"></div>
                        <div class="part2_people" style="display: none;"></div>
                    </div>
                </div>

                <div id="part3" class="part bgcolor3">
                    <div class="phone-wrapper">
                        <div class="part3_phone"></div>
                        <div class="part3_balloons" style="display: none;"></div>
                        <div class="part3_people" style="display: none;"></div>
                        <div class="part3_search" style="display: none;"></div>
                    </div>
                </div>

                <div id="part4" class="part bgcolor4">
                    <div class="phone-wrapper">
                        <div class="part4_phone"></div>
                        <div class="part4_clouds" style="display: none;"></div>
                        <div class="part4_card" style="display: none;"></div>
                    </div>
                </div>

                <div id="part5" class="part bgcolor5">
                    <div class="phone-wrapper">
                        <div class="part5_clouds" style="display: none;"></div>
                        <div class="sun" style="display: none;"></div>
                        <div class="part5_land"></div>
                        <div class="part5_phone" style="display: none;"></div>
                        <div class="part5_people" style="display: none;"></div>
                    </div>
                </div>

            </div>

        </div>

        <div id="divPage" class="round_current">
            <ul>
                <li class="active"><a href="javascript:;"></a></li>
                <li><a href="javascript:;"></a></li>
                <li><a href="javascript:;"></a></li>
                <li><a href="javascript:;"></a></li>
                <li><a href="javascript:;"></a></li>
            </ul>
        </div>

        <div id="divReturnTop" class="return_top">
            <a href="javascript:;"></a>
        </div>

    </div>
    
</body>
</html>