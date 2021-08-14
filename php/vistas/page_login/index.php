<?php
session_start();

if ($_SESSION["Usuario"] || $_SESSION["Invitado"]) {
  header("Location: /proyecto-perros");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="/proyecto-perros/recursos/logo.png">
  <link href="/proyecto-perros/css/bootstrap/bootstrap.min.css" rel="stylesheet">
  <link href="/proyecto-perros/css/page_login/styles.css" rel="stylesheet">
  <link href="/proyecto-perros/css/global.css" rel="stylesheet">
  <title>Bromatologia - Saladillo</title>
</head>

<body>
  <div class="contenedor">
    <div class="d-flex flex-column align-items-center border-primary">
      <!--Header-->
      <div class="text-center mb-4">
        <h3 class="h3 mb-4 font-weight-normal" style="color:#649FA5">
          Bromatologia | Municipalidad de Saladillo
        </h3>
        <img src="/proyecto-perros/recursos/logo.png" alt="Logo" width="150">
      </div>
      <form class="form-signin needs-validation" method="POST" name="formularioLogin" novalidate action="/proyecto-perros/php/conexion/page_login/action.php">
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
          <a href="/proyecto-perros/php/conexion/page_login/ingreso_invitados.php">Ingresar como invitado</a>
        </div>
      </form>
    </div>
  </div>
</body>
<script>
  // Validacion de los campos de texto
  (function() {
    'use strict'

    // Hacemos un querySelector de los formularios que necesitan validacion.
    var forms = document.querySelectorAll('.needs-validation')

    // Hacemos un loop y prevenimos que se submitan en caso de que esten incompletos.
    Array.prototype.slice.call(forms)
      .forEach(function(form) {
        form.addEventListener('submit', function(event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }

          form.classList.add('was-validated')
        }, false)
      })
  })()
</script>

</html>
