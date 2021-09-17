<?php
// Se incluye la conexion a la BDD.
include "../pdo.php";

// Definicion de variables
$propietarioId = $_POST["propietarioId"];
$perroId = $_POST["perroId"];

/* Query para checkear si el email ya esta registrado en la base de datos */
$sql = $pdo->prepare("SELECT propietarioPerroId FROM PropietariosPerros 
    WHERE PropietarioId = :propietarioId AND PerroId = :perroId");
$sql->execute(["propietarioId" => $propietarioId, "perroId" => $perroId]);
$checkResult = $sql->fetchAll();

/**
 * Checkeo que se hace para saber si el el registro ya existe en la base de datos
 */
if (count($checkResult) > 0) {
    return false;
} else {
    /* Query para insertar un nuevo registro en la base de datos. */
    $query =
        "INSERT INTO PropietariosPerros(PropietarioId, PerroId) VALUES (:propietarioId, :perroId)";
    $params = ["propietarioId" => $propietarioId, "perroId", $perroId];

    try {
        $result = $pdo->prepare($query)->execute($params);
    } catch (\Throwable $th) {
        throw $th;
    }
}

die();
