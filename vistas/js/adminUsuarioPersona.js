$(document).ready(function()
{ 
	rutaActual = window.location.toString();
	if(rutaActual.includes("adminUsuarios"))
	{   
		consultarconsultarUsuariosAdminEnBd('tipousuario','usuario','idTipoUsuario','TipoUsuario_idTipoUsuario');
	}
	if(rutaActual.includes("adminClientes"))
	{   
		consultarconsultarClientesAdminEnBd('persona','comercios','idPersona','Persona_idPersona');
		consultarconsultarClientesAdminEnBd('persona','comercios','idPersona','Persona_idPersona');
	}
});
var rutaOculta = $("#rutaOculta").val();

function mostrarModalModificarUsuario(id,nombre,apellido,nombreUsuario)
{
	$("#idUsuarioModificar").val(id);
	$("#nombUsuario").val(nombre);
	$("#apeUsuario").val(apellido);
	$("#nombreUsuario").val(nombreUsuario);
	$("#editUser").modal("show");
	$("#editarUsuario").click(function(){
		modificarUsuario($("#idUsuarioModificar").val());
	});
}		
$(function(){
	$(".cerrarModalUsuario").click(function(){
		$("#idUsuarioModificar").val(null)
		$("#editUser").modal("hide");
		$("#nombUsuario").val(null);
		$("#apeUsuario").val(null);
		$("#nombreUsuario").val(null);
	})
})
function consultarconsultarUsuariosAdminEnBd(tabla,tabla2,atributo,atributo2)
{
	var datos = new FormData();
	datos.append("consultarPersona", "nulo");
	datos.append("tabla", tabla);
	datos.append("tabla2", tabla2);
	datos.append("atributo", atributo);
	datos.append("atributo2", atributo2);
	var respuestaFinal = "esta vacia";
	var plantilla2 = "";
	$.ajax({
		url:rutaOculta+"ajax/adminComercio.ajax.php",
		method:"POST",
		data: datos, 
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta3)
		{
			if(respuesta3.length >10)
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
					plantilla2 += `
					<tr>
					      <td>${res2.nombUsuario}</td>
					      <td>${res2.apeUsuario}</td>
					      <td>${res2.correoUsuario}</td>
						  <td>${res2.descripcion}</td>
					      <td><a href="javascript:mostrarModalModificarUsuario('${res2.idUsuario}','${res2.nombUsuario}','${res2.apeUsuario}','${res2.correoUsuario}','${res2.descripcion}');"><span title="Modificar"><i class="fas fa-pencil-alt text-primary me-3"></i></span><a href="javascript:mostrarModalElimincarUsuario('${res2.idUsuario}','${res2.correoUsuario}');"><span title="Eliminar"><i class="fas fa-trash-alt text-danger me-3"></i></span></td>
					</tr><br>`;
				}
				$("#cuerpoTablaAdminUsuarios").html(plantilla2);  
				$('#cuerpoTablaAdminUsuarios').show();
			}else{
				$("#cuerpoTablaAdminUsuarios").hide(); 
			}
		}
	})
}
function consultarconsultarClientesAdminEnBd(tabla,tabla2,atributo,atributo2)
{
	var datos = new FormData();
	datos.append("consultarCliente", "nulo");
	datos.append("tablaCliente", tabla);
	datos.append("tabla2Cliente", tabla2);
	datos.append("atributoCliente", atributo);
	datos.append("atributo2Cliente", atributo2);
	var plantilla2 = "";
	$.ajax({
		url:rutaOculta+"ajax/adminComercio.ajax.php",
		method:"POST",
		data: datos, 
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta3)
		{
			if(respuesta3.length >10)
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
					plantilla2 += `
					<tr>
					      <td>${res2.cedulaPersona}</td>
					      <td>${res2.nombrePersona}</td>
					      <td>${res2.apellidoPersona}</td>
						  <td>${res2.nombreTienda}</td>
					      <td><a href="javascript:mostrarModalModificarCliente('${res2.idPersona}','${res2.nombrePersona}','${res2.apellidoPersona}',${res2.cedulaPersona});"><span title="Modificar"><i class="fas fa-pencil-alt text-primary me-3"></i></span><a href="javascript:mostrarModalEliminarCliente('${res2.idPersona}','${res2.nombrePersona}');"><span title="Modificar"><i class="fas fa-trash-alt text-danger me-3"></i></span></td>
					</tr><br>`;
				}
				$("#cuerpoTablaAdminClientes").html(plantilla2);  
				$('#cuerpoTablaAdminClientes').show();
			}else{
				$("#cuerpoTablaAdminClientes").hide(); 
			}
		}
	})
}


