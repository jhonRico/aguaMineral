<?php 
$url2 = Ruta::ctrlRuta();  

?>


<section class="home-section">
  <div class="contratoEstante">
       <ul class="listasfullC ms-5 p-5" >
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center me-0" > 
         <form class="ms-0">
          <!-- inicio datos del cliente -->
          <nav aria-label="breadcrumb" class="fs-5">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="http://localhost/aguaMineral/contratoPrincipal" class="link-primary">Contratos</a></li>
              <li class="breadcrumb-item active" aria-current="page" class="">Contrato Estante</li>
            </ol>
          </nav>

          <div class="container-fluid well well-sm barraProductos p-5 text-center col-md-12 ms-2 me-4">
            <h1 class="tituloContratos text-dark ms-0 me-5" id="TituloPrincipalContrato">Crear contrato estante</h1>
          </div>

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
              <label for="inputAddress" class="mt-3">Estado del cliente</label>
              <select id="inputState" class="form-select mt-3">
                <option selected>T&aacute;chira</option>
                <option selected>M&eacute;rida</option> 
                <option selected>Barinas</option>                                          
              </select>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-4">
              <label for="inputState" class="mt-3">Municipio de residencia</label>
              <select id="municipioCliente" class="form-select mt-3">
                <option selected>Cardenas</option>
                <option selected>San cristobal</option>                                        
              </select>
            </div>
            <div class="form-group col-md-4">
              <label for="inputState" class="mt-3">Ciudad de residencia</label>
              <select id="ciudadCliente" class="form-select mt-3">
                <option selected>San Cristobal</option>                                     
              </select>
            </div>
            <div class="form-group col-md-4">
              <label for="inputState" class="mt-3">Zona ciudad</label>
              <select id="zonaCliente" class="form-select mt-3">
                <option selected>Norte</option>                                     
              </select>
            </div>
          </div>

          <!-- Fin datos del cliente -->

          <div class="row">
            <div class="form-group col-md-3">
              <label for="inputAddress" class="mt-3">Sector</label>
              <input type="text" class="form-control mt-3" id="sectorCliente" placeholder="Ej: Las lomas, El lobo...">
            </div>
            <div class="form-group col-md-9">
              <label for="inputAddress" class="mt-3">Direcci&oacute;n del cliente</label>
              <input type="text" class="form-control mt-3" id="direccionCliente" placeholder="Direcci&oacute;n del cliente">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
              <label for="inputPassword" class="mt-3">Nombre del comercio</label>
              <input type="text" class="form-control mt-3" id="nobreComercio" placeholder="Nombre del comercio">
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword" class="mt-3">T&eacute;lefono del comercio</label>
              <input type="text" class="form-control mt-3" id="telefonoComercio" placeholder="T&eacute;lefono del comercio">
            </div>

            <div class="form-group col-md-12">
              <label for="inputAddress" class=" mt-3"><b>Direcci&oacute;n del comercio</b></label>
              <p>&iquest;La direccion del comercio es la misma de la residencia?</p>
              <label for="">Si</label>
              <input type="checkbox" class="form-check-input me-5" id="yes">
              <label for="" id="ocultar">No</label>
              <input type="checkbox" class="form-check-input" id="no" checked="true">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
              <label for="" class="form-label mt-3" id="labelEstadoComercio">Estado del Comercio</label>
              <select id="estadoComercio" class="form-select mt-3">
                <option>T&aacute;chira</option>
                <option>M&eacute;rida</option> 
                <option>Barinas</option>                                          
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="" class="form-label mt-3" id="labelMunicipioComercio">Municipio del Comercio</label>
              <select id="municipioComercio" class="form-select mt-3">
                <option>San Cristóbal</option>
                <option>Cardenas</option> 
                <option>Bolívar</option>                                          
              </select>
            </div>   
          </div>  
          <div class="row">
            <div class="form-group col-md-9">
              <label for="inputState" class="mt-3" id="labelCiudadComercio">Ciudad del comercio</label>
              <select id="ciudadComercio" class="form-select mt-3">
                <option>San Cristobal</option>                                     
              </select>
            </div>
            <div class="form-group col-md-3">
              <label for="inputState" class="mt-3" id="labelZonaComercio">Zona del comercio</label>
              <select id="zonaComercio" class="form-select mt-3">
                <option>Centro</option>  
                <option>Sur</option>  
                <option>Este</option>  
                <option>Oeste</option>                                     
              </select>
            </div>
          </div>    
          <div class="row">
            <div class="form-group col-md-3">
              <label for="inputAddress" class="mt-3" id="labelSectorComercio">Sector Comercio</label>
              <input type="text" class="form-control mt-3" id="sectorComercio" placeholder="Ej: Las lomas, El lobo...">
            </div>
            <div class="form-group col-md-9">
              <label for="inputAddress" class="mt-3" id="labelDireccionComercio">Direcci&oacute;n del comercio</label>
              <input type="text" class="form-control mt-3" id="direccionComercio" placeholder="Direcci&oacute;n del comercio">
            </div>
          </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
              <label for="inputCity" class="mt-4" id="labelCantidadEstantes">Cantidad de estantes</label>
              <input type="number" min="1" class="form-control mt-3" id="inputCity" placeholder="Cantidad de estantes">
            </div>
            <div class="form-group col-md-6">
              <label for="inputState" class="mt-4" id="labelDescripcion">Descripci&oacute;n</label>
              <select id="cantidadBotellones" class="form-select mt-3">
                <option selected>Estante de 6 botellones</option>
                <option selected>Estante de 8 botellones</option>                              
              </select>
            </div>

          </div>
          <div id="colocarInput"> 
            
          </div>
          <div class="row">
            <div class="col-md-4">
            </div>    
            <div class="col-md-4 text-center">
              <button type="button" class="btn btn-primary mt-5 w-75 boton1">
              Generar
              </button>
            </div>   
            <div class="col-md-4">
            </div>   
          </div>
      </div>
    </ul>
