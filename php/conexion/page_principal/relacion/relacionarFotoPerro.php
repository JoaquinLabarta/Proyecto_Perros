<?php
// Se incluye la conexion a la BDD.
include "../pdo.php";

// Definicion de variables
$fotoId = $_POST["fotoId"];
$perroId = $_POST["perroId"];

/* Query para checkear si el email ya esta registrado en la base de datos */
$sql = $pdo->prepare("SELECT FotoPerroId FROM FotosPerros WHERE FotoId = :fotoId AND PerroId = :perroId");
$sql->execute(["fotoId" => $urlFoto]);
$checkResult = $sql->fetchAll();

/**
 * Checkeo que se hace para saber si el el registro ya existe en la base de datos
 */
if (count($checkResult) > 0) {
  return false;
} else {
  /* Query para insertar un nuevo registro en la base de datos. */
  $query = "INSERT INTO Fotos(Url) VALUES (:url)";
  $params = ["url" => $urlFoto];

  try {
    $result = $pdo->prepare($query)->execute($params);
  } catch (\Throwable $th) {
    throw $th;
  }
}

die();
