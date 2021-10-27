<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta  name="title" content="comparador">
    <meta  name="description" content="describir la pagina">
    <meta  name="keyword" content="todas las palabras claves separadas con  comas ,">
    <title>Agua Mineral Ureña</title>
    <?php
        /** Mantener la ruta fija del proyecto*/
        $url = Ruta::ctrlRuta();
    ?>

    <!---   PLUGINS DE CSS-->
    <link rel="stylesheet" href="<?php echo $url ?>vistas/bootstrap-5.1.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo $url ?>vistas/css/all.min.css">
    <link rel="stylesheet" href="<?php echo $url ?>vistas/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?php echo $url ?>vistas/css/plugins/sweetalert.css">
    <link rel="stylesheet" href="<?php echo $url ?>vistas/css/plugins/select2.min.css" rel="stylesheet"/>

    <link rel="stylesheet" href="<?php echo $url ?>vistas/css/plugins/sweetalert.css">
    <link rel="stylesheet" href="<?php echo $url ?>vistas/css/plugins/select2.min.css" rel="stylesheet" />
   
    
    <!--  Hojas de Estilos personalizadas-->

    <link rel="stylesheet" href="<?php echo $url ?>vistas/css/slideBar.css">
    <link rel="stylesheet" href="<?php echo $url ?>vistas/css/administracion.css">
    <link rel="stylesheet" href="<?php echo $url ?>vistas/css/cabecera.css">
    <link rel="stylesheet" href="<?php echo $url ?>vistas/css/plantilla.css">
    <link rel="stylesheet" href="<?php echo $url ?>vistas/css/servicios.css">
    <link rel="stylesheet" href="<?php echo $url ?>vistas/css/ofertas.css">
    <link rel="stylesheet" href="<?php echo $url ?>vistas/css/productos.css">
    <link rel="stylesheet" href="<?php echo $url ?>vistas/css/testimonio.css">
    <link rel="stylesheet" href="<?php echo $url ?>vistas/css/blog.css">
    <link rel="stylesheet" href="<?php echo $url ?>vistas/css/recetas.css">
    <link rel="stylesheet" href="<?php echo $url ?>vistas/css/footer.css">
    <link rel="stylesheet" href="<?php echo $url ?>vistas/css/sidemenu.css">
    <link rel="stylesheet" href="<?php echo $url ?>vistas/css/slide.css">
    <link rel="stylesheet" href="<?php echo $url ?>vistas/css/contrato.css">

    <script src="<?php echo $url ?>vistas/bootstrap-5.1.1-dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo $url ?>vistas/bootstrap-5.1.1-dist/js/bootstrap.min.js"></script>
    <script src="<?php echo $url ?>vistas/js/plugins/jquery.min.js"></script>
    <script src="<?php echo $url ?>vistas/js/plugins/sweetalert.min.js"></script>
    <script src="<?php echo $url ?>vistas/js/plugins/chartjs.js"></script>
