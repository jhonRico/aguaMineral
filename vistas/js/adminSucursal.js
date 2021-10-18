/*------Cuando carga la pagina, consulta los  registrados de Municipios*/
$(document).ready(function(){ 
	rutaActual = window.location.toString();
	if(rutaActual.includes("adminSucursal")){   		
		consultarAllSucursal();
	}

});
/*------------------------------------------Inicia el Espacio de consultar Municipios----------------------------------*/
/*----------------------------------------------------------------------------------------------------------------*/
function consultarAllSucursal(){

		
	var datos = new FormData();
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
					var aux1 = "'"+res2.nombreSucursal+"'";
					plantilla2 +='<div class="p-2">'

					plantilla2 +='                      <h3 class="div-pais p-3 rounded">'+res2.nombreSucursal+'<a href="javascript:eliminarMunicipio('+res2.idSucursal +')" class=""><button class="btn eliminarPais eliminar text-danger" type="button"><i class="fas fa-trash-alt"></i></button></a><a href="javascript:mostrarModalEditMunicipio('+res2.idMunicipio+','+aux+','+aux1+','+res2.Estado_idEstado+');" class=""><button class="btn eliminarPais eliminar text-primary" type="button"><i class="fas fa-pencil-alt"></i></button></a></h3>'

					plantilla2 +='   </div>'

				}
				plantilla2 +='</div>'
				$("#verSucursal").html(plantilla2);  
				$('#verSucursal').show();
			}else{
				$("#verSucursal").hide(); 
					
			}
			

		}
	})
}


/*------------------------------------------Inicia el Espacio de agregar municipio----------------------------------*/
/*----------------------------------------------------------------------------------------------------------------*/

$(function(){
	$(".agregarSucursalBtn").click(function(){
		$("#moddAddSucursal").modal("show");
	})
})
//cerrar modal agregar

$(function(){
	$(".cerrar").click(function(){
		$("#sucursalAdd").val('');
		$("#direccionAdd").val('');
		$("#moddAddSucursal").modal("hide");
	})
})

$(function(){
	$("#agregarMunicipioBtn").click(function(){

		var sucursal = $("#sucursalAdd").val();
		var direccion = $("#direccionAdd").val();
		
			if (sucursal == "") 
 			{
 				Swal.fire({
 					position: 'top-end',
 					icon: 'error',
 					toast: true,
 					title: 'El campo esta vacio sucursal',
 					showConfirmButton: false,
 					timerProgressBar: true,
 					timer: 1500
 				})
 				return false;
 			}
 			if (!expresiones.nombre.test(sucursal)) 
 			{
 				Swal.fire({
 					position: 'top-end',
 					icon: 'error',
 					toast: true,
 					title: 'Ingrese un valor valido en sucursal',
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
 					title: 'El campo esta vacio dereccion',
 					showConfirmButton: false,
 					timerProgressBar: true,
 					timer: 1500
 				})
 				return false;
 			}
 			
			validarRegistroSucursal();

			return true;
		})
	})

function validarRegistroSucursal()
{
		var sucursal = $("#sucursalAdd").val();
		var direccion = $("#direccionAdd").val();
		var idEstadoValue = $("#idSector").val();

	var ejecutar = validarRegistroExistenteSucursal(municipio,capital,idEstadoValue);
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
		url:"//localhost/aguaMineral/ajax/administracionMunicipios.ajax.php",
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

function validarRegistroExistenteSucursal(municipio,capital,idEstadoValue)
{
	var datos = new FormData();
	var returnValue = "Existe";
	datos.append("municipio", municipio);
	datos.append("idEstadoValue", idEstadoValue);
	datos.append("capital", capital);

	$.ajax({
		url:"//localhost/aguaMineral/ajax/administracionMunicipios.ajax.php",
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

function validarRegistroExistenteMunicipio(municipio,capital,idEstadoValue)
{
	var datos = new FormData();
	var returnValue = "Existe";
	datos.append("municipio", municipio);
	datos.append("idEstadoValue", idEstadoValue);
	datos.append("capital", capital);

	$.ajax({
		url:"//localhost/aguaMineral/ajax/administracionMunicipios.ajax.php",
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
