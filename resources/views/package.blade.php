@extends('layouts.app')

@section('content')
<style>
    html,
    body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .links>a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
</style>
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="top-left links">
                        <a href="{{ url('/home') }}">HOME</a>
                        <a href="{{ url('/package') }}" style="background-color:#cccccc;">PACKAGE</a>
                        <a href="{{ url('/faq') }}">FAQ</a>
                        <a href="{{ url('/aForm') }}">Application</a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>COCU PACKAGE OFFER</th>
                            <th>POSITION</th>
                            <th>QUALIFICATION</th>
                        </tr>
                        <tr>
                            <td>Family Management & Parenting</td>
                            <td>LECTURER</td>
                            <td><a href="{{ url('/qualification') }}">Click To Check Qualification</a></td>
                        </tr>
                        <tr>
                            <td>Leadership and Management</td>
                            <td>Trainer</td>
                            <td><a href="{{ url('/qualification') }}">Click To Check Qualification</a></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="dropdown">
                                    <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Usrah Budi
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Usrah Budi 1</a>
                                        <a class="dropdown-item" href="#">Usrah Budi 2</a>
                                        <a class="dropdown-item" href="#">Usrah Budi 3</a>
                                        <a class="dropdown-item" href="#">Usrah Budi 4</a>
                                    </div>
                                </div>

                            </td>
                            <td>FACIALITOR</td>
                            <td><a href="{{ url('/qualification') }}">Click To Check Qualification</a></td>
                        </tr>
                        <tr>
                            <td>Skill</td>
                            <td>LECTURER</td>
                            <td><a href="{{ url('/qualification') }}">Click To Check Qualification</a></td>
                        </tr>
                    </table>
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
                <a class="navbar-brand brand-logo" href="{{ url('/home') }}">
                    <img src="{{ URL::to('/') }}/images/logo.jpeg" alt="logo" />
                    RMSCCC
                </a>
                <a class="navbar-brand brand-logo-mini" href="{{ url('/home') }}">
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
                            $id = auth()->user()->id;
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
                    <a class="nav-link" href="{{ url('/home') }}">
                        <i class="mdi mdi-grid-large menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item nav-category">Pages</li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/package') }}">
                        <i class="mdi mdi-grid-large menu-icon"></i>
                        <span class="menu-title">Package</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/applicationForm') }}">
                        <i class="mdi mdi-grid-large menu-icon"></i>
                        <span class="menu-title">Application Form</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ URL::to('/') }}/profile/{{ $id }}">
                        <i class="mdi mdi-grid-large menu-icon"></i>
                        <span class="menu-title">Profile</span>
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
                                                    <h4 class="card-title card-title-dash">Package</h4>
                                                </div>
                                            </div>
                                            <div class="table-responsive  mt-1">
                                                <table class="table select-table">
                                                    <thead>
                                                        <tr>
                                                            <th>COCU PACKAGE OFFER</th>
                                                            <th>POSITION</th>
                                                            <th>QUALIFICATION</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex ">
                                                                    <div>
                                                                        <h6>Family Management & Parenting</h6>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <h6>LECTURER</h6>
                                                            </td>
                                                            <td>
                                                                <h6><a href="{{ url('/qualification') }}">Click To Check Qualification</a></h6>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex ">
                                                                    <div>
                                                                        <h6>Leadership and Management</h6>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <h6>Trainer</h6>
                                                            </td>
                                                            <td>
                                                                <h6><a href="{{ url('/qualification') }}">Click To Check Qualification</a></h6>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex ">
                                                                    <div>
                                                                        <h6>Usrah Budi</h6>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <h6>FACIALITOR</h6>
                                                            </td>
                                                            <td>
                                                                <h6><a href="{{ url('/qualification') }}">Click To Check Qualification</a></h6>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex ">
                                                                    <div>
                                                                        <h6>Skill</h6>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <h6>LECTURER</h6>
                                                            </td>
                                                            <td>
                                                                <h6><a href="{{ url('/qualification') }}">Click To Check Qualification</a></h6>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
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