<?php
// Se incluye la conexion a la BDD.
include "../pdo.php";

$usuarioId = $_POST["usuarioId"];

// Queries para borrar al propietario del perro de PropietariosPerros
// Y para borrar al perro de Perros
$query = "DELETE FROM Usuarios WHERE UsuarioId = :usuarioId";

$params = ["usuarioId" => $usuarioId];

try {
  $result = $pdo->prepare($query)->execute($params);
} catch (\Throwable $th) {
  echo "Hubo un error al intentar eliminar un usuario.";
  throw new Error();
}
