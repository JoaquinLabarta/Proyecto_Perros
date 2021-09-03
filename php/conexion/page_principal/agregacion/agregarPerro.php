<?php
// Se incluye la conexion a la BDD.
include "../../pdo.php";

// Definicion de variables
$tatooId = $_POST["tatooId"];
$propietarioId = $_POST["propietarioId"];
$apodo = $_POST["apodo"];
$raza = $_POST["raza"];
$castracion = $_POST["castracion"];
$adopcion = $_POST["adopcion"];
$observacion = $_POST["observacion"];
$vacunasIds = $_POST["vacunasIds"];

/* Query para checkear si el email ya esta registrado en la base de datos */
$sql = $pdo->prepare("SELECT TatooId FROM Perros WHERE TatooId = :tatooId");
$sql->execute(["tatooId" => $tatooId]);
$checkResult = $sql->fetchAll();

/**
 * Checkeo que se hace para saber si el el registro ya existe en la base de datos
 */
if (count($checkResult) > 0) {
    echo "Ya existe un perro con este codigo de tatuaje.";
    throw new Error();
} else {
    /* Query para insertar un nuevo registro en la base de datos. */
    $query =
        "INSERT INTO Perros (TatooId, Apodo, Raza, Castracion, Adopcion, Observacion) " .
        "VALUES (:tatooId, :apodo, :raza, :castracion, :adopcion, :observacion)";

    $params = [
        "tatooId" => $tatooId,
        "apodo" => $apodo,
        "raza" => $raza,
        "castracion" => $castracion ? $castracion : null,
        "adopcion" => $adopcion,
        "observacion" => $observacion,
    ];

    try {
        $result = $pdo->prepare($query)->execute($params);
        $perroId = $pdo->lastInsertId();
    } catch (\Throwable $th) {
        echo "Hubo un error al intentar agregar un perro.";
        throw new Error();
    }

    if ($propietarioId != 0) {
        $query = "INSERT INTO PropietariosPerros (PropietarioId, PerroId) VALUES (:propietarioId, :perroId)";

        $params = [
            "propietarioId" => $propietarioId,
            "perroId" => $perroId,
        ];

        try {
            $result = $pdo->prepare($query)->execute($params);
        } catch (\Throwable $th) {
            echo "Hubo un error al intentar relacionar un propietario con este perro.";
            throw new Error();
        }
    }

    if ($vacunasIds != null) {
        $query =
            "INSERT INTO VacunasPerros (VacunaId, PerroId, FechaDeRelacion) VALUES (:vacunaId, :perroId, CURRENT_TIMESTAMP)";

        foreach ($vacunasIds as $vacunaId) {
            $params = [
                "vacunaId" => $vacunaId,
                "perroId" => $perroId,
            ];

            try {
                $result = $pdo->prepare($query)->execute($params);
            } catch (\Throwable $th) {
                echo "Hubo un error al intentar relacionar una vacuna con este perro.";
                throw new Error();
            }
        }
    }
}

die();
