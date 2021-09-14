<?php
// Se incluye la conexion a la BDD.
include "../../pdo.php";

// Definicion de variables
$propietarioId = $_POST["propietarioId"];
$DNI = $_POST["DNI"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$email = $_POST["email"];
$telefono = $_POST["telefono"];
$direccion = $_POST["direccion"];

/* Query para actualizar un perro en la base de datos. */
$query = "UPDATE Propietarios P
    SET P.DNI = :DNI,
    P.nombre = :nombre,
    P.apellido = :apellido,
    P.email = :email,
    P.telefono = :telefono,
    P.direccion = :direccion
    WHERE P.PropietarioId = :propietarioId ";

$params = [
    "propietarioId" => $propietarioId,
    "DNI" => $DNI,
    "nombre" => $nombre,
    "apellido" => $apellido,
    "email" => $email,
    "telefono" => $telefono,
    "direccion" => $direccion,
];

try {
    $result = $pdo->prepare($query)->execute($params);
} catch (\Throwable $th) {
    echo "Hubo un error al intentar actualizar un propietario.";
    throw new Error();
}
