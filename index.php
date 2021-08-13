<?php
session_start();

if ($_SESSION) {
  header("Location: /proyecto-perros/php/vistas/page_principal");
}

include_once "/proyecto-perros/php/vistas/page_login/index.php";
