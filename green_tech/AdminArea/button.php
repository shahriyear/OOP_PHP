<script>
$(function(){

$(".getPaid").click(function(){
	$(this).parent("td").html("<input class='paid' type='text' />");
		});
		
		$(document).on("mouseleave","paid",function(){
			$(this).parent("div").html("<input type='button' />")
			});
		
		$(document).on("mouseup","paid",function(e){
			if(e.keycode==13)
			{
				alert("input value");
			}
			});
});

</script>

<div>


</div>