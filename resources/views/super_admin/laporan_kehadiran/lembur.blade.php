@extends('template_admin')
@section('konten2')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Data Laporan lembur Bulan Ini </h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered display" id="dataTerlambat" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>nama</th>
                        <th>Tanggal</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Lokasi</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>nama</th>
                        <th>Tanggal</th>
                        <th>Check In</th>
                        <th>Check Out</th>
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

<script>
    $(document).ready(function() {
        var table = $('#dataTerlambat').DataTable({
            processing: true,
            serverSide: false,
            ajax: {

                url: "{{ route('Data_kehadiran.getLembur') }}",
                error: function(xhr, error, thrown) {
                    alert('Something went wrong. Please try again.');
                }
            },
            columns: [
                {
                    data: 'nama',
                    name: 'nama',
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
    });
</script>
@endsection
