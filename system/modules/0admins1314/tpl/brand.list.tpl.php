<?php defined('G_IN_ADMIN')or exit('No permission resources.'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台首页</title>
<link rel="stylesheet" href="<?php echo G_GLOBAL_STYLE; ?>/global/css/global.css" type="text/css">
<link rel="stylesheet" href="<?php echo G_GLOBAL_STYLE; ?>/global/css/style.css" type="text/css">
 <style>
 	th{ border:0px solid #000;}
	tr{ line-height:30px;}
 </style>
<script src="<?php echo G_GLOBAL_STYLE; ?>/global/js/jquery-1.8.3.min.js"></script>
</head>
<body>
<div class="header lr10">
	<?php echo $this->headerment();?>
</div>
<div class="bk10"></div>
<div class="table-list lr10">
<div class="us2tab" style="overflow:hidden;">
 <table width="100%" cellspacing="0">
    <thead>
            <tr>
            <th width="60" align='center'>选中</th>
            <th width="90">排序</th>
            <th width="100">id</th>
            <th align='center'>品牌名称</th>
            <th align='center'>所属栏目</th>
			<th align='center'>管理操作</th>
            </tr>
    </thead>
    <form action="#" method="post" name="myform">
   <tbody>
   	<?php foreach($brands as $brand){ ?>
       <tr>
         <td align='center'><input name="id[]" type="checkbox" id="id[]" value="<?php echo $brand['id']; ?>"/></td>
         <td align='center'><input name='listorders[<?php echo $brand['id']; ?>]' type='text' size='3' value='<?php echo $brand['order']; ?>' class='input-text-c'></td>        
         <td align='center'><?php echo $brand['id']; ?></td>
         <td align='center'><?php echo $brand['name']; ?></td>
         <td align='center'>			
			<?php 
				$cateids = explode(",",$brand['cateid']);
				foreach($cateids as $v){
					if(isset($categorys[$v]['name'])){
						echo "[".$categorys[$v]['name']."]　";						
					}else{
						echo "<font color='red'>不存在</font>";
					}
				}		
			?>
		 </td>
		 <td align='center'>
         		
            
            <?php if( $_COOKIE['auid'] == 1 ){?>		
                    [<a href="<?php echo G_ADMIN_PATH; ?>/brand/edit/<?php echo $brand['id']; ?>">修改</a>]
                    [<a href="<?php echo G_ADMIN_PATH; ?>/brand/del/<?php echo $brand['id']; ?>">删除</a>]
                    <?php }else{ ?>
                    [<a href="javascript:;" onClick="alert('您没有权限哦！');">修改</a>]
                    [<a href="javascript:;" onClick="alert('您没有权限哦！');">删除</a>]		
                  
                    <?php } ?>	
            
         </td>
      </tr>
     <?php } ?>
   </table>
   </form>
   <div style="height:90px;"></div>
   <table width="100%"  cellspacing="0" cellpadding="0" id="ads" height="20px" border="0">
    <tr >
    <?php if($_COOKIE['auid']==1){?>
    <td align="left"><span id="selectAll" style="margin-left:5px;cursor:pointer;">全选</span>/<span id="reverse" style="cursor:pointer;">反选</span>

&nbsp;<input type="button" id="pl_del" class="button" value="批量删除">
&nbsp;<input type="button" class="button" value=" 排序 "
        onclick="myform.action='<?php echo G_MODULE_PATH; ?>/brand/listorder/dosubmit';myform.submit();"/>
</td><?php }?>
			
			<td><div id="pages"><ul><li>共 <?php echo $total; ?> 条</li><?php echo $page->show('one','li'); ?></ul></div></td>
		</tr>
	</table>
</div>
</div><!--table-list end-->
<script type="text/javascript">
$(function(){
    $("#selectAll").click(function () {
        $(".us2tab :checkbox").attr("checked", true);
    });

    $("#reverse").click(function () {
        $(".us2tab :checkbox").each(function () {
            $(this).attr("checked", !$(this).attr("checked"));
        });
    });

    
	$('#pl_del').click(function(){
    	if($("input[name='id[]']:checked").length < 1) alert('请先选择要删除的数据');
    	else
    	{
    		if(confirm('确定要批量删除选中的数据吗？'))
    		{
				var n = 0;
				var id = '';
				$("input[name='id[]']:checked").each(function(){
					n += 1;
					id += $(this).val() + ',';
				});
			    $.ajax({
			    		url:'<?php echo WEB_PATH;?>/mobile/user/ajaxall',
						data: {tabe: 'brand', type: 'del', ac: 'id', id: id},
			    		success:function(result){
			    			if(result=='SUCCESS'){
			    				alert('删除成功！');
			    				location.reload();
			    			}else{
								
			    				alert('操作失败！');
			    			}
			    		}
			    });
    		}
    	}
    });
    
});


</script>

</body>
</html> 
