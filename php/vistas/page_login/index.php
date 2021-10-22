<?php
session_start();

if (isset($_SESSION["Rol"])) {
    header("Location: ../../../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../../../recursos/logo.png">
  <link href="../../../css/bootstrap/bootstrap.min.css" rel="stylesheet">
  <link href="../../../css/page_login/styles.css" rel="stylesheet">
  <title>Bromatologia - Saladillo</title>
</head>
<body style="height: 100vh;" class="d-flex align-items-center justify-content-center">
  <div class="contenedor">
    <div class="d-flex flex-column align-items-center border-primary">
      <!--Header-->
      <div class="text-center mb-4">
        <h3 class="h4 mb-4 font-weight-normal" style="color:#649FA5">
          Bromatologia | Municipalidad de Saladillo
        </h3>
        <img src="../../../recursos/logo.png" alt="Logo" width="140">
      </div>
      <form class="form-signin needs-validation" method="POST" name="formularioLogin" novalidate action="../../../php/conexion/page_login/action.php">
        <!--Inputs-->
        <div class="mb-4 input-group has-validation">
          <input type="text" name="usernameInput" class="form-control" placeholder="Ingrese su usuario" required autocomplete>
          <div class="invalid-feedback">
            Por favor ingrese su usuario.
          </div>
        </div>
        <div class="mb-4 input-group has-validation">
          <input type="password" name="passwordInput" class="form-control" placeholder="Ingrese su clave" required autocomplete>
          <div class="invalid-feedback">
            Por favor ingrese su clave.
          </div>
        </div>
        <!--Botones de submit-->
        <div class="d-flex align-items-center flex-column">
          <button class="btn btn-lg btn-danger mb-4" type="submit" style="color: D0757C;">
            Ingresar
          </button>
          <a href="../../../php/conexion/page_login/ingreso_invitados.php">Ingresar como invitado</a>
        </div>
      </form>
    </div>
  </div>
</body>
<script src="../../../js/modulos/bootstrap/bootstrap.js" type="module"></script>
</html>
