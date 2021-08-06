<!--https://getbootstrap.com/docs/5.0/components/modal/-->
<div class="modal fade" id="agregarPerro" tabindex="-1">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agrear un perro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="">
          <!--Codigo de tatuaje-->
          <div class="mb-3">
            <label for="tatuaje" class="form-label">Codigo de tatuaje</label>
            <input type="text" class="form-control" id="tatuaje" placeholder="AABB1122">
          </div>
          <!--Foto-->
          <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" id="foto">
          </div>
          <!--Apodo-->
          <div class="mb-3">
            <label for="apodo" class="form-label">Apodo</label>
            <input type="text" class="form-control" id="apodo" placeholder="Cliford">
          </div>
          <!--Raza-->
          <div class="mb-3">
            <label for="raza" class="form-label">Raza</label>
            <input type="text" class="form-control" id="raza" placeholder="Caniche">
          </div>
          <!--Castracion-->
          <div class="mb-3">
            <label for="castracion" class="form-label">Fecha de castrado</label>
            <input type="date" class="form-control" id="castracion">
          </div>
          <!--Adopcion-->
          <div class="mb-3">
            <label for="adopcion" class="form-label">Fecha de adopcion</label>
            <input type="date" class="form-control" id="adopcion">
          </div>
          <!--Observacion-->
          <div class="mb-3">
            <label for="observacion" class="form-label">Observacion</label>
            <textarea class="form-control" id="observacion" rows="3"></textarea>
          </div>
          <!--Propietario-->
          <div class="mb-3">
            <label for="propietario" class="form-label">Propietario</label>
            <select class="form-select">
              <option selected hidden>Seleccionar un propietario</option>
              <option value="1">Axel</option>
              <option value="2">Labarta</option>
              <option value="3">Ventos</option>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Agregar</button>
      </div>
    </div>
  </div>
</div>
