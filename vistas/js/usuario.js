/*Expresiones Regulares*/
const expresiones = 
{
  usuario: /^[a-zA-Z0-9\_\-\.]{3,50}$/, // Letras, numeros, guion guion_bajo punto
  nombre: /^[a-zA-ZÀ-ÿ\s]{3,45}$/, // Letras y espacios, pueden llevar acentos.
  password: /^.{4,12}$/, // 4 a 12 digitos.
  correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
  telefono: /^\d{7,14}$/ // 7 a 14 numeros.
}

var rutaOculta = $("#rutaOculta").val();
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
      if (correo == '') 
      {
        Swal.fire({
          position: 'top-end',
          icon: 'error',
          toast: true,
          title: 'Ingrese un usuario',
          showConfirmButton: false,
          timerProgressBar: true,
          timer: 1500
        })        
        return false;
      }
      if (!expresiones.usuario.test(correo)) 
      {
        Swal.fire({
          position: 'top-end',
          icon: 'error',
          toast: true,
          title: 'Ingrese un usuario válido',
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
     
      
      if (contrasena == '') 
      {
       Swal.fire({
          position: 'top-end',
          icon: 'error',
          toast: true,
          title: 'Ingrese una contraseña',
          showConfirmButton: false,
          timerProgressBar: true,
          timer: 1500
        })        
        return false;
      }
      if (!expresiones.password.test(contrasena)) 
      {
          Swal.fire({
          position: 'top-end',
          icon: 'error',
          toast: true,
          title: 'Ingrese una contraseña válida',
          showConfirmButton: false,
          timerProgressBar: true,
          timer: 1500
        })        
        return false;;
      }
      if (repiteContrasena == '') 
      {
        Swal.fire({
          position: 'top-end',
          icon: 'error',
          toast: true,
          title: 'Repita la cotraseña',
          showConfirmButton: false,
          timerProgressBar: true,
          timer: 1500
        })        
        return false;
      }
      if (repiteContrasena != contrasena) 
      {
        Swal.fire({
          position: 'top-end',
          icon: 'error',
          toast: true,
          title: 'Las contraseñas deben ser iguales',
          showConfirmButton: false,
          timerProgressBar: true,
          timer: 1500
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
      var usuario = $('#correo').val();
      var contrasena = $('#password').val();

      if (usuario == "") 
      {
        Swal.fire({
          position: 'top-end',
          icon: 'error',
          toast: true,
          title: 'Ingrese nombre de usuario',
          showConfirmButton: false,
          timerProgressBar: true,
          timer: 1500
        })        
        return false;

      }
      if (!expresiones.usuario.test(usuario)) 
      {
        Swal.fire({
          position: 'top-end',
          icon: 'error',
          toast: true,
          title: 'Ingrese un usuario válido',
          showConfirmButton: false,
          timerProgressBar: true,
          timer: 1500
        })        
        return false;
      }

      if (contrasena == '') 
      {
        Swal.fire({
          position: 'top-end',
          icon: 'error',
          toast: true,
          title: 'Ingrese una contraseña',
          showConfirmButton: false,
          timerProgressBar: true,
          timer: 1500
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
  datos.append("user", $("#correo").val());
  datos.append("password", $("#password").val());

            $.ajax({
                    url:rutaOculta+"ajax/registro.ajax.php",
                    method:"POST",
                    data: datos, 
                    cache: false,
                    contentType: false,
                    processData: false,
                    async:false,
                    success: function(respuesta)
                    {
                          if(respuesta.includes("falsePassword"))
                          {
                             Swal.fire({
                              position: 'top-end',
                              icon: 'error',
                              toast: true,
                              title: 'Contraseña incorrecta',
                              showConfirmButton: false,
                              timerProgressBar: true,
                              timer: 1500
                            })        
                            return false;

                          }else if(respuesta.includes("falseUser"))
                          {
                            Swal.fire({
                              position: 'top-end',
                              icon: 'error',
                              toast: true,
                              title: 'El usuario no existe',
                              showConfirmButton: false,
                              timerProgressBar: true,
                              timer: 1500
                            })        
                            return false;
                          }else
                          {
                            window.location.replace(rutaOculta+'principal');
                          }
                     }                 
              })
}



function RegistrarUsuario()
{
      var tipoUsuario = $("#tipoUsuario").val();
      tipoUsuario = tipoUsuario.replace('>','');
      var datos = new FormData();
      datos.append("nombre", $("#nombre").val());
      datos.append("apellido", $("#apellido").val());
      datos.append("direccion", $("#direccion").val());
      datos.append("cedula", $("#cedula").val());
      datos.append("telefono", $("#telefono").val());
      datos.append("correo", $("#correo").val());
      datos.append("sector", $("#sector").val());
      datos.append("tipoUsuario", tipoUsuario);
      datos.append("contrasena", $("#contrasena").val());
            $.ajax({
                    url:rutaOculta+"ajax/registro.ajax.php",
                    method:"POST",
                    data: datos, 
                    cache: false,
                    contentType: false,
                    processData: false,
                    async:false,
                    success: function(respuesta)
                    {

                          if(respuesta.includes("ok"))
                          {
                              Swal.fire({
                                  title: 'Registrado',
                                  icon: 'success',
                                  showCloseButton: true,
                                  confirmButtonText:'Aceptar'
                                }).then((result) => {
                                  if (result.isConfirmed) 
                                  {
                                    window.location.replace(rutaOculta+'adminPersonas');
                                  }                                
                                });             
                          }else if (respuesta.includes("ya existe"))
                          {
                                                                
                              Swal.fire({
                                title: 'Error',
                                text: 'El usuario ya existe',
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
                                    window.location.replace(rutaOculta+'adminPersonas');
                                  }                                
                                });
                          }

                     }                 

              })
 }