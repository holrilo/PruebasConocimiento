<div class="card col-md-5">
    <div class="card-header">
        {{ $accion }} Nueva Tarea
    </div>
    <div class="card-body">
        <h4 class="card-title"></h4>
        <div class="form-group">
            <label for="txtTarea">Tarea</label>
            <input type="text" required name="txtTarea" id="txtTarea" class="form-control" placeholder="Nombre de la tarea" aria-describedby="helpId" value="{{ isset($tarea->nombre_tariea)?$tarea->nombre_tariea: old('txtTarea') }}">
          </div>
          <div class="form-group">
              <label for="txtDesc">Descripcion</label>
              <input type="text" required name="txtDesc" id="txtDesc" class="form-control" placeholder="Descripcion Corta" aria-describedby="helpId" value="{{ isset($tarea->nombre_tariea)?$tarea->descripcion_tarea: old('txtDesc') }}">
            </div>
            <div class="form-group">
              <label for="txtFecha">Fecha</label>
              <input type="text" name="txtFecha" id="txtFecha" class="form-control" placeholder="" aria-describedby="helpId" value="{{ isset($tarea->nombre_tariea)?$tarea->fecha_creacion: old('txtFecha') }}">
            </div>
            <div class="form-group">
              <label for="txtEstado">Estado</label>
              {{-- <input type="text" name="txtEstado" id="txtEstado" class="form-control" placeholder="" aria-describedby="helpId"> --}}
                  <select class="form-control" name="txtEstado" id="txtEstado" >
                    <option selected required value="{{ isset($tarea->nombre_tariea)?$tarea->estado_tarea: '' }}">{{ isset($tarea->nombre_tariea)?$tarea->estado_tarea: 'Seleccione' }}</option>
                    <option value="si">Si</option>
                    <option value="no">No</option>
                  </select>
            </div>
            <div class="form-group">
              <label for="txtFechaV">Fecha Vencimiento</label>
              <input type="text" required name="txtFechaV" id="txtFechaV" class="form-control" placeholder="" aria-describedby="helpId" value="{{ isset($tarea->nombre_tariea)?$tarea->fecha_vencimiento: old('txtFechaV') }}">
            </div>
    </div>
    <div class="card-footer text-muted">
        <input type="submit" class="btn btn-success" value="{{ $accion }}">
        <a href="{{ url('tarea/') }}" class="btn btn-primary" >Regresar</a>
    </div>
</div>
