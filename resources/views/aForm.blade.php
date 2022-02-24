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

    input,
    label {
        display: block;
    }

    .divider {
        border-top: 2px solid #bbb;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="top-left links">
                        <a href="{{ url('/home') }}">HOME</a>
                        <a href="{{ url('/package') }}">PACKAGE</a>
                        <a href="{{ url('/faq') }}">FAQ</a>
                        <a href="{{ url('/aForm') }}" style="background-color:#cccccc;">Application</a>
                    </div>
                </div>
                <div class="card-body">
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
                    <div>
                        <h6>Your Application</h6>
                    </div>
                    <div style="float:right;">
                        <a class="btn btn-success" href="{{ url('/applicationForm') }}">New Application</a>
                    </div>
                    <br /><br />
                    <div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Application Date</th>
                                    <th scope="col">Application Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 1;
                                @endphp
                                @foreach ($list as $item)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td><a href="edit/{{ $item->application_id }}" class="btn btn-warning">Edit</a>
                                    <a href="delete/{{ $item->application_id }}" class="btn btn-danger" onclick="return confirm('Are You Sure You Want To Delete This Record ? ');">Delete</a></td>
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
@endsection