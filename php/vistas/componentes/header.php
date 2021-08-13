<?php
if (!$_SESSION["Invitado"]) {
  include_once "../../conexion/pdo.php";

  $query = "SELECT Administrador 
FROM Usuarios 
WHERE Usuario = :usuario AND Email = :email";

  $sql = $pdo->prepare($query);
  $sql->bindParam(":usuario", $_SESSION["Usuario"]);
  $sql->bindParam(":email", $_SESSION["Email"]);

  $sql->execute();

  $usuarios = $sql->fetchAll(PDO::FETCH_ASSOC);
  $es_admin = $usuarios[0]["Administrador"];
  $_SESSION["Invitado"] = 0;
} else {
  $es_admin = 0;
}
?>

<nav class="navbar navbar-light shadow-sm">
  <div class="container-fluid">
    <a class="navbar-brand" style="color:#649FA5">
      <img src="/proyecto-perros/recursos/logo.png" alt="" width="40" height="40">
      Bromatologia | Municipalidad de Saladillo
    </a>
    <div>
      <?php if (!$_SESSION["Invitado"] && $carpeta_actual !== "page_principal") : ?>
        <a class="btn btn-white" style="color: #649fa5" href="/proyecto-perros/php/vistas/page_principal">
          Inicio
        </a>
      <?php endif; ?>
      <?php if ($es_admin && $carpeta_actual !== "page_usuarios") : ?>
        <a class='btn btn-white' style='color: #649fa5' href="/proyecto-perros/php/vistas/page_usuarios">
          Usuarios
        </a>
      <?php endif; ?>
      <a class="btn btn-white" style="color: #649fa5" href="/proyecto-perros/php/conexion/page_principal/cerrar_sesion.php">Cerrar sesion</a>
    </div>
  </div>
</nav>
