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

					plantilla2 +='                      <h3 class="div-pais p-3 rounded">'+res2.nombreEstado+'<a href="javascript:eliminarZonas('+res2.idEstado+')" class=""><button class="btn eliminarPais eliminar text-danger" type="button"><i class="fas fa-trash-alt"></i></button></a><a href="javascript:mostrarModalEditZonas('+res2.idEstado+','+aux+');" class=""><button class="btn eliminarPais eliminar text-primary" type="button"><i class="fas fa-pencil-alt"></i></button></a></h3>'

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

	datos.append("descripcionEstadoValue", valor);
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
			if(respuesta.includes("ok"))
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
function eliminarZonas(id){
	Swal.fire({
		title: 'Eliminar',
		text: "¿Seguro que desea eliminar la zona?",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: 'red',
		cancelButtonColor: 'gray',
		confirmButtonText: 'Eliminar'
	}).then((result) => {
		if (result.isConfirmed){
			eliminarZona(id);
			consultarAllZonas();
		}
	})
}
//------------------Funcion que elimina un tipo de usuario-----
 function eliminarZona(id)
 {
 	var datos = new FormData();

 	datos.append("idZona", id);
 	$.ajax({
 		url:"//localhost/aguaMineral/ajax/administracionZonas.ajax.php",
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
 					text: 'Error al eliminar la zona',
 					icon: 'error',
 					showCloseButton: true,
 					confirmButtonText:'Aceptar'
 				}); 

 			}else
 			{
 				Swal.fire({
 					title: 'Zona Eliminada',
 					icon: 'success',
 					showCloseButton: true,
 					confirmButtonText:'Aceptar'
 				});
 			}

 		}                 

 	})
 }
/*------------------------------------------Finaliza el Espacio de eliminar----------------------------------*/



/*------------------------------------------Inicia el Espacio de Editar zonas----------------------------------*/
/*----------------------------------------------------------------------------------------------------------*/

function mostrarModalEditZonas(id, descripcion)
{
	idTipUser = id;
	$("#editZonas").modal("show");
	$("#nameZonaId").attr('value', descripcion);
	$("#editarZonaValue").click(function(){
	        var existeInTable = validarRegistroExistenteZona($("#nameZonaId").val());
			if(existeInTable == "No existe"){
			    modificarZonasFinal(idTipUser);
			}
		    
	})
	 
}


function modificarZonasFinal(id)
 {
		var descripcion = $("#nameZonaId").val();
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

 			var descripcion = $("#nameZonaId").val();
			modificarZonaValue(id,descripcion);
			consultarAllZonas(); 			

 			return true;
 	}


function modificarZonaValue(id,descripcion)
 {
 	var datos = new FormData();

 	datos.append("idZonaModificado", id);
 	datos.append("descripcion", descripcion);


 	$.ajax({
 		url:"//localhost/aguaMineral/ajax/administracionZonas.ajax.php",
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
 					text: 'Error al modificar la zona ',
 					icon: 'error',
 					showCloseButton: true,
 					confirmButtonText:'Aceptar'
 				}); 

 			}else
 			{
 				Swal.fire({
 					title: 'Zona Modificada',
 					icon: 'success',
 					showCloseButton: true,
 					confirmButtonText:'Aceptar'
 				}).then((result) => 
				{
					if (result.isConfirmed)
					{
						$("#nameZonaId").attr('value',null);
						$("#editZonas").modal("hide");

					}
				})
 			}

 		}                 

 	})
 }

/*------------------------------------------Finaliza el Espacio de Editar tipo de usuario----------------------------------*/