//Reidreccionar pagina y volver la descripcion solo minusculas
function redireccionarPaginaZonas(descripcion)
{
  result = descripcion.toLowerCase();
  window.location.replace("http://localhost/aguaMineral/"+result);
}

$(document).ready(function(){ 
  rutaActual = window.location.toString();
  if(rutaActual.includes("centro") || rutaActual.includes("norte") || rutaActual.includes("sur") || rutaActual.includes("este") || rutaActual.includes("oeste")){      
    consultarClientesEnBd();
  }
});

$(document).ready(function() 
{
    $('#tablaEsconder').hide();
    $('#contenedorClientes').hide();
    $('#ciudad').on('change', function() 
    {
      var ciudad = $('#ciudad').val()
      consultarParroquias(ciudad);
    })
});

function consultarParroquias(ciudad)
{
  var datos = new FormData();
  datos.append("ciudadAConsultar", ciudad);
  let plantilla2 = " ";
  $.ajax({
    url:"//localhost/aguaMineral/ajax/clientes.ajax.php",
    method:"POST",
    data: datos, 
    cache: false,
    contentType: false,
    processData: false,
    success: function(respuesta3)
    {         
        if(respuesta3.length >10 )
        {
        respuesta3 =respuesta3.replace("[","");
        respuesta3 =respuesta3.replace("]","");
        var auxSplit2 = respuesta3.split("},");

        for(var i=0;i<auxSplit2.length;i++)
        {
          if(!auxSplit2[i].includes("}"))
          {
            auxSplit2[i] = auxSplit2[i]+"}";
          }
          var res2 = JSON.parse(auxSplit2[i]);
           plantilla2 += `
                <div class="col-md-6">
                <a href="javascript: ejecutarFuncion(${res2.idParroquia},'${res2.nombreParroquia}')" class="link-dark">
                <div class="border m-3 p-3 bg-light div-admin rounded">
                <i class="fas fa-street-view iconosAdmin"></i>
                <h3 class="titulosAdmin mb-0">${res2.nombreParroquia}</h3>
                <p class="mb-5 mt-0">Clientes de la zona ${res2.nombreParroquia}</p>  
                </div>
                </a>
                </div>`;
        }
        $("#filas").html(plantilla2);  
        $('#filas').show();

      }else
      {
        $("#filas").hide();
        $("#filas").hide();  
        Swal.fire({
          position: 'button',
          icon: 'info',
          toast: true,
          title: 'No hay parroquias en esta ciudad',
          showConfirmButton: false,
          timerProgressBar: true,
          timer: 2000,
        }) 
      }
    }
  })
}

function ejecutarFuncion(id,descripcion)
{
  $('#contenedorZonasClientes').hide();
  $('#anterior').text('Clientes');
  $('#anterior').attr('href', 'http://localhost/aguaMineral/zonas');
  $('#tituloClientes').text('Clientes de '+descripcion);
  $('#contenedorClientes').show();
  $('#tablaEsconder').show();
  consultarClientesEnBd(id,descripcion);
}

