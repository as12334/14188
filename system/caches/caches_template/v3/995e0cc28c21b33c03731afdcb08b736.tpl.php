<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?> <!-- 产品信息 -->
        <div class="pro_info">
            <h2 class="gray6">
                
                (第<?php echo $item['qishu']; ?>期)
                <?php echo $item['title']; ?><span class="o-info" style="<?php echo $item['title_style']; ?>"><?php echo $item['title2']; ?></span>
            </h2>
           <div class="purchase-txt gray9 clearfix">
                 价值：￥<?php echo $item['money']; ?>
            </div>
            <div class="clearfix">
                <div class="g-goods-share fr"><a id="btnShare" href="javascript:;" onClick="index()"><p class="z-set"></p>分享</a></div>
                <div class="gRate">
                    <div class="Progress-bar"><p class="u-progress" title="已完成<?php echo $item['canyurenshu']/$item['zongrenshu']*100; ?>%"><span class="pgbar" style="width:<?php echo $item['canyurenshu']/$item['zongrenshu']*100; ?>%;"><span class="pging"></span></span></p><ul class="Pro-bar-li">
                    <li class="P-bar01"><em><?php echo $item['canyurenshu']; ?></em>已参与</li>
                    <li class="P-bar02"><em><?php echo $item['zongrenshu']; ?></em>总需人次</li>
                    <li class="P-bar03"><em><?php echo $item['zongrenshu']-$item['canyurenshu']; ?></em>剩余</li></ul></div>
                </div>
            </div>
            <!--本商品已结束-->
