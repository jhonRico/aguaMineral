/*------Cuando carga la pagina, consulta los  registrados de ciudades*/
$(document).ready(function(){ 
	rutaActual = window.location.toString();
	if(rutaActual.includes("adminCiudad")){   		
		consultarAllCiudades();
	}
});
/*------------------------------------------Inicia el Espacio de consultar ciudades----------------------------------*/
/*----------------------------------------------------------------------------------------------------------------*/
function consultarAllCiudades(){

		
	var datos = new FormData();
	datos.append("parametroNeutro", "nulo");
	let plantilla2 = " ";
	let obj
	$.ajax({
		url:"//localhost/aguaMineral/ajax/administracionCiudad.ajax.php",
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
					var aux = "'"+res2.nombreCiudad+"'";
					plantilla2 +='<div class="p-2">'

					plantilla2 +='                      <h3 class="div-pais p-3 rounded">'+res2.nombreCiudad+'<a href="javascript:eliminarCiudad('+res2.idCiudad+')" class=""><button class="btn eliminarPais eliminar text-danger" type="button"><i class="fas fa-trash-alt"></i></button></a><a href="javascript:mostrarModalEditCiudad('+res2.idCiudad+','+aux+','+res2.Municipio_idMunicipio+');" class=""><button class="btn eliminarPais eliminar text-primary" type="button"><i class="fas fa-pencil-alt"></i></button></a></h3>'

					plantilla2 +='   </div>'

				}
				plantilla2 +='</div>'
				$("#verCiudades").html(plantilla2);  
				$('#verCiudades').show();
			}else{
				$("#verCiudades").hide(); 
					
			}
			

		}
	})
}
/*------------------------------------------Inicia el Espacio de agregar Ciudades----------------------------------*/
/*----------------------------------------------------------------------------------------------------------------*/

$(function(){
	$(".mostrarModalAddCiudad").click(function(){
		$("#moddaddciudad").modal("show");
	})
})
//cerrar modal agregar

$(function(){
	$(".cerrar").click(function(){
		$("#nameCiudad").val('');
		$("#moddaddciudad").modal("hide");
	})
})

$(function(){
	$("#agregarCiudadBtn").click(function(){

		var descripcion = $("#nameCiudad").val();
		var idMunicipioValue = $("#municipioAddSelect").val();
			if (descripcion == "") 
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
 			if (!expresiones.nombre.test(descripcion)) 
 			{
 				Swal.fire({
 					position: 'top-end',
 					icon: 'error',
 					toast: true,
 					title: 'Ingrese un valor valido',
 					showConfirmButton: false,
 					timerProgressBar: true,
 					timer: 1500
 				})
 				return false;
 			}
 			
			validarRegistroCiudad();

			return true;
		})
	})

function validarRegistroCiudad()
{
		var ciudad = $("#nameCiudad").val();
		var idMunicipioValue = $("#municipioAddSelect").val();

	var ejecutar = validarRegistroExistenteCiudad(ciudad,idMunicipioValue);
	if(ejecutar == "No existe"){
	     registrarCampoCiudad(ciudad,idMunicipioValue);
		 consultarAllCiudades();	
	}

}
/*Funcion Ajax que registra el ciudad en BD*/
function registrarCampoCiudad(valor,idMunicipioValue)
{
	var datos = new FormData();

	datos.append("nombreciudadAdd", valor);
	datos.append("idMunicipioValue", idMunicipioValue);
	$.ajax({
		url:"//localhost/aguaMineral/ajax/administracionCiudad.ajax.php",
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
					text: 'Error al registrar ',
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
						$("#nameCiudad").val('');
						$("#moddaddciudad").modal("hide");
					}

				})
			}

		}                 

	})
}
//Funcion Ajax que valida existente en BD 

function validarRegistroExistenteCiudad(ciudad,idMunicipioValue)
{
    
	var datos = new FormData();
	var returnValue = "Existe";
	datos.append("ciudad", ciudad);
	datos.append("idMunicipioValue", idMunicipioValue);

	$.ajax({
		url:"//localhost/aguaMineral/ajax/administracionCiudad.ajax.php",
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
function eliminarCiudad(id){
	Swal.fire({
		title: 'Eliminar',
		text: "¿Seguro que desea eliminar la ciudad?",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: 'red',
		cancelButtonColor: 'gray',
		confirmButtonText: 'Eliminar'
	}).then((result) => {
		if (result.isConfirmed){
			eliminarCiudadFinal(id);
			consultarAllCiudades();
		}
	})
}
//------------------Funcion que elimina un tipo de usuario-----
 function eliminarCiudadFinal(id)
 {
 	var datos = new FormData();

 	datos.append("idCiudadDelete", id);
 	$.ajax({
 		url:"//localhost/aguaMineral/ajax/administracionCiudad.ajax.php",
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
 					text: 'Error al eliminar la ciudad',
 					icon: 'error',
 					showCloseButton: true,
 					confirmButtonText:'Aceptar'
 				}); 

 			}else
 			{
 				Swal.fire({
 					title: 'Ciudad Eliminada',
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

function mostrarModalEditCiudad(idCiudadUpdate, nombreCiudadUpdate, idMunicipioUpdate)
{
	
	
	$("#editCiudad").modal("show");
	$("#nameCiudadIdEdit").attr('value', nombreCiudadUpdate);
	document.getElementById("MunicipioSelectEdit").value = idMunicipioUpdate;
	
	$("#editarCiudadValue").click(function(){
	
	        var existeInTable = validarRegistroExistenteCiudad($("#nameCiudadIdEdit").val(),$("#MunicipioSelectEdit").val());
			
			if(existeInTable == "No existe"){
			    modificarCiudadFinal(idCiudadUpdate, $("#nameCiudadIdEdit").val(), $("#MunicipioSelectEdit").val());
			}
		    
	})
	 
}


function modificarCiudadFinal(id, descripcion, idPais)
 {
		
  		if (descripcion == "") 
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
 			if (!expresiones.nombre.test(descripcion)) 
 			{
 				Swal.fire({
 					position: 'top-end',
 					icon: 'error',
 					toast: true,
 					title: 'Ingrese una zona válida',
 					showConfirmButton: false,
 					timerProgressBar: true,
 					timer: 1500
 				})
 				return false;
 			}

 			
			modificarCiudadValue(id,descripcion,idPais);
			consultarAllCiudades(); 			

 			return true;
 	}


function modificarCiudadValue(id,descripcion,idPais)
 {
 	var datos = new FormData();
	datos.append("idCiudadModificado", id);
 	datos.append("descripcion", descripcion);
	datos.append("idMunicipioUpdated", idPais);


 	$.ajax({
 		url:"//localhost/aguaMineral/ajax/administracionCiudad.ajax.php",
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
 					text: 'Error al modificar la ciudad ',
 					icon: 'error',
 					showCloseButton: true,
 					confirmButtonText:'Aceptar'
 				}); 

 			}else
 			{
 				Swal.fire({
 					title: 'Ciudad Modificado',
 					icon: 'success',
 					showCloseButton: true,
 					confirmButtonText:'Aceptar'
 				}).then((result) => 
				{
					if (result.isConfirmed)
					{
						$("#nameCiudadIdEdit").attr('value',null);
						$("#editCiudad").modal("hide");

					}
				})
 			}

 		}                 

 	})
 }

/*------------------------------------------Finaliza el Espacio de Editar tipo de usuario----------------------------------*/