@extends('template_admin')
@section('konten2')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Data Laporan Kehadiran Bulan Ini </h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered display" id="dataTable2" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Lokasi</th>
                        <th>Keterangan</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                      
                    </tr>
                </tfoot>
                <tbody>
                    {{-- @foreach ($penerima as $atribut) --}}
                    <tr>
                      
                        <td>sa</td>
                        <td>sa</td>
                        <td>sa</td>
                        <td>sa</td>
                        <td>sa</td>
                    </tr>
                    {{-- @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection