@extends('themes.admin-theme')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">architecture</i>
                </div>
                <h4 class="card-title">Data Gudang Dokumen</h4>
            </div>
            <hr>
            <div class="card-body">
                <div class="toolbar">
                    <button class="btn btn-info" onclick="show();">Tambah Data Baru</button>
                </div>
                <hr>
                <div class="material-datatables">
                    @include('gudang-dokumen.table.tbl-gudang-dokumen')
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
@include('gudang-dokumen.modal.modal-gudang-dokumen')
@stop
@section('js')
@include('gudang-dokumen.js.js-gudang-dokumen')
@stop