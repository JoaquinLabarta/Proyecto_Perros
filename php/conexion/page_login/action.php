<?php
session_start();
include_once "../pdo.php";

// Definicion de variables
$username = $_POST["usernameInput"];
$userPassword = $_POST["passwordInput"];

// Obtencion de datos desde la BDD para la validacion por back-end
$validationQuery = "SELECT UsuarioID, Usuario, Nombre, Apellido, Nacimiento, Email, Clave, Administrador, Activo " .
  "FROM Usuarios " .
  "WHERE Usuario = :username";
$sql = $pdo->prepare($validationQuery);
$sql->execute(["username" => $username]);
$result = $sql->fetchObject();

// Contraseña hasheada dada por la BDD.
$hashedPassword = $result->Clave;

if (!$result->Usuario) {
  /**
   * Verificacion 1:
   * Verificacion que se hace para saber si el usuario dado existe en la BDD
   * Caso $result->Usuario sea FALSE se redirecciona al usuario a la 'Login page' para explicarle el error; 
   * Caso TRUE, se sigue con el proceso de autentificacion.
   */
  header("Location: ../../../");
  die();
} else if (!password_verify($userPassword, $hashedPassword)) {
  /**
   * Verificacion 2:
   * Verificacion que se hace para saber si la clave dada por el usuario es correcta.
   * Caso FALSE se redirecciona al usuario a la 'Login page' para explicarle el error; 
   * Caso TRUE, el proceso de logueo fue completado y se lo redirecciona a su 'Feed'.
   */
  header("Location: ../../../");
  die();
} else if ($result->Activo != 1) {
  /**
   * Verificacion 3:
   * Verificacion que se hace para saber si el perfil del usuario esta activo o no.
   * Caso $result->status sea FALSE se redirecciona al usuario a la 'Login page' para explicarle el error; 
   * Caso TRUE, se sigue con el proceso de autentificacion.
   */
  header("Location: ../../../");
  die();
} else {
  // Variables para la session
  foreach ($result as $key => $value) {
    $_SESSION[$key] = $value;
  }

  $_SESSION["Invitado"] = 0;

  /* Redireccion del usuario a la pagina principal (por ahora es una unica pagina) */
  header("Location: ../../vistas/page_principal/");
  die();
}
