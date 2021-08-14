<?php
session_start();

if ($_SESSION["Usuario"] || $_SESSION["Invitado"]) {
  header("Location: /proyecto-perros/php/vistas/page_principal");
} else {
  header("Location: /proyecto-perros/php/vistas/page_login");
}
