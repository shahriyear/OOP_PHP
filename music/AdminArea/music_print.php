<?php
include("../class/layout.php");
$user->auth();

?>
<title>Music_Print</title>


			<div class="span9">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Serial</th>
							<th>Title</th>
							<th>Category</th>
							<th>Artist</th>
							<th>Image</th>
							<th>Album</th>
							<th>Year</th>
							<th>Gener</th>
							<th>Bit Rate</th>
							<th>Edit/Delete</th>
						</tr>
					</thead>
					<tbody>
						<?php 
		$Music->print_all_music();
	?>
					</tbody>
					<tfoot>
						<tr>
							<th>Serial</th>
							<th>Title</th>
							<th>Category</th>
							<th>Artist</th>
							<th>Image</th>
							<th>Album</th>
							<th>Year</th>
							<th>Gener</th>
							<th>Bit Rate</th>
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
