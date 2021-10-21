<?php
session_start();

if (!isset($_SESSION["Rol"]) || $_SESSION["Rol"] != 1) {
    header("Location: /perros");
}

$carpeta_actual = basename(getcwd());
?>
<!doctype html>
<html lang="es">

<head>
    <meta name="viewport" content="width=device-width" />
    <meta charset="utf-8">


    <link rel="icon" href="/perros/recursos/logo.png">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <style>
        .dataTables_filter,
        .dataTables_info {
            display: none;
        }

        table.dataTable {
            width: 100%;
            margin: 0 auto;
            clear: both;
            border-collapse: collapse;
            border-spacing: 0;
        }

        table.dataTable.no-footer {
            border-bottom: 0px solid #E3E9EA;
        }

        .table-responsive {
            overflow-x: inherit;
        }
    </style>

    <title>Propietarios | Bromatologia</title>
</head>

<body>
    <?php include_once "../componentes/header.php"; ?>
    <div class="container">
        <h2 class="my-3">Propietarios</h2>
        <div class="col mt-3">
            <input class="form-control" id="inputBuscarPropietarios" type="search" placeholder="Escriba para buscar propietarios...">
        </div>

        <div class="row">
            <div class="col-lg-12 table-responsive"><br>
                <table id="propietarios" class="table table-hover table-bordered ">
                    <thead>
                        <th class="text-center">DNI</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Telefono</th>
                        <th class="text-center">Direccion</th>
                        <th class="text-center">Acciones</th>
                    </thead>
                    <tbody>
                        <?php include "../../conexion/get_propietarios.php"; ?>
                        <?php foreach ($propietarios as $propietario): ?>
                            <tr>
                                <td class="text-center align-middle"><?php echo $propietario["DNI"]; ?></td>

                                <td class="text-center align-middle"><?php echo $propietario["Nombre"] .
                                    " " .
                                    $propietario["Apellido"]; ?></td>

                                <td class="text-center align-middle"><?php echo $propietario["Email"]; ?></td>

                                <td class="text-center align-middle"><?php echo $propietario["Telefono"]; ?></td>

                                <td class="text-center align-middle"><?php echo $propietario["Direccion"]; ?></td>
                                <?php if ($_SESSION["Rol"] == 1 || $_SESSION["Rol"] == 2): ?>
                                    <td class=" text-center align-middle">
                                        <button class="btn border" style="color:green" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar" onclick='editarPropietario(<?php echo json_encode(
                                            $propietario
                                        ); ?>)'>
                                            <i class="far fa-edit"></i>
                                        </button>
                                        <?php if ($_SESSION["Rol"] == 1): ?>
                                            <button class="btn border" style="color:red" data-bs-toggle="tooltip" data-bs-placement="top" title="Borrar" onclick="eliminarPropietario(<?php echo $propietario[
                                                "PropietarioId"
                                            ]; ?>)">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        <?php endif; ?>
                                    </td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/de1cdf12c2.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="/perros/js/page_propietarios/scripts.js" type="module"></script>
<script src="/perros/js/modulos/bootstrap/bootstrap.js" type="module"></script>

<?php include_once "../componentes/footer.php"; ?>
<?php include_once "../componentes/modals.php"; ?>

</html>
