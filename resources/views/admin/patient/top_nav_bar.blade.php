<div class="topbar">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 text-sm">
                <div class="site-info">
                    <a href="tel:+92 345 3654 3652"><span class="mai-call text-primary"></span> +92 345 3654 3652</a>
                    <span class="divider">|</span>
                    <a href="mailto:HMSmail@gmail.com"><span class="mai-mail text-primary"></span> HMSmail@gmail.com</a>
                </div>
            </div>
            <div class="col-sm-4 text-right text-sm">
                <div class="social-mini-button">
                    <a href="#"><span class="mai-logo-facebook-f"></span></a>
                    <a href="#"><span class="mai-logo-twitter"></span></a>
                    <a href="#"><span class="mai-logo-dribbble"></span></a>
                    <a href="#"><span class="mai-logo-instagram"></span></a>
                </div>
            </div>
        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!-- .topbar -->
<nav class="navbar navbar-expand-lg navbar-light shadow-sm">

    <div class="container">
        <a class="navbar-brand" href="/"><span class="text-primary">H</span>-M<span class="text-primary">-S</span></a>

        <!-- <form action="#">
            <div class="input-group input-navbar">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
                </div>
                <input type="text" class="form-control" placeholder="Enter keyword.." aria-label="Username" aria-describedby="icon-addon1">
            </div>
        </form> -->

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupport">
            <ul class="navbar-nav ml-auto">



                @if (Route::has('login'))

                @auth

                <!-- <li class="nav-item">
                    <a class="btn btn-danger ml-2" href="{{url('patient_data_view_record')}}">Patient Data </a>
                </li> -->
                <li class="nav-item">
                    <div class="btn-group ml-2">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{Auth()->user()->name}}
                        </button>
                        <div class="dropdown-menu">
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item " href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

                                <div>
                                    {{ __('Logout') }}
                                </div>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </li>

                @else

                <li class="nav-item">
                    <a class="btn btn-primary ml-lg-3" href="login">Login </a>
                </li>

                <li class="nav-item">
                    <a class="btn btn-primary ml-lg-3" href="register">Register </a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-danger ml-2" href="{{url('patient_data_view_record')}}">Patient Data </a>
                </li>
                @endauth
                @endif

            </ul>
        </div> <!-- .navbar-collapse -->
    </div> <!-- .container -->
</nav>
