<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?>


<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>设置密码成功_<?php echo _cfg("web_name"); ?></title>
    <meta name="Description" content="" />
    <link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/newcss/sslComm.css?date=11" />

    <link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/newcss/layout.css?date=11" />
    <script type="text/javascript" src="<?php echo G_TEMPLATES_STYLE; ?>/js/js.min.js"></script>
</head>
<body>
    <div class="wrapper">
          <input name="hidAccount" type="hidden" id="hidAccount" value="13420842451" />
        <div class="g-logo-top">
            <a rel="nofollow" href="<?php echo G_WEB_PATH; ?>"><img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo Getlogo(); ?>"></a>
            <span class="fr"><a href="<?php echo G_WEB_PATH; ?>" class="gray9">返回首页</a></span>
        </div>

        <div class="g-contentCon clrfix">
            <div class="sign-success clrfix">

                <i class="passport-icon"></i>

                <span>恭喜您，密码设置成功！</span>

              <span class="grayBtn">3</span>  <a id="a_go" href="<?php echo WEB_PATH; ?>/login" class="orange"><em>立即登录</em></a>

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
    <script type="text/javascript">
$(function(){
	var A=3;
	var B=function()
	{
		
		
		if(A==1){
			
		
		location.replace("<?php echo WEB_PATH; ?>/login")
	}else{
		
		$(".grayBtn").html(""+A+"");A--
		}
	};setInterval(B,1000)
	
})
</script>
</body>
</html>
