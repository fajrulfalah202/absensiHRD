<div class="modal fade" id="karyawan_masuk" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Presensi Masuk</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <form action="">
            @csrf
            @method('PUT')
            <label for="">lokasi kerja:</label>
            <input class="form-control" type="text" name="keterangan " id="" value="keterangan">
         </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">tidak</button>
          <button type="button" class="btn btn-primary">iya</button>
        </div>
      </div>
    </div>
  </div>
{{-- izin tidak hadir --}}
  <div class="modal fade" id="karyawan_tidak_masuk" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">izin tidak hadir</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="">
            @csrf
            @method('PUT')
            <label for=""> alasan izin: </label>
            
            <select class="form-control"  name="" id="" value="alasan izin" type="dropdown">
                <option value="sakit">sakit</option>
                <option value="izin">izin</option>
            </select>

            <label for="">keterangan:</label>
            <input class="form-control" type="text" name="keterangan " id="" value="keterangan">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">tidak</button>
          <button type="button" class="btn btn-primary">iya</button>
        </div>
      </div>
    </div>
  </div>