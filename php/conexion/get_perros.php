<?php
include_once "pdo.php";

$query = "
    SELECT
        COALESCE(FotoUrl, '/proyecto-perros/recursos/perroDefault.svg') AS FotoUrl,
        Perros.PerroId,
        TatooId,
        Apodo,
        Raza,
        Castracion,
        Adopcion,
        COALESCE(
            NULLIF(Observacion, ''),
            ''
        ) AS Observacion,
        COALESCE(Prop.PropietarioId, 0) AS PropietarioId,
        COALESCE(
            CONCAT(Prop.Nombre, ' ', Prop.Apellido),
            'No tiene'
        ) AS NombrePropietario
    FROM
        Perros
    LEFT JOIN PropietariosPerros AS PP
    ON
        Perros.PerroId = PP.PerroId
    LEFT JOIN Propietarios AS Prop
    ON
        Prop.PropietarioId = PP.PropietarioId
";

$sql = $pdo->prepare($query);
$sql->execute();
$perros = $sql->fetchAll(PDO::FETCH_ASSOC);
