<?php
include("../class/layout.php");
$user->auth();
?>
<title>Contact</title>



				<table class="table table-striped">
					<thead>
						<tr>
							<th>Serial</th>
							<th>Name</th>
                            <th>Option</th>
                            <th>Phone Number</th>
                            <th>Address</th>
							<th>Edit/Delete</th>
						</tr>
					</thead>
					<tbody>
						<?php 
		$conInfo->print_all_con_info();
	?>
					</tbody>
					<tfoot>
						<tr>
							<th>Serial</th>
							<th>Name</th>
                            <th>Option</th>
                            <th>Phone Number</th>
                            <th>Address</th>
							<th>Edit/Delete</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>

</body>
</html>
