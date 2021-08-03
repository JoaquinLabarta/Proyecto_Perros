<!doctype html>
<html lang="es">
  <head>
    <meta name="viewport" content="width=device-width" />
    <meta charset="utf-8">
    <link rel="icon" href="icons/logo.png">
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="stylesheet" href="Datatables-1.10.24/css/jquery.dataTables.min.css">
    <link href="estilos.css" rel="stylesheet" type="text/css">
    <title>Datatable PHP</title>
      
  </head>
  <body>
  <div class="shadow-sm p-0 mb-5 bg-body rounded">
  <nav class="navbar navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand"  style="color:#649FA5">
      <img src="icons/logo.png" alt="" width="40" height="40">
      Bromatologia | Municipalidad de Saladillo
      <div>  
            <button class="btn btn-white" style="color:#649FA5"> <img src="icons/house.png" alt="" width="24" height="24"> <a href = "indexadmin.php" >Inicio</a></button>
            <button class="btn btn-white" style="color:#649FA5"> <img src="icons/user.png" alt="" width="24" height="24"> <a href = "paginausuarios.php" >Usuarios</a></button>
            <button class="btn btn-white" style="color:#649FA5"> <img src="icons/register.png" alt="" width="24" height="24"> <a href = "indexinvitados.php" >Agregar Usuarios</a></button>
      </div>
    </a>
  </div>
</div>
</nav>

  <br>
    <div class="container">
       <div class="row">
           <div class="col-lg-12">
            <table id="usuarios" class="table table-striped">
                <thead>
                    <th class = "text-center">ID</th>
                    <th class = "text-center">Usuario</th>
                    <th class = "text-center">Nombre</th>
                    <th class = "text-center">Apellido</th>
                    <th class = "text-center">Nacimiento</th>
                    <th class = "text-center">Clave</th>
                    <th class = "text-center">Administrador</th>
                    <th class = "text-center">Activo</th>
                </thead>
                <tbody>
                    <?php
                        foreach($usuarios as $usuario){
                    ?>
                    <tr>
                        <td><?php echo $usuario['UsuarioID']?></td>
                        <td><?php echo $usuario['Usuario']?></td>
                        <td><?php echo $usuario['Nombre']?></td>
                        <td><?php echo $usuario['Apellido']?></td>
                        <td><?php echo $usuario['Nacimiento']?></td>
                        <td><?php echo $usuario['Clave']?></td>
                        <td><?php echo $usuario['Administrador']?></td>
                        <td><?php echo $usuario['Activo']?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
           </div>
       </div> 
    </div>
    <!--JavaScript -->
    <script src="jQuery-3.3.1/jquery-3.3.1.js"></script>
    <script src="DataTables-1.10.24/js/jquery.dataTables.min.js"></script> 
    <script src="js/script.js"></script>

  </body>
</html>