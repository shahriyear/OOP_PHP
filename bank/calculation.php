<?php
include("/class/require.php");
$user->auth();

?>
<title>tran_print</title>


			<div class="span10">
            <?php
            include("date.php");
			?>
            
				<table class="table table-striped">
					<thead>
						<tr>
                        	<th>Branch Id</th>
							<th>Amount</th>
                        </tr>
					</thead>
					<tbody id="tran-suc-html">
						<?php 
		echo $tran->all_tran_details(NULL,NULL,NULL);
	?>
					</tbody>
					<tfoot>
						<tr>
							<th>Branch Id</th>
							<th>Amount</th>

						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
	</div>

</body>
</html>
