$(document).ready(function () {
  var table = $("#perros").DataTable({
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
  });

  function search() {
    table.search($("#inputBuscarPerro").val()).draw();
  }

  $("#inputBuscarPerro").keyup(() => search());
});

/* Variables */
let vacunas = {};

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

  form.addEventListener("submit", function (event) {
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
 * Permite al usuario seleccionar una vacuna a la vez.
 * @param {object} vacuna
 * @author briones-gabriel
 */
function seleccionarVacuna(vacuna) {
  let vacunaId = vacuna.value;
  let nombreVacuna = vacuna[vacunaId].label;

  let listaDeVacunas = document.getElementById("listaDeVacunas");
  let nuevaItemVacuna = document.createElement("li");

  nuevaItemVacuna.appendChild(document.createTextNode(nombreVacuna));
  nuevaItemVacuna.setAttribute("class", "list-group-item");

  listaDeVacunas.appendChild(nuevaItemVacuna);

  vacunas[vacunaId] = nombreVacuna;
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
    vacunasIds: Object.keys(vacunas),
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

  if (nuevoPropietario.dni.length < 1 || nuevoPropietario.nombre.length < 1 || nuevoPropietario.apellido.length < 1) {
    return false;
  } else {
    agregarRegistro("POST", url, nuevoPropietario);
  }
}

/**
 * Permite al usuario guardar una vacuna en la BDD.
 * @param event
 * @author briones-gabriel
 */
function guardarVacuna(event) {
  event.preventDefault();

  const url = "/proyecto-perros/php/conexion/page_principal/agregacion/agregarVacuna.php";
  const nuevaVacuna = {
    nombreVacuna: $("#nombreVacuna").val(),
  };

  if (nuevaVacuna.nombreVacuna.length < 1) {
    return false;
  } else {
    agregarRegistro("POST", url, nuevaVacuna);
  }
}
