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
<div class="header lr10">
	<?php echo $this->headerment();?>
</div>
<div class="bk10"></div>
<div class="table-list lr10">
<!--start-->
  <table width="100%" cellspacing="0">
    <thead>
		<tr>
            <th width="10%" align="center">来源</th>
            <th width="10%" align="center">用户名</th>
            <th width="10%" align="center">申请时间</th>
            <th width="10%" align="center">姓    名</th>
            <th align="center">提现账号</th>
            <th width="10%" align="center">提现金额(元)</th>
            <th width="10%" align="center">手续费(元)</th>
            <th width="10%" align="center">审核状态</th>       
            <th width="10%" align="center">管理</th>       
		</tr>
    </thead>
    <tbody>
    	<?php foreach($commissions as $key=>$v){ ?>
		<tr>
			<td align="center">
			<?php if($v['type']==1){?>
				 佣金提现
				 <?php }elseif($v['type']==2){ ?>
					 <span style="color:red">抽奖提现</span>
                       <?php }elseif($v['type']==3){ ?>
					 <span style="color: #0C6">积分提现</span>
                     <?php }else{ ?>
					 <span style="color: #00F">提现</span>
			<?php 	}?> 
            
            </td>
			<td align="center"><?php if($user[$key]['username']==""){echo $user[$key]['mobile'];}else{ echo $user[$key]['username']; }?></td>	
			<td align="center"><?php echo date('Y-m-d',$v['time']); ?></td>	
			<td align="center"><?php echo $v['username']; ?></td>	
			<td align="center"><?php echo $v['banknumber']; ?></td>	
			<td align="center"><?php echo $v['money']; ?></td>	
			<td align="center"><?php if($v['money']>=100){echo 0;}else{ echo $fufen['fufen_yongjintx']; }?></td>	
			<td align="center"><?php if($v['auditstatus']==1){echo "审核通过";}else{echo "<span style='color:red;'>未审核</span>";} ?></td>	
			  
            <td align="center">
			   <?php if($v['auditstatus']!=1){?>
				 <a href="<?php echo G_MODULE_PATH; ?>/member/commreview/<?php echo $v['id'];?>">审核</a><?php
				}else{echo '<span style="color:#00F">已处理</span>';}?> 
		   </td>            	
		</tr>
       <?php } ?>
	
  	</tbody>
	
</table>
</div><!--table-list end-->
<div id="pages"><ul><li>共 <?php echo $total; ?> 条</li><?php echo $page->show('one','li'); ?></ul></div>
<script>
</script>
</body>
</html> 