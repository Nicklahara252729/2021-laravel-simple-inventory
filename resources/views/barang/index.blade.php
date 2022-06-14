@extends('themes.admin-theme')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">architecture</i>
                </div>
                <h4 class="card-title">Data Barang</h4>
            </div>
            <hr>
            <div class="card-body">
                <div class="toolbar">
                    <button class="btn btn-info" onclick="show();">Tambah Data Baru</button>
                </div>
                <hr>
                <div class="material-datatables">
                    @include('barang.table.tbl-barang')
                </div>
            </div>
            <!-- end content-->
        </div>
        <!--  end card  -->
    </div>
    <!-- end col-md-12 -->
</div>
@endsection
@section('modal')
@include('barang.modal.modal-barang')
@stop
@section('js')
@include('barang.js.js-barang')
@stop