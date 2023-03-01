<?php defined('G_IN_ADMIN')or exit('No permission resources.'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" href="<?php echo G_GLOBAL_STYLE; ?>/global/css/global.css" type="text/css">
<link rel="stylesheet" href="<?php echo G_GLOBAL_STYLE; ?>/global/css/style.css" type="text/css">
<style>
tr{height:40px;line-height:40px}
</style>
</head>
<body>
<div class="header-title lr10">
	<b>QQ 登陆配置</b>
</div>
<div class="bk10"></div>
<div class="table_form lr10">	
<form action="" method="post" id="myform">
<table width="100%" class="lr10">
  <tr>
    <td width="100">开启QQ登陆</td>
    <td>
     <input name="type" value="1" type="radio" <?php if($config['off'])echo "checked";?>> 开启
	 <input name="type" value="0" type="radio" <?php if(!$config['off'])echo "checked";?>> 关闭 	 
	 <span class="lr10"> </span>
	 <font color="red"></font>
	</td>
  </tr>
  <tr>
    <td>QQ App id</td>
    <td><input type="text" class="input-text wid150" name="id" value="<?php echo $config['id']; ?>"/></td>
  </tr>  
  <tr>
    <td>QQ App key</td>
    <td><input type="text" class="input-text wid250" name="key"  value="<?php echo $config['key']; ?>"/>
	<a href="http://connect.qq.com/"  target="_blank" >点击注册</a>	
	</td>
  </tr> 
	<tr>
    	<td width="100"></td> 
   		
         <?php if( $_COOKIE['auid'] == 1){?>		
                    <td><input type="submit" class="button" name="dosubmit"  value=" 提交 " ></td>
                    <?php }else{ ?>	
                    <td><input type="button" onClick="alert('您没有权限哦！');" class="button" name=""  value=" 提交 " ></td>	
					
                    <?php } ?>
    </tr> 
</table>
</form>

</div><!--table-form end-->

<script>	
</script>
</body>
</html> 