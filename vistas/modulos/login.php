<?php
$url2 = Ruta::ctrlRuta();  
?>			

<form method="post" id="formulario" autocomplete="off" novalidate="">
<div class="container">
						<div class="col">
							<h2 class="text-center mt-5 mb-5 me-5">Iniciar Sesión</h2>							
							<div class="row">
									
								<div class="form-group col-md-6">
									<label for="" class="ms-5 mt-5 form-label">Correo</label>
									<input type="text" placeholder="Por favor Ingrese un correo" class="form-control w-75 ms-5 mt-3" id="correo" name="nombre">
								</div>	
								<div class="form-group col-md-6">
									<label for="" class="ms-5 mt-5 form-label">Contraseña</label>
									<input type="password" placeholder="Por favor Ingrese un correo" class="form-control w-75 ms-5 mt-3 mb-3" id="password" name="nombre">
								</div>	
							</div>

							<div class="row container-fluid text-center ms-5">
								<div class="form-group col-md-8 ms-5">
									<input type="button" placeholder="Por favor repita la contraseña" class="form-control d-grid btn-sm btn-primary mt-5 mb-3 ms-5" id="ingresar" name="nombre" value="Ingresar">
								</div>
							</div>
						</div>
					</div>
</form>
