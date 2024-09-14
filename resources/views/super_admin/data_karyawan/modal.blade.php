 <!-- Modal delete-->
 <div class="modal fade" id="confirmDeleteModal" tabindex="-1"
 aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
 <div class="modal-dialog">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Penghapusan</h5>
             <button type="button" class="btn-close" data-bs-dismiss="modal" 
                 aria-label="Close"></button>
         </div>
         <div class="modal-body">
             <p>Apakah Anda yakin ingin menghapus:</p>
             <p>NIK: <span id="deleteNIK"></span></p> 
             <p>Nomer KK: <span id="deleteNoKK"></span></p>
             <p>Nama: <span id="deleteNama"></span></p>
             <p>Status Hubungan Dalam Keluarga: <span id="deleteSHDK"></span></p>
             <p>Jenis Kelamin: <span id="deleteJenisKelamin"></span></p>
             <p>Tempat dan Tanggal Lahir: <span id="deleteTTL"></span></p>
             <p>Alamat: <span id="deleteAlamat"></span></p>
             <p>RT: <span id="deleteNoRT"></span></p>
             <p>Rw: <span id="deleteNoRW"></span></p>
             
         </div>
         <div class="modal-footer">
             <button type="button" class="btn btn-secondary"
                 data-bs-dismiss="modal">Batal</button>
             <form id="confirmDeleteForm" method="POST" action="">
                 @csrf
                 @method('DELETE')
                 <button type="submit" class="btn btn-danger">Hapus</button>
             </form>
         </div>
     </div>
 </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
 var confirmDeleteModal = document.getElementById('confirmDeleteModal');
 confirmDeleteModal.addEventListener('show.bs.modal', function(event) {
     var button = event.relatedTarget;
     var id = button.getAttribute('data-id');
     var nik = button.getAttribute('data-nik');
     var no_KK = button.getAttribute('data-no_KK');
     var nama = button.getAttribute('data-nama');
     var jenisKelamin = button.getAttribute('data-jenis_kelamin');
     var no_rt = button.getAttribute('data-no_RT');
     var no_rw = button.getAttribute('data-no_RW');
     var SHDK = button.getAttribute('data-SHDK');
     var ttl = button.getAttribute('data-ttl');
     var alamat = button.getAttribute('data-alamat');


                            

     var modal = confirmDeleteModal;
     modal.querySelector('#deleteNIK').textContent = nik;
     modal.querySelector('#deleteNoKK').textContent = no_KK;
     modal.querySelector('#deleteNama').textContent = nama;
     modal.querySelector('#deleteJenisKelamin').textContent = jenisKelamin;
     modal.querySelector('#deleteNoRT').textContent = no_rt;
     modal.querySelector('#deleteNoRW').textContent = no_rw;
     modal.querySelector('#deleteSHDK').textContent = SHDK;
     modal.querySelector('#deleteTTL').textContent = ttl;
     modal.querySelector('#deleteAlamat').textContent = alamat;

     var form = document.getElementById('confirmDeleteForm');
     form.action = 'hapus-penduduk/' + id;;
 });
});
</script>





