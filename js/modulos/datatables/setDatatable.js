/**
 * Configura el modulo de DataTables (en la pagina invocada) dados los parametros pasados.
 * @param {string} tablaId
 * @param {string} inputId
 * @param {object} columnas
 * @author briones-gabriel
 */
export default function setDatatable(tablaId, inputId, columnas) {
  $(document).ready(function () {
    let table = $(tablaId).DataTable({
      processing: true,
      dom: '<"top"i>t<"bottom"fp><"clear">',
      responsive: "true",
      language: {
        lengthMenu: "Mostrar _MENU_ registros",
        zeroRecords: "No hay nada para mostrar, intente agregar algun registro",
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

    $(inputId).keyup(function () {
      table.search($(inputId).val()).draw();
    });
  });
}
