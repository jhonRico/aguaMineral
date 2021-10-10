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

					plantilla2 +='                      <h3 class="div-pais p-3 rounded">'+res2.descripcion+'<a href="javascript:eliminar('+res2.idTipoUsuario+')" class=""><button class="btn eliminarPais eliminar text-danger" type="button"><i class="fas fa-trash-alt"></i></button></a><a href="javascript:mostrarModalEdit('+res2.idTipoUsuario+','+aux+');" class=""><button class="btn eliminarPais eliminar text-primary" type="button"><i class="fas fa-pencil-alt"></i></button></a></h3>'

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
 			
			validarRegistro();

			return true;
		})
	})

//Capturar valor del campo de texto de agregar 

function validarRegistro()
{
	var nombre = $("#nameTU").val();
	const ejecutar = validarRegistroExistente(nombre);

}
//Funcion Ajax que valida existente en BD 

function validarRegistroExistente(valor)
{
	var datos = new FormData();

	datos.append("registroValue", valor);

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
				registrarCampo(valor);
				consultarTodosTU();

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
			}

		}                 

	})
}

/*Funcion Ajax que registra*/
function registrarCampo(valor)
{
	var datos = new FormData();

	datos.append("nombreValue", valor);

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