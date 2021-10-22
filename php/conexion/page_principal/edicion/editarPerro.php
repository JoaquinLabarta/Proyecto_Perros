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

$params = [
    "perroId" => $perroId,
    "tatooId" => $tatooId,
    "apodo" => $apodo,
    "raza" => $raza,
    "castracion" => $castracion ? $castracion : null,
    "adopcion" => $adopcion,
    "observacion" => $observacion,
    "propietarioId" => $propietarioId != 0 ? $propietarioId : null
];

/* Query para actualizar un perro en la base de datos. */
$query = "UPDATE Perros
    SET Apodo = :apodo,
    TatooId = :tatooId,
    Raza = :raza,
    Castracion = :castracion,
    Adopcion = :adopcion,
    Observacion = :observacion,
    PropietarioId = :propietarioId";

// Se guarda la foto de forma local
if (isset($_FILES["editarFoto"]) && $_FILES["editarFoto"]["tmp_name"]) {
    $file_tmp = $_FILES["editarFoto"]["tmp_name"];
    $file_ext = $_FILES["editarFoto"]["ext"];
    $target = "../../../../recursos/fotos/" . $tatooId . $file_ext;

    move_uploaded_file($file_tmp, $_SERVER["DOCUMENT_ROOT"] . $target);

    $query = $query . ", FotoUrl = :fotoUrl ";
    $params["fotoUrl"] = $target;
}

$query = $query . " WHERE PerroId = :perroId ";

try {
    $result = $pdo->prepare($query)->execute($params);
} catch (\Throwable $th) {
    echo "Hubo un error al intentar actualizar un perro.";
    echo $th;
}

header("Location: ../../../../index.php");
die();
