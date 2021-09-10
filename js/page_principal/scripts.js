function setDatatable(tablaId, inputId, columnas) {
  $(document).ready(function () {
    var table = $(tablaId).DataTable({
      processing: true,
      dom: '<"top"i>t<"bottom"fp><"clear">',
      responsive: "true",
      language: {
        lengthMenu: "Mostrar _MENU_ registros",
        zeroRecords: "No se encontraron resultados",
        info: "Mostrando _END_ de _TOTAL_ registros",
        infoEmpty: "Mostrando 0 de 0 de un total de 0 registros",
        infoFiltered: "(filtrado de un total de _MAX_ registros)",
        sProcessing: "Procesando...",
        oPaginate: {
          sFirst: "Primero",
          sLast: "Último",
          sNext: "Siguiente",
          sPrevious: "Anterior",
        },
      },
      "aoColumns": columnas,
    });

    function search() {
      table.search($(inputId).val()).draw();
    }

    $(inputId).keyup(() => search());
  });
}



setDatatable("#perros", "#inputBuscarPerro", [
  { "bSortable": true },
  { "bSortable": true },
  { "bSortable": false },
  { "bSortable": false },
  { "bSortable": false },
  { "bSortable": false }
]);
setDatatable("#usuarios", "#inputBuscarUsuarios", [
  { "bSortable": true },
  { "bSortable": true },
  { "bSortable": false },
  { "bSortable": false },
  { "bSortable": false },
]);
setDatatable("#propietarios", "#inputBuscarPropietarios", [
  { "bSortable": true },
  { "bSortable": true },
  { "bSortable": false },
  { "bSortable": false },
  { "bSortable": true },
  { "bSortable": false }
]);

/* Funciones */
/**
 * Permite al usuario ver la observacion de un perro.
 * @param {object} perro La observacion a mostrar
 * @author briones-gabriel
 */
function verObservacion(perro) {
    $("#tituloObservacion").text(`${perro["Apodo"]} (Codigo ${perro["TatooId"]})`);
    $("#contenidoObservacion").text(perro["Observacion"]);
    $("#modalObservacion").modal("show");
    $("#fechaDeAdopcion").text(perro["Adopcion"] ? perro["Adopcion"] : "No hay fecha");
    $("#fechaDeCastracion").text(perro["Castracion"] ? perro["Castracion"] : "No hay fecha");
}

/**
 * Permite al usuario eliminar un perro de la BDD.
 * @param {number} perroId El Id del perro a eliminar.
 * @author briones-gabriel
 */
function eliminarPerro(perroId) {
    $("#modalBorrarPerro").modal("show");
    const url = "/proyecto-perros/php/conexion/page_principal/eliminacion/eliminarPerro.php";
    document.getElementById("confirmarEliminarPerro").addEventListener("click", () => {
        $.ajax({
            type: "POST",
            url: url,
            data: { perroId },
            success: () => location.reload(),
            error: (xhr) => alert(xhr.responseText),
        });
    });
}

/**
 * Permite al usuario eliminar un propietario de la BDD.
 * @param {number} perroId El Id del propietario a eliminar.
 * @author briones-gabriel
 */
function eliminarPropietario(propietarioId) {
    $("#modalBorrarPropietario").modal("show");
    const url = "/proyecto-perros/php/conexion/page_principal/eliminacion/eliminarPropietario.php";
    document.getElementById("confirmarEliminarPropietario").addEventListener("click", () => {
        $.ajax({
            type: "POST",
            url: url,
            data: { propietarioId },
            success: () => location.reload(),
            error: (xhr) => alert(xhr.responseText),
        });
    });
}

/**
 * Permite al usuario editar a un perro.
 * @param {object} perro
 * @author briones-gabriel
 */
function editarPerro(perro) {
    $("#editarTatooId").val(perro["TatooId"]);
    $("#editarApodo").val(perro["Apodo"]);
    $("#editarRaza").val(perro["Raza"]);
    $("#editarCastracion").val(perro["Castracion"]);
    $("#editarAdopcion").val(perro["Adopcion"]);
    $("#editarObservacion").val(perro["Observacion"]);
    $("#editarPropietarioId").val(perro["PropietarioId"]);

    $("#editarPerro").modal("show");

    let form = document.getElementById("formEditarPerro");

    form.addEventListener("submit", function(event) {
        event.preventDefault();

        const castracion = $("#editarCastracion").val();
        const propietarioId = document.getElementById("editarPropietarioId").value;

        const perroEditado = {
            castracion,
            propietarioId,
            perroId: perro["PerroId"],
            tatooId: $("#editarTatooId").val(),
            apodo: $("#editarApodo").val(),
            raza: $("#editarRaza").val(),
            adopcion: $("#editarAdopcion").val(),
            observacion: $("#editarObservacion").val(),
        };

        if (perroEditado.tatooId.length < 1 || perroEditado.apodo.length < 1 || perroEditado.adopcion.length < 1) {
            return false;
        } else {
            const url = "/proyecto-perros/php/conexion/page_principal/edicion/editarPerro.php";
            $.ajax({
                type: "POST",
                url: url,
                data: perroEditado,
                success: () => location.reload(),
                error: (xhr) => alert(xhr.responseText),
            });
        }
    });
}

