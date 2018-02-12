<?php
include("../class/layout.php");
$user->auth();

?>
<title>user_print</title>



				<table class="table table-striped">
					<thead>
						<tr>
							<th>Serial</th>
							<th>Name</th>
							<th>User Name</th>
							<th>Password</th>
							<th>Edit/Delete</th>
						</tr>
					</thead>
					<tbody>
						<?php 
		$user->print_all_user();
	?>
					</tbody>
					<tfoot>
						<tr>
							<th>Serial</th>
							<th>Name</th>
							<th>User Name</th>
							<th>Password</th>
							<th>Edit/Delete</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>


</body>
</html>
