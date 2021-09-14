<?php
// Se incluye la conexion a la BDD.
include "../../pdo.php";

// Definicion de variables
$perroId = $_POST["perroId"];
$tatooId = $_POST["tatooId"];
$propietarioId = $_POST["propietarioId"];
$apodo = $_POST["apodo"];
$raza = $_POST["raza"];
$castracion = $_POST["castracion"];
$adopcion = $_POST["adopcion"];
$observacion = $_POST["observacion"];

/* Query para actualizar un perro en la base de datos. */
$query = "UPDATE Perros P
    SET P.Apodo = :apodo,
    P.TatooId = :tatooId,
    P.Raza = :raza,
    P.Castracion = :castracion,
    P.Adopcion = :adopcion,
    P.Observacion = :observacion
    WHERE P.PerroId = :perroId ";

$params = [
    "perroId" => $perroId,
    "tatooId" => $tatooId,
    "apodo" => $apodo,
    "raza" => $raza,
    "castracion" => $castracion ? $castracion : null,
    "adopcion" => $adopcion,
    "observacion" => $observacion,
];

try {
    $result = $pdo->prepare($query)->execute($params);
} catch (\Throwable $th) {
    echo "Hubo un error al intentar actualizar un perro.";
    throw new Error();
}

if ($propietarioId != 0) {
    // Caso haya propietario se actualiza
    $check = "SELECT PP.PropietarioPerroId FROM PropietariosPerros PP " .
        "WHERE PP.PropietarioId = :propietarioId " .
        "AND PP.PerroId = :perroId";

    $params = [
        "propietarioId" => $propietarioId,
        "perroId" => $perroId,
    ];

    $sql = $pdo->prepare($check);
    $sql->execute($params);
    $relacionCheck = $sql->fetchAll();

    $query = "";
    if (count($relacionCheck) > 0) {
        $query = "UPDATE PropietariosPerros PP " .
            "SET PP.PropietarioId = :propietarioId " .
            "WHERE PP.PerroId = :perroId ";

    } else {
        $query = "INSERT INTO PropietariosPerros (PropietarioId, PerroId) " .
            "VALUES (:propietarioId, :perroId)";
    }

    try {
        $result = $pdo->prepare($query)->execute($params);
    } catch (\Throwable $th) {
        echo $th;
        /*echo "Hubo un error al intentar relacionar un propietario con este perro.";*/
        throw new Error();
    }
} else {
    // Caso no haya propietario se elimina
    $query = "DELETE FROM PropietariosPerros WHERE perroId = :perroId ";

    $params = [
        "perroId" => $perroId,
    ];

    try {
        $result = $pdo->prepare($query)->execute($params);
    } catch (\Throwable $th) {
        echo "Hubo un error al intentar relacionar un propietario con este perro.";
        throw new Error();
    }
}

die();
