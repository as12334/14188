<?php 

defined('G_IN_SYSTEM') or exit('No permission resources.');
System::load_app_class("admin",G_ADMIN_DIR);
class upfile extends admin {	
		private $uppath = "";
		public function __construct(){
			$this->db = System::load_sys_class("model");			
			if(G_CHARSET=='utf-8'){
				$this->uppath.= 'utf8/';
			}elseif(G_CHARSET=='gbk'){
				$this->uppath.= 'gbk/';
			}		
		}
		
		public function init(){
			if(isset($_POST['submit'])){
				$this->web();
				exit;
			}
		
			$stauts = 1;
			$version = System::load_sys_config('version');	
			$v_time = $version['release'];
			$v_version = $version['version'];
			
			$upfile_url = $this->uppath;
			$version = System::load_sys_config('version','release');	
			//获取压缩包			
			$content = @file_get_contents($upfile_url);
			$pathlist = false ;
			if(!$content){				
				$stauts = -1;
			}else{			
				//数组的位置
				$key = -1;
				$allpathlist = $pathlist =  array();
				preg_match_all("/>(patch_[\w_]+\.zip)</", $content, $allpathlist);
				$allpathlist = $allpathlist[1];
				
				//获取可供当前版本升级的压缩包
				foreach($allpathlist as $k=>$v) {
					if(strstr($v, 'patch_'.$version)) {
						$key = $k;
						break;
					}
				}
				$key = $key < 0 ? 9999 : $key;
				foreach($allpathlist as $k=>$v) {
					if($k >= $key) {
						$pathlist[$k] = $v;
					}
				}
			}			
			
			include $this->tpl(ROUTE_M,"upfile");
		}
		
		//网站升级
		public function web(){		
						
			$upfile_url = $this->uppath;
			$version = System::load_sys_config('version','release');	
			//获取压缩包			
			$content = @file_get_contents($upfile_url);
			if(!$content){
				_message("升级失败,获取压缩包列表失败");
			}
			//数组的位置
			$key = -1;
			$allpathlist = $pathlist =  array();
			preg_match_all("/>(patch_[\w_]+\.zip)</", $content, $allpathlist);
			$allpathlist = $allpathlist[1];
			
			//获取可供当前版本升级的压缩包
			foreach($allpathlist as $k=>$v) {
				if(strstr($v, 'patch_'.$version)) {
					$key = $k;
					break;
				}
			}
			$key = $key < 0 ? 9999 : $key;
			foreach($allpathlist as $k=>$v) {
				if($k >= $key) {
					$pathlist[$k] = $v;
				}
			}
			
			//开始升级
			
			//检查服务器是否支持zip
			if(empty($pathlist)) {
				_message("没有可升级文件");
			}
					
			
			//创建缓存文件夹
			if(!file_exists(G_CACHES.'caches_upfile')) {
				@mkdir(G_CACHES.'caches_upfile');
			}
			
			//根据版本下载zip升级包，解压覆盖
			System::load_app_class('pclzip', 'api', 'no');
			
			foreach($pathlist as $k=>$v):
				//远程压缩包地址
				$zip_url = $upfile_url.$v;
				//保存到本地地址
				$zip_path = G_CACHES.'caches_upfile'.DIRECTORY_SEPARATOR.$v;				
				//解压路径
				$zip_source_path = G_CACHES.'caches_upfile'.DIRECTORY_SEPARATOR.basename($v,".zip");				
				//下载压缩包
				@file_put_contents($zip_path, @file_get_contents($zip_url));
				//解压缩
				$archive = new PclZip($zip_path);
				if($archive->extract(PCLZIP_OPT_PATH, $zip_source_path, PCLZIP_OPT_REPLACE_NEWER) == 0) {
					die("Error : ".$archive->errorInfo(true));
				}
				
				//拷贝文件夹到根目录
				$copy_from = $zip_source_path.DIRECTORY_SEPARATOR;
				
				$copy_to = G_APP_PATH;
				$this->copyfailnum = 0;
				$this->copydir($copy_from, $copy_to,'cover');
				
				//检查文件操作权限，是否复制成功
				if($this->copyfailnum > 0) {
					//如果失败，恢复当前版本					
					_message("升级失败");
				}
				
				
				
				/***************** 执行 SQL START  ***************/
				$sql_path = G_CACHES.'caches_upfile'.DIRECTORY_SEPARATOR.basename($v,".zip").DIRECTORY_SEPARATOR.'up.sql';
				if(file_exists($sql_path)):				
				$mysql_server_version = $this->db->GetVersion(true);
				$dbcharset = System::load_sys_config('database','default');
				$dbcharset = $dbcharset['charset'];
				$data = file_get_contents($sql_path);
				$sqls = explode(';', $data);							
				
				if(strlen(end($sqls)) == 2){
					array_pop($sqls);
				}	
				
					if(count($sqls) >=1){
						foreach ($sqls as $sql) {
						//if (empty($sql)) continue;
							if($mysql_server_version > '4.1' && $dbcharset) {
									$sql = preg_replace("/TYPE=(InnoDB|MyISAM|MEMORY)( DEFAULT CHARSET=[^; ]+)?/", "TYPE=\\1 DEFAULT CHARSET=".$dbcharset,$sql);
							}
							if (!empty($sql) && strlen($sql) != 2){										
								$this->db->Query($sql);
							}
						}
					}
				endif;
				/***************** 执行 SQL END ******************/
				
				if(file_exists($sql_path)){
					$sql_path = G_APP_PATH.'up.sql';
					@unlink($sql_path);
				}
				
				$sever_upfile = G_CACHES.'caches_upfile'.DIRECTORY_SEPARATOR.basename($v,".zip").DIRECTORY_SEPARATOR.'sever_upfile.php';
				if(file_exists($sever_upfile)){
					$sever_upfile = G_APP_PATH.'sever_upfile.php';
					include $sever_upfile;	
					@unlink($sever_upfile);
				}
				
				
				//删除文件
				@unlink($zip_path);
				//删除文件夹
	 			$this->deletedir($zip_source_path);
				//升级成功"							
			endforeach;
			
			_message("升级成功",G_MODULE_PATH."/upfile/init");
			
			
				
		}//
		
