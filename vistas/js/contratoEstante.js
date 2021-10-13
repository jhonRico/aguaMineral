//Ocultar Formulario de Contrato Estante
$(document).ready(function() {
  $('.contratoEstante').hide();
});

//mostrar formulario dependiendo del parametro
function mostrarContrato(parametro,idTipoUsuario){
  $('.contratoEstante').show();
  if (parametro == "botellones") 
  {
    $('#cajasContrato').hide();
    $('#titulo').hide();
    $('#menuCajas').hide();
    $('#TituloPrincipalContrato').text('Crear contrato botellon');
    $('#cantidadBotellones').hide();
    $('#capacidad').hide();
    $('#labelDescripcion').hide();
    $('#labelCantidadEstantes').text('Cantidad de botellones');
    $('#inputCity').attr('placeholder', 'Por favor ingrese la cantidad de botellones');
    $( ".boton1" ).click(function() {
     validarCampos(parametro,idTipoUsuario);
   });

  }else if (parametro == "ambos") 
  {
    $('#cajasContrato').hide();
    $('#titulo').hide();
    $('#menuCajas').hide();
    $('#TituloPrincipalContrato').text('Crear contrato de botellon y estante');
    var input =  `<div class="form-group col-md-3 text-center">
    <label for="inputCity" class="mt-4" id="labelCantidadEstantes">Cantidad de Botellones</label>
    <input type="number" min="1" class="form-control mt-3" id="cantidadBotellones" placeholder="Cantidad de botellones">
    </div>`;
    $('#colocarInput').html(input); 
    $('#colocarInput').show();
    $( ".boton1" ).click(function() {
     validarCampos(parametro,idTipoUsuario);
   });

  }else
  {
    $('#cajasContrato').hide();
    $('#titulo').hide();
    $('#menuCajas').hide();
    $( ".boton1" ).click(function() {
     validarCampos(parametro,idTipoUsuario);
   });
  }

}
/*LLamar a la funcion cada vez que se oprime una tecla*/

$("#yes").click(function ocultar(){

  //Ocultar Inputs

  $("#direccionComercio").attr('type', 'hidden');
  $("#estadoComercio").hide();
  $("#ciudadComercio").hide();
  $("#zonaComercio").hide();
  $("#municipioComercio").hide();
  $("#sectorComercio").hide();
  $("#labelEstadoComercio").hide();
  $("#labelZonaComercio").hide();
  $("#labelSectorComercio").hide();
  $("#labelMunicipioComercio").hide();
  $("#labelCiudadComercio").hide();
  $("#labelDireccionComercio").hide();
  $("#labelComercio").hide();
  $("#no").attr('type', 'hidden');
  $("#ocultar").hide();

  //Dar Valor a los inputs

  $("#direccionComercio").val($("#direccionCliente").val())
  $("#estadoComercio").val($("#estadoCliente").val());
  $("#municipioComercio").val($("#municipioCliente").val());
  $("#ciudadComercio").val($("#ciudadCliente").val());
  $("#zonaComercio").val($("#zonaCliente").val());
  $("#sectorComercio").val($("#sectorCliente").val());

  $("#yes").click(function(){
    mostrarInputs();

  })

})
//Vlover a mostrar inputs
function mostrarInputs()
{  

  $("#direccionComercio").attr('type', 'text');
  $("#estadoComercio").show();
  $("#ciudadComercio").show();
  $("#zonaComercio").show();
  $("#municipioComercio").show();
  $("#sectorComercio").show();
  $("#labelEstadoComercio").show();
  $("#labelZonaComercio").show();
  $("#labelSectorComercio").show();
  $("#labelMunicipioComercio").show();
  $("#labelCiudadComercio").show();
  $("#labelDireccionComercio").show();
  $("#labelComercio").show();
  $("#no").attr('type', 'checkbox');
  $("#ocultar").show();
}


$("#cedulaCliente").keyup(function(){
  consultarClienteEnBd();
});

//Validar que los campos no sean vacios y compararlos con su respectiva expresion regular

