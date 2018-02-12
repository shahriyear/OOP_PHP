<?php
include("../class/layout.php");
$user->auth();
?>
<script>
$(function() {
$( "#datepicker" ).datepicker();
$( "#datepicker2" ).datepicker();
});
</script>
<title>Detils_Print</title>


			<div class="span10"><br />
            <div align="right">
            <form action="" method="post">
             Start Date: <input type="text" value="<?php echo date("m/d/Y"); ?>" id="datepicker" name="startdate">
        Last Date: <input type="text" value="<?php echo date("m/d/Y"); ?>"  id="datepicker2" name="lastdate">
        <!--<input type="submit" class="btn" id="tran-sub-btn" value="Search" name="sub_btn">-->
            <input type="text" name="SubName" size="20" class="typeahead-devs" 
placeholder="Scerch" />
            <input type="submit" class="btn" id="tran-sub-btn" value="Search" name="sub_btn">
            </form>
           	</div>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th>Date</th>
							<th>Detils</th>
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
						 if(isset($_POST['sub_btn'])){
							 $tran->scerch($_POST['SubName'],$_POST['startdate'],$_POST['lastdate']);
							// echo $db->last_query;
						 }
	?>
					</tbody>
					<tfoot>
						<tr>
							<th>ID</th>
							<th>Date</th>
							<th>Detils</th>
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
	selectdiv.html('<input class="paid span10" data-id="'+id+'" type="text" />');
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
	selectdiv.html('<input class="refund span10" data-id="'+id+'" type="text" />');
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
//date


$('#tran-sub-btn').on("click",function()

 {



$("#Tran-Frm").ajaxForm({target: '#tran-suc-html',

beforeSubmit:function()
{

	
}, 

success:function()
{
	
	//console.clear();
}
	
}).submit();


}); 


</script>

</body>
</html>