</div>
<div id="cajasContrato" class="text-center">
  <div class="container mt-3 fs-5">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="http://localhost/aguaMineral/principal" class="link-primary">Principal</a></li>
              <li class="breadcrumb-item active" aria-current="page" class="">Contratos</li>
            </ol>
          </nav>
        </div>
        <h1 class="mb-3 mt-3">Contratos</h1>
        <ul class="grid0">
          <div class="row">
           <div class="col-md-4">
            <a href="javascript:mostrarContrato('estantes')" class="link-dark">
              <div class="border m-3 p-3 bg-light div-admin rounded">
                <i class="fas fa-file-contract iconosAdmin"></i>
                <h3 class="titulosAdmin2 mb-0">Estante</h3>
                <p class="mb-5 mt-0">Contrato para estantes</p>  
              </div>
            </a>
          </div>
          <div class="col-md-4">
            <a href="javascript:mostrarContrato('botellones')" class="link-dark">
              <div class="border m-3 p-3 bg-light div-admin rounded">
                <i class="fas fa-file-signature iconosAdmin"></i>
                <h3 class="titulosAdmin2 mb-0">Botellon</h3>
                <p class="mb-5 mt-0">Contrato para botellones</p>  

              </div>
            </a>
          </div>
          <div class="col-md-4">
            <a href="javascript:mostrarContrato('ambos')" class="link-dark">
              <div class="border m-3 p-3 bg-light div-admin rounded">
                <i class="fas fa-file-contract iconosAdmin"></i>
                <h3 class="titulosAdmin2 mb-0">Ambos</h3>
                <p class="mb-5 mt-0">Clientes para botellones y estantes</p> 
              </div>
            </a>
          </div>
        </div>
      </ul>  
    </div>
    </div>
  </section>









<!-- ==========================
VENTANA MODAL PARA EL REGISTRO
=============================-->
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade bd-example-modal-lg bg-white" id="modal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg w-100 h-100">
    <div class="bg-white modal-content border-0">
      <?php 
      date_default_timezone_set("America/Argentina/Buenos_Aires");
                          //Dia-Mes-A�o Hora:Minutos:Segundos
      $fecha = date("d-m-Y H:i:s");
      echo '<div id="content"><div id="cuerpoContrato"></div><div class="estiloDiv"><h class="justificadoTotal">'.fechaCastellano($fecha).'</h></div></div>

<div id="elementH"></div>';

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
      <div class="modal-footer pie">
        <button type="button" class="btn btn-secondary cerrar">Cerrar</button>
        <a href="javascript:imprimirContrato()"><button class="btn btn-primary" type="button">Imprimir</button></a>
      </div>
    </div>
  </div>
</div>