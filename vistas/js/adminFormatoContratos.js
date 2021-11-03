$(document).ready(function(){ 
	rutaActual = window.location.toString();
	if(rutaActual.includes("adminFormatoEstantes")){   		
		consultarFormatoEstante();
	}else if(rutaActual.includes("adminFormatoBotellones")){
	    consultarFormatoBotellon();
	}else if(rutaActual.includes("adminFormatoAmbos")){
	    consultarFormatoAmbos();
	}else if(rutaActual.includes("todosContratos")){
	    consultarTodosContratos();
	}else if(rutaActual.includes("adminFormatoRecibo")){
	    consultarFormatoRecibo();
	}
});
var rutaOculta = $("#rutaOculta").val();
$("#sucursalContrato").change(function(){
	consultarTodosContratos();
});
function consultarFormatoRecibo(){
	
	var datos = new FormData();
	datos.append("consultarRecibo", "Recibo");
	let plantilla2 = " ";
	let obj
	$.ajax({
		url:rutaOculta+"ajax/administracionFormato.ajax.php",
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

				
				for(var i=0;i<auxSplit2.length;i++){
					if(!auxSplit2[i].includes("}")){
						auxSplit2[i] = auxSplit2[i]+"}";
					}
					var res2 = JSON.parse(auxSplit2[i]);
					
					plantilla2 +=res2.descripcion;

				}		
				$("#formateRecibo").html(plantilla2);  
				$('#formateRecibo').show();
			}else{
				$("#formateRecibo").hide(); 

			}
		}
	})
}

function consultarFormatoAmbos(){
	
	var datos = new FormData();
	datos.append("consultarAmbos", "Ambos");
	let plantilla2 = " ";
	let obj
	$.ajax({
		url:rutaOculta+"ajax/administracionFormato.ajax.php",
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

				
				for(var i=0;i<auxSplit2.length;i++){
					if(!auxSplit2[i].includes("}")){
						auxSplit2[i] = auxSplit2[i]+"}";
					}
					var res2 = JSON.parse(auxSplit2[i]);
					
					plantilla2 +=res2.descripcion;

				}		
				$("#formateAmbos").html(plantilla2);  
				$('#formateAmbos').show();
			}else{
				$("#formateAmbos").hide(); 

			}
		}
	})
}

function consultarFormatoEstante(){
	//"Estantes","tipocontrato","nombre"
		var datos = new FormData();
	datos.append("consultarEstante", "Estantes");
	let plantilla2 = " ";
	let obj
	$.ajax({
		url:rutaOculta+"ajax/administracionFormato.ajax.php",
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

				
				for(var i=0;i<auxSplit2.length;i++){
					if(!auxSplit2[i].includes("}")){
						auxSplit2[i] = auxSplit2[i]+"}";
					}
					var res2 = JSON.parse(auxSplit2[i]);
					
					plantilla2 +=res2.descripcion;

				}
				
				$("#formateEstante").html(plantilla2);  
				$('#formateEstante').show();
			}else{
				$("#formateEstante").hide(); 

			}
			

		}
	})
}

