//Ocultar Formulario de Contrato Estante
$(document).ready(function() {
  $('.contratoEstante').hide();
  rutaActual = window.location.toString();
});
var rutaOculta = $("#rutaOculta").val();
var hoy = new Date();
var fecha = hoy.getDate() + '-' + ( hoy.getMonth() + 1 ) + '-' + hoy.getFullYear();
fecha = fecha.replace("-","");
fecha = fecha.replace("-","");
$("#printEstante").hide();
$("#printBotellon").hide();

//mostrar formulario dependiendo del parametro
function mostrarContrato(parametro,idTipoUsuario){
  $('.contratoEstante').show();
  if (parametro == "Botellones") 
  {
    $('#cajasContrato').hide();
    $('#titulo').hide();
    $('#menuCajas').hide();
    $("#tituloLink").text('Contrato Botellones')
    $('#TituloPrincipalContrato').text('Crear Contrato Botellones');
    $('#cantidadBotellones').hide();
    $('#capacidadEstantes').hide();
    $('#labelDescripcion').hide();
    $('#labelCantidadEstantes').hide();
    $('#cantidadEstantes').hide();
    $("#labelCapacidadBotellon").hide();
    $("#capacidadBotellon").hide();
    var input =  `
              <label for="inputState" id="labelCapacidadBotellon" class="mt-4" id="labelDescripcion">Capacidad Botellon</label>
              <select class="form-select mt-3" id="capacidadBotellon"> 
    `;
    $('#capacidad').html(input); 
    $('#capacidad').show();
    var input =  `
             <label for="inputCity" class="mt-4" id="labelCantidadEstantes">Cantidad de Botellones</label>
             <input type="number" min="1" class="form-control mt-3" id="cantidadBotellones" placeholder="Cantidad de botellones">
    `;
    $('#divCantidadEstantes').html(input); 
    $('#divCantidadEstantes').show();
    llenarSelectCapacidad(parametro,'capacidadBotellon');
    $(".boton1").click(function()
    {
        var respuesta = validarCampos();
        if (respuesta == true) 
        {
            consultarFormatoContrato(parametro);
            $("#modal2").modal("show");
        }
    });
    $("#registrarContrato").click(function()
    {
        consultarProductosDisponibles(parametro,idTipoUsuario,'cantidadBotellones','capacidadBotellon');
    });


  }else if (parametro == "Ambos") 
  {
    $('#cajasContrato').hide();
    $('#titulo').hide();
    $('#menuCajas').hide();
    $("#tituloLink").text('Contrato Ambos')
    $('#TituloPrincipalContrato').text('Crear Contrato Botellon y Estante');    
    var input =  `
    <label for="inputCity" class="mt-4" id="labelCantidadEstantes">Cantidad de Botellones</label>
    <input type="number" min="1" class="form-control mt-3" id="cantidadBotellones" placeholder="Cantidad de botellones">
    `;
    llenarSelectCapacidad('Estantes','capacidadEstantes');
    llenarSelectCapacidad('Botellones','capacidadBotellon');

    $('#colocarInput').html(input); 
    $('#colocarInput').show();
    $(".boton1").click(function()
    {
        var respuesta = validarCampos();
        if (respuesta == true) 
        {
            consultarFormatoContratoAmbos(parametro);
            $("#modal2").modal("show");
        }
    });
    $("#registrarContrato").click(function()
    {
        consultarProductosAmbos(parametro,idTipoUsuario,'cantidadEstantes','capacidadEstantes');
        consultarProductosAmbos(parametro,idTipoUsuario,'cantidadBotellones','capacidadBotellon');
    });
  }else
  {
    $("#tituloLink").text('Contrato Estantes')
    $('#TituloPrincipalContrato').text('Crear Contrato Estantes');
    $("#labelCapacidadBotellon").hide();
    $("#capacidadBotellon").hide();
    $('#cajasContrato').hide();
    $('#titulo').hide();
    $('#menuCajas').hide();
    llenarSelectCapacidad(parametro,'capacidadEstantes');
    $(".boton1").click(function()
    {
        var respuesta = validarCampos();
        if (respuesta == true) 
        {
            consultarFormatoContrato(parametro);
            $("#modal2").modal("show");
        }
    });
    $("#registrarContrato").click(function()
    {
       consultarProductosDisponibles(parametro,idTipoUsuario,'cantidadEstantes','capacidadEstantes');
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
    url:rutaOculta+"ajax/formatoContrato.ajax.php",
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
          <option value="${res2.idProducto}-${res2.capacidadProducto}">${res2.capacidadProducto}</option>
          `;
        }


        $(`#${selector}`).html(plantilla2); 
        $(`#${selector}`).show();

      }else
      {
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
    url:rutaOculta+"ajax/formatoContrato.ajax.php",
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
          <option value="${res2[parametro1]}-${res2[parametro2]}">${res2[parametro2]}</option>
          `;
        }
        $(`#${selector}`).html(plantilla2); 
        $(`#${selector}`).show();

      }else
      {
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
        $("#municipioComercio").val((($('#municipioCliente').val()).split("-"))[0]);
        $("#ciudadComercio").val((($('#ciudadCliente').val()).split("-"))[0]);
        $("#zonaComercio").attr('value', (($('#zonaCliente').val()).split("-"))[0]);
        $("#sectorComercio").attr('value', $("#sectorCliente").val());
    });

});
//Consultar cada vez que se presione una tecla

