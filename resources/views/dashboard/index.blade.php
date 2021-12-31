@extends('themes.admin-theme')
@section('content')
<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">layers</i>
                </div>
                <h3 class="card-title">Gudang ATK</h3>
            </div>
            <div class="card-footer">
                <button class="btn btn-warning" onclick="showAtk();">Tambah Data Gudang ATK</button>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">layers</i>
                </div>
                <h3 class="card-title">Gudang Kimia</h3>
            </div>
            <div class="card-footer">
                <button class="btn btn-rose" onclick="showKimia();">Tambah Data Gudang Kimia</button>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">layers</i>
                </div>
                <h3 class="card-title">Gudang Dokumentasi</h3>
            </div>
            <div class="card-footer">
                <button class="btn btn-success" onclick="showDokumen();">Tambah Data Gudang Dokumen</button>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header card-header-icon card-header-info">
                <div class="card-icon">
                    <i class="material-icons">timeline</i>
                </div>
                <h4 class="card-title">Chart
                </h4>
            </div>
            <div class="card-body">
                <div id="colouredRoundedLineChart" class="ct-chart"></div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('modal')
@include('dashboard.modal.modal-gudang-atk')
@include('dashboard.modal.modal-gudang-kimia')
@include('dashboard.modal.modal-gudang-dokumen')
@stop
@section('js')
@include('dashboard.js.js-dashboard')
@stop