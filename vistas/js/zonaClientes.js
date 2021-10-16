
//Reidreccionar pagina y volver la descripcion solo minusculas
function redireccionarPaginaZonas(descripcion)
{
  result = descripcion.toLowerCase();
  window.location.replace("http://localhost/aguaMineral/"+result);

}