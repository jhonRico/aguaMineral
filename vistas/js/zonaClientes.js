$(document).ready(function() {
	$("#tablaCentro").hide();
});


$(function(){
   $("#centro").click(function(){
   	if ($("#centro").val() == "San Cristobal") 
   	{
   		 $("#tablaCentro").show();
   	}
  })
 })
