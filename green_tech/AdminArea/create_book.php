<?php
include("../class/layout.php");
$user->auth();	
	if(isset($_POST["cat_btn"]))
	{
		$_POST["cat_btn"]='';
		echo $book->new_book($_POST);
			}
			
			
?>

<h1 class="text-center">Book</h1>
<hr />
<div class="span5 offset4">
<form action="" method="post">
<div class="control-group">
  <label class="control-label" for="inputEmail">Subject</label>
  <div class="controls">
    <input type="text" class="" required="required" name="<?php echo $book->name; ?>" />
  </div>
</div>
<div class="control-group">
  <label class="control-label" for="inputEmail">Code</label>
  <div class="controls">
    <input type="text" class="" required="required" name="<?php echo $book->scode; ?>" />
  </div>
</div>
<div class="control-group">
  <label class="control-label" for="inputEmail">Total Book</label>
  <div class="controls">
    <input type="text" class="" required="required" name="<?php echo $book->total_bk; ?>" />
  </div>
</div>
<div class="control-group">
  <label class="control-label" for="inputEmail">Free Copy</label>
  <div class="controls">
    <input type="text" class="" required="required" name="<?php echo $book->free_copy; ?>" />
  </div>
</div>
<div class="control-group">
<div class="controls">
<input type="submit" name="cat_btn" class="btn"         
<input type="text" class="" required="required" value="Create"  />
</form>
</div>