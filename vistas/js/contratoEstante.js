$(".boton1").click(function(){
   $("#modal2").modal("show");
})

$(function(){
	$(".cerrar").click(function(){
		$("#modal2").modal("hide");
	})
})