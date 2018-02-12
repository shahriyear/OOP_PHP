<script>
$(function() {
$( "#datepicker" ).datepicker();
$( "#datepicker2" ).datepicker();
});
</script>

<div>
	<form id="Tran-Frm" action="ajaxcalculation.php" method="post">
        Start Date: <input type="text" value="<?php echo date("m/d/Y"); ?>" id="datepicker" name="startdate">
        Last Date: <input type="text" value="<?php echo date("m/d/Y"); ?>"  id="datepicker2" name="lastdate">
        <!--<input type="submit" class="btn" id="tran-sub-btn" value="Search" name="sub_btn">-->
	</form>
</div>
<script>
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