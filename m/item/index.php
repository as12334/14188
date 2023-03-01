<?php 
session_start();
require"../../conn.php";
$id=isset($_GET['id'])?html($_GET['id']):'';

$sql='select * from `'.$tablepre.'pro_co` where id="'.$id.'"';			
$rr=$db->query($sql);
if(!$row=$db->getrow($rr)){
	msg('','location="'.$url.'"');
	}



$db->execute('update `'.$tablepre.'pro_co` set read_num=read_num+1 where id='.$id.'');

?>
 <script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?515853716f1637b60186df401d6a04e6";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>

<?php 
msg('','location="'.$url.'/m/shop/?id='.$id.'"');
?>