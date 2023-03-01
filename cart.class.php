<?php
/**
*  类名: cart
*  描述: 尝试以最简单的方式实现购物车
*  其他: 2004-8-19
*/
class cart
{
    /**
    *   函数名称:   addItem
    *   函数功能:   添加商品
    *   输入参数:   $data ------------- 商品数组
    *   函数返回值: none
    *   其它说明:   因为数据是记录在session中,所以不用返回
    */
    function addItem($data)
    {
        if(is_array($data)&&!empty($data))
        {
            foreach($data as $key=>$val)
            {
                // 如果商品存在就加数量和价格

                if($this->_isExists($key))
                {
                    $_SESSION['cart'][$key]["count"] += floatval($val['price'])*intval($val['num']);
                    $_SESSION['cart'][$key]["num"]   += intval($val['num']);
                }
                // 否则直接加入
                else
                {
                    $_SESSION['cart'][$key]  = $data[$key];
                    $_SESSION['cart'][$key]["name"]  = $val['name'];
                    $_SESSION['cart'][$key]["price"] = $val['price'];
                    $_SESSION['cart'][$key]["count"] = floatval($val['price'])*intval($val['num']);
                    $_SESSION['cart'][$key]["num"]   = intval($val['num']);
                }
            }
        }
    }
 
    /**
    *   函数名称:   _isExists
    *   函数功能:   判断此商品是否存在
    *   输入参数:   $id ---------- 商品ID
    *   函数返回值: bool
    *   其他说明:   2004-8-19
    */
    function _isExists($id)
    {
        if(isset($_SESSION['cart'][$id])&&!empty($_SESSION['cart'][$id])&&array_key_exists($id,$_SESSION['cart']))
        {
            Return true;
        }
        else
        {
            Return false;
        }
		
    }

    /**
    *   函数名称:   modItem
    *   函数功能:   修改商品数量
    *   输入参数:   $id -------------- 商品ID
    *              $num ------------- 商品数量
    *   函数返回值: 返回值说明
    *   其他说明:   说明
    */
    function modItem($id,$num)
    {
        $arr = $this->getItems($id);
        // 如果商品存在就改数量和价格
        if($this->_isExists($id))
        {
            $_SESSION['cart'][$id]["count"] = ($arr['price'])*intval($num);
            $_SESSION['cart'][$id]["num"]   = intval($num);
        }
    }
 
    /**
    *   函数名称:   getItems
    *   函数功能:   取得商品数组
    *   输入参数:   $id --------------- 某商品的ID
    *   函数返回值: array
    *   其它说明:   2004-8-19
    */
    function getItems($id=null)
    {
        if(isset($_SESSION['cart']))
        {
            if($id==null)
            {
                Return $_SESSION['cart'];
            }
            else
            {
                Return $_SESSION['cart'][$id];
            }
        }
    }
 
    /**
    *   函数名称:   emptyItem
    *   函数功能:   删除商品
    *   输入参数:   $id ----------- 商品ID
    *   函数返回值: bool
    *   其它说明:   2004-8-19
    */
    function emptyItem($id=null)
    {
        if($id==null)
        {
            unset($_SESSION['cart']);
        }
        else
        {
            unset($_SESSION['cart'][$id]);
        }
    }

 
    /**
    *   函数名称:   sum
    *   函数功能:   统计总价
    *   输入参数:   none
    *   函数返回值: int
    *   其它说明:   2004-8-19
    */
    function sum()
    {
        $total = 0;
        if(isset($_SESSION['cart'])&&!empty($_SESSION['cart']))
        {
            foreach($_SESSION['cart'] as $key=>$val)
            {
                $total += $val['count'];
            }
        }
        Return $total;
    }
	function sums()
    {
        $totals = 0;
        if(isset($_SESSION['cart'])&&!empty($_SESSION['cart']))
        {
            foreach($_SESSION['cart'] as $key=>$val)
            {
                $totals += $val['num'];
            }
        }
        Return $totals;
    }
	
	
	
	   function yh()
    {
        $totals = 0;
        if(isset($_SESSION['cart'])&&!empty($_SESSION['cart']))
        {
            foreach($_SESSION['cart'] as $key=>$val)
            {
                $totals += $val['num']*$val['yh'];
            }
        }
        Return $totals;
    }
	
	function yhs()
    {
        $totals = 0;
        if(isset($_SESSION['cart'])&&!empty($_SESSION['cart']))
        {
            foreach($_SESSION['cart'] as $key=>$val)
            {
                $totals = $val['yh'];
            }
        }
        Return $totals;
    }
		   function co()
    {
		$totalss = 0;
        if(isset($_SESSION['cart'])&&!empty($_SESSION['cart']))
        {
            foreach($_SESSION['cart'] as $key=>$val)
            {
                $totalss += $val['count'];
            }
        }
       // Return $totalss;
		
        $totals = 0;
        if(isset($_SESSION['cart'])&&!empty($_SESSION['cart']))
        {
            foreach($_SESSION['cart'] as $key=>$val)
            {
                $totals = $totalss-$val['num']*$val['yh'];
            }
        }
        Return $totals;
    }
}
?>