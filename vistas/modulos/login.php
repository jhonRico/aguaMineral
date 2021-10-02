<?php
$url2 = Ruta::ctrlRuta();  

?>
<form method="post" id="formulario" autocomplete="off">
	<form method="post" id="formulario" autocomplete="off">
		<div class="container">
			<div class="row bg-light ms-3 me-3 p-5 rounded mb-3">
				<div class="col">
					<h1 class="ms-0 me-3 mt-3 mb-5 h2 d-flex d-flex justify-content-center p-3">Inicia Sesión</h1>
					<div class="ms-5">
						<div class="ms-5">
							<div class="ms-5">
								<div class="ms-5">
									<div class="ms-5">
										<div class="ms-5">
											<div class="form-group ms-5">
												<div class="ms-5">
													<div class="ms-5">
														<div class="form-group ms-5">
															<label for="" class="ms-5 mt-3 form-label">Tipo de Usuario</label>
															<select class="form-select  w-50  ms-5 mt-3" aria-label="Default select example" id="tipoDeUsuario">
																<option value="1">Administrador</option>
																<option value="2">Cliente</option>
																<option value="3">Representante Legal</option>

															</select>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="ms-5">
						<div class="ms-5">
							<div class="ms-5">
								<div class="ms-5">
									<div class="ms-5">
										<div class="ms-5">
											<div class="form-group ms-5">
												<div class="ms-5">
													<div class="ms-5">
														<div class="form-group ms-5">
															<label for="" class="ms-5 mt-3 form-label">Usuario</label>
															<input type="text" placeholder="Por favor Ingrese un usuario" class="form-control w-50 ms-5 mt-3" id="user" name="nombre">
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="ms-5">
						<div class="ms-5">
							<div class="ms-5">
								<div class="ms-5">
									<div class="ms-5">
										<div class="ms-5">
											<div class="form-group ms-5">
												<div class="ms-5">
													<div class="ms-5">
														<div class="form-group ms-5">
															<label for="" class="ms-5 mt-3 form-label">Contraseña</label>
															<input type="password" placeholder="Por favor Ingrese una contraseña" class="form-control w-50 ms-5 mt-3 d-flex justify-content-center" id="password" name="apellido">
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="ms-5">
						<div class="ms-5">
							<div class="ms-5">
								<div class="ms-5">
									<div class="ms-5">
										<div class="ms-5">
											<div class="form-group ms-5">
												<div class="ms-5">
													<div class="ms-5">
														<div class="form-group ms-5">
															<div class="form-group">
																<input type="button" placeholder="Por favor Ingrese un contraseña" class="form-control w-50  ms-5 mt-3 btn btn-primary" id="ingresar" name="contrasena" value="Entrar">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
