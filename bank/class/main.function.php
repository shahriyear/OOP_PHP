<?php
	
	function redirect($location=NULL) {
    	if (!headers_sent())
        header('Location: '.$location);
    	else {
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$location.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$location.'" />';
        echo '</noscript>';
    	}
	}
	
	function p_r($arg)
	{
		echo "<pre>";
		print_r($arg);
		echo "<pre>";
	}
	
	function random_string($length) {
			$key = '';
			$num=range(0, 9);
			//p_r($num);
			$lowerCas=range('a', 'z');
			//p_r($lowerCas);
			$uperCas=range('A', 'Z');
			//p_r($uperCas);
			$keys = array_merge($num,$lowerCas ,$uperCas);
			for ($i = 0; $i < $length; $i++) {
			$key .= $keys[array_rand($keys)];
			}
			return $key;
		}

	
	function resize_and_save($arg,$width,$hight)
	{
		$pre_name=random_string(10);
		$name=$pre_name.'_'.$arg['name'];
		$image=new ImageManipulator($arg['tmp_name']);
		$image->resample($width,$hight,false);
		$image->save("../img/upload/".$name);
		return $name;
	}
	
	function upload_file($arg,$path)
	{
		if($arg['error']!=0)
			return false;
		$pre_name=random_string(10);
		$name=$pre_name.'_'.$arg['name'];
		move_uploaded_file($arg['tmp_name'],$path.$name);
		return $name;
	}
	function formatMoney($number, $fractional=true)
	{
		if($fractional)
			{
				$number=sprintf('%.2f', $number);
			}
		while(true)
		{
			$replaced=preg_replace('/(-?\d+) (\d\d\d)/', '$1,$2',$number);
			if($replaced!=$number)
			{
				$number=$replaced;
			}else
			break;
		}
		return $number;
	}

?>