@extends('themes.admin-theme')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">architecture</i>
                </div>
                <h4 class="card-title">Data Gudang ATk</h4>
            </div>
            <hr>
            <div class="card-body">                
                <div class="material-datatables">
                    @include('gudang-atk.table.tbl-gudang-atk')
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
@include('gudang-atk.modal.modal-gudang-atk')
@stop
@section('js')
@include('gudang-atk.js.js-gudang-atk')
@stop