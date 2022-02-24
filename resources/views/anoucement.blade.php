@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="top-left links">
                        <a href="{{ url('/staffhome') }}" style="background-color:#cccccc;">HOME</a>
                        <a href="{{ url('/package') }}">PACKAGE</a>
                        <a href="{{ url('/faq') }}">FAQ</a>
                        <a href="{{ url('/aForm') }}" >Application</a>
                    </div>
                </div>

                <div class="card-body">
                    You don't seem to be an admin!
                </div>
            </div>
        </div>
    </div>
</div> -->
<div class="container-scroller">
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
            <div class="me-3">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
            </div>
            <div>
                <a class="navbar-brand brand-logo" href="{{ url('/staffhome') }}">
                    <img src="{{ URL::to('/') }}/images/logo.jpeg" alt="logo" />
                    RMSCCC
                </a>
                <a class="navbar-brand brand-logo-mini" href="{{ url('/staffhome') }}">
                    <img src="{{ URL::to('/') }}/images/logo.jpeg" alt="logo" />
                </a>
            </div>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-top">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                    <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <img class="img-xs rounded-circle" src="{{ URL::to('/') }}/images/logo.jpeg" alt="Profile image"> </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                        <div class="dropdown-header text-center">
                            <img class="img-md rounded-circle" src="{{ URL::to('/') }}/images/logo.jpeg" width="40px" height="40px" alt="Profile image">
                            @php
                            $name = auth()->user()->name;
                            $email = auth()->user()->email;
                            @endphp
                            <p class="mb-1 mt-3 font-weight-semibold">{{ $email }}</p>
                            <p class="fw-light text-muted mb-0"></p>
                        </div>


                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>
    <div class="container-fluid page-body-wrapper">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/staffhome') }}">
                        <i class="mdi mdi-grid-large menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item nav-category">Applicant</li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                        <i class="menu-icon mdi mdi-floor-plan"></i>
                        <span class="menu-title">Applicant List</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="{{ url('/new_application') }}">New Application</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ url('/renew_contract') }}">Renewal Contract</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item nav-category">Other</li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/trainer') }}">
                        <i class="mdi mdi-grid-large menu-icon"></i>
                        <span class="menu-title">Trainer</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/facilitator') }}">
                        <i class="mdi mdi-grid-large menu-icon"></i>
                        <span class="menu-title">Facilitator</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/instructor') }}">
                        <i class="mdi mdi-grid-large menu-icon"></i>
                        <span class="menu-title">Instructor</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/lecturer') }}">
                        <i class="mdi mdi-grid-large menu-icon"></i>
                        <span class="menu-title">Lecturer</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/anoucement') }}">
                        <i class="mdi mdi-grid-large menu-icon"></i>
                        <span class="menu-title">Anoucement</span>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="home-tab">
                            <div class="row flex-grow">
                                <div class="col-12 grid-margin stretch-card">
                                    <div class="card card-rounded">
                                        <div class="card-body">
                                            <div class="d-sm-flex justify-content-between align-items-start">
                                                <div>
                                                    <h4 class="card-title card-title-dash">Anoucement</h4>
                                                    @if(Session::get('success'))
                                                    <div class="alert alert-success">
                                                        {{ Session::get('success') }}
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <form method="post" action="annoucementUpdate">
                                                @csrf

                                                @php
                                                $data1 = DB::table('anoucement')->get();
                                                @endphp
                                                @foreach($data1 as $data1)
                                                @php
                                                $anoucement = $data1->anoucement;
                                                @endphp
                                                @endforeach
                                                <textarea class="form-control" name="anoucement" rows="20">{{ $anoucement }}</textarea>
                                                <br />
                                                <button class="btn btn-success" type="submit">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content-wrapper ends -->

<!-- partial:partials/_footer.html -->
<footer class="footer" style="width:100%;">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from
            BootstrapDash.</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights
            reserved.</span>
    </div>
</footer>
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
@endsection