<style>
    .required-field::after {
        content: '*' !important;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 18px;
        color: red;
    }
</style>

<!--Modal para agregar perros-->
<form class="needs-validation" novalidate id="formAgregarPerro" onsubmit="guardarPerro(event)">
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
                    <div class="col mb-3">
                        <label for="propietario" class="form-label">Propietario</label>
                        <select class="form-select" id="propietarioId">
                            <option selected hidden value="0">Seleccionar un propietario</option>
                            <?php
                            include_once "../../conexion/get_propietarios.php";
                            foreach ($propietarios as $propietario) : ?>
                                <?php echo "<option value='" .
                                    $propietario["PropietarioId"] .
                                    "'>" .
                                    $propietario["Nombre"] .
                                    "</option>"; ?>
                            <?php endforeach;
                            ?>
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
<form class="needs-validation" novalidate id="formAgregarUsuario" onsubmit="guardarUsuario(event)">
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
                        <label for="usuario" class="form-label required-field">Usuario</label>
                        <input type="text" class="form-control" id="usuario" placeholder="Bromatologia" required>
                        <div class="invalid-feedback">Debe ingresar su usuario</div>
                    </div>
                    <!--Nombre-->
                    <div class="mb-3">
                        <label for="nombre" class="form-label required-field">Nombre</label>
                        <input type="text" class="form-control" id="nombreUsuario" placeholder="Juan" required>
                        <div class="invalid-feedback">Debe ingresar su nombre</div>
                    </div>
                    <!--Apellido-->
                    <div class="mb-3">
                        <label for="apellido" class="form-label required-field">Apellido</label>
                        <input type="text" class="form-control" id="apellidoUsuario" placeholder="Perez" required>
                        <div class="invalid-feedback">Debe ingresar su apellido</div>
                    </div>
                    <!--Nacimiento-->
                    <div class="mb-3">
                        <label for="nacimiento" class="form-label required-field">Fecha de nacimiento</label>
                        <input type="date" class="form-control" id="nacimientoUsuario" required>
                        <div class="invalid-feedback">Debe ingresar su fecha de nacimiento</div>
                    </div>
                    <!--Email-->
                    <div class="mb-3">
                        <label for="email" class="form-label required-field">Email</label>
                        <input type="email" class="form-control" id="emailUsuario" placeholder="juanperez@gmail.com" required>
                        <div class="invalid-feedback">Ingrese su email correctamente</div>
                    </div>
                    <!--Clave-->
                    <div class="mb-3">
                        <label for="clave" class="form-label required-field">Clave</label>
                        <input type="password" class="form-control" id="claveUsuario" placeholder="bromatologia123" required>
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
<form class="needs-validation" novalidate id="formAgregarPropietario" onsubmit="guardarPropietario(event)">
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
                        <label for="dni" class="form-label required-field">DNI</label>
                        <input type="number" class="form-control" id="dni" placeholder="23.123.323" required>
                    </div>
                    <!--Nombre-->
                    <div class="mb-3">
                        <label for="nombre" class="form-label required-field">Nombre</label>
                        <input type="text" class="form-control" id="nombrePropietario" placeholder="Juan" required>
                    </div>
                    <!--Apellido-->
                    <div class="mb-3">
                        <label for="apellido" class="form-label required-field">Apellido</label>
                        <input type="text" class="form-control" id="apellidoPropietario" placeholder="Perez" required>
                    </div>
                    <!--Email-->
                    <div class="mb-3">
                        <label for="email" class="form-label"> Direccion de email</label>
                        <input type="email" class="form-control" id="emailPropietario" placeholder="juanperez@gmail.com">
                    </div>
                    <!--telefono-->
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Telefono</label>
                        <input type="number" class="form-control" id="telefono" placeholder="2344 123456">
                    </div>
                    <!--Direccion-->
                    <div class="mb-3">
                        <label for="direccion" class="form-label">Direccion</label>
                        <input type="text" class="form-control" id="direccion" placeholder="Moreno 2500">
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

<!--Modal para borrar un usuario-->
<div class="modal fade" tabindex="-1" id="modalBorrarUsuario">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Esta seguro de que quiere eliminar este usuario?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-danger" id="confirmarEliminarUsuario">Eliminar</button>
            </div>
        </div>
    </div>
</div>

<!--Modal para borrar un propietario-->
<div class="modal fade" tabindex="-1" id="modalBorrarPropietario">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar propietario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Esta seguro de que quiere eliminar este propietario?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-danger" id="confirmarEliminarPropietario">Eliminar</button>
            </div>
        </div>
    </div>
</div>

<!--Modal de observacion-->
<div class="modal fade" tabindex="-1" id="modalObservacion">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloObservacion"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5>Observacion</h5>
                <p id="contenidoObservacion"></p>
                <br>
                <h5>Fechas</h5>
                <ul>
                    <li>Adopcion: <span id="fechaDeAdopcion">No hay fecha</span></li>
                    <li>Castracion: <span id="fechaDeCastracion">No hay fecha</span></li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!--Modal para editar perros-->
<form class="needs-validation" novalidate id="formEditarPerro">
    <div class="modal fade" id="editarPerro" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar perro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <!--Codigo de tatuaje-->
                    <div class="mb-3">
                        <label for="tatuaje" class="form-label required-field">Codigo de tatuaje</label>
                        <input type="text" class="form-control" id="editarTatooId" placeholder="AABB1122" required>
                    </div>
                    <!--Apodo-->
                    <div class="mb-3">
                        <label for="apodo" class="form-label required-field">Apodo</label>
                        <input type="text" class="form-control" id="editarApodo" placeholder="Cliford" required>
                    </div>
                    <!--Raza-->
                    <div class="mb-3">
                        <label for="raza" class="form-label">Raza</label>
                        <input type="text" class="form-control" id="editarRaza" placeholder="Caniche">
                    </div>
                    <!--Castracion-->
                    <div class="mb-3">
                        <label for="castracion" class="form-label">Fecha de castrado</label>
                        <input type="date" class="form-control" id="editarCastracion">
                    </div>
                    <!--Adopcion-->
                    <div class="mb-3">
                        <label for="adopcion" class="form-label required-field">Fecha de adopcion</label>
                        <input type="date" class="form-control" id="editarAdopcion" required>
                    </div>
                    <!--Observacion-->
                    <div class="mb-3">
                        <label for="observacion" class="form-label">Observacion</label>
                        <textarea class="form-control" id="editarObservacion" rows="3"></textarea>
                    </div>
                    <!--Propietario-->
                    <div class="col">
                        <label for="propietario" class="form-label">Propietario</label>
                        <select class="form-select" id="editarPropietarioId">
                            <option selected hidden value="0">Seleccionar un propietario</option>
                            <?php
                            include_once "../../conexion/get_propietarios.php";
                            foreach ($propietarios as $propietario) : ?>
                                <?php echo "<option value='" .
                                    $propietario["PropietarioId"] .
                                    "'>" .
                                    $propietario["Nombre"] .
                                    "</option>"; ?>
                            <?php endforeach;
                            ?>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>
            </div>
        </div>
    </div>
</form>
