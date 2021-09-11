import setDatatable from "../modulos/datatables/setDatatable.js";

setDatatable("#propietarios", "#inputBuscarPropietarios", [
    { bSortable: true },
    { bSortable: true },
    { bSortable: false },
    { bSortable: false },
    { bSortable: true },
    { bSortable: false },
]);

/**
 * Permite al usuario editar a un propietario.
 * @param {object} propietario
 * @author briones-gabriel
 */
window.editarPropietario = (propietario) => {
    $("#editarDni").val(propietario["DNI"]);
    $("#editarNombrePropietario").val(propietario["Nombre"]);
    $("#editarApellidoPropietario").val(propietario["Apellido"]);
    $("#editarEmailPropietario").val(propietario["Email"]);
    $("#editarTelefono").val(propietario["Telefono"]);
    $("#editarDireccion").val(propietario["Direccion"]);

    $("#editarPropietario").modal("show");

    let form = document.getElementById("formEditarPropietario");

    form.addEventListener("submit", (event) => {
        event.preventDefault();

        const propietarioEditado = {
            dni: $("#editarDni").val(),
            nombre: $("#editarNombrePropietario").val(),
            apellido: $("#editarApellidoPropietario").val(),
            email: $("#editarEmailPropietario").val(),
            telefono: $("#editarTelefono").val(),
            direccion: $("#editarDireccion").val(),
        };

        if (propietarioEditado.dni.length < 1) return false;

        $.ajax({
            type: "POST",
            url: "/proyecto-perros/php/conexion/page_propietarios/editarPropietario.php",
            data: propietarioEditado,
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
window.eliminarPropietario = (propietarioId) => {
    $("#modalBorrarPropietario").modal("show");
    document
        .getElementById("confirmarEliminarPropietario")
        .addEventListener("click", () => {
            $.ajax({
                type: "POST",
                url: "/proyecto-perros/php/conexion/page_principal/eliminacion/eliminarPropietario.php",
                data: { propietarioId },
                success: () => location.reload(),
                error: (xhr) => alert(xhr.responseText),
            });
        });
};

