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
            <li class="breadcrumb-item"><a href="http://localhost/aguaMineral/reportePrincipal" class="link-primary" id="anterior">Reportes</a></li>
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
            <p class="card-text text-start fs-5">Activos <b class="ms-4" id="">150</b></p>
            <p class="card-text text-start fs-5">Devueltos <b class="ms-2" id="">500</b></p>
          </div>
        </div>
        <div>
        </div>
      </div>
        <div class="row mb-5">
           <div class="col-md-4 ms-3">
          <label for="" class="ms-3 mb-3">Seleccione la sucursal</label>
          <select name="" id="sucursal" class="form-select">
            <option selected>Seleccione</option>
          <?php foreach ($resultadoConsultarSucursal as $key): ?>
          <option value="<?php echo $key['idSucursal']?>"><?php echo $key['nombreSucursal']?></option>
        <?php endforeach ?>
        </select>
        </div>
        <div class="col-md-3 ms-3">
        </div>
         <div class="col-md-4 ms-3">
          <label for="" class="ms-3 mb-3 mt-0">Seleccione el producto</label>
          <select name="" id="tipoProducto" class="form-select">
            <?php foreach ($resultadoConsultarTipoProducto as $key): ?>
              <option value="<?php echo $key['idTipoProducto']?>"><?php echo $key['descripcion']?></option>
            <?php endforeach ?>
        </select>
        </div>


        
        
        <!---========================================  
        ZONAS POR CLIENTES 
        ===========================================-->

        <canvas id="graficoContrato" width="20" height="10" class="mt-3 p-3"></canvas> 
        </div>
        <div class="row mb-5">
        <div class="col-md-4 ms-3">
        </div>
        <div class="col-md-3 ms-3">
          <label for="" class="ms-3 mb-3 mt-0">Seleccione el año</label>
          <select name="" id="sucursal" class="form-select">
            <option selected>Seleccione</option>
            <option value="1">2021</option>
        </select>
        </div>
         <div class="col-md-4 ms-3">
        </div>      
        <div class="row" id="filas">
        </div>

    </div>

    <div id="tablaEsconder">
     <div class="row g-3">
        <div class="col-md-2">
        </div>
        <div class="col-md-3">
        </div>
        <div class="col-md-3">
        </div>
        <div class="card col-md-3 bg-light text-center">
          <div class="card-body p-4">
            <h5 class="card-title fs-3">Total Prestamo en Parroquia</h5>
            <p class="card-text text-start fs-5">Estantes <b class="ms-4" id="estanteTotal"></b></p>
            <p class="card-text text-start fs-5">Botellones <b class="ms-2" id="botellonTotal"></b></p>
          </div>
        </div>
        <div>
        </div>
      </div>


      <table class="table table-sm ms-0 me-5 mt-0 p-5 fs-6" id="tablaCentro">
        <thead class="cabezaTabla text-white">
    <tr>
      <th scope="col">Identificación</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Comercio</th>
      <th scope="col">Sector</th>
      <th scope="col">Detalle</th>
    </tr>
  </thead>
  <tbody id="fila">
  </tbody>
      </table>
  </div>
</section>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="reporte">
  <div class="modal-dialog modal-lg">
    <div class="modal-content fondoModal">
      <div class="row">
        <i class="fas fa-times text-white eliminar fs-5 ms-3 mt-2" id="close"></i>
        <div class="col-md-10 me-5 ms-5 mt-0 mb-3 p-5 text-center">
          <div class="card ms-5 w-100 me-3 fs-6">
            <h5 class="card-header cabezaTabla text-white"><b class="fs-5">Detalle Contrato</b></h5>
            <div class="card-body fondoModal">
              <div class="row g-3">
                <div class="col-auto">
                  <label for="inputPassword6" class="col-form-label me-3"><b>Cliente:</b></label>
                </div>
                <div class="col-md-3">
                  <p class="mt-1 fs-5 me-0 ms-5" id="cliente"></p>
                </div>   
                <div class="col-md-1"></div>
                <div class="col-auto eliminar">
                  <label for="inputPassword6" class="col-form-label me-1 ms-5"><b>Comercio:</b></label>
                </div>
                <div class="col-md-2">
                  <p class="mt-1 fs-5 me-0 ms-3" id="comercio"></p>
                </div>   
              </div>  
              <div class="row g-3">
                <div class="col-auto">
                  <label for="inputPassword6" class="col-form-label me-0"><b>Identificacion:</b></label>
                </div>
                <div class="col-md-3">
                  <p class="mt-1 fs-5 me-0 ms-0" id="cedula"></p>
                </div>   
                <div class="col-md-1"></div>
                <div class="col-auto eliminar">
                  <label for="inputPassword6" class="col-form-label me-0 ms-3"><b>Telefono:</b></label>
                </div>
                <div class="col-md-3">
                  <p class="mt-1 fs-5 me-5 ms-3" id="telefono"></p>
                </div>   
              </div>
              <div class="row g-3">
                <div class="col-auto">
                  <label for="inputPassword6" class="col-form-label me-2"><b>Dirección:</b></label>
                </div>
                <div class="col-md-5">
                  <p class="mt-1 fs-5 me-5 ms-0" id="direccion"></p>
                </div>   
                <div class="col-md-4"></div>
                <div class="col-md-3"></div>
              </div>    
            </div>
          </div>
          <table class="table table-sm ms-5 me-5 mt-0 p-5 fs-6 mb-0" id="tablaCentro">
        <thead class="cabezaTabla text-white">
        <tr>
          <th scope="col" class="col-md-4">Fecha Contrato</th>
          <th scope="col" class="col-md-4">Estantes Prestados</th>
          <th scope="col" class="col-md-4">Botellones Prestados</th>
        </tr>
      </thead>
      <tbody id="fila2">
      </tbody>
      </table> 
        </div>
      </div>
    </div>  
    </div>
  </div>
</div>
<script>
  var graficoContrato = document.getElementById("graficoContrato");

Chart.defaults.global.defaultFontFamily = "Lato";
Chart.defaults.global.defaultFontSize = 12;

var densityData = {
  label: 'Contratos Activos',
  data: [127, 168 ,152, 68, 127, 163 ,152,542, 524, 551, 393, 136, 68],
  backgroundColor: 'rgba(0, 99, 132, 0.6)',
  borderWidth: 0,
  yAxisID: "y-axis-density"
};

var gravityData = {
  label: 'Contratos Devueltos',
  data: [200, 300, 150, 70, 150, 150, 140, 400 ,524, 551, 393, 136, 68],
  backgroundColor: 'rgba(99, 132, 0, 0.6)',
  borderWidth: 0,
  yAxisID: "y-axis-gravity"
};

var planetData = {
  labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Agosto","Septiembre", "Octubre", "Noviembre", "Diciembre"],
  datasets: [densityData, gravityData]
};

var chartOptions = {
  scales: {
    xAxes: [{
      barPercentage: 1,
      categoryPercentage: 0.6
    }],
    yAxes: [{
      id: "y-axis-density"
    }, {
      id: "y-axis-gravity"
    }]
  }
};

var nuevaBarra = new Chart(graficoContrato, {
  type: 'bar',
  data: planetData,
  options: chartOptions
});
</script>