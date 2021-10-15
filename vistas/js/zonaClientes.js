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
        for(var i=0;i<auxSplit2.length;i++)
        {
          if(!auxSplit2[i].includes("}"))
          {
            auxSplit2[i] = auxSplit2[i]+"}";
          }
          var res2 = JSON.parse(auxSplit2[i]);

          plantilla2 += `
          <tr>
                <b><th scope="row">${res2.cedulaPersona}</th></b>
                <td>${res2.nombrePersona}</td>
                <td>${res2.apellidoPersona}</td>
                <td>${res2.nombreTienda}</td>
                <td>${res2.nombreSector}</td>
                <td><a href=""><i class="fas fa-search"></i></a></td>
          </tr><br>`;
        }

        $("#fila").html(plantilla2); 
        $("#fila").show();

      }else
      {
        $("#fila").hide();  
        Swal.fire({
          possition: 'button',
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