<?php
// Se incluye la conexion a la BDD.
include "../../pdo.php";

// Definicion de variables
$tatooId = $_POST["tatooId"];
$apodo = $_POST["apodo"];
$raza = $_POST["raza"];
$castracion = $_POST["castracion"];
$adopcion = $_POST["adopcion"];
$observacion = $_POST["observacion"];

/* Query para checkear si el email ya esta registrado en la base de datos */
$sql = $pdo->prepare("SELECT TatooId FROM Perros WHERE TatooId = :tatooId");
$sql->execute(["tatooId" => $tatooId]);
$checkResult = $sql->fetchAll();

/**
 * Checkeo que se hace para saber si el el registro ya existe en la base de datos
 */
if (count($checkResult) > 0) {
  return false;
} else {
  /* Query para insertar un nuevo registro en la base de datos. */
  $query = "INSERT INTO Perros (TatooId, Apodo, Raza, Castracion, Adopcion, Observacion) " .
    "VALUES (:tatooId, :apodo, :raza, :castracion, :adopcion, :observacion)";

  $params = [
    "tatooId" => $tatooId,
    "apodo" => $apodo,
    "raza" => $raza,
    "castracion" => $castracion,
    "adopcion" => $adopcion,
    "observacion" => $observacion
  ];

  try {
    $result = $pdo->prepare($query)->execute($params);
  } catch (\Throwable $th) {
    throw $th;
  }
}

die();
