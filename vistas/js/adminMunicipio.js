
/*------Cuando carga la pagina, consulta los  registrados de Municipios*/
$(document).ready(function(){ 
	rutaActual = window.location.toString();
	if(rutaActual.includes("administracionMunicipio")){   		
		consultarAllMunicipios();
	}

});
var rutaOculta = $("#rutaOculta").val();
/*------------------------------------------Inicia el Espacio de consultar Municipios----------------------------------*/
/*----------------------------------------------------------------------------------------------------------------*/
function consultarAllMunicipios(){

		
	var datos = new FormData();
	datos.append("consultaAllMunicipio", "nulo");
	let plantilla2 = " ";
	let obj
	$.ajax({
		url:rutaOculta+"ajax/administracionMunicipios.ajax.php",
		method:"POST",
		data: datos, 
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta3)
		{
			
			 if(respuesta3.length >10 ){

				respuesta3 =respuesta3.replace("[","");
				respuesta3 =respuesta3.replace("]","");
				var auxSplit2 = respuesta3.split("},");

				//plantilla2 +='<div class="col-lg-9 col-md-9 col-sm-10 col-xs-12 m-2" id="">'
				for(var i=0;i<auxSplit2.length;i++){
					if(!auxSplit2[i].includes("}")){
						auxSplit2[i] = auxSplit2[i]+"}";
					}
					var res2 = JSON.parse(auxSplit2[i]);
					var aux = "'"+res2.nombreMunicipio+"'";
					var aux1 = "'"+res2.capitalMunicipio+"'";
					/*plantilla2 +='<div class="p-2">'

					plantilla2 +='                      <h3 class="div-pais p-3 rounded">'+res2.nombreMunicipio+'<a href="javascript:eliminarMunicipio('+res2.idMunicipio+')" class=""><button class="btn eliminarPais eliminar text-danger" type="button"><i class="fas fa-trash-alt"></i></button></a><a href="javascript:mostrarModalEditMunicipio('+res2.idMunicipio+','+aux+','+aux1+','+res2.Estado_idEstado+');" class=""><button class="btn eliminarPais eliminar text-primary" type="button"><i class="fas fa-pencil-alt"></i></button></a></h3>'

					plantilla2 +='   </div>'*/

					plantilla2 += `
					<tr>
					      <b><th scope="row">${res2.nombreEstado}</th></b>
					      <td></td>
					      <td></td>
					      <td>${res2.nombreMunicipio}</td>
					      <td></td>
					      <td></td>    
					     <td><a href="javascript:mostrarModalEditMunicipio('${res2.idMunicipio}','${res2.nombreMunicipio}','${res2.capitalMunicipio}','${res2.Estado_idEstado}')"><span title="Modificar"><i class="fas fa-pencil-alt text-primary me-3"></i></span></a><a href="javascript:eliminarMunicipio('${res2.idMunicipio}','${res2.nombreMunicipio}')"><span title="Eliminar"><i class="fas fa-trash-alt text-danger"></i></span></a></td>
					</tr><br>`;

				}
				//plantilla2 +='</div>'
				$("#verMunicipios").html(plantilla2);  
				$('#verMunicipios').show();
			}else{
				$("#verMunicipios").hide(); 
					
			}
			

		}
	})
}
/*------------------------------------------Inicia el Espacio de agregar municipio----------------------------------*/
/*----------------------------------------------------------------------------------------------------------------*/

$(function(){
	$(".mostrarModalAddMunicipios").click(function(){
		$("#moddaddmunicipio").modal("show");
	})
})
//cerrar modal agregar

$(function(){
	$(".cerrar").click(function(){
		$("#nameMunicipio").val('');
		$("#moddaddmunicipio").modal("hide");
	})
})

$(function(){
	$("#agregarMunicipioBtn").click(function(){

		var municipio = $("#nameMunicipio").val();
		var capital = $("#capitalMunicipio").val();
		var idEstadoValue = $("#estadoSelectValue").val();
			if (municipio == "") 
 			{
 				Swal.fire({
 					position: 'top-end',
 					icon: 'error',
 					toast: true,
 					title: 'El campo esta vacio nombre del municipio',
 					showConfirmButton: false,
 					timerProgressBar: true,
 					timer: 1500
 				})
 				return false;
 			}
 			if (!expresiones.nombre.test(municipio)) 
 			{
 				Swal.fire({
 					position: 'top-end',
 					icon: 'error',
 					toast: true,
 					title: 'Ingrese un valor valido en nombre del municipio',
 					showConfirmButton: false,
 					timerProgressBar: true,
 					timer: 1500
 				})
 				return false;
 			}
			if (capital == "") 
 			{
 				Swal.fire({
 					position: 'top-end',
 					icon: 'error',
 					toast: true,
 					title: 'El campo esta vacio capital del municipio',
 					showConfirmButton: false,
 					timerProgressBar: true,
 					timer: 1500
 				})
 				return false;
 			}
 			if (!expresiones.nombre.test(capital)) 
 			{
 				Swal.fire({
 					position: 'top-end',
 					icon: 'error',
 					toast: true,
 					title: 'Ingrese un valor valido en capital del municipio',
 					showConfirmButton: false,
 					timerProgressBar: true,
 					timer: 1500
 				})
 				return false;
 			}
 			
			validarRegistroMunicipio();

			return true;
		})
	})

