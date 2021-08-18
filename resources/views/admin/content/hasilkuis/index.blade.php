@extends('admin/layouts/admin')

@section('title', 'Admin | Hasil Kuisioner')

@section ('container')
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

                @if($pen == "1")
                <div class="card">
                    <div class="card-header">
                        <h5>Data Hasil Kuisioner Kegiatan "{{$penyuluhans->kegiatan}}, {{$penyuluhans->tanggal}}"</h5>
                    </div>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                            <table class="table table-hover" id="kuis-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pertanyaan</th>
                                        <th>Kategori</th>


                                        <th>Tidak Puas P</th>
                                        <th>Kurang Puas P</th>
                                        <th>Cukup Puas P</th>
                                        <th>Puas P</th>
                                        <th>Sangat Puas P</th>


                                        <th>Tidak Puas H</th>
                                        <th>Kurang Puas H</th>
                                        <th>Cukup Puas H</th>
                                        <th>Puas H</th>
                                        <th>Sangat Puas H</th>

                                        <th>Total Responden</th>
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


                                        <td>{{$a->before_result->tpp}}</td>
                                        <td>{{$a->before_result->kpp}}</td>
                                        <td>{{$a->before_result->cpp}}</td>
                                        <td>{{$a->before_result->pp}}</td>
                                        <td>{{$a->before_result->spp}}</td>


                                        <td>{{$a->before_result->tp}}</td>
                                        <td>{{$a->before_result->kp}}</td>
                                        <td>{{$a->before_result->cp}}</td>
                                        <td>{{$a->before_result->p}}</td>
                                        <td>{{$a->before_result->sp}}</td>


                                        <td>
                                            {{$a->before_result->tpp + $a->before_result->kpp + $a->before_result->cpp + $a->before_result->pp + $a->before_result->spp}}
                                        </td>
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
        $('#kuis-table').DataTable();
    });
</script>
@endpush