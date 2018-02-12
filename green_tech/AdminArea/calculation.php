<?php
include("../class/layout.php");
$user->auth();

?>
<title>tran_print</title>

<div class="span8">
  <?php
            include("date.php");
			?>
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
		echo $tran->all_tran_details(NULL,NULL);
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
</body></html>