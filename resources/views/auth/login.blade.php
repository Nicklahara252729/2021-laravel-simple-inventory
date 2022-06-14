@extends('themes.auth-theme')
@section('content')
@include('themes.auth-element.header')
<div class="wrapper wrapper-full-page">
    <div class="page-header login-page header-filter" filter-color="black" style="background-image: url('assets/img/intancantik.jpg'); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="col-lg-4 col-md-6 col-sm-6 ml-auto mr-auto">
                <form action="{{ route('prosesLogin') }}" method="POST">
                    @csrf
                    <div class="card card-login card-hidden">
                        <div class="card-header card-header-success text-center">
                            <img src="{{asset('assets/img/SSC.png')}}" width="100">
                            <h4 class="card-title">LOGIN AREA<br/> SSC INVENTORY</h4>
                        </div>
                        <div class="card-body ">
                            <p class="card-description text-center">Please Enter Your Username & Passsword</p>
                            <span class="bmd-form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">email</i>
                                        </span>
                                    </div>
                                    <input type="text" required name="username" id="username" class="form-control" placeholder="Username...">
                                </div>
                            </span>
                            <span class="bmd-form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">lock_outline</i>
                                        </span>
                                    </div>
                                    <input type="password" name="password" id="password" required class="form-control" placeholder="Password...">
                                </div>
                            </span>
                        </div>
                        <div class="card-footer justify-content-center">
                            <button type="submit" class="btn btn-success btn-md">LOGIN TO SYSTEM</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @include('themes.auth-element.footer')
    </div>
</div>
@endsection
