<?php
  include_once "../php/conexion/pdo.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="logo.png">
        <title>Bromatologia - Saladillo</title>
        <link href="./index_files/bootstrap.min.css" rel="stylesheet">
        <link href="./index_files/signin.css" rel="stylesheet">
    </head>

  <body><center>
    <span>
    <form class="form-signin">
        <h3 class="h3 mb-3 font-weight-normal" style="color:#649FA5">Bromatologia |  Municipalidad de Saladillo</h3> 
           <img class="mb-4" src="logo.png" alt="" width="150" height="150">
            <label for="inputuser" class="sr-only">user</label>
            <input type="user" id="inputuser" class="form-control" placeholder="Ingrese Nombre" required="" autofocus="">
            <br>
            <label for="inputpassword" class="sr-only">password</label>
            <input type="password" id="inputpassword" class="form-control" placeholder="Ingrese Contraseña" required="">
        <div class="checkbox mb-3"></div>
            <button class="btn btn-lg btn-danger" type="submit" style="color: D0757C;">Ingresar</button><br><br>
            <a href="#">Ingresar como invitado</a>
    </form>
    </span>
  </body></center>
</html>