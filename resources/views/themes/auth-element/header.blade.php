<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white" id="navigation-example">
    <div class="container">
        <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo"><img src="{{asset('assets/img/intancantiklagi.png')}}" width="200"></a>
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
            aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item  active ">
                    <a href="{{url('/')}}" class="nav-link">
                        <i class="material-icons">fingerprint</i> 
                        Login
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{url('/reset-password')}}" class="nav-link">
                        <i class="material-icons">lock_open</i>
                        Forgot Password
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>