@extends('petani/layouts/petani')

@section('title', 'Dashboard Petani')

@section ('container')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-body">
                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i class="icofont icofont-pie-chart bg-c-blue card1-icon"></i>
                                    <span class="text-c-blue f-w-600">Penyuluhan</span>
                                    <h4 style="color: white;">p</h4>
                                    <div>
                                        <span class="f-left m-t-10 text-muted">
                                            <i class="text-c-green f-16 icofont icofont-tag m-r-10"></i>
                                            <a href="{{route('petani/showPenyuluhan')}}">Lihat Selengkapnya</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- card1 end -->
                        <!-- card1 start -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i class="icofont icofont-pie-chart bg-c-pink card1-icon"></i>
                                    <span class="text-c-blue f-w-600">Kuisioner</span>
                                    <h4 style="color: white;">p</h4>
                                    <div>
                                        <span class="f-left m-t-10 text-muted">
                                            <i class="text-c-green f-16 icofont icofont-tag m-r-10"></i>
                                            <a href="{{route('petani/showKuisioner')}}">Lihat Selengkapnya</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- card1 end -->
                        <!-- card1 start -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i class="icofont icofont-pie-chart bg-c-green card1-icon"></i>
                                    <span class="text-c-blue f-w-600">Riwayat Kuisioner</span>
                                    <h4 style="color: white;">p</h4>
                                    <div>
                                        <span class="f-left m-t-10 text-muted">
                                            <i class="text-c-green f-16 icofont icofont-tag m-r-10"></i>
                                            <a href="{{url('petani/showRiwayat/'.Session::get('id_petani'))}}">Lihat Selengkapnya</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endsection