$("#cedulaCliente").keyup(function(){
  consultarClienteEnBd();
});

//Validar que los campos no sean vacios y compararlos con su respectiva expresion regular

function validarCampos()
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
  var sectorComercio = $('#sectorComercio').attr('value');

  if (cedula == '') 
  {
   Swal.fire({
    position: 'top-end',
    icon: 'error',
    toast: true,
    title: 'Ingrese una c??dula',
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
        title: 'Ingrese una cedula v??lida',
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
        title: 'Ingrese un nombre v??lido',
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
      title: 'Ingrese un apellido v??lido',
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
        title: 'Ingrese un sector v??lido',
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
      title: 'Ingrese una direcci??n',
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
        title: 'Ingrese un comercio v??lido',
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
      title: 'Ingrese un telefono',
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
        title: 'Ingrese un tel??fono v??lido',
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
        title: 'Ingrese un sector v??lido',
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
      title: 'Ingrese la direcci??n del comercio',
      showConfirmButton: false,
      timerProgressBar: true,
      timer: 1500
    })        
     return false;
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
    url:rutaOculta+"ajax/formatoContrato.ajax.php",
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
 registrarPersonas(parametro,idTipoUsuario,idProducto);
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
    url:rutaOculta+"ajax/formatoContrato.ajax.php",
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
    url:rutaOculta+"ajax/formatoContrato.ajax.php",
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
    url:rutaOculta+"ajax/formatoContrato.ajax.php",
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
    url:rutaOculta+"ajax/formatoContrato.ajax.php",
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
          
              result = res2.descripcion.replaceAll("NombreCliente",$('#nombreCliente').val()+' '+$('#apellidoCliente').val());
              result = result.replaceAll("cedulaCliente",$('#cedulaCliente').val());
              result = result.replaceAll("nombreComercio",$('#nobreComercio').val());
              result = result.replaceAll("MunicipioCliente", (($('#municipioCliente').val()).split("-"))[1]);
              result = result.replaceAll("municipioCliente", (($('#municipioCliente').val()).split("-"))[1]);
              result = result.replaceAll("telefonoComercio",$('#telefonoComercio').val());
              result = result.replaceAll("direccionComercio",$('#direccionComercio').val());
              result = result.replaceAll("cantidadEstante",$('#cantidadEstantes').val());
              if (result.includes("cantidadBotellones")){result = result.replaceAll("cantidadBotellones",(($('#capacidadEstantes').val()).split("-"))[1]);}
              if (result.includes("cantidadBotellon")){result = result.replaceAll("cantidadBotellon",$('#cantidadBotellones').val());}
              result = result.replaceAll("codigoProducto",fecha);  
              result = result.replaceAll("fechaConstruccion",$('#fechaProducto').val());        
              plantilla2 += result;
        }
      }
      $("#imprimirContrato").hide();
      $("#cuerpoContrato").html(plantilla2);  
      $('#cuerpoContrato').show();
    }else
    {
      $("#cuerpoContrato").hide();     
    }
  }
})
}

