<?php
include("../class/layout.php");
$user->auth();	
	if(isset($_POST["cat_btn"]))
	{
		$_POST["cat_btn"]='';
		echo $expense->new_buy($_POST);
			}
			
			
?>


<h1 class="text-center">Expense</h1>
<hr />
<div class="span8 offset2">
	<form class="form-horizontal mar" action="" method="post">
	
	  <div class="control-group">
	    <label class="control-label" for="inputEmail">Expense Info</label>
	    <div class="controls">
	      <input type="text" class="span3" required="required" name="<?php echo $expense->detils; ?>" />
	    </div>
	  </div>
	  <div class="control-group">
	  <label class="control-label" for="inputEmail">Money </label>
	  <div class="controls">
	    <input type="text" class="span3" required="required" name="<?php echo $expense->money; ?>" />
	  </div></div>
	  <div class="control-group">
	    <div class="controls">
	      <input type="submit" name="cat_btn" class="btn" value="Create" />
	    
	  </div>
	  </div>
	  
	  
	</form>
</div>
</div>
</body>
</html>