function consultarFormatoBotellon(){
	
		var datos = new FormData();
	datos.append("consultarBotellon", "Botellones");
	let plantilla2 = " ";
	let obj
	$.ajax({
		url:rutaOculta+"ajax/administracionFormato.ajax.php",
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

				
				for(var i=0;i<auxSplit2.length;i++){
					if(!auxSplit2[i].includes("}")){
						auxSplit2[i] = auxSplit2[i]+"}";
					}
					var res2 = JSON.parse(auxSplit2[i]);
					
					plantilla2 +=res2.descripcion;

				}
				
				$("#formateBotellon").html(plantilla2);  
				$('#formateBotellon').show();
			}else{
				$("#formateBotellon").hide(); 

			}
			

		}
	})
}
//------------------------------------------------------------------------------------
	function miFuncion(idFormato){
	       var descripcion = $("#formateEstante").val();		
			if (descripcion == "") 
 			{
 				mensajeError('El campo esta vacio');
 				return false;
 			}
			 actualizarRegistro(idFormato,descripcion);
		
	}

		function miFuncionBotellon(idFormato){
	       var descripcion = $("#formateBotellon").val();		
			if (descripcion == "") 
 			{
 				mensajeError('El campo esta vacio');
 				return false;
 			}
			 actualizarRegistroBotellon(idFormato);
		
	}
	function miFuncionRecibo(idFormato){
	       var descripcion = $("#formateRecibo").val();		
			if (descripcion == "") 
 			{
 				mensajeError('El campo esta vacio');
 				return false;
 			}
			 actualizarRegistroRecibo(idFormato);
		
	}
		function miFuncionAmbos(idFormato){
	       var descripcion = $("#formateAmbos").val();		
			if (descripcion == "") 
 			{
 				mensajeError('El campo esta vacio');
 				return false;
 			}
			 actualizarRegistroAmbos(idFormato);
		
	}

function actualizarRegistroRecibo(idFormato)
{
	var datos = new FormData();
	datos.append("recibo", $("#formateRecibo").val());
	datos.append("idFormato", idFormato);
	$.ajax({
		url:rutaOculta+"ajax/administracionFormato.ajax.php",
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
				mensajeError('Error al actualizar el formato de ambos');
			}else
			{
				Swal.fire({
					title: 'Se actualiza de forma  exitosa',
					icon: 'success',
					showCloseButton: true,
					confirmButtonText:'Aceptar'
				}).then((result) => 
				{
					if (result.isConfirmed)
					{
						window.location.href =  rutaOculta+'adminFormatos';
					}

				})
			}

		}                 

	})
}

function actualizarRegistroAmbos(idFormato)
{
	var datos = new FormData();
	datos.append("ambos", $("#formateAmbos").val());
	datos.append("idFormato", idFormato);
	$.ajax({
		url:rutaOculta+"ajax/administracionFormato.ajax.php",
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
				mensajeError('Error al actualizar el formato de ambos');
			}else
			{
				Swal.fire({
					title: 'Se actualiza de forma  exitosa',
					icon: 'success',
					showCloseButton: true,
					confirmButtonText:'Aceptar'
				}).then((result) => 
				{
					if (result.isConfirmed)
					{
						window.location.href =  rutaOculta+'adminFormatos';
					}

				})
			}

		}                 

	})
}

function actualizarRegistroBotellon(idFormato)
{
	var datos = new FormData();
	datos.append("botellon", $("#formateBotellon").val());
	datos.append("idFormato", idFormato);
	$.ajax({
		url:rutaOculta+"ajax/administracionFormato.ajax.php",
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
				mensajeError('Error al actualizar el formato de estante');
			}else
			{
				Swal.fire({
					title: 'Se actualiza de forma exitosa',
					icon: 'success',
					showCloseButton: true,
					confirmButtonText:'Aceptar'
				}).then((result) => 
				{
					if (result.isConfirmed)
					{
						window.location.href =  rutaOculta+'adminFormatos';
					}

				})
			}

		}                 

	})
}

function actualizarRegistro(idFormato,descripcion)
{
	var datos = new FormData();
	
	datos.append("estante", descripcion);
	datos.append("idFormato", idFormato);
	$.ajax({
		url:rutaOculta+"ajax/administracionFormato.ajax.php",
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
				mensajeError('Error al actualizar el formato de estante');
			}else
			{
				Swal.fire({
					title: 'Se actualiza de forma exitosa',
					icon: 'success',
					showCloseButton: true,
					confirmButtonText:'Aceptar'
				}).then((result) => 
				{
					if (result.isConfirmed)
					{
						window.location.href =  rutaOculta+'adminFormatos';
					}

				})
			}

		}                 

	})
}

