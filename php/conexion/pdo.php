<?php
try {
    // Credenciales para la conexion con la BDD.
    $username = "root";
    $passwd = "";
    $url = "mysql:host=localhost;dbname=bromatologia";

    // Conexion PDO con la BDD (MySQL).
    $pdo = new PDO($url, $username, $passwd);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Caso de error, se muestra un mensaje destacando lo ocurrido.
    print "[Error]: " . $e->getMessage() . "<br/>";
    die();
}
