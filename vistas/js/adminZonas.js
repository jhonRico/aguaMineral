/*------Cuando carga la pagina, consulta los  registrados de zonas*/
$(document).ready(function(){ 
	rutaActual = window.location.toString();
	if(rutaActual.includes("administracionZonas")){   		
		consultarAllZonas();
	}
});
/*------------------------------------------Inicia el Espacio de consultar zonas----------------------------------*/
/*----------------------------------------------------------------------------------------------------------------*/
function consultarAllZonas(){

		
	var datos = new FormData();
	datos.append("parametroNeutro", "nulo");

	let plantilla2 = " ";
	let obj
	$.ajax({
		url:"//localhost/aguaMineral/ajax/administracionZonas.ajax.php",
		method:"POST",
		data: datos, 
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta3){
			
			 if(respuesta3.length >10 ){

				respuesta3 =respuesta3.replace("[","");
				respuesta3 =respuesta3.replace("]","");
				var auxSplit2 = respuesta3.split("},");

				plantilla2 +='<div class="col-lg-9 col-md-9 col-sm-10 col-xs-12 m-2" id="">'
				for(var i=0;i<auxSplit2.length;i++){
					if(!auxSplit2[i].includes("}")){
						auxSplit2[i] = auxSplit2[i]+"}";
					}
					var res2 = JSON.parse(auxSplit2[i]);
					var aux = "'"+res2.descripcion+"'";
					plantilla2 +='<div class="p-2">'

					plantilla2 +='                      <h3 class="div-pais p-3 rounded">'+res2.descripcion+'<a href="javascript:eliminarTipoUser('+res2.idZonas+')" class=""><button class="btn eliminarPais eliminar text-danger" type="button"><i class="fas fa-trash-alt"></i></button></a><a href="javascript:mostrarModalEditTipUser('+res2.idZonas+','+aux+');" class=""><button class="btn eliminarPais eliminar text-primary" type="button"><i class="fas fa-pencil-alt"></i></button></a></h3>'

					plantilla2 +='   </div>'

				}
				plantilla2 +='</div>'
				$("#verZonas").html(plantilla2);  
				$('#verZonas').show();
			}else{
				$("#verZonas").hide(); 
					
			}
			

		}
	})
}