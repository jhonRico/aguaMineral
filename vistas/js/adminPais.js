/*------Cuando carga la pagina de pais consulta los paises registrados*/
$(document).ready(function(){ 
	rutaActual = window.location.toString();
	if(rutaActual.includes("adminPais")){   
		consultarTodosPaises();

	}
});

//Mostramos el modal agregar

$(function(){
	$(".mostrarModal").click(function(){
		$("#moddaddCountry").modal("show");
	})
})

//Mostrar el modal editar
function mostrarModal(id, descripcion)
{

		$("#namePais2").attr('value',descripcion);
		$("#editCountry").modal("show");
		descripcion = $("#namePais2").val();
		$(function(){
		$("#editarPais").click(function(){
			 modificar(id);
		})
	}) 

}
//cerrar modal editar

$(function(){
	$(".cerrar").click(function(){
		$("#editCountry").modal("hide");
	})
})

//cerrar modal agregar

$(function(){
	$(".cerrar").click(function(){
		$("#moddaddCountry").modal("hide");
	})
})

//Funciones de Ajax

/*consulta todos los paises*/

function consultarTodosPaises(){

	var datos = new FormData();
	datos.append("paises", "nulo");

	let plantilla2 = " ";
	let obj
	$.ajax({
		url:"//localhost/aguaMineral/ajax/registroAdmin.ajax.php",
		method:"POST",
		data: datos, 
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta3){
			if(respuesta3){
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

					plantilla2 +='                      <h3 class="div-pais p-3 rounded">'+res2.descripcion+'<a href="javascript:eliminar('+res2.idPais+')" class=""><button class="btn eliminarPais eliminar text-danger"><i class="fas fa-trash-alt"></i></button></a><a href="javascript:mostrarModal('+res2.idPais+','+aux+');" class=""><button class="btn eliminarPais eliminar text-primary"><i class="fas fa-pencil-alt"></i></button></a></h3>'

					plantilla2 +='   </div>'

				}
				plantilla2 +='</div>'
				$("#respuestaCons").html(plantilla2);  
				$('#respuestaCons').show();
			}

		}
	})
}
/*Funcion Ajax que registrar el pais*/
function registrarPais(valor)
{
	var datos = new FormData();

	datos.append("nombrePais", valor);

	$.ajax({
		url:"//localhost/aguaMineral/ajax/registroAdmin.ajax.php",
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
					text: 'Error al registrar pais',
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
						$("#moddaddCountry").modal("hide");
					}

				})
			}

		}                 

	})
}

/*Funcion de Ajax para eliminar Pais*/

 function eliminarPais(id)
 {
 	var datos = new FormData();

 	datos.append("idPais", id);

 	$.ajax({
 		url:"//localhost/aguaMineral/ajax/registroAdmin.ajax.php",
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
 					text: 'Error al eliminar pais',
 					icon: 'error',
 					showCloseButton: true,
 					confirmButtonText:'Aceptar'
 				}); 

 			}else
 			{
 				Swal.fire({
 					title: 'Pais Eliminado',
 					icon: 'success',
 					showCloseButton: true,
 					confirmButtonText:'Aceptar'
 				});
 			}

 		}                 

 	})
 }

 /*Funcion de Ajax que modifica el Pais*/

 function modificarPais(id,descripcion)
 {
 	var datos = new FormData();

 	datos.append("idPaisModificado", id);
 	datos.append("descripcion", descripcion);


 	$.ajax({
 		url:"//localhost/aguaMineral/ajax/registroAdmin.ajax.php",
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
 					text: 'Error al modificar pais',
 					icon: 'error',
 					showCloseButton: true,
 					confirmButtonText:'Aceptar'
 				}); 

 			}else
 			{

 				Swal.fire({
 					title: 'Pais Modificado',
 					icon: 'success',
 					showCloseButton: true,
 					confirmButtonText:'Aceptar'
 				}).then((result) => 
				{
					if (result.isConfirmed)
					{
						$("#editCountry").modal("hide");
					}
				})
 			}

 		}                 

 	})
 }

 function validarRegistroExistenteDeModificar(id, descripcion)
{
	var datos = new FormData();

	datos.append("registroPais", id);

	$.ajax({
		url:"//localhost/aguaMineral/ajax/registroAdmin.ajax.php",
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
				modificarPais(id,descripcion);
				consultarTodosPaises();
			}else
			{
				Swal.fire({
					position: 'top-end',
					icon: 'error',
					toast: true,
					title: 'El pais ya existe',
					showConfirmButton: false,
					timerProgressBar: true,
					timer: 1500
				})
			}

		}                 

	})
}
//Funcion Ajax que valida pais existente en BD 

function validarRegistroExistente(valor)
{
	var datos = new FormData();

	datos.append("registroPais", valor);

	$.ajax({
		url:"//localhost/aguaMineral/ajax/registroAdmin.ajax.php",
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
				registrarPais(valor);
				consultarTodosPaises();

			}else
			{
				Swal.fire({
					position: 'top-end',
					icon: 'error',
					toast: true,
					title: 'El pais ya existe',
					showConfirmButton: false,
					timerProgressBar: true,
					timer: 1500
				})
			}

		}                 

	})
}

//Funciones que validan Campos Vacios y expresiones regulares y que llaman a su respectiva funcion ajax

//Eliminar Pais

function eliminar(id){
	Swal.fire({
		title: 'Eliminar',
		text: "¿Seguro que desea eliminar este país?",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: 'red',
		cancelButtonColor: 'gray',
		confirmButtonText: 'Eliminar'
	}).then((result) => {
		if (result.isConfirmed){
			eliminarPais(id);
			consultarTodosPaises();
		}
	})
}

//Validar Modificacion de Pais
 
function modificar(id)
 {
			var descripcion = $("#namePais2").val();
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
 					title: 'Ingrese un pais valido',
 					showConfirmButton: false,
 					timerProgressBar: true,
 					timer: 1500
 				})
 				return false;
 			}
 			
 			validarModificacionPais(id);

 			return true;
 	}

//Validar Registro de Pais

$(function(){
	$("#agregarPais").click(function(){
		var descripcion = $("#namePais").val();
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
 					title: 'Ingrese un pais valido',
 					showConfirmButton: false,
 					timerProgressBar: true,
 					timer: 1500
 				})
 				return false;
 			}
 			
			validarRegistroPais();

			return true;
		})
	})

//Capturar valor del campo de texto de agregar Pais

function validarRegistroPais()
{
	var nombre = $("#namePais").val();
	const ejecutar = validarRegistroExistente(nombre);

}

//Capturar valor del campo de texto de modificar Pais
function validarModificacionPais(id)
{
	var descripcion = $("#namePais2").val();
	const ejecutar =  validarRegistroExistenteDeModificar(id,descripcion);
 	consultarTodosPaises();

}


