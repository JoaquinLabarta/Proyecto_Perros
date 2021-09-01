import { agregarRegistro } from "../../agregarRegistro.js";

var form = document.getElementById("formAgregarPerro");

form.addEventListener("submit", function validateForm(event) {
  event.preventDefault();

  const castracion = $("#castracion").val();
  const propietarioId = document.getElementById("propietarioId").value;

  const nuevoPerro = {
    castracion,
    propietarioId,
    tatooId: $("#tatooId").val(),
    apodo: $("#apodo").val(),
    raza: $("#raza").val(),
    adopcion: $("#adopcion").val(),
    observacion: $("#observacion").val(),
  };

  if (nuevoPerro.tatooId.length < 1 || nuevoPerro.apodo.length < 1 || nuevoPerro.adopcion.length < 1) {
    return false;
  } else {
    const url = "/proyecto-perros/php/conexion/page_principal/agregacion/agregarPerro.php";
    agregarRegistro(url, nuevoPerro);
  }
});
