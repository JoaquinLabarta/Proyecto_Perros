<?php include_once "../../conexion/pdo.php"; ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="./php/vistas/page_login/logo.png">
        <link href="./php/vistas/page_login/index_files/bootstrap.min.css" rel="stylesheet">
        <link href="./php/vistas/page_login/index_files/signin.css" rel="stylesheet">
        <title>Bromatologia - Saladillo</title>
    </head>
    <body>
        <form class="form-signin d-flex flex-column align-items-center">
            <!--Header-->
            <div class="text-center mb-4">
                <h3 class="h3 mb-4 font-weight-normal" style="color:#649FA5">
                    Bromatologia |  Municipalidad de Saladillo
                </h3> 
                <img src="./php/vistas/page_login/logo.png" alt="Logo" width="150">
            </div>
            <!--Inputs-->
            <div class="mb-4">
                <input type="text" id="inputuser" class="form-control" placeholder="Ingrese su usuario" required>
            </div>
            <div class="mb-4">
                <input type="password" id="inputpassword" class="form-control" placeholder="Ingrese su contraseña" required>
            </div>
            <!--Botones de submit-->
            <button class="btn btn-lg btn-danger" type="submit" style="color: D0757C;">Ingresar</button><br><br>
            <a href="#">Ingresar como invitado</a>
        </form>
    </body>
</html>
