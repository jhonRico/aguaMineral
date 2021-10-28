$(document).ready(function($){
  rutaActual = window.location.toString();
  if(rutaActual.includes("reporteProducto")){ 
      consultarProductosReporte();
  }
  var today = new Date();
  var year = today.getFullYear();
  var plantilla = `<option selected>Seleccione</option>
            <option value="${year}">${year}</option>
            <option value="${year-1}">${year-1}</option>
            <option value="${year-2}">${year-2}</option>
            <option value="${year-3}">${year-3}</option>
            <option value="${year-4}">${year-4}</option>
            <option value="${year-5}">${year-5}</option>`;
  $("#fechaReporteProducto").html(plantilla);
  $("#fechaReporteProducto").show();    
});


$("#tipoProductoReporte").change(function(){
  consultarProductosReporte();
});

$("#fechaReporteProducto").change(function(){
  consultarProductosReporte();
});

var densityCanvas = document.getElementById("densityChart");

Chart.defaults.global.defaultFontFamily = "Lato";
Chart.defaults.global.defaultFontSize = 12;

var densityData = {
  label: 'Estantes registrados',
  data: [127, 168 ,152, 68, 127, 163 ,152,542, 524, 551, 393, 136, 68],
  backgroundColor: 'rgba(0, 99, 132, 0.6)',
  borderWidth: 0,
  yAxisID: "y-axis-density"
};

var gravityData = {
  label: 'Estantes Prestados',
  data: [200, 300, 150, 70, 150, 150, 140, 400 ,524, 551, 393, 136, 68],
  backgroundColor: 'rgba(99, 132, 0, 0.6)',
  borderWidth: 0,
  yAxisID: "y-axis-gravity"
};

var planetData = {
  labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Agosto","Septiembre", "Octubre", "Noviembre", "Diciembre"],
  datasets: [densityData, gravityData]
};

var chartOptions = {
  scales: {
    xAxes: [{
      barPercentage: 1,
      categoryPercentage: 0.6
    }],
    yAxes: [{
      id: "y-axis-density"
    }, {
      id: "y-axis-gravity"
    }]
  }
};

var barChart = new Chart(densityCanvas, {
  type: 'bar',
  data: planetData,
  options: chartOptions
});

//------------------------------------------------------------------------------------------------------------


function consultarProductosReporte()
{
  var tipoProductoReporte = $("#tipoProductoReporte").val();
  var fechaReporteProducto = $("#fechaReporteProducto").val();
  var datos = new FormData();
  datos.append("tipoProductoReporte", tipoProductoReporte);
  datos.append("fechaReporteProducto", fechaReporteProducto);
  let plantilla2 = " ";
  let obj
  $.ajax({
    url:"//localhost/aguaMineral/ajax/administracionReporte.ajax.php",
    method:"POST",
    data: datos, 
    cache: false,
    contentType: false,
    processData: false,
    success: function(respuesta3){
      
      if(respuesta3.length >10 ){

        respuesta3 =respuesta3.replace("[","");
        respuesta3 =respuesta3.replace("]","");
        var auxSplit2 = respuesta3.split("},");

        plantilla2 +='<div class="col-lg-9 col-md-9 col-sm-10 col-xs-12 m-2" id="">'
        for(var i=0;i<auxSplit2.length;i++){
          if(!auxSplit2[i].includes("}")){
            auxSplit2[i] = auxSplit2[i]+"}";
          }
         /* var res2 = JSON.parse(auxSplit2[i]);
          var aux = "'"+res2.nombreSucursal+"'";
          var aux2 = "'"+res2.direccionSucursal+"'";
          plantilla2 +='<div class="p-2">'

          plantilla2 +='                      <h3 class="div-pais p-3 rounded">'+res2.nombreSucursal+'<a href="javascript:eliminarCiudad('+res2.idSucursal+')" class=""><button class="btn eliminarPais eliminar text-danger" type="button"><i class="fas fa-trash-alt"></i></button></a><a href="javascript:mostrarModalEditSucursal('+res2.idSucursal+','+aux+','+aux2+');" class=""><button class="btn eliminarPais eliminar text-primary" type="button"><i class="fas fa-pencil-alt"></i></button></a></h3>'

          plantilla2 +='   </div>'
*/
        }
       /* plantilla2 +='</div>'
        $("#verSucursal").html(plantilla2);  
        $('#verSucursal').show();*/
      }else{
        /*$("#verSucursal").hide(); */

      }
      

    }
  })
}
