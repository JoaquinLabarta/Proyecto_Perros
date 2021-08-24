<?php
// Se incluye la conexion a la BDD.
include "../pdo.php";

// Definicion de variables
$dniPropietario = $_POST["dniPropietario"];
$nombrePropietario = $_POST["nombrePropietario"];
$apellidoPropietario = $_POST["apellidoPropietario"];
$emailPropietario = $_POST["emailPropietario"];
$telefonoPropietario = $_POST["telefonoPropietario"];
$direccion = $_POST["direccionPropietario"];

/* Query para checkear si el email ya esta registrado en la base de datos */
$sql = $pdo->prepare("SELECT DNI FROM Propietarios WHERE DNI = :dni");
$sql->execute(["dni" => $dniPropietario]);
$checkResult = $sql->fetchAll();

/**
 * Checkeo que se hace para saber si el el registro ya existe en la base de datos
 */
if (count($checkResult) > 0) {
  return false;
} else {
  /* Query para insertar un nuevo registro en la base de datos. */
  $query = "INSERT INTO Propietarios (DNI, Nombre, Apellido, Email, Telefono, Direccion) " +
    "VALUES (:dni, :nombre, :apellido, :email, :telefono, :direccion)";

  $params = [
    "dni" => $dniPropietario,
    "nombre" => $nombrePropietario,
    "apellido" => $apellidoPropietario,
    "email" => $emailPropietario,
    "telefono" => $telefonoPropietario,
    "direccion" => $direccion
  ];

  try {
    $result = $pdo->prepare($query)->execute($params);
  } catch (\Throwable $th) {
    throw $th;
  }
}

die();
