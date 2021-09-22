<?php
include_once "pdo.php";

$query =
    "SELECT DNI, Email, Telefono, Direccion, PropietarioId, Nombre, Apellido FROM Propietarios";

$sql = $pdo->prepare($query);
$sql->execute();
$propietarios = $sql->fetchAll(PDO::FETCH_ASSOC);
