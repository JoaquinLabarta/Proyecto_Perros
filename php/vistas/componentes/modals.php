<!--https://getbootstrap.com/docs/5.0/components/modal/-->

<!--Modal para agregar perros-->
<div class="modal fade" id="agregarPerro" tabindex="-1">
  <form class="needs-validation" novalidate id="formAgregarPerro">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Agregar un perro</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
          <!--Codigo de tatuaje-->
          <div class="mb-3">
            <label for="tatuaje" class="form-label">Codigo de tatuaje</label>
            <input type="text" class="form-control" id="tatooId" placeholder="AABB1122" required>
          </div>
          <!--Foto-->
          <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" id="fotoUrl">
          </div>
          <!--Apodo-->
          <div class="mb-3">
            <label for="apodo" class="form-label">Apodo</label>
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
            <label for="adopcion" class="form-label">Fecha de adopcion</label>
            <input type="date" class="form-control" id="adopcion">
          </div>
          <!--Observacion-->
          <div class="mb-3">
            <label for="observacion" class="form-label">Observacion</label>
            <textarea class="form-control" id="observacion" rows="3"></textarea>
          </div>
          <!--Propietario-->
          <div class="col">
            <label for="propietario" class="form-label">Propietario</label>
            <select class="form-select">
              <option selected hidden>Seleccionar un propietario</option>
              <option value="1">Axel</option>
              <option value="2">Labarta</option>
              <option value="3">Ventos</option>
            </select>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Agregar</button>
        </div>
      </div>
    </div>
  </form>
</div>

<!--Modal para agregar usuarios-->
<div class="modal fade" id="agregarUsuario" tabindex="-1">
  <form class="needs-validation" novalidate id="formAgregarUsuario">
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
            <input type="text" class="form-control" id="usuario" required>
            <div class="invalid-feedback">Debe ingresar su usuario</div>
          </div>
          <!--Nombre-->
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombreUsuario" required>
            <div class="invalid-feedback">Debe ingresar su nombre</div>
          </div>
          <!--Apellido-->
          <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="apellidoUsuario" required>
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
            <input type="email" class="form-control" id="emailUsuario" required>
            <div class="invalid-feedback">Ingrese su email correctamente</div>
          </div>
          <!--Clave-->
          <div class="mb-3">
            <label for="clave" class="form-label">Clave</label>
            <input type="password" class="form-control" id="claveUsuario" required>
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
  </form>
</div>

<!--Modal para agregar propietarios-->
<div class="modal fade" id="agregarPropietario" tabindex="-1">
  <form class="needs-validation" novalidate id="formAgregarPropietario">
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
            <input type="number" class="form-control" id="dni">
          </div>
          <!--Nombre-->
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombrePropietario">
          </div>
          <!--Apellido-->
          <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="apellidoPropietario">
          </div>
          <!--Email-->
          <div class="mb-3">
            <label for="email" class="form-label"> Direccion de email</label>
            <input type="email" class="form-control" id="emailPropietario">
          </div>
          <!--telefono-->
          <div class="mb-3">
            <label for="telefono" class="form-label">Telefono</label>
            <input type="number" class="form-control" id="telefono">
          </div>
          <!--Direccion-->
          <div class="mb-3">
            <label for="direccion" class="form-label">Direccion</label>
            <input type="text" class="form-control" id="direccion">
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Agregar</button>
        </div>
      </div>
    </div>
  </form>
</div>

<!--Modal para agregar vacunas-->
<div class="modal fade" id="agregarVacuna" tabindex="-1">
  <form class="needs-validation" novalidate id="formAgregarVacuna">
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
            <input type="text" class="form-control" id="nombreVacuna">
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Agregar</button>
        </div>
      </div>
    </div>
  </form>
</div>

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
<script src="/proyecto-perros/js/page_principal/agregacion/main.js" type="module"></script>
