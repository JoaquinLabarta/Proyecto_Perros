<?php
session_start();
include_once "../pdo.php";

// Definicion de variables
$username = $_POST["usernameInput"];
$userPassword = $_POST["passwordInput"];

// Obtencion de datos desde la BDD para la validacion por back-end
$validationQuery = "SELECT UsuarioID, Usuario, Nombre, Apellido, Nacimiento, Email, Clave, Administrador, Activo FROM Usuarios WHERE Usuario = ?";
$sql = $pdo->prepare($validationQuery);
$sql->execute([$username]);
$result = $sql->fetchObject();

// Contraseña hasheada dada por la BDD.
$hashedPassword = $result->Clave;

/**
 * Verificacion 1:
 * Verificacion que se hace para saber si el usuario dado existe en la BDD
 * Caso $result->Usuario sea FALSE se redirecciona al usuario a la 'Login page' para explicarle el error; 
 * Caso TRUE, se sigue con el proceso de autentificacion.
 */
if (!$result->Usuario) {
  header("Location: ../../../");
  die();
}

/**
 * Verificacion 2:
 * Verificacion que se hace para saber si la clave dada por el usuario es correcta.
 * Caso FALSE se redirecciona al usuario a la 'Login page' para explicarle el error; 
 * Caso TRUE, el proceso de logueo fue completado y se lo redirecciona a su 'Feed'.
 */

if (!password_verify($userPassword, $hashedPassword)) {
  header("Location: ../../../");
  die();
}


/**
 * Verificacion 3:
 * Verificacion que se hace para saber si el perfil del usuario esta activo o no.
 * Caso $result->status sea FALSE se redirecciona al usuario a la 'Login page' para explicarle el error; 
 * Caso TRUE, se sigue con el proceso de autentificacion.
 */
if ($result->Activo != 1) {
  header("Location: ../../../");
  die();
}

// Variables para la session
foreach ($result as $key => $value) {
  $_SESSION[$key] = $value;
}

$_SESSION["Invitado"] = 0;

// Redireccion del usuario a la pagina principal (por ahora es una unica pagina)
header("Location: ../../vistas/page_principal/");
die();
