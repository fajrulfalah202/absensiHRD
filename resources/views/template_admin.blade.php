<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>HRD tes</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ url('datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{ url('fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <!-- Bootstrap JS (jika digunakan) -->
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
        <!-- Custom styles for this template -->
        <link href="{{ url('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{ url('datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

    <!-- Bootstrap core JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles for this template-->
    <link href="{{ asset('/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <style>
        #clock,#current-day,#current-date {
            
            color: #4e73df; /* Ganti dengan warna yang Anda inginkan */
            font-size: 1rem; /* Ukuran font */
            display: inline; /* Pastikan display inline untuk tampilan horizontal */
            margin-right: 2px;
        }
    </style>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon ">
                    <img class="img-profile rounded-circle" src="{{ url('img/undraw_profile.svg')}}" alt="sa">
                </div>
                <div class="sidebar-brand-text mx-3">Testing</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('SuperAdmin-dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Nav Item - Presensi -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('SuperAdmin-Presensi')}}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Presensi</span></a>
            </li>
            <!-- Nav Item - Laporan Kehadiran -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('SuperAdmin-LaporanKehadiran') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Laporan Kehadiran</span></a>
            </li>
            {{-- keterlambatan --}}
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/SuperAdmin-LaporanKehadiran-lembur') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Laporan keterlambatan</span></a>
            </li>
            {{-- lembur --}}
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/SuperAdmin-LaporanKehadiran-lembur') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Laporan lembur</span></a>
            <!-- Nav Item - data karyawan -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('SuperAdmin-DataKaryawan')}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Karyawan</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    {{-- <div id="current-day" class="d-lg-inline"></div>
                    <div id="current-date"></div> --}}
                   
                   <!-- Clock -->
                    <div id="clock" class=" d-lg-inline "></div>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Testing</span>
                                <img class="img-profile rounded-circle" src="{{ url('img/undraw_profile.svg')}}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('konten2')

                    {{-- Data validation --}}
                    @if ($errors->any())
                        <div class="pt-3">
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $item)
                                        <li>{{ $item }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    @if (Session::has('success'))
                        <div class="pt-3">
                            <div class="alert alert-success">
                                <ul>
                                    <li>{{ Session::get('success') }}</li>
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Testing</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="{{ url('jquery/jquery.min.js')}}"></script>
    <script src="{{ url('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ url('jquery-easing/jquery.easing.min.js')}}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ url('js/sb-admin-2.min.js')}}"></script>
    <!-- Page level plugins -->
    <script src="{{ url('/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ url('datatables/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Page level custom scripts -->
    <script src="{{ url('js/demo/datatables-demo.js')}}"></script>
    {{-- <script>
        function updateClock() {
            var now = new Date();
            var hours = now.getHours();
            var minutes = now.getMinutes();
            var seconds = now.getSeconds();
            // Tambahkan 0 di depan angka jika kurang dari 10
            if (hours < 10) hours = "0" + hours;
            if (minutes < 10) minutes = "0" + minutes;
            if (seconds < 10) seconds = "0" + seconds;
            var timeString = hours + ":" + minutes + ":" + seconds;
            document.getElementById('clock').innerText = timeString;
        }
        // Perbarui jam setiap detik
        setInterval(updateClock, 1000);
        // Jalankan fungsi updateClock sekali untuk langsung menampilkan jam saat halaman dimuat
        updateClock();

        // tanggal
        function updateDateAndDay() {
            let now = new Date();
            let dateString = now.toLocaleDateString();
            let dayString = now.toLocaleDateString('id-ID', { weekday: 'long' });

            document.getElementById('current-date').innerText = dateString;
            document.getElementById('current-day').innerText = dayString;
        }
        updateDateAndDay();
    


    </script> --}}
    <script>
        function updateClock() {
            const now = new Date();
            const options = { 
                weekday: 'long', 
                year: 'numeric', 
                month: 'long', 
                day: 'numeric', 
                hour: '2-digit', 
                minute: '2-digit', 
            };
            const formattedDate = new Intl.DateTimeFormat('id-ID', options).format(now);
            document.getElementById("clock").innerHTML = formattedDate;
        }

        // Update jam setiap detik
        setInterval(updateClock, 1000);

        // Panggil fungsi pertama kali untuk menampilkan waktu segera
        updateClock();
    </script>

</body>

</html>
