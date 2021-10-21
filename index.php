<?php
session_start();

if (!isset($_SESSION["Rol"])) {
    header("Location: /perros/php/vistas/page_login");
} else {
    header("Location: /perros/php/vistas/page_principal");
}
