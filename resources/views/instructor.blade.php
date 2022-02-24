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
                            <li class="nav-item"> <a class="nav-link" href="{{ url('/renew_contract') }}">Renewal Contract</a></li>
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
                                                    <h4 class="card-title card-title-dash">Instructor</h4>
                                                    @if(Session::get('success'))
                                                    <div class="alert alert-success">
                                                        {{ Session::get('success') }}
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class=" mt-1">
                                                <table class="table select-table">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Date Of Apply</th>
                                                            <th>Interview Date</th>
                                                            <th>Position</th>
                                                            <th>Progress</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                        $data1 = DB::table('application_form_detail')->where('apply', 'Like', '%instructor')->get();
                                                        @endphp
                                                        @if($data1 != "")
                                                        @foreach($data1 as $data1)
                                                        @php
                                                        $cnt = 1;
                                                        $application_id = "";
                                                        $application_id = $data1->application_id;
                                                        $data2 = DB::table('application_form')->where(['application_id' => $application_id])->get();
                                                        $data2Array = $data2->toArray();
                                                        $data2A = json_decode( json_encode($data2Array), true);
                                                        @endphp
                                                        @foreach ($data2A as $data2B)
                                                        @php
                                                        $user_id = $data2B['user_id'];
                                                        $type = $data2B['type'];

                                                        $created_at = $data2B['created_at'];
                                                        $interview_date = $data2B['interview_date'];
                                                        $status = $data2B['status'];
                                                        $data3 = DB::table('users')->where(['id' => $user_id])->get();
                                                        @endphp
                                                        @foreach ($data3 as $data3)
                                                        @php
                                                        $name = $data3->name;
                                                        @endphp


                                                        @endforeach
                                                        @endforeach


                                                        <tr>
                                                            <td>
                                                                <div class="d-flex ">
                                                                    <div>
                                                                        <h6>{{ $name }}
                                                                            @php
                                                                            if($type == "2"){
                                                                            echo " (Renewal)";
                                                                            }
                                                                            @endphp
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <h6>{{ $created_at }}</h6>
                                                            </td>
                                                            <td>
                                                                <h6>
                                                                    <form method="post" action="updateInterviewDate">
                                                                        @csrf
                                                                        @if($interview_date != NULL)
                                                                        @php
                                                                        $date = date('Y-m-d', strtotime($interview_date));
                                                                        @endphp
                                                                        @else
                                                                        @php
                                                                        $date = "";
                                                                        @endphp
                                                                        @endif

                                                                        <input type="date" name="interview_date" onchange="this.form.submit()" class="form-control" value="@php echo $date; @endphp" />
                                                                        <input type="hidden" name="application_id" value="{{ $application_id }}" />
                                                                    </form>
                                                                </h6>
                                                            </td>
                                                            <td>
                                                                <h6>
                                                                    @if($data1 != "")
                                                                    @php
                                                                    $Trainer = substr($data1->apply, -7);
                                                                    $facilitator = substr($data1->apply, -11);
                                                                    $instructor = substr($data1->apply, -10);
                                                                    $lecturer = substr($data1->apply, -8);
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
                                                                    @endif
                                                                </h6>
                                                            </td>

                                                            <td>
                                                                @if($status == "Pending")
                                                                <div class="badge badge-opacity-warning">Pending</div>
                                                                @elseif($status == "Rejected")
                                                                <div class="badge badge-opacity-danger" style="background:red; color:white;">Rejected</div>
                                                                @elseif($status == "Approve")
                                                                <div class="badge badge-opacity-success">Approve</div>
                                                                @else
                                                                <div class="badge badge-opacity-success">KIV</div>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <form method="post" action="updateFormStatus">
                                                                    @csrf
                                                                    <div class="dropdown">
                                                                        <select name="status" class="btn btn-secondary btn-lg dropdown-toggle" onchange="this.form.submit()" id="dropdownMenuSizeButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <option class="dropdown-item" value="">Status</option>
                                                                            <option class="dropdown-item" value="Pending">Pending</option>
                                                                            <option class="dropdown-item" value="Rejected">Reject</option>
                                                                            <option class="dropdown-item" value="KIV">KIV</option>
                                                                            <option class="dropdown-item" value="Approve">Approve</option>
                                                                        </select>
                                                                    </div>
                                                                    <input type="hidden" name="application_id" value="{{ $application_id }}" />
                                                                </form>

                                                            </td>
                                                            <td>
                                                                <a class="btn btn-success" href="{{ url('/notify') }}">Nortify</a>
                                                                <a class="btn btn-primary" href="viewApplication/{{ $application_id }}">View Application</a>
                                                                <a class="btn btn-danger" onclick="return confirm('Are You Sure You Want To Delete This Application');" href="staffDeleteApplication/{{ $application_id }}">Delete</a>
                                                            
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        @else
                                                        <tr>
                                                            <td colspan="7">
                                                                <center>No Data Avalable</center>
                                                            </td>
                                                        </tr>
                                                        @endif
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