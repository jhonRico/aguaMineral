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
    $('#centro').on('change', function() 
    {
      consultarClientesEnBd();
    })
});

function consultarClientesEnBd()
{
  var tipoUsuario = $("#tipoUsuario").val();
  var zona = $("#informacion").val();
  var ciudad = $("#centro").val();
  var datos = new FormData();
  datos.append("zona", zona);
  datos.append("ciudad", ciudad);
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
                    <td><a href="javascript:mostrarModalReporte(${res2.idPersona})"><i class="fas fa-search"></i></a></td>
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

function consultarCliente(idPersona)
{
  var tipoUsuario = $("#tipoUsuario").val();
  var zona = $("#informacion").val();
  var ciudad = $("#centro").val();
  var datos = new FormData();
  datos.append("idPersona", idPersona);
  datos.append("zonas", zona);
  datos.append("ciudad", ciudad);
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
                    <b><th scope="row">${res2.direccionPersona}</th></b>
                    <td>${res2.telefonoPersona}</td>
                    <b><td>${res2.cantidadProd}</td></b>
                    <b><td>${res2.cantidadProd_2}</td></b>
              </tr><br>`;
          }

        }
       // plantilla3 = `<p>${resultadoFinal}</p>`;

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

function mostrarModalReporte(id)
{
  consultarCliente(id);
  $("#reporte").modal("show");
}
    
 