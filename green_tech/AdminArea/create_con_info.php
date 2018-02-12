<?php
include("../class/layout.php");
$user->auth();	
	if(isset($_POST["cat_btn"]))
	{
		$_POST["cat_btn"]='';
		echo $conInfo->new_con_info($_POST);
	}
			
			
?>




<h1 class="text-center">Create New Contact</h1><hr />
<div class="span6 offset2">
	<form class="form-horizontal mar" action="" method="post">
       
		 <div class="control-group">
        <label class="control-label" for="inputEmail">Name</label>
        <div class="controls">
        <input type="text"  class="typeahead-devs detail_suggest" required="required" name="<?php echo $conInfo->name?>" id="inputEmail" value="">
        </div>
        </div>
        
      
		
        <div class="control-group">
        <label class="control-label" for="inputEmail">Phone Number</label>
        <div class="controls">
        <input type="text" required="required" name="<?php echo $conInfo->phone?>" id="inputEmail" value="">
        </div>
        </div>
		
     	
        
        <div class="control-group">
        <label class="control-label" for="inputEmail">Address</label>
        <div class="controls">
        <input type="text" required="required" name="<?php echo $conInfo->add?>" id="inputEmail" value="">
        </div>
        </div>
 
        <div class="control-group">
        <label class="control-label" for="inputEmail">Option</label>
        <div class="controls">
	<select name="<?php echo $conInfo->subid; ?>">
		<option value="" >Select One</option>
		<?php echo $contact->get_conAsOption(); ?>
	</select>
        </div>
        </div>
	
        <div class="control-group">
        <div class="controls">
        <button type="submit" name="cat_btn" class="btn">Save</button>
        </div>
        </div>
    </form>
    </div>
	
	
	
</body>
</html>