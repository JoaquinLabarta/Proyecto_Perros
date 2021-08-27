<?php
session_start();

if (!$_SESSION && !$_SESSION["Invitado"]) {
  header("Location: /proyecto-perros");
}

$carpeta_actual = basename(getcwd());
?>
<!doctype html>
<html lang="es">

<head>
  <meta name="viewport" content="width=device-width" />
  <meta charset="utf-8">

  <link rel="icon" href="/proyecto-perros/recursos/logo.png">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">

  <link href="/proyecto-perros/css/page_principal/styles.css" rel="stylesheet">


  <style>
    .dataTables_filter,
    .dataTables_info {
      display: none;
    }

    .btn-primary {
      background-color: #649fa5;
      border-color: #649fa5;
    }

    .btn-primary:hover,
    .btn-primary:active,
    .btn-primary:focus {
      background-color: #D0757C;
      border-color: #D0757C;
    }

    table.dataTable>thead>tr>th:not(.sorting_disabled),
    table.dataTable>thead>tr>td:not(.sorting_disabled) {
      padding-right: 0px;
    }

    #usuarios.dataTable thead th {
      border-bottom: 1;
    }

    .table>:not(caption)>*>* {
      border-bottom-width: 0px;
    }

    .table {
      --bs-table-bg: transparent;
      --bs-table-accent-bg: transparent;
      --bs-table-striped-color: #212529;
      --bs-table-striped-bg: rgba(0, 0, 0, 0.05);
      --bs-table-active-color: #212529;
      --bs-table-active-bg: rgba(0, 0, 0, 0.1);
      --bs-table-hover-color: #212529;

      width: 100%;
      margin-bottom: 1rem;
      color: #212529;
      vertical-align: top;
      border-color: #dee2e6;
    }

    a {
      text-decoration: none;
    }

    table.dataTable>thead>tr>th:not(.sorting_disabled),
    table.dataTable>thead>tr>td:not(.sorting_disabled) {
      padding-left: 0px;

    }

    table.dataTable {
      width: 100%;
      margin: 0 auto;
      clear: both;
      border-collapse: collapse;
      border-spacing: 0;
    }
  </style>

  <title>Perros | Bromatologia</title>
</head>

<body>
  <?php include_once "../componentes/header.php"; ?>

  <br>
  <div class="container">
    <div class="row">
      <div class="col">
        <input class="form-control" id="inputBuscarPerro" type="text" placeholder="Buscar Perros por Codigo, Apodo, Raza, etc...">
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 table-responsive"><br>
        <table id="perros" class="table table-hover table-bordered">
          <thead>
            <th class="text-center">Foto</th>
            <th class="text-center">Tatoo ID</th>
            <th class="text-center">Apodo</th>
            <th class="text-center">Raza</th>
            <th class="text-center">Propietario</th>
            <th class="text-center">Observacion</th>
            <th class="text-center">Acciones</th>
          </thead>
          <tbody>

            <?php
            include "../../conexion/get_perros.php";
            foreach ($perros as $perro) : ?>
              <tr>
                <td class="text-center align-middle"><img src=<?php echo $perro["FotoPerro"] ?> width="40" class="img-thumbnail"></td>
                <td class="text-center align-middle"><?php echo $perro["TatooId"] ?></td>
                <td class="text-center align-middle"><?php echo $perro["Apodo"] ?></td>
                <td class="text-center align-middle"><?php echo $perro["Raza"] ?></td>
                <td class="text-center align-middle">
                  <?php echo $perro["NombrePropietario"] ?>
                </td>
                <td class="text-center align-middle"><a href="#">Click para ver</a></td>
                <td class=" text-center align-middle">
                  <i class="far fa-edit"></i>
                  <i class="far fa-trash-alt"></i>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <br>
</body>

<!--LINK: https://cdn.datatables.net/-->

<script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/de1cdf12c2.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="/proyecto-perros/js/page_principal/script.js"></script>
<script src="/proyecto-perros/js/modulos/pdfmake/pdfmake.js" type="module"></script>
<script src="/proyecto-perros/js/modulos/jszip/jszip.js" type="module"></script>

<?php include_once "../componentes/modals.php"; ?>

</html>
