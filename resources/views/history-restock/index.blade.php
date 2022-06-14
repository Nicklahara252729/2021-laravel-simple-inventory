@extends('themes.admin-theme')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">architecture</i>
                </div>
                <h4 class="card-title">Data History Restock</h4>
            </div>
            <hr>
            <div class="card-body">
                <div class="material-datatables">
                    @include('history-restock.table.tbl-history-restock')
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
@include('history-restock.modal.modal-history-restock')
@stop
@section('js')
@include('history-restock.js.js-history-restock')
@stop