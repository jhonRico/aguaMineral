
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">
  <link href="/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">

  <style>

    html,
    body {
      height: 100%;
    }

    body{
      display: flex;
      align-items: center;
      padding-top: 60px;
      padding-bottom: 40px;
      background: linear-gradient(to bottom, #DCFFFE, white);
    }

    .form-signin 
    {

      width: 100%;
      padding: 50px;
      background: linear-gradient(to top, #00ADFE, white);
      border-radius: 10px;
    }

    .form-signin .checkbox {
      font-weight: 400;
    }

    .form-signin .form-floating:focus-within {
      z-index: 2;
    }

    .form-signin input[type="email"] {
      margin-bottom: -1px;
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
      background: #E1F5FF;
    }

    .form-signin input[type="password"] {
      margin-bottom: 10px;
      border-top-left-radius: 0;
      border-top-right-radius: 0;
      background: #E1F5FF;
    }
  </style>
</head>


<body class="text-center bg-light">
  <div class="ms-5">
    <div class="ms-5">
      <div class="ms-5">
        <div class="ms-5">
          <div class="ms-5">
            <div class="ms-5">
              <div class="ms-5">
                <div class="ms-5">
                  <div class="ms-5">
                    <div class="ms-3">
                      <main class="form-signin ms-5">
                        <form class="">
                          <img class="mb-4" src="<?php echo $url ?>vistas/img/logoPrincipal/logop.png" alt="" width="72" height="57">
                          <h1 class="h3 mb-3 fw-normal">Iniciar Sesión</h1>

                          <div class="form-floating">
                            <input type="email" class="form-control" id="correo" placeholder="nombre usuario">
                            <label for="floatingInput">Nombre de usuario</label>
                          </div>
                          <div class="form-floating">
                            <input type="password" class="form-control" id="password" placeholder="Contraseña">
                            <label for="floatingPassword">Contraseña</label>
                          </div>

                          <div class="checkbox mb-3">
                            <label>
                              <input type="checkbox" value="remember-me" class="me-1">Recuerdame
                            </label>
                          </div>
                          <button class="w-100 btn btn-lg btn-primary" type="button" id="ingresar">Entrar</button>
                          <p class="mt-5 mb-3 text-white">&copy; COPYRIGHT © 2021</p>
                        </form>
                      </main>
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
</body>

</html>
