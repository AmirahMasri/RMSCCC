<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>RMSCCC</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
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

        .top-left {
            position: absolute;
            left: 10px;
            top: 18px;
        }

        .content {
            position: relative;
            text-align: center;
            top: 68px;
            width: 100%;
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

        .button {
            background-color: #4CAF50;
            /* Green */
            border: none;
            color: white;
            padding: 16px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
        }

        .button1:hover {
            background-color: white;
            color: black;
            border: 2px solid #4CAF50;
        }

        .button1 {
            background-color: #4CAF50;
            color: white;
        }

        * {
            box-sizing: border-box;
        }

        ul {
            list-style-type: none;
        }

        body {
            font-family: Verdana, sans-serif;
        }

        .month {
            padding: 70px 25px;
            width: 100%;
            background: #1abc9c;
            text-align: center;
        }

        .month ul {
            margin: 0;
            padding: 0;
        }

        .month ul li {
            color: white;
            font-size: 20px;
            text-transform: uppercase;
            letter-spacing: 3px;
        }

        .month .prev {
            float: left;
            padding-top: 10px;
        }

        .month .next {
            float: right;
            padding-top: 10px;
        }

        .weekdays {
            margin: 0;
            padding: 10px 0;
            background-color: #ddd;
        }

        .weekdays li {
            display: inline-block;
            width: 13.6%;
            color: #666;
            text-align: center;
        }

        .days {
            padding: 10px 0;
            background: #eee;
            margin: 0;
        }

        .days li {
            list-style-type: none;
            display: inline-block;
            width: 13.6%;
            text-align: center;
            margin-bottom: 5px;
            font-size: 12px;
            color: #777;
        }

        .days li .active {
            padding: 5px;
            background: #1abc9c;
            color: white !important
        }

        /* Add media queries for smaller screens */
        @media screen and (max-width:720px) {

            .weekdays li,
            .days li {
                width: 13.1%;
            }
        }

        @media screen and (max-width: 420px) {

            .weekdays li,
            .days li {
                width: 12.5%;
            }

            .days li .active {
                padding: 2px;
            }
        }

        @media screen and (max-width: 290px) {

            .weekdays li,
            .days li {
                width: 12.2%;
            }
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref">
        <div class="top-left links flex-center" style="float:left;">
            <img src="{{ URL::to('/') }}/images/logo.jpeg" width="60" height="40" />
            <a class="navbar-brand" href="{{ url('/') }}" style="font-size:22px;">
                {{ config('app.name', 'RMSCCC') }}
            </a>
        </div>
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a>
            @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register As Applicants</a>
            @endif
            @endauth
            <a href="{{ url('/faq') }}">FAQ</a>
        </div>
        @endif

    </div>
    <div class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="d-sm-flex justify-content-between align-items-start">
                            <div>
                                <h4 class="card-title card-title-dash">Package Qualification</h4>
                            </div>
                        </div>
                        <div class="table-responsive  mt-1" align="center" style="padding:20px;">
                            <div class="row">
                                <div class="col-md-12 col-lg-12 grid-margin stretch-card">
                                    <div class="card card-rounded">
                                        <div class="card-body card-rounded">
                                            <center>
                                                <h4 class="card-title  card-title-dash">Family Management and Parenting</h4>
                                            </center>
                                            <div class="list align-items-center pt-3" style="border:1px solid black;">
                                                <div class="wrapper w-100">
                                                    <blockquote class="blockquote blockquote-success">
                                                        <center>
                                                            <p>Course Code : CCFM 2052
                                                            </p>
                                                            <br />
                                                            <p>It is a co-curricular subject for undergraduate students.</p>
                                                            <p>Consist of 0.5 credit hour</p>
                                                            <p>LTIF is expected to deliver about how the family management in Islam</p>
                                                            <p>Basic family management, family organization</p>
                                                        </center>
                                                        <br /><br />
                                                        <footer class="blockquote-footer"><cite title="Source Title">Open Recruitment before 1
                                                                April 2021 !</cite></footer>
                                                    </blockquote>
                                                </div>
                                            </div>
                                            <br />
                                            <center>
                                                <div>
                                                    <a href="{{ url('login') }}" type="button" style="padding:10px;background-color:chartreuse;">Apply Now</a>
                                                    <a href="{{ url('/guestPackage') }}" type="button" style="padding:10px;background-color:cornflowerblue;">Back</a>
                                                </div>
                                            </center>
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
</body>

</html>