function consultarClientesEnBd(id,descripcion)
{
  var tipoUsuario = $("#tipoUsuario").val();
  var zona = descripcion;
  var datos = new FormData();
  datos.append("zona", zona);
  datos.append("tipoUsuario", tipoUsuario);
  let plantilla2 = " ";
  $.ajax({
    url:"//localhost/aguaMineral/ajax/clientes.ajax.php",
    method:"POST",
    data: datos, 
    cache: false,
    contentType: false,
    processData: false,
    success: function(respuesta3)
    { 
       if(respuesta3.length >10 )
       {
        respuesta3 =respuesta3.replace("[","");
        respuesta3 =respuesta3.replace("]","");
        var auxSplit2 = respuesta3.split("},");
        var resultadoFinal = 0;
        var resultadoFinal2 = 0;
        var registroAnterior = 0;
        for(var i=0;i<auxSplit2.length;i++)
        {
          if(!auxSplit2[i].includes("}"))
          {
            auxSplit2[i] = auxSplit2[i]+"}";
          }
          var res2 = JSON.parse(auxSplit2[i]);
          if (registroAnterior == res2.cedulaPersona) 
          {
            plantilla2 += "";
          }else
          {
             plantilla2 += `
              <tr>
                    <b><th scope="row">${res2.cedulaPersona}</th></b>
                    <td>${res2.nombrePersona}</td>
                    <td>${res2.apellidoPersona}</td>
                    <td>${res2.nombreTienda}</td>
                    <td>${res2.nombreSector}</td>
                    <td><a href="javascript:mostrarModalReporte(${res2.idPersona},'${zona}')"><i class="fas fa-search"></i></a></td>
              </tr><br>`;
          }
         
          registroAnterior = Number(res2.cedulaPersona);
          var result = Number(res2.cantidadProd);
          var result2 = Number(res2.cantidadProd_2);

          resultadoFinal = result + resultadoFinal;
          plantilla3 = `<p>${resultadoFinal}</p>`;

          resultadoFinal2 = result2 + resultadoFinal2;
          plantilla4 = `<p>${resultadoFinal2}</p>`;

        }
       // plantilla3 = `<p>${resultadoFinal}</p>`;

        $("#estanteTotal").html(plantilla3); 
        $("#estanteTotal").show();

        $("#botellonTotal").html(plantilla4); 
        $("#botellonTotal").show();

        $("#fila").html(plantilla2); 
        $("#fila").show();

      }else
      {
        $("#estanteTotal").hide();
        $("#botellonTotal").hide();
        $("#fila").hide();  
        Swal.fire({
          position: 'button',
          icon: 'info',
          toast: true,
          title: 'No hay clientes en esta zona',
          showConfirmButton: false,
          timerProgressBar: true,
          timer: 2000,
        }) 
      }
    }
  })
}

function consultarCliente(idPersona,descripcion)
{
  var tipoUsuario = $("#tipoUsuario").val();
  var zona = descripcion;
  var datos = new FormData();
  datos.append("idPersona", idPersona);
  datos.append("zonas", zona);
  datos.append("ciudad", ciudad);
  datos.append("tipoUsuario", tipoUsuario);
  alert(zona);
  $.ajax({
    url:"//localhost/aguaMineral/ajax/clientes.ajax.php",
    method:"POST",
    data: datos, 
    cache: false,
    contentType: false,
    processData: false,
    success: function(respuesta3)
    { 
       if(respuesta3.length >10 )
       {
        respuesta3 =respuesta3.replace("[","");
        respuesta3 =respuesta3.replace("]","");
        var auxSplit2 = respuesta3.split("},");
        var plantilla2;
        var resultadoFinal = 0;
        var resultadoFinal2 = 0;
        var registroAnterior = 0;
        for(var i=0;i<auxSplit2.length;i++)
        {
          if(!auxSplit2[i].includes("}"))
          {
            auxSplit2[i] = auxSplit2[i]+"}";
          }

          var res2 = JSON.parse(auxSplit2[i]);
          var array = res2.fechaContrato.split(" ");
          plantilla2 = `
              <tr>
                    <td><b>${array[0]}</b></td>
                    <td><b>${res2.cantidadProd}</b></td>
                    <td><b>${res2.cantidadProd_2}</b></td>
              </tr><br>`;

        }
        

       // plantilla3 = `<p>${resultadoFinal}</p>`;
        $('#cliente').text(res2.nombrePersona+' '+res2.apellidoPersona);
        $('#comercio').text(res2.nombreTienda);
        $('#cedula').text(res2.cedulaPersona);
        $('#direccion').text(res2.direccionPersona);
        $('#telefono').text(res2.telefonoPersona);
        $("#fila2").html(plantilla2); 
        $("#fila2").show();

      }else
      {
        $("#fila2").hide();  
        Swal.fire({
          position: 'button',
          icon: 'info',
          toast: true,
          title: 'No hay clientes en esta zona',
          showConfirmButton: false,
          timerProgressBar: true,
          timer: 2000,
        }) 
      }
    }
  })
}

function mostrarModalReporte(id,descripcion)
{
  consultarCliente(id,descripcion);
  $("#reporte").modal("show");
}
$(document).ready(function() {
  $("#close").click(function(event) {
    $("#reporte").modal("hide");
  });
});

    
 