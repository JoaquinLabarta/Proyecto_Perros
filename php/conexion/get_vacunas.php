<?php
include_once "pdo.php";

$query = "SELECT V.VacunaId, V.Nombre FROM Vacunas V";

$sql = $pdo->prepare($query);
$sql->execute();
$vacunas = $sql->fetchAll(PDO::FETCH_ASSOC);
