$(document).ready(function() {
    var table = $("#perros").DataTable({
      processing: true,
      dom: '<"top"i>rt<"bottom"><"clear">',
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
      }
    });
  
    function search() {
      table.search($("#inputBuscarPerro").val()).draw();
    }
  
    $("#inputBuscarPerro").keyup(() => search());
  
    
  });
  