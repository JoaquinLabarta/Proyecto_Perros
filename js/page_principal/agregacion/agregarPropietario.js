import { agregarRegistro } from "../../agregarRegistro.js";

var form = document.getElementById("formAgregarPropietario");

form.addEventListener("submit", function validateForm(event) {
  event.preventDefault();

  const nuevoPropietario = {
    dni: $("#dni").val(),
    nombre: $("#nombrePropietario").val(),
    apellido: $("#apellidoPropietario").val(),
    email: $("#emailPropietario").val(),
    telefono: $("#telefono").val(),
    direccion: $("#direccion").val(),
  };

  if (nuevoPropietario.dni.length < 1
    || nuevoPropietario.nombre.length < 1
    || nuevoPropietario.apellido.length < 1) {
    return false;
  } else {
    const url = "/proyecto-perros/php/conexion/page_principal/agregacion/agregarPropietario.php"
    agregarRegistro(url, nuevoPropietario);
  }
});
