




//Validar Registro de Usuario

$(function(){
     $("#guardarPais").click(function(){
      var nombre = $('#nombrePais').val();
     // alert(nombre);
      if (nombre == "") 
      {
        Swal.fire({
            title: 'Error',
            text: 'Por favor ingrese un nombre',
            icon: 'error',
            showCloseButton: true,
            confirmButtonText:'Aceptar'
        })
        return false;
      }
      if (!expresiones.nombre.test(nombre)) 
      {
        Swal.fire({
          title: 'Error',
          text: 'El nombre tiene que contener de 3 a 16 digitos y solo puede tener letras y tildes.',
          icon: 'error',
          showCloseButton: true,
          confirmButtonText:'Aceptar'
        })
        return false;
      }

      registrarPais();

      return true;

      });
 });




function registrarPais()
{
  var datos = new FormData();

      datos.append("nombrePais", $("#nombrePais").val());
   
            $.ajax({
                    url:"//localhost/aguaMineral/ajax/registroAdmin.ajax.php",
                    method:"POST",
                    data: datos, 
                    cache: false,
                    contentType: false,
                    processData: false,
                    async:false,
                    success: function(respuesta)
                    {
                          if(!respuesta.includes("ok"))
                          {
                                Swal.fire({
                                title: 'Error',
                                text: 'Error al registrar pais',
                                icon: 'error',
                                showCloseButton: true,
                                confirmButtonText:'Aceptar'
                              }); 
                             
                          }else
                          {
                            Swal.fire({
                                title: 'Registro Exitoso',
                                icon: 'success',
                                showCloseButton: true,
                                confirmButtonText:'Aceptar'
                              });
                          }

                     }                 

              })
}

