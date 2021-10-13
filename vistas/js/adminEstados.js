/*------Cuando carga la pagina, consulta los  registrados de zonas*/
$(document).ready(function(){ 
	rutaActual = window.location.toString();
	if(rutaActual.includes("adminEstado")){   		
		consultarAllEstados();
	}
});
/*------------------------------------------Inicia el Espacio de consultar zonas----------------------------------*/
/*----------------------------------------------------------------------------------------------------------------*/
function consultarAllEstados(){

		
	var datos = new FormData();
	datos.append("parametroNeutro", "nulo");
	let plantilla2 = " ";
	let obj
	$.ajax({
		url:"//localhost/aguaMineral/ajax/administracionEstados.ajax.php",
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
					var aux = "'"+res2.nombreEstado+"'";
					plantilla2 +='<div class="p-2">'

					plantilla2 +='                      <h3 class="div-pais p-3 rounded">'+res2.nombreEstado+'<a href="javascript:eliminarEstados('+res2.idEstado+')" class=""><button class="btn eliminarPais eliminar text-danger" type="button"><i class="fas fa-trash-alt"></i></button></a><a href="javascript:mostrarModalEditEstados('+res2.idEstado+','+aux+','+res2.Pais_idPais+');" class=""><button class="btn eliminarPais eliminar text-primary" type="button"><i class="fas fa-pencil-alt"></i></button></a></h3>'

					plantilla2 +='   </div>'

				}
				plantilla2 +='</div>'
				$("#verEstados").html(plantilla2);  
				$('#verEstados').show();
			}else{
				$("#verEstados").hide(); 
					
			}
			

		}
	})
}
/*------------------------------------------Inicia el Espacio de agregar Estados----------------------------------*/
/*----------------------------------------------------------------------------------------------------------------*/

$(function(){
	$(".mostrarModalAddEstados").click(function(){
		$("#moddaddestado").modal("show");
	})
})
//cerrar modal agregar

$(function(){
	$(".cerrar").click(function(){
		$("#nameEstado").val('');
		$("#moddaddestado").modal("hide");
	})
})

$(function(){
	$("#agregarEstadoBtn").click(function(){

		var descripcion = $("#nameEstado").val();
		var idPaisValue = $("#paisSelect").val();
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
 			
			validarRegistroEstado();

			return true;
		})
	})

function validarRegistroEstado()
{
	var nombre = $("#nameEstado").val();			
	var idPaisValue = $("#paisSelect").val();

	var ejecutar = validarRegistroExistenteEstado(nombre,idPaisValue);
	if(ejecutar == "No existe"){
	     registrarCampoEstados(nombre,idPaisValue);
		 consultarAllEstados();	
	}

}
/*Funcion Ajax que registra el estado en BD*/
function registrarCampoEstados(valor,idPaisValue)
{
	var datos = new FormData();

	datos.append("nombreEstadoAdd", valor);
	datos.append("idPaisValue", idPaisValue);
	$.ajax({
		url:"//localhost/aguaMineral/ajax/administracionEstados.ajax.php",
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
						$("#nameEstado").val('');
						$("#moddaddestado").modal("hide");
					}

				})
			}

		}                 

	})
}
//Funcion Ajax que valida existente en BD 

function validarRegistroExistenteEstado(valor,idPaisValue)
{
	var datos = new FormData();
	var returnValue = "Existe";
	datos.append("validaExisteEstadoInBd", valor);
	datos.append("idPaisValue", idPaisValue);

	$.ajax({
		url:"//localhost/aguaMineral/ajax/administracionEstados.ajax.php",
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
function eliminarEstados(id){
	Swal.fire({
		title: 'Eliminar',
		text: "¿Seguro que desea eliminar el estado?",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: 'red',
		cancelButtonColor: 'gray',
		confirmButtonText: 'Eliminar'
	}).then((result) => {
		if (result.isConfirmed){
			eliminarEstado(id);
			consultarAllEstados();
		}
	})
}
//------------------Funcion que elimina un tipo de usuario-----
 function eliminarEstado(id)
 {
 	var datos = new FormData();

 	datos.append("idEstadoDelete", id);
 	$.ajax({
 		url:"//localhost/aguaMineral/ajax/administracionEstados.ajax.php",
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
 					text: 'Error al eliminar el estado',
 					icon: 'error',
 					showCloseButton: true,
 					confirmButtonText:'Aceptar'
 				}); 

 			}else
 			{
 				Swal.fire({
 					title: 'Estado Eliminada',
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

function mostrarModalEditEstados(id, descripcion, idPais)
{
	
	
	$("#editEstados").modal("show");
	$("#nameEstadoIdEdit").attr('value', descripcion);
	document.getElementById("paisSelectEdit").value = idPais;
	
	$("#editarEstadoValue").click(function(){
	
	        var existeInTable = validarRegistroExistenteEstado($("#nameEstadoIdEdit").val(),$("#paisSelectEdit").val());
			if(existeInTable == "No existe"){
			    modificarEstadoFinal(id, $("#nameEstadoIdEdit").val(), $("#paisSelectEdit").val());
			}
		    
	})
	 
}


function modificarEstadoFinal(id, descripcion, idPais)
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

 			
			modificarEstadoValue(id,descripcion,idPais);
			consultarAllEstados(); 			

 			return true;
 	}


function modificarEstadoValue(id,descripcion,idPais)
 {
 	var datos = new FormData();
	datos.append("idEstadoModificado", id);
 	datos.append("descripcion", descripcion);
	datos.append("idEstadoUpdated", idPais);


 	$.ajax({
 		url:"//localhost/aguaMineral/ajax/administracionEstados.ajax.php",
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
 					text: 'Error al modificar el estado ',
 					icon: 'error',
 					showCloseButton: true,
 					confirmButtonText:'Aceptar'
 				}); 

 			}else
 			{
 				Swal.fire({
 					title: 'Estado Modificado',
 					icon: 'success',
 					showCloseButton: true,
 					confirmButtonText:'Aceptar'
 				}).then((result) => 
				{
					if (result.isConfirmed)
					{
						$("#nameEstadoIdEdit").attr('value',null);
						$("#editEstados").modal("hide");

					}
				})
 			}

 		}                 

 	})
 }

/*------------------------------------------Finaliza el Espacio de Editar tipo de usuario----------------------------------*/