function modificarUsuario(id)
{
	var nombre = $("#nombUsuario").val();
	var apellido = $("#apeUsuario").val();
	var nombreUsuario = $("#nombreUsuario").val();
	var tipoUsuario = $("#tipoUsuario").val();
	tipoUsuario = tipoUsuario.replace('>','');
	var datos = new FormData();
	datos.append("nombreUsuarioModificar", nombre);
	datos.append("idUsuarioModificar", id);
	datos.append("apellido", apellido);
	datos.append("nombreUsuario", nombreUsuario);
	datos.append("tipoUsuario", tipoUsuario);
	$.ajax({
		url:rutaOculta+"ajax/adminComercio.ajax.php",
		method:"POST",
		data: datos, 
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta3)
		{
			if(respuesta3.includes('ok'))
			{
				Swal.fire({
 					icon: 'success',
 					title: 'Registro Modificado',
 					confirmButtonText: 'Aceptar'
 				}).then((result) => 
				{
					if (result.isConfirmed)
					{
						consultarconsultarUsuariosAdminEnBd('tipousuario','usuario','idTipoUsuario','TipoUsuario_idTipoUsuario');
						$("#idUsuarioModificar").val(null)
						$("#editUser").modal("hide");
						$("#nombUsuario").val(null);
						$("#apeUsuario").val(null);
						$("#nombreUsuario").val(null);
					}

				})
			}else
			{
				Swal.fire({
 					icon: 'Error',
 					title: 'Error al modificar registro',
 					confirmButtonText: 'Aceptar'
 				})
			}
		}
	})
}

function mostrarModalElimincarUsuario(id,nombreUsuario)
{
	Swal.fire({
	  icon: 'info',
	  title: '\u00bfSeguro que desea eliminar a este usuario?',
	  showCancelButton: true,
	  confirmButtonText: 'Eliminar',
	  cancelButtonText: `Cancelar`,
	  confirmButtonColor: 'red'
	}).then((result) => {
		if (result.isConfirmed)
		{
			eliminarUsuario(id,nombreUsuario);
		}
	})
}

function eliminarUsuario(id,nombreUsuario)
{
	var datos = new FormData();

 	datos.append("idUsuarioEliminar", id);
 	datos.append("nombreUsuarioEliminar", nombreUsuario);
 	$.ajax({
 		url:rutaOculta+"ajax/adminComercio.ajax.php",
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
			    mensajeError("Error al eliminar el estado "+respuesta);
 			}else if(respuesta.includes("relacionado")){
			   mensajeError('No se puede eliminar el Estado, se encuentra con municipios');
			}else
 			{
 				Swal.fire({
 					title: 'Registro Eliminado',
 					icon: 'success',
 					showCloseButton: true,
 					confirmButtonText:'Aceptar'
 				}).then((result) => {
					if (result.isConfirmed)
					{
						consultarconsultarUsuariosAdminEnBd('tipousuario','usuario','idTipoUsuario','TipoUsuario_idTipoUsuario');
					}
				})
 			}

 		}                 

 	})
}
function mostrarModalModificarCliente(id,nombre,apellido,cedula)
{
	$("#idClienteModificar").val(id);
	$("#nombreCliente").val(nombre);
	$("#apellidoCliente").val(apellido);
	$("#cedulaCliente").val(cedula);
	$("#editUser").modal("show");
	$("#btnEditarCliente").click(function(){
		modificarCliente();
	});
	$("#editarCliente").modal("show");
}
$(".cerrarModalCliente").click(function(){
	$("#idClienteModificar").val(null);
	$("#nombreCliente").val(null);
	$("#apellidoCliente").val(null);
	$("#cedulaCliente").val(null);
	$("#editarCliente").modal("hide");
});


