import setDatatable from "../modulos/datatables/setDatatable.js";

setDatatable("#usuarios", "#inputBuscarUsuarios", [
  { bSortable: true },
  { bSortable: true },
  { bSortable: false },
  { bSortable: false },
  { bSortable: false },
]);

/**
 * Permite al usuario eliminar un perro de la BDD.
 * @param {number} usuarioId El Id del perro a eliminar.
 * @author briones-gabriel
 */
window.eliminarUsuario = (usuarioId) => {
  $("#modalBorrarUsuario").modal("show");
  document
    .getElementById("confirmarEliminarUsuario")
    .addEventListener("click", () => {
      $.ajax({
        type: "POST",
        url: "/perros/php/conexion/page_usuarios/eliminarUsuario.php",
        data: { usuarioId },
        success: () => location.reload(),
        error: (xhr) => alert(xhr.responseText),
      });
    });
};

/**
 * Permite agregar un usuario a la BDD.
 * @param event
 * @author briones-gabriel
 */
window.guardarUsuario = (event) => {
  event.preventDefault();

  const nuevoUsuario = {
    usuario: $("#usuario").val(),
    nombre: $("#nombreUsuario").val(),
    apellido: $("#apellidoUsuario").val(),
    nacimiento: $("#nacimientoUsuario").val(),
    email: $("#emailUsuario").val(),
    clave: $("#claveUsuario").val(),
  };

  if (
    nuevoUsuario.usuario.length < 1 ||
    nuevoUsuario.nombre.length < 1 ||
    nuevoUsuario.apellido.length < 1 ||
    nuevoUsuario.nacimiento.length < 1 ||
    nuevoUsuario.email.length < 1 ||
    nuevoUsuario.clave.length < 1
  )
    return false;

  // Caso los datos hayan pasado la validacion con exito, se agrega el registro
  $.ajax({
    type: "POST",
    url: "/perros/php/conexion/page_usuarios/agregarUsuario.php",
    data: nuevoUsuario,
    success: () => location.reload(),
    error: (xhr) => alert(xhr.responseText),
  });
};
