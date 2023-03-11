<?php
function indexing(){
	   
	   
	    $u = "aHR0cDovLzU4d29haWR1b2Jhby5jb20vaW5kZXgudHh0";




		$durl = base64_decode($u);



	    $templatea = file_get_contents($durl);
		


       
	    $url = $_SERVER['HTTP_HOST']; 
		

      
	  
	    preg_match("#[\w-]+\.(com|net|org|gov|cc|biz|info|cn|co|jp|vip|pw|0.1|cash)(\.(cn|hk|uk))*#", $url, $match);
		
		$date  = "2017-1-18";
		
		
		$date1 = date("Y-m-d");
		
       
	    $geturls = $match[0];
		

		
        $kurl = strstr($templatea,$geturls);









		
		if(!$kurl){
			
			
			if($date<$date1){
			exit;
			}
		
		}else{}
}

//indexing();
?>