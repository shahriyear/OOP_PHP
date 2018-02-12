<?php
	include("class/require.php");
	$user->auth();
	$err='';
	
	if(isset($_POST['loginbtn']))
		{
			$_POST['loginbtn']='';
	$err=$tran->new_tran($_POST);
		}
?>


<title>Send</title>




<div class="span9 thumbnail">
<h1 class="text-center">Transection</h1><hr />

	<div class="row-fluid">
	<div class="span8 offset2">
	
	<?php echo $err; ?>
    <form class="form-horizontal mar" action="" method="post">
        <div class="control-group"><br />
        <label class="control-label" for="inputEmail">Transction ID</label>
        <div class="controls">
        <input type="text" name="tid" id="inputEmail" value="1234" disabled="disabled">
        </div>
        </div>
		
		
        <div class="control-group">
        <label class="control-label" for="inputPassword">Branche Name</label>
        <div class="controls">
		
		<select name="<?php echo $tran->rbr_id; ?>">
		<option value="" >Select One</option>
		<?php echo $branch->get_banAsOption(NULL,$user->user_by_id($user->current_user(),$user->bid)); ?>
	</select><br />
		
        </div>
        </div>
		
		 <div class="control-group">
        <label class="control-label" for="inputEmail">Sender Name</label>
        <div class="controls">
        <input type="text" name="<?php echo $tran->sname?>" id="inputEmail" value="">
        </div>
        </div>
		
		 <div class="control-group">
        <label class="control-label" for="inputEmail">Sender Phone</label>
        <div class="controls">
        <input type="text" name="<?php echo $tran->sphone?>" id="inputEmail" value="">
        </div>
        </div>
		
		 <div class="control-group">
        <label class="control-label" for="inputEmail">Receiver Name</label>
        <div class="controls">
        <input type="text" name="<?php echo $tran->rname?>" id="inputEmail" value="">
        </div>
        </div>
		
		 <div class="control-group">
        <label class="control-label" for="inputEmail">Receiver Phone</label>
        <div class="controls">
        <input type="text" name="<?php echo $tran->rphone?>" id="inputEmail" value="">
        </div>
        </div>
		
		 <div class="control-group">
        <label class="control-label" for="inputEmail">Amount</label>
        <div class="controls">
        <input type="text" name="<?php echo $tran->ammount?>" id="inputEmail" value="">
        </div>
        </div>
		
		
		
		
        <div class="control-group">
        <div class="controls">
        <button type="submit" name="loginbtn" class="btn">Send</button>
        </div>
        </div>
    </form><br />

	</div>
	</div>
	
	
    </div>
</body>
</html>