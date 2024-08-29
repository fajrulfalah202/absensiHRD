@extends('layouts.app')

@section('title', 'Halaman Lupa Password | Bansos Management App')

@section('content')
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
                                        <h1 class="h6 text-gray-900 my-4">Lupa kata sandi Anda? Tidak masalah. Cukup
                                            beritahu kami alamat email Anda dan kami akan mengirimkan tautan untuk mereset
                                            kata sandi yang memungkinkan Anda untuk memilih yang baru.</h1>
                                    </div>

                                    @if (session('status'))
                                        <div class="alert alert-success mb-4">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                    <form class="user" method="POST" action="{{ route('password.email') }}">
                                        @csrf

                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control form-control-user" id="email"
                                                name="email" value="{{ old('email') }}" required autofocus
                                                placeholder="Masukkan Alamat Email Anda">
                                            @error('email')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Kirim Link Reset Password
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
