<?php
include_once "../pdo.php";

$username = $_POST["usernameInput"];
$password = $_POST["passwordInput"];

$validationQuery = "SELECT UsuarioID, Usuario, Nombre, Apellido, Nacimiento, Email, Clave, Administrador, Activo " +
    "FROM Usuarios WHERE Usuario = ";
?>
