@extends('themes.admin-theme')
@section('content')
<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats" style="padding: 30px 0px 10px 0px;">
            <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">layers</i>
                </div>
                <button class="btn btn-warning" onclick="showAtk();">Tambah Data Gudang</button>
            </div>
        </div>
    </div>
</div>
<div class="row" id="div-data-gudang" style="display:none;">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">architecture</i>
                </div>
                <h4 class="card-title" id="txt-data-gudang" style="text-transform:capitalize;"></h4>
            </div>
            <hr>
            <div class="card-body">
                <div class="material-datatables">
                    @include('dashboard.table.tbl-dashboard')
                </div>
            </div>
            <!-- end content-->
        </div>
        <!--  end card  -->
    </div>
    <!-- end col-md-12 -->
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header card-header-icon card-header-info">
                <div class="card-icon">
                    <i class="material-icons">timeline</i>
                </div>
                <h4 class="card-title">Chart Gudang ATK
                </h4>
            </div>
            <div class="card-body">
                <div id="chartAtk" class="ct-chart"></div>
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
                <h4 class="card-title">Chart Gudang Kimia
                </h4>
            </div>
            <div class="card-body">
                <div id="chartKimia" class="ct-chart"></div>
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
                <h4 class="card-title">Chart Gudang Dokumen
                </h4>
            </div>
            <div class="card-body">
                <div id="chartDokumen" class="ct-chart"></div>
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