<?php
include_once "../pdo.php";

$perroId = $_GET["PerroId"];

$query = "
SELECT
    Nombre
FROM
    Vacunas V
RIGHT JOIN VacunasPerros VP ON
    V.VacunaId = VP.VacunaId
WHERE
    VP.PerroId = :perroId
";

$params = [
    "perroId" => $perroId
];

try {
    $sql = $pdo->prepare($query);
    $sql->execute($params);
    $vacunas = $sql->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($vacunas);
} catch (\Throwable $th) {
    echo "Hubo un error al intentar obtener las vacunas.";
    throw new Error();
}
