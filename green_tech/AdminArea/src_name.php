<?php
include("../class/layout.php");
$user->auth();

?>
<title>Src_by_name</title>
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
//my

</style>
<div class="span8">
<div>
<form method="POST" action="#">
<input type="text" name="Name" size="20" class="typeahead-devs" 
placeholder="Scerch">
<input type="submit" class="btn" value="Scerch"/>
</form>
	</div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Date</th>
        <th>Detils</th>
        <th>Sub Name</th>
         <th>Sub Code</th>
        <th>Item amount</th>
        <th>Refund amount</th>
        <th>Total amount</th>
        <th>Item rate</th>
        <th>Total Money</th>
        <th>Paid Money</th>
        <th>Due Money</th>
      </tr>
    </thead>
    <tbody id="tran-suc-html">
      <?php 
	  if(isset($_POST['Name']))
	  	$var=$_POST['Name'];
		else
			$var=NULL;
		echo $tran->all_tran_details_name($var);
	?>
    </tbody>
    <tfoot>
      <tr>
        <th>ID</th>
        <th>Date</th>
        <th>Detils</th>
        <th>Sub Name</th>
        <th>Sub Code</th>
        <th>Item amount</th>
        <th>Refund amount</th>
        <th>Total amount</th>
        <th>Item rate</th>
        <th>Total Money</th>
        <th>Paid Money</th>
        <th>Due Money</th>
      </tr>
    </tfoot>
  </table>
</div>
</div>
</div>
</div>
<script>
$(document).ready(function() {
$('input.typeahead-devs').typeahead({
name: 'accounts',
local:[<?php $dInfo->suggest() ?>]
});
})
</script>
</body></html>