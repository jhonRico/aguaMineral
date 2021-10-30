$(document).ready(function($){
  rutaActual = window.location.toString();
  if(rutaActual.includes("reporteContrato")){ 
      consultarContratos();
      consultarContratosActivos();
      consultarContratosDevueltos();
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
  $("#fechaReporteContrato").html(plantilla);
  $("#fechaReporteContrato").show();    
});


$("#fechaReporteContrato").change(function(){
  consultarContratosActivos();
  consultarContratosDevueltos();
});

//------------------------------------------------------------------------------------------------------------

var myArray = new Array();
var myArray2 = new Array();
function consultarContratosActivos()
{
  var fechaReporteContrato = $("#fechaReporteContrato").val();
  var datos = new FormData();
  datos.append("fechaReporteContrato", fechaReporteContrato);
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
    var respuestaNula = ' [[{"COUNT(idContrato)":"0","0":"0"}],[{"COUNT(idContrato)":"0","0":"0"}],[{"COUNT(idContrato)":"0","0":"0"}],[{"COUNT(idContrato)":"0","0":"0"}],[{"COUNT(idContrato)":"0","0":"0"}],[{"COUNT(idContrato)":"0","0":"0"}],[{"COUNT(idContrato)":"0","0":"0"}],[{"COUNT(idContrato)":"0","0":"0"}],[{"COUNT(idContrato)":"0","0":"0"}],[{"COUNT(idContrato)":"0","0":"0"}],[{"COUNT(idContrato)":"0","0":"0"}],[{"COUNT(idContrato)":"0","0":"0"}]]';
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
          respuestaFinal = auxSplit2[i][23]+auxSplit2[i][24]+auxSplit2[i][25]+auxSplit2[i][26];
          respuestaFinal = respuestaFinal.replace('"','');
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
        mostrarGraficosContrato();
        $("#graficoContrato").show();
      }else
      {
        $("#graficoContrato").hide(); 
      }
    }
  })
}
function consultarContratosDevueltos()
{
  var fechaReporteContrato = $("#fechaReporteContrato").val();
  var datos = new FormData();
  datos.append("fechaReporteContratoDevuelto", fechaReporteContrato);
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
    var respuestaNula = ' [[{"COUNT(idContrato)":"0","0":"0"}],[{"COUNT(idContrato)":"0","0":"0"}],[{"COUNT(idContrato)":"0","0":"0"}],[{"COUNT(idContrato)":"0","0":"0"}],[{"COUNT(idContrato)":"0","0":"0"}],[{"COUNT(idContrato)":"0","0":"0"}],[{"COUNT(idContrato)":"0","0":"0"}],[{"COUNT(idContrato)":"0","0":"0"}],[{"COUNT(idContrato)":"0","0":"0"}],[{"COUNT(idContrato)":"0","0":"0"}],[{"COUNT(idContrato)":"0","0":"0"}],[{"COUNT(idContrato)":"0","0":"0"}]]';
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
          respuestaFinal = auxSplit2[i][23]+auxSplit2[i][24]+auxSplit2[i][25]+auxSplit2[i][26];
          respuestaFinal = respuestaFinal.replace('"','');
          respuestaFinal = respuestaFinal.replace('"','');
          if (respuestaFinal.includes(',')) 
          {
            respuestaFinal = respuestaFinal.replace(',','');
          }
          if (respuestaFinal.includes("ul") || respuestaFinal.includes("NaN")) 
          {
            respuestaFinal = "0";
          }
          myArray2[i] = respuestaFinal;
        }
        mostrarGraficosContrato();
        $("#graficoContrato").show();
      }else
      {
        $("#graficoContrato").hide();
      }
    }
  })
}


function mostrarGraficosContrato()
{
var densityCanvas = document.getElementById("graficoContrato");
Chart.defaults.global.defaultFontFamily = "Lato";
Chart.defaults.global.defaultFontSize = 12;

          var densityData = {
            label: 'Contratos Activos',
            data: myArray,
            backgroundColor: 'rgba(0, 99, 132, 0.6)',
            borderWidth: 0,
            yAxisID: "y-axis-density"
          };
          var gravityData = {
            label: 'Contratos Devueltos',
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


function consultarContratos()
{
  var datos = new FormData();
  datos.append("consultarContratos", 'valor');
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
        var resultado = 0;
        var resultado2 = 0;
        for(var i=0;i<auxSplit2.length;i++)
        {
          if(!auxSplit2[i].includes("}"))
          {
            auxSplit2[i] = auxSplit2[i]+"}";
          }
          var res2 = JSON.parse(auxSplit2[i]);
          if (res2.estadoContrato == 'A') 
          {
            resultado = resultado + 1;
          }else
          {
            resultado2 = resultado2 + 1;
          }
        }
        $("#contratosActivos").text(resultado); 
        $("#contratosDevueltos").text(resultado2); 
      }else
      {
        $("#estantesDisponibles").hide();   
        $("#botellonesDisponibles").hide();           
      }
    }
  })
}
