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
table th{ border-bottom:1px solid #eee; font-size:12px; font-weight:100; text-align:right; width:200px;}
table td{ padding-left:10px;}
input.button{ display:inline-block}
</style>
</head>
<body>
<div class="header lr10">
	<?php echo $this->headerment();?>
</div>
<div class="bk10"></div>
<div class="table_form lr10">
<!--start-->
<form name="myform" action="" method="post" enctype="multipart/form-data">
  <table width="100%" cellspacing="0">
  	 
		<tr>
			<td width="120" align="right">登录名：</td>
			<td><input type="text" name="username" value="<?php echo $member['username'];?>" class="input-text" disabled="disabled"><span style="color:red">*</span>会员注册时的邮箱或手机</td>
		</tr>
		<tr>
			<td width="120" align="right">邮箱：</td>
			<td><input type="text" name="email" value="<?php echo $member['email'];?>" class="input-text"><span style="color:red">*</span></td>
		</tr>
		<tr>
			<td width="120" align="right">手机：</td>
			<td><input type="text" name="mobile" value="<?php echo $member['mobile'];?>" class="input-text"><span style="color:red">*</span></td>
		</tr>
		<tr>
			<td width="120" align="right">店铺名：</td>
			<td><input type="text" name="shopname" value="<?php echo $member['shopname'];?>" class="input-text" disabled="disabled"><span style="color:red">*</span>可以自定义十个字内</td>
		</tr>
		<tr>
			<td width="120" align="right">掌柜：</td>
			<td><input type="text" name="shopid" value="<?php echo $member['shopid'];?>" class="input-text" disabled="disabled"><span style="color:red">*</span>淘宝店的id</td>
		</tr>
        <tr>
			<td width="120" align="right">店铺url：</td>
			<td><input type="text" name="shopurl" value="<?php echo $member['shopurl'];?>" class="input-text"><span style="color:red">*</span>淘宝店的店铺链接</td>
		</tr>
		<tr>
			<td width="120" align="right">保证金</td>
			<td><input type="text" name="shopbzj" value="<?php echo $member['shopbzj'];?>" class="input-text"><span style="color:red">*</span>元</td>
		</tr>
		<tr>
			<td width="120" align="right">描述</td>
			<td><input type="text" name="shopmiaoshu" value="<?php echo $member['shopmiaoshu'];?>" class="input-text"><span style="color:red">*</span></td>
		</tr>	
		<tr>
			<td width="120" align="right">服务</td>
			<td><input type="text" name="shopfuwu" value="<?php echo $member['shopfuwu'];?>" class="input-text"><span style="color:red">*</span></td>
		</tr>
		<tr>
			<td width="120" align="right">物流：</td>
			<td><input type="text" name="shopwuliu" value="<?php echo $member['shopwuliu'];?>" class="input-text"><span style="color:red">*</span></td>
		</tr>
		<tr>
        	<td width="120" align="right"></td>
            <td>		
            <input type="submit" class="button" name="submit" value="提交" >
            </td>
		</tr>
</table>
</form>
</div><!--table-list end-->

<script>
function upImage(){
	return document.getElementById('imgfield').click();
}
</script>
</body>
</html> 