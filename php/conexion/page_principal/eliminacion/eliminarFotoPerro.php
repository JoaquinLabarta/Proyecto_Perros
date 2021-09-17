<?php
// Se incluye la conexion a la BDD.
include "../../pdo.php";
$perroId = $_POST["perroId"];
$fotoUrl = $_SERVER["DOCUMENT_ROOT"] . $_POST["fotoUrl"];

$deletePropietarioRelation =
    "UPDATE Perros SET FotoUrl = NULL WHERE PerroId = :perroId";
$params = ["perroId" => $perroId];

try {
    if (file_exists($fotoUrl)) {
        unlink($fotoUrl);
    }
    $result = $pdo->prepare($deletePropietarioRelation)->execute($params);
} catch (\Throwable $th) {
    echo "Hubo un error al intentar eliminar un perro.";
    echo $th;
}

die();
