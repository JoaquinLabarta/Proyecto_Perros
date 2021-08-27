<?php
include_once "pdo.php";

$query = "SELECT Propietarios.PropietarioId, CONCAT(Propietarios.Nombre, \" \", Propietarios.Apellido) AS Nombre FROM Propietarios;";

$sql = $pdo->prepare($query);
$sql->execute();
$propietarios = $sql->fetchAll(PDO::FETCH_ASSOC);
