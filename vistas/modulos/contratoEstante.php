<!--  
BANNER
-->
<?php
$url = Ruta::ctrlRuta();    
if(isset($_SESSION["id"])){

  $idUsu = $_SESSION["id"];
}else{
  $idUsu = 10;
}

?>

<div class="Home ms-5"></div>
  <div class="container-fluid well well-sm barraProductos p-5 text-center col-md-12 ms-5">
        <h1 class="tituloContratos text-dark ms-4">Crear contrato estante</h1>
  </div>
  <div class="container-fluid p-3 ms-5" >
    <div class="container ms-5">

     <ul class="listasfullC ms-5 p-5" >
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center" > 
       <form class="ms-5">
        <!-- inicio datos del cliente -->

        <div class="row">
          <div class="form-group col-md-6">
            <label for="inputEmail4" class="mb-3">C&eacute;dula del cliente</label>
            <input type="text" class="form-control mb-3" id="cedulaCliente" placeholder="C&eacute;dula">
          </div>
          <div class="form-group col-md-6">
            <label for="inputEmail4">Nombre del cliente</label>
            <input type="text" class="form-control mt-3" id="nombreCliente" placeholder="Nombre">
          </div>
          
        </div>

        <div class="row">
          <div class="form-group col-md-6">
            <label for="inputPassword" class="mt-3">Apellido del cliente</label>
            <input type="text" class="form-control mt-3" id="apellidoCliente" placeholder="Apellido">
          </div>
          <div class="form-group col-md-6">
            <label for="inputState" class="mt-3">Municipio de residencia</label>
            <select id="inputState" class="form-select mt-3">
              <option selected>Cardenas</option>
              <option selected>San cristobal</option>                                        
            </select>
          </div>
        </div>

        <div class="row">
         <div class="form-group col-md-12">
          <label for="inputAddress" class="mt-3">Direcci&oacute;n del cliente</label>
          <input type="text" class="form-control mt-3" id="direccion" placeholder="Direcci&oacute;n del cliente">
        </div>
      </div>

      <!-- Fin datos del cliente -->

      <div class="row">
        <div class="form-group col-md-6">
          <label for="inputPassword" class="mt-3">Nombre del comercio</label>
          <input type="text" class="form-control mt-3" id="nobreComercio" placeholder="Nombre del comercio">
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword" class="mt-3">T&eacute;lefono del comercio</label>
          <input type="text" class="form-control mt-3" id="telefono" placeholder="T&eacute;lefono del comercio">
        </div>

        <div class="form-group col-md-12">
          <label for="inputAddress" class=" mt-3">Direcci&oacute;n del comercio</label>
          <input type="text" class="form-control mt-3" id="direccionComercio" placeholder="Direcci&oacute;n del comercio">
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-6">
          <label for="inputCity" class="mt-3">Cantidad de estantes</label>
          <input type="text" class="form-control mt-3" id="inputCity" placeholder="Cantidad de estantes">
        </div>

        <div class="form-group col-md-6">
          <label for="inputState" class=" mt-3">Descripci&oacute;n</label>
          <select id="cantidadBotellones" class="form-select mt-3">
            <option selected>Estante de 6 botellones</option>
            <option selected>Estante de 8 botellones</option>                                
          </select>
        </div>

      </div>

      <button type="button" class="btn btn-primary botonContrato boton1 mb-5 mt-3" data-toggle="modal"  id="boton1">
        Generar
      </button>
      <br>

    </br>

  </div>
  </ul>

  </div>
  </div>





<!-- ==========================
VENTANA MODAL PARA EL REGISTRO
=============================-->
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="modal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <?php 
      date_default_timezone_set("America/Argentina/Buenos_Aires");
                          //Dia-Mes-A�o Hora:Minutos:Segundos
      $fecha = date("d-m-Y H:i:s");
      echo '<div id="cuerpoContrato"></div><div class="estiloDiv"><h class="justificadoTotal">'.fechaCastellano($fecha).'</h></div>';

      function fechaCastellano ($fecha) {
        $fecha = substr($fecha, 0, 10);
        $numeroDia = date("d", strtotime($fecha));
        $dia = date("l", strtotime($fecha));
        $mes = date("F", strtotime($fecha));
        $anio = date("Y", strtotime($fecha));
        $dias_ES = array("Lunes", "Martes", "Mi&eacutercoles", "Jueves", "Viernes", "S&aacutebado", "Domingo");
        $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
        $nombredia = str_replace($dias_EN, $dias_ES, $dia);
        $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
        return $nombredia." ".$numeroDia." de ".$nombreMes." de ".$anio;
      }
      ?>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary cerrar">Cerrar</button>
        <button type="button" class="btn btn-primary">Generar</button>
        <button type="button" class="btn btn-primary">Imprimir</button>
      </div>
    </div>
  </div>
</div>