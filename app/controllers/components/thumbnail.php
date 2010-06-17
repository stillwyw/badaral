<?php
class ThumbnailComponent extends Object {
	var $thumb_w = 50;
	var $thumb_h = 50;
	var $allow_type_list = array('image/jpeg','image/gif','image/png');
	var $max_file_size = 512000;
	var $u_thumb_path = 'u_thumb/';
	var $g_thumb_path = 'g_thumb/';

	public function createThumb($src_img,$src_img_type,$dst_img_name,$thumb_type)
	{
		$dst_h = 50;
		$dst_w = 50;
		
		list($src_w,$src_h)=getimagesize($src_img);  // 获取原图尺寸
		
		$dst_scale = $dst_h/$dst_w; //目标图像长宽比
		$src_scale = $src_h/$src_w; // 原图长宽比
		
		if($src_scale>=$dst_scale){  // 过高
		$w = intval($src_w);
		$h = intval($dst_scale*$w);
		
		$x = 0;
		$y = ($src_h - $h)/2;
		}
		else{ // 过宽
		$h = intval($src_h);
		$w = intval($h/$dst_scale);
		
		$x = ($src_w - $w)/2;
		$y = 0;
		}
		
		// 剪裁
		switch ($src_img_type) {
			case 'image/jpeg':
				$source=imagecreatefromjpeg($src_img);
				break;
			case 'image/gif':
				$source=imagecreatefromgif($src_img);
				break;
			case 'image/png':
				$source=imagecreatefrompng($src_img);
				break;			
			default:
				$source = null;
				$error = "图片格式不支持！！";
				break;
		}
		
		$croped=imagecreatetruecolor($w, $h);
		if(!is_null($source)){
			imagecopy($croped,$source,0,0,$x,$y,$src_w,$src_h);
			// 缩放
			$scale = $dst_w/$w;
			$target = imagecreatetruecolor($dst_w, $dst_h);
			$final_w = intval($w*$scale);
			$final_h = intval($h*$scale);
			imagecopyresampled($target,$croped,0,0,0,0,$final_w,$final_h,$w,$h);
			// 保存
			switch ($thumb_type) {
				case 'u':
					$path = $this->u_thumb_path;
					break;
				case 'g':
					$path = $this->g_thumb_path;
					break;			
				default:
					$error = 'wrong thumb type';
					break;
			}
			$file = $path.$dst_img_name.".jpg";
			imagejpeg($target, $file, 100);
			chmod("$file",0777);
			imagedestroy($target);
		}else{
			$error = 'create image wrong!! ';
		}
		

		if(isset($error)){
			return $error;
		}else{
			return true;
		}
	}
}

?>