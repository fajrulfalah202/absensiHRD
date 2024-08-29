@extends('layouts.app')

@section('title', 'Halaman Login | Bansos Management App')

@section('content')
    <div class="centerPage">
        <div class="container outer-container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-12 col-md-9">
                    <div class="card o-hidden border-0 shadow-lg my-5 inner-container">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <img src="{{ asset('img/Lambang_Kabupaten_Gresik.png') }}" alt="Logo"
                                                style="width: 100px; height: auto;">
                                            <h1 class="h4 text-gray-900 my-4">Selamat Datang</h1>
                                        </div>
                                        <form class="user" method="POST" action="{{ route('register') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name">Nama</label>
                                                <input type="text" class="form-control form-control-user"
                                                    id="name" name="name" placeholder="Nama" value="{{ old('name') }}" required autofocus autocomplete="name">
                                                @error('name')
                                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control form-control-user"
                                                    id="email" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">
                                                @error('email')
                                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            

                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control form-control-user" id="password"
                                                    name="password" placeholder="Password" required
                                                    autocomplete="new-password">
                                                @error('password')
                                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="password_confirmation">Konfirmasi Password</label>

                                                <input type="password" class="form-control form-control-user"
                                                    id="password_confirmation" name="password_confirmation"
                                                    placeholder="Konfirmasi Password" required autocomplete="new-password">
                                                @error('password_confirmation')
                                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                Daftar
                                            </button>
                                        </form>
                                        <hr>

                                        <div class="text-center">
                                            <a class="small" href="{{ route('login') }}">Sudah Punya Akun?</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
