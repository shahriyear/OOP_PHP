<?php
include("../class/layout.php");
$user->auth();
?>
<title>Expense_Print</title>


				<table class="table table-striped">
					<thead>
						<tr>
							<th>Serial</th>
                            <th>Date</th>
							<th>Laibery</th>
                            <th>Money</th>
						</tr>
					</thead>
					<tbody>
						<?php 
		$expense->print_all_buy();
	?>
					</tbody>
					<tfoot>
						<tr>
							<th>Serial</th>
                            <th>Date</th>
							<th>Laibery</th>
                            <th>Money</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
	</div>

</body>
</html>
