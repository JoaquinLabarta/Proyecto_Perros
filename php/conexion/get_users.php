<?php
include_once "pdo.php";

$query = "SELECT UsuarioId, Usuario, Nombre, Apellido, Nacimiento, Email, Clave, Activo 
    FROM Usuarios";

$sql = $pdo->prepare($query);
$sql->execute();
$usuarios = $sql->fetchAll(PDO::FETCH_ASSOC);
