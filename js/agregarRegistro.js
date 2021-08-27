/**
 * Agrega un registro a la base de datos.
 * @param {string} url
 * @param {Object} nuevoRegistro
 * @author briones-gabriel
 */
export function agregarRegistro(url, nuevoRegistro) {
  $.ajax({
    type: "POST",
    url: url,
    data: nuevoRegistro,
    success: () => location.reload(),
    error: (xhr, ajaxOptions, thrownError) => alert(xhr.responseText)
  });
}
