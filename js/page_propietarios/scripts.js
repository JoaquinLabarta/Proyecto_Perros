/**
 * Permite al usuario editar a un propietario.
 * @param {object} propietario
 * @author briones-gabriel
 */
function editarPropietario(propietario) {
    $("#editarDni").val(propietario["DNI"]);
    $("#editarNombrePropietario").val(propietario["Nombre"]);
    $("#editarApellidoPropietario").val(propietario["Apellido"]);
    $("#editarEmailPropietario").val(propietario["Email"]);
    $("#editarTelefono").val(propietario["Telefono"]);
    $("#editarDireccion").val(propietario["Direccion"]);

    $("#editarPropietario").modal("show");

    let form = document.getElementById("formEditarPropietario");

    form.addEventListener("submit", function(event) {
        event.preventDefault();

        const propietarioEditado = {
            dni: $("#editarDni").val(),
            nombre: $("#editarNombrePropietario").val(),
            apellido: $("#editarApellidoPropietario").val(),
            email: $("#editarEmailPropietario").val(),
            telefono: $("#editarTelefono").val(),
            direccion: $("#editarDireccion").val(),
        };

        if (propietarioEditado.dni.length < 1) {
            return false;
        } else {
            const url = "/proyecto-perros/php/conexion/page_propietarios/editarPropietario.php";
            $.ajax({
                type: "POST",
                url: url,
                data: propietarioEditado,
                success: () => location.reload(),
                error: (xhr) => alert(xhr.responseText),
            });
        }
    });
}

