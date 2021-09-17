<?php
// Se incluye la conexion a la BDD.
include "../../pdo.php";

// Definicion de variables
$propietarioId = $_POST["propietarioId"];
$tatooId = $_POST["tatooId"];
$apodo = $_POST["apodo"];
$raza = $_POST["raza"];
$castracion = $_POST["castracion"] ? $_POST["castracion"] : null;
$adopcion = $_POST["adopcion"];
$observacion = $_POST["observacion"];

/* Query para checkear si el email ya esta registrado en la base de datos */
$sql = $pdo->prepare("SELECT TatooId FROM Perros WHERE TatooId = :tatooId");
$sql->execute(["tatooId" => $tatooId]);
$checkResult = $sql->fetchAll();

// Checkeo que se hace para saber si el el registro ya existe en la base de datos
if (count($checkResult) > 0) {
    echo "Ya existe un perro con este codigo de tatuaje.";
} else {
    /* Query para insertar un nuevo registro en la base de datos. */
    $query =
        "INSERT INTO Perros (TatooId, FotoUrl, Apodo, Raza, Castracion, Adopcion, Observacion) " .
        "VALUES (:tatooId, :fotoUrl, :apodo, :raza, :castracion, :adopcion, :observacion)";

    // Se guarda la foto de forma local
    $target = "";
    if (isset($_FILES["foto"])) {
        $file_tmp = $_FILES["foto"]["tmp_name"];
        $file_ext = $_FILES["foto"]["ext"];
        $target = "/proyecto-perros/recursos/fotos/" . $tatooId . $file_ext;
        move_uploaded_file($file_tmp, $_SERVER["DOCUMENT_ROOT"] . $target);
    } else {
        $target = null;
    }

    $params = [
        "tatooId" => $tatooId,
        "fotoUrl" => $target,
        "apodo" => $apodo,
        "raza" => $raza,
        "castracion" => $castracion,
        "adopcion" => $adopcion,
        "observacion" => $observacion,
    ];

    try {
        $result = $pdo->prepare($query)->execute($params);
    } catch (\Throwable $th) {
        echo "Hubo un error al intentar agregar un perro.";
        echo $th;
    }

    if ($propietarioId != 0) {
        $perroId = $pdo->lastInsertId();
        $query =
            "INSERT INTO PropietariosPerros (PropietarioId, PerroId) VALUES (:propietarioId, :perroId)";

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
    }
}

header("Location: /proyecto-perros/");
die();