/**
 * Agrega un registro a la base de datos.
 * @param {string} tipo El tipo de request que se quiere hacer
 * @param {string} url
 * @param {Object} nuevoRegistro
 * @author briones-gabriel
 */
function agregarRegistro(tipo, url, nuevoRegistro) {
    $.ajax({
        type: tipo,
        url: url,
        data: nuevoRegistro,
        success: () => location.reload(),
        error: (xhr) => alert(xhr.responseText),
    });
}

/**
 * Permite al usuario guardar un perro en la BDD.
 * @param {Event} event
 * @author briones-gabriel
 */
function guardarPerro(event) {
    event.preventDefault();

    const url = "/proyecto-perros/php/conexion/page_principal/agregacion/agregarPerro.php";

    const nuevoPerro = {
        propietarioId: document.getElementById("propietarioId").value,
        observacion: $("#observacion").val(),
        castracion: $("#castracion").val(),
        adopcion: $("#adopcion").val(),
        tatooId: $("#tatooId").val(),
        apodo: $("#apodo").val(),
        raza: $("#raza").val(),
    };

    if (nuevoPerro.tatooId.length < 1 || nuevoPerro.apodo.length < 1 || nuevoPerro.adopcion.length < 1) {
        return false;
    } else {
        agregarRegistro("POST", url, nuevoPerro);
    }
}

/**
 * Permite al usuario guardar un propietario en la BDD.
 * @param event
 * @author briones-gabriel
 */
function guardarPropietario(event) {
    event.preventDefault();

    const url = "/proyecto-perros/php/conexion/page_principal/agregacion/agregarPropietario.php";
    const nuevoPropietario = {
        dni: $("#dni").val(),
        nombre: $("#nombrePropietario").val(),
        apellido: $("#apellidoPropietario").val(),
        email: $("#emailPropietario").val(),
        telefono: $("#telefono").val(),
        direccion: $("#direccion").val(),
    };

    if (nuevoPropietario.dni.length < 7 || nuevoPropietario.dni.length > 8 || nuevoPropietario.nombre.length < 1 || nuevoPropietario.apellido.length < 1) {
        return false;
    } else {
        agregarRegistro("POST", url, nuevoPropietario);
    }
}

/**
 * Permite al usuario eliminar un perro de la BDD.
 * @param {number} usuarioId El Id del perro a eliminar.
 * @author briones-gabriel
 */
function eliminarUsuario(usuarioId) {
  $("#modalBorrarUsuario").modal("show");
  const url = "/proyecto-perros/php/conexion/page_usuarios/eliminarUsuario.php";
  document.getElementById("confirmarEliminarUsuario").addEventListener("click", () => {
    $.ajax({
      type: "POST",
      url: url,
      data: { usuarioId },
      success: () => location.reload(),
      error: (xhr) => alert(xhr.responseText),
    });
  });
}

/**
 * Permite agregar un usuario a la BDD.
 * @param event
 * @author briones-gabriel
 */
function guardarUsuario(event) {
  event.preventDefault();

  const nuevoUsuario = {
    usuario: $("#usuario").val(),
    nombre: $("#nombreUsuario").val(),
    apellido: $("#apellidoUsuario").val(),
    nacimiento: $("#nacimientoUsuario").val(),
    email: $("#emailUsuario").val(),
    clave: $("#claveUsuario").val(),
  };

  const validatePassword = (password) => {
    if (password.length < 8) {
      throw new Error("CLAVE_ERR: muy_corta");
    } else if (password.search(/\d/) == -1) {
      throw new Error("CLAVE_ERR: faltan_numeros");
    } else if (password.search(/[a-zA-Z]/) == -1) {
      throw new Error("CLAVE_ERR: faltan_letras");
    } else {
      return true;
    }
  };

  if (nuevoUsuario.usuario.length < 1) {
    return false;
  } else if (nuevoUsuario.nombre.length < 1) {
    return false;
  } else if (nuevoUsuario.apellido.length < 1) {
    return false;
  } else if (nuevoUsuario.nacimiento.length < 1) {
    return false;
  } else if (nuevoUsuario.email.length < 1) {
    return false;
  } else if (!validatePassword(nuevoUsuario.clave)) {
    const inputClave = document.getElementById("clave");
    inputClave.style.backgroundImage = `url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e")`;
    return false;
  } else {
    // Caso los datos hayan pasado la validacion con exito
    const url = "/proyecto-perros/php/conexion/page_usuarios/agregarUsuario.php";
    agregarRegistro("POST", url, nuevoUsuario);
  }
}
