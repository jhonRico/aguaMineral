$(document).ready(function(){ 
	rutaActual = window.location.toString();
	if(rutaActual.includes("administracionTipoProducto")){   
		consultarTipoProducto();
	}
});

$('#agregarTipoProducto').click(function() 
{
	validarCampo();
});

function validarCampo()
{
	var descripcion = $('#descripcion').val();
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
 			title: 'Ingrese un tipo de producto válido',
 			showConfirmButton: false,
 			timerProgressBar: true,
 			timer: 1500
 		})
 		return false;
 	}
 	registrarTipoProducto();
 	return true;		
}

function registrarTipoProducto()
{
	var descripcion = $('#descripcion').val();
	var datos = new FormData();

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
					text: 'Error al registrar Tipo de Producto',
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
						$("#descripcion").val('');
						$("#moddaddCountry").modal("hide");
						consultarTipoProducto();
					}
				})
			}

		}                 

	})
}
function consultarTipoProducto()
{
	var datos = new FormData();
	datos.append("consultar", "nulo");
	let plantilla2 = " ";
	$.ajax({
		url:"//localhost/aguaMineral/ajax/registroAdmin.ajax.php",
		method:"POST",
		data: datos, 
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta3)
		{		
			 if(respuesta3.length >10 )
			 {
				respuesta3 =respuesta3.replace("[","");
				respuesta3 =respuesta3.replace("]","");
				var auxSplit2 = respuesta3.split("},");
				plantilla2 +='<div class="col-lg-9 col-md-9 col-sm-10 col-xs-12 m-2" id="">'
				for(var i=0;i<auxSplit2.length;i++)
				{
					if(!auxSplit2[i].includes("}"))
					{
						auxSplit2[i] = auxSplit2[i]+"}";
					}
					var res2 = JSON.parse(auxSplit2[i]);
					var aux = "'"+res2.descripcion+"'";
					plantilla2 +='<div class="p-2">'

					plantilla2 +='                      <h3 class="div-pais p-3 rounded">'+res2.descripcion+'<a href="javascript:mostrarModalEliminar('+res2.idTipoProducto+')" class=""><button class="btn eliminarPais eliminar text-danger" type="button"><i class="fas fa-trash-alt"></i></button></a><a href="javascript:mostrarModalEditTipoProducto('+res2.idTipoProducto+','+aux+');" class=""><button class="btn eliminarPais eliminar text-primary" type="button"><i class="fas fa-pencil-alt"></i></button></a></h3>'

					plantilla2 +='   </div>'

				}
				plantilla2 +='</div>'
				$("#respuestaCons").html(plantilla2);  
				$('#respuestaCons').show();
			}else
			{
				$("#respuestaCons").hide(); 			
			}
		}
	})
}
function mostrarModalEditTipoProducto(id,descripcion)
{
	idTipoProducto = id;
	$("#editCountry").modal("show");
	$("#namePais2").attr('value', descripcion);
	$("#editarPais").click(function(){
	descripcionTipoProducto = $('#namePais2').val();
	modificarTipoProducto(idTipoProducto,descripcionTipoProducto);
	})
}
function modificarTipoProducto(idTipoProducto,descripcionTipoProducto)
{
	var datos = new FormData();
 	datos.append("idTipoProducto", idTipoProducto);
 	datos.append("descripcionTipoProducto", descripcionTipoProducto);
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
 					text: 'Error al modificar Tipo Producto',
 					icon: 'error',
 					showCloseButton: true,
 					confirmButtonText:'Aceptar'
 				}); 

 			}else
 			{
 				Swal.fire({
 					title: 'Tipo de Producto Modificado',
 					icon: 'success',
 					showCloseButton: true,
 					confirmButtonText:'Aceptar'
 				}).then((result) => 
				{
					if (result.isConfirmed)
					{
						$("#namePais2").attr('value', null);
						$("#editCountry").modal("hide");
						consultarTipoProducto();
					}
				})
 			}

 		}                 

 	})
}
function mostrarModalEliminar(id)
{
	Swal.fire({
		title: 'Eliminar',
		text: "¿Seguro que desea eliminar este país?",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: 'red',
		cancelButtonColor: 'gray',
		confirmButtonText: 'Eliminar'
	}).then((result) => {
		if (result.isConfirmed)
		{
			eliminarTipoProducto(id);		
		}
	})
}
function eliminarTipoProducto(id)
{
	var datos = new FormData();
 	datos.append("idTipoProductoEliminar", id);

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
 					text: 'Error al Tipo Producto',
 					icon: 'error',
 					showCloseButton: true,
 					confirmButtonText:'Aceptar'
 				}); 
 			}else
 			{
 				Swal.fire({
 					title: 'Tipo Producto Eliminado',
 					icon: 'success',
 					showCloseButton: true,
 					confirmButtonText:'Aceptar'
 				}).then((result) => {
					if (result.isConfirmed)
					{
						consultarTipoProducto();
					}
 				});
 			}
 		}                 
 	})
}

//Administracion de Productos

$('#agregarProducto').click(function() {
	validarCamposProductos();
});

function validarCamposProductos()
{
	var descripcion = $('#descripcion').val();
	var tipoProducto = $('#tipoProducto').val();
	var serial = $('#serial').val();
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
 			title: 'Ingrese un producto válido',
 			showConfirmButton: false,
 			timerProgressBar: true,
 			timer: 1500
 		})
 		return false;
 	}
 	if (serial == "") 
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
 	if (!expresiones.usuario.test(serial)) 
 	{
 		Swal.fire({
 			position: 'top-end',
 		    icon: 'error',
 			toast: true,
 			title: 'Ingrese un serial válido',
 			showConfirmButton: false,
 			timerProgressBar: true,
 			timer: 1500
 		})
 		return false;
 	}
    registrarProductoEnBd();
 	return true;
}

function registrarProductoEnBd()
{
	var descripcion = $('#descripcion').val();
	var datos = new FormData();

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
					text: 'Error al registrar Tipo de Producto',
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
						$("#descripcion").val('');
						$("#moddaddCountry").modal("hide");
						consultarTipoProducto();
					}
				})
			}

		}                 

	})
}