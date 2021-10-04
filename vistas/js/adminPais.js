/*------Cuando carga la pagina de pais consulta los paises registrados*/
$(document).ready(function(){ 
     rutaActual = window.location.toString();
     if(rutaActual.includes("adminPais")){   
        consultarTodosPaises();
     }
});


/*------consulta todos los paises*/
 function consultarTodosPaises(){
 
     var datos = new FormData();
     datos.append("paises", "nulo");
            
            let plantilla2 = " ";
            let obj
            $.ajax({
                url:"//localhost/aguaMineral/ajax/registroAdmin.ajax.php",
                method:"POST",
                data: datos, 
                cache: false,
                contentType: false,
                processData: false,
                success: function(respuesta3){
                                 if(respuesta3){
                                      respuesta3 =respuesta3.replace("[","");
                                      respuesta3 =respuesta3.replace("]","");
                                      var auxSplit2 = respuesta3.split("},");

                                       plantilla2 +='<div class="col-lg-9 col-md-9 col-sm-10 col-xs-12 m-2" id="">'
                                            for(var i=0;i<auxSplit2.length;i++){
                                                  if(!auxSplit2[i].includes("}")){
                                                      auxSplit2[i] = auxSplit2[i]+"}";
                                    }
                                                  var res2 = JSON.parse(auxSplit2[i]);
                                                  plantilla2 +='<div class="p-2">'
                                                  plantilla2 +='        '
                                                  plantilla2 +='              '
                                                  plantilla2 +='                    '
                                                  plantilla2 +='                        '                   
                                                  plantilla2 +='                     '
                                                
                                                  plantilla2 +='                      <h3 class="div-pais p-3 rounded">'+res2.descripcion+'<button class="bi bi-trash"></button><button class="btn btn-primary modificar">Editar</button></h3>'
                                  
                                                  plantilla2 +='                     '
                                                  plantilla2 +='                '
                                                  plantilla2 +='         '
                                                  plantilla2 +='   </div>'
    
                                            }
                                         plantilla2 +='</div>'
                                        $("#respuestaCons").html(plantilla2);  
                                        $('#respuestaCons').show();
                                   }

                      }
                 })
 }

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
           consultarTodosPaises();
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

