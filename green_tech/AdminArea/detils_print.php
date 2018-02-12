<?php
include("../class/layout.php");
$user->auth();
?>
<title>Detils_Print</title>


			<div class="span10">
            <div align="right">
            <!--
             <form action="" method="post">
            Scerch By : 
            	<a href="src_name.php"><input type="button" class="btn"  value="Name"/></a>
                <a href="calculation.php"><input type="button" class="btn" value="Date" /></a>
                <a href="src_payment.php"><input type="button" class="btn" value="Payment" /></a>
                <a href="src_sub.php"><input type="button" class="btn" value="Subject" /></a>
                <a href="src_code.php"><input type="button" class="btn" value="Sub Code" /></a>
                
            </form> 
            
            -->
           	</div>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th>Date</th>
							<th>Laibery</th>
                            <th>Sub Name</th>
                            <th>Sub Code</th>
                            <th>Item amount</th>
                            <th>Refund amount</th>
                            <th>Total amount</th>
                            <th>Item rate</th>
                            <th>Total Money</th>
                            <th>Paid Money</th>
                            <th>Due Money</th>
							<th>Detail</th>
                            <th>Cal</th>
							</tr>
					</thead>
					<tbody>
						<?php 
		$tran->print_all_detils();
	?>
					</tbody>
					<tfoot>
						<tr>
							<th>ID</th>
							<th>Date</th>
							<th>Laibery</th>
                            <th>Sub Name</th>
                            <th>Sub Code</th>
                            <th>Item amount</th>
                            <th>Refund amount</th>
                            <th>Total amount</th>
                            <th>Item rate</th>
                            <th>Total Money</th>
                            <th>Paid Money</th>
                            <th>Due Money</th>
                            <th>Detail</th>
                             <th>Cal</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
	</div>

<script>
$(function(){
	
$(document).on("click",".getPaid",function(){
	var id=$(this).data("id");
var selectdiv=$(this).parent("div");
	selectdiv.html('<input class="paid span1" data-id="'+id+'" type="text" />');
		selectdiv.children("input").focus();
		});
		
		$(document).on("blur",".paid",function(){
			var id=$(this).data("id");
			$(this).parent("div").html("<input type=\"button\" class=\"btn getPaid\" data-id=\""+id+"\" value=\"Get Paid\"/>")
			});
		
		$(document).on("keyup",".paid",function(e){
			var idVal=$(this).data('id');
			var value=$(this).val();
			if(e.keyCode==13)
			{
				$.ajax({
					url:"payment.php",
					data:{id:idVal,amount:value},
					cache:false,
					success: function(){
						location.reload();
						}
				});
			}
			});
});




$(function(){
	
$(document).on("click",".refund",function(){
	var id=$(this).data("id");
var selectdiv=$(this).parent("div");
	selectdiv.html('<input class="refund span1" data-id="'+id+'" type="text" />');
		selectdiv.children("input").focus();
		});
		
		$(document).on("blur",".refund",function(){
			var id=$(this).data("id");
			$(this).parent("div").html("<input type=\"button\" class=\"btn refund\" data-id=\""+id+"\" value=\"Refund\"/>")
			});
		
		$(document).on("keyup",".refund",function(e){
			var idVal=$(this).data('id');
			var value=$(this).val();
			if(e.keyCode==13)
			{
				$.ajax({
					url:"refund.php",
					data:{id:idVal,amount:value},
					cache:false,
					success: function(){
						location.reload();
						}
				});
			}
			});
});



</script>

</body>
</html>
