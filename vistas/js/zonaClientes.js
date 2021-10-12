$(document).ready(function() 
{
	$("#tablaCentro").hide();
	
});


$(function(){
   $("#centro").click(function(){
   	if ($("#centro").val() == "San Cristóbal") 
   	{
   		 $("#tablaCentro").show();
   	}else
	{
		$("#tablaCentro").hide();
	}
  })
 })

//Reidreccionar pagina y volver la descripcion solo minusculas
function redireccionarPaginaZonas(descripcion)
{
  result = descripcion.toLowerCase();
  window.location.replace("http://localhost/aguaMineral/"+result);

}