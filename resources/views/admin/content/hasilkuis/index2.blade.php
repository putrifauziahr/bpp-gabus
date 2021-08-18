@extends('admin/layouts/admin')

@section('title', 'Admin | Hasil Kuisioner')

@section ('container')
<script src="{{ asset('assets/js/Chart.js')}}"></script>
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-header card">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h4>Hasil Kuisioner</h4>
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
                                    <li class="breadcrumb-item"><a href="#!">Hasil Kuisioner</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @if(Session::has('alert'))
                <div class="alert alert-success">
                    {{ Session::get('alert') }}
                    @php
                    Session::forget('alert');
                    @endphp
                </div>
                @elseif(Session::get('alertF'))
                <div class="alert alert-danger">
                    {{ Session::get('alertF') }}
                    @php
                    Session::forget('alertF');
                    @endphp
                </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h5>Data Hasil Kuisioner Kegiatan " {{$penyuluhans->kegiatan}} - {{$penyuluhans->tanggal}} "</h5>
                    </div>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                            <table class="table table-hover" id="nilai-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pertanyaan</th>
                                        <th>Kategori</th>
                                        <th>Batas Bawah Persepsi</th>
                                        <th>Batas Tengah Persepsi</th>
                                        <th>Batas Atas Persepsi</th>
                                        <th>Batas Bawah Harapan</th>
                                        <th>Batas Tengah Harapan</th>
                                        <th>Batas Atas Harapan</th>
                                        <th>Persepsi</th>
                                        <th>Harapan</th>
                                        <th>GAP</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; ?>
                                    @foreach($hasil as $a)
                                    <?php $no++; ?>
                                    <tr>
                                        <th scope="row">{{$no}}</th>
                                        <td>{{$a->pertanyaan}}</td>
                                        <td>{{$a->kategori}}</td>

                                        <td>{{$a->after_result->bbp}}</td>
                                        <td>{{$a->after_result->btp}}</td>
                                        <td>{{$a->after_result->bap}}</td>
                                        <td>{{$a->after_result->bbh}}</td>
                                        <td>{{$a->after_result->bth}}</td>
                                        <td>{{$a->after_result->bah}}</td>

                                        <td>{{$a->after_result2->defuzzyp}}</td>
                                        <td>{{$a->after_result2->defuzzyh}}</td>
                                        <td>{{$a->after_result2->defuzzyp - $a->after_result2->defuzzyh}}</td>


                                        <td>{{$tangp}}</td>
                                        <td>{{$tang}}</td>
                                        <td>{{$tangp - $tang}}</td>

                                        <td>{{$relip}}</td>
                                        <td>{{$reli}}</td>
                                        <td>{{ $relip - $reli}}</td>

                                        <td>{{$responp}}</td>
                                        <td>{{$respon}}</td>
                                        <td>{{ $responp - $respon}}</td>

                                        <td>{{$assup}}</td>
                                        <td>{{$assu}}</td>
                                        <td>{{$assup - $assu}}</td>

                                        <td>{{$emp}}</td>
                                        <td>{{$em}}</td>
                                        <td>{{$emp - $em}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="page-body">
                    <div class="card">
                        <div class="card-header">
                            <h5>Hasil Akhir Kegiatan " {{$penyuluhans->kegiatan}} - {{$penyuluhans->tanggal}} "</h5>
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
                                        labels: ["Tangibles", "Reliability", "Responsiveness", "Assurance", "Emphaty"],
                                        datasets: [{
                                            label: '# of Votes',
                                            data: [
                                                <?php
                                                echo  $tangp - $tang
                                                ?>,
                                                <?php
                                                echo  $relip - $reli
                                                ?>,
                                                <?php
                                                echo  $responp - $respon
                                                ?>,
                                                <?php
                                                echo  $assup - $assu
                                                ?>,
                                                <?php
                                                echo  $emp - $em
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
                            <h5>Hasil Akhir Kegiatan " {{$penyuluhans->kegiatan}} - {{$penyuluhans->tanggal}} "</h5>
                        </div>

                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <table class="table table-hover" id="hasil-table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kategori</th>
                                            <th>Nilai GAP</th>
                                            <th>Kesimpulan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Tangibles</td>
                                            <td>{{$tangp - $tang}}</td>
                                            @if($tangp - $tang >= "0")
                                            <td>
                                                <p>
                                                    Pelayanan yang diberikan sudah sesuai harapan petani,
                                                    <br>pelayanan dapat dipertahankan atau ditingkatkan untuk penyuluhan berikutnya
                                                </p>
                                            </td>
                                            @else($tangp - $tang < "0" ) <td>
                                                <p>
                                                    1. Terkait Kebersihan, kenyaman dan keamanan ruang kegiatan penyuluhan berlangsung, harus ditingkat dan diperbaiki
                                                </p>
                                                <p>
                                                    2. Perlengkapan yang digunakan dalam kegiatan penyuluhan harus lengkap dan memadai agar tidak
                                                    kesulitan saat melakukan kegiatan penyuluhan
                                                </p>
                                                <p>
                                                    3. Kelengkapan dan kesiapan alat peraga penyuluh harus dipersiapan secara matang, agar dapat berfungsi dengan baik
                                                    saat digunakan pada kegiatan penyuluhan
                                                </p>
                                                </td>
                                                @endif
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Reliability</td>
                                            <td>{{$relip - $reli}}</td>
                                            @if($relip - $reli >= "0")
                                            <td>
                                                <p>
                                                    Pelayanan yang diberikan sudah sesuai harapan petani,
                                                    <br>pelayanan dapat dipertahankan atau ditingkatkan untuk penyuluhan berikutnya
                                                </p>
                                            </td>
                                            @else($relip - $reli < "0" ) <td>
                                                <p>
                                                    1. Kesesuaikan kegiatan dengan waktu yang dijadwalkan sesuai, penyelenggaraan penyuluhan harus
                                                    disiplin,
                                                    <br>
                                                    agar segala sesuatu berlangsung sesuai dengan jadwal yang sudah dilakukan dan tidak membuang-buang waktu
                                                </p>
                                                <p>
                                                    2. Dalam memberikan penyuluhan, petani mengharapkan penyuluh merupakan orang yang kompeten dibidangnya dan sudah berpengalaman
                                                </p>
                                                <p>
                                                    3. Penyuluh menyampaikan materi penyuluhan pertanian dengan baik
                                                </p>
                                                <p>
                                                    4. Materi penyuluhan yang ditawarkan sesuai dengan yang dibutuhkan petani dan sesuai
                                                </p>
                                                </td>
                                                @endif
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Responsiveness</td>
                                            <td>{{$responp - $respon}}</td>
                                            @if($responp - $respon >= "0")
                                            <td>
                                                <p>
                                                    Pelayanan yang diberikan sudah sesuai harapan petani,
                                                    <br>pelayanan dapat dipertahankan atau ditingkatkan untuk penyuluhan berikutnya
                                                </p>
                                            </td>
                                            @else($responp - $respon < "0" ) <td>
                                                <p>
                                                    1. Petugas penyuluhan cepat tanggap dalam memberikan pelayanan
                                                </p>
                                                <p>
                                                    2. Penyuluh menerima pertanyaan dan secara langsung menjawab dan mampu menjawab pertanyaan dengan benar
                                                </p>
                                                </td>
                                                @endif
                                        </tr>
                                        <tr>
                                            <th scope="row">4</th>
                                            <td>Assurance</td>
                                            <td>{{$assup - $assu}}</td>
                                            @if($assup - $assu >= "0")
                                            <td>
                                                <p>
                                                    Pelayanan yang diberikan sudah sesuai harapan petani,
                                                    <br>pelayanan dapat dipertahankan atau ditingkatkan untuk penyuluhan berikutnya
                                                </p>
                                            </td>
                                            @else($assup - $assu < "0" ) <td>
                                                <p>
                                                    1. Penyuluh sudah berpengalaman dalam memberikan penyuluhan pertanian
                                                </p>
                                                <p>2. Lingkungan penyuluhan terasa nyaman, tentram dan aman</p>
                                                <p>3. Penyuluh memiliki kemampuan dan pengetahuan dalam memberikan penyuluhan pertanian</p>
                                                </td>
                                                @endif
                                        </tr>
                                        <tr>
                                            <th scope="row">5</th>
                                            <td>Emphaty</td>
                                            <td>{{$emp - $em}}</td>
                                            @if($emp - $em >= "0")
                                            <td>
                                                <p>
                                                    Pelayanan yang diberikan sudah sesuai harapan petani,
                                                    <br>pelayanan dapat dipertahankan atau ditingkatkan untuk penyuluhan berikutnya
                                                </p>
                                            </td>
                                            @else($$emp - $em < "0" ) <td>
                                                <p>1. Petugas penyuluhan memberikan perhatian saat kegiatan penyuluhan</p>
                                                <p>2. Keramahan, kesopanan dan sikap petugas penyuluhan dalam memberikan pelayanan</p>
                                                <p>3. Petugas penyuluhan berkomunikasi dengan Bahasa yang mudah dimengerti</p>
                                                <p>4. Petugas penyuluhan meminta maaf atas pelayanan yang kurang baik</p>
                                                </td>
                                                @endif
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5>Data Penyuluhan</h5>
                    </div>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                            <table class="table table-hover" id="penyuluhan-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kegiatan</th>
                                        <th>Hari</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; ?>
                                    @foreach($penyuluhan as $p)
                                    <?php $no++; ?>
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$p->kegiatan}}</td>
                                        <td>{{$p->hari}}</td>
                                        <td>{{$p->tanggal}}</td>
                                        <td>{{$p->status}}</td>
                                        <td>
                                            <a href="/admin/showDetailRiwayatLagi/{{$p->id_penyuluhan}}" class="btn btn-success"><i class="ti-zoom-in"></i>Hasil Akhir</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
        $('#nilai-table').DataTable();
    });
</script>
<script>
    $(document).ready(function() {
        $('#hasil-table').DataTable();
    });
</script>
@endpush