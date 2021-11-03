<?php 
  $url2 = Ruta::ctrlRuta(); 
  $consultar = "consultar";
  $consultaZonas = controladorZonas::ctrlZonas($consultar); 
  $resultadoConsultarSucursal = ControladorFormatoContrato::ctrlConsultarTotalProductosPrestados("sucursal");
  $resultadoConsultarTipoProducto = ControladorFormatoContrato::ctrlConsultarTotalProductosPrestados("tipoproducto");
  $resultado = ControladorClientes::ctrlConsultarTipoUsuario("Cliente");
?>

<input type="hidden" value="<?php echo $resultado['idTipoUsuario']; ?>" id="tipoUsuario">
<section class="home-section">
    <div class="container mt-3 fs-5">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo $url2;?>reportePrincipal" class="link-primary" id="anterior">Reportes</a></li>
            <li class="breadcrumb-item active" aria-current="page" class="">Reporte de Contrato</li>
          </ol>
        </nav>
    </div>
    </div>
    <div class="container-fluid blogs text-center" id="contenedorClientes">
        <h1 class="mt-5 mb-5" id="tituloClientes"></h1>
    </div>
    <div class="container-fluid blogs text-center" id="contenedorZonasClientes">
    	  <h1 class="mt-5 mb-5">Reporte de Contrato</h1>
        <div class="row g-3">
        <div class="col-md-2">
        </div>
        <div class="col-md-3">
        </div>
        <div class="col-md-3">
        </div>
        <div class="card col-md-3 bg-light text-center">
          <div class="card-body p-4">
            <h5 class="card-title fs-3">Contratos</h5>
            <p class="card-text text-start fs-5">Activos<b class="ms-5" id="contratosActivos"></b></p>
            <p class="card-text text-start fs-5">Devueltos<b class="ms-4" id="contratosDevueltos"></b></p>
          </div>
        </div>
        <div>
        </div>
      </div>
       <div class="row mb-5">
        <div class="col-md-4 ms-3">
        </div>
         <div class="col-md-3 ms-3">
          <label for="" class="ms-3 mb-3 mt-0">Seleccione el año</label>
          <select name="" id="fechaReporteContrato" class="form-select">
          </select>
        </div>
        <div class="col-md-5 ms-3">
        </div>
      </div>
      <canvas id="graficoContrato" width="20" height="10" class="mt-3 p-3"></canvas> 
    </div>

</section>