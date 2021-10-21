//Ocultar Formulario de Contrato Estante
$(document).ready(function() {
  $('.contratoEstante').hide();
  rutaActual = window.location.toString();
});

//mostrar formulario dependiendo del parametro
function mostrarContrato(parametro,idTipoUsuario){
  $('.contratoEstante').show();
  if (parametro == "Botellones") 
  {
    $('#cajasContrato').hide();
    $('#titulo').hide();
    $('#menuCajas').hide();
    $('#TituloPrincipalContrato').text('Crear contrato botellon');
    $('#cantidadBotellones').hide();
    $('#capacidadEstantes').hide();
    $('#labelDescripcion').hide();
    $('#labelCantidadEstantes').text('Cantidad de botellones');
    $('#inputCity').attr('placeholder', 'Por favor ingrese la cantidad de botellones');
    $("#labelCapacidadBotellon").hide();
    $("#capacidadBotellon").hide();
    var input =  `
              <label for="inputState" id="labelCapacidadBotellon" class="mt-4" id="labelDescripcion">Capacidad Botellon</label>
              <select class="form-select mt-3" id="capacidadBotellon"> 
    `;
    $('#capacidad').html(input); 
    $('#capacidad').show();
    llenarSelectCapacidad(parametro,'capacidadBotellon');
    $( ".boton1" ).click(function() {
     validarCampos(parametro,idTipoUsuario,'cantidadEstantes','capacidadBotellon');
   });

  }else if (parametro == "Ambos") 
  {
    $('#cajasContrato').hide();
    $('#titulo').hide();
    $('#menuCajas').hide();
    $('#TituloPrincipalContrato').text('Crear contrato de botellon y estante');
    var input =  `
    <label for="inputCity" class="mt-4" id="labelCantidadEstantes">Cantidad de Botellones</label>
    <input type="number" min="1" class="form-control mt-3" id="cantidadBotellones" placeholder="Cantidad de botellones">
    `;
    llenarSelectCapacidad('Estantes','capacidadEstantes');
    llenarSelectCapacidad('Botellones','capacidadBotellon');

    $('#colocarInput').html(input); 
    $('#colocarInput').show();
    $( ".boton1" ).click(function() {
    validarCampos(parametro,idTipoUsuario,'cantidadEstantes','capacidadEstantes');
   });

  }else
  {
    $("#labelCapacidadBotellon").hide();
    $("#capacidadBotellon").hide();
    $('#cajasContrato').hide();
    $('#titulo').hide();
    $('#menuCajas').hide();
    llenarSelectCapacidad(parametro,'capacidadEstantes');
    $( ".boton1" ).click(function() {
     validarCampos(parametro,idTipoUsuario,'cantidadEstantes','capacidadEstantes');
   });
  }

}
//Consultar Selects dependiendo de la opcion
$('#estadoCliente').click(function() {
      estado = $('#estadoCliente').val();
      selector = "municipioCliente";
      tabla = "municipio";
      llenarSelect(estado,selector,tabla,"Estado_idEstado","idMunicipio","nombreMunicipio");
});
$('#ciudadCliente').click(function() {
      estado = $('#ciudadCliente').val();
      selector = "zonaCliente";
      tabla = "parroquia";
      llenarSelect(estado,selector,tabla,"Ciudad_idCiudad","idParroquia","nombreParroquia");
});

$('#municipioCliente').click(function() {
   municipio = $('#municipioCliente').val();
      selector = "ciudadCliente";
      tabla = "ciudad";
      llenarSelect(municipio,selector,tabla,"Municipio_idMunicipio","idCiudad","nombreCiudad");
});

$('#estadoComercio').click(function() {
      estado = $('#estadoComercio').val();
      selector = "municipioComercio";
      tabla = "municipio";
      llenarSelect(estado,selector,tabla,"Estado_idEstado","idMunicipio","nombreMunicipio");
});

