$(document).ready(function()
{ 
	rutaActual = window.location.toString();
	if(rutaActual.includes("adminComercio"))
	{   
		consultarComercios();
	}
	if(rutaActual.includes("adminUsuarios"))
	{   
		consultarconsultarUsuariosAdminEnBd('tipousuario','usuario','idTipoUsuario','TipoUsuario_idTipoUsuario');
	}
	if(rutaActual.includes("adminClientes"))
	{   
		consultarconsultarClientesAdminEnBd('tipousuario','persona','idTipoUsuario','TipoUsuario_idTipoUsuario');
	}
});
$(function(){
	$(".mostrarModalAgregarComercio").click(function(){
		$("#moddaddStore").modal("show");
	})
})
$(function(){
	$(".mostrarModalAgregarComercio").click(function(){
		$("#editUser").modal("show");
	})
})

$(function(){
	$(".cerrarModalComercio").click(function(){
		$("#editStore").modal("hide");
		$("#usuarioModificar").val(null);
	});
})

function consultarComercios()
{
	var datos = new FormData();
	datos.append("consultar", "nulo");
	let plantilla2 = " ";
	$.ajax({
		url:"//localhost/aguaMineral/ajax/adminComercio.ajax.php",
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
				for(var i=0;i<auxSplit2.length;i++){
					if(!auxSplit2[i].includes("}")){
						auxSplit2[i] = auxSplit2[i]+"}";
					}
					var res2 = JSON.parse(auxSplit2[i]);
					plantilla2 += `
					<tr>
					      <b><th scope="row">${res2.cedulaPersona}</th></b>
					      <td>${res2.nombrePersona}</td>
					      <td>${res2.apellidoPersona}</td>
					      <td>${res2.nombreTienda}</td>
					      <td><a href="javascript:mostrarModalModificarComercio('${res2.idComercios}','${res2.nombreTienda}');"><span title="Modificar"><i class="fas fa-pencil-alt text-primary me-3"></i></span></td>
					</tr><br>`;
				}

				$("#cuerpoTablaComercio").html(plantilla2);  
				$('#cuerpoTablaComercio').show();
			}else{
				$("#cuerpoTablaComercio").hide(); 
			}
		}
	})
}

function mostrarModalModificarComercio(id,nombre)
{
	$("#comercioModificar").val(nombre);
	$("#editStore").modal("show");
	$('#editarComercio').click(function(){
		var resultado = validarCampo();
		if (resultado == true) 
		{
			modificarComercio(id);
		}
	});
}

function validarCampo()
{
	var descripcion = $("#comercioModificar").val();
	if (descripcion == '') 
	{
		Swal.fire({
			title: 'Por favor Ingrese el nombre del comercio',
			icon: 'error',
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
		    timerProgressBar: true,
		    timer: 2000,
		})
		return false;
	}
	if (!expresiones.nombre.test(descripcion)) 
      {
        Swal.fire({
          position: 'top-end',
          icon: 'error',
          toast: true,
          title: 'Ingrese un comercio válido',
          showConfirmButton: false,
          timerProgressBar: true,
          timer: 1500
        })        
        return false;
      }
	return true;
}

function modificarComercio(id)
{
	var resultado = consultarComerciosEnBd();
	if (resultado == 'No existe') 
	{
		modificarComercioFinal(id);
	}
}

function consultarComerciosEnBd()
{
	var descripcion = $('#comercioModificar').val();
	var datos = new FormData();
	var resultado = "";
	datos.append("comercioConsultar", descripcion);
	$.ajax({
		url:"//localhost/aguaMineral/ajax/adminComercio.ajax.php",
		method:"POST",
		data: datos, 
		cache: false,
		contentType: false,
		processData: false,
		async:false,
		success: function(respuesta)
		{
			  if (respuesta.includes('false'))
		      {
		      	resultado = "No existe";
		      }else
		      {
		        Swal.fire({
		          position: 'top-end',
		          icon: 'error',
		          toast: true,
		          title: 'El comercio ya existe',
		          showConfirmButton: false,
		          timerProgressBar: true,
		          timer: 1500
		        })        
		        resultado = "Ya existe";
		      }
		}                 
	});
	return resultado;
}

function modificarComercioFinal(id)
{
	var nombreComercio = $("#comercioModificar").val();
	var datos = new FormData();
	datos.append("idModificarComercio", id);
	datos.append("nombreComercio", nombreComercio);

	$.ajax({
		url:"//localhost/aguaMineral/ajax/adminComercio.ajax.php",
		method:"POST",
		data: datos, 
		cache: false,
		contentType: false,
		processData: false,
		async:false,
		success: function(respuesta)
		{
			if (respuesta.includes('ok'))
		    {
		      	Swal.fire({
 					title: 'Comercio Modificado',
 					icon: 'success',
 					showCloseButton: true,
 					confirmButtonText:'Aceptar'
 				}).then((result) => 
				{
					if (result.isConfirmed)
					{
						$("#comercioModificar").val(null);
						$("#editStore").modal("hide");
						consultarComercios();
					}

				})
		    }else
		    {
		    	Swal.fire({
 					title: 'Error',
 					icon: 'error',
 					text: 'Error al modificar el comercio',
 					showCloseButton: true,
 					confirmButtonText:'Aceptar'
 				});
		    }
		}                 
	});
}