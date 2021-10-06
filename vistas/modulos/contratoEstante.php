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

$variable = '</br></br>
<div class="ms-5 me-5 mb-3 fst-italic">
<h class="justificadoTotal">
<img src="http://localhost/aguaMineral/vistas/img/general/logoTransparente.JPG" class="h-25 w-25">
<p class="titulo">CONTRATO DE ESTANTERIA</p>
</br></br>
<p class="justify-text fs-6">
Entre nosotros, Jesus Abel Chacon Zambrano,  ingeniero, mec&aacute;nico,
venezolano soltero, mayor de edad, domiciliado en la ciudad d Palmira,
municipio guasimos del estado T&aacute;chira,  titular de la cedula de identidad
N&deg V-4.210.522, actuando en mi car&aacute;cter de director principal de la sociedad 
mercantil PROCESADORA Y DISTRIBUIDORA DIAGUAMIN C.A., inscrita en el registro
mercantil de la circunscripci&oacute;n judicial del estado T&aacute;chira, bajo el NRO.
01, TOMO 12-A ,4&deg  trimestre de fecha 03/12/1993, seg&uacute;n expediente  N&deg 62773,
debidamente autorizado para este acto, por una parte quien en adelante y a los
efectos del presente documento se denominara EL COMODANTE, por una parte y 
_______________PARAMETRONombreCliente_________________________, comerciante, mayor de edad, domiciliado en el 
municipio ______________________________, del estado T&aacute;chira, titular de la 
cedula de identidad NRO. V-__________________, actuando en mi condici&oacute;n de 
representante autorizado del fondo de comercio,_____________________________________
_______________________________________________________________________________________
______________________________con direcci&oacute;n fiscal en (_________________________ _______
____________________________________________________________________________), Y NUMERO 
DE TELEFONO (_________________________)Quien en adelante y a los efectos del presente
contrato se denominara EL COMODATARIO, hemos convenido celebrar el presente CONTRATO DE COMODATO,
contenido en las cl&aacute;usulas que a continuaci&oacute;n se determinan: CLAUSULA PRIMERA : EL COMODANTE
entrega en comodato al COMODATARIO, en el local de su fondo de comercio, ubicado en (__________
____________________________________________
la cantidad de (____________), estante, de estructura, met&aacutelica, para ser 
utilizado como exhibidor de botellones contentivos de agua mineral para 
consumo humano, el cual es de la UNICA Y EXCLUSIVA PROPIEDAD DEL EL COMODANTE
y as&iacute continuara siendo durante la vigencia del presente contrato. CLAUSULA 
SEGUNDA: a la estructura met&aacutelica aqu&iacute otorgada en comodato y que el adelante
denominaremos EL ESTANTE, para los efectos del presente contrato, con capacidad
para albergar y transportar (________) unidades conocidas como botellones, se 
identifica con el c&oacutedigo serial(es) Nº _____________, nuevo o reconstruido de 
fecha de construcci&oacute (_______________) cuenta con un letrero identificatorio 
del producto AGUA MINERAL URE&NtildeA, marca que EL COMODANTE distribuye de forma 
exclusiva. Las unidades  o envases denominadas botellones y el l&iacutequido en ellas 
contenido, forman parte de una transacci&oacuten comercial separada e independiente del
presente contrato. CLAUSULA TERCERA: EL COMODATARIO se obliga a utilizar EL ESTANTE
que recibe en comodato, UNICAMENTE, para almacenar, exhibir y vender, productos 
de las marcas producidas o comercializadas por EL COMODANTE, independientemente 
de quien ostente la propiedad o derechos similares del sitio donde se instala, 
perfectamente identificado en le clausula primera de este contrato, tambi&iacuten se 
obliga EL COMODATARIO a hacerle mantenimiento preventivo a EL ESTANTE y a permitirle a EL COMODANTE,
o quien el designe, para hacer inspecciones peri&oacutedicas verificando que el
mismo se haga. CLAUSULA CUARTA: EL COMODATARIO se compromete a no utilizar
EL ESTANTE para garantizar obligaciones personales o comerciales que asuma
o pueda asumir, bajo ning&uacuten concepto o situaci&iocuten y en cuanto se presente
una situaci&oacuten personal, legal, privada o p&uacuteblica, EL COMODATARIO se obliga
a dejar claramente sentado el titulo mediante el cual usufruct&uacutea EL ESTANTE
y quien es su leg&iicutetimo propietario. CLAUSULA QUINTA: EL COMODATARIO acepta
que, si llegara  a incumplir cualesquiera de las cl&aacuteusulas del presente
contrato o de los anexos que el mismo pueda tener a futuro, reconocidos por
las partes, dar&aacute derecho AL COMODANTE para retirar EL ESTANTE del sitio donde
el mismo se encuentre, sin que EL COMODATARIO pueda alegar  su favor ning&uacuten
derecho sobre el mismo o los bienes que albergue EL ESTANTE  en este momento.
As&iacute mismo, acepta EL COMODATARIO asumir bajo su &uacutenica y exclusiva responsabilidad,
todos los gastos, costos y costas, da&ntildeos y deterioro causados a EL ESTANTE,
necesarios o presentes para recuperarlo por cualquiera de los motivos contemplados
o referidos en la presente clausula o en el cuerpo del presente contrato.
CLAUSULA SEXTA: Es claro, definitivo y aceptado entre las partes que EL COMODANTE
no vende ni negocia EL ESTANTE  bajo ning&uacuten concepto, pero, si en el ejercicio
del presente COMODATO otorgado a EL COMODATARIO, el mismo llegara a perderse,
no poder ser inspeccionado o evaluado por EL COMODANTE o la persona , personas
o instituciones que le autorice para hacerlo, se establece, como valor referencial
del mismo, la cantidad de CINCUENTA (50) UNIDADES TRIBUTARIAS, por cada casilla
(espacio) del ESTANTE,  que EL COMODATARIO deber&aacute cancelar a EL COMODANTE, en dinero
en efectivo,</p><br><p class="text-start fs-6"> al requerimiento que este &uacuteltimo le haga.Sin embargo. As&iacute lo decimos
y otorgamos, en la fecha de la nota respectiva.</p>


</br></br></br></br>
________________________</br>
COMODANTE


</br></br></br></br>                                    
________________________ &nbsp;                      ________________________</br>                            
COMODATARIO               &nbsp;&nbsp;&nbsp;&nbsp;         DPTO DE VENTAS                                   


</br></br>

</h> 
</div>';
?>

<div class="Home ms-5"></div>
  <div class="container-fluid well well-sm barraProductos p-5 text-center col-md-6">
    <div class="me-5">
       <div class="me-5">
        <h1 class="tituloContratos text-dark me-5">Crear contrato estante</h1>
       </div>
    </div>
  </div>
  <div class="container-fluid p-3 ms-5" >
    <div class="container ms-5">

     <ul class="listasfullC ms-5 p-5" >
      <div class="col-lg-9 col-md-9 col-sm-10 col-xs-12 text-center" > 
       <form class="ms-5">
        <!-- inicio datos del cliente -->

        <div class="row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Nombre del cliente</label>
            <input type="text" class="form-control mt-3" id="nombreCliente" placeholder="Nombre">
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword">Apellido del cliente</label>
            <input type="text" class="form-control mt-3" id="apellidoCliente" placeholder="Apellido">
          </div>
        </div>

        <div class="row">
          <div class="form-group col-md-6">
            <label for="inputEmail4" class="mt-3">C&eacute;dula del cliente</label>
            <input type="text" class="form-control mt-3" id="cedulaCliente" placeholder="C&eacute;dula">
          </div>
          <div class="form-group col-md-6">
            <label for="inputState" class="mt-3">Municipio de residencia</label>
            <select id="inputState" class="form-select mt-3">
              <option selected>Cardenas</option>
              <option selected>San cristobal</option>                                        
            </select>
          </div>
        </div>

        <div class="row">
         <div class="form-group col-md-12">
          <label for="inputAddress" class="mt-3">Direcci&oacute;n del cliente</label>
          <input type="text" class="form-control mt-3" id="direccion" placeholder="Direcci&oacute;n del cliente">
        </div>
      </div>

      <!-- Fin datos del cliente -->

      <div class="row">
        <div class="form-group col-md-6">
          <label for="inputPassword" class="mt-3">Nombre del comercio</label>
          <input type="text" class="form-control mt-3" id="nobreComercio" placeholder="Nombre del comercio">
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword" class="mt-3">T&eacute;lefono del comercio</label>
          <input type="text" class="form-control mt-3" id="telefono" placeholder="T&eacute;lefono del comercio">
        </div>

        <div class="form-group col-md-12">
          <label for="inputAddress" class=" mt-3">Direcci&oacute;n del comercio</label>
          <input type="text" class="form-control mt-3" id="direccionComercio" placeholder="Direcci&oacute;n del comercio">
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-6">
          <label for="inputCity" class="mt-3">Cantidad de estantes</label>
          <input type="text" class="form-control mt-3" id="inputCity" placeholder="Cantidad de estantes">
        </div>

        <div class="form-group col-md-6">
          <label for="inputState" class=" mt-3">Descripci&oacute;n</label>
          <select id="inputState" class="form-select mt-3">
            <option selected>Estante de 6 botellones</option>
            <option selected>Estante de 8 botellones</option>                                
          </select>
        </div>

      </div>

      <button type="button" class="btn btn-primary botonContrato boton1 mb-5 mt-3" data-toggle="modal"  id="boton1">
        Generar
      </button>
      <br>

    </br>

  </div>
  </ul>

  </div>
  </div>





<!-- ==========================
VENTANA MODAL PARA EL REGISTRO
=============================-->
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="modal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <?php 
      date_default_timezone_set("America/Argentina/Buenos_Aires");
                          //Dia-Mes-Año Hora:Minutos:Segundos
      $fecha = date("d-m-Y H:i:s");
      echo $variable.'<div id="cuerpoContratoEstante"></div><div class="estiloDiv"><h class="justificadoTotal">'.fechaCastellano($fecha).'</h></div>';

      function fechaCastellano ($fecha) {
        $fecha = substr($fecha, 0, 10);
        $numeroDia = date("d", strtotime($fecha));
        $dia = date("l", strtotime($fecha));
        $mes = date("F", strtotime($fecha));
        $anio = date("Y", strtotime($fecha));
        $dias_ES = array("Lunes", "Martes", "Mi&eacutercoles", "Jueves", "Viernes", "S&aacutebado", "Domingo");
        $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
        $nombredia = str_replace($dias_EN, $dias_ES, $dia);
        $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
        return $nombredia." ".$numeroDia." de ".$nombreMes." de ".$anio;
      }
      ?>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary cerrar">Cerrar</button>
        <button type="button" class="btn btn-primary">Generar</button>
        <button type="button" class="btn btn-primary">Imprimir</button>
      </div>
    </div>
  </div>
</div>