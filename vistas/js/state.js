/*------Cuando carga la pagina de estados consulta las erstados registradas*/
$(document).ready(function(){ 
     rutaActual = window.location.toString();
     if(rutaActual.includes("adminState")){    
       $('#listStatesView').hide();
        consultarAllStates();
     }
});

 /*------consulta todos los estados*/
 function consultarAllStates(){
     var datos = new FormData();
     datos.append("estados", "nulo");
            
            let plantilla2 = " ";
            let obj
            $.ajax({
                url:rutaOculta+"ajax/state.ajax.php",
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

                                       plantilla2 +='<div class="col-lg-9 col-md-9 col-sm-10 col-xs-12" id="">'
                                            for(var i=0;i<auxSplit2.length;i++){
                                                  if(!auxSplit2[i].includes("}")){
                                                      auxSplit2[i] = auxSplit2[i]+"}";
							                      }
                                                  var res2 = JSON.parse(auxSplit2[i]);
                                                  plantilla2 +='<div>'
                                                  plantilla2 +='        <ul class="list-group list-group-flush" >'
                                                  plantilla2 +='               <div class="row justify-content-center" >'
                                                  plantilla2 +='                    <div class="col-12">'

                                                  plantilla2 +='                         <li class="list-group-item list-group-item-light"><a href="javascript:descriptReceta('+res2.idEstado+')" data-toggle="tooltip" title="Ver descripcion de receta">'+res2.nombreEstado+'</a>'
                                                  plantilla2 +='                            <a href="javascript:eliminarRecetaAdm('+res2.idREstado+')"><p style ="position: absolute; right: 40; top:20;" data-placement="top" data-toggle="tooltip" title="Eliminar"><span  id = "'+res2.idEstados+'" class="far fa-trash-alt eliminarrecetaf"></span></p></a>  '                                                  
                                                  plantilla2 +='                          </li>'
                                                  plantilla2 +='                     </div>'
                                                  plantilla2 +='                </div>'
                                                  plantilla2 +='         </ul>'
                                                  plantilla2 +='</div>'
    
                                            }
                                         plantilla2 +='</div>'
                                         $("#listStatesView").html(plantilla2);  
                                         $('#listStatesView').show();
                                   }

                      }
                 })
 }

 /*------LLama el modal de adicionar receta*/ 
var auxTimeReceta = false;
var auxPorcionesReceta = false;

 $(function(){
     $(".btnaddState").click(function(){
         $("#modaddState").modal("show");  
      });
 });

  /*------Metodo que valida la data del formulario de agregar estados y luego registra*/
 

 /*------Metodo que registra en base de datos el estado*/
 function RegistrarState(){
      var datos = new FormData();
      datos.append("nombreEstadoValue", $("#nameEstado").val());
            $.ajax({
                    url:rutaOculta+"ajax/state.ajax.php",
                    method:"POST",
                    data: datos, 
                    cache: false,
                    contentType: false,
                    processData: false,
                    async:false,
                    success: function(respuesta){
                          if(!respuesta.includes("ok")){
                               //toastr.error("Error al intentar registrar el estado");                               
                          }else{
                                //toastr.error("Registro exitoso"); 
                                $("#modaddState").modal("hide");
                                consultarAllStates();
                                
						  }

                     }                 

              })
 }