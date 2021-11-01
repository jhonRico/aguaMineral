|/*------Cuando carga la pagina, consulta los  registrados de ciudades*/
$(document).ready(function(){ 
	rutaActual = window.location.toString();
	
	if(rutaActual.includes("adminSucursal")){ 
	alert("alerta");
	    //consultarAllSucursalesValue();		
	}
});
$(document).ready(function(){ 
	alert("Otro");
});
/*------------------------------------------Inicia el Espacio de consultar ciudades----------------------------------*/
/*----------------------------------------------------------------------------------------------------------------*/
function consultarAllSucursalesValue(){
alert("Entra");

/*	var datos = new FormData();
	datos.append("parametroNeutro", "nulo");
	let plantilla2 = " ";
	let obj
	$.ajax({
		url:"//localhost/aguaMineral/ajax/administracionSucursal.ajax.php",
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
					var aux = "'"+res2.nombreSucursal+"'";
					var aux2 = "'"+res2.direccionSucursal+"'";
					plantilla2 +='<div class="p-2">'

					plantilla2 +='                      <h3 class="div-pais p-3 rounded">'+res2.nombreSucursal+'<a href="javascript:eliminarSucursal('+res2.idSucursal+')" class=""><button class="btn eliminarPais eliminar text-danger" type="button"><i class="fas fa-trash-alt"></i></button></a><a href="javascript:mostrarModalEditSucursal('+res2.idSucursal+','+aux+','+aux2+');" class=""><button class="btn eliminarPais eliminar text-primary" type="button"><i class="fas fa-pencil-alt"></i></button></a></h3>'

					plantilla2 +='   </div>'

				}
				plantilla2 +='</div>'
				$("#verSucursal").html(plantilla2);  
				$('#verSucursal').show();
			}else{
				$("#verSucursal").hide(); 

			}
			

		}
	})*/
}
/*------------------------------------------Inicia el Espacio de agregar Ciudades----------------------------------*/
/*----------------------------------------------------------------------------------------------------------------*/

$(function(){
	$(".modalAddSucursal").click(function(){
		$("#moddAddSucursal").modal("show");
	})
})
//cerrar modal agregar

$(function(){
	$(".cerrar").click(function(){
		$("#sucursalAdd").val('');
		$("#moddAddSucursal").modal("hide");
	})
})

$(function(){
	$("#agregarSucursalBtn").click(function(){
	    
		var nameSucursal= $("#sucursalAdd").val();
		var direccion = $("#direccionAdd").val();
		if (nameSucursal == "") 
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
		if (!expresiones.nombre.test(nameSucursal)) 
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

		if (direccion == "") 
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
		
		validarRegistroSucursal(nameSucursal,direccion);

		return true;
	})
})

function validarRegistroSucursal(nameSucursal,direccion){

	var ejecutar = validarRegistroExistenteSucursal(nameSucursal,direccion);
	
	if(ejecutar == "No existe"){
		registrarCampoSucursal(nameSucursal,direccion);
		consultarAllSucursalesValue();	
	}

}
/*Funcion Ajax que registra el ciudad en BD*/
function registrarCampoSucursal(nameSucursal,direccion)
{
	var datos = new FormData();

	datos.append("nombreSucursalAdd", nameSucursal);
	datos.append("direccionAdd", direccion);
	$.ajax({
		url:"//localhost/aguaMineral/ajax/administracionSucursal.ajax.php",
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
						$("#sucursalAdd").val('');
						$("#direccionAdd").val('');
						$("#moddAddSucursal").modal("hide");
					}

				})
			}

		}                 

	})
}
//Funcion Ajax que valida existente en BD 

