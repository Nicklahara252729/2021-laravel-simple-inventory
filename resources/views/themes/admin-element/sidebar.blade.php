<div class="sidebar" data-color="rose" data-background-color="black" data-image="{{asset('assets/img/sidebar-1.jpg')}}">
    <div class="logo"><a href="#" class="simple-text logo-mini">
            SSC
        </a>

        <a href="#" class="simple-text logo-normal">
            Inventory
        </a>
    </div>

    <div class="sidebar-wrapper">

        <div class="user">
            <div class="photo">
                <img src="{{asset('assets/img/faces/avatar.jpg')}}" />
            </div>
            <div class="user-info">
                <a data-toggle="collapse" href="#collapseExample" class="username">
                    <span>
                        Intan Kartini
                        <b class="caret"></b>
                    </span>
                </a>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> MP </span>
                                <span class="sidebar-normal"> My Profile </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> EP </span>
                                <span class="sidebar-normal"> Edit Profile </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> S </span>
                                <span class="sidebar-normal"> Settings </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">

            <li class="nav-item active ">
                <a class="nav-link" href="{{url('/')}}">
                    <i class="material-icons">dashboard</i>
                    <p> Dashboard </p>
                </a>
            </li>

            <li class="nav-item ">
                <a class="nav-link" href="{{url('user')}}">
                    <i class="material-icons">person</i>
                    <p> User </p>
                </a>
            </li>

            <li class="nav-item ">
                <a class="nav-link" href="{{url('gudang-atk')}}">
                    <i class="material-icons">architecture</i>
                    <p> Gudang ATK </p>
                </a>
            </li>

            <li class="nav-item ">
                <a class="nav-link" href="{{url('gudang-kimia')}}">
                    <i class="material-icons">biotech</i>
                    <p> Gudang Kimia </p>
                </a>
            </li>

            <li class="nav-item ">
                <a class="nav-link" href="{{url('gudang-dokumentasi')}}">
                    <i class="material-icons">book</i>
                    <p> Gudang Dokumentasi </p>
                </a>
            </li>

            <li class="nav-item ">
                <a class="nav-link" href="{{url('history')}}">
                    <i class="material-icons">date_range</i>
                    <p> History </p>
                </a>
            </li>

        </ul>
    </div>
</div>