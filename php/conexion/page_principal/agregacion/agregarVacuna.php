<?php
// Se incluye la conexion a la BDD.
include "../pdo.php";

// Definicion de variables
$nombreVacuna = $_POST["nombreVacuna"];

/* Query para checkear si el email ya esta registrado en la base de datos */
$sql = $pdo->prepare("SELECT Nombre FROM Vacunas WHERE Nombre = :nombreVacuna");
$sql->execute(["nombreVacuna" => $nombreVacuna]);
$checkResult = $sql->fetchAll();

/**
 * Checkeo que se hace para saber si el el registro ya existe en la base de datos
 */
if (count($checkResult) > 0) {
  return false;
} else {
  /* Query para insertar un nuevo registro en la base de datos. */
  $query = "INSERT INTO Vacunas(Nombre) VALUES (:nombreVacuna)";
  $params = ["nombreVacuna" => $nombreVacuna];

  try {
    $result = $pdo->prepare($query)->execute($params);
  } catch (\Throwable $th) {
    throw $th;
  }
}

die();
