<?php
include("../class/layout.php");
$user->auth();
	$err='';
	
	if(isset($_POST['loginbtn']))
		{
			$_POST['loginbtn']='';
	$err=$tran->new_tran($_POST);
		}
?>


<title>Tranction</title>
<style>
.typeahead-devs, .tt-hint {
border: 2px solid #CCCCCC;
border-radius: 8px 8px 8px 8px;
font-size: 24px;
height: 45px;
line-height: 30px;
outline: medium none;
padding: 8px 12px;
}

.tt-dropdown-menu {
width: 400px;
margin-top: 5px;
padding: 8px 12px;
background-color: #fff;
border: 1px solid #ccc;
border: 1px solid rgba(0, 0, 0, 0.2);
border-radius: 8px 8px 8px 8px;
font-size: 18px;
color: #111;
background-color: #F1F1F1;
}
</style>





<h1 class="text-center">Transection</h1><hr />

	<div class="row-fluid">
	<div class="span7 offset3">
    
	
	<?php echo $err; ?>
    <form class="form-horizontal mar" action="" method="post">
       
		 <div class="control-group">
        <label class="control-label" for="inputEmail">Laibery Name</label>
        <div class="controls">
        <input type="text"  class="typeahead-devs detail_suggest" required="required" name="<?php echo $tran->tdetils?>" id="inputEmail" value="">
        </div>
        </div>
        
      
		
        <div class="control-group">
        <label class="control-label" for="inputEmail">Sub Code</label>
        <div class="controls">
        <input type="text"  class="typeahead-devs code_suggest" required="required" name="<?php echo $tran->s_code?>" id="inputEmail" value="">
        </div>
        </div>
        
		 <div class="control-group">
        <label class="control-label" for="inputEmail">Item Amount</label>
        <div class="controls">
        <input type="text" required="required" name="<?php echo $tran->I_amount?>" id="inputEmail" value="">
        </div>
        </div>
		
		 <div class="control-group">
        <label class="control-label" for="inputEmail">Item Rate</label>
        <div class="controls">
        <input type="text" required="required" name="<?php echo $tran->I_rate?>" id="inputEmail" value="">
        </div>
        </div>
		
		 <div class="control-group">
        <label class="control-label" for="inputEmail">Payment</label>
        <div class="controls">
        <input type="text" required="required" name="<?php echo $tran->P_money?>" id="inputEmail" value="">
        </div>
        </div>
	
        <div class="control-group">
        <div class="controls">
        <button type="submit" name="loginbtn" class="btn">Save</button>
        </div>
        </div>
    </form><br />

	</div>
	</div>
	
	
    </div>
<script>
$(document).ready(function() {

$('input.detail_suggest').typeahead({
name: '<?php echo $tran->tdetils?>',
local:[<?php $dInfo->suggest() ?>]
});

$('input.code_suggest').typeahead({
name: '<?php echo $tran->s_code?>',
local:[<?php $book->suggest_code() ?>]
});

})

</script>


</body>
</html>