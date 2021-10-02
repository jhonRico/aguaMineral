/*Expresiones Regulares*/
const expresiones = 
{
  usuario: /^[a-zA-Z0-9\_\-]{3,50}$/, // Letras, numeros, guion y guion_bajo
  nombre: /^[a-zA-ZÀ-ÿ\s]{3,40}$/, // Letras y espacios, pueden llevar acentos.
  password: /^.{4,12}$/, // 4 a 12 digitos.
  correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
  telefono: /^\d{7,14}$/ // 7 a 14 numeros.
}


//Validar Registro de Usuario

$(function(){
     $("#registrar").click(function(){
      var nombre = $('#nombre').val();
      var apellido = $('#apellido').val();
      var direccion = $('#direccion').val();
      var cedula = $('#cedula').val();
      var telefono = $('#telefono').val();
      var correo = $('#correo').val();
      var sector = $('#sector').val();
      var usuario = $('#usuario').val();
      var contrasena = $('#contrasena').val();
      var repiteContrasena = $('#repiteContrasena').val();

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
          text: 'El nombre tiene que contener de 3 a 16 dígitos y solo puede tener letras y tildes.',
          icon: 'error',
          showCloseButton: true,
          confirmButtonText:'Aceptar'
        })
        return false;
      }

      if (apellido == '') 
      {
        Swal.fire({
          title: 'Error',
          text: 'Por favor ingrese un apellido',
          icon: 'error',
          showCloseButton: true,
          confirmButtonText:'Aceptar'
        })
        return false;
      }

      if (!expresiones.nombre.test(apellido)) 
      {
        Swal.fire({
          title: 'Error',
          text: 'El apellido tiene que contener de 3 a 16 dígitos y solo puede tener letras y tildes.',
          icon: 'error',
          showCloseButton: true,
          confirmButtonText:'Aceptar'
        })
        return false;
      }
      if (direccion == '') 
      {
        Swal.fire({
          title: 'Error',
          text: 'Por favor ingrese una dirección',
          icon: 'error',
          showCloseButton: true,
          confirmButtonText:'Aceptar'
        })
        return false;
      }
      if (cedula == '') 
      {
        Swal.fire({
          title: 'Error',
          text: 'Por favor ingrese una cédula',
          icon: 'error',
          showCloseButton: true,
          confirmButtonText:'Aceptar'
        })
        return false;
      }
      if (!expresiones.telefono.test(cedula)) 
      {
        Swal.fire({
          title: 'Error',
          text: 'la cédula debe tener de 7 a 14 digitos y solo puede contener números',
          icon: 'error',
          showCloseButton: true,
          confirmButtonText:'Aceptar'
        })
        return false;
      }
      if (telefono == '') 
      {
        Swal.fire({
          title: 'Error',
          text: 'Por favor ingrese un telefono',
          icon: 'error',
          showCloseButton: true,
          confirmButtonText:'Aceptar'
        })
        return false;
      }
      if (!expresiones.telefono.test(telefono)) 
      {
        Swal.fire({
          title: 'Error',
          text: 'Ingrese un telefono válido',
          icon: 'error',
          showCloseButton: true,
          confirmButtonText:'Aceptar'
        })
        return false;
      }
      if (correo == '') 
      {
        Swal.fire({
          title: 'Error',
          text: 'Por favor ingrese un correo',
          icon: 'error',
          showCloseButton: true,
          confirmButtonText:'Aceptar'
        })
        return false;
      }
      if (!expresiones.correo.test(correo)) 
      {
        Swal.fire({
          title: 'Error',
          text: 'Ingrese un correo válido',
          icon: 'error',
          showCloseButton: true,
          confirmButtonText:'Aceptar'
        })
        return false;
      }
      if (usuario == '') 
      {
        Swal.fire({
          title: 'Error',
          text: 'Por favor ingrese un usuario',
          icon: 'error',
          showCloseButton: true,
          confirmButtonText:'Aceptar'
        })
        return false;
      }
      if (!expresiones.usuario.test(usuario)) 
      {
        Swal.fire({
          title: 'Error',
          text: 'Ingrese un usuario válido',
          icon: 'error',
          showCloseButton: true,
          confirmButtonText:'Aceptar'
        });
        return false;
      }
      if (contrasena == '') 
      {
        Swal.fire({
          title: 'Error',
          text: 'Por favor ingrese una contraseña',
          icon: 'error',
          showCloseButton: true,
          confirmButtonText:'Aceptar'
        })
        return false;
      }
      if (!expresiones.password.test(contrasena)) 
      {
          Swal.fire({
          title: 'Error',
          text: 'La Contraseña debe tener de 4 a 12 digitos',
          icon: 'error',
          showCloseButton: true,
          confirmButtonText:'Aceptar'
        })
        return false;
      }
      if (repiteContrasena == '') 
      {
        Swal.fire({
          title: 'Error',
          text: 'Por favor repita la contraseña',
          icon: 'error',
          showCloseButton: true,
          confirmButtonText:'Aceptar'
        })
        return false;
      }
      if (repiteContrasena != contrasena) 
      {
        Swal.fire({
          title: 'Error',
          text: 'Las contraseñas deben ser iguales',
          icon: 'error',
          showCloseButton: true,
          confirmButtonText:'Aceptar'
        })
        return false;
      }
 
      RegistrarUsuario();

      return true;

      });
 });

