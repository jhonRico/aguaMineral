<?php  
    $consultar = "Hola";
    $consultarCiudades = controladorZonas::ctrlconsultarCiudades($consultar);
    $resultado = ControladorClientes::ctrlConsultarTipoUsuario("Cliente");
    $rutas = explode("/", $_GET["ruta"]);
?>
<input type="hidden" id="informacion" value="<?php echo $rutas[0];?>">
<input type="hidden" value="<?php echo $resultado['idTipoUsuario']; ?>" id="tipoUsuario">
<div class="container-fluid blogs text-center">
    <div class="container mt-3 fs-5">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="http://localhost/aguaMineral/zonas" class="link-primary">Zonas</a></li>
            <li class="breadcrumb-item active" aria-current="page" class="">Sur</li>
          </ol>
        </nav>
    </div>
  
  <section class="home-section"> 
      <h1 class="mt-5 mb-5 display-6">Zona Sur</h1>

      <div class="row g-3 align-items-center">
        <div class="col-auto">
          <label for="inputPassword6" class="col-form-label me-3"><b>Seleccione Ciudad</b></label>
        </div>
        <div class="col-md-3">
          <select name="" id="centro" class="form-select w-75">
            <?php foreach ($consultarCiudades as $key): ?>
            <option value="<?php echo $key['idCiudad']; ?>"><?php echo $key['nombreCiudad']; ?></option>
          <?php endforeach ?>
          </select>
        </div>
      </div>

      <table class="table table-hover mt-3" id="tablaCentro">
        <thead class="bg-light">
    <tr>
      <th scope="col">Cedula</th>
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
  </section>

 
</div>