	public function copydir($dirfrom, $dirto, $cover='') {
	    //如果遇到同名文件无法复制，则直接退出
	    if(is_file($dirto)){
	        die("同名文件无法复制".$dirto);
	    }
	    //如果目录不存在，则建立之
	    if(!file_exists($dirto)){
	        mkdir($dirto);
	    }
	    
	    $handle = opendir($dirfrom); //打开当前目录
    
	    //循环读取文件
	    while(false !== ($file = readdir($handle))) {
	    	if($file != '.' && $file != '..'){ //排除"."和"."
		        //生成源文件名
			    $filefrom = $dirfrom.$file;			
		     	//生成目标文件名
		        $fileto = $dirto.$file;				
		        if(is_dir($filefrom)){ //如果是子目录，则进行递归操作
		            $this->copydir($filefrom.DIRECTORY_SEPARATOR, $fileto.DIRECTORY_SEPARATOR, $cover);
		        } else { //如果是文件，则直接用copy函数复制
		        	if(!empty($cover)) {
						if(!copy($filefrom, $fileto)) {
							$this->copyfailnum++;
						    echo 'copy'.$filefrom.'to'.$fileto.'failed'."<br />";
						}else{
							//copy 成功
						}
		        	} else {
		        		if(fileext($fileto) == 'html' && file_exists($fileto)) {
								//文件==html 不copy
		        		} else {
		        			if(!copy($filefrom, $fileto)) {
								$this->copyfailnum++;
							    echo 'copy'.$filefrom.'to'.$fileto.'failed'."<br />";
							}else{
								//copy 成功
							}
		        		}
		        	}
		        }
	    	}
	    }
	}//
	public function deletedir($dirname){
	    $result = false;
	    if(! is_dir($dirname)){
	        echo " $dirname is not a dir!";
	        exit(0);
	    }
	    $handle = opendir($dirname); //打开目录
	    while(($file = readdir($handle)) !== false) {
	        if($file != '.' && $file != '..'){ //排除"."和"."
	            $dir = $dirname.DIRECTORY_SEPARATOR.$file;
	            //$dir是目录时递归调用deletedir,是文件则直接删除
	            is_dir($dir) ? $this->deletedir($dir) : unlink($dir);
	        }
	    }
	    closedir($handle);
	    $result = rmdir($dirname) ? true : false;
	    return $result;
	}
}
?>