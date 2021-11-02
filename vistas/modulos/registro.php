<?php
$url2 = Ruta::ctrlRuta();  
?>		

<div class="container mt-3 fs-5">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="http://localhost/aguaMineral/adminUsuarios" class="link-primary">Personas</a></li>
            <li class="breadcrumb-item active" aria-current="page" class="">Crear Cuenta</li>
          </ol>
        </nav>
    </div>



<div class="form-group col-md-6">
	<input type="hidden" placeholder="Por favor Ingrese un telefono" class="form-control w-75 ms-5 mt-3" id="telefono" name="nombre" value="">
</div>
<div class="form-group col-md-6">
	<input type="hidden" placeholder="Por favor Ingrese una dirección" class="form-control w-75 ms-5 mt-3" id="direccion" name="nombre" value="">
</div>	
<div class="form-group col-md-6">
	<input type="hidden" placeholder="Por favor Ingrese un telefono" class="form-control w-75 ms-5 mt-3" id="sector" name="nombre" value="1">
</div>	

<form method="post" id="formulario" autocomplete="off" novalidate="">
	<div class="container">
		<div class="col">
			<h2 class="text-center mt-3 mb-5 me-5">Crea una Cuenta</h2>							
			<div class="row">
				<div class="form-group col-md-6 ">
					<label for="" class="ms-5 mt-3 form-label">Nombre</label>
					<input type="text" placeholder="Por favor Ingrese un nombre" class="form-control w-75 ms-5 mt-3" id="nombre" name="nombre">
				</div>	
				<div class="form-group col-md-6">
					<label for="" class="ms-5 mt-3 form-label">Apellido</label>
					<input type="text" placeholder="Por favor Ingrese un apellido" class="form-control w-75 ms-5 mt-3" id="apellido" name="nombre">
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-6">
					<label for="" class="ms-5 mt-3 form-label">Nombre Usuario</label>
					<input type="text" placeholder="Por favor Ingrese un nombre usuario" class="form-control w-75 ms-5 mt-3" id="correo" name="nombre">
				</div>	
				<div class="form-group col-md-6">
					<label for="" class="ms-5 mt-3 form-label">Cédula</label>
					<input type="text" placeholder="Por favor Ingrese un cedula" class="form-control w-75 ms-5 mt-3" id="cedula" name="nombre">
				</div>

			</div>
			<div class="row mt-3">

				<div class="form-group col-md-6">
					<label for="" class="ms-5 mt-3 form-label">Contraseña</label>
					<input type="password" placeholder="Por favor Ingrese un contraseña" class="form-control w-75 ms-5 mt-3" id="contrasena" name="nombre">
				</div>		
				<div class="form-group col-md-6">
					<label for="" class="ms-5 mt-3 form-label">Repetir Contraseña</label>
					<input type="password" placeholder="Por favor repita la contraseña" class="form-control w-75 ms-5 mt-3" id="repiteContrasena" name="nombre">
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-6">
					<label for="" class="ms-5 mt-3 form-label">Perfil de Usuario</label>
					<select class="form-select w-75 ms-5 mt-3" id="tipoUsuario">
						<option value="1">Administrador</option>
						<option value="2">Empleado</option>
						<option value="3">Cliente</option>
					</select>
				</div>
			</div>

			<div class="row container-fluid text-center ms-5">
				<div class="form-group col-md-8 ms-5">
					<input type="button" placeholder="Por favor repita la contraseña" class="form-control d-grid btn-sm btn-primary mt-5 mb-3 ms-5" id="registrar" name="nombre" value="Registrar">
				</div>
			</div>
		</div>
	</div>
</form>
