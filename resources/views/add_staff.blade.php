@extends('layouts.app')

@section('content')

<div class="container-scroller">
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
            <div class="me-3">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
            </div>
            <div>
                <a class="navbar-brand brand-logo" href="{{ url('admin/home') }}">
                    <img src="{{ URL::to('/') }}/images/logo.jpeg" alt="logo" />
                    RMSCCC
                </a>
                <a class="navbar-brand brand-logo-mini" href="{{ url('admin/home') }}">
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
                    <a class="nav-link" href="{{ url('/admin/home') }}">
                        <i class="mdi mdi-grid-large menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/manage_staff') }}" class="nav-link">
                        <i class="menu-icon mdi mdi-card-text-outline"></i>
                        <span class="menu-title">Staff</span>
                    </a>
                <li class="nav-item">
                    <a href="{{ url('admin/manage_applicant') }}" class="nav-link">
                        <i class="menu-icon mdi mdi-chart-line"></i>
                        <span class="menu-title">Applicant</span>
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
                                            <div class="col-md-12 grid-margin stretch-card">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h4 class="card-title">Add Staff</h4>
                                                        <form method="POST" action="SubmitAddStaff">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="exampleInputUsername1">Name</label>
                                                                <input type="text" name="name" class="form-control" id="exampleInputUsername1" required placeholder="Name">
                                                                @error('username')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Email address</label>
                                                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" required placeholder="Email">
                                                                @error('email')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="contact">Contact</label>
                                                                <input type="text" name="contact" class="form-control" id="contact" required placeholder="Contact">
                                                                @error('contact')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Password</label>
                                                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" required placeholder="Password">
                                                                @error('password')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputConfirmPassword1">Confirm Password</label>
                                                                <input type="password" name="password_confirmation" class="form-control" id="exampleInputConfirmPassword1" required placeholder="Password">
                                                            </div>
                                                            <input type="hidden" name="ia_admin" class="form-control" id="exampleInputConfirmPassword1" value="2" required placeholder="Password">
                                                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                                                            <a  href="{{ url('admin/manage_staff') }}" class="btn btn-light">Cancel</a>
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