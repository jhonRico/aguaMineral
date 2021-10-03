<?php
    $url2 = Ruta::ctrlRuta();  
	$variable = ControladorRegistroAdmin::consultarPais();
?>

<form method="post" id="formulario" autocomplete="off">
	<h1 class="text-center">Administracion Pais</h1>
</form>
<div class="bg-light text-dark ms-5 mt-5 me-5 p-3 rounded display-6"><?php echo $variable[1]?></div>