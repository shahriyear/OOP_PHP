<?php
include("../class/layout.php");
$user->auth();
?>
<title>Con_Print</title>



				<table class="table table-striped">
					<thead>
						<tr>
							<th>Serial</th>
							<th>Name</th>
							<th>Edit/Delete</th>
						</tr>
					</thead>
					<tbody>
						<?php 
		$contact->print_all_con();
	?>
					</tbody>
					<tfoot>
						<tr>
							<th>Serial</th>
							<th>Name</th>
							<th>Edit/Delete</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>

</body>
</html>
