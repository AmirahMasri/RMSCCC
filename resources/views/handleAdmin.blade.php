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

    .card2 {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
        width: 40%;
    }

    .card2:hover {
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    }

    .container2 {
        padding: 2px 16px;
    }
</style>

<!-- <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="top-left links">
                        <a href="{{ url('admin/home') }}" style="background-color:#cccccc;">Home</a>
                        <a href="{{ url('admin/manage_user') }}">Manage User</a>
                        <a href="{{ url('admin/manage_application') }}">Manage Application</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="card2">
                            <div class="container2">
                                <h4><b>Total User</b></h4>
                                <p>2</p>
                                <a href="{{ url('/applicationList') }}" class="btn btn-success">User List</a>
                                <br /><br />
                            </div>
                        </div>
                        <div class="card2" style="float:right;">
                            <div class="container2">
                                <h4><b>Total Staff</b></h4>
                                <p>1</p>
                                <a href="{{ url('/appointmentList') }}" class="btn btn-success">Staff List</a>
                                <br /><br />
                            </div>
                        </div>
                    </div>
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
                            @endphp
                            <p class="mb-1 mt-3 font-weight-semibold">{{ $email }}</p>
                            <p class="fw-light text-muted mb-0"></p>
                        </div>
                        <!-- <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My
                            Profile <span class="badge badge-pill badge-danger">1</span></a> -->
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
                            <div class="row">
                                <div class="col-md-6 col-lg-6 grid-margin stretch-card">
                                    <div class="card card-rounded">
                                        <div class="card-body card-rounded">
                                            <h4 class="card-title  card-title-dash">Staff</h4>
                                            <div class="list align-items-center pt-3">
                                                <div class="wrapper w-100">
                                                    <p class="mb-0">
                                                        <a href="{{ url('admin/add_staff') }}" class="fw-bold text-primary">Add New Staff <i class="mdi mdi-arrow-right ms-2"></i></a>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="list align-items-center pt-3">
                                                <div class="wrapper w-100">
                                                    <p class="mb-0">
                                                        <a href="{{ url('admin/manage_staff') }}" class="fw-bold text-primary">Staff List <i class="mdi mdi-arrow-right ms-2"></i></a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 grid-margin stretch-card">
                                    <div class="card card-rounded">
                                        <div class="card-body card-rounded">
                                            <h4 class="card-title  card-title-dash">Applicatant</h4>

                                            <div class="list align-items-center pt-3">
                                                <div class="wrapper w-100">
                                                    <p class="mb-0">
                                                        <a href="{{ url('admin/manage_applicant') }}" class="fw-bold text-primary">Applicant List <i class="mdi mdi-arrow-right ms-2"></i></a>
                                                    </p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row flex-grow">
                                <div class="col-12 grid-margin stretch-card">
                                    <div class="card card-rounded">
                                        <div class="card-body">
                                            <div class="d-sm-flex justify-content-between align-items-start">
                                                <div>
                                                    <h4 class="card-title card-title-dash">Recent Registration</h4>
                                                    <p class="card-subtitle card-subtitle-dash"></p>
                                                    @if(Session::get('success'))
                                                    <div class="alert alert-success">
                                                        {{ Session::get('success') }}
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="table-responsive  mt-1">
                                                <table class="table select-table">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Date Join</th>
                                                            <th>Phone Number</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        @php
                                                        $data = DB::table('users')->where('id','!=','1')->get();
                                                        @endphp
                                                        @foreach($data as $data)
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex ">
                                                                    <div>
                                                                        <h6>{{ $data->name }}</h6>
                                                                        <p>
                                                                            @if (($data->is_admin) == null)
                                                                            Applicant
                                                                            @elseif (($data->is_admin) == "2")
                                                                            Staff
                                                                            @else
                                                                            Admin
                                                                            @endif
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <h6>{{ $data->created_at }}</h6>
                                                            </td>
                                                            <td>
                                                                <h6>{{ $data->contact }}</h6>
                                                            </td>
                                                            <td>
                                                                @if(($data->status) == "Pending")
                                                                <div class="badge badge-opacity-warning">Pending</div>
                                                                @elseif(($data->status) == "Resign")
                                                                <div class="badge badge-opacity-danger">Resign</div>
                                                                @elseif(($data->status) == "Inactive")
                                                                <div class="badge badge-opacity-danger">Inactive</div>
                                                                @else
                                                                <div class="badge badge-opacity-success">Active</div>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <div class="btn btn-opacity-success"><a href="{{ URL::to('/') }}/admin/adminViewProfile/{{ $data->id }}">Details</a></div>
                                                                <a class="btn btn-danger" onclick="return confirm('Are You Sure You Want To Delete This USer ? ');" href="{{ URL::to('/') }}/admin/adminDeleteUser/{{ $data->id }}">Delete</a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
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