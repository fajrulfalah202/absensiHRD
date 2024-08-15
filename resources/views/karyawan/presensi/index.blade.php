@extends('template_karyawan')
@section('konten1')
<div class="card">
    <div class="card-header  bg-secondary text-light">
     <h1>laporan</h1> 
    </div>
    <div class="card-body">
      <h5 class="card-title"> <div id="jam" class=" d-lg-inline "></div></h5>
     
      <h6>status: -</h6>
      <h6>masuk jam: -</h6>
      <h6>keluar jam: -</h6>
      <h6>lokasi: -</h6>
    </div>
  </div>

  @include('karyawan.presensi.modal')

<br>
  <div class="row   justify-content-center">
    <div class="col  text-center ">
        <a href="#" data-bs-toggle="modal" data-bs-target="#karyawan_masuk" class="btn btn-primary btn-lg">presensi masuk</a>
    </div>
    <div class="col  text-center">
        <a href="#" class="btn btn-primary btn-lg">presensi keluar</a>
    </div>
  </div>
  <div class="row justify-content-center ">
    <div class="col-2   ">
        <a href="#" data-bs-toggle="modal"data-bs-target="#karyawan_tidak_masuk" class="btn btn-primary  btn-lg ">izin absen</a>
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