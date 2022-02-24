@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="top-left links">
                        <a href="{{ url('/home') }}" style="background-color:#cccccc;">HOME</a>
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
                                                    <h4 class="card-title card-title-dash">Applicant</h4>

                                                </div>
                                                <div style="float:right;">
                                                    <a class="btn btn-success" href="{{ url('/applicationForm') }}">New Application</a>
                                                </div>

                                            </div>
                                            @if(Session::get('success'))
                                            <div class="alert alert-success">
                                                {{ Session::get('success') }}
                                            </div>
                                            @endif
                                            @if(Session::get('fail'))
                                            <div class="alert alert-danger">
                                                {{ Session::get('fail') }}
                                            </div>
                                            @endif
                                            <div class=" mt-1">
                                                <table class="table select-table">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Date Of Apply</th>
                                                            <th>Interview Date</th>
                                                            <th>Position</th>
                                                            <th>Progress</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                        $user_id = auth()->user()->id;
                                                        $data1 = DB::table('application_form')->where('user_id',$user_id)->get();
                                                        @endphp
                                                        @foreach($data1 as $data1)
                                                        @php
                                                        $data2 = DB::table('users')->where('id',$user_id)->get()->first();
                                                        $application_id = $data1->application_id;
                                                        $data3 = DB::table('application_form_detail')->where('application_id',$application_id)->get()->first();
                                                        @endphp

                                                        <tr>
                                                            <td>
                                                                <div class="d-flex ">
                                                                    <div>
                                                                        <h6>{{ $data2->name }}</h6>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <h6>{{ $data1->created_at }}</h6>
                                                            </td>
                                                            <td>
                                                                <h6>{{ $data1->interview_date }}</h6>
                                                            </td>
                                                            <td>
                                                                <h6>
                                                                    @php
                                                                    $Trainer = substr($data3->apply, -7);
                                                                    $facilitator = substr($data3->apply, -11);
                                                                    $instructor = substr($data3->apply, -10);
                                                                    $lecturer = substr($data3->apply, -8);
                                                                    @endphp
                                                                    @if($Trainer == "Trainer")
                                                                    Trainer
                                                                    @endif
                                                                    @if($facilitator == "Facilitator")
                                                                    Facilitator
                                                                    @endif
                                                                    @if($instructor == "Instructor")
                                                                    Instructor
                                                                    @endif
                                                                    @if($lecturer == "Lecturer")
                                                                    Lecturer
                                                                    @endif
                                                                </h6>
                                                            </td>
                                                            <td>
                                                                @if(($data1->status) == "Pending")
                                                                <div class="badge badge-opacity-warning">Pending</div>
                                                                @elseif(($data1->status) == "Rejected")
                                                                <div class="badge badge-opacity-danger">Rejected</div>
                                                                @elseif(($data1->status) == "Approve")
                                                                <div class="badge badge-opacity-success">Approved</div>
                                                                @else
                                                                <div class="badge badge-opacity-success">KIV</div>
                                                                @endif
                                                            </td>

                                                            <td><a href="edit/{{ $application_id }}" class="btn btn-warning">Edit</a>
                                                                <a href="delete/{{ $application_id }}" class="btn btn-danger" onclick="return confirm('Are You Sure You Want To Delete This Record ? ');">Delete</a>
                                                                @if(($data1->status) == "Approve" && ($data1->type) == "1")
                                                                <a href="renewal/{{ $application_id }}" class="btn btn-success">Apply Renewal</a>
                                                                @elseif(($data1->type) == "2")
                                                                <a class="btn btn-success" disabled>Renewal Applied</a>
                                                                @elseif(($data1->status) == "Approve" && ($data1->type) == "2")
                                                                <a href="renewal/{{ $application_id }}" class="btn btn-success">Apply Renewal</a>
                                                                @elseif(($data1->status) == "Rerjected" && ($data1->type) == "2")
                                                                <a class="btn btn-danger" disabled>Renewal Rejected</a>
                                                                @elseif(($data1->type) == "1" && (($data1->status) == "Pending" || ($data1->status) == "Rejected" ))
                                                                <a class="btn btn-primary" disabled>Apply For New Application In Progress</a>
                                                                @else
                                                                <a class="btn btn-warning" disabled>Renewal In Progress</a>
                                                                @endif
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