function mensajeError(mensaje){
   Swal.fire({
 					position: 'top-end',
 					icon: 'error',
 					toast: true,
 					title: mensaje ,
 					showConfirmButton: false,
 					timerProgressBar: true,
 					timer: 1500
 				})
}

//-----------------------Mostrar modal de ayuda---------------

function mostrarModalAyuda(){
		$("#moddaddhelp").modal("show");	
}

$(function(){
	$(".cerrar").click(function(){
		
		$("#moddaddhelp").modal("hide");
	})
})
function mostrarModalVistaPrevia(){


		$("#verPrevio").html($("#formateEstante").val()); 
		$('#verPrevio').show();
		$("#modalVistaPrevia").modal("show");
		
}

function mostrarModalVistaPreviaBotellon(){


		$("#verPrevioBotellon").html($("#formateBotellon").val()); 
		$('#verPrevioBotellon').show();
		$("#modalVistaPreviaBotellon").modal("show");
		
}
function mostrarModalVistaPreviaRecibo(){


		$("#verPrevioRecibo").html($("#formateRecibo").val()); 
		$('#verPrevioRecibo').show();
		$("#modalVistaPreviaRecibo").modal("show");
		
}

function mostrarModalVistaPreviaAmbos(){


		$("#verPrevioAmbos").html($("#formateAmbos").val()); 
		$('#verPrevioAmbos').show();
		$("#modalVistaPreviaAmbos").modal("show");
		
}

$(function(){
	$(".cerrar").click(function(){
		
		$("#modalVistaPrevia").modal("hide");
	})
})
$(function(){
	$(".cerrar").click(function(){
		
		$("#modalVistaPreviaBotellon").modal("hide");
	})
})
$(function(){
	$(".cerrar").click(function()
	{
		$("#modalVistaPreviaAmbos").modal("hide");
	})
})

/*Administracion de Contratos*/

function inicializar(longitud,caracter)
{
    returnValue ="";    
    for(i= 0;i<longitud ;i++)
    {
        returnValue = returnValue + caracter;
    }
    return returnValue;
}

function returnFactura(valor,longitud,caracter)
{
    retornaFactura = inicializar(longitud,caracter);
    aux="";
    if(valor!=null)
    {
            if(valor.length<longitud)
            {
                for(i=0;i<longitud-(valor.length);i++)
                {
                   aux = aux + caracter; 
                }
                retornaFactura = aux + valor; 
                
            }else if(valor.length()>longitud)
            {
                retornaFactura = valor.substring(0,longitud);
            }else
            {
                retornaFactura = valor;
            }
     }
    return retornaFactura;
}


$("#cedulaContrato").keyup(function() {
	consultarContrato();
});

function consultarContrato()
{
	var valorCedula = $("#cedulaContrato").val();
	var datos = new FormData();
	datos.append("consultarContrato", valorCedula);
	let plantilla2 = " ";
	let obj
	$.ajax({
		url:rutaOculta+"ajax/administracionFormato.ajax.php",
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
					var resultFecha = res2.fechaContrato.split(" ");
					var resultadoId = returnFactura(res2.idContrato,5,"0");
					if (res2.estadoContrato == "A") 
					{
						var resultadoEstado = "Activo";
						plantilla2 += `
			              <tr>
			                    <b><th scope="row">${resultadoId}</th></b>
			                    <td>${resultFecha[0]}</td>
			                    <td>${resultadoEstado}</td>
			                    <td><a href="javascript:mostrarDetalleContrato(${res2.idContrato})"><i class="fas fa-search"></i></a></td>
			              </tr><br>`;	
					}else
					{
						var resultadoEstado = "Devuelto";
						plantilla2 += `
			              <tr class="devuelto">
			                    <b><th scope="row">${resultadoId}</th></b>
			                    <td>${resultFecha[0]}</td>
			                    <td>${resultadoEstado}</td>
			                    <td><a href="javascript:mostrarDetalleContrato(${res2.idContrato})"><i class="fas fa-search text-white"></i></a></td>
			              </tr><br>`;
					}
				}
				$("#nombrePersona").text(res2.nombrePersona+' '+res2.apellidoPersona);
				$("#tablaContrato").html(plantilla2);  
				$('#tablaContrato').show();
			}else
			{
				$("#tablaContrato").hide(); 
				$("#nombrePersona").text('');
			}
			

		}
	})
}

