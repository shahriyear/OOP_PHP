<?php
include("../class/layout.php");
	$user->auth();
	if(isset($_POST["musicbtn"]))
	{
		$_POST["musicbtn"]='';
		$_POST[$Music->image]=resize_and_save($_FILES[$Music->image],200,200);
		$_POST[$Music->m_path]=upload_file($_FILES[$Music->m_path],'../muiscFolder/');
		echo $Music->new_music($_POST);
			}
?>




<div class="span9 thumbnail">
		<div class="row-fluid">
		<h1 class="text-center">Uplode</h1>	
<div class="thumbnail">
<div class="span4 offset1">
<form action="" method="post" enctype="multipart/form-data"><br />
	Music Title:<br />
	<input type="text" val name="<?php echo $Music->title; ?>" /><br>
	Artist:<br />
	<input type="text" name="<?php echo $Music->artist; ?>" /><br />
		Select Cat<br />
	<select name="<?php echo $Music->cid; ?>">
		<option value="" >Select One</option>
		<?php echo $cat->get_catAsOption(); ?>
	</select><br />
	Image:<br /> <input type="file" name="<?php echo $Music->image; ?>" /><br />
	Path:<br />
	<input type="file" name="<?php echo $Music->m_path; ?>" /><br />
</div>
<div class="span4 offset1">
<br/>
	Album:<br />
	<input type="text" name="<?php echo $Music->album; ?>" /><br />
	Year:<br />
	<input type="text" name="<?php echo $Music->year; ?>" /><br />
	Select Gener:<br />
	<select name="<?php echo $Music->gid; ?>">
		<option value="" >Select One</option>
		<?php echo $gener->get_catAsOption(); ?>
	</select><br />
	length:<br />
	<input type="text" name="<?php echo $Music->m_length; ?>" /><br />
	Bitrate:<br />
	<input type="text" name="<?php echo $Music->bitrate; ?>" /></form>
</div><span class="clearfix"></span>
	<form><input type="submit" name="musicbtn" class="btn offset4 span3" value="Music Add" />
	</form>
</div></div>
</div>
</body>
</html>	