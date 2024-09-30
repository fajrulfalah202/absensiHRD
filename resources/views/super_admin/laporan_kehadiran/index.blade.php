@extends('template_admin')
@section('konten')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Data Laporan Kehadiran Bulan Ini </h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered display" id="dataKehadiran" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Aksi</th>
                        <th>id user</th>
                        <th>Tanggal</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>status</th>
                        <th>Lokasi</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Aksi</th>
                        <th>id user</th>
                        <th>Tanggal</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>status</th>
                        <th>Lokasi</th>
                        <th>Keterangan</th>
                    </tr>
                </tfoot>
                <tbody>
                    {{-- Data akan diisi oleh DataTables secara otomatis --}}
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- modal hapius --}}
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
        $('#dataKehadiran').on('click', '.btn-delete', function() {
            var id = $(this).data('id');
            var actionUrl = '/SuperAdmin-LaporanKehadiran-dataKehadiran/' + id +'/destroy';
            
            // Set the form action URL
            deleteForm.attr('action', actionUrl);
        });
       
        
        var table = $('#dataKehadiran').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('Super.Data_kehadiran.getData') }}",
                error: function(xhr, error, thrown) {
                    alert('Something went wrong. Please try again.');
                }
            },
            columns: [
                {
                    data: null,
                   render: function(data, type, row) {
                    return (
                            '<a href="/SuperAdmin-LaporanKehadiran/' + row.id + '/edit" class="btn btn-sm btn-warning">Edit</a> ' +
                            '<button class="btn btn-sm btn-danger btn-delete" data-id="' + row.id + '" data-bs-toggle="modal" data-bs-target="#deleteModal">Hapus</button>'
                        );
                    },
                // /SuperAdmin-LaporanKehadiran-dataKehadiran/{id}/edit
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
                    data: 'tanggal',
                    name: 'tanggal',
                    orderable: true,
                    searchable: true,
                },
                {
                    data: 'check_in',
                    name: 'check_in',
                    orderable: true,
                    searchable: true,
                },
                {
                    data: 'check_out',
                    name: 'check_out',
                    orderable: true,
                    searchable: true,
                },
                {
                    data: 'status',
                    name: 'status',
                    orderable: true,
                    searchable: true,
                },
                {
                    data: 'lokasi',
                    name: 'lokasi',
                    orderable: true,
                    searchable: true,
                },
                {
                    data: 'keterangan',
                    name: 'keterangan',
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
            initComplete: function(settings, json) {
                // Fungsi ini bisa disesuaikan atau dihapus jika tidak digunakan
            }
        });
        // console.log('Table initialized:', table);
    });
</script>
@endsection
