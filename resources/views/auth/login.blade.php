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
            background-color: grey;
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


        .card{

        width: 400px;
        border:none;

        }




        .btr{

        border-top-right-radius: 5px !important;
        }


        .btl{

        border-top-left-radius: 5px !important;
        }

        .btn-dark {
        color: #fff;
        background-color: #0d6efd;
        border-color: #0d6efd;
        }


        .btn-dark:hover {
        color: #fff;
        background-color: #0d6efd;
        border-color: #0d6efd;
        }


        .nav-pills{

        display:table !important;
        width:100%;
        }

        .nav-pills .nav-link {
        border-radius: 0px;
            border-bottom: 1px solid #0d6efd40;

        }

        .nav-item{
            display: table-cell;
            background: #0d6efd2e;
        }


        .form{

        padding: 10px;
            height: 300px;
        }

        .form input{

        margin-bottom: 12px;
        border-radius: 3px;
        }


        .form input:focus{

        box-shadow: none;
        }


        .form button{

        margin-top: 20px;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-success bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                {{-- <img src="{{ asset('img/Lambang_Kabupaten_Gresik.png') }}" alt="Logo" width="30" height="30" class="d-inline-block align-top"> --}}
                human resource
            </a>
            {{-- <div class="d-flex">
                @if (Route::has('login'))
                <div>
                    @auth
                    @role('super_admin')
                            <a href="{{ route('SA-dashboard') }}" class="btn btn-light">Super Admin Dashboard</a>
                    @endrole
                    @role('admin')
                            <a href="{{ route('Admin-dashboard') }}" class="btn btn-light">Admin Dashboard</a>
                    @endrole
                    @role('karyawan')
                            <a href="{{ route('Karyawan-dashboard') }}" class="btn btn-light">Karyawan Dashboard</a>
                        @endrole
                    @else
                        <a href="{{ route('login') }}" class="btn btn-light">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-light">Register</a>
                        @endif
                    @endauth
                </div>
                @endif
            </div> --}}
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <div class="d-flex justify-content-center align-items-center mt-5">


            <div class="card">
    
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item text-center">
                      <a class="nav-link active btl" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Login</a>
                    </li>
                   
                  </ul>
                  <div class="tab-content" id="pills-tabContent">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                      
                            <div class="form px-4 pt-5">
                                @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                                @endif
                              <input type="text" name="username" class="form-control" placeholder="username">
          
                              <input type="password" name="password" class="form-control" placeholder="Password">
                              <button class="btn btn-dark btn-block">Login</button>
          
                            </div>    
                          </div>
                    </form>
                   
                    
                   </div>
                
              
              
    
            </div>
            
    
          </div>
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
