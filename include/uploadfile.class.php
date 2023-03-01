
<?php
if(!defined('IN_MO')){
	exit('Access Denied');
}
class UploadFile{
	public $max_size;
	public $allow_types;
	protected $file_type = array();
	public $sava_path;
	public $file_name;
	public $error;
	public $overfile;
	protected $file_path;
	public function __construct(){
		$this->setFileType();
	}
	public function __destruct(){
		unset($this->file_type);
	}
	//上传文件
	public function upLoad($file,$sava_path,$file_name,$allow_types='jpg|gif|png|zip|rar|txt|html|bmp|pdf',$max_size=1000000000000000000000000,$overfile=false){
		$this->file_path=$sava_path;
		$this->sava_path=MO_ROOT.'/'.$sava_path.'/';
		$this->file_name=$file_name;
		$this->allow_types=$allow_types;
		$this->max_size=$max_size;
		$this->overfile=$overfile;
		$name = $file['name']; 
		$type = $file['type'];
		$size = $file['size']; 
		$tmp_name = $file['tmp_name'];
		$error = $file['error'];
		$fileext=$this->fileext($name);
		//判断上传到临时文件夹的错误
		if($error!=0){
			$this->error=$error;
			return false;
		}
		//判断是否通过post上传的文件
		if (!is_uploaded_file($tmp_name)){
			$this->error = 12;
			return false;
		}
		//判断文件类型
		//echo $type;exit();
		$allow_types = $this->getFileType($type);
		if(!$allow_types||!$this->checkFileType($allow_types,explode('|',$this->allow_types))||!in_array($fileext,explode('|',$this->allow_types))){
			$this->error=10;
			return false;
		}
		//判断文件大小
		if($size>$this->max_size){
			$this->error=11;
			return false;
		}
		//判断路径
		if(!$this->setSavaPath()){
			$this->error=8;
			return false;
		}
		//判断临时文件是否存在
		if(!file_exists($tmp_name)){
			$this->error=7;
			return false;
		}
		//判断出现重名是否覆盖原文件
		$this->file_name=$this->file_name?$this->file_name.'.'.$fileext:$name;
		$new_name=$this->sava_path.$this->file_name;
		if(file_exists($new_name)&&!$this->overfile){
			$this->error=9;
			return false;
		}
		//移动文件
		if(function_exists('move_uploaded_file')){
			$state=move_uploaded_file($tmp_name, $new_name);
		}else if(function_exists('rename')){
			$state=rename($tmp_name, $new_name);
		}else if(function_exists('copy')){
			$state=copy($tmp_name, $new_name);
		}
		if (!$state){
			$this->error=13;
			return false;
		}else{
			$file_info = array('name'=>$this->file_path.'/'.$this->file_name,'size'=>$size,'type'=>$fileext,'error'=>$this->error);
			return $file_info;
		}
	}

	//生成缩略图
	public function makesmall($file,$dtyp,$dwidth,$dheight,$dfile){
		$sfile=MO_ROOT.'/'.$file;
		$dfile=MO_ROOT.'/'.$dfile;
		if (file_exists($sfile)){
			if ($info=getimagesize($sfile)){
				$swidth=$info[0];
				$sheight=$info[1];
				$stype=$info[2];
				if($sim=$this->getfileim($sfile,$stype)){
					if(!$dtyp){
						if ($swidth>$sheight){
							if ($swidth>$dwidth){
								$dwid=$dwidth;
								$dhei=ceil($dwid*$sheight/$swidth);
								if ($dhei>$dheight){
									$dwid=ceil($dheight*$swidth/$sheight);
									$dhei=$dheight;
								}
							}else{
								$dwid=$swidth;
								$dhei=$sheight;
							}
						}else{
							if($sheight>$dheight){
								$dhei=$dheight;
								$dwid=ceil($dheight*$swidth/$sheight);
								if ($dwid>$dwidth){
									$dhei=ceil($dwidth*$sheight/$swidth);
									$dwid=$dwidth;
								}
							}else{
								$dwid=$swidth;
								$dhei=$sheight;
							}
						}
					}else{
						$dwid=$dwidth;
						$dhei=$dheight;	
					}
					
					$dim=imagecreatetruecolor($dwid,$dhei);
					imagecopyresampled($dim,$sim,0,0,0,0,$dwid,$dhei,$swidth,$sheight);
					if($this->createfileim($dim,$stype,$dfile,95)){
						imagedestroy($sim);
						imagedestroy($dim);
					}else{
						$this->error=15;
						return false;
					}
				}			
			}
		}
	}
	
	//根据文件类型创建该类型的图片
	protected function createfileim($im,$type,$file,$qty=95){
		switch($type){
			case 1:
			$im=imagegif($im,$file);
			break;
			case 2:
			$im=imagejpeg($im,$file,$qty);
			break;
			case 3:
			$im=imagepng($im,$file);
			break;
			case 6:
			$im=imagewbmp($im,$file);
			break;
			default:
			$im=false;
		}
		return $im;
	}
	
