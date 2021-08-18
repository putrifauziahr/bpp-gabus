@extends('admin/layouts/admin')

@section('title', 'Admin | Proses Data')

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
                                    <h4>Fuzzyfikasi dan Defuzzyfikasi</h4>
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
                                    <li class="breadcrumb-item"><a href="#!">Proses Data</a>
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

                @if($pen == "1")
                <div class="card">
                    <div class="card-header">
                        <h5>Data Fuzzyfikasi Kegiatan " {{$penyuluhans->kegiatan}} - {{$penyuluhans->tanggal}} "</h5>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; ?>
                                    @foreach($hasil as $a)
                                    <?php $no++; ?>
                                    <tr>
                                        <th scope="row">{{$no}}</th>
                                        <td>{{$a->pertanyaan}}</td>
                                        <td>{{$a->Kategoris->kategori}}</td>

                                        <td>{{$a->after_result->bbp}}</td>
                                        <td>{{$a->after_result->btp}}</td>
                                        <td>{{$a->after_result->bap}}</td>
                                        <td>{{$a->after_result->bbh}}</td>
                                        <td>{{$a->after_result->bth}}</td>
                                        <td>{{$a->after_result->bah}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header">
                        <h5>Data Defuzzyfikasi Kegiatan " {{$penyuluhans->kegiatan}} - {{$penyuluhans->tanggal}} "</h5>
                    </div>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                            <table class="table table-hover" id="nilai2-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pertanyaan</th>
                                        <th>Kategori</th>

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
                                        <td>{{$a->Kategoris->kategori}}</td>

                                        <td>{{$a->after_result2->defuzzyp}}</td>
                                        <td>{{$a->after_result2->defuzzyh}}</td>
                                        <td>{{$a->after_result2->defuzzyp - $a->after_result2->defuzzyh}}</td>


                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @else
                @endif
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
        $('#nilai2-table').DataTable();
    });
</script>
@endpush