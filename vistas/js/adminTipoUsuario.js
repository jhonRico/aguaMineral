/*------Cuando carga la pagina, consulta los  registrados*/
$(document).ready(function(){ 
	rutaActual = window.location.toString();
	if(rutaActual.includes("adminTipoUsuario")){   
		
		consultarTodosTU();

	}
});
/*consulta todos*/

function consultarTodosTU(){

		
	var datos = new FormData();
	datos.append("tiposusu", "nulo");

	let plantilla2 = " ";
	let obj
	$.ajax({
		url:"//localhost/aguaMineral/ajax/registroAdminTU.ajax.php",
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

					plantilla2 +='                      <h3 class="div-pais p-3 rounded">'+res2.descripcion+'<a href="javascript:eliminarTipoUser('+res2.idTipoUsuario+')" class=""><button class="btn eliminarPais eliminar text-danger" type="button"><i class="fas fa-trash-alt"></i></button></a><a href="javascript:mostrarModalEditTipUser('+res2.idTipoUsuario+','+aux+');" class=""><button class="btn eliminarPais eliminar text-primary" type="button"><i class="fas fa-pencil-alt"></i></button></a></h3>'

					plantilla2 +='   </div>'

				}
				plantilla2 +='</div>'
				$("#respuestaCons1").html(plantilla2);  
				$('#respuestaCons1').show();
			}else{
				$("#respuestaCons1").hide(); 
					
			}
			

		}
	})
}
//Mostramos el modal agregar

$(function(){
	$(".mostrarModal").click(function(){
		$("#moddaddTU").modal("show");
	})
})
//cerrar modal agregar

$(function(){
	$(".cerrar").click(function(){
		$("#nameTU").val('');
		$("#moddaddTU").modal("hide");
	})
})
//Validar Registro

$(function(){
	$("#agregarTU").click(function(){

		var descripcion = $("#nameTU").val();
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
 			
			validarRegistroTipUsu();

			return true;
		})
	})

//Capturar valor del campo de texto de agregar 

function validarRegistroTipUsu()
{ 
	var nombre = $("#nameTU").val();
	var ejecutar = validarRegistroExistenteTipUser(nombre);
	if(ejecutar == "No existe"){
	     registrarCampoTipUser(nombre);
		 consultarTodosTU();	
	}

}
//Funcion Ajax que valida existente en BD 

function validarRegistroExistenteTipUser(valor)
{
	var datos = new FormData();
	var returnValue = "Existe";
	datos.append("validaExisteTipUsuInBd", valor);

	$.ajax({
		url:"//localhost/aguaMineral/ajax/registroAdminTU.ajax.php",
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

/*Funcion Ajax que registra el tipo de usuario en BD*/
function registrarCampoTipUser(valor)
{
	var datos = new FormData();

	datos.append("descripcionTipUserValue", valor);

	$.ajax({
		url:"//localhost/aguaMineral/ajax/registroAdminTU.ajax.php",
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
						$("#nameTU").val('');
						$("#moddaddTU").modal("hide");
					}

				})
			}

		}                 

	})
}

/*------------------------------------------Inicia el Espacio de eliminar----------------------------------*/
/*----------------------------------------------------------------------------------------------------------*/
function eliminarTipoUser(id){
	Swal.fire({
		title: 'Eliminar',
		text: "\u00bfSeguro que desea eliminar este tipo de usuario?",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: 'red',
		cancelButtonColor: 'gray',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Eliminar'
	}).then((result) => {
		if (result.isConfirmed){
			eliminarTipUser(id);
			consultarTodosTU();
		}
	})
}
//------------------Funcion que elimina un tipo de usuario-----
 function eliminarTipUser(id)
 {
 	var datos = new FormData();

 	datos.append("idTipUser", id);
 	$.ajax({
 		url:"//localhost/aguaMineral/ajax/registroAdminTU.ajax.php",
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
 					text: 'Error al eliminar tipo de usuario',
 					icon: 'error',
 					showCloseButton: true,
 					confirmButtonText:'Aceptar'
 				}); 

 			}else
 			{
 				Swal.fire({
 					title: 'Tipo de usuario eliminado',
 					icon: 'success',
 					showCloseButton: true,
 					confirmButtonText:'Aceptar'
 				});
 			}

 		}                 

 	})
 }
/*------------------------------------------Finaliza el Espacio de eliminar----------------------------------*/

/*------------------------------------------Inicia el Espacio de Editar tipo de usuario----------------------------------*/
/*----------------------------------------------------------------------------------------------------------*/

function mostrarModalEditTipUser(id, descripcion)
{
	idTipUser = id;
	$("#editTipUser").modal("show");
	$("#nameTipUserId").attr('value', descripcion);
	$("#editarTipUser").click(function(){
	        var existeInTable = validarRegistroExistenteTipUser($("#nameTipUserId").val());
			if(existeInTable == "No existe"){
			    modificarTipUser(idTipUser);
			}
		    
	})
	 
}


function modificarTipUser(id)
 {
		var descripcion = $("#nameTipUserId").val();
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
 					title: 'Ingrese un Tipo de Usuario válido',
 					showConfirmButton: false,
 					timerProgressBar: true,
 					timer: 1500
 				})
 				return false;
 			}

 			var descripcion = $("#nameTipUserId").val();
			modificarTipUserValue(id,descripcion);
			consultarTodosTU(); 			

 			return true;
 	}


function modificarTipUserValue(id,descripcion)
 {
 	var datos = new FormData();

 	datos.append("idTipUserModificado", id);
 	datos.append("descripcion", descripcion);


 	$.ajax({
 		url:"//localhost/aguaMineral/ajax/registroAdminTU.ajax.php",
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
 					text: 'Error al modificar Tipo de usuario ',
 					icon: 'error',
 					showCloseButton: true,
 					confirmButtonText:'Aceptar'
 				}); 

 			}else
 			{
 				Swal.fire({
 					title: 'Tipo de usuario Modificado',
 					icon: 'success',
 					showCloseButton: true,
 					confirmButtonText:'Aceptar'
 				}).then((result) => 
				{
					if (result.isConfirmed)
					{
						$("#nameTipUserId").attr('value', null);
						$("#editTipUser").modal("hide");
						location.reload();
					}
				})
 			}

 		}                 

 	})
 }

/*------------------------------------------Finaliza el Espacio de Editar tipo de usuario----------------------------------*/