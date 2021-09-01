import { agregarRegistro } from "../../agregarRegistro.js";

let form = document.getElementById("formAgregarVacuna");

form.addEventListener("submit", function validateForm(event) {
  event.preventDefault();

  const nuevaVacuna = {
    nombreVacuna: $("#nombreVacuna").val(),
  };

  if (nuevaVacuna.nombreVacuna.length < 1) {
    return false;
  } else {
    const url = "/proyecto-perros/php/conexion/page_principal/agregacion/agregarVacuna.php"
    agregarRegistro(url, nuevaVacuna);
  }
});
