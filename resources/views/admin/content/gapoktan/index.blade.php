@extends('admin/layouts/admin')

@section('title', 'Admin | Gapoktan')

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
                                    <h4>Gapoktan</h4>
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
                                    <li class="breadcrumb-item"><a href="#!">Gapoktan</a>
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
                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal"><i class="ti-plus"></i> Tambah Data</button>
                <div class="card">
                    <div class="card-header">
                        <h5>Data Gapoktan</h5>
                    </div>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                            <table class="table table-hover" id="gapoktan-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Gapoktan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; ?>
                                    @foreach($gapoktan as $a)
                                    <?php $no++; ?>
                                    <tr>
                                        <th scope="row">{{$no}}</th>
                                        <td>{{$a->gapoktan}}</td>
                                        <td>
                                            <a href="/admin/showDetailGapoktan/{{$a->id_gapoktan}}" class="btn btn-info"><i class="ti-pencil-alt"></i>Edit</a>
                                            <a href="/admin/hapusGapoktan/{{$a->id_gapoktan}}" class="btn btn-danger"><i class="ti-trash"></i>Hapus</a>
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
</div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" onsubmit="return validasi_input(this)">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Gapoktan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/tambahGapoktan" method="POST" onsubmit="return validasi_input(this)">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="InputNamaAktivitas">Nama Gapoktan</label>
                        <input name="gapoktan" type="text" class="form-control @error('gapoktan') is-invalid @enderror" placeholder="Masukan Gapoktan">
                        @error('gapoktan')<div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    function validasi_input(form) {
        if (form.gapoktan.value == "") {
            alert("Anda belum mengisi Gapoktan !");
            return (false);
        }
        return (true);
    }
</script>
@endsection

@push('js')
<script>
    $(document).ready(function() {
        $('#gapoktan-table').DataTable();
    });
</script>
@endpush