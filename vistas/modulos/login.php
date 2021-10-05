<?php
$url2 = Ruta::ctrlRuta();  
?>			
					


<form method="post" id="formulario" autocomplete="off" novalidate="">
<div class="container">
						<div class="col">
							<h2 class="text-center mt-3 mb-5">Iniciar Sesión</h2>							
							<div class="row">
								<div class="form-group col-md-6">
									<label for="" class="ms-5 mt-3 form-label">Tipo de Usuario</label>
									<select name="" id="tipoDeUsuario" class="form-select w-75 ms-5 mt-3">
										<option value="1">Administrador</option>
										<option value="2">Empleado</option>
										<option value="3">Representante Legal</option>
									</select>								
								</div>	
								<div class="form-group col-md-6">
									<label for="" class="ms-5 mt-3 form-label">Correo</label>
									<input type="text" placeholder="Por favor Ingrese un correo" class="form-control w-75 ms-5 mt-3" id="correo" name="nombre">
								</div>	
								<div class="form-group col-md-6">
									<label for="" class="ms-5 mt-5 form-label">Contraseña</label>
									<input type="password" placeholder="Por favor Ingrese un contraseña" class="form-control w-75 ms-5 mt-3 mb-5" id="password" name="nombre">
								</div>
							</div>

							<div class="row container-fluid text-center ms-5">
								<div class="form-group col-md-8 ms-5">
									<input type="button" placeholder="Por favor repita la contraseña" class="form-control d-grid btn-sm btn-primary mt-5 mb-3 ms-5" id="ingresar" name="nombre" value="Registrar">
								</div>
							</div>
						</div>
					</div>
</form>
