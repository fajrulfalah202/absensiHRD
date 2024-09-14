<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>human resource</title>
    
    <!-- Custom fonts for this template-->
    <link href="{{ asset('fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8f9fc;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .main-content {
            flex: 1;
            /* background: url('{{ asset('img/Pantai-Delegan.jpg') }}') no-repeat center center; */
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            position: relative;
        }

        .main-content::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        .welcome-text {
            z-index: 2;
            background-color: rgba(255, 255, 255, 0.1);
            padding: 2rem;
            border-radius: 10px;
            text-align: center;
            max-width: 80%;
        }

        .welcome-text h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            font-weight: bold;
        }

        .welcome-text p {
            font-size: 1.2rem;
        }

        /* .navbar {
            background-color: #28a745;
        } */

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: white;
        }

        .navbar-nav a {
            color: white !important;
            margin-left: 10px;
        }

        .footer {
            background-color: #f8f9fc;
            color: #5a5c69;
            padding: 1rem 0;
            text-align: center;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-success bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                {{-- <img src="{{ asset('img/Lambang_Kabupaten_Gresik.png') }}" alt="Logo" width="30" height="30" class="d-inline-block align-top"> --}}
                {{-- Desa Dalegan --}}
            </a>
            <div class="d-flex">
                @if (Route::has('login'))
                <div>
                    @auth
                    <!-- Check the user role and provide the appropriate dashboard link -->
                    @if (Auth::user()->hasRole('super_admin'))
                        <a href="{{ url('/SuperAdmin-dashboard') }}" class="btn btn-light">Dashboard</a>
                    @elseif (Auth::user()->hasRole('admin'))
                        <a href="{{ url('/Admin-dashboard') }}" class="btn btn-light">Dashboard</a>
                    @elseif (Auth::user()->hasRole('karyawan'))
                        <a href="{{ url('/Karyawan-dashboard') }}" class="btn btn-light">Dashboard</a>
                    @endif
                    @else
                    <a href="{{ route('login') }}" class="btn btn-light">Log in</a>
                    @endif
                </div>
                @endif
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <div class="welcome-text">
            <h1>SELAMAT DATANG </h1>
            <p>silakan login untuk presensi</p>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy;  {{   date('Y') }}</span>
            </div>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom scripts for all pages-->
    <script src="jquery/jquery.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>
