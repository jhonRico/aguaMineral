<?php
    $url = Ruta::ctrlRuta();    
    $servidor = Ruta::ctrlRutaServidor();  
    session_start();
?>
<!-- TOP -->
<div  class="container-fluid p-3 barra border" id="top"> 
    <a href="<?php echo $url ?>" >
        <i class="fas fa-home home text-white"></i>
    </a> 
    <img src="<?php echo $url ?>vistas/img/logoPrincipal/logop.png" class="img-responsive imagenLogo">                                                                               
</div>
<hr align="left" noshade="noshade" size="2" width="80%" color= "#0056b2"/>

<!-- ==================================
VENTANA MODAL PARA EL INICIO DE SESÍON
======================================-->
<div class="modal fade modalFormulario" id="modalIngreso" tabindex="-1" role="dialog" aria-labelledby="modalIngreso" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content modalTitulo">

        <h3 class="colorbarra">INICIAR SESÍON</h3>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <div class="controlar">
        <div class="col-xs-12 espacio">
            <div class="col-md-12 espacio">
                <form method="post" class="form-signin">
                    <div id="logreg-forms">     
                                    
                        <p><br></p>
                        <div class="form-group">
                            <div class="input-group">
                                <span  class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input type="email" class="form-control" id="ingresoEmail" name="ingresoEmail" placeholder="Direccion de correo" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span  class="input-group-addon">
                                    <i class="glyphicon glyphicon-envelope"></i>
                                </span>
                                <input type="password" id="ingresoPassword"  name="ingresoPassword" class="form-control" autocomplete="off" placeholder="Password" required="">
                            </div>
                        </div>
                        <?php  
                            $ingreso  = new ControladorUsuarios();
                            $ingreso ->ctrlIngresoUsuario();
                        ?>
                        <div>

                        <a href="inicio" data-dismiss="modal" data-toggle="modal" >¿Olvidaste tu contraseña?</a>

                        </div>
                        <br>
                        <button type="submit" class="btn btn-success btn-block btnIngreso" ><i class="fa fa-sign-in"></i> INICIAR SESÍON</button>
                        

                    </div>
                </form>  
            </div>
        </div>
        </div>
      <div class="modal-footer">
      ¿No tienes una cuenta registrada? | <strong><a href="registro" data-dismiss="modal" data-toggle="modal">Registrarse</a></strong>
      </div>


    </div>
  </div>
</div>


<!-- ======================================
VENTANA MODAL PARA RECUPERAR LA CONTRASEÑA
==========================================-->
<div class="modal fade modalFormulario" id="modalPassword" tabindex="-1" role="dialog" aria-labelledby="modalPassword" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content modalTitulo">

        <h3 class="colorbarra">¿Has olvidado tu contraseña?</h3>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <div class="controlar">
        <div class="col-xs-12 espacio">
            <div class="col-md-12 espacio">
                <form method="post" class="form-signin">
                    <div id="logreg-forms">     
                                    
                        <h5 text-muted>Por motivos de seguridad, tu clave olvidada debe ser reemplazada por una nueva (no recuperada), para ésto, ingresa el mail que registraste en comparador.com.co</h5>
                        <br>
                        <div class="form-group">
                            <div class="input-group">
                                <span  class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input type="email" class="form-control" id="recuperarEmail" name="recuperarEmail" placeholder="Dirección de correo registrado" required>
                            </div>
                        </div>
                        <?php  
                            $password = new ControladorUsuarios();
                            $password ->ctrlOlvidoPassword(); 
                        ?>
                        
                        <button type="submit" class="btn btn-success btn-block" ><i class="fa fa-sign-in"></i> RECUPERAR CONTRASEÑA</button>

                    </div>
                </form>  
            </div>
        </div>
        </div>
        <div class="modal-footer">
        ¿No tienes una cuenta registrada? | <strong><a href="registro" data-dismiss="modal" data-toggle="modal">Registrarse</a></strong>
        </div>
    </div>
  </div>
</div>

