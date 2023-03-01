<?php defined('G_IN_ADMIN')or exit('No permission resources.'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" href="<?php echo G_GLOBAL_STYLE; ?>/global/css/global.css" type="text/css">
<link rel="stylesheet" href="<?php echo G_GLOBAL_STYLE; ?>/global/css/style.css" type="text/css">
<style>
tbody tr{ line-height:30px; height:30px;} 
</style>
</head>
<body>

<div class="bk10"></div>
<div class="table-list lr10">
<!--start-->
  <table width="100%" cellspacing="0">
    <thead>
		<tr>
            <th width="100px" align="center">ID</th>
            <th width="100px" align="center">用户名UID</th>
            <th width="100px" align="center">中奖内容</th>
            
            <th width="100px" align="center">状态</th>
            <th width="100px" align="center">管理</th>       
		</tr>
    </thead>
    <tbody>
    	<?php foreach($recordlist as $v){ ?>
		<tr>
			<td align="center"><?php echo $v['id']; ?></td>
			<td align="center"><?php echo $v['uid']; ?></td>	
			<td align="center"><?php echo $v['content']; ?></td>	
			
			<td align="center">
			<?php if($v['pass']==1){?>
            未发货
            <?php }elseif($v['pass']==2){ ?>
            待收货
            <?php }elseif($v['pass']==3){ ?>
            已收货
			<?php }else{ ?>
			未完成
			<?php }?></td>	
			
            <td align="center">
            	<a href="<?php echo G_MODULE_PATH; ?>/setting/luckycode/?id=<?php echo $v['id']; ?>">查看</a>
               
            </td>            	
		</tr>
       <?php } ?>
	
  	</tbody>
</table>
</div><!--table-list end-->

<script>
</script>
</body>
</html> 