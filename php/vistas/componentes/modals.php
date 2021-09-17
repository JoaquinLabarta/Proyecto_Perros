<style>
    .required-field::after {
        content: '*' !important;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 18px;
        color: red;
    }
</style>

<!--Modal para agregar perros-->
<form class="needs-validation" novalidate id="formAgregarPerro" onsubmit="validarAgregarPerro()" action="../../conexion/page_principal/agregacion/agregarPerro.php" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="agregarPerro" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar un perro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <!--Foto-->
                    <div class="mb-3">
                        <label for="tatuaje" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto" placeholder="AABB1122">
                    </div>
                    <!--Codigo de tatuaje-->
                    <div class="mb-3">
                        <label for="tatuaje" class="form-label required-field">Codigo de tatuaje</label>
                        <input type="text" class="form-control" id="tatooId" name="tatooId" placeholder="AABB1122" required>
                        <div class="invalid-feedback">Debe agregar un codigo de tatuaje</div>
                    </div>
                    <!--Apodo-->
                    <div class="mb-3">
                        <label for="apodo" class="form-label required-field">Apodo</label>
                        <input type="text" class="form-control" id="apodo" name="apodo" placeholder="Cliford" required>
                        <div class="invalid-feedback">Inserte el apodo del perro</div>
                    </div>
                    <!--Raza-->
                    <div class="mb-3">
                        <label for="raza" class="form-label required-field">Raza</label>
                        <input type="text" class="form-control" id="raza" name="raza" placeholder="Caniche" required>
                        <div class="invalid-feedback">Inserte la raza del perro</div>
                    </div>
                    <!--Castracion-->
                    <div class="mb-3">
                        <label for="castracion" class="form-label">Fecha de castrado</label>
                        <input type="date" class="form-control" id="castracion" name="castracion">
                    </div>
                    <!--Adopcion-->
                    <div class="mb-3">
                        <label for="adopcion" class="form-label required-field">Fecha de adopcion</label>
                        <input type="date" class="form-control" id="adopcion" name="adopcion" required>
                        <div class="invalid-feedback">Inserte la fecha de adopcion</div>
                    </div>
                    <!--Observacion-->
                    <div class="mb-3">
                        <label for="observacion" class="form-label">Observacion</label>
                        <textarea class="form-control" id="observacion" name="observacion" rows="3"></textarea>
                    </div>
                    <!--Propietario-->
                    <div class="col mb-3">
                        <label for="propietario" class="form-label">Propietario</label>
                        <select class="form-select" id="propietarioId" name="propietarioId">
                            <option selected value="0">Sin propietario</option>
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
                        <span class="form-text text-muted">Ingrese su DNI, sin utilizar puntos, comas o espacios</span>
                        <div class="invalid-feedback">Ingrese su DNI correctamente</div>
                    </div>
                    <!--Nombre-->
                    <div class="mb-3">
                        <label for="nombre" class="form-label required-field">Nombre</label>
                        <input type="text" class="form-control" id="nombrePropietario" placeholder="Juan" required>
                        <div class="invalid-feedback">Ingrese su nombre</div>
                    </div>
                    <!--Apellido-->
                    <div class="mb-3">
                        <label for="apellido" class="form-label required-field">Apellido</label>
                        <input type="text" class="form-control" id="apellidoPropietario" placeholder="Perez" required>
                        <div class="invalid-feedback">Ingrese su apellido</div>
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
                        <span class="form-text text-muted">Ingrese su telefono sin utilizar puntos, comas o espacios</span>
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
                <img alt="Foto" id="fotoObservacion" width="128" class="img-thumbnail mb-4" />
                <h5>Observacion</h5>
                <p class="mb-4" id="contenidoObservacion"></p>
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
<form class="needs-validation" novalidate id="formEditarPerro" action="../../conexion/page_principal/edicion/editarPerro.php" method="POST" onsubmit="validarEditarPerro()" enctype="multipart/form-data">
    <div class="modal fade" id="editarPerro" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar perro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <!--PerroId-->
                    <div style="display: none;">
                        <input name="editarPerroId" id="editarPerroId">
                    </div>
                    <!--Foto-->
                    <div class="mb-3">
                        <label for="editarFoto" class="form-label">Foto</label>
                        <img alt="Foto" class="img-thumbnail mb-3" width="164" id="fotoPerroEditar" />
                        <button class="btn btn-danger ms-0 mb-3" id="botonFotoEliminar">Eliminar foto</button>
                        <input type="file" id="editarFoto" name="editarFoto" class="form-control">
                    </div>
                    <!--Codigo de tatuaje-->
                    <div class="mb-3">
                        <label for="tatuaje" class="form-label">Codigo de tatuaje</label>
                        <input type="text" class="form-control" id="editarTatooId" name="editarTatooId" placeholder="AABB1122" required>
                        <div class="invalid-feedback">Debe agregar un codigo de tatuaje</div>
                    </div>
                    <!--Apodo-->
                    <div class="mb-3">
                        <label for="apodo" class="form-label">Apodo</label>
                        <input type="text" class="form-control" id="editarApodo" name="editarApodo" placeholder="Cliford" required>
                        <div class="invalid-feedback">Inserte un apodo para el perro</div>
                    </div>
                    <!--Raza-->
                    <div class="mb-3">
                        <label for="raza" class="form-label">Raza</label>
                        <input type="text" class="form-control" id="editarRaza" name="editarRaza" placeholder="Caniche">
                        <div class="invalid-feedback">Inserte la raza del perro</div>
                    </div>
                    <!--Castracion-->
                    <div class="mb-3">
                        <label for="castracion" class="form-label">Fecha de castrado</label>
                        <input type="date" class="form-control" id="editarCastracion" name="editarCastracion">
                    </div>
                    <!--Adopcion-->
                    <div class="mb-3">
                        <label for="adopcion" class="form-label">Fecha de adopcion</label>
                        <input type="date" class="form-control" id="editarAdopcion" name="editarAdopcion" required>
                        <div class="invalid-feedback">Inserte la fecha de adopcion del perro</div>
                    </div>
                    <!--Observacion-->
                    <div class="mb-3">
                        <label for="observacion" class="form-label">Observacion</label>
                        <textarea class="form-control" name="editarObservacion" id="editarObservacion" rows="3"></textarea>
                    </div>
                    <!--Propietario-->
                    <div class="col">
                        <label for="editarPropietarioId" class="form-label">Propietario</label>
                        <select class="form-select" id="editarPropietarioId" name="editarPropietarioId">
                            <option selected value="0">Sin propietario</option>
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