</head>
<body>
    <?php  
        /**CABEZOTE DE LA PAGINA */
        //include "modulos/cabezote.php";
       
        /** se valida si existe la variable ruta que es la que esta de finida 
         * en el archivo htacces*/
        $rutas = array();
        $ruta =  null;
        if(isset($_GET["ruta"])){
            
            $rutas = explode("/", $_GET["ruta"]); /**el explode ayuda a separar la url por / */
            $item = "ruta";
            $valor = $_GET["ruta"];
                
                if($rutas[0] == "verificar"|| $rutas[0] == "salir"   || $rutas[0] == "blog" || $rutas[0] == "tiendas" ||
                   $rutas[0] == "listas"   || $rutas[0] == "recetas" || $rutas[0] =="adminState"  || $rutas[0] == "login" ){
                          
                    include "modulos/cabezotesesion.php";
                    include "modulos/".$rutas[0].".php";
                }else 
                    if($rutas[0] == "principal"  || $rutas[0] == "contratoEstante" || $rutas[0] == "administracion" || 
                       $rutas[0] == "adminPais" || $rutas[0] == "adminZonas" || $rutas[0] == "adminContrato" || $rutas[0] == "adminProductos" ||
                       $rutas[0] == "adminPersonas" || $rutas[0] == "zonas" || $rutas[0] == "norte" || $rutas[0] == "sur" || $rutas[0] == "este" || $rutas[0] == "oeste" || $rutas[0] == "centro"
                       || $rutas[0] == "adminTipoUsuario" || $rutas[0] == "administracionZonas" || $rutas[0] == "adminEstado" || $rutas[0] == "registro" || $rutas[0] == "contratoPrincipal" || $rutas[0] == "administracionTipoProducto"
                       || $rutas[0] == "administracionProductos" || $rutas[0] == "administracionMunicipio" || $rutas[0] == "adminCiudad" || $rutas[0] == "adminSucursal"||
                          $rutas[0] == "adminFormatos"|| $rutas[0] =="adminFormatoEstantes"  || $rutas[0] == "adminFormatoBotellones" || $rutas[0] == "adminFormatoAmbos" || $rutas[0] == "reportePrincipal" || $rutas[0] == "reporteProducto" || $rutas[0] == "administracionContrato" || $rutas[0] == "todosContratos")               
                    {
                    include "modulos/cabezaLogueado.php";
                    include "modulos/plantillaSlideBar.php";
                    include "modulos/".$rutas[0].".php";

                }else
                {
                    include "modulos/error404.php";     
                }
            
           // include "modulos/footer.php";
        }else{
            //include "modulos/cabezotesesion.php";
             include "modulos/cabezote.php";            
             // include "modulos/slide.php";
           // include "modulos/footer.php";
            
        }

    ?>
<input type="hidden" value="<?php echo $url; ?>" id="rutaOculta">
<input type="hidden" value="<?php echo $_SESSION["id"]; ?>" id="idUsuario">

<!--=====================================
JAVASCRIPT PERSONALIZADO
======================================--> 

<script src="<?php echo $url ?>vistas/js/adminProductos.js"></script>
<script src="<?php echo $url ?>vistas/js/adminTipoUsuario.js"></script>
<script src="<?php echo $url ?>vistas/js/adminZonas.js"></script>
<script src="<?php echo $url ?>vistas/js/adminEstados.js"></script>
<script src="<?php echo $url ?>vistas/js/adminCiudad.js"></script>
<script src="<?php echo $url ?>vistas/js/adminFormatoContratos.js"></script>   
<script src="<?php echo $url ?>vistas/js/adminSucursal.js"></script> 
<script src="<?php echo $url ?>vistas/js/zonaClientes.js"></script>
<script src="<?php echo $url ?>vistas/js/adminPais.js"></script>
<script src="<?php echo $url ?>vistas/js/adminMunicipio.js"></script>
<script src="<?php echo $url ?>vistas/js/usuario.js"></script>
<script src="<?php echo $url ?>vistas/js/ofertas.js"></script> 
<script src="<?php echo $url ?>vistas/js/herramienta.js"></script> 
<script src="<?php echo $url ?>vistas/js/registroFacebook.js"></script> 
<script src="<?php echo $url ?>vistas/js/listas.js"></script> 
<script src="<?php echo $url ?>vistas/js/recetas.js"></script> 
<script src="<?php echo $url ?>vistas/js/state.js"></script> 
<script src="<?php echo $url ?>vistas/js/blog.js"></script> 
<script src="<?php echo $url ?>vistas/js/plugins/select2.min.js"></script>
<script src="<?php echo $url ?>vistas/js/contratoEstante.js"></script>
<script src="<?php echo $url ?>vistas/js/reporte.js"></script>

<!--=====================================
INICIO SE SESION CON FACEBOOK 
======================================--> 
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '628429304487987',
      cookie     : true,
      xfbml      : true,
      version    : 'v8.0'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

</body>
</html>