//Validar Inicio de Sesión

$(function(){
     $("#ingresar").click(function(){
      var usuario = $('#user').val();
      var contrasena = $('#password').val();

      if (usuario == "") 
      {
        Swal.fire({
            title: 'Error',
            text: 'Por favor ingrese un usuario',
            icon: 'error',
            showCloseButton: true,
            confirmButtonText:'Aceptar'
        })
        return false;
      }
      if (!expresiones.usuario.test(usuario)) 
      {
        Swal.fire({
          title: 'Error',
          text: 'El usuario solo puede llevar letras, números y guiones.',
          icon: 'error',
          showCloseButton: true,
          confirmButtonText:'Aceptar'
        })
        return false;
      }

      if (contrasena == '') 
      {
        Swal.fire({
          title: 'Error',
          text: 'Por favor ingrese una contraseña',
          icon: 'error',
          showCloseButton: true,
          confirmButtonText:'Aceptar'
        })
        return false;
      }
      
      IniciarSesion();

      return true;

      });
 });

function IniciarSesion()
{
  var datos = new FormData();

      datos.append("tipoDeUsuario", $("#tipoDeUsuario").val());
      datos.append("user", $("#user").val());
      datos.append("password", $("#password").val());

     
            $.ajax({
                    url:"//localhost/aguaMineral/ajax/registro.ajax.php",
                    method:"POST",
                    data: datos, 
                    cache: false,
                    contentType: false,
                    processData: false,
                    async:false,
                    success: function(respuesta)
                    {
                          if(!respuesta.includes("false"))
                          {
                              window.location.replace('http://localhost/aguaMineral/principal');
                             
                          }else
                          {
                            Swal.fire({
                                title: 'Error',
                                text: 'Error al iniciar sesión',
                                icon: 'error',
                                showCloseButton: true,
                                confirmButtonText:'Aceptar'
                              });
                          }

                     }                 

              })
}


function RegistrarUsuario()
{

      var datos = new FormData();
      datos.append("nombre", $("#nombre").val());
      datos.append("apellido", $("#apellido").val());
      datos.append("direccion", $("#direccion").val());
      datos.append("cedula", $("#cedula").val());
      datos.append("telefono", $("#telefono").val());
      datos.append("correo", $("#correo").val());
      datos.append("sector", $("#sector").val());
      datos.append("tipoUsuario", $("#tipoUsuario").val());
      datos.append("usuario", $("#usuario").val());
      datos.append("contrasena", $("#contrasena").val());
     
            $.ajax({
                    url:"//localhost/aguaMineral/ajax/registro.ajax.php",
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
                                text: 'Error al registrar',
                                icon: 'error',
                                showCloseButton: true,
                                confirmButtonText:'Aceptar'
                              });
                             
                          }else
                          {
                                Swal.fire({
                                  title: 'Registrado',
                                  icon: 'success',
                                  showCloseButton: true,
                                  confirmButtonText:'Aceptar'
                                }).then((result) => {
                                  if (result.isConfirmed) 
                                  {
                                    window.location.replace('http://localhost/aguaMineral/login');
                                  }                                
                                });
                                
                          }

                     }                 

              })
 }