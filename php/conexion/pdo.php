<?php
try {
    // Credenciales para la conexion con la BDD.
    $username = "root";
    $passwd = "";

    // Conexion PDO con la BDD (MySQL).
    $pdo = new PDO(
        "mysql:host=localhost;dbname=bromatologia",
        $username, 
        $passwd
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Caso de error, se muestra un mensaje destacando lo ocurrido.
    print "[Error]: " . $e->getMessage() . "<br/>";
    die();
}
?>