<!-- ==========================
VENTANA MODAL PARA EL REGISTRO
=============================-->
<div class="modal fade modalFormulario" id="modalRegistro" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-content modal-dialog">
        <div class="modal-body modalTitulo">

            <h3 class="colorbarra"> CREAR UNA CUENTA</h3>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <div class="stepwizard">
                <div class="stepwizard-row setup-panel">
                    <div class="stepwizard-step">
                        <a href="#usu" type="button" class="btn btn-primary btn-circle"><i class="fa fa-user"></i></a>
                        <p>Registro Usuario</p>
                    </div>
                    <div class="stepwizard-step">
                        <a href="#tienda" type="button" class="btn btn-default btn-circle"><i class="fa fa-home"></i></a>
                        <p>Registro Tienda</p>
                    </div>
                </div>
            </div>

            <div class="separar"></div>
            <hr>
            <div class="controlar">
                <!-- ==========================
                REGISTRO PARA USUARIOS
                =============================-->
                <div class="row setup-content" id="usu">
                    <div class="col-xs-12  espacio">
                        <div class="col-md-12 espacio">
                            <form method="post" onsubmit="return registroUsuario()" class="form-signin">
                                <div id="logreg-forms">
                                   <!-- <h3>USUARIO</h3>  -->
                                    <div class="social-login">
                                        <button class="btn facebook-btn social-btn facebook" type="button"><span><i class="fa fa-facebook"></i> Iniciar con Facebook</span> </button>
                                        <button class="btn google-btn social-btn google" type="button"><span><i class="fa fa-google-plus"></i> Iniciar con Google+</span> </button>
                                        
                                        <p><br></p>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span  class="input-group-addon">
                                                    <i class="glyphicon glyphicon-user"></i>
                                                </span>
                                                <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Direccion de correo" autocomplete="off" required="" autofocus="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span  class="input-group-addon">
                                                    <i class="glyphicon glyphicon-envelope"></i>
                                                </span>
                                                <input type="password" id="inputPassword"  name="inputPassword" class="form-control" autocomplete="off" placeholder="Password" required="">
                                            </div>
                                        </div>
                                        <div class="form-group form-check">
                                            <input type="checkbox" class="form-check-input" required="" id="regPoliticas">
                                            <label class="form-check-label" for="exampleCheck1"><a href="">Politica y Condiciones de uso</a></label>
                                            <h5>Al registrarse, Usted Acepta nuestras Condiciones de uso y politica de privacidad</h5>
                                        </div>
                                        <?php  
                                            $registro  = new ControladorUsuarios();
                                            $registro ->ctrlRegistroUsuario();
                                        ?>
                                        <button class="btn btn-success btn-block" type="submit"><i class="fa fa-sign-in"></i> Registrarme</button>
                                        
                                    </div>
                                </div>  
                            </form>  
                        </div>
                    </div>
                </div>
                <!-- ==========================
                REGISTRO PARA TIENDAS
                =============================-->
                <div class="row setup-content" id="tienda">
                    <div class="col-xs-12 espacio">
                        <div class="col-md-6 espacio">
                            <form  method="post" onclass="form-signin">
                                <div id="logreg-forms">
                                    <div class="social-login">
                                        <h3>Registra tu <b>Tienda<b></h3>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span  class="input-group-addon">
                                                    <i class="glyphicon glyphicon-user"></i>
                                                </span>
                                               <!--  <input type="text" class="form-control text-uppercase" id="regTienda" name="regTienda" placeholder="Email address" autocomplete="on" required="" autofocus=""> -->
                                            </div>
                                        </div>
                                    
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span  class="input-group-addon">
                                                    <i class="glyphicon glyphicon-envelope"></i>
                                                </span>
                                             <!--   <input type="password" id="regPasswordTienda" name="regPasswordTienda" class="form-control" placeholder="Password" required="" autocomplete="on"> -->
                                            </div>
                                        </div>
                                        
                                        <button class="btn btn-success btn-block" type="submit"><i class="fa fa-sign-in"></i> Registrarse</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
