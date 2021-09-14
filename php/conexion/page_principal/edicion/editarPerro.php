<?php
// Se incluye la conexion a la BDD.
include "../../pdo.php";

// Definicion de variables
$perroId = $_POST["editarPerroId"];
$tatooId = $_POST["editarTatooId"];
$propietarioId = $_POST["editarPropietarioId"];
$apodo = $_POST["editarApodo"];
$raza = $_POST["editarRaza"];
$castracion = $_POST["editarCastracion"];
$adopcion = $_POST["editarAdopcion"];
$observacion = $_POST["editarObservacion"];

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
    echo $th;
}

if ($propietarioId != 0) {
    $check = "SELECT PropietarioPerroId FROM PropietariosPerros " . "WHERE PerroId = :perroId";

    $sql = $pdo->prepare($check);
    $sql->execute(["perroId" => $perroId]);
    $relacionCheck = $sql->fetchAll();

    $query = "";
    if (count($relacionCheck) > 0) {
        // Caso haya propietario y propietarioId no sea 0 se actualiza
        $query = "UPDATE PropietariosPerros " . "SET PropietarioId = :propietarioId " . "WHERE PerroId = :perroId ";
    } else {
        // Caso no haya propietario, se inserta
        $query = "INSERT INTO PropietariosPerros (PropietarioId, PerroId) " . "VALUES (:propietarioId, :perroId)";
    }

    $params = [
        "propietarioId" => $propietarioId,
        "perroId" => $perroId,
    ];

    try {
        $result = $pdo->prepare($query)->execute($params);
    } catch (\Throwable $th) {
        echo "Hubo un error al intentar relacionar un propietario con este perro.";
        echo $th;
    }
} else {
    // Caso propietarioId sea 0, se elimina
    try {
        $result = $pdo
            ->prepare("DELETE FROM PropietariosPerros WHERE perroId = :perroId")
            ->execute(["perroId" => $perroId]);
    } catch (\Throwable $th) {
        echo "Hubo un error al intentar relacionar un propietario con este perro.";
        echo $th;
    }
}

header("Location: /proyecto-perros/");
die();
