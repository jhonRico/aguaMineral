<?php
    $url2 = Ruta::ctrlRuta();  
	  //$variable = ControladorRegistroAdmin::consultarPais();
?>
<body class="bg-light">
<form method="post" id="formulario" autocomplete="off" class="m-5 fp-5">
	<h1 class="text-center">Tipo de Usuario</h1>
	<div class="m-5 p-5">
	<table class="table m-3 p-3">
  <thead>
    <tr>
      <th scope="col" class="display-6">Descripción</th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"><button class="mb-2 ms-5 mt-2 btn btn-primary me-5" type="button" id="guardarTipoUsuario">Adicionar</button></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="col" class="text-dark ms-5 mt-5 me-5 p-3 rounded display-6">Administrador</th>
    </tr>
    <tr>
      <th scope="col" class="text-dark ms-5 mt-5 me-5 p-3 rounded display-6">Empleado</th>
    </tr>
    <tr>
      <th scope="col" class="text-dark ms-5 mt-5 me-5 p-3 rounded display-6">Representante Legal</th>
    </tr>
  </tbody>
</table>
</div>
</form>
</body>
