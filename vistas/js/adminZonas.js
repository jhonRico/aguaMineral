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

					plantilla2 +='                      <h3 class="div-pais p-3 rounded">'+res2.descripcion+'<a href="javascript:eliminarZonas('+res2.idZonas+')" class=""><button class="btn eliminarPais eliminar text-danger" type="button"><i class="fas fa-trash-alt"></i></button></a><a href="javascript:mostrarModalEditZonas('+res2.idZonas+','+aux+');" class=""><button class="btn eliminarPais eliminar text-primary" type="button"><i class="fas fa-pencil-alt"></i></button></a></h3>'

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
/*------------------------------------------Inicia el Espacio de agregar zonas----------------------------------*/
/*----------------------------------------------------------------------------------------------------------------*/

$(function(){
	$(".mostrarModalAddZonas").click(function(){
		$("#moddaddzonas").modal("show");
	})
})
//cerrar modal agregar

$(function(){
	$(".cerrar").click(function(){
		$("#nameZona").val('');
		$("#moddaddzonas").modal("hide");
	})
})

$(function(){
	$("#agregarZonaBtn").click(function(){

		var descripcion = $("#nameZona").val();
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
 			
			validarRegistro();

			return true;
		})
	})

function validarRegistro()
{
	var nombre = $("#nameZona").val();
	var ejecutar = validarRegistroExistenteZona(nombre);
	if(ejecutar == "No existe"){
	     registrarCampoZonas(nombre);
		 consultarAllZonas();	
	}

}
/*Funcion Ajax que registra la zona en BD*/
function registrarCampoZonas(valor)
{
	var datos = new FormData();

	datos.append("descripcionZonaValue", valor);

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
					text: 'Error al registrar',
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
						$("#nameZona").val('');
						$("#moddaddzonas").modal("hide");
					}

				})
			}

		}                 

	})
}
//Funcion Ajax que valida existente en BD 

function validarRegistroExistenteZona(valor)
{
	var datos = new FormData();
	var returnValue = "Existe";
	datos.append("validaExisteZonaInBd", valor);

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
			if(respuesta.includes("false"))
			{
			   returnValue =  "No existe";
			}else
			{
			  
				Swal.fire({
					position: 'top-end',
					icon: 'error',
					toast: true,
					title: 'El registro ya existe',
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
function validarRegistroExistenteZonaTwo(valor)
{
	var datos = new FormData();
	var returnValue = "Existe";
	datos.append("validaExisteZonaInBd", valor);

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
/*------------------------------------------Finaliza el Espacio de agregar zonas----------------------------------*/

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
	document.getElementById("nameZonaId").value = descripcion;
	$("#editZonas").modal("show");
	
	
	$("#editarZonaValue").click(function(){
	        var existeInTable = validarRegistroExistenteZonaTwo($("#nameZonaId").val());
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
						
						document.getElementById("nameZonaId").value = null;
						$("#editZonas").modal("hide");
						location.reload();

					}
				})
 			}

 		}                 

 	})
 }

/*------------------------------------------Finaliza el Espacio de Editar tipo de usuario----------------------------------*/