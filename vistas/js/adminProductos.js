//Mensaje exitoso mas redirreccionar

$(document).ready(function(){ 
	rutaActual = window.location.toString();
	if(rutaActual.includes("administracionTipoProducto")){   
		consultarTipoProducto("tipoproducto");
	}
});
$(document).ready(function(){ 
	rutaActual = window.location.toString();
	if(rutaActual.includes("administracionProductos")){   
		consultarProducto();
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
						consultarTipoProducto("tipoproducto");
					}
				})
			}

		}                 

	})
}
function consultarTipoProducto(tabla)
{
	var datos = new FormData();
	datos.append("tabla", tabla);
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
						consultarTipoProducto("tipoproducto");
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
			eliminarRegistroEnTabla(id,"tipoproducto","idTipoProducto");		
		}
	})
}
function mostrarModalEliminarProducto(id, tabla, parametro)
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
			eliminarRegistroEnTabla(id, tabla, parametro);		
		}
	})
}
function eliminarRegistroEnTabla(id, tabla, parametro)
{
	var datos = new FormData();
 	datos.append("idEliminar", id);
 	datos.append("tablaEliminar", tabla);
 	datos.append("parametroEliminar", parametro);

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
 					text: 'Error al eliminar',
 					icon: 'error',
 					showCloseButton: true,
 					confirmButtonText:'Aceptar'
 				}); 
 			}else
 			{
 				Swal.fire({
			 		title: 'Producto Eliminado',
			 		icon: 'success',
			 		showCloseButton: true,
			 		confirmButtonText:'Aceptar'
			 		}).then((result) => {
					if (result.isConfirmed)
					{
						consultarProducto();
					}
			 	});
 			}
 		}                 
 	})
}

//Administracion de Productos
$(document).ready(function() 
{
		$(".cerrarModalProducto").click(function() 
		{
			$('#capacidad').val("");
			$('#serial').val("");
			$('#cantidad').val("");
			$('#moddaddCountry').modal("hide");
		});

		$('#tipoProducto').click(function(event) {
		var array = $('#tipoProducto').val().split("-");
		if (array[1] == "Estantes") 
		{
			$('#modalSerial').show();
		}else
		{
			$('#modalSerial').hide();
			$('#serial').val('');
		}
	});
});

$('#agregarProducto').click(function(){
	registrarProductoEnBd();
});

function registrarProductoEnBd()
{
	var array = $('#tipoProducto').val().split("-");
	var tipoProducto = array[0];
	var serial = $('#serial').val();
	var capacidad = $('#capacidad').val();
	var cantidad = $('#cantidad').val();
	var sucursal = $("#sucursal").val();
	var result = sucursal.split("-");
	var datos = new FormData();
	var sucursalFinal = result[0];

    datos.append("sucursal", sucursalFinal);
	datos.append("tipoProducto", tipoProducto);
	datos.append("serial", serial);
	datos.append("capacidad", capacidad);
	datos.append("cantidad", cantidad);

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
			if(respuesta.includes("error"))
			{
				Swal.fire({
					title: 'Error',
					text: 'Error al registrar producto',
					icon: 'error',
					showCloseButton: true,
					confirmButtonText:'Aceptar'
				}).then((result) => 
				{
					if (result.isConfirmed)
					{
						$("#moddaddCountry").modal("hide");
						consultarProducto();
						$('#capacidad').val("");
						$('#serial').val("");
						$('#cantidad').val("");
					}
				}) 

			}else if(respuesta.includes("ok"))
			{
				consultarProducto();				
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
						consultarProducto();
						$('#capacidad').val("");
						$('#serial').val("");
						$('#cantidad').val("");
					}
				})
			}else
			{
				consultarProducto();				
				Swal.fire({
					title: 'Sumado Exitosamente',
					icon: 'success',
					showCloseButton: true,
					confirmButtonText:'Aceptar'
				}).then((result) => 
				{
					if (result.isConfirmed)
					{
						$("#moddaddCountry").modal("hide");
						$('#capacidad').val("");
						$('#serial').val("");
						$('#cantidad').val("");
					}
				})
			}

		}                 

	})
}

function consultarProducto()
{
	var selectSucursales = $("#selectSucursales").val();
	var datos = new FormData();
	datos.append("consultar", selectSucursales);
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
				for(var i=0;i<auxSplit2.length;i++)
				{
					if(!auxSplit2[i].includes("}"))
					{
						auxSplit2[i] = auxSplit2[i]+"}";
					}
					var res2 = JSON.parse(auxSplit2[i]);
					var aux = "'"+res2.descripcion+"'";
					result = aux.replace("'","");
					result2 = result.replace("'","");
					plantilla2 += `
					<tr>
					      <b><th scope="row">${result2}</th></b>
					      <td>${res2.capacidadProducto}</td>
					      <td>${res2.numeroSerial}</td>
					      <td></td>
					      <td>${res2.cantidadProductos}</td>
					      <td></td>
					      <td></td>
					      <td><a href="#"><span title="Modificar"><i class="fas fa-pencil-alt text-primary me-3"></i></span></a><a href="javascript:mostrarModalEliminarProducto(${res2.idProducto},'producto','idProducto')"><span title="Eliminar"><i class="fas fa-trash-alt text-danger"></i></span></a></td>
					</tr><br>`;
				}

				$("#fila").html(plantilla2); 
				$("#fila").show();

			}else
			{
				$("#fila").hide(); 
				 Swal.fire({
		          position: 'bottom',
		          icon: 'info',
		          toast: true,
		          title: 'No hay productos en esta sucursal',
		          showConfirmButton: false,
		          timerProgressBar: true,
		          timer: 2000,
		        }) 			
			}
		}
	})
}

$(document).ready(function() 
{
    $('#selectSucursales').on('change', function() 
    {
      consultarProducto();
    })
});

