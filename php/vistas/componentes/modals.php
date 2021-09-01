<style>
  .required-field::after {
    content: '*' !important;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 18px;
    color: red;
  }
</style>

<!--Modal para agregar perros-->
<form class="needs-validation" novalidate id="formAgregarPerro">
  <div class="modal fade" id="agregarPerro" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Agregar un perro</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
          <!--Codigo de tatuaje-->
          <div class="mb-3">
            <label for="tatuaje" class="form-label required-field">Codigo de tatuaje</label>
            <input type="text" class="form-control" id="tatooId" placeholder="AABB1122" required>
          </div>
          <!--Foto-->
          <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" id="fotoUrl">
          </div>
          <!--Apodo-->
          <div class="mb-3">
            <label for="apodo" class="form-label required-field">Apodo</label>
            <input type="text" class="form-control" id="apodo" placeholder="Cliford" required>
          </div>
          <!--Raza-->
          <div class="mb-3">
            <label for="raza" class="form-label">Raza</label>
            <input type="text" class="form-control" id="raza" placeholder="Caniche">
          </div>
          <!--Castracion-->
          <div class="mb-3">
            <label for="castracion" class="form-label">Fecha de castrado</label>
            <input type="date" class="form-control" id="castracion">
          </div>
          <!--Adopcion-->
          <div class="mb-3">
            <label for="adopcion" class="form-label required-field">Fecha de adopcion</label>
            <input type="date" class="form-control" id="adopcion" required>
          </div>
          <!--Observacion-->
          <div class="mb-3">
            <label for="observacion" class="form-label">Observacion</label>
            <textarea class="form-control" id="observacion" rows="3"></textarea>
          </div>
          <!--Propietario-->
          <div class="col">
            <label for="propietario" class="form-label">Propietario</label>
            <select class="form-select" id="propietarioId">
              <option selected hidden>Seleccionar un propietario</option>
              <?php include_once "../../conexion/get_propietarios.php";
              foreach ($propietarios as $propietario) : ?>
                <?php
                echo "<option value='" . $propietario["PropietarioId"] . "'>" . $propietario["Nombre"] . "</option>";
                ?>
              <?php endforeach; ?>
            </select>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Agregar</button>
        </div>
      </div>
    </div>
  </div>
</form>

<!--Modal para agregar usuarios-->
<form class="needs-validation" novalidate id="formAgregarUsuario">
  <div class="modal fade" id="agregarUsuario" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Agregar un usuario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
          <!--Usuario-->
          <div class="mb-3">
            <label for="usuario" class="form-label">Usuario</label>
            <input type="text" class="form-control" id="usuario" placeholder = "Bromatologia" required>
            <div class="invalid-feedback">Debe ingresar su usuario</div>
          </div>
          <!--Nombre-->
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombreUsuario" placeholder = "Juan" required>
            <div class="invalid-feedback">Debe ingresar su nombre</div>
          </div>
          <!--Apellido-->
          <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="apellidoUsuario" placeholder = "Perez" required>
            <div class="invalid-feedback">Debe ingresar su apellido</div>
          </div>
          <!--Nacimiento-->
          <div class="mb-3">
            <label for="nacimiento" class="form-label">Fecha de nacimiento</label>
            <input type="date" class="form-control" id="nacimientoUsuario" required>
            <div class="invalid-feedback">Debe ingresar su fecha de nacimiento</div>
          </div>
          <!--Email-->
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="emailUsuario" placeholder = "juanperez@gmail.com" required>
            <div class="invalid-feedback">Ingrese su email correctamente</div>
          </div>
          <!--Clave-->
          <div class="mb-3">
            <label for="clave" class="form-label">Clave</label>
            <input type="password" class="form-control" id="claveUsuario" placeholder = "bromatologia123" required>
            <span class="form-text text-muted">Su clave debe tener una longitud minima de 8 caracteres y contener numeros y letras</span>
            <div class="invalid-feedback">Clave invalida</div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary" id="botonAgregarUsuario">Agregar</button>
        </div>
      </div>
    </div>
  </div>
</form>

<!--Modal para agregar propietarios-->
<form class="needs-validation" novalidate id="formAgregarPropietario">
  <div class="modal fade" id="agregarPropietario" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Agregar un propietario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
          <!--DNI-->
          <div class="mb-3">
            <label for="dni" class="form-label">DNI</label>
            <input type="number" class="form-control" id="dni" placeholder = "23.123.323">
          </div>
          <!--Nombre-->
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombrePropietario" placeholder = "Juan">
          </div>
          <!--Apellido-->
          <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="apellidoPropietario" placeholder = "Perez">
          </div>
          <!--Email-->
          <div class="mb-3">
            <label for="email" class="form-label"> Direccion de email</label>
            <input type="email" class="form-control" id="emailPropietario" placeholder = "juanperez@gmail.com">
          </div>
          <!--telefono-->
          <div class="mb-3">
            <label for="telefono" class="form-label">Telefono</label>
            <input type="number" class="form-control" id="telefono" placeholder = "2344 123456">
          </div>
          <!--Direccion-->
          <div class="mb-3">
            <label for="direccion" class="form-label">Direccion</label>
            <input type="text" class="form-control" id="direccion" placeholder = "Moreno 2500">
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Agregar</button>
        </div>
      </div>
    </div>
  </div>
</form>

<!--Modal para agregar vacunas-->
<form class="needs-validation" novalidate id="formAgregarVacuna">
  <div class="modal fade" id="agregarVacuna" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Agregar una vacuna</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
          <!--Vacuna-->
          <div class="mb-3">
            <label for="vacuna" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombreVacuna" placeholder = "Coronavirus">
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Agregar</button>
        </div>
      </div>
    </div>
  </div>
</form>

<!--Modal para borrar un perro-->
<div class="modal fade" tabindex="-1" id="modalBorrarPerro">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Eliminar perro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Esta seguro de que quiere eliminar este perro?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-danger" id="confirmarEliminarPerro">Eliminar</button>
      </div>
    </div>
  </div>
</div>

<script src="/proyecto-perros/js/page_principal/agregacion/main.js" type="module"></script>
