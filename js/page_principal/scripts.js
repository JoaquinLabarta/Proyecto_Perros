import setDatatable from "../modulos/datatables/setDatatable.js";

setDatatable("#perros", "#inputBuscarPerro", [
  { bSortable: false },
  { bSortable: true },
  { bSortable: true },
  { bSortable: false },
  { bSortable: false },
  { bSortable: false },
  { bSortable: false },
]);

/**
 * Permite al usuario ver la observacion de un perro.
 * @param {object} perro La observacion a mostrar
 * @author briones-gabriel
 */
window.verObservacion = (perro) => {
  $("#fotoObservacion").attr("src", perro["FotoUrl"]);
  $("#tituloObservacion").text(
    `${perro["Apodo"]} (Codigo ${perro["TatooId"]})`
  );
  $("#contenidoObservacion").text(perro["Observacion"]);
  $("#fechaDeAdopcion").text(
    perro["Adopcion"] ? perro["Adopcion"] : "No hay fecha"
  );
  $("#fechaDeCastracion").text(
    perro["Castracion"] ? perro["Castracion"] : "No hay fecha"
  );
  $("#modalObservacion").modal("show");
};

/**
 * Permite al usuario eliminar un perro de la BDD.
 * @param {number} perroId El Id del perro a eliminar.
 * @author briones-gabriel
 */
window.eliminarPerro = (perroId) => {
  $("#modalBorrarPerro").modal("show");
  document
    .getElementById("confirmarEliminarPerro")
    .addEventListener("click", () => {
      $.ajax({
        type: "POST",
        url: "/proyecto-perros/php/conexion/page_principal/eliminacion/eliminarPerro.php",
        data: { perroId },
        success: () => location.reload(),
        error: (xhr) => alert(xhr.responseText),
      });
    });
};

/**
 * Permite al usuario editar un perro.
 * @param {object} perro
 * @author briones-gabriel
 */
window.editarPerro = (perro) => {
  $("#editarPerroId").val(perro["PerroId"]);
  $("#editarTatooId").val(perro["TatooId"]);
  $("#editarApodo").val(perro["Apodo"]);
  $("#editarRaza").val(perro["Raza"]);
  $("#editarCastracion").val(perro["Castracion"]);
  $("#editarAdopcion").val(perro["Adopcion"]);
  $("#editarObservacion").val(perro["Observacion"]);
  $("#editarPropietarioId").val(perro["PropietarioId"]);

  if (perro["FotoUrl"] === "/proyecto-perros/recursos/perroDefault.svg") {
    $("#botonFotoEliminar").css("display", "none");
    $("#fotoPerroEditar").css("display", "none");
    $("#editarFoto").css("display", "block");
  } else {
    $("#fotoPerroEditar").css("display", "block");
    $("#botonFotoEliminar").css("display", "block");
    $("#editarFoto").css("display", "none");
    $("#fotoPerroEditar").attr("src", perro["FotoUrl"]);
    document
      .getElementById("botonFotoEliminar")
      .addEventListener("click", (event) => {
        eliminarFoto(event, perro);
      });
  }

  $("#editarPerro").modal("show");
};

/**
 * Valida el formulario para editar perros.
 * @author briones-gabriel
 */
window.validarEditarPerro = () => {
  const camposObligatorios = {
    tatooId: $("#editarTatooId").val(),
    apodo: $("#editarApodo").val(),
    adopcion: $("#editarAdopcion").val(),
  };

  return (
    camposObligatorios.tatooId.length > 1 &&
    camposObligatorios.apodo.length > 1 &&
    camposObligatorios.adopcion.length > 1
  );
};

/**
 * Permite al usuario guardar un perro en la BDD.
 * @author briones-gabriel
 */
window.validarAgregarPerro = () => {
  const camposObligatorios = {
    adopcion: $("#adopcion").val(),
    tatooId: $("#tatooId").val(),
    apodo: $("#apodo").val(),
  };

  return (
    camposObligatorios.tatooId.length < 1 ||
    camposObligatorios.apodo.length < 1 ||
    camposObligatorios.adopcion.length < 1
  );
};

/**
 * Permite al usuario eliminar la foto de un perro.
 * @param {object} perro
 * @author briones-gabriel
 */
const eliminarFoto = (event, perro) => {
  event.preventDefault();
  $.ajax({
    url: "/proyecto-perros/php/conexion/page_principal/eliminacion/eliminarFotoPerro.php",
    type: "POST",
    data: { perroId: perro["PerroId"], fotoUrl: perro["FotoUrl"] },
    success: () => {
      $("#botonFotoEliminar").css("display", "none");
      $("#fotoPerroEditar").css("display", "none");
      $("#editarFoto").css("display", "block");
      $("#foto-" + perro["TatooId"]).attr(
        "src",
        "/proyecto-perros/recursos/perroDefault.svg"
      );
    },
    error: () =>
      alert("Hubo un error al intentar borrar la foto de este perro."),
  });
};
