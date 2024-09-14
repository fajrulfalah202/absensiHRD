@extends('template_admin')

@section('konten2')
    <div class="card-body">
        <form action="{{ route('SA.Data_User.update', $data->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- ID User -->
            <div class="mb-3">
                <label for="id_user">ID User</label>
                <input class="form-control" name="id_user" id="id_user" value="{{ old('id_user', $data->id_user) }}" type="text" placeholder="Masukkan id user" required>
            </div>

            <!-- Username -->
            <div class="mb-3">
                <label for="username">Username</label>
                <input class="form-control" name="username" id="username" value="{{ old('username', $data->username) }}" type="text" placeholder="Masukkan username" required>
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password">Password Baru (opsional)</label>
                <input class="form-control" name="password" id="password" type="password" placeholder="Masukkan password baru">
            </div>

            <!-- Role -->
            <div class="mb-3">
                <label for="role">Role</label>
                <input class="form-control" name="role" id="role" value="{{ old('role', $data->role) }}" type="text" placeholder="Masukkan role" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    </div>
@endsection
