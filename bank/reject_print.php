<?php
include("/class/require.php");
$user->auth();

?>
<title>tran_print</title>


			<div class="span10">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Br Incharge</th>
							<th>Transection Id</th>
							<th>Sender Name</th>
							<th>Sender phone</th>
							<th>Receiver Name</th>
							<th>Receiver phone</th>
							<th>Time</th>
							<th>Date</th>
							<th>Sender Branch</th>
							<th>Receiver Branch</th>
							<th>Amount</th>
							<th>Details</th>

						</tr>
					</thead>
					<tbody>
						<?php 
		$tran->print_reject_tran();
	?>
					</tbody>
					<tfoot>
						<tr>
							<th>Br Incharge</th>
							<th>Transection Id</th>
							<th>Sender Name</th>
							<th>Sender phone</th>
							<th>Receiver Name</th>
							<th>Receiver phone</th>
							<th>Time</th>
							<th>Date</th>
							<th>Sender Branch</th>
							<th>Receiver Branch</th>
							<th>Amount</th>
							<th>Details</th>

						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
	</div>

</body>
</html>
