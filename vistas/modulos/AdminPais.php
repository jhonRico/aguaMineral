<?php
  $resultado=null;
  $url2 = Ruta::ctrlRuta();  
  $objetoAdminPais= new ControladorRegistroAdmin();
	$resultado = $objetoAdminPais->consultarPais();
?>
<body class="bg-light">
<form method="post" id="formulario" autocomplete="off" class="m-5 fp-5">
	<h1 class="text-center me-3 mt-3">Administracion Pais</h1>
	<div class="m-5 p-5">

    <table class="table m-3 p-3">
    <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col" class="ms-5"><h3 class="display-6 ms-3">Pais</h3></th>
      <th></th>
      <th></th>
      <th scope="col">
        <div class="me-5 ms-0">
          <div class="me-5">
            <div class="me-5">
              <div class="me-5">
                <button class="mb-2 ms-0 mt-2 btn btn-warning me-5 text-white" type="button" id="guardarPais">Agregar</button>  
              </div>
            </div>
          </div>
        </div>
      </th>
    </tr>
   </thead>
</table> 
<div class="bg-light ms-5">
  <div class="ms-5">
    <div class=" w-100 rounded ms-5">
       <div class="text-dark m-3 p-2 mb-1 rounded ms-5" id="respuestaCons"></div>
    </div>
  </div>

</div>  
</div>
</form>
</body>

