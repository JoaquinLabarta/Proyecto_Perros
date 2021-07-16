<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="/proyecto-perros/php/vistas/page_login/logo.png">
        <link href="/proyecto-perros/php/vistas/page_login/index_files/bootstrap.min.css" rel="stylesheet">
        <link href="/proyecto-perros/php/vistas/page_login/index_files/signin.css" rel="stylesheet">
        <title>Bromatologia - Saladillo</title>
        <script src="./js/pageLogin.js"></script>
    </head>
    <body>
        <form class="form-signin d-flex flex-column align-items-center needs-validation" method="POST" name="formularioLogin" novalidate 
            action="./php/conexion/page_login/action.php">
            <!--Header-->
            <div class="text-center mb-4">
                <h3 class="h3 mb-4 font-weight-normal" style="color:#649FA5">
                    Bromatologia |  Municipalidad de Saladillo
                </h3> 
                <img src="/proyecto-perros/php/vistas/page_login/logo.png" alt="Logo" width="150">
            </div>
            <!--Inputs-->
            <div class="mb-4 input-group has-validation">
                <input type="text" name="inputUser" class="form-control" placeholder="Ingrese su usuario" required>
                <div class="invalid-feedback">
                    Por favor ingrese su usuario.
                </div>
            </div>
            <div class="mb-4 input-group has-validation">
                <input type="password" name="inputPassword" class="form-control" placeholder="Ingrese su clave" required>
                <div class="invalid-feedback">
                    Por favor ingrese su clave.
                </div>
            </div>
            <!--Botones de submit-->
            <button class="btn btn-lg btn-danger mb-4" type="submit" style="color: D0757C;">
                Ingresar
            </button>
            <a href="#">Ingresar como invitado</a>
        </form>
    </body>
</html>
