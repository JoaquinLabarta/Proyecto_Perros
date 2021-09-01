<?php
include_once "pdo.php";

$query = "
SELECT
    COALESCE(
        FO.Url,
        '/proyecto-perros/recursos/perroDefault.svg'
    ) AS FotoPerro,
    Perros.PerroId,
    TatooId,
    Apodo,
    Raza,
    Castracion,
    Adopcion,
    COALESCE(
        NULLIF(Observacion, ''),
        'No hay observacion'
    ) AS Observacion,
    COALESCE(Prop.PropietarioId, 0) AS PropietarioId,
    COALESCE(
        CONCAT(Prop.Nombre, Prop.Apellido),
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
LEFT JOIN FotosPerros AS FP
ON
    Perros.PerroId = FP.PerroId
LEFT JOIN Fotos AS FO
ON
    FP.FotoId = FO.FotoId;
";

$sql = $pdo->prepare($query);
$sql->execute();
$perros = $sql->fetchAll(PDO::FETCH_ASSOC);
