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
    <a class="navbar-brand" style="color:#649FA5" href="/proyecto-perros/php/vistas/page_principal">
      <img src="/proyecto-perros/recursos/logo.png" alt="" width="40" height="40">
      Bromatologia | Municipalidad de Saladillo
    </a>
    <div class="d-flex">
      <?php if ($es_admin) : ?>
        <div class="dropdown me-2">
          <button class="btn btn-white border" style='color: #649fa5' type="button" data-bs-toggle="dropdown" title="Agregar">
            <i class="fas fa-plus"></i>
          </button>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
            <?php if ($es_admin && $carpeta_actual === "page_principal") : ?>
              <li>
                <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#agregarPerro">Nuevo perro</button>
              </li>
            <?php endif; ?>
            <?php if ($es_admin && $carpeta_actual !== "page_usuarios") : ?>
              <li>
                <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#agregarPropietario">Nuevo propietario</button>
              </li>
            <?php endif; ?>
            <?php if ($es_admin && $carpeta_actual !== "page_usuarios") : ?>
              <li>
                <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#agregarVacuna">Nueva vacuna</button>
              </li>
            <?php endif; ?>
            <?php if ($es_admin && $carpeta_actual === "page_usuarios") : ?>
              <li>
                <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#agregarUsuario">Nuevo usuario</button>
              </li>
            <?php endif; ?>
          </ul>
        </div>
      <?php endif; ?>
      <?php if (!$_SESSION["Invitado"] && $carpeta_actual !== "page_principal") : ?>
        <a class="btn btn-white border me-2" title="Inicio" style="color: #649fa5" href="/proyecto-perros/php/vistas/page_principal">
          <i class="fas fa-home"></i>
        </a>
      <?php endif; ?>
      <?php if ($es_admin && $carpeta_actual !== "page_usuarios") : ?>
        <a class='btn btn-white border me-2' title="Usuarios" style='color: #649fa5' href="/proyecto-perros/php/vistas/page_usuarios">
          <i class="fas fa-users"></i>
        </a>
      <?php endif; ?>
      <?php if ($es_admin && $carpeta_actual !== "page_propietarios") : ?>
        <a class='btn btn-white border me-2' title="Propietarios" style='color: #649fa5' href="/proyecto-perros/php/vistas/page_propietarios">
          <i class="fas fa-id-card"></i>
        </a>
      <?php endif; ?>
      <?php if ($es_admin && $carpeta_actual !== "page_vacunas") : ?>
        <a class='btn btn-white border me-2' title="Vacunas" style='color: #649fa5' href="/proyecto-perros/php/vistas/page_vacunas">
          <i class="fas fa-syringe"></i>
        </a>
      <?php endif; ?>
      <a class="btn btn-white border" title="Cerrar sesion" style="color: #649fa5" href="/proyecto-perros/php/conexion/page_principal/cerrar_sesion.php">
        <i class="fas fa-sign-out-alt"></i>
      </a>
    </div>
  </div>
</nav>
