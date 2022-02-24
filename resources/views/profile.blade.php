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
                    <h4>Profile Management</h4>
                </div>

                <div class="card-body">
                    <label>Username</label>
                    <input type="text" class="form-control" value="{{ $data->name }}" />
                    <label>Email Address</label>
                    <input type="email" class="form-control" value="{{ $data->email }}" />
                    <label>Password</label>
                    <input type="password" class="form-control" value="{{ $data->password }}" />
                    <br />
                    <center>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </center>
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
                                                    <h4 class="card-title card-title-dash">Profile Management</h4>

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

                                            <div class="card-body">
                                                <form method="post" action="profileUpdate">
                                                    @csrf
                                                    <input type="hidden" name="user_id" value="{{ $id }}" />
                                                    <label>Name</label>
                                                    <input type="text" class="form-control" name="name" value="{{ $data->name }}" />
                                                    @error('name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    <label>Email Address</label>
                                                    <input type="email" class="form-control" name="email" value="{{ $data->email }}" />
                                                    @error('email')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    <label>Contact</label>
                                                    <input type="text" class="form-control" name="contact" value="{{ $data->contact }}" />
                                                    @error('contact')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    <label>Password</label>
                                                    <input type="password" class="form-control" name="password" value="" />
                                                    <i>Please Leave Password Field As Empty IF You Dont Want To Change It</i>
                                                    @error('password')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    <br />
                                                    <br />
                                                    <label><b>Position Avalable</b></label>
                                                    <br />

                                                    @php
                                                    $data1 = DB::table('application_form')->where([['user_id', '=', $id],['status', '=', 'Approve']])->get();
                                                    @endphp
                                                    @foreach($data1 as $data1)
                                                    @php
                                                    $application_id = $data1->application_id;
                                                    $data2 = DB::table('application_form_detail')->where([['application_id', '=', $application_id]])->get();
                                                    @endphp
                                                    @foreach($data2 as $data2)
                                                    @php
                                                    $position = $data2->apply;
                                                    @endphp
                                                    <input readonly class="form-control" value="{{ $position }}" />
                                                    <br />
                                                    @endforeach
                                                    @endforeach
                                                    <br />
                                                    <center>
                                                        <button type="submit" class="btn btn-success">Submit Change</button>
                                                    </center>
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