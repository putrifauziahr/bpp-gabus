@extends('admin/layouts/admin')

@section('title', 'Admin | Detail Riwayat')

@section ('container')
<script src="{{ asset('assets/js/Chart.js')}}"></script>
<div class="pcoded-content">
    <div class="pcoded-inner-content">

        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-header start -->
                <div class="page-header card">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h4>Detail Riwayat</h4>
                                    <span>Dashboard Admin</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="index.html">
                                            <i class="icofont icofont-home"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Detail Riwayat</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page-header end -->

                <div class="page-body">
                    <div class="card">
                        <div class="card-header">
                            <h5>Hasil Akhir Kegiatan " {{$riwayat->Penyuluhans->kegiatan}} - {{$riwayat->Penyuluhans->tanggal}} "</h5>
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <canvas id="myChart"></canvas>
                            </div>


                            <script>
                                var ctx = document.getElementById("myChart").getContext('2d');
                                var myChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: ["Bukti Fisik", "Kehandalan", "Daya Tanggap", "Jaminan", "Empati"],
                                        datasets: [{
                                            label: '# of Votes',
                                            data: [
                                                <?php
                                                echo  $riwayat->tangibles
                                                ?>,
                                                <?php
                                                echo  $riwayat->reliability
                                                ?>,
                                                <?php
                                                echo  $riwayat->respon
                                                ?>,
                                                <?php
                                                echo  $riwayat->assurance
                                                ?>,
                                                <?php
                                                echo $riwayat->empati
                                                ?>
                                            ],
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(255, 206, 86, 0.2)',
                                                'rgba(75, 192, 192, 0.2)',
                                                'rgba(153, 102, 255, 0.2)',
                                                'rgba(255, 159, 64, 0.2)'
                                            ],
                                            borderColor: [
                                                'rgba(255,99,132,1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(255, 206, 86, 1)',
                                                'rgba(75, 192, 192, 1)',
                                                'rgba(153, 102, 255, 1)',
                                                'rgba(255, 159, 64, 1)'
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            yAxes: [{
                                                ticks: {
                                                    beginAtZero: true
                                                }
                                            }]
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </div>

                <div class="page-body">
                    <div class="card">
                        <div class="card-header">
                            <h5>Kesimpulan " {{$riwayat->Penyuluhans->kegiatan}} - {{$riwayat->Penyuluhans->tanggal}} "</h5>
                        </div>

                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <table class="table table-hover" id="hasil-table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kategori</th>
                                            <th>Nilai GAP</th>
                                            <th>Kondisi</th>
                                            <th>Kesimpulan</th>
                                            <th>Saran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Bukti Fisisk</td>
                                            <td>{{$riwayat->tangibles}}</td>
                                            @if($riwayat->tangibles >= "0")
                                            <td>
                                                Kondisi Layanan Berkualitas dan Memuaskan
                                            </td>
                                            <td>
                                                <p>
                                                    Pelayanan yang diberikan sudah sesuai harapan petani,
                                                    <br>pelayanan dapat dipertahankan atau ditingkatkan untuk penyuluhan berikutnya
                                                </p>
                                            </td>
                                            @else($riwayat->tangibles < "0" ) <td>
                                                Kondisi Layanan Tidak Berkualitas dan Memuaskan
                                                </td>
                                                <td>
                                                    <p>
                                                        Diperlukan perbaikan pada hal-hal yang terkait dengan sarana dan prasarana seperti :
                                                        <br>
                                                        tampilan gedung, fasilitas fisik, pendukung, perlengkapan dan penampilan petugas penyuluhan.
                                                    </p>
                                                </td>
                                                <td>Perbaikan dilakukan dimulai dari kategori dengan nilai GAP tertinggi sampai terendah</td>
                                                @endif
                                        </tr>


                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Kehandalan</td>
                                            <td>{{$riwayat->reliability}}</td>
                                            @if($riwayat->reliability >= "0")
                                            <td>
                                                Kondisi Layanan Berkualitas dan Memuaskan
                                            </td>
                                            <td>
                                                <p>
                                                    Pelayanan yang diberikan sudah sesuai harapan petani,
                                                    <br>pelayanan dapat dipertahankan atau ditingkatkan untuk penyuluhan berikutnya
                                                </p>
                                            </td>
                                            @else($riwayat->reliability < "0" ) <td>
                                                Kondisi Layanan Tidak Berkualitas dan Memuaskan
                                                </td>
                                                <td>
                                                    <p>
                                                        Diperlukan perbaikan pada kemampuan penyedia layanan memberikan
                                                        <br>
                                                        layanan yang dijanjinkan dengan segera, akurat, dan memuaskan.
                                                    </p>
                                                </td>
                                                <td></td>
                                                @endif
                                        </tr>


                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Daya Tanggap</td>
                                            <td>{{$riwayat->respon}}</td>
                                            @if($riwayat->respon >= "0")
                                            <td>
                                            <td>
                                                Kondisi Layanan Berkualitas dan Memuaskan
                                            </td>
                                            <p>
                                                Pelayanan yang diberikan sudah sesuai harapan petani,
                                                <br>pelayanan dapat dipertahankan atau ditingkatkan untuk penyuluhan berikutnya
                                            </p>
                                            </td>
                                            @else($riwayat->respon < "0" ) <td>
                                                Kondisi Layanan Tidak Berkualitas dan Memuaskan
                                                </td>
                                                <td>
                                                    <p>
                                                        Diperlukan perbaikan terkait dengan para petugas penyuluhan
                                                        <br>yang memberikan jaminan bahwa mereka bisa memberikan layanan dengan baik.
                                                    </p>
                                                </td>
                                                <td></td>
                                                @endif
                                        </tr>


                                        <tr>
                                            <th scope="row">4</th>
                                            <td>Jaminan</td>
                                            <td>{{$riwayat->assurance}}</td>
                                            @if($riwayat->assurance >= "0")
                                            <td>
                                                Kondisi Layanan Berkualitas dan Memuaskan
                                            </td>
                                            <td>
                                                <p>
                                                    Pelayanan yang diberikan sudah sesuai harapan petani,
                                                    <br>pelayanan dapat dipertahankan atau ditingkatkan untuk penyuluhan berikutnya
                                                </p>
                                            </td>
                                            @else($riwayat->assurance < "0" ) <td>
                                                Kondisi Layanan Tidak Berkualitas dan Memuaskan
                                                </td>
                                                <td>
                                                    <p>
                                                        Perlu dilakukan perbaikan terkait dengan pengetahuan dan kecakapan petugas penyuluhan
                                                        <br> yang memberikan jaminan bahwa mereka bisa memberikan layanan dengan baik.
                                                        <br>Seperti penyuluh sudah berpengalaman dalam memberikan penyuluhan,
                                                        <br> penguasaan materi dengan baik dan memiliki kemampuan serta pengetahuan dalam memberikan penyuluhan
                                                    </p>
                                                </td>
                                                <td></td>
                                                @endif
                                        </tr>


                                        <tr>
                                            <th scope="row">5</th>
                                            <td>Empati</td>
                                            <td>{{$riwayat->empati}}</td>
                                            @if($riwayat->empati >= "0")
                                            <td>
                                                Kondisi Layanan Berkualitas dan Memuaskan
                                            </td>
                                            <td>
                                                <p>
                                                    Pelayanan yang diberikan sudah sesuai harapan petani,
                                                    <br>pelayanan dapat dipertahankan atau ditingkatkan untuk penyuluhan berikutnya
                                                </p>
                                            </td>
                                            @else($riwayat->empati < "0" ) <td>
                                                Kondisi Layanan Tidak Berkualitas dan Memuaskan
                                                </td>
                                                <td>
                                                    <p>
                                                        Diperlukan perbaikan terkait dengan para petugas penyuluhan mampu
                                                        <br> menjalin komunikasi interpersonal dan memahami kebutuhan petani.
                                                        <br>Seperti perhatian, kesopanan, keramahan dan komunikasi petugas penyuluhan
                                                    </p>
                                                </td>
                                                <td></td>
                                                @endif
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <a type="button" class="btn btn-danger mx-auto mx-md-0 text-white" href="{{route('admin/showRiwayatHasil')}}">Kembali</a>
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

@push('js')
<script>
    $(document).ready(function() {
        $('#hasil-table').DataTable();
    });
</script>
@endpush