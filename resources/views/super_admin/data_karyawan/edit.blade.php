@extends('template_admin')
@section('konten2')
    <div class="card-body">

        <form   method="POST">
            @csrf
            @method('PUT')
            <!-- Nama -->
            <div class="mb-3">
                <label for="nama">Nama</label>
                <input class="form-control" name="nama" id="nama" value="{{ $data->nama }}" type="text"
                    placeholder="Masukkan Nama" required>
            </div>

            <!-- NIK -->
            <div class="mb-3">
                <label for="nik">NIK</label>
                <input class="form-control" name="NIK" id="NIK" type="teks"
                    placeholder="Masukkan NIK" value="{{ $data->nik }}" required>
            </div>

            <!-- Jenis Kelamin -->
            <div class="mb-3">
                <label for="gender" value="{{ $data->jenis_kelamin }}">Jenis Kelamin</label>
                <select class="form-control" id="gender" name="gender" required>
                    <option value="1">Laki-laki</option>
                    <option value="0">Perempuan</option>
                </select>
            </div>

            <!-- Tempat Lahir -->
            <div class="mb-3">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input class="form-control" name="tempat_lahir" id="tempat_lahir" type="text"
                    placeholder="Masukkan tempat lahir" value="{{ $data->tempat_lahir }}"required>
            </div>

            <!-- Tanggal Lahir -->
            <div class="mb-3">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $data->tanggal_lahir }}" type="date" required>
            </div>

            <!-- Alamat -->
            <div class="mb-3">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3"
                    placeholder="Masukkan Alamat" value="{{ $data->alamat }}" required></textarea>
            </div>
            
            <!-- Perusahaan -->
            <div class="mb-3">
                <label for="perusahaan" value="{{ $data->perusahaan }}">Perusahaan</label>
                <select class="form-control" id="perusahaan" name="perusahaan"  required>
                    <option value="0" {{ $data->perusahaan == 0 ? 'selected' : '' }}>Perusahaan 1</option>
                    <option value="1" {{ $data->perusahaan == 1 ? 'selected' : '' }}>Perusahaan 2</option>
                    <option value="2" {{ $data->perusahaan == 2 ? 'selected' : '' }}>Perusahaan 3</option>
                </select>
            </div>

            <!-- Posisi -->
            <div class="mb-3">
                <label for="posisi">Posisi</label>
                <textarea class="form-control" id="posisi_pekerjaan" value="{{ $data->posisi }}"name="posisi_pekerjaan" rows="3"
                    placeholder="Masukkan posisi pekerjaan" required>{{ $data->posisi }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script> --}}
    </div>
        
@endsection


