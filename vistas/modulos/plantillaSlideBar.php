<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<?php  
  

?>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class="fas fa-tint icon"></i>
        <div class="logo_name">Agua Mineral Ureña</div>
        <i class="fas fa-bars" id="btn"></i>    
      </div>
    <ul class="nav-list">
      <li>
       <a href="http://localhost/aguaMineral/principal">
         <i class="fas fa-home text-white"></i>
         <span class="links_name">Principal</span>
       </a>
       <span class="tooltip">Principal</span>
     </li>
     <li>
       <a href="http://localhost/aguaMineral/contratoPrincipal">
         <i class="fas fa-file-signature"></i>
         <span class="links_name">Contratos</span>       
       </a>
       <span class="tooltip">Contratos</span>
     </li>
     <li>
       <a href="#"> 
         <i class="fas fa-file-alt"></i>
         <span class="links_name">Reportes</span>
       </a>
       <span class="tooltip">Reportes</span>
     </li>
      <li>
        <a href="http://localhost/aguaMineral/zonas">
          <i class="fas fa-user-alt"></i>
          <span class="links_name">Clientes</span>
        </a>
         <span class="tooltip">Clientes</span>
      </li>
     <?php 
       if($usuario == 1) 
       {
         ?>
             <li>
               <a href="http://localhost/aguaMineral/administracion">
                 <i class="fas fa-users-cog"></i>
                 <span class="links_name">Administración</span>
               </a>
               <span class="tooltip">Administración</span>
             </li>
         <?php  
        } 
     ?>
     <li class="profile">
        <form action="" method="post">
         <span title="Cerrar Sesión"><button name="cerrar"><i class="fas fa-sign-out-alt" id="log_out"></i></button></span>
        </form>
     </li>
    </ul>
  </div>
  <script>
  let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");
  let searchBtn = document.querySelector(".bx-search");

  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();//calling the function(optional)
  });

  searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
    sidebar.classList.toggle("open");
    menuBtnChange(); //calling the function(optional)
  });

  // following are the code to change sidebar button(optional)
  function menuBtnChange() {
   if(sidebar.classList.contains("open")){
     closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
   }else {
     closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
   }
  }
  </script>
</body>
</html>
