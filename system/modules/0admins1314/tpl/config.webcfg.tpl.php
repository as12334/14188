<?php defined('G_IN_ADMIN')or exit('No permission resources.'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" href="<?php echo G_GLOBAL_STYLE; ?>/global/css/global.css" type="text/css">
<link rel="stylesheet" href="<?php echo G_GLOBAL_STYLE; ?>/global/css/style.css" type="text/css">
<script src="<?php echo G_GLOBAL_STYLE; ?>/global/js/jquery-1.8.3.min.js"></script>
<script src="<?php echo G_PLUGIN_PATH; ?>/uploadify/api-uploadify.js" type="text/javascript"></script> 
<style>
tr{height:40px;line-height:40px}
.gb{ background:#6F0}
</style>
</head>
<body>
<div class="header lr10">
	<?php echo $this->headerment();?>
</div>
<div class="bk10"></div>
<div class="table-list lr10">
<!--start-->
<form name="myform" action="" method="post">
  <table width="100%" cellspacing="0">
  	<tr>
		<td width="220" align="right">网站地址：</td>
		<td><input type="text" name="web_path" value="<?php echo $web['web_path']; ?>"  class="input-text wid200"></td>
	</tr>
    <tr>
		<td width="220" align="right">微信登录回调域名：</td>
		<td><input type="text" name="web_wx_url" value="<?php echo $web['web_wx_url']; ?>"  class="input-text wid200"></td>
	</tr>
    <tr>
		<td width="220" align="right">安卓APP下载地址：</td>
		<td><input type="text" name="apk_url" value="<?php echo $web['apk_url']; ?>"  class="input-text wid400">可以填市场网址，也可以填网站网址<?php echo "http://".$_SERVER['HTTP_HOST']."/app/1y.apk" ?></td>
	</tr>
    <tr>
		<td width="220" align="right">苹果APP下载地址：</td>
		<td><input type="text" name="ipa_url" value="<?php echo $web['ipa_url']; ?>"  class="input-text wid400">可以填市场网址，也可以填网站网址<?php echo "http://".$_SERVER['HTTP_HOST']."/app/1y.ipa" ?></td>
	</tr>
    
    <tr>
		<td width="220" align="right">网站logo：</td>
		<td>
           	<input type="text" id="imagetext" value="<?php echo $web['web_logo']; ?>" name="web_logo" class="input-text wid300">
			<input type="button" class="button"
             onClick="GetUploadify('<?php echo WEB_PATH; ?>','uploadify','LOGO上传','image','banner',1,500000,'imagetext')" 
             value="上传LOGO"/>
			图片大小：105*63
        </td>
	</tr>
  <tr>
		<td width="220" align="right">手机网站logo：</td>
		<td class="gb">
           	<input type="text" id="imagetext1" value="<?php echo $web['mob_logo']; ?>" name="mob_logo" class="input-text wid300">
			<input type="button" class="button"
             onClick="GetUploadify('<?php echo WEB_PATH; ?>','uploadify','LOGO上传','image','banner',1,500000,'imagetext1')" 
             value="上传LOGO"/>
			图片大小：80*120  <a href="<?php echo G_TEMPLATES_IMAGE; ?>/weixin/wx-icon.png" target="_blank">下载图片示例<img src="<?php echo G_TEMPLATES_IMAGE; ?>/weixin/wx-icon.png" width="50"></a>注意图片上面有一个X是用来关闭的
        </td>
	</tr>
    <tr>
		<td width="220" align="right">关注微信：</td>
		<td>
           	<input type="text" id="imagetext2" value="<?php echo $web['wx']; ?>" name="wx" class="input-text wid300">
			<input type="button" class="button"
             onClick="GetUploadify('<?php echo WEB_PATH; ?>','uploadify','LOGO上传','image','banner',1,500000,'imagetext2')" 
             value="上传LOGO"/>
			图片大小：430*430
        </td>
	</tr>
  	 <tr>
			<td width="220" align="right">网站名称：</td>
			<td><input type="text" value="<?php echo $web['web_name']; ?>" name="web_name" class="input-text wid200"></td>
	</tr>
	<tr>
			<td width="220" align="right">网站短名称：</td>
			<td><input type="text" value="<?php echo $web['web_name_two']; ?>" name="web_name_two" class="input-text wid200"></td>
	</tr>
     <tr>
			<td width="220" align="right">网站关键字：</td>
			<td><input type="text" value="<?php echo $web['web_key']; ?>" name="web_key" class="input-text wid300"></td>
	</tr>
     <tr>
			<td width="220" align="right">网站描述：</td>
			<td><textarea name="web_des" class="wid300" style="height:80px"><?php echo $web['web_des']; ?></textarea>
            </td>
	</tr>	

     <tr>
			<td width="220" align="right">版权信息：</td>
			<td><textarea name="web_copyright" class="wid300" style="height:80px"><?php echo $web['web_copyright']; ?></textarea>
            </td>
	</tr>	
    
    
</table>

<br><br><br>
<table width="100%"  cellspacing="0" cellpadding="0" id="ads">
    <tr>
        	<td width="220" align="right"></td>
            <?php if( $_COOKIE['auid'] == 1){?>		
                    <td><input type="submit" class="button" name="dosubmit"  value=" 提交 " ></td>
                    <?php }else{ ?>	
                    <td><input type="button" onClick="alert('您没有权限哦！');" class="button" name=""  value=" 提交 " ></td>	
					
                    <?php } ?>
   </tr>
	</table>
</form>

</div><!--table-list end-->

<script>
	
</script>
</body>
</html> 