$('#municipioComercio').click(function() {
   municipio = $('#municipioComercio').val();
      selector = "ciudadComercio";
      tabla = "ciudad";
      llenarSelect(municipio,selector,tabla,"Municipio_idMunicipio","idCiudad","nombreCiudad");
});
$('#ciudadComercio').click(function() {
      estado = $('#ciudadComercio').val();
      selector = "zonaComercio";
      tabla = "parroquia";
      llenarSelect(estado,selector,tabla,"Ciudad_idCiudad","idParroquia","nombreParroquia");
});
function llenarSelectCapacidad(tipoProductoAConsultar,selector)
{
  var datos = new FormData();
  datos.append("tipoProductoAConsultar", tipoProductoAConsultar);

  let plantilla2 = " ";
  $.ajax({
    url:"//localhost/aguaMineral/ajax/formatoContrato.ajax.php",
    method:"POST",
    data: datos, 
    cache: false,
    contentType: false,
    processData: false,
    success: function(respuesta3)
    { 
       if(respuesta3.length >10)
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
          <option value="${res2.idProducto}">${res2.capacidadProducto}</option>
          `;
        }


        $(`#${selector}`).html(plantilla2); 
        $(`#${selector}`).show();

      }else
      {
        $(`#${selector}`).hide();  
        $(`#${selector}`).val('');
      }
    }
  })
}

function llenarSelect(valorAnterior,selector,tabla,atributo,parametro1,parametro2)
{
  var datos = new FormData();
  datos.append("valorAnterior", valorAnterior);
  datos.append("tablaSelect", tabla);
  datos.append("atributo", atributo);

  let plantilla2 = " ";
  $.ajax({
    url:"//localhost/aguaMineral/ajax/formatoContrato.ajax.php",
    method:"POST",
    data: datos, 
    cache: false,
    contentType: false,
    processData: false,
    success: function(respuesta3)
    { 
       if(respuesta3.length >10)
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
          <option value="${res2[parametro1]}">${res2[parametro2]}</option>
          `;
        }


        $(`#${selector}`).html(plantilla2); 
        $(`#${selector}`).show();

      }else
      {
        $("#fila").hide();  
        $(`#${selector}`).val('');
      }
    }
  })
}

$(document).ready(function() {
  $('#yes').on('change', function() {
        $("#direccionComercio").toggle();
        $("#estadoComercio").toggle();
        $("#ciudadComercio").toggle();
        $("#zonaComercio").toggle();
        $("#municipioComercio").toggle();
        $("#sectorComercio").toggle();
        $("#labelEstadoComercio").toggle();
        $("#labelZonaComercio").toggle();
        $("#labelSectorComercio").toggle();
        $("#labelMunicipioComercio").toggle();
        $("#labelCiudadComercio").toggle();
        $("#labelDireccionComercio").toggle();
        $("#labelComercio").toggle();
        $("#no").toggle();
        $("#ocultar").toggle();
        //Dar Valor a los inputs
        $("#direccionComercio").val($("#direccionCliente").val())
        $("#estadoComercio").val($("#estadoCliente").val());
        $("#municipioComercio").val($("#municipioCliente").val());
        $("#ciudadComercio").val($("#ciudadCliente").val());
        $("#zonaComercio").val($("#zonaCliente").val());
        $("#sectorComercio").val($("#sectorCliente").val());
    });

});
//Consultar cada vez que se presione una tecla

$("#cedulaCliente").keyup(function(){
  consultarClienteEnBd();
});

//Validar que los campos no sean vacios y compararlos con su respectiva expresion regular

function validarCampos(parametro,idTipoUsuario,selector,selector2)
{
  var nombre = $('#nombreCliente').val();
  var apellido = $('#apellidoCliente').val();
  var sectorCliente = $('#sectorCliente').val();
  var direccion = $('#direccionCliente').val();
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

    if (parametro == "Ambos") 
    {
        consultarProductosAmbos(parametro,idTipoUsuario,selector,selector2);
        consultarProductosAmbos(parametro,idTipoUsuario,'cantidadBotellones','capacidadBotellon');
    }else
    {
        idProducto = $(`#${selector2}`).val();
        consultarProductosDisponibles(parametro,idTipoUsuario,selector,selector2);
    }

    return true;

}
var contador = 0;
function consultarProductosAmbos(parametro,idTipoUsuario,selector,selector2)
{
  var cantidad = $(`#${selector}`).val();
  var datos = new FormData();
  var idProducto = $(`#${selector2}`).val();
  var idEstante = $('#capacidadEstantes').val();
  var idBotellon = $('#capacidadBotellon').val()
  var sucursal = $('#sucursal').val();
  datos.append("datoAmbos", cantidad);
  datos.append("parametrosAmbos", idProducto);
  datos.append("idSucursalProductosDisponiblesAmbos", sucursal);

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
        contador++;
        if (contador==2) 
        { 
          registrarContratoAmbos(parametro,idTipoUsuario,idEstante,idBotellon);
        }
      }else
      {
        contador = 0;
         Swal.fire({
                position: 'top-end',
                icon: 'error',
                toast: true,
                title: 'No hay productos disponibles',
                showConfirmButton: false,
                timerProgressBar: true,
                timer: 1500
              });
      }
    }
  })
}

