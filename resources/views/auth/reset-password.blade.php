@extends('themes.auth-theme')
@section('content')
@include('themes.auth-element.header')
<div class="wrapper wrapper-full-page">
    <div class="page-header login-page header-filter" filter-color="black"
        style="background-image: url('assets/img/login.jpg'); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="col-lg-4 col-md-6 col-sm-6 ml-auto mr-auto">
                <form class="form" method="" action="#">
                    <div class="card card-login card-hidden">
                        <div class="card-header card-header-rose text-center">
                            <h4 class="card-title">LOGIN AREA</h4>
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
                                    <input type="email" class="form-control" placeholder="Email...">
                                </div>
                            </span>
                            <span class="bmd-form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">lock_outline</i>
                                        </span>
                                    </div>
                                    <input type="password" class="form-control" placeholder="Password...">
                                </div>
                            </span>
                        </div>
                        <div class="card-footer justify-content-center">
                            <a href="#pablo" class="btn btn-rose btn-link btn-lg">LOGIN TO SYSTEM</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @include('themes.auth-element.footer')
    </div>
</div>
@endsection