function modificarCliente()
{
	var id = $("#idClienteModificar").val();
	var nombre = $("#nombreCliente").val();
	var apellido = $("#apellidoCliente").val();
	var cedula = $("#cedulaCliente").val();
	var datos = new FormData();
	datos.append("nombreClienteModificar", nombre);
	datos.append("apellido", apellido);
	datos.append("idClienteModificar", id);
	datos.append("cedulaCliente", cedula);
	$.ajax({
		url:rutaOculta+"ajax/adminComercio.ajax.php",
		method:"POST",
		data: datos, 
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta3)
		{
			if(respuesta3.includes('ok'))
			{
				Swal.fire({
 					icon: 'success',
 					title: 'Registro Modificado',
 					confirmButtonText: 'Aceptar'
 				}).then((result) => 
				{
					if (result.isConfirmed)
					{
						consultarconsultarClientesAdminEnBd('persona','comercios','idPersona','Persona_idPersona');
						consultarconsultarClientesAdminEnBd('persona','comercios','idPersona','Persona_idPersona');
						$("#idClienteModificar").val(null);
						$("#nombreCliente").val(null);
						$("#apellidoCliente").val(null);
						$("#cedulaCliente").val(null);
						$("#editarCliente").modal("hide");
					}

				})
			}else
			{
				Swal.fire({
 					icon: 'Error',
 					title: 'Error al modificar registro',
 					confirmButtonText: 'Aceptar'
 				})
			}
		}
	})
}

function mostrarModalEliminarCliente(id, nombre)
{
	Swal.fire({
	  icon: 'info',
	  title: '\u00bfSeguro que desea eliminar este cliente?',
	  showCancelButton: true,
	  confirmButtonText: 'Eliminar',
	  cancelButtonText: `Cancelar`,
	  confirmButtonColor: 'red'
	}).then((result) => {
		if (result.isConfirmed)
		{
			var resultado = consultarClienteContratoActivo(id);
			if (resultado != 'ya existe') 
			{
				eliminarCliente(id,nombre);
			}
		}
	})
}

function eliminarCliente(id,nombreCliente)
{
	var datos = new FormData();
 	datos.append("idClienteEliminar", id);
 	datos.append("nombreClienteEliminar", nombreCliente);
 	$.ajax({
 		url:rutaOculta+"ajax/adminComercio.ajax.php",
 		method:"POST",
 		data: datos, 
 		cache: false,
 		contentType: false,
 		processData: false,
 		async:false,
 		success: function(respuesta)
 		{
 			alert(respuesta);
 			if(!respuesta.includes("ok") && !respuesta.includes("relacionado"))
 			{
			    mensajeError("Error al eliminar el cliente");
			}else
 			{
 				Swal.fire({
 					title: 'Registro Eliminado',
 					icon: 'success',
 					showCloseButton: true,
 					confirmButtonText:'Aceptar'
 				}).then((result) => {
					if (result.isConfirmed)
					{
						consultarconsultarUsuariosAdminEnBd('tipousuario','usuario','idTipoUsuario','TipoUsuario_idTipoUsuario');
					}
				})
 			}

 		}                 

 	})
}

function consultarClienteContratoActivo(id)
{
	var variableRetornar = "";
	var datos = new FormData();
 	datos.append("consultarClienteContratoActivo", id);
 	$.ajax({
 		url:rutaOculta+"ajax/adminComercio.ajax.php",
 		method:"POST",
 		data: datos, 
 		cache: false,
 		contentType: false,
 		processData: false,
 		async:false,
 		success: function(respuesta)
 		{
 			if (respuesta.includes("false")) 
 			{
 			}else
 			{
 				Swal.fire({
					title: 'Error',
					icon: 'error',
					text: 'No se puede eliminar por que el cliente tiene un contrato activo asociado',
					showCloseButton: true,
					confirmButtonText:'Aceptar'
				});		
				variableRetornar = 'ya existe';
 			}
 		}                 

 	})
 	return variableRetornar;
}