<!--Modal para editar propietarios-->
<form class="needs-validation" novalidate id="formEditarPropietario">
    <div class="modal fade" id="editarPropietario" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar propietario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <!--DNI-->
                    <div class="mb-3">
                        <label for="dni" class="form-label required-field">DNI</label>
                        <input type="number" class="form-control" id="editarDni" placeholder="23.123.323" required>
                    </div>
                    <!--Nombre-->
                    <div class="mb-3">
                        <label for="nombre" class="form-label required-field">Nombre</label>
                        <input type="text" class="form-control" id="editarNombrePropietario" placeholder="Juan" required>
                    </div>
                    <!--Apellido-->
                    <div class="mb-3">
                        <label for="apellido" class="form-label required-field">Apellido</label>
                        <input type="text" class="form-control" id="editarApellidoPropietario" placeholder="Perez" required>
                    </div>
                    <!--Email-->
                    <div class="mb-3">
                        <label for="email" class="form-label"> Direccion de email</label>
                        <input type="email" class="form-control" id="editarEmailPropietario" placeholder="juanperez@gmail.com">
                    </div>
                    <!--telefono-->
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Telefono</label>
                        <input type="number" class="form-control" id="editarTelefono" placeholder="2344 123456">
                    </div>
                    <!--Direccion-->
                    <div class="mb-3">
                        <label for="direccion" class="form-label">Direccion</label>
                        <input type="text" class="form-control" id="editarDireccion" placeholder="Moreno 2500">
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
