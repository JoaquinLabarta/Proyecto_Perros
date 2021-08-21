var form = document.getElementById("formAgregarUsuario");

form.addEventListener("submit", function validateForm(event) {
  event.preventDefault();

  const nuevoUsuario = {
    usuario: $("#usuario").val(),
    nombre: $("#nombreUsuario").val(),
    apellido: $("#apellidoUsuario").val(),
    nacimiento: $("#nacimientoUsuario").val(),
    email: $("#emailUsuario").val(),
    clave: $("#claveUsuario").val(),
  };

  const validatePassword = (password) => {
    if (password.length < 8) {
      throw new Error("CLAVE_ERR: muy_corta");
    } else if (password.search(/\d/) == -1) {
      throw new Error("CLAVE_ERR: faltan_numeros");
    } else if (password.search(/[a-zA-Z]/) == -1) {
      throw new Error("CLAVE_ERR: faltan_letras");
    } else {
      return true;
    }
  }

  if (nuevoUsuario.usuario.length < 1) {
    return false;
  } else if (nuevoUsuario.nombre.length < 1) {
    return false;
  } else if (nuevoUsuario.apellido.length < 1) {
    return false;
  } else if (nuevoUsuario.nacimiento.length < 1) {
    return false;
  } else if (nuevoUsuario.email.length < 1) {
    return false;
  } else if (!validatePassword(nuevoUsuario.clave)) {
    const inputClave = document.getElementById("clave");
    inputClave.style.backgroundImage = `url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e")`;
    return false;
  } else {
    // Caso los datos hayan pasado la validacion con exito
    const url = "/proyecto-perros/php/conexion/page_usuarios/agregarUsuario.php"
    $.ajax({
      type: "POST",
      url: url, 
      data: nuevoUsuario, 
      success: () => location.reload(),
      error: () => console.log("Hubo un error al intentar crear un usuario. Por favor intente recargar la pagina.")
    });

    return true;
  }

});
