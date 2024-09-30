@extends('template_admin')

@section('konten')
    <div class="card-body">
        <!-- Form Edit -->
        <form method="POST" action="{{ route('SA.Data_kehadiran.update', $data->id) }}">
            @csrf
            @method('PUT')

            <!-- ID User -->
            <div class="mb-3">
                <label for="id_user">ID User</label>
                <select class="form-control" id="id_user" name="id_user" required>
                    @foreach($dataid as $k) <!-- Pastikan Anda mengirimkan dataKaryawan ke view -->
                        <option value="{{ $k->id_user }}" {{ $k->id_user == $data->id_user ? 'selected' : '' }}>
                            {{ $k->id_user }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Tanggal Lahir -->
            <div class="mb-3">
                <label for="tanggal">Tanggal </label>
                <input class="form-control" id="tanggal" name="tanggal" 
                    value="{{ old('tanggal', $data->tanggal ?? '') }}" type="date" required>
            </div>

            <!-- Check In -->
            <div class="mb-3">
                <label for="check_in">Check In</label>
                <input class="form-control" name="check_in" id="check_in" type="text"
                    value="{{ old('check_in', $data->check_in) }}" required>
            </div>

            <!-- Check Out -->
            <div class="mb-3">
                <label for="check_out">Check Out</label>
                <input class="form-control" name="check_out" id="check_out" type="text"
                    value="{{ old('check_out', $data->check_out) }}" required>
            </div>

            <!-- status -->
            <div class="mb-3">
                <label for="lokasi">status</label>
                <input class="form-control" name="status" id="status" type="text"
                    value="{{ old('status', $data->status) }}" required>
            </div>
            <div class="mb-3">
                <label for="lokasi">Lokasi</label>
                <input class="form-control" name="lokasi" id="lokasi" type="text"
                    value="{{ old('lokasi', $data->lokasi) }}" required>
            </div>

            <!-- Keterangan -->
            <div class="mb-3">
                <label for="keterangan">Keterangan</label>
                <input class="form-control" name="keterangan" id="keterangan" type="text"
                    value="{{ old('keterangan', $data->keterangan) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a  href="{{route('SA.Data_karyawan.index')}}" class="btn btn-warning">cancel</a>
        </form>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    </div>
@endsection
