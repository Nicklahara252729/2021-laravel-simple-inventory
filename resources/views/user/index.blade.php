@extends('themes.admin-theme')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">person</i>
                </div>
                <h4 class="card-title">Data User</h4>
            </div>
            <hr>
            <div class="card-body">
                <div class="toolbar">
                    <button class="btn btn-info" onclick="show();">Tambah Data Baru</button>
                </div>
                <hr>
                <div class="material-datatables">
                    @include('user.table.tbl-user')
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
@include('user.modal.modal-user')
@stop
@section('js')
@include('user.js.js-user')
@stop