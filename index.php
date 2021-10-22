<?php
session_start();

if (!isset($_SESSION["Rol"])) {
    header("Location: ./php/vistas/page_login/index.php");
} else {
    header("Location: ./php/vistas/page_principal/index.php");
}
