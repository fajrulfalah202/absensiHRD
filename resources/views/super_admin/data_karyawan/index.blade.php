@extends('template_admin')
@section('konten')
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tabel Karyawan</h1>
                    <p class="mb-4">Berikut berupa data karyawan .</p>
                    <div class="card shadow mb-4">
                        <!-- Card Header - Accordion -->
                        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="collapseCardExample">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Karyawan</h6>
                        </a>
                        <!-- Card Content - Collapse -->
                        <div class="collapse " id="collapseCardExample" style="">

                            <div class="card-body">

                                <form method="POST" action="{{ route('Super.Data_karyawan.tambah') }}">
                                    
                                    @csrf
                                    <div class="mb-3">
                                        <label for="id_user">ID User</label>
                                        <select class="form-control" id="id_user" name="id_user" required>
                                            @foreach($dataUser as $k) <!-- Pastikan Anda mengirimkan dataKaryawan ke view -->
                                                <option value="{{ $k->id_user }}">
                                                    {{ $k->id_user }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                        
                                    <!-- Nama -->
                                    <div class="mb-3">
                                        <label for="nama">Nama</label>
                                        <input class="form-control" name="nama" id="nama" type="text"
                                            placeholder="Masukkan Nama" required>
                                    </div>

                                    <!-- NIK -->
                                    <div class="mb-3">
                                        <label for="nik">NIK</label>
                                        <input class="form-control" name="nik" id="nik" type="teks"
                                            placeholder="Masukkan NIK" required>
                                    </div>

                                    <!-- Jenis Kelamin -->
                                    <div class="mb-3">
                                        <label for="gender">Jenis Kelamin</label>
                                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                            <option value="1">Laki-laki</option>
                                            <option value="0">Perempuan</option>
                                        </select>
                                    </div>

                                    <!-- Tempat Lahir -->
                                    <div class="mb-3">
                                        <label for="tempat_lahir">Tempat Lahir</label>
                                        <input class="form-control" name="tempat_lahir" id="tempat_lahir" type="text"
                                            placeholder="Masukkan tempat lahir" required>
                                    </div>

                                    <!-- Tanggal Lahir -->
                                    <div class="mb-3">
                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                        <input class="form-control" id="tanggal_lahir" name="tanggal_lahir" type="date" required>
                                    </div>

                                    <!-- Alamat -->
                                    <div class="mb-3">
                                        <label for="alamat">Alamat</label>
                                        <textarea class="form-control" id="alamat" name="alamat" rows="3"
                                            placeholder="Masukkan Alamat" required></textarea>
                                    </div>
                                    
                                    <!-- Perusahaan -->
                                    <div class="mb-3">
                                        <label for="perusahaan">Perusahaan</label>
                                        <select class="form-control" id="perusahaan" name="perusahaan" required>
                                            <option value="1" >PT. Virtusee Peta Sukses</option>
                                            <option value="2" >⁠PT. Inosoft Trans Sistem</option>
                                            <option value="3" >⁠PT. Sistem Sekolah Sukses</option>
                                        </select>
                                    </div>

                                    <!-- Posisi -->
                                    <div class="mb-3">
                                        <label for="posisi">Posisi</label>
                                        <textarea class="form-control" id="posisi" name="posisi" rows="3"
                                            placeholder="Masukkan posisi pekerjaan" required></textarea>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>


                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <!--<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">-->
                    <!--    <div class="modal-dialog" role="document">-->
                    <!--        <div class="modal-content">-->
                    <!--            <div class="modal-header">-->
                    <!--                <h5 class="modal-title" id="editModal">Edit Data Pendudukl</h5>-->
                    <!--                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>-->
                    <!--            </div>-->
                    <!--            <div class="modal-body">...</div>-->
                    <!--            <div class="modal-footer"><button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Tutup</button><button class="btn btn-primary" type="button">Save changes</button></div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->


                    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>


{{-- @include('penduduk.modaledit')
@include('penduduk.modaldelete') --}}

{{-- @include('super_admin.data_karyawan.modal') --}}
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Karyawan</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataKaryawan" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Aksi</th>
                                            <th>Nama</th>
                                            <th>id user</th>
                                            <th>NIK</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Alamat</th>
                                            <th>Perusahaan</th>
                                            <th>Posisi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Aksi</th>
                                            <th>Nama</th>
                                            <th>id user</th>
                                            <th>NIK</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Alamat</th>
                                            <th>Perusahaan</th>
                                            <th>Posisi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        {{-- @foreach ($penerima as $atribut) --}}
                                        <tr>
                                            <td></td>
                                            
                                        </tr>
                                        {{-- @endforeach --}}
                                    </tbody>
                                </table>
                                
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Default Bootstrap Modal
                                                </h5>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">...</div>
                                            <div class="modal-footer"><button class="btn btn-secondary" type="button"
                                                    data-bs-dismiss="modal">Close</button><button
                                                    class="btn btn-primary" type="button">Save changes</button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Konfirmasi Hapus -->
                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah Anda yakin ingin menghapus data ini?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <form id="deleteForm" method="POST" action="" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function() {
                            var deleteForm = $('#deleteForm');

                            // Handle click event for delete button
                            $('#dataKaryawan').on('click', '.btn-delete', function() {
                                var id = $(this).data('id');
                                var actionUrl = '/SuperAdmin-DataKaryawan/' + id +'/destroy';
                                
                                // Set the form action URL
                                deleteForm.attr('action', actionUrl);
                            });
                            });
                            var table = $('#dataKaryawan').DataTable({
                                processing: true,
                                serverSide: false,
                                
                                ajax: {
                                    url: "{{ route('Super.Data_karyawan.getData') }}",
                                     dataSrc: 'data',
                                    error: function(xhr, error, thrown) {
                                        alert('Something went wrong. Please try again.');
                                    }
                                },
                                columns: [
                                    {
                                        data: null,
                                       render: function(data, type, row) {
                                        return ( '<a href="/SuperAdmin-DataKaryawan/' + row.id + '/edit" class="btn btn-sm btn-warning">Edit</a> ' +
                                                 '<button class="btn btn-sm btn-danger btn-delete" data-id="' + row.id + '" data-bs-toggle="modal" data-bs-target="#deleteModal">Hapus</button>');
                                    },
                                    orderable: false,
                                    searchable: false,
                                    },
                                    {
                                        data: 'nama',
                                        name: 'nama',
                                        orderable: true,
                                        searchable: true,
                                    },
                                   
                                    {
                                        data: 'id_user',
                                        name: 'id_user',
                                        orderable: true,
                                        searchable: true,
                                    },
                                    {
                                        data: 'nik',
                                        name: 'nik',
                                        orderable: true,
                                        searchable: true,
                                    },
                                    {
                                        data: 'jenis_kelamin.nama_kelamin',
                                        name: 'jenis_kelamin',
                                        orderable: true,
                                        searchable: true,
                                    
                                    },
                                    {
                                        data: 'tempat_lahir',
                                        name: 'tempat_lahir',
                                        orderable: true,
                                        searchable: true,
                                    },
                                    {
                                        data: 'tanggal_lahir',
                                        name: 'tanggal_lahir',
                                        orderable: true,
                                        searchable: true,
                                    },
                                    {
                                        data: 'alamat',
                                        name: 'alamat',
                                        orderable: true,
                                        searchable: true,
                                    },
                                    {
                                        data: 'perusahaan.nama_perusahaan',
                                        name: 'perusahaan',
                                        orderable: true,
                                        searchable: true,
                                        
                                    },
                                    {
                                        data: 'posisi',
                                        name: 'posisi',
                                        orderable: true,
                                        searchable: true,
                                    }
                                ],
                                order: [
                                    [1, 'asc']
                                ],
                                searching: true,
                                paging: true,
                                lengthMenu: [10, 25, 50, 100],
                                pageLength: 10,
                                responsive: true,
                                autoWidth: true,
                                // initComplete: function(settings, json) {
                                //     // Fungsi ini bisa disesuaikan atau dihapus jika tidak digunakan
                                // }
                            });
                        
                    </script>
@endsection




