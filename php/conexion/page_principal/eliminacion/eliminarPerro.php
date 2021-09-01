<?php
// Se incluye la conexion a la BDD.
include "../../pdo.php";

$perroId = $_POST["perroId"];

// Queries para borrar al propietario del perro de PropietariosPerros
// Y para borrar al perro de Perros
$deletePropietarioRelation = "DELETE FROM PropietariosPerros WHERE PerroId = :perroId";
$deletePerro = "DELETE FROM Perros WHERE PerroId = :perroId";

$params = ["perroId" => $perroId];

try {
  $resultPropietarioRelation = $pdo->prepare($deletePropietarioRelation)->execute($params);
  $resultPerro = $pdo->prepare($deletePerro)->execute($params);
} catch (\Throwable $th) {
  echo "Hubo un error al intentar eliminar un perro.";
  throw new Error();
}
