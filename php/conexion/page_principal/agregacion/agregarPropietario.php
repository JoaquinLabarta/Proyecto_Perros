<?php
// Se incluye la conexion a la BDD.
include "../../pdo.php";

// Definicion de variables
$dni = $_POST["dni"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$email = $_POST["email"];
$telefono = $_POST["telefono"];
$direccion = $_POST["direccion"];

/* Query para checkear si el email ya esta registrado en la base de datos */
$sql = $pdo->prepare("SELECT DNI FROM Propietarios WHERE DNI = :dni");
$sql->execute(["dni" => $dni]);
$checkResult = $sql->fetchAll();

/**
 * Checkeo que se hace para saber si el el registro ya existe en la base de datos
 */
if (count($checkResult) > 0) {
  echo "Ya existe un propietario con este dni.";
  throw new Error();
} else {
  /* Query para insertar un nuevo registro en la base de datos. */
  $query = "INSERT INTO Propietarios (DNI, Nombre, Apellido, Email, Telefono, Direccion) " .
    "VALUES (:dni, :nombre, :apellido, :email, :telefono, :direccion)";

  $params = [
    "dni" => $dni,
    "nombre" => $nombre,
    "apellido" => $apellido,
    "email" => $email,
    "telefono" => $telefono,
    "direccion" => $direccion
  ];

  try {
    $result = $pdo->prepare($query)->execute($params);
  } catch (\Throwable $th) {
  echo "Hubo un error al intentar agregar un propietario.";
  throw new Error();
  }
}

die();