function consultarFormatoContratoAmbos(parametro)
{
  var datos = new FormData();
  datos.append("parametro", parametro);

  let plantilla2 = " ";
  let obj
  $.ajax({
    url:rutaOculta+"ajax/formatoContrato.ajax.php",
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
          
              result = res2.descripcion.replaceAll("NombreCliente",$('#nombreCliente').val()+' '+$('#apellidoCliente').val());
              result = result.replaceAll("cedulaCliente",$('#cedulaCliente').val());
              result = result.replaceAll("nombreComercio",$('#nobreComercio').val());
              result = result.replaceAll("MunicipioCliente", (($('#municipioCliente').val()).split("-"))[1]);
              result = result.replaceAll("municipioCliente", (($('#municipioCliente').val()).split("-"))[1]);
              result = result.replaceAll("telefonoComercio",$('#telefonoComercio').val());
              result = result.replaceAll("direccionComercio",$('#direccionComercio').val());
              result = result.replaceAll("cantidadEstante",$('#cantidadEstantes').val());
              if (result.includes("cantidadBotellones")){result = result.replaceAll("cantidadBotellones",(($('#capacidadEstantes').val()).split("-"))[1]);}
              if (result.includes("cantidadBotellon")){result = result.replaceAll("cantidadBotellon",$('#cantidadBotellones').val());}
              result = result.replaceAll("codigoProducto",fecha);  
              result = result.replaceAll("fechaConstruccion",$('#fechaProducto').val());        
              plantilla2 += result;
        }
      }
      $("#registrarContrato").show();
      $("#imprimirContrato").hide();
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
  var municipioCliente = (($('#municipioCliente').val()).split("-"))[0];
  var ciudadCliente =  (($('#ciudadCliente').val()).split("-"))[0];
  var estadoComercio = (($('#estadoComercio').val()).split("-"))[0];
  var municipioComercio = $('#municipioComercio').val();
  var ciudadComercio =  $('#ciudadComercio').val();
  var zonaComercio = $('#zonaComercio').val();
  var zonaCliente = (($('#zonaCliente').val()).split("-"))[0];
  var direccionCliente = $('#direccionCliente').val();
  var comercio = $("#nobreComercio").val();
  var cedula = $('#cedulaCliente').val();
  var telefono = $('#telefonoComercio').val();
  var direccionComercio = $('#direccionComercio').val();
  var sectorComercio = $('#sectorComercio').val();
  var cantidadEstantes = $('#cantidadEstantes').val();
  var cantidadBotellones = $('#cantidadBotellones').val();
  if ($('#capacidadEstantes').val()) 
  {
      var capacidadEstantes = (($('#capacidadEstantes').val()).split("-"))[0];
  }
   if ($('#capacidadBotellon').val()) 
  {
      var capacidadBotellon = (($('#capacidadBotellon').val()).split("-"))[0];
  }


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
    if ($('#capacidadEstantes').val()) 
  {
      datos.append("capacidadEstantes", capacidadEstantes);
  }
   if ($('#capacidadBotellon').val()) 
  {
      datos.append("capacidadBotellon", capacidadBotellon);
  }

//Datos de contrato

  datos.append("idTipoContrato", parametro);
  datos.append("idProducto", idProducto);


  $.ajax({
    url:rutaOculta+"ajax/formatoContrato.ajax.php",
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
        }).then((result) => 
        {
          if (result.isConfirmed)
          {
            $("#registrarContrato").hide();
            $("#imprimirContrato").show();
          }
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
  var municipioCliente = (($('#municipioCliente').val()).split("-"))[0];
  var ciudadCliente =  (($('#ciudadCliente').val()).split("-"))[0];
  var estadoComercio = (($('#estadoComercio').val()).split("-"))[0];
  var municipioComercio = $('#municipioComercio').val();
  var ciudadComercio =  $('#ciudadComercio').val();
  var zonaComercio = $('#zonaComercio').val();
  var zonaCliente = (($('#zonaCliente').val()).split("-"))[0];  
  var direccionCliente = $('#direccionCliente').val();
  var comercio = $("#nobreComercio").val();
  var cedula = $('#cedulaCliente').val();
  var telefono = $('#telefonoComercio').val();
  var direccionComercio = $('#direccionComercio').val();
  var sectorComercio = $('#sectorComercio').val();
  var cantidadEstantes = $('#cantidadEstantes').val();
  var cantidadBotellones = $('#cantidadBotellones').val();
  var capacidadEstantes = (($('#capacidadEstantes').val()).split("-"))[0];
  var capacidadBotellon = (($('#capacidadBotellon').val()).split("-"))[0];


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
    url:rutaOculta+"ajax/formatoContrato.ajax.php",
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
        }).then((result) => 
        {
          if (result.isConfirmed)
          {
            $("#registrarContrato").hide();
            $("#sucursal").hide();
            $("#labelSucursal").hide();
            $("#TituloPrincipalContrato").hide();
            $(".card").hide();
            $(".boton1").hide();
            $("#printEstante").show();
            $("#printBotellon").show();
            $("#modal2").modal("hide");
          }
        })  
      }
    }                 
  })
}


function  mostrarModalEspecifico(parametro)
{
  consultarFormatoContrato(parametro);
  $("#modal2").modal("show");
  setTimeout(function(){$("#imprimirContrato").show();}, 500);
}