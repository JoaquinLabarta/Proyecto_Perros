<?php
include_once "pdo.php";

$query = "SELECT UsuarioID, Usuario, Nombre, Apellido, Nacimiento, Email, Clave, Administrador, Activo FROM Usuarios";
$sql = $pdo->prepare($query);
$sql->execute();
$usuarios = $sql->fetchAll();
