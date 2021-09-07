<?php
include_once "pdo.php";

$query = "SELECT DNI, Email, Telefono, Direccion PropietarioId, CONCAT(Nombre, \" \", Apellido) AS Nombre FROM Propietarios";

$sql = $pdo->prepare($query);
$sql->execute();
$propietarios = $sql->fetchAll(PDO::FETCH_ASSOC);