function mostrarDetalleContrato(id)
{
	consultarReporte(id);
	$("#reporte").modal("show");
}
$(document).ready(function() {
  $("#close").click(function(event) {
    $("#reporte").modal("hide");
  });
});


function consultarReporte(id)
{
  var datos = new FormData();
  datos.append("idContrato", id);
  $.ajax({
    url:rutaOculta+"ajax/administracionFormato.ajax.php",
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
        var plantilla2;
        var resultadoFinal = 0;
        var resultadoFinal2 = 0;
        var registroAnterior = 0;
        for(var i=0;i<auxSplit2.length;i++)
        {
          if(!auxSplit2[i].includes("}"))
          {
            auxSplit2[i] = auxSplit2[i]+"}";
          }

          var res2 = JSON.parse(auxSplit2[i]);
          var array = res2.fechaContrato.split(" ");
          plantilla2 = `
              <tr>
                    <td><b>${array[0]}</b></td>
                    <td><b id="cantidadEstante">${res2.cantidadProd}</b></td>
                    <td><b id="cantidadBotellon">${res2.cantidadProd_2}</b></td>
              </tr><br>`;
          if (res2.estadoContrato == "D") 
          {
          	plantilla3="";
          }else
          {
          	plantilla3 = `<div class="ms-5 mt-3">
      		<a href="javascript:mostrarMensajeDevolucion(${id},${res2.cantidadProd},${res2.cantidadProd_2},${res2.capacidadProd},${res2.capacidadProd_2})"><button class="btn btn-primary mt-3 ms-5">Devolución</button></a>
      		</div>`;
          }
        }
        

       // plantilla3 = `<p>${resultadoFinal}</p>`;
        $('#cliente').text(res2.nombrePersona+' '+res2.apellidoPersona);
        $('#comercio').text(res2.nombreTienda);
        $('#cedula').text(res2.cedulaPersona);
        $('#direccion').text(res2.direccionPersona);
        $('#telefono').text(res2.telefonoPersona);
        $("#fila2").html(plantilla2); 
        $("#fila2").show();
        $("#devolucion").html(plantilla3); 
        $("#devolucion").show();



      }else
      {
        $("#fila2").hide();  
      }
    }
  })
}

function mostrarMensajeDevolucion(id,cantidad,cantidad2,capacidad,capacidad2)
{
	Swal.fire({
			title: '¿Seguro que desea devolver el contrato?',
			icon: 'info',
			showCloseButton: true,
			confirmButtonText:'Aceptar'
		}).then((result) => 
		{
			if (result.isConfirmed)
			{
				devolverContrato(id,cantidad,cantidad2,capacidad,capacidad2);
			}

		})
}
		
	

function devolverContrato(id,cantidad,cantidad2,capacidad,capacidad2)
{
	var dataCliente = $("#cliente").text();
	var datos = new FormData();
	datos.append("idContratoDevolucion", id);
	datos.append("cantidad", cantidad);
	datos.append("cantidad2", cantidad2);
	datos.append("capacidad", capacidad);
	datos.append("capacidad2", capacidad2);
	datos.append("dataCliente", dataCliente);
	let plantilla2 = " ";
	$.ajax({
		url:rutaOculta+"ajax/administracionFormato.ajax.php",
		method:"POST",
		data: datos, 
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta)
		{
			if (respuesta.includes('ok')) 
			{
				Swal.fire({
					title: 'Contrato devuelto',
					icon: 'success',
					showCloseButton: true,
					confirmButtonText:'Aceptar'
				}).then((result) => 
				{
					if (result.isConfirmed)
					{
						$("#reporte").modal("hide");
						consultarContrato();
						consultarTodosContratos();
						consultarFormatoContratoDevolucion('Recibo');
						$("#modalDevolucion").modal("show");
					}

				})
			}else
			{
				mensajeError('Error al devolver contrato');
			}		
		}
	})
}
//Consultar todos los contratos----------------------------------------------------------------------------

