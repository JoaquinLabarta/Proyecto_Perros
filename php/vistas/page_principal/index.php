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
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
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
}
           

table.dataTable>thead>tr>th:not(.sorting_disabled), table.dataTable>thead>tr>td:not(.sorting_disabled) {
     padding-right: 0px; 
}

#usuarios.dataTable thead th {
  border-bottom: 1;
}
          </style>

  <title>Usuarios | Bromatologia</title>
</head>

<body>
  <?php include_once "../componentes/header.php"; ?>

  <br>
  <div class="container">
    <?php if (!$_SESSION["Invitado"]) : ?>
      <button class="btn btn-primary px-3" data-bs-toggle="modal" data-bs-target="#agregarPerro">
        Agregar perro
      </button>
    <?php endif; ?>
    <div class="row">
      <div class="col-lg-12 table-responsive">
        <table id="perros" class="table table-striped">
          <thead>
            <th class = "">Foto</th>
            <th>ID</th>
            <th>Tatoo ID</th>
            <th>Apodo</th>
            <th>Raza</th>
            <th>Castracion</th>
            <th>Adopcion</th>
            <th>Observacion</th>
            <th>Propietario</th>
            <th>Acciones</th>
          </thead>
          <tbody>
            <?php
            include "../../conexion/get_perros.php";
            foreach ($perros as $perro) : ?>
              <tr>
                <td><img src=<?php echo $perro["FotoPerro"] ?> width="32" class="img-thumbnail"></td>
                <td><?php echo $perro["PerroId"] ?></td>
                <td><?php echo $perro["TatooId"] ?></td>
                <td><?php echo $perro["Apodo"] ?></td>
                <td><?php echo $perro["Raza"] ?></td>
                <td><?php echo $perro["Castracion"] ?></td>
                <td><?php echo $perro["Adopcion"] ?></td>
                <td><?php echo $perro["Observacion"] ?></td>
                <td>
                  <?php echo $perro["NombrePropietario"] ?>
                </td>
                <td>
                  <button>Editar</button>
                  <button>Eliminar</button>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>

<!--LINK: https://cdn.datatables.net/-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="/proyecto-perros/js/page_principal/scripts.js"></script>
<script src="/proyecto-perros/js/modulos/pdfmake/pdfmake.js" type="module"></script>
<script src="/proyecto-perros/js/modulos/jszip/jszip.js" type="module"></script>

<?php include_once "../componentes/modals.php"; ?>

</html>
