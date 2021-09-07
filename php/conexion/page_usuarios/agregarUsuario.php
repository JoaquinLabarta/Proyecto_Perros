<?php
// Se incluye la conexion a la BDD.
include "../pdo.php";

// Definicion de variables
$usuario = $_POST["usuario"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$nacimiento = $_POST["nacimiento"];
$email = $_POST["email"];
$clave = password_hash($_POST["clave"], PASSWORD_DEFAULT);

/* Query para checkear si el email ya esta registrado en la base de datos */
$sql = $pdo->prepare("SELECT Usuario FROM Usuarios WHERE Usuario = :usuario OR Email = :email");
$sql->execute(["usuario" => $usuario, "email" => $email]);
$checkResult = $sql->fetchAll();

/**
 * Checkeo que se hace para saber si el email del cliente ya existe en la base de datos
 * Si $checkReasult es mayor a 0, significa que el uruario ya existe.
 */
if (count($checkResult) > 0) {
    echo "Ya existe un usuario con este nombre de usuario.";
    throw new Error();
} else {
    /* Query para insertar un nuevo registro de usuario en la base de datos. */
    $query = "INSERT INTO Usuarios 
    (Usuario, Nombre, Apellido, Nacimiento, Email, Clave, Administrador, Activo)
    VALUES (:usuario, :nombre, :apellido, :nacimiento, :email, :clave, :administrador, :activo)";

    /**
     * Se prepara la sentencia SQL y se le adieren los parametros para luego ejecutarla.
     * Al ejecuta la sentencia SQL con los parametros aderidos, se evalua si la ejecucion fue exitosa
     */
    $params = [
        "usuario" => $usuario,
        "nombre" => $nombre,
        "apellido" => $apellido,
        "nacimiento" => $nacimiento,
        "email" => $email,
        "clave" => $clave,
        "administrador" => 0,
        "activo" => 1,
    ];

    try {
        $result = $pdo->prepare($query)->execute($params);
    } catch (\Throwable $th) {
        echo "Hubo un error al intentar agregar un usuario.";
        throw new Error();
    }
}

die();
