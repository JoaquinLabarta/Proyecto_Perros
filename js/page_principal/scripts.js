$(document).ready(function () {
  $("#usuarios").DataTable({
    processing: true,
    dom: "Bfrtip",
    responsive: "true",
    language: {
      lengthMenu: "Mostrar _MENU_ registros",
      zeroRecords: "No se encontraron resultados",
      info: "Mostrando _END_ de _TOTAL_ registros",
      infoEmpty: "Mostrando 0 de 0 de un total de 0 registros",
      infoFiltered: "(filtrado de un total de _MAX_ registros)",
      sSearch: "Buscar Registro: ",
      sProcessing: "Procesando...",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
    },
    buttons: [
      {
        extend: "excelHtml5",
        text: '<img src="https://img.icons8.com/dotty/43/000000/ms-excel.png"/> ',
        titleAttr: "Exportar a Excel",
        className: "btn btn-light",
      },
      {
        extend: "pdfHtml5",
        text: '<img src="https://img.icons8.com/wired/43/000000/pdf.png"/> ',
        titleAttr: "Exportar a PDF",
        className: "btn btn-light",
      },
      {
        extend: "print",
        text: '<img src="https://img.icons8.com/dotty/43/000000/print.png"/> ',
        titleAttr: "Imprimir",
        className: "btn btn-light",
      },
    ],
  });
});
