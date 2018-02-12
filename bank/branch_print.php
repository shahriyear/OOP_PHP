<?php
include("/class/require.php");
$user->auth();

?>
<title>branch_print</title>


			<div class="span9">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Branch Id</th>
							<th>Branch Name</th>
							<th>Edit/Delete</th>
						</tr>
					</thead>
					<tbody>
						<?php 
		$branch->print_all_branch();
	?>
					</tbody>
					<tfoot>
						<tr>
							<th>Branch Id</th>
							<th>Branch Name</th>
							<th>Edit/Delete</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
	</div>

</body>
</html>