function consultarTodosContratos()
{
	var sucursal = $("#sucursalContrato").val();
	var datos = new FormData();
	datos.append("valorConsultar", "valor");
	datos.append("sucursal", sucursal);
	let plantilla2 = " ";
	$.ajax({
		url:rutaOculta+"ajax/administracionFormato.ajax.php",
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
					var resultFecha = res2.fechaContrato.split(" ");
					var resultadoId = returnFactura(res2.idContrato,5,"0");
					if (res2.estadoContrato == "A") 
					{
						var resultadoEstado = "Activo";
						plantilla2 += `
			              <tr>
			                    <b><th scope="row">${resultadoId}</th></b>
			                    <td>${res2.cedulaPersona}</td>	
			                    <td>${resultFecha[0]}</td>
			                    <td>${resultadoEstado}</td>
			                    <td><a href="javascript:mostrarDetalleContrato(${res2.idContrato})"><i class="fas fa-search"></i></a></td>
			              </tr><br>`;	
					}else
					{
						var resultadoEstado = "Devuelto";
						plantilla2 += `
			              <tr class="devuelto">
			                    <b><th scope="row">${resultadoId}</th></b>
			                    <td>${res2.cedulaPersona}</td>
			                    <td>${resultFecha[0]}</td>
			                    <td>${resultadoEstado}</td>
			                    <td><a href="javascript:mostrarDetalleContrato(${res2.idContrato})"><i class="fas fa-search text-white"></i></a></td>
			              </tr><br>`;
					}
				}
				$("#tablaContratoTodos").html(plantilla2);  
				$('#tablaContratoTodos').show();
			}else
			{
				$("#tablaContratoTodos").hide(); 
			}
		}
	})
}

function consultarFormatoContratoDevolucion(parametro)
{
  var nombreCliente = $("#cliente").text();
  var cedulaCliente = $("#cedula").text();
  var cantidadEstante = $("#cantidadEstante").text();
  var cantidadBotellones = $("#cantidadBotellon").text();
  var hoy = new Date();
  var fecha = hoy.getDate() + '-' + ( hoy.getMonth() + 1 ) + '-' + hoy.getFullYear();
  var datos = new FormData();
  datos.append("parametro", parametro);

  let plantilla2 = " ";
  let obj
  $.ajax({
    url:rutaOculta+"ajax/formatoContrato.ajax.php",
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

      plantilla2 +='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 m-2" id="">'
      for(var i=0;i<auxSplit2.length;i++)
      {
        if(!auxSplit2[i].includes("}"))
        {
          auxSplit2[i] = auxSplit2[i]+"}";
        }
        var res2 = JSON.parse(auxSplit2[i]);
        if (res2.descripcion.includes("NombreCliente")) 
        {
          
              result = res2.descripcion.replace("NombreCliente",nombreCliente);
              result = result.replace("cedulaCliente", cedulaCliente);
              result = result.replace("cantidadEstante", cantidadEstante);   
              result = result.replace("cantidadBotellones", cantidadBotellones);  
              result = result.replace("fechaSistema", fecha);    
   
              plantilla2 += result;
        }
      }
      $("#cuerpoModalDevolucion").html(plantilla2);  
      $('#cuerpoModalDevolucion').show();
    }else
    {
      $("#cuerpoModalDevolucion").hide();     
    }
  }
})
}


$(".cerrarModalDevolucion").click(function(){
	$("#modalDevolucion").modal("hide");
});