function validarRegistroMunicipio()
{
		var municipio = $("#nameMunicipio").val();
		var capital = $("#capitalMunicipio").val();
		var idEstadoValue = $("#estadoSelectValue").val();

	var ejecutar = validarRegistroExistenteMunicipio(municipio,capital,idEstadoValue);
	if(ejecutar == "No existe"){
	     registrarCampoMunicipio(municipio,capital,idEstadoValue);
		 consultarAllMunicipios();	
	}

}
/*Funcion Ajax que registra el estado en BD*/
function registrarCampoMunicipio(municipio,capital,idEstadoValue)
{
	var datos = new FormData();

	datos.append("addMunicipio", municipio);
	datos.append("addCapital", capital);
	datos.append("addidEstadoValue", idEstadoValue);
	$.ajax({
		url:rutaOculta+"ajax/administracionMunicipios.ajax.php",
		method:"POST",
		data: datos, 
		cache: false,
		contentType: false,
		processData: false,
		async:false,
		success: function(respuesta)
		{     			
			if(!respuesta.includes("ok"))
			{
				Swal.fire({
					title: 'Error',
					text: 'Error al registrar '+respuesta,
					icon: 'error',
					showCloseButton: true,
					confirmButtonText:'Aceptar'
				}); 

			}else
			{
				Swal.fire({
					title: 'Registro Exitoso',
					icon: 'success',
					showCloseButton: true,
					confirmButtonText:'Aceptar'
				}).then((result) => 
				{
					if (result.isConfirmed)
					{
					    $("#nameMunicipio").val('');
						$("#capitalMunicipio").val('');
						$("#moddaddmunicipio").modal("hide");
					}

				})
			}

		}                 

	})
}
//Funcion Ajax que valida existente en BD 

function validarRegistroExistenteMunicipio(municipio,capital,idEstadoValue)
{
	var datos = new FormData();
	var returnValue = "Existe";
	datos.append("municipio", municipio);
	datos.append("idEstadoValue", idEstadoValue);
	datos.append("capital", capital);

	$.ajax({
		url:rutaOculta+"ajax/administracionMunicipios.ajax.php",
		method:"POST",
		data: datos, 
		cache: false,
		contentType: false,
		processData: false,
		async:false,
		success: function(respuesta)
		{  
			if(respuesta.includes("false"))
			{
			   returnValue =  "No existe";
			}else
			{
			  
				Swal.fire({
					position: 'top-end',
					icon: 'error',
					toast: true,
					title: 'El registro ya existe ',
					showConfirmButton: false,
					timerProgressBar: true,
					timer: 1500
				})
				returnValue =  "Existe";
			}

		}                 

	})

	return returnValue;
}
/*------------------------------------------Finaliza el Espacio de agregar estados----------------------------------*/

/*------------------------------------------Inicia el Espacio de eliminar----------------------------------*/
/*----------------------------------------------------------------------------------------------------------*/
function eliminarMunicipio(id,nombreMunicipioDelete){
	Swal.fire({
		title: 'Eliminar',
		text: "\u00bfSeguro que desea eliminar el municipio?",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: 'red',
		cancelButtonText: 'Cancelar',
		cancelButtonColor: 'gray',
		confirmButtonText: 'Eliminar'
	}).then((result) => {
		if (result.isConfirmed){
			eliminaMunicipio(id,nombreMunicipioDelete);
			consultarAllMunicipios();
		}
	})
}
//------------------Funcion que elimina un tipo de usuario-----
 function eliminaMunicipio(id,nombreMunicipioDelete)
 {
 	var datos = new FormData();

 	datos.append("idMunicipioDelete", id);
	datos.append("nombreMunicipioDelete", nombreMunicipioDelete);
 	$.ajax({
 		url:rutaOculta+"ajax/administracionMunicipios.ajax.php",
 		method:"POST",
 		data: datos, 
 		cache: false,
 		contentType: false,
 		processData: false,
 		async:false,
 		success: function(respuesta)
 		{
 			if(!respuesta.includes("ok") && !respuesta.includes("relacionado"))
 			{
 				Swal.fire({
 					title: 'Error',
 					text: 'Error al eliminar el municipio',
 					icon: 'error',
 					showCloseButton: true,
 					confirmButtonText:'Aceptar'
 				}); 

 			}else if(respuesta.includes("relacionado")){
			   mensajeError('No se puede eliminar el municipio, se encuentra con ciudades asociadas');
			}else
 			{
 				Swal.fire({
 					title: 'Municipio Eliminado',
 					icon: 'success',
 					showCloseButton: true,
 					confirmButtonText:'Aceptar'
 				});
 			}

 		}                 

 	})
 }
