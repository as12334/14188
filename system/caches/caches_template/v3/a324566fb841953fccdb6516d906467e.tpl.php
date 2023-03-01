<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>

<link href="<?php echo G_TEMPLATES_STYLE; ?>/newcss/jifen.css" rel="stylesheet" type="text/css" media="screen,projection,tv" />

<style>
.login_layouts{ margin:10px 0px; border:1px solid #CCC;}
.prompt{ padding:10px 20px;}

.my-list{ padding:10px; height:420px; overflow:hidden}
        .prompt tr td {
            width: 33%;
            height: 60px;
            line-height: 60px;
            padding: 10px 10px 0px;
            border-bottom: 1px dotted #d0d0d0;
            font-size: 14px;
            /*color: #888;*/
           
            overflow: hidden;
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            text-align: left;

        }
		        .my-list ul li {
            width: 100%;
            height: 54px;
            line-height: 54px;
            padding: 0px 10px;
            border-bottom: 1px dotted #d0d0d0;
            font-size: 14px;
            /*color: #888;*/
           
            overflow: hidden;
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            text-align: left;

        }
.my-list ul li img {
            display: inline-block;
            width: 30px;
            height: 30px;
            margin: 0px 10px -8px 0px;
            border-radius: 27px;
        }
.my-list em{ color:red;}
.my-list span{ float:right;}

.prompt .imgs{border-radius: 2px;
width: 58px;
height: 58px;
padding-top:10px;}
}
</style>


 
        <!--内容部分-->
<div class="main">
        <div class="lucky">
       
     <iframe scrolling="no" frameborder="0" width="100%" src="<?php echo WEB_PATH; ?>/go/lucky/luckyshow" height="777" ></iframe> 
         </div>       
                   

<div class="login_layouts">
	<div class="login_title">
		<h2>抽奖产品</h2>
		
	</div>
	<div class="prompt orange" >
    <table width="100%" border="0" valign="middle">
    <tr>
    <?php 
						for($i=0;$i<=11; $i++){	
                         $t = "title".$i;
                         $img = "img_sl".$i;
                         $a =$i+1;
						 ?>
                        
  
    <td valign="middle"><?php echo $i+1; ?>、<img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $rowlp[$img]; ?>" class="imgs">&nbsp; &nbsp;&nbsp;<?php echo $rowlp[$t]; ?></td>
   
     <?php if($a%3==0): ?>
     </tr>
     <tr>
     <?php endif; ?>



  
    
  <?php 
								}
							 ?>
     </tr>
     </table>
    </div>	
</div>

<div class="login_layouts">
	<div class="login_title">
		<h2>会员中奖名单</h2>
		
	</div>
	<div class="prompt orange" >
     <div class="my-list">
      <ul style="margin-top:0px;" id="UserBuyNewList" class="list">
      
      <?php $ln=1;if(is_array($memberlist)) foreach($memberlist AS $sd): ?>
                        <?php 
						$i=rand(0,11);
                        $t = "title".$i;
                      
						 ?>
						
		<li><img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo get_user_key($sd['uid'],'img',''); ?>" width="80"><a href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($sd['uid']); ?>" target="_blank"><?php echo get_user_name($sd['uid'],'username'); ?> </a>&nbsp;抽中了&nbsp;<em><?php echo $rowlp[$t]; ?></em> <span><?php echo $time; ?></span></li>
									
								    

                            
                            <?php  endforeach; $ln++; unset($ln); ?>
								        </ul>   
                                        </div> 
    </div>	
</div>
<div class="clear" style="clear:0"></div>

</div>
  <script> 
						function autoScroll(obj){  
							$(obj).find("#UserBuyNewList").animate({  
								marginTop : "-49px"  
							},300,function(){  
								$(this).css({marginTop : "0px"}).find("li:first").appendTo(this);  
							})  
						}  
						$(function(){  
							setInterval('autoScroll(".my-list")',3000)  
						})  
					</script>     
<!--底部-->
<?php include templates("index","footer");?>