<!--  
BANNER
-->
<?php
    $url = Ruta::ctrlRuta();    
    if(isset($_SESSION["id"])){
        $idUsu = $_SESSION["id"];
    }else{
        $idUsu = 10;
    }

   
?>

<div class="container-fluid well well-sm barraProductos">
  
</div>


<div class="content-wrapper">
     <div class="container-fluid">
         <div class="container">
             <div class="row mb-2">
                  <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Administraci&oacute;n Recetas</h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <button type="button" class="btn btn-warning btnaddState colorbotonamarillo" >Agregar Recetas 
                        </button>
                    </ol>
                  </div>
             </div>  <!-- Fin row -->
                
                <!-- Inicio mostrar la lista de las recetas existentes se muestra con ajax-->
                 <ul class="listStatesView" id="listStatesView" > 
                    
                 </ul>
                 <!-- Fin mostrar la lista de las recetas existentes -->

         </div> <!-- Fin container -->
     </div> <!-- Fin container-fluid -->

</div>
  




  <!-- Modal para agregar nueva  -->
  <form class="form needs-validation" method="post"  enctype="multipart/form-data" novalidate>
        <div class="modal fade" id="modaddState" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">

                  <div class="modal-dialog">
                           <div class="modal-content">
                                      
                                      <div class="modal-body mx-3">
                                             <div class="modal-body">                       
                                                   <input   type="text" class="form-control" id="nameEstado" name ="nameEstado" placeholder="Nombre de Estado" required>  
                                             </div>
                                      </div>

                                       <div class="form-group">  
                                               <div class="modal-footer">         
                                                     <button type="submit" class="btn btn-secondary " style ="width:48%;"data-dismiss="modal">Cancelar</button>                                                                 
                                                     <a onclick="return validarDataFormularioAddState();" style ="width:48%;" name = "btnaddStateValue" id = "btnaddStateValue"  class="btn btn-success "><i class="fa fa-plus-circle" aria-hidden="true"></i> <span id = "1" class="">Add State</span></a>
                                                </div>
                                         </div>
                            </div>
                  </div>   
        </div>
  </form>