	//根据文件类型创建$im图片资源标识符
	protected function getfileim($file,$type){
		switch($type){
			case 1:
			$im=imagecreatefromgif($file);
			break;
			case 2:
			$im=imagecreatefromjpeg($file);
			break;
			case 3:
			$im=imagecreatefrompng($file);
			break;
			case 6:
			$im=imagecreatefromwbmp($file);
			break;
			default:
			$im=false;
		}
		return $im;
	}
	//建立文件夹
	protected function setSavaPath(){
		$this->sava_path = str_replace("\\", "/", $this->sava_path);
		$this->sava_path = (preg_match('/\/$/',$this->sava_path)) ? $this->sava_path : $this->sava_path . '/';
		if(!is_dir($this->sava_path)){
			$this->makeDir($this->sava_path);
		}
		return true;
	}
	protected function makeDir($dir, $mode = 0777)
	{
	  if (is_dir($dir) || mkdir($dir, $mode)) return TRUE;
	  if (!makeDir(dirname($dir), $mode)) return FALSE;
	  return @mkdir($dir, $mode);
	}
	//去后缀名
	protected function fileext($filename)
	{
		return strtolower(trim(substr(strrchr($filename, '.'), 1)));
	}
	//得到文件标志类型
	protected function getFileType($type){
		$str=false;
		if($type!=''){
			foreach($this->file_type as $k1=>$v1){
				foreach ($v1 as $k2=>$v2){
					if ($type==$v2){
						$str[]=$k2;
					}
				}			
			}

		}
		return $str;
	}
	//检查文件格式
	protected function checkFileType($type,$allow_types){
		if($type!=''&&$allow_types!=''){
			foreach ($type as $v){
				if (in_array($v,$allow_types)){
					return true;
				}
			}
		}
		return false;
	}
	
	protected function setFileType(){
		$this->file_type[0]['avi']='video/x-msvideo';
		$this->file_type[1]['bmp']='image/bmp';
		$this->file_type[2]['css']='text/css';
		$this->file_type[3]['chm']='application/octet-stream';
		$this->file_type[4]['doc']='application/msword';
		$this->file_type[5]['exe']='application/octet-stream';
		$this->file_type[6]['gif']='image/gif';
		$this->file_type[7]['htm']='text/html';
		$this->file_type[8]['html']='text/html';
		$this->file_type[9]['ico']='image/x-icon';
		$this->file_type[10]['jpg']='image/pjpeg';
		$this->file_type[11]['jpe']='image/jpeg';
		$this->file_type[12]['jpeg']='image/jpeg';
		$this->file_type[13]['jpg']='image/jpeg';
		$this->file_type[14]['js']='application/x-javascript';
		$this->file_type[15]['mid']='audio/mid';
		$this->file_type[16]['mov']='video/quicktime';
		$this->file_type[17]['moov']="video/quicktime";
		$this->file_type[18]['movie']='video/x-sgi-movie';
		$this->file_type[19]['mp3']='audio/mpeg';
		$this->file_type[20]['mpe']='video/mpeg';
		$this->file_type[21]['mpeg']='video/mpeg';
		$this->file_type[22]['mpg']='video/mpeg';
		$this->file_type[23]['mpv2']='video/mpeg';
		$this->file_type[24]['png']="image/png";
		$this->file_type[25]['png']="image/x-png";
		$this->file_type[26]['pdf']='application/pdf';
		$this->file_type[27]['pps']='application/vnd.ms-powerpoint';
		$this->file_type[28]['ppt']='application/vnd.ms-powerpoint';
		$this->file_type[29]['qt']='video/quicktime';
		$this->file_type[30]['swf']="application/x-shockwave-flash";
		$this->file_type[31]['rmi']='audio/mid';
		$this->file_type[32]['rtx']='text/richtext';
		$this->file_type[33]['rar']='application/octet-stream';
		$this->file_type[34]['txt']='text/plain';
		$this->file_type[35]['wav']='audio/x-wav';
		$this->file_type[36]['xls']='application/vnd.ms-excel';
		$this->file_type[37]['zip']='application/zip';
		$this->file_type[37]['zip']='application/x-zip-compressed';
		
	}
	
	function error(){
		$UPLOAD_ERROR = array(0 => '文件上传成功',
							  1 => '上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值',
							  2 => '上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值',
							  3 => '文件只有部分被上传',
							  4 => '没有文件被上传',
							  5 => '上传文件大小为0',
							  6 => '找不到临时文件夹。',
							  7 => '需要移动的文件不存在',
							  8 => '附件目录创建不成功',
							  9 => '发现同名文件',
							  10 => '不允许上传该类型文件',
							  11 => '文件超过了管理员限定的大小',
							  12 => '非法上传文件',
							  13 => '文件移动失败',
							  14 => '附件目录没有写入权限',
							  15 => '文件上传成功，但缩略图无法生成'
							 );
		return $UPLOAD_ERROR[$this->error];
	}
	
}
?>