<?php
include("../class/layout.php");

$user->auth();
?>
<title>cate_Print</title>


			<div class="span9">
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
		$cat->print_all_cat();
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
	</div>

</body>
</html>