<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
 aria-hidden="true">
 <div class="modal-dialog">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
             <button type="button" class="btn-close" data-bs-dismiss="modal"
                 aria-label="Tutup"></button>
         </div>
         <div class="modal-body">
             <form id="editForm" method="POST">
                 @csrf
                 @method('PUT')
                 <input type="hidden" id="editId" name="id">
                 <div class="mb-3">
                     <label for="editNIK" class="form-label">NIK</label>
                     <input type="text" class="form-control" id="editNIK" name="NIK" required>
                 </div>
                 <!-- nomer kk -->
                 <div class="mb-3">
                     <label for="nik">nomor kartu keluarga</label>
                     <input class="form-control" name="no_kk" id="editNoKK" type="teks"
                         required >
                 </div>
                 <div class="mb-3">
                     <label for="editNama" class="form-label">Nama</label>
                     <input type="text" class="form-control" id="editNama" name="nama" required>
                 </div>
                 
                 <!-- SHKD -->
                 <div class="mb-3">
                     <label for="nama">Status Hubungan Dalam Keluarga</label>
                     <input class="form-control" name="SHDK" id="editSHDK" type="text">
                 </div>
                 
                 <div class="mb-3">
                     <label for="editGender" class="form-label">Jenis Kelamin</label>
                     <select class="form-control" id="editGender" name="gender" required>
                         <option value="1">Laki-laki</option>
                         <option value="0">Perempuan</option>
                     </select>
                 </div>
                 
                  <!-- nomer rt -->
                 <div class="mb-3">
                     <label for="editNoRT">nomor rt</label>
                     <input class="form-control" name="no_rt" id="editNoRT" type="text">
                 </div>
                 
                 <!-- nomer rw -->
                 <div class="mb-3">
                     <label for="editNoRW">nomor rw</label>
                     <input class="form-control" name="no_rw" id="editNoRW" type="text">
                 </div>
                 <div class="mb-3">
                     <label for="editTempatLahir" class="form-label">Tempat Lahir</label>
                     <input type="text" class="form-control" id="editTempatLahir"
                         name="tempat_lahir" required>
                 </div>
                 <div class="mb-3">
                     <label for="editTanggalLahir" class="form-label">Tanggal Lahir</label>
                     <input type="date" class="form-control" id="editTanggalLahir"
                         name="tanggal_lahir" required>
                 </div>
                 <div class="mb-3">
                     <label for="editAlamat" class="form-label">Alamat</label>
                     <textarea class="form-control" id="editAlamat" name="alamat" rows="3"
                         required></textarea>
                 </div>
                 
                 <div class="mb-3">
                     <label for="editKepalaKeluarga" class="form-label">nama kepala keluarga</label>
                    <input type="text" class="form-control" id="editKepalaKeluarga" name="nama_kepala_keluarga" 
                         required>
                 </div>
                 
                 <div class="mb-3">
                     <label for="editjumlahAnggotaKeluarga" class="form-label">jumlah anggota keluarga</label>
                     <input class="form-control" id="editjumlahAnggotaKeluarga" name="jumlah_anggota_keluarga" type="text"
                         required></input>
                 </div>
                 
                 <div class="mb-3">
                     <label for="editjenisPekerjaan" class="form-label">jenis pekerjaan</label>
                     <input class="form-control" id="editJenisPekerjaan" name="jenis_pekerjaan" type="text"
                         required></input>
                 </div>
                 
                 <div class="mb-3">
                     <label for="editPendapatanBulanan" class="form-label">pendapatan Bulanan</label>
                     <input class="form-control" id="editPendapatanBulanan" name="pendapatan_bulanan" type="text"
                         required></input>
                 </div>
                 
                 <div class="mb-3">
                     <label for="editGolonganBantuan" class="form-label">golongan bantuan</label>
                     <input class="form-control" id="editGolonganBantuan" name="golongan_bantuan" type="text"
                         required></input>
                 </div>
                 
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                         id="cancelButton">Batal</button>
                     <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
</div>


                 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
{{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script> --}}

<script>
function editData(id, NIK,no_kk, nama, no_rt, no_rw, gender,SHDK, tempat_lahir, tanggal_lahir, alamat, nama_kepala_keluarga, jumlah_anggota_keluarga, jenis_pekerjaan, pendapatan_bulanan, golongan_bantuan) {
//   console.log(jumlah_anggota_keluarga); 
 document.getElementById('editId').value = id;
 document.getElementById('editNIK').value = NIK;
 document.getElementById('editNoKK').value = no_kk;
 document.getElementById('editNama').value = nama;
 document.getElementById('editNoRT').value = no_rt;
 document.getElementById('editNoRW').value = no_rw;
 document.getElementById('editGender').value = gender;
 document.getElementById('editSHDK').value = SHDK; 
 document.getElementById('editTempatLahir').value = tempat_lahir;
 document.getElementById('editTanggalLahir').value = tanggal_lahir;
 document.getElementById('editAlamat').value = alamat;
 document.getElementById('editKepalaKeluarga').value = nama_kepala_keluarga;
 document.getElementById('editjumlahAnggotaKeluarga').value = jumlah_anggota_keluarga;
 document.getElementById('editJenisPekerjaan').value = jenis_pekerjaan;
 document.getElementById('editPendapatanBulanan').value = pendapatan_bulanan;
 document.getElementById('editGolonganBantuan').value = golongan_bantuan;


 // Update action URL of the form
 document.getElementById('editForm').action = `update-penduduk/${id}`;
}

// Pastikan latar belakang modal dihapus saat modal disembunyikan
document.getElementById('editModal').addEventListener('hidden.bs.modal', function() {
 document.body.classList.remove('modal-open');
 const modalBackdrops = document.querySelectorAll('.modal-backdrop');
 modalBackdrops.forEach(backdrop => backdrop.remove());
});

// Tambahkan event listener untuk tombol Batal
document.getElementById('cancelButton').addEventListener('click', function() {
 const editModal = bootstrap.Modal.getInstance(document.getElementById('editModal'));
 editModal.hide();
});
</script> 