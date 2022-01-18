@extends('themes.admin-theme')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">architecture</i>
                </div>
                <h4 class="card-title">Data Gudang Kimia</h4>
            </div>
            <hr>
            <div class="card-body">                
                <div class="material-datatables">
                    @include('gudang-kimia.table.tbl-gudang-kimia')
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
@include('gudang-kimia.modal.modal-gudang-kimia')
@stop
@section('js')
@include('gudang-kimia.js.js-gudang-kimia')
@stop