@extends('admin/layouts/admin')

@section('title', 'Admin | Detail Kelompok Tani')

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
                                    <h4>Kelompok Tani</h4>
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
                                    <li class="breadcrumb-item"><a href="#!">Data Master</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!">Kelompok Tani</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5>Edit Data Kelompok Tani</h5>
                    </div>
                    <form class="form-horizontal form-material" action="/admin/postUpdateKelompokTani/{{$poktan->id_poktan}}" method="POST" onsubmit="return validasi_input(this)">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label class="col-md-3">Gapoktan</label>
                            <div class="col-md-3">
                                <select name="id_gapoktan" class="form-control @error('id_gapoktan') is-invalid @enderror">
                                    @error('id_gapoktan') <div class="invalid-feedback">{{$message}}</div> @enderror
                                    <option value="{{ $poktan->id_gapoktan}}">{{ $poktan->gapoktanRef->gapoktan}}</option>
                                    @foreach($gapoktan as $k)
                                    <option value="{{ $k -> id_gapoktan}}">{{$k->gapoktan}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3">Kelompok Tani</label>
                            <div class="col-md-3">
                                <input type="text" name="kelompok_tani" class="form-control @error('kelompok_tani') is-invalid @enderror" value="{{ $poktan->kelompok_tani}}">
                                @error('kelompok_tani')<div class="invalid-feedback">{{$message}}</div> @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4">
                                <button class="btn btn-info mx-auto mx-md-0 text-white"><i class="ti-pencil-alt"></i>Ubah</button>
                                <a type="button" class="btn btn-danger mx-auto mx-md-0 text-white" href="{{route('admin/showKelompokTani')}}">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<script type="text/javascript">
    function validasi_input(form) {
        if (form.id_gapoktan.value == "pilih") {
            alert("Anda belum mengisi Gapoktan !");
            return (false);
        } else if (form.kelompok_tani.value == "") {
            alert("Anda belum mengisi Kelompok Tani !");
            return (false);
        }
        return (true);
    }
</script>
@endsection