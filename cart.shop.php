<?php 
//$an=isset($_POST['an'])?$_POST['an']:'';
$pval['an']="";

require_once "cart.class.php";
$cart = new cart();
$action=isset($_POST['action'])?html($_POST['action']):'';

// 添加
if($action=="additem")
{   
$orid = isset($_GET['orid'])?html($_GET['orid']):'';
$picStyle = isset($_POST['picStyle'])&&!empty($_POST['picStyle'])?$_POST['picStyle']:null;
    $postitempid   = isset($_POST['itempid'])&&!empty($_POST['itempid'])?$_POST['itempid']:null;
    $postitemname  = isset($_POST['itemname'])&&!empty($_POST['itemname'])?$_POST['itemname']:null;
    $postitemprice = isset($_POST['price'])&&!empty($_POST['price'])?$_POST['price']:null;
	$postitempriceold = isset($_POST['priceold'])&&!empty($_POST['priceold'])?$_POST['priceold']:null;
    $postitemnum = isset($_POST['number'])&&!empty($_POST['number'])?$_POST['number']:null;
	 $img = isset($_POST['img'])&&!empty($_POST['img'])?$_POST['img']:null;
	 $yh = isset($_POST['yh'])&&!empty($_POST['yh'])?$_POST['yh']:null;
	 $an = isset($_POST['an'])&&!empty($_POST['an'])?$_POST['an']:null;
     $gwf = isset($_POST['gwf'])&&!empty($_POST['gwf'])?$_POST['gwf']:null;
	 $gw = isset($_POST['gw'])&&!empty($_POST['gw'])?$_POST['gw']:null;
	 $amount = isset($_POST['amount'])&&!empty($_POST['amount'])?$_POST['amount']:null;

	 $arr = array(
        "$picStyle" =>array(
		   
            "name"  => $postitemname,
			"postitempid"  => $postitempid,
			"picStyle"  => $picStyle,
            "price" => $postitemprice,
			"priceold" => $postitempriceold,
			 "orid"   => $orid,
            "img"   => $img,
			 "yh"   => 1,
			 "an"   => 1,
			  "gwf"   => 1,
			 "gw"   => 1,
			 
            "num"   => $postitemnum
             )
        
    );
//	print_r($arr);
	
    $cart->addItem($arr);
}
 
//}

 
// 改
if(isset($_POST['action'])&&$_POST['action']=="修改")
{
 //print_r($_POST);
    $postpnum  = isset($_POST['pnum'])&&!empty($_POST['pnum'])?$_POST['pnum']:null;
    if(!empty($postpnum))
    {
        foreach($postpnum as $key=>$val)
        {
            $cart->modItem($key,$val[0]) ;
        }
    }
}

?>

