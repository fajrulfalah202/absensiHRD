<!-- Modal Presensi Masuk -->
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
              <form action="{{ route('SA.presensi.masuk') }}" method="POST">
                  @csrf
                  <label for="keterangan">Lokasi Kerja:</label>
                  <input class="form-control" type="text" name="lokasi" id="lokasi" value="">
                  <label for="keterangan">keterangan:</label>
                  <input class="form-control" type="text" name="keterangan" id="keterangan" value="">

                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                      <button type="submit" class="btn btn-primary">Iya</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>

<!-- Modal Izin Tidak Hadir -->
<div class="modal fade" id="karyawan_tidak_masuk" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Izin Tidak Hadir</h5>
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form action="{{ route('SA.presensi.izin') }}" method="POST">
                  @csrf
                  <label for="alasan">Alasan Izin:</label>
                  <select class="form-control" name="status" id="status">
                      <option value="sakit">Sakit</option>
                      <option value="izin">Izin</option>
                  </select>

                  <label for="keterangan">Keterangan:</label>
                  <input class="form-control" type="text" name="keterangan" id="keterangan" value="">

                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                      <button type="submit" class="btn btn-primary">Iya</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>
<div class="modal fade" id="karyawan_keluar" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Presensi Keluar</h5>
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form action="{{ route('SA.presensi.keluar') }}" method="POST">
                  @csrf
                  @method('POST')
                 
                  <button type="submit" class="btn btn-primary mt-3">Kirim</button>
                  <button type="button" class="btn btn-secondary  mt-3" data-bs-dismiss="modal">Tutup</button>
          </div>
              </form>
          </div>
          <div class="modal-footer">
              
      </div>
  </div>
</div>
