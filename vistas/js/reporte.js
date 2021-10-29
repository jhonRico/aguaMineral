$(document).ready(function($){
  rutaActual = window.location.toString();
  if(rutaActual.includes("reporteProducto")){ 
      consultarProductosPrestados();
      consultarProductosReporte();
      consultarProductosDisponiblesEnBd();
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
   consultarProductosPrestados();
   consultarProductosReporte();
});

$("#fechaReporteProducto").change(function(){
  consultarProductosPrestados();
  consultarProductosReporte();
});

//------------------------------------------------------------------------------------------------------------

var myArray = new Array();
var myArray2 = new Array();
function consultarProductosReporte()
{
  var array = ($("#tipoProductoReporte").val()).split("-");
  var tipoProductoReporte = array[0];
  var fechaReporteProducto = $("#fechaReporteProducto").val();
  var datos = new FormData();
  datos.append("tipoProductoReporte", tipoProductoReporte);
  datos.append("fechaReporteProducto", fechaReporteProducto);
  let plantilla2 = " ";
  $.ajax({
    url:"//localhost/aguaMineral/ajax/administracionReporte.ajax.php",
    method:"POST",
    data: datos, 
    cache: false,
    contentType: false,
    processData: false,
    success: function(respuesta3)
    {
    var respuestaNula = ' [[{"SUM(cantidadTotal)":null,"0":null}],[{"SUM(cantidadTotal)":null,"0":null}],[{"SUM(cantidadTotal)":null,"0":null}],[{"SUM(cantidadTotal)":null,"0":null}],[{"SUM(cantidadTotal)":null,"0":null}],[{"SUM(cantidadTotal)":null,"0":null}],[{"SUM(cantidadTotal)":null,"0":null}],[{"SUM(cantidadTotal)":null,"0":null}],[{"SUM(cantidadTotal)":null,"0":null}],[{"SUM(cantidadTotal)":null,"0":null}],[{"SUM(cantidadTotal)":null,"0":null}],[{"SUM(cantidadTotal)":null,"0":null}]]';
    if(!respuesta3.includes(respuestaNula))
    {
        while(respuesta3.includes('[') || respuesta3.includes(']'))
        {
          respuesta3 = respuesta3.replace('[','');
          respuesta3 = respuesta3.replace(']','');
        }
        var auxSplit2 = respuesta3.split("}");
        for(var i=0;i<12;i++)
        {
          if(!auxSplit2[i].includes("}")){
            auxSplit2[i] = auxSplit2[i]+"}";
          } 
          respuestaFinal = auxSplit2[i][24]+auxSplit2[i][25]+auxSplit2[i][26]+auxSplit2[i][27];
          respuestaFinal = respuestaFinal.replace('"','');
          if (respuestaFinal.includes(',')) 
          {
            respuestaFinal = respuestaFinal.replace(',','');
          }
          if (respuestaFinal.includes("ul") || respuestaFinal.includes("NaN")) 
          {
            respuestaFinal = "0";
          }
          myArray[i] = respuestaFinal;
        }
        mostrarGraficos();
        $("#densityChart").show();
      }else
      {
        $("#densityChart").hide(); 
      }
    }
  })
}
function consultarProductosPrestados()
{
  var array = ($("#tipoProductoReporte").val()).split("-");
  var tipoProductoReporte = array[1];
  var fechaReporteProducto = $("#fechaReporteProducto").val();
  var datos = new FormData();
  datos.append("tipoProductoPrestado", tipoProductoReporte);
  datos.append("fechaProductoPrestado", fechaReporteProducto);
  let plantilla2 = " ";
  $.ajax({
    url:"//localhost/aguaMineral/ajax/administracionReporte.ajax.php",
    method:"POST",
    data: datos, 
    cache: false,
    contentType: false,
    processData: false,
    success: function(respuesta3)
    {
      var respuestaNula = ' [[{"SUM(cantidadProd)":null,"0":null}],[{"SUM(cantidadProd)":null,"0":null}],[{"SUM(cantidadProd)":null,"0":null}],[{"SUM(cantidadProd)":null,"0":null}],[{"SUM(cantidadProd)":null,"0":null}],[{"SUM(cantidadProd)":null,"0":null}],[{"SUM(cantidadProd)":null,"0":null}],[{"SUM(cantidadProd)":null,"0":null}],[{"SUM(cantidadProd)":null,"0":null}],[{"SUM(cantidadProd)":null,"0":null}],[{"SUM(cantidadProd)":null,"0":null}],[{"SUM(cantidadProd)":null,"0":null}]]';
      if(!respuesta3.includes(respuestaNula) && !respuesta3.includes(' [[{"SUM(cantidadProd_2)":null,"0":null}],[{"SUM(cantidadProd_2)":null,"0":null}],[{"SUM(cantidadProd_2)":null,"0":null}],[{"SUM(cantidadProd_2)":null,"0":null}],[{"SUM(cantidadProd_2)":null,"0":null}],[{"SUM(cantidadProd_2)":null,"0":null}],[{"SUM(cantidadProd_2)":null,"0":null}],[{"SUM(cantidadProd_2)":null,"0":null}],[{"SUM(cantidadProd_2)":null,"0":null}],[{"SUM(cantidadProd_2)":null,"0":null}],[{"SUM(cantidadProd_2)":null,"0":null}],[{"SUM(cantidadProd_2)":null,"0":null}]]'))
      {
          while(respuesta3.includes('[') || respuesta3.includes(']'))
          {
            respuesta3 = respuesta3.replace('[','');
            respuesta3 = respuesta3.replace(']','')
          }
          var auxSplit2 = respuesta3.split("}");
          if (tipoProductoReporte == 'Estantes') 
          {
            for(var i=0;i<12;i++)
            {
                if(!auxSplit2[i].includes("}"))
                {
                  auxSplit2[i] = auxSplit2[i]+"}";
                } 
                respuestaFinal = auxSplit2[i][23]+auxSplit2[i][24]+auxSplit2[i][25]+auxSplit2[i][26];
                respuestaFinal = respuestaFinal.replace('"','');
                respuestaFinal = respuestaFinal.replace('"','');
                if (respuestaFinal.includes(',')) 
                {
                  respuestaFinal = respuestaFinal.replace(',','');
                }
                myArray2[i] = respuestaFinal;   
            }
          }else
          {
            for(var i=0;i<12;i++)
            {
                if(!auxSplit2[i].includes("}"))
                {
                  auxSplit2[i] = auxSplit2[i]+"}";
                } 
                respuestaFinal = auxSplit2[i][25]+auxSplit2[i][26]+auxSplit2[i][27]+auxSplit2[i][28];
                respuestaFinal = respuestaFinal.replace('"','');
                respuestaFinal = respuestaFinal.replace('"','');
                if (respuestaFinal.includes(',')) 
                {
                  respuestaFinal = respuestaFinal.replace(',','');
                }
                myArray2[i] = respuestaFinal;   
            }
          }
          mostrarGraficos();
          $("#densityChart").show();
        }else
        {
          $("#densityChart").hide(); 
        }
      }
  })
}


function mostrarGraficos()
{
var densityCanvas = document.getElementById("densityChart");
Chart.defaults.global.defaultFontFamily = "Lato";
Chart.defaults.global.defaultFontSize = 12;

          var densityData = {
            label: 'Productos registrados',
            data: myArray,
            backgroundColor: 'rgba(0, 99, 132, 0.6)',
            borderWidth: 0,
            yAxisID: "y-axis-density"
          };
          var gravityData = {
            label: 'Productos Prestados',
            data: myArray2,
            backgroundColor: 'rgba(99, 132, 0, 0.6)',
            borderWidth: 0,
            yAxisID: "y-axis-gravity"
          };
          var planetData = {
            labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
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

}


function consultarProductosDisponiblesEnBd()
{
  var array = ($("#tipoProductoReporte").val()).split("-");
  var tipoProductoReporte = array[0];
  var resultado = 0;
  var resultado2 = 0;
  var datos = new FormData();
  datos.append("consultarProductos", 'valor');
  let plantilla2 = " ";
  $.ajax({
    url:"//localhost/aguaMineral/ajax/administracionReporte.ajax.php",
    method:"POST",
    data: datos, 
    cache: false,
    contentType: false,
    processData: false,
    success: function(respuesta3)
    {
      if(respuesta3.length >10 )
       {
        respuesta3 =respuesta3.replace("[","");
        respuesta3 =respuesta3.replace("]","");
        var auxSplit2 = respuesta3.split("},");
        for(var i=0;i<auxSplit2.length;i++)
        {
          if(!auxSplit2[i].includes("}"))
          {
            auxSplit2[i] = auxSplit2[i]+"}";
          }
          var res2 = JSON.parse(auxSplit2[i]);
          if (res2.TipoProducto_idTipoProducto == tipoProductoReporte) 
          {
            resultado = resultado + Number(res2.cantidadProductos);
          }else
          {
            resultado2 = resultado2 + Number(res2.cantidadProductos);
          }
        }
        $("#estantesDisponibles").text(resultado); 
        $("#botellonesDisponibles").text(resultado2); 
      }else
      {
        $("#estantesDisponibles").hide();   
        $("#botellonesDisponibles").hide();           
      }
    }
  })
}