function mostrarModal(parametro,idTipoUsuario,idProducto)
{
 consultarFormatoContrato(parametro);
 registrarPersonas(parametro,idTipoUsuario,idProducto);
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
        $('#direccionCliente').val(res2.direccionPersona);
        $('#cedulaCliente').val(res2.cedulaPersona);
        $('#sectorCliente').val(res2.nombreSector);

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
        $('#direccionComercio').val(res2.direccionTienda);
        $('#ciudadComercio').val(res2.telefonoTienda);
        $('#sectorComercio').val(res2.nombreSector);
        $('#telefonoComercio').val(res2.telefonoTienda);
      }
    }
  });    

}
//Consultar que si hallan productos
function consultarProductosDisponibles(parametro,idTipoUsuario,selector,selector2)
{
  var cantidad = $(`#${selector}`).val();
  var datos = new FormData();
  var idProducto = $(`#${selector2}`).val();
  var sucursal = $('#sucursal').val();
  datos.append("dato", cantidad);
  datos.append("parametros", idProducto);
  datos.append("idSucursalProductosDisponibles", sucursal);
  let plantilla2 = " ";
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
          mostrarModal(parametro,idTipoUsuario,idProducto);
      }else
      {
         Swal.fire({
                position: 'top-end',
                icon: 'error',
                toast: true,
                title: 'No hay suficientes '+parametro,
                showConfirmButton: false,
                timerProgressBar: true,
                timer: 1500
              });
         return false;
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
          result = result.replace("MunicipioCliente", 'San Cristobal');
          result = result.replace("municipioCliente", 'San Cristobal');
          result = result.replace("telefonoComercio",$('#telefonoComercio').val());
          result = result.replace("direccionComercio",$('#direccionComercio').val());
          result = result.replace("cantidadEstante",$('#cantidadEstantes').val());
          result = result.replace("cantidadBotellones",$('#cantidadEstantes').val());
          result = result.replace("codigoProducto",'28DFefe75');  
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
function registrarPersonas(parametro,idTipoUsuario,idProducto)
{

  //Guardando valores en variables
  var sucursal = $("#sucursal").val();
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
  var cantidadBotellones = $('#cantidadBotellones').val();
  var capacidadEstantes = $('#capacidadEstantes').val();
  var capacidadBotellon = $('#capacidadBotellon').val();


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
  datos.append("cantidadBotellones", cantidadBotellones);
  datos.append("sucursal", sucursal);
  datos.append("capacidadEstantes", capacidadEstantes);
  datos.append("capacidadBotellon", capacidadBotellon);

//Datos de contrato

  datos.append("idTipoContrato", parametro);
  datos.append("idProducto", idProducto);


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
      if(respuesta.includes("error"))
      {
        Swal.fire({
          title: 'Error',
          text: 'Error al registrar Contrato',
          icon: 'error',
          showCloseButton: true,
          confirmButtonText:'Aceptar'
        }); 
      }else if(respuesta.includes("ok") || respuesta.includes("true"))
      {
        Swal.fire({
          title: 'Contrato registrado exitosamente',
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


function registrarContratoAmbos(parametro,idTipoUsuario,idEstante,idBotellon)
{
  var sucursal = $("#sucursal").val();
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
  var cantidadBotellones = $('#cantidadBotellones').val();
  var capacidadEstantes = $('#capacidadEstantes').val();
  var capacidadBotellon = $('#capacidadBotellon').val();


  var datos = new FormData();

//Datos de Persona
  datos.append("nombreContratoAmbos", nombre);
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
  datos.append("cantidadBotellones", cantidadBotellones);
  datos.append("sucursal", sucursal);
  datos.append("capacidadEstantes", capacidadEstantes);
  datos.append("capacidadBotellon", capacidadBotellon);

//Datos de contrato

  datos.append("idTipoContrato", parametro);
  datos.append("idEstante", idEstante);
  datos.append("idBotellon", idBotellon);


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
      if(respuesta.includes("error"))
      {
        Swal.fire({
          title: 'Error',
          text: 'Error al registrar Contrato',
          icon: 'error',
          showCloseButton: true,
          confirmButtonText:'Aceptar'
        }); 
      }else if(respuesta.includes("ok") || respuesta.includes("true"))
      {
        Swal.fire({
          title: 'Contrato registrado exitosamente',
          icon: 'success',
          showCloseButton: true,
          confirmButtonText:'Aceptar'
        })
      }
    }                 
  })
}