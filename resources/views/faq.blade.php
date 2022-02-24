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

                        <div class="card-body">
                            <div>
                                <img src="{{ URL::to('/') }}/images/logo.jpeg" width="100" height="80" />
                                <span style="padding:20px;font-size:30px;color:green;">&nbsp;&nbsp;&nbsp;FAQs</span>
                            </div>
                            <br /><br />
                            <div>

                                <p style="font-size:20px;font-weight: 400;"><strong>Q: When can i get my Lecturer/Trainer/Instructor/Facilitator (LTIF) contact information ?</strong></p>

                                <p>A: LTIF's contact information will be available in the ANNOUNCEMENT section in Credited Cocu website and ANNOUNCEMENT i nthe i-Ma'luum.</p>
                            </div>
                            <br />
                            <div>

                                <p style="font-size:20px;font-weight: 400;"><strong>Q: When will Cocu classes starts for long semester, i.e. semester 1 and semester 2 ?</strong></p>

                                <p>A: Cocu classes will start on 3 week of the long sememster.</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>