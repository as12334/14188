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
</style>
</head>
<body>

<div class="bk10"></div>
<div class="table-list lr10">
<!--start-->
<form name="myform" action="" method="post">
  <table width="100%" cellspacing="0">
  <?php for($i=0;$i<=11;$i++){ ?>
  	<tr>
		<td width="220" align="right">名称<?php echo $i; ?>：</td>
		<td><input type="text" name="title<?php echo $i; ?>" value="<?php echo $rowlp['title'.$i.'']; ?>"  class="input-text wid200">
        类型<?php echo $i; ?>： 
        <input type="radio" name="type<?php echo $i; ?>" value="1" <?php if( $rowlp['type'.$i.'']=="1"){ ?> checked="checked" <?php }?> /> 产品
        <input type="radio" name="type<?php echo $i; ?>" value="2" <?php if( $rowlp['type'.$i.'']=="2"){ ?> checked="checked" <?php }?> /> 现金
        <input type="radio" name="type<?php echo $i; ?>" value="微积分" <?php if( $rowlp['type'.$i.'']=="微积分"){ ?> checked="checked" <?php }?> /> 积分
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;数值<?php echo $i; ?>：<input type="text" name="val<?php echo $i; ?>" value="<?php echo $rowlp['val'.$i.'']; ?>"  class="input-text wid100"><span style="color:red">数值越大越容易中奖</span>
        </td>
	</tr>
    <tr style="border:red solid 1px;">
		<td width="220" align="right">图片<?php echo $i; ?>：</td>
		<td>
           	<input type="text" id="img_sl<?php echo $i; ?>" value="<?php echo $rowlp['img_sl'.$i.'']; ?>" name="img_sl<?php echo $i; ?>" class="input-text wid300">
			<input type="button" class="button"
             onClick="GetUploadify('<?php echo WEB_PATH; ?>','uploadify','LOGO上传','image<?php echo $i; ?>','banner',1,500000,'img_sl<?php echo $i; ?>')" 
             value="上传LOGO"/>
			图片大小：77*77
        </td>
	</tr>
    <tr style="height:1px;">
		<td style="border:red solid 1px; height:1px;" colspan="2"></td>
        </td>
	</tr>
    <?php }?>
  	 
     
</table>
<br><br>
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