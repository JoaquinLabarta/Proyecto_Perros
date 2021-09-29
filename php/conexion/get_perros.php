<?php
include_once "pdo.php";

$query = "
    SELECT
        COALESCE(FotoUrl, '/proyecto-perros/recursos/perroDefault.svg') AS FotoUrl,
        P.PerroId,
        TatooId,
        Apodo,
        Raza,
        Castracion,
        Adopcion,
        COALESCE(
            NULLIF(Observacion, ''),
            ''
        ) AS Observacion,
        COALESCE(P.PropietarioId, 0) AS PropietarioId,
        COALESCE(
            CONCAT(Prop.Nombre, ' ', Prop.Apellido),
            'No tiene'
        ) AS NombrePropietario
    FROM
        Perros P
    LEFT JOIN Propietarios Prop
    ON
        Prop.PropietarioId = P.PropietarioId
";

$sql = $pdo->prepare($query);
$sql->execute();
$perros = $sql->fetchAll(PDO::FETCH_ASSOC);
