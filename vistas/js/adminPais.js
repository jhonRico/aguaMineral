/*------Cuando carga la pagina de pais consulta los paises registrados*/
$(document).ready(function(){ 
		 rutaActual = window.location.toString();
		 if(rutaActual.includes("adminPais")){   
				consultarTodosPaises();

		 }
});
$(document).ready(function(){ 
		 rutaActual = window.location.toString();
		 if(rutaActual.includes("adminPais#")){   
				consultarTodosPaises();
				Swal.fire("Presionaste Eliminar");
		 }
});


/*------consulta todos los paises*/
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
																									plantilla2 +='<div class="p-2">'
																																												 
																									plantilla2 +='                      <h3 class="div-pais p-3 rounded">'+res2.descripcion+'<a href="javascript:eliminar('+res2.idPais+')" class=""><button class="btn eliminarPais eliminar text-danger"><i class="fas fa-trash-alt"></i></button></a><a href="javascript:modificar('+res2.idPais+')" class=""><button class="btn eliminarPais eliminar text-primary"><i class="fas fa-pencil-alt"></i></button></a></h3>'

																									plantilla2 +='   </div>'
		
																						}
																				 plantilla2 +='</div>'
																				$("#respuestaCons").html(plantilla2);  
																				$('#respuestaCons').show();
																	 }

											}
								 })
 }

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
 //Modificar
 function modificar(id)
 {
 		Swal.fire({
			title: 'Modificar',
			input: 'text',
				inputPlaceholder: "Por favor ingrese un pais",
				inputAttributes: {
					autocapitalize: 'off'
				},
				showCancelButton: true,
				confirmButtonText: 'Modificar',
		}).then((result) => {
			if (result.isConfirmed){
				var descripcion = result.value;
					 if (descripcion == "") 
					{
						Swal.fire({
								title: 'Error',
								text: 'Por favor ingrese un pais',
								icon: 'error',
								showCloseButton: true,
								confirmButtonText:'Aceptar'
						});
					 return false;
					 }
					 if (!expresiones.nombre.test(descripcion)) 
					 {
							Swal.fire({
								title: 'Error',
								text: 'El Pais tiene que contener de 3 a 16 digitos y solo puede tener letras y tildes.',
								icon: 'error',
								showCloseButton: true,
								confirmButtonText:'Aceptar'
							})
							return false;
					  }
				modificarPais(id, descripcion);
				consultarTodosPaises();
			}
		})
 }

//Validar Registro de Usuario

$(function(){
		 $("#guardarPais").click(function(){
			Swal.fire({
				title: 'Registrar Pais',
				input: 'text',
				inputPlaceholder: "Por favor ingrese un pais",
				inputAttributes: {
					autocapitalize: 'off'
				},
				showCancelButton: true,
				confirmButtonText: 'Registrar',
				}).then((result) => {
				if (result.isConfirmed) 
				{
					 var valor = result.value;
					 if (valor == "") 
					{
						Swal.fire({
								title: 'Error',
								text: 'Por favor ingrese un pais',
								icon: 'error',
								showCloseButton: true,
								confirmButtonText:'Aceptar'
						});
					 return false;
					 }
					 if (!expresiones.nombre.test(valor)) 
					 {
							Swal.fire({
								title: 'Error',
								text: 'El Pais tiene que contener de 3 a 16 digitos y solo puede tener letras y tildes.',
								icon: 'error',
								showCloseButton: true,
								confirmButtonText:'Aceptar'
							})
							return false;
					  }

					 
					validarRegistroExistente(valor);
	

				}
				
})

			});
 });


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
															});
													}

										 }                 

							})
}

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
                                title: 'Error',
                                text: 'El pais ya existe',
                                icon: 'error',
                                showCloseButton: true,
                                confirmButtonText:'Aceptar'
                              });
                          }

										 }                 

							})
}

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
															});
													}

										 }                 

							})
}

