<?php
include("../class/layout.php");
$user->auth();
?>
<title>Book_Print</title>



				<table class="table table-striped">
					<thead>
						<tr>
							<th>Serial</th>
							<th>Name</th>
                            <th>Sub Code</th>
                            <th>Total Book</th>
                            <th>Free Copy</th>
                            <th>Current Book</th>
							<th>Edit/Delete</th>
                            <th>Cal</th>
						</tr>
					</thead>
					<tbody>
						<?php 
		$book->print_all_book();
	?>
					</tbody>
					<tfoot>
						<tr>
							<th>Serial</th>
							<th>Name</th>
                            <th>Sub Code</th>
                            <th>Total Book</th>
                            <th>Free Copy</th>
                            <th>Current Book</th>
							<th>Edit/Delete</th>
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
	
$(document).on("click",".newBook",function(){
	var id=$(this).data("id");
var selectdiv=$(this).parent("div");
	selectdiv.html('<input class="paid span1" data-id="'+id+'" type="text" />');
		selectdiv.children("input").focus();
		});
		
		$(document).on("blur",".paid",function(){
			var id=$(this).data("id");
			$(this).parent("div").html("<input type=\"button\" class=\"btn newBook\" data-id=\""+id+"\" value=\"New Book\"/>")
			});
		
		$(document).on("keyup",".paid",function(e){
			var idVal=$(this).data('id');
			var value=$(this).val();
			if(e.keyCode==13)
			{
				$.ajax({
					url:"total_book.php",
					data:{id:idVal,amount:value},
					cache:false,
					success: function(){
						location.reload();
						}
				});
			}
			});
			
			
		$(document).on("click",".freeCopy",function(){
	var id=$(this).data("id");
var selectdiv=$(this).parent("div");
	selectdiv.html('<input class="pai span1" data-id="'+id+'" type="text" />');
		selectdiv.children("input").focus();
		});
		
		$(document).on("blur",".pai",function(){
			var id=$(this).data("id");
			$(this).parent("div").html("<input type=\"button\" class=\"btn freeCopy\" data-id=\""+id+"\" value=\"Free Copy\"/>")
			});
		
		$(document).on("keyup",".pai",function(e){
			var idVal=$(this).data('id');
			var value=$(this).val();
			if(e.keyCode==13)
			{
				$.ajax({
					url:"free_book.php",
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