function validarCampos(parametro,idTipoUsuario)
{
  var nombre = $('#nombreCliente').val();
  var apellido = $('#apellidoCliente').val();
  var sectorCliente = $('#sectorCliente').val();
  var direccion = $('#direccion').val();
  var comercio = $("#nobreComercio").val();
  var cedula = $('#cedulaCliente').val();
  var telefono = $('#telefonoComercio').val();
  var direccionComercio = $('#direccionComercio').val();
  var cantidadEstantes = $('#cantidadEstantes').val();
  var sectorComercio = $('#sectorComercio').val();
  if (cedula == '') 
  {
   Swal.fire({
    position: 'top-end',
    icon: 'error',
    toast: true,
    title: 'Ingrese una cédula',
    showConfirmButton: false,
    timerProgressBar: true,
    timer: 1500
  })        
   return false;
     }
     if (!expresiones.telefono.test(cedula)) 
     {
      Swal.fire({
        position: 'top-end',
        icon: 'error',
        toast: true,
        title: 'Ingrese una cedula válida',
        showConfirmButton: false,
        timerProgressBar: true,
        timer: 1500
      })        
      return false;
    }
    if (nombre == "") 
    {
     Swal.fire({
      position: 'top-end',
      icon: 'error',
      toast: true,
      title: 'Ingrese un nombre',
      showConfirmButton: false,
      timerProgressBar: true,
      timer: 1500
    })        
     return false;
    }
    if (!expresiones.nombre.test(nombre)) 
    {
      Swal.fire({
        position: 'top-end',
        icon: 'error',
        toast: true,
        title: 'Ingrese un nombre válido',
        showConfirmButton: false,
        timerProgressBar: true,
        timer: 1500
      })        
      return false;
    }
    if (apellido == '') 
    {
     Swal.fire({
      position: 'top-end',
      icon: 'error',
      toast: true,
      title: 'Ingrese un apellido',
      showConfirmButton: false,
      timerProgressBar: true,
      timer: 1500
    })        
     return false;
    }
    if (!expresiones.nombre.test(apellido)) 
    {
     Swal.fire({
      position: 'top-end',
      icon: 'error',
      toast: true,
      title: 'Ingrese un apellido válido',
      showConfirmButton: false,
      timerProgressBar: true,
      timer: 1500
    })        
     return false;
    }
    if (sectorCliente == '') 
    {
     Swal.fire({
      position: 'top-end',
      icon: 'error',
      toast: true,
      title: 'Ingrese un sector',
      showConfirmButton: false,
      timerProgressBar: true,
      timer: 1500
    })        
     return false;
    }
    if (!expresiones.nombre.test(sectorCliente)) 
    {
      Swal.fire({
        position: 'top-end',
        icon: 'error',
        toast: true,
        title: 'Ingrese un sector válido',
        showConfirmButton: false,
        timerProgressBar: true,
        timer: 1500
      })        
      return false;
    }
    if (direccion == '') 
    {
     Swal.fire({
      position: 'top-end',
      icon: 'error',
      toast: true,
      title: 'Ingrese un dirección',
      showConfirmButton: false,
      timerProgressBar: true,
      timer: 1500
    })        
     return false;
    }
    if (comercio == '') 
    {
      Swal.fire({
        position: 'top-end',
        icon: 'error',
        toast: true,
        title: 'Ingrese un comercio',
        showConfirmButton: false,
        timerProgressBar: true,
        timer: 1500
      })        
      return false;
    }
    if (!expresiones.nombre.test(comercio)) 
    {
      Swal.fire({
        position: 'top-end',
        icon: 'error',
        toast: true,
        title: 'Ingrese un comercio válido',
        showConfirmButton: false,
        timerProgressBar: true,
        timer: 1500
      })        
      return false;
    }
    if (telefono == '') 
    {
     Swal.fire({
      position: 'top-end',
      icon: 'error',
      toast: true,
      title: 'Ingrese una telefono',
      showConfirmButton: false,
      timerProgressBar: true,
      timer: 1500
    })        
     return false;
    }
    if (!expresiones.telefono.test(telefono)) 
    {
      Swal.fire({
        position: 'top-end',
        icon: 'error',
        toast: true,
        title: 'Ingrese un teléfono válido',
        showConfirmButton: false,
        timerProgressBar: true,
        timer: 1500
      })        
      return false;
    }
    if (sectorComercio == '') 
    {
     Swal.fire({
      position: 'top-end',
      icon: 'error',
      toast: true,
      title: 'Ingrese el sector del comercio',
      showConfirmButton: false,
      timerProgressBar: true,
      timer: 1500
    })        
     return false;
    }
    if (!expresiones.nombre.test(sectorComercio)) 
    {
      Swal.fire({
        position: 'top-end',
        icon: 'error',
        toast: true,
        title: 'Ingrese un sector válido',
        showConfirmButton: false,
        timerProgressBar: true,
        timer: 1500
      })        
      return false;
    }
    if (direccionComercio == '') 
    {
     Swal.fire({
      position: 'top-end',
      icon: 'error',
      toast: true,
      title: 'Ingrese la dirección del comercio',
      showConfirmButton: false,
      timerProgressBar: true,
      timer: 1500
    })        
     return false;
    }
    if (cantidadEstantes == '') 
    {
     Swal.fire({
      position: 'top-end',
      icon: 'error',
      toast: true,
      title: 'Ingrese una cantidad',
      showConfirmButton: false,
      timerProgressBar: true,
      timer: 1500
    })        
     return false;
    }
    if (isNaN(cantidadEstantes) == true) 
    {
     Swal.fire({
      position: 'top-end',
      icon: 'error',
      toast: true,
      title: 'Ingrese una cantidad válida',
      showConfirmButton: false,
      timerProgressBar: true,
      timer: 1500
    })        
     return false;
    }

    consultarProductosDisponibles(parametro,idTipoUsuario);

    return true;

}


