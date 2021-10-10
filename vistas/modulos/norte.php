<?php  
    $consultar = "Hola";
    $i = 0;
    $nombreComercio = ['RicoPez','CompañiaRicossCross','RicossAvellaneda'];
    $variable = controladorZonas::ctrlconsultarCiudades($consultar);
    $resultadoConsultaClientes = controladorZonas::ctrlconsultarClientes($consultar);
?>


<div class="container mt-3 fs-5">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="http://localhost/aguaMineral/zonas" class="link-primary">Zonas</a></li>
            <li class="breadcrumb-item active" aria-current="page" class="">Norte</li>
          </ol>
        </nav>
    </div>
  <section class="home-section"> 
      <h1 class="mt-5 mb-5 display-6 text-center">Clientes Zona Norte</h1>

      <div class="row g-3 align-items-center">
        <div class="col-auto">
          <label for="inputPassword6" class="col-form-label me-3 ms-3"><b>Seleccione Ciudad</b></label>
        </div>
        <div class="col-md-3">
          <select name="" id="centro" class="form-select w-75">
            <?php foreach ($variable as $key): ?>
            <option value="<?php echo $key['nombreCiudad']; ?>"><?php echo $key['nombreCiudad']; ?></option>
          <?php endforeach ?>
          </select>
        </div>
      </div>

      <table class="table table-hover m-3 p-3" id="tablaCentro">
        <thead class="bg-light">
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Comercio</th>
      <th scope="col">Detalle</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($resultadoConsultaClientes as $value): ?>
    <tr>
      <td><?php echo $value['nombrePersona'];?></td>
      <td><?php echo $value['apellidoPersona'];?></td>
      <td><?php echo $nombreComercio[$i]; $i++;?></td>
      <td><a href="#"><i class="fas fa-search"></i></a></td>
    </tr>
    <?php endforeach ?>
  </tbody>
      </table>
  </section>