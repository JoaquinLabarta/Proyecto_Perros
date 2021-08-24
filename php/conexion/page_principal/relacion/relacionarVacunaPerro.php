<?php
// Se incluye la conexion a la BDD.
include "../pdo.php";

// Definicion de variables
$vacunaId = $_POST["vacunaId"];
$perroId = $_POST["perroId"];

/* Query para checkear si el email ya esta registrado en la base de datos */
$sql = $pdo->prepare("SELECT propietarioPerroId FROM PropietariosPerros 
    WHERE VacunaId = :vacunaId AND PerroId = :perroId");
$sql->execute(["vacunaId" => $vacunaId, "perroId" => $perroId]);
$checkResult = $sql->fetchAll();

/**
 * Checkeo que se hace para saber si el el registro ya existe en la base de datos
 */
if (count($checkResult) > 0) {
  return false;
} else {
  /* Query para insertar un nuevo registro en la base de datos. */
  $query = "INSERT INTO PropietariosPerros(VacunaId, PerroId) VALUES (:vacunaId, :perroId)";
  $params = ["vacunaId" => $vacunaId, "perroId", $perroId];

  try {
    $result = $pdo->prepare($query)->execute($params);
  } catch (\Throwable $th) {
    throw $th;
  }
}

die();
