<?php
session_start();

if (!$_SESSION || $_SESSION["Invitado"]) {
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
     
    table.dataTable>thead>tr>th:not(.sorting_disabled), table.dataTable>thead>tr>td:not(.sorting_disabled) {
    padding-left: 0px;
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
    a{
      text-decoration:none;
      color:black;
    }

  </style>

  <title>Inicio | Bromatologia</title>
</head>

<body>
  <?php include_once "../componentes/header.php"; ?>

  <br>
  <div class="container">
    <div class="row">
      <div class="col">
        <input class="form-control" id="inputBuscarUsuarios" type="search" placeholder="Buscar Usuario por Nombre, Apellido, etc...">
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 table-responsive"><br>
        <table id="usuarios" class="table table-hover table-bordered ">
          <thead>
            <th class="text-center">ID</th>
            <th class="text-center">Usuario</th>
            <th class="text-center">Nombre</th>
            <th class="text-center">Administrador</th>
            <th class="text-center">Activo</th>
            <th class="text-center">Acciones</th>
          </thead>
          <tbody>
            <?php
            include "../../conexion/get_users.php";
            foreach ($usuarios as $usuario) : ?>
              <tr>
                <td class="text-center"><?php echo $usuario['UsuarioId'] ?></td>
                <td class="text-center"><?php echo $usuario['Usuario'] ?></td>
                <td class="text-center"><?php echo $usuario['Nombre'] . " " . $usuario['Apellido'] ?></td>
                <td class="text-center"><?php echo $usuario['Administrador'] ? "Si" : "No"; ?></td>
                <td class="text-center"><?php echo $usuario['Activo'] ? "Si" : "No"; ?></td>
                <td class="text-center">
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
<script src="/proyecto-perros/js/page_principal/scripts.js"></script>
<script src="/proyecto-perros/js/modulos/pdfmake/pdfmake.js" type="module"></script>
<script src="/proyecto-perros/js/modulos/jszip/jszip.js" type="module"></script>

<?php include_once "../componentes/modals.php"; ?>

<script>
  (function() {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function(form) {
        form.addEventListener('submit', function(event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }

          form.classList.add('was-validated')
        }, false)
      })
  })()
</script>

</html>
