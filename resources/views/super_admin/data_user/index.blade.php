@extends('template_admin')
@section('konten')
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tabel User</h1>
                    <p class="mb-4">Berikut berupa data user .</p>
                    <div class="card shadow mb-4">
                        <!-- Card Header - Accordion -->
                        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="collapseCardExample">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Karyawan</h6>
                        </a>
                        <!-- Card Content - Collapse -->
                        <div class="collapse " id="collapseCardExample" style="">

                            <div class="card-body">

                                <form method="POST" action="{{ route('SA.Data_User.tambah') }}">
                                    
                                    @csrf
                                    <div class="mb-3">
                                        <label for="id_user">ID User</label>
                                        <input class="form-control" name="id_user" id="id_user" type="text"
                                        placeholder="Masukkan id user" required>
                                    </div>
                        
                                    <!-- Nama -->
                                    <div class="mb-3">
                                        <label for="nama">username</label>
                                        <input class="form-control" name="username" id="username" type="text"
                                            placeholder="Masukkan Nama" required>
                                    </div>

                                    <!-- NIK -->
                                    <div class="mb-3">
                                        <label for="nik">password</label>
                                        <input class="form-control" name="password" id="password" type="teks"
                                            placeholder="Masukkan password" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nik">role</label>
                                        <input class="form-control" name="role" id="role" type="teks"
                                            placeholder="Masukkan password" required>
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
                            <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="datauser" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Aksi</th>
                                            <th>id user</th>
                                            <th>username</th>
                                            <th>role</th>
                                           
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Aksi</th>
                                            <th>id user</th>
                                            <th>username</th>
                                            <th>role</th>
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
                            $('#datauser').on('click', '.btn-delete', function() {
                                var id = $(this).data('id');
                                var actionUrl = '/SuperAdmin-DataUser/' + id +'/destroy';
                                
                                // Set the form action URL
                                deleteForm.attr('action', actionUrl);
                            });
                            });
                            var table = $('#datauser').DataTable({
                                processing: true,
                                serverSide: true,
                                
                                ajax: {
                                    url: "{{ route('SA.Data_User.getData') }}",
                                    error: function(xhr, error, thrown) {
                                        console.error("AJAX Error: ", xhr, error, thrown);
                                        alert('Something went wrong. Please try again.');
                                    }
                                },
                                columns: [
                                    {
                                        data: null,
                                       render: function(data, type, row) {
                                        return ( '<a href="/SuperAdmin-DataUser/' + row.id + '/edit" class="btn btn-sm btn-warning">Edit</a> ' +
                                                 '<button class="btn btn-sm btn-danger btn-delete" data-id="' + row.id + '" data-bs-toggle="modal" data-bs-target="#deleteModal">Hapus</button>');
                                    },
                                    orderable: false,
                                    searchable: false,
                                    },
                                    {
                                        data: 'id_user',
                                        name: 'id_user',
                                        orderable: true,
                                        searchable: true,
                                    },
                                   
                                    {
                                        data: 'username',
                                        name: 'username',
                                        orderable: true,
                                        searchable: true,
                                    },
                                    {
                                        data: 'role',
                                        name: 'role',
                                        orderable: true,
                                        searchable: true,
                                    },
                                    
                                   
                                    
                                   
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