function validarRegistroExistenteSucursal(nameSucursal,direccion)
{

	var datos = new FormData();
	var returnValue = "Existe";
	datos.append("nameSucursal", nameSucursal);
	datos.append("direccion", direccion);

	$.ajax({
		url:"//localhost/aguaMineral/ajax/administracionSucursal.ajax.php",
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
function eliminarSucursal(id){
	Swal.fire({
		title: 'Eliminar',
		text: "\u00bfSeguro que desea eliminar la sucursal?",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: 'red',
		cancelButtonColor: 'gray',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Eliminar'
	}).then((result) => {
		if (result.isConfirmed){
			eliminarSucursalFinal(id);
			consultarAllSucursalesValue();
		}
	})
}
//------------------Funcion que elimina un tipo de usuario-----
function eliminarSucursalFinal(id)
{
	var datos = new FormData();
	//alert(nombreDeleteSucursal);
	datos.append("idSucursalDelete", id);
	
	$.ajax({
		url:"//localhost/aguaMineral/ajax/administracionSucursal.ajax.php",
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
				mensajeError('Error al eliminar la sucursal');
			}else if(respuesta.includes("relacionado")){
			   mensajeError('No se puede eliminar la sucursal, se encuentra con contratos asociados');
			}else
			{
				Swal.fire({
					title: 'Sucursal eliminada',
					icon: 'success',
					showCloseButton: true,
					confirmButtonText:'Aceptar'
				});
			}

		}                 

	})
}

 //----------------Funcion para mensaje de alerta de error
 function mensajeError(mensaje){ 
  	Swal.fire({
 		title: 'Error',
 		text: mensaje,
 		icon: 'error',
 		showCloseButton: true,
 		confirmButtonText:'Aceptar'
 	}); 
 }
/*------------------------------------------Finaliza el Espacio de eliminar----------------------------------*/



/*------------------------------------------Inicia el Espacio de Editar estados----------------------------------*/
/*----------------------------------------------------------------------------------------------------------*/

function mostrarModalEditSucursal(idsucursal, nombreSucursalUpdate, direccionSucursalUpdate)
{
	
	
	$("#editSucursal").modal("show");
	$("#sucursalupdate").attr('value', nombreSucursalUpdate);
	$("#direccionUpdate").attr('value', direccionSucursalUpdate);
	//document.getElementById("MunicipioSelectEdit").value = idMunicipioUpdate;
	
	$("#editarSucursalValue").click(function(){

		var existeInTable = validarRegistroExistenteSucursal($("#sucursalupdate").val(),$("#direccionUpdate").val());
		if(existeInTable == "No existe"){
			modificarSucursalFinal(idsucursal, $("#sucursalupdate").val(), $("#direccionUpdate").val());
		}

	})

}


function modificarSucursalFinal(id, sucursalupdate, direccionUpdate)
{

	if (sucursalupdate == "") 
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
	if (!expresiones.nombre.test(sucursalupdate)) 
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
	if (direccionUpdate == "") 
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


	modificarSucursalValue(id, sucursalupdate, direccionUpdate);
	consultarAllSucursalesValue(); 			

	return true;
}


function modificarSucursalValue(id, sucursalupdate, direccionUpdate)
{
	var datos = new FormData();
	datos.append("idSucursalModificado", id);
	datos.append("sucursalupdate", sucursalupdate);
	datos.append("direccionUpdate", direccionUpdate);


	$.ajax({
		url:"//localhost/aguaMineral/ajax/administracionSucursal.ajax.php",
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
					text: 'Error al modificar la sucursal ',
					icon: 'error',
					showCloseButton: true,
					confirmButtonText:'Aceptar'
				}); 

			}else
			{
				Swal.fire({
					title: 'Sucursal Modificado',
					icon: 'success',
					showCloseButton: true,
					confirmButtonText:'Aceptar'
				}).then((result) => 
				{
					if (result.isConfirmed)
					{
						$("#sucursalupdate").attr('value',null);
						$("#direccionUpdate").attr('value',null);
						$("#editSucursal").modal("hide");
						location.reload();
					}
				})
			}

		}                 

	})
}

/*------------------------------------------Finaliza el Espacio de Editar tipo de usuario----------------------------------*/


