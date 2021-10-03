<?php
    $url2 = Ruta::ctrlRuta();  
  $objetoAdminPais= new ControladorRegistroAdmin();
	$variable = $objetoAdminPais->consultarPais();
?>

<form method="post" id="formulario" autocomplete="off" class="m-5 fp-5">
	<h1 class="text-center">Administracion Pais </h1>
	<div class="m-5 p-5">
	<table class="table m-3 p-3">
  <thead>
    <tr>
      <th scope="col" class="display-6">Pais</th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"><button class="mb-2 ms-5 mt-2 btn btn-primary me-5" type="button" id="guardarPais">Adicionar Pais</button></th>
    </tr>
  </thead>
  <tbody>
  	<?php for($i=0;$i<count($variable);$i++){
      
    ?>
    <tr>
      <th scope="row" class="bg-light text-dark ms-5 mt-5 me-5 p-3 rounded display-6"><?php echo $variable[$i];?></th>
    </tr>
	<?php } ?>
  </tbody>
</table>
</div>
</form>

