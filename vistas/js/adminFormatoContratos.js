
$(document).ready(function(){ 
	rutaActual = window.location.toString();
	if(rutaActual.includes("adminFormatoEstantes")){   		
		consultarFormatoEstante();
	}else if(rutaActual.includes("adminFormatoBotellones")){
	    consultarFormatoBotellon();
	}else if(rutaActual.includes("adminFormatoAmbos")){
	    consultarFormatoAmbos();
	}
});

function consultarFormatoAmbos(){
	
		var datos = new FormData();
	datos.append("consultarAmbos", "Ambos");
	let plantilla2 = " ";
	let obj
	$.ajax({
		url:"//localhost/aguaMineral/ajax/administracionFormato.ajax.php",
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
		url:"//localhost/aguaMineral/ajax/administracionFormato.ajax.php",
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
		url:"//localhost/aguaMineral/ajax/administracionFormato.ajax.php",
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
	
		function miFuncionAmbos(idFormato){
	       var descripcion = $("#formateAmbos").val();		
			if (descripcion == "") 
 			{
 				mensajeError('El campo esta vacio');
 				return false;
 			}
			 actualizarRegistroAmbos(idFormato);
		
	}

function actualizarRegistroAmbos(idFormato)
{
	var datos = new FormData();
	datos.append("ambos", $("#formateAmbos").val());
	datos.append("idFormato", idFormato);
	$.ajax({
		url:"//localhost/aguaMineral/ajax/administracionFormato.ajax.php",
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
					title: 'Se actualiza de forma  Exitosa',
					icon: 'success',
					showCloseButton: true,
					confirmButtonText:'Aceptar'
				}).then((result) => 
				{
					if (result.isConfirmed)
					{
						window.location.href =  '//localhost/aguaMineral/adminFormatos';
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
		url:"//localhost/aguaMineral/ajax/administracionFormato.ajax.php",
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
					title: 'Se actualiza de forma  Exitosa',
					icon: 'success',
					showCloseButton: true,
					confirmButtonText:'Aceptar'
				}).then((result) => 
				{
					if (result.isConfirmed)
					{
						window.location.href =  '//localhost/aguaMineral/adminFormatos';
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
		url:"//localhost/aguaMineral/ajax/administracionFormato.ajax.php",
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
					title: 'Se actualiza de forma  Exitosa',
					icon: 'success',
					showCloseButton: true,
					confirmButtonText:'Aceptar'
				}).then((result) => 
				{
					if (result.isConfirmed)
					{
						window.location.href =  '//localhost/aguaMineral/adminFormatos';
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
	$(".cerrar").click(function(){
		
		$("#modalVistaPreviaAmbos").modal("hide");
	})
})
