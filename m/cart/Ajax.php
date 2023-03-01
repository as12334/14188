<?php 
 session_start();
require"../../conn.php";

require_once "../../cart.shop.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script>

	function  makejfs(){
	var nojfs=document.getElementById("J-right-bags");
	nojfs.style.display="none";
	
	
	}
</script>
</head>

<body>
合计：<span class="p">￥<?php echo $countprice = $cart->sum()-$k_yh-$m_yh?></span><span class="t"></span>
 
</body>
</html>