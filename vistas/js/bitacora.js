
/*------Cuando carga la pagina, consulta los  registrados de Municipios*/
$(document).ready(function(){ 
	rutaActual = window.location.toString();
	if(rutaActual.includes("bitacora")){   		
		consultarBitacora();
		
	}

});
/*------------------------------------------Inicia el Espacio de consultar bitacora----------------------------------*/
/*----------------------------------------------------------------------------------------------------------------*/
function consultarBitacora(){

		
	var datos = new FormData();
	datos.append("consultaAllBitacora", "nulo");
	let plantilla2 = " ";
	let obj
	$.ajax({
		url:"//localhost/aguaMineral/ajax/bitacora.ajax.php",
		method:"POST",
		data: datos, 
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta3)
		{
			 if(respuesta3.length >10 )
			 {
				respuesta3 =respuesta3.replace("[","");
				respuesta3 =respuesta3.replace("]","");
				var auxSplit2 = respuesta3.split("},");

				//plantilla2 +='<div class="col-lg-9 col-md-9 col-sm-10 col-xs-12 m-2" id="">'
				for(var i=0;i<auxSplit2.length;i++){
					if(!auxSplit2[i].includes("}")){
						auxSplit2[i] = auxSplit2[i]+"}";
					}
					var res2 = JSON.parse(auxSplit2[i]);
					plantilla2 += `
					<tr>
					      <b><th scope="row">${res2.usuario}</th></b>
					      <td>${res2.fechaControl}</td>
					      <td>${res2.descripcion}</td>					     
					</tr><br>`;

				}
				
				$("#verBitacora").html(plantilla2);  
				$('#verBitacora').show();
			}else{
				$("#verBitacora").hide(); 
					
			}
			

		}
	})
}

