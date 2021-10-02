<?php
    $url2 = Ruta::ctrlRuta();  
?>

<form method="post" id="formulario" autocomplete="off">
	<div class="container">
		<div class="row bg-light ms-3 me-3 p-5 rounded mb-3">
			<div class="col">
				<h1 class="ms-0 me-3 mt-3 mb-5 h2 d-flex d-flex justify-content-center p-3">Crea una cuenta</h1>
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
														<label for="" class="ms-5 mt-3 form-label">Nombre</label>
														<input type="text" placeholder="Por favor Ingrese un nombre" class="form-control w-50 ms-5 mt-3" id="nombre" name="nombre">
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
														<label for="" class="ms-5 mt-3 form-label">Apellido</label>
														<input type="text" placeholder="Por favor Ingrese un apellido" class="form-control w-50 ms-5 mt-3 d-flex justify-content-center" id="apellido" name="apellido">
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
														<label for="" class="ms-5 mt-3 form-label">dirección</label>
														<input type="text" placeholder="Por favor Ingrese una dirección" class="form-control w-50  ms-5 mt-3" id="direccion" name="direccion">
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
														<label for="" class="ms-5 mt-3 form-label">Cédula</label>
														<input type="text" placeholder="Por favor Ingrese su cédula" class="form-control w-50  ms-5 mt-3" id="cedula" name="cedula">
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
														<label for="" class="ms-5 mt-3 form-label">telefono</label>
														<input type="text" placeholder="Por favor Ingrese un telefono" class="form-control w-50  ms-5 mt-3 " id="telefono" name="telefono">
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
														<label for="" class="ms-5 mt-3 form-label">Correo</label>
														<input type="email" placeholder="Por favor Ingrese un correo" class="form-control w-50  ms-5 mt-3" id="correo" name="correo">
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
														<label for="" class="form-label ms-5">Sector</label>
														<select class="form-select  w-50  ms-5 mt-3" aria-label="Default select example" id="sector">
					 									    <option value="1">La Romera</option>
															<option value="2">Carabobo</option>
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
														<label for="" class="ms-5 mt-3 form-label">Tipo de Usuario</label>
														<select class="form-select  w-50  ms-5 mt-3" aria-label="Default select example" id="tipoUsuario">
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
														<label for="" class="ms-5 mt-3 form-label">Nombre de Usuario</label>
														<input type="text" placeholder="Por favor Ingrese un nombre de Usuario" class="form-control w-50  ms-5 mt-3" id="usuario" name="sector">
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
															<label for="" class="ms-5 mt-3 form-label">Contraseña</label>
															<input type="password" placeholder="Por favor Ingrese un contraseña" class="form-control w-50  ms-5 mt-3" id="contrasena" name="contrasena">
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
															<label for="" class="ms-5 mt-3 form-label">Repetir Contraseña</label>
															<input type="password" placeholder="Por favor repita la contraseña" class="	form-control w-50  ms-5 mt-3" id="repiteContrasena" name="repiteContrasena">
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
															<input type="button" placeholder="Por favor Ingrese un contraseña" class="form-control w-50  ms-5 mt-3 btn btn-primary" id="registrar" name="contrasena" value="Registrar">
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
	</div>
</form>
