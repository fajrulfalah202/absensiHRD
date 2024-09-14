@extends('template_admin')

@section('konten2')
    <div class="card-body">
        <form action="{{ route('SA.Data_karyawan.update', $data->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- ID User -->
            <div class="mb-3">
                <label for="id_user">ID User</label>
                <select class="form-control" id="id_user" name="id_user" required>
                    @foreach($dataid as $k) 
                        <option value="{{ $k->id_user }}" {{ $k->id_user == $data->id_user ? 'selected' : '' }}>
                            {{ $k->id_user }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Nama -->
            <div class="mb-3">
                <label for="nama">Nama</label>
                <input class="form-control" name="nama" id="nama" value="{{ old('nama', $data->nama) }}" type="text" placeholder="Masukkan Nama" required>
            </div>

            <!-- NIK -->
            <div class="mb-3">
                <label for="nik">NIK</label>
                <input class="form-control" name="nik" id="nik" type="text" placeholder="Masukkan NIK" value="{{ old('nik', $data->nik) }}" required>
            </div>

            <!-- Jenis Kelamin -->
            <div class="mb-3">
                <label for="gender">Jenis Kelamin</label>
                <select class="form-control" id="gender" name="jenis_kelamin" required>
                    <option value="1" {{ $data->jenis_kelamin == 1 ? 'selected' : '' }}>Laki-laki</option>
                    <option value="2" {{ $data->jenis_kelamin == 2 ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <!-- Tempat Lahir -->
            <div class="mb-3">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input class="form-control" name="tempat_lahir" id="tempat_lahir" type="text" placeholder="Masukkan tempat lahir" value="{{ old('tempat_lahir', $data->tempat_lahir) }}" required>
            </div>

            <!-- Tanggal Lahir -->
            <div class="mb-3">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $data->tanggal_lahir) }}" type="date" required>
            </div>

            <!-- Alamat -->
            <div class="mb-3">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan Alamat" required>{{ old('alamat', $data->alamat) }}</textarea>
            </div>
            
            <!-- Perusahaan -->
            <div class="mb-3">
                <label for="perusahaan">Perusahaan</label>
                <select class="form-control" id="perusahaan" name="perusahaan" required>
                    <option value="1" {{ $data->perusahaan == 1 ? 'selected' : '' }}>PT. Virtusee Peta Sukses</option>
                    <option value="2" {{ $data->perusahaan == 2 ? 'selected' : '' }}>⁠PT. Inosoft Trans Sistem</option>
                    <option value="3" {{ $data->perusahaan == 3 ? 'selected' : '' }}>⁠PT. Sistem Sekolah Sukses</option>
                </select>
            </div>

            <!-- Posisi -->
            <div class="mb-3">
                <label for="posisi">Posisi</label>
                <textarea class="form-control" id="posisi" name="posisi" rows="3" placeholder="Masukkan posisi pekerjaan" required>{{ old('posisi', $data->posisi) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    </div>
@endsection
