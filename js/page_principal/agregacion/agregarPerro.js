import { agregarRegistro } from "../../agregarRegistro.js";

var form = document.getElementById("formAgregarPerro");

form.addEventListener("submit", function validateForm(event) {
  event.preventDefault();

  const nuevoPerro = {
    tatooId: $("#tatooId").val(),
    //fotoUrl: $("#fotoUrl").val(),
    apodo: $("#apodo").val(),
    raza: $("#raza").val(),
    castracion: $("#castracion").val(),
    adopcion: $("#adopcion").val(),
    observacion: $("#observacion").val(),
    propietarioId: $("propietarioPerro").val(),
  };

  if (nuevoPerro.tatooId.length < 1 || nuevoPerro.apodo.length < 1) {
    return false;
  } else {
    const url = "/proyecto-perros/php/conexion/page_principal/agregacion/agregarPerro.php"
    agregarRegistro(url, nuevoPerro);
  }
});