function mostrarModal(parametro,idTipoUsuario)
{
 consultarFormatoContrato(parametro);
 //registrarContrato(parametro);
 registrarPersonas(parametro,idTipoUsuario);
 $("#modal2").modal("show");
}

$(function(){
 $(".cerrar").click(function(){
  $("#modal2").modal("hide");
})
})

function consultarClienteEnBd()
{

  var nombre = $('#cedulaCliente').val();
  var datos = new FormData();
  datos.append("nombreCliente", nombre);

  $.ajax({
    url:"//localhost/aguaMineral/ajax/formatoContrato.ajax.php",
    method:"POST",
    data: datos, 
    cache: false,
    contentType: false,
    processData: false,
    success: function(respuesta3)
    {
      if(!respuesta3.includes("false"))
      {
        respuesta3 =respuesta3.replace("[","");
        respuesta3 =respuesta3.replace("]","");
        var auxSplit2 = respuesta3.split("},");

        for(var i=0;i<auxSplit2.length;i++){
          if(!auxSplit2[i].includes("}")){
            auxSplit2[i] = auxSplit2[i]+"}";
          }
          var res2 = JSON.parse(auxSplit2[i]);
        }
        consultarCamposDeTienda(res2.idPersona);
        $('#nombreCliente').val(res2.nombrePersona);
        $('#apellidoCliente').val(res2.apellidoPersona);
        $('#direccion').val(res2.direccionPersona);
        $('#cedulaCliente').val(res2.cedulaPersona);


        Swal.fire({
          position: 'top-end',
          icon: 'success',
          toast: true,
          title: 'El cliente ya existe',
          showConfirmButton: false,
          timerProgressBar: true,
          timer: 1500
        })        
      }else
      {
        $('#nombreCliente').val('');
        $('#apellidoCliente').val('');
        $('#direccion').val('');
        $("#nobreComercio").val('');
        $('#direccionComercio').val('');
        $('#telefonoComercio').val('');
      }
    }
  })
}
function consultarCamposDeTienda(id)
{
  var datos = new FormData();
  datos.append("idCliente", id);
  $.ajax({
    url:"//localhost/aguaMineral/ajax/formatoContrato.ajax.php",
    method:"POST",
    data: datos, 
    cache: false,
    contentType: false,
    processData: false,
    success: function(respuesta3)
    {
      if(!respuesta3.includes("false"))
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
        }
        $("#nobreComercio").val(res2.nombreTienda);
        $('#direccionCliente').val(res2.direccionTienda);
        $('#telefonoComercio').val(res2.telefonoTienda);
      }
    }
  });    

}
//Consultar que si hallan productos
function consultarProductosDisponibles(parametro,idTipoUsuario)
{
  var dato = "Activar"
  var datos = new FormData();
  datos.append("dato", dato);
  datos.append("parametros", parametro);

  let plantilla2 = " ";
  let obj
  $.ajax({
    url:"//localhost/aguaMineral/ajax/formatoContrato.ajax.php",
    method:"POST",
    data: datos, 
    cache: false,
    contentType: false,
    processData: false,
    success: function(respuesta3)
    {
     if(!respuesta3.includes('false'))
     {     
        mostrarModal(parametro,idTipoUsuario);

     }else
     {
          if (parametro == 'ambos') 
          {
              Swal.fire({
                position: 'top-end',
                icon: 'error',
                toast: true,
                title: 'El producto no se encuentra disponible en estos momentos',
                showConfirmButton: false,
                timerProgressBar: true,
                timer: 1500
              }) 
          }else
          {
            Swal.fire({
              position: 'top-end',
              icon: 'error',
              toast: true,
              title: 'No hay '+parametro+' '+'disponibles',
              showConfirmButton: false,
              timerProgressBar: true,
              timer: 1500
            }) 
          }
     }
    }
  })
}
function consultarFormatoContrato(parametro)
{
  var datos = new FormData();
  datos.append("parametro", parametro);

  let plantilla2 = " ";
  let obj
  $.ajax({
    url:"//localhost/aguaMineral/ajax/formatoContrato.ajax.php",
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

      plantilla2 +='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 m-2" id="">'
      for(var i=0;i<auxSplit2.length;i++)
      {
        if(!auxSplit2[i].includes("}"))
        {
          auxSplit2[i] = auxSplit2[i]+"}";
        }
        var res2 = JSON.parse(auxSplit2[i]);
        if (res2.descripcion.includes("NombreCliente")) 
        {
          result = res2.descripcion.replace("NombreCliente",$('#nombreCliente').val()+' '+$('#apellidoCliente').val());
          result = result.replace("cedulaCliente",$('#cedulaCliente').val());
          result = result.replace("nombreComercio",$('#nobreComercio').val());
          result = result.replace("MunicipioCliente",$('#municipioComercio').val());
          result = result.replace("municipioCliente",$('#municipioComercio').val());
          result = result.replace("telefonoComercio",$('#telefonoComercio').val());
          result = result.replace("direccionComercio",$('#direccionComercio').val());
          result = result.replace("cantidadEstante",$('#cantidadEstantes').val());
          result = result.replace("cantidadBotellones",$('#cantidadEstantes').val());
          result = result.replace("codigoProducto",$('#serial').val());  
          result = result.replace("fechaConstruccion",$('#fechaProducto').val());        


          plantilla2 += result;
        }
      }
      plantilla2 +='</div>'
      $("#cuerpoContrato").html(plantilla2);  
      $('#cuerpoContrato').show();
    }else
    {
      $("#cuerpoContrato").hide();     
    }


  }
})
}

//registrar persona, tienda y contrato en BD despues de haber generado contrato
function registrarPersonas(parametro,idTipoUsuario)
{

  //Guardando valores en variables
  var nombre = $('#nombreCliente').val();
  var apellido = $('#apellidoCliente').val();
  var sectorCliente = $('#sectorCliente').val();
  var estadoCliente = $('#estadoCliente').val();
  var municipioCliente = $('#municipioCliente').val();
  var ciudadCliente =  $('#ciudadCliente').val();
  var estadoComercio = $('#estadoComercio').val();
  var municipioComercio = $('#municipioComercio').val();
  var ciudadComercio =  $('#ciudadComercio').val();
  var zonaComercio = $('#zonaComercio').val();
  var zonaCliente = $('#zonaCliente').val();
  var direccionCliente = $('#direccionCliente').val();
  var comercio = $("#nobreComercio").val();
  var cedula = $('#cedulaCliente').val();
  var telefono = $('#telefonoComercio').val();
  var direccionComercio = $('#direccionComercio').val();
  var sectorComercio = $('#sectorComercio').val();
  var cantidadEstantes = $('#cantidadEstantes').val();

  var datos = new FormData();

//Datos de Persona
  datos.append("nombre", nombre);
  datos.append("idTipoUsuario", idTipoUsuario);
  datos.append("apellido", apellido);
  datos.append("cedula", cedula);
  datos.append("estadoCliente", estadoCliente);
  datos.append("municipioCliente", municipioCliente);
  datos.append("ciudadCliente", ciudadCliente);
  datos.append("zonaCliente", zonaCliente);
  datos.append("sectorCliente", sectorCliente);
  datos.append("direccionCliente", direccionCliente);
  
//Datos de Tienda
  datos.append("comercio", comercio);
  datos.append("telefono", telefono);
  datos.append("estadoComercio", estadoComercio);
  datos.append("municipioComercio", municipioComercio);
  datos.append("ciudadComercio", ciudadComercio);
  datos.append("zonaComercio", zonaComercio);
  datos.append("sectorComercio", sectorComercio);
  datos.append("direccionComercio", direccionComercio);
  datos.append("cantidadEstantes", cantidadEstantes);

//Datos de contrato

  datos.append("idTipoContrato", parametro);



  $.ajax({
    url:"//localhost/aguaMineral/ajax/formatoContrato.ajax.php",
    method:"POST",
    data: datos, 
    cache: false,
    contentType: false,
    processData: false,
    async:false,
    success: function(respuesta)
    {
      alert(respuesta);
      if(respuesta.includes("error"))
      {
        Swal.fire({
          title: 'Error',
          text: 'Error al registrar Contrato',
          icon: 'error',
          showCloseButton: true,
          confirmButtonText:'Aceptar'
        }); 
      }else if(respuesta.includes("ok"))
      {
        Swal.fire({
          title: 'Registro Exitoso de Cliente y Contrato',
          icon: 'success',
          showCloseButton: true,
          confirmButtonText:'Aceptar'
        })
      }
    }                 
  })
}


//Registrar Usuario despues de generar el contrato

function mostrarFoter(){
  $(".pie").show();  
}

function imprimirContrato()
{
    $(".pie").hide();  
    window.print();
    setTimeout(mostrarFoter,2000);
}