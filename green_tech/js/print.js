	function printContent(area){
		//var printContent=document.getElementById(area).innerHTML;
		var OrginalContent=document.body.innerHTML;
		
		//document.body.innerHTML=printContent;
		window.print() ;
		document.body.innerHTML=OrginalContent;
		}
