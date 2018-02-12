<?php
include("../class/layout.php");
$user->auth();
?>
<title>Eran_Print</title>


				<table class="table table-striped">
					<thead>
						<tr>
                        	<th>Date</th>
							<th>Laibery</th>
                            <th>Paid Money</th>
							</tr>
					</thead>
					<tbody>
						<?php 
		$tran->print_eran_detils();
	?>
					</tbody>
					<tfoot>
						<tr>
							<th>Date</th>
							<th>Laibery</th>
                            <th>Paid Money</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
	</div>

</body>
</html>
