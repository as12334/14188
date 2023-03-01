<?php 
$sql='select * from `go_config` where `id`=23';
$result=$db->query($sql);
$roww=$db->getrow($result);
?>
<div id="foot">
    <div class="foot-nav" class="foot">
        <a href="<?php echo $kimiurl; ?>/?from_wap=1"><img src="<?php echo $url; ?>/m/images/icon/phone.png">电脑版</a>
        <a href="<?php echo $url; ?>/m"><img src="<?php echo $url; ?>/m/images/icon/client.png">微商城<img src="<?php echo $url; ?>/m/images/icon/tip.png" class="icon-tips"></a>
        <a href="<?php echo $url; ?>/?/mobile/mobile" class="_border"><img src="<?php echo $url; ?>/m/images/icon/home.png"><?php echo $roww['value']; ?></a>
    </div>
    <div class="foot-copyright"></div>
    <h2>copyright © <?php echo date("Y");?><?php echo $rowSeo['name'] ?>折扣</h2> 
</div>


<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?515853716f1637b60186df401d6a04e6";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>