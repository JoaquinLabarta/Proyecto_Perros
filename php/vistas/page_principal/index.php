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
    <div class="row">
      <div class="col">
        <input class="form-control" id="inputBuscarPerro" type="search" placeholder="Buscar Perro por ID, Nombre, Apodo, Raza, etc...">
      </div>
      <?php if (!$_SESSION["Invitado"]) : ?>
        <div class="col-auto">
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregarPerro">
            Agregar Perro
          </button>
        </div>
        <div class="col-auto">
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregarVacuna">
            Agregar Vacuna
          </button>
        </div>
      <?php endif; ?>
    </div>
    <div class="row">
      <div class="col-lg-12 table-responsive"><br>
        <table id="perros" class="table table-bordered">
          <thead>
            <th class = "text-center">Foto</th>
            <th class = "text-center">ID</th>
            <th class = "text-center">Tatoo ID</th>
            <th class = "text-center">Apodo</th>
            <th class = "text-center">Raza</th>
            <th class = "text-center">Castracion</th>
            <th class = "text-center">Adopcion</th>
            <th class = "text-center">Observacion</th>
            <th class = "text-center">Propietario</th>
            <th class = "text-center">Acciones</th>
          </thead>
          <tbody>

            <?php
            include "../../conexion/get_perros.php";
            foreach ($perros as $perro) : ?>
              <tr>
                <td class = "text-center"><img src=<?php echo $perro["FotoPerro"] ?> width="32" class="img-thumbnail"></td>
                <td class = "text-center"><?php echo $perro["PerroId"] ?></td>
                <td class = "text-center"><?php echo $perro["TatooId"] ?></td>
                <td class = "text-center"><?php echo $perro["Apodo"] ?></td>
                <td class = "text-center"><?php echo $perro["Raza"] ?></td>
                <td class = "text-center"><?php echo $perro["Castracion"] ?></td>
                <td class = "text-center"><?php echo $perro["Adopcion"] ?></td>
                <td class = "text-center"><?php echo $perro["Observacion"] ?></td>
                <td class = "text-center">
                  <?php echo $perro["NombrePropietario"] ?>
                </td>
                <td class = "text-center">
                <i class="far fa-edit"></i>
                  <i class="far fa-trash-alt"></i>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
            <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-end">
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#">Next</a>
                </li>
              </ul>
            </nav>
    </div>
  </div>
          
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
