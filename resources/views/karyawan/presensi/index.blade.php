@extends('template_karyawan')
@section('konten1')
<div class="card">
    <div class="card-header  bg-secondary text-light">
     <h1>Laporan</h1> 
    </div>
    <div class="card-body">
      <h5 class="card-title"> <div id="jam" class=" d-lg-inline "></div></h5>
     
      <h6>Status: {{ $dataPresensi->status  ?? '-' }}</h6>
      <h6>Masuk Jam: {{ $dataPresensi->check_in  ?? '-' }}</h6>
      <h6>Keluar Jam: {{ $dataPresensi->check_out  ?? '-' }}</h6>
      <h6>Lokasi: {{ $dataPresensi->lokasi  ?? '-' }}</h6>
    </div>
  </div>

  @include('karyawan.presensi.modal')

<br>
<div class="row   justify-content-center">
  <div class="col text-center">
    @if ((!$sudahMasuk && !$canPresensi)&&!$sudahkeluar)
    
      <a href="#" data-bs-toggle="modal" data-bs-target="#karyawan_masuk" class="btn btn-primary btn-lg">Presensi Masuk</a>
    
    @else
        <a href="#" class="btn btn-secondary btn-lg disabled">Presensi Masuk</a>
    @endif
  </div>
  <div class="col text-center">
    @if ((!$canPresensi && !$sudahkeluar) &&$sudahMasuk)
    <a href="#" class="btn btn-primary btn-lg" data-bs-target="#karyawan_keluar" data-bs-toggle="modal">Presensi Keluar</a>

    @else
    <a href="#" class="btn btn-secondary btn-lg disabled">Presensi Keluar</a>

    @endif
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-2">
      @if (!$sudahMasuk&& !$canPresensi)
      <a href="#" data-bs-toggle="modal" data-bs-target="#karyawan_tidak_masuk" class="btn btn-primary btn-lg">Izin Absen</a>
  
      @else
      <a href="#" data-bs-toggle="modal" data-bs-target="#karyawan_tidak_masuk" class="btn btn-secondary btn-lg disabled">Izin Absen</a>
  
      @endif
    </div>
  </div>
  <script>
    function updateClock() {
        const now = new Date();
        const options = { 
            weekday: 'long', 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric', 
          
        };
        const formattedDate = new Intl.DateTimeFormat('id-ID', options).format(now);
        document.getElementById("jam").innerHTML = formattedDate;
    }

    // Update jam setiap detik
    setInterval(updateClock, 1000);

    // Panggil fungsi pertama kali untuk menampilkan waktu segera
    updateClock();
</script>
@endsection