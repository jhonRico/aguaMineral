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
            <li class="breadcrumb-item"><a href="http://localhost/aguaMineral/administracion" class="link-primary" id="anterior">Administración</a></li>
            <li class="breadcrumb-item active" aria-current="page" class="">Bitácora</li>
          </ol>
        </nav>
    </div>
    <div class="container text-center">
      <h1>Bitácora</h1>
    </div>

   <div class="me-5">
   <div class="me-5">
          <table class="table table-sm ms-5 me-5 mt-0 p-5 fs-5 fondoModal">
          <thead class="cabezaTabla text-white">
            <tr>
              <th scope="col">Usuario</th>
              <th scope="col"></th>
              <th scope="col">Fecha</th>
              <th scope="col"></th>
              <th scope="col">Descripción</th>
              <th scope="col"></th>   
            </tr>
          </thead>
          <tbody id="verBitacora">
          </tbody>
        </table>
   </div>
   </div>
</section>