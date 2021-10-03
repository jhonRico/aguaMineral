




//Validar Registro de Usuario

$(function(){
     $("#guardarPais").click(function(){
      Swal.fire({
        title: 'Registrar Pais',
        input: 'text',
        inputPlaceholder: "Por favor ingrese un pais",
        inputAttributes: {
          autocapitalize: 'off'
        },
        showCancelButton: true,
        confirmButtonText: 'Registrar',
        }).then((result) => {
        if (result.isConfirmed) 
        {
           var valor = result.value;
           registrarPais(valor);
        }
})
    /*  var nombre = $('#nombrePais').val();
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

      //

      return true;*/

      });
 });




function registrarPais(valor)
{
  var datos = new FormData();

      datos.append("nombrePais", valor);
   
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

