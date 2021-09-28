<?php
// Se incluye la conexion a la BDD.
include "../pdo.php";

// Definicion de variables
$propietarioId = $_POST["propietarioId"];
$dni = $_POST["dni"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$email = $_POST["email"];
$telefono = $_POST["telefono"];
$direccion = $_POST["direccion"];

/* Query para actualizar un perro en la base de datos. */
$query = "UPDATE Propietarios
    SET DNI = :dni,
    nombre = :nombre,
    apellido = :apellido,
    email = :email,
    telefono = :telefono,
    direccion = :direccion
    WHERE PropietarioId = :propietarioId ";

$params = [
    "propietarioId" => $propietarioId,
    "dni" => $dni,
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
    echo $th;
    throw new Error();
}
