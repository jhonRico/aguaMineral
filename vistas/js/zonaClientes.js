$(document).ready(function() {
	$("#tablaCentro").hide();
});


$(function(){
   $("#centro").click(function(){
   	if ($("#centro").val() == "San Cristóbal") 
   	{
   		 $("#tablaCentro").show();
   	}
  })
 })