/*------------------------------------------Finaliza el Espacio de eliminar----------------------------------*/



/*------------------------------------------Inicia el Espacio de Editar estados----------------------------------*/
/*----------------------------------------------------------------------------------------------------------*/

function mostrarModalEditMunicipio(idMunicipio,nombreMunicipio,capitalMunicipio,idEstado)
{
	
	
	$("#editMunicipios").modal("show");

	$("#nameMunicipioEdit").attr('value', nombreMunicipio);
	$("#capitalMunicipioEdit").attr('value', capitalMunicipio);
	document.getElementById("estadoSelectValueEdit").value = idEstado;
	
	$("#editarMunicipioValue").click(function(){
	
	        var existeInTable = validarRegistroExistenteMunicipio($("#nameMunicipioEdit").val(),$("#capitalMunicipioEdit").val(),$("#estadoSelectValueEdit").val());
			
		if(existeInTable == "No existe"){
			    modificarMunicipioFinal(idMunicipio,$("#nameMunicipioEdit").val(),$("#capitalMunicipioEdit").val(),$("#estadoSelectValueEdit").val());
		}
		    
	})
	 
}


function modificarMunicipioFinal(idPaisidMunicipio,nombreMunicipio,capitalMunicipio,idEstado)
 {
		
  		if (nombreMunicipio == "") 
 			{
 				Swal.fire({
 					position: 'top-end',
 					icon: 'error',
 					toast: true,
 					title: 'El campo esta vacio',
 					showConfirmButton: false,
 					timerProgressBar: true,
 					timer: 1500
 				})
 				return false;
 			}
 			if (!expresiones.nombre.test(nombreMunicipio)) 
 			{
 				Swal.fire({
 					position: 'top-end',
 					icon: 'error',
 					toast: true,
 					title: 'Ingrese un nombre v??lido',
 					showConfirmButton: false,
 					timerProgressBar: true,
 					timer: 1500
 				})
 				return false;
 			}
			if (capitalMunicipio == "") 
 			{
 				Swal.fire({
 					position: 'top-end',
 					icon: 'error',
 					toast: true,
 					title: 'El campo esta vacio',
 					showConfirmButton: false,
 					timerProgressBar: true,
 					timer: 1500
 				})
 				return false;
 			}
 			if (!expresiones.nombre.test(capitalMunicipio)) 
 			{
 				Swal.fire({
 					position: 'top-end',
 					icon: 'error',
 					toast: true,
 					title: 'Ingrese una capital v??lida',
 					showConfirmButton: false,
 					timerProgressBar: true,
 					timer: 1500
 				})
 				return false;
 			}

 			
			modificarMunicipioValue(idPaisidMunicipio,nombreMunicipio,capitalMunicipio,idEstado);
			consultarAllMunicipios(); 			

 			return true;
 	}


function modificarMunicipioValue(idMunicipio,nombreMunicipio,capitalMunicipio,idEstado)
 {
 	var datos = new FormData();
	datos.append("idMunicipioEdit", idMunicipio);
 	datos.append("nombreMunicipioEdit", nombreMunicipio);
	datos.append("capitalMunicipioEdit", capitalMunicipio);
	datos.append("idEstadoEdit", idEstado);


 	$.ajax({
 		url:rutaOculta+"ajax/administracionMunicipios.ajax.php",
 		method:"POST",
 		data: datos, 
 		cache: false,
 		contentType: false,
 		processData: false,
 		async:false,
 		success: function(respuesta)
 		{  		    
 			if(!respuesta.includes("ok"))
 			{
 				Swal.fire({
 					title: 'Error',
 					text: 'Error al modificar el municipio ',
 					icon: 'error',
 					showCloseButton: true,
 					confirmButtonText:'Aceptar'
 				}); 

 			}else
 			{
 				Swal.fire({
 					title: 'Municipio Modificado',
 					icon: 'success',
 					showCloseButton: true,
 					confirmButtonText:'Aceptar'
 				}).then((result) => 
				{
					if (result.isConfirmed)
					{
						$("#nameMunicipioEdit").attr('value',null);
						$("#capitalMunicipioEdit").attr('value',null);
						$("#editMunicipios").modal("hide");
						location.reload();
					}
				})
 			}

 		}                 

 	})
 }

/*------------------------------------------Finaliza el Espacio de Editar tipo de usuario----------------------------------*/

/*----Empieza el espacio de Registrar Surcursal------*/


