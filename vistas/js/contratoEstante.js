/*LLamar a la funcion cada vez que se oprime una tecla*/

$("#cedulaCliente").keyup(function(){
  consultarClienteEnBd();
});

$(function(){
 $(".boton1").click(function(){
  var nombre = $('#nombreCliente').val();
  var apellido = $('#apellidoCliente').val();
  var direccion = $('#direccion').val();
  var comercio = $("#nobreComercio").val();
  var cedula = $('#cedulaCliente').val();
  var telefono = $('#telefono').val();
  var direccionComercio = $('#direccionComercio').val();
  var cantidadEstantes = $('#inputCity').val();

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
      if (direccionComercio == '') 
      {
         Swal.fire({
          position: 'top-end',
          icon: 'error',
          toast: true,
          title: 'Ingrese una dirección',
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

      mostrarModal();


      return true;

    });
});


function mostrarModal(){
   consultarFormatoContrato();
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
        Swal.fire({
          icon: 'success',
          title: res2.nombrePersona+' '+res2.apellidoPersona,
          text: 'El cliente ya existe',
          showConfirmButton: true,
          confirmButtonText: "Rellenar Campos",
          showCancelButton: true
        }).then((result) => {
          if (result.isConfirmed) 
          {
            consultarCamposDeTienda(res2.idPersona);
            $('#nombreCliente').val(res2.nombrePersona);
            $('#apellidoCliente').attr('value', res2.apellidoPersona);
            $('#direccion').val(res2.direccionPersona);
            $('#cedulaCliente').val(res2.cedulaPersona);
          }                                
        });        
        return false;

      }else
      {
        Swal.fire({
          position: 'top-end',
          icon: 'error',
          toast: true,
          title: 'El cliente no existe por favor registrelo',
          showConfirmButton: false,
          timerProgressBar: true,
          timer: 3500
        })        
        return false;
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
        $('#telefono').val(res2.telefonoTienda);
      }
    }
  });    

}
function consultarFormatoContrato()
{

  var datos = new FormData();
  datos.append("valor", "nulo");

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
          result = result.replace("nombreComercio ",$("#nobreComercio").val());
          result = result.replace("MunicipioCliente",$('#inputState').val());
          result = result.replace("municipioCliente",$('#inputState').val());
          result = result.replace("telefonoComercio",$('#telefono').val());
          result = result.replace("direccionComercio",$('#direccionComercio').val());
          result = result.replace("cantidadEstante",$('#inputCity').val());
          result = result.replace("cantidadBotellones",$('#cantidadBotellones').val());


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

function rellenarCampos()
{

}
