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

     /* if (nombre == "") 
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
      */mostrarModal();
      //RegistrarUsuario();

      return true;

      });
 });

function mostrarModal(){

   //$("#cuerpoContratoEstante").html(contrato);  
   //$('#cuerpoContratoEstante').show();
   consultarFormatoContrato();
   $("#modal2").modal("show");
}

$(function(){
	$(".cerrar").click(function(){
		$("#modal2").modal("hide");
	})
})

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

        plantilla2 +='<div class="col-lg-9 col-md-9 col-sm-10 col-xs-12 m-2" id="">'
        for(var i=0;i<auxSplit2.length;i++)
        {
          if(!auxSplit2[i].includes("}"))
          {
            auxSplit2[i] = auxSplit2[i]+"}";
          }
          var res2 = JSON.parse(auxSplit2[i]);
          plantilla2 += res2.descripcion;
        }
        plantilla2 +='</div>'
        $("#cuerpoContratoEstante").html(plantilla2);  
        $('#cuerpoContratoEstante').show();
      }else
      {
        $("#cuerpoContratoEstante").hide();     
      }
      

    }
  })
}
