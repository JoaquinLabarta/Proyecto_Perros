<?php
session_start();

if (!isset($_SESSION["Rol"])) {
    header("Location: /proyecto-perros/php/vistas/page_login");
} else {
    header("Location: /proyecto-perros/php/vistas/page_principal");
}
