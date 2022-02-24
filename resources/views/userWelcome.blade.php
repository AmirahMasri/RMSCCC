<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>RMSCCC</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/jquery/jquery@3.2.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/wrick17/calendar-plugin@master/calendar.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/wrick17/calendar-plugin@master/style.css">
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

        .buttons-container {
            display: -webkit-box;
            display: -moz-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }

        .buttons-container .label-container {
            display: inline-block;
            -webkit-box-flex: 1;
            -moz-box-flex: 1;
            -webkit-flex: 1;
            -ms-flex: 1;
            flex: 1;
            text-align: center;
            text-transform: uppercase;
            font-weight: bold;
        }

        .year-dropdown {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border: none;
            font-size: inherit;
            font-weight: inherit;
            font-family: inherit;
            padding: 5px 20px;
        }

        .prev-button,
        .next-button {
            background: transparent;
            border: none;
            padding: 10px;
        }

        .week {
            margin: 10px 0;
        }

        .week.highlight {
            border-radius: 5px;
        }

        .weeks-wrapper.header {
            border-bottom: 1px solid #eee;
        }

        .week .day.header {
            font-weight: bold;
            text-transform: uppercase;
            font-size: 120%;
        }

        .day span {
            display: inline-block;
            width: 40px;
            height: 40px;
            line-height: 40px;
            border-radius: 50%;
            vertical-align: middle;
        }

        .day.today span {
            position: relative;
            display: inline-block;
            font-size: 110%;
        }

        /* weekend */
        .week:not(.start-on-monday) .day:first-child,
        .week:not(.start-on-monday) .day:last-child {
            color: orange;
        }

        /* sunday */
        .week:not(.start-on-monday) .day:first-child {
            color: red;
        }

        /* start on monday - weekend */
        .week.start-on-monday .day:nth-child(6),
        .week.start-on-monday .day:last-child {
            color: orange;
        }

        /* start on monday - sunday */
        .week.start-on-monday .day:last-child {
            color: red;
        }

        .day.today span::after {
            content: "";
            position: absolute;
            bottom: 7px;
            left: 50%;
            transform: translateX(-50%);
            border-bottom: 2px solid orange;
            width: 10px;
            height: 1px;
        }

        .day.sunday span {
            color: #ff8a80;
        }

        .week .day.highlight span {
            color: #2196f3;
        }

        .week .day.selected span {
            background: #1565c0;
            color: white;
        }

        .week .day[disabled="disabled"] span {
            color: #aaa;
            cursor: not-allowed;
        }

        .months-wrapper .month span {
            display: inline-block;
            padding: 10px;
            text-transform: capitalize;
            margin-bottom: 10px;
        }

        .special-buttons {
            text-align: center;
            border-top: 1px solid #eee;
            padding-top: 10px;
        }

        .today-button {
            margin: 0 auto;
            background: transparent;
            border: none;
            padding: 5px;
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

        </div>
        @endif

    </div>
    <div class="content row">
    <br />
        <div style="border-top: 3px solid #bbb;"></div>
        <div class="flex-center top-left position-ref" style="padding:20px;">
            <div class="links flex-center">

                <a href="{{ url('/faq') }}">FAQ</a>
                <a href="{{ url('/guestPackage') }}">Package</a>

            </div>

        </div>
        <br />
        <br /><br />
        <img src="{{ URL::to('/') }}/images/iiumku.jpeg" height="350px" style="width: 100%;" />
        <div style="padding:10px; display:inline;float:left;">
            <div style="padding:10px;">
                <a href="{{ route('register') }}" class="button button1">Join Us Now</a>
                <div>
                    <h2>CONTACT US FOR ANY INQUIRIES</h2>
                    <p>Sr. Wan Syarinar Wan Ibrahim</p>
                    <p>03-64213644</p>
                    <p>Email : syarinar@iium.edu.my</p>
                </div>
            </div>
        </div>
        <div style="padding:10px; display:inline;float:left;width:50%;">
            @php
            $anoucement = DB::table('anoucement')->get();
            @endphp
            @foreach($anoucement as $anoucement)
            @php
            $anoucement = $anoucement->anoucement;
            @endphp
            @endforeach
            <!-- <textarea class="form-control" name="anoucement" rows="20" style="width: 550px"  readonly>{{ $anoucement }}</textarea> -->
            <div class="img-rounded" style="float: left; background-color: #FFF8C6; width: 100%; height: 420px; border: 1px solid black; margin: 10px;">
                <h3 style="color: #ffffff; background-color: #15317E; text-align: center; margin: 0px; padding: 0px;">Announcements</h3>
                <div id="cc-homepage-announcements" style="height: 320px; overflow-x: hidden; overflow-y: auto; padding: 6px; text-align: left;">{{ $anoucement }}</div>
            </div>
        </div>
        <script>
            function selectDate(date) {
                $('#calendar').updateCalendarOptions({
                    date: date
                });
                console.log(calendar.getSelectedDate());
            }
            var today = new Date();

            var defaultConfig = {
                weekDayLength: 1,
                date: today,
                onClickDate: selectDate,
                showYearDropdown: true,
                startOnMonday: false,
            };
        </script>
        <div class="calendar" id="calendar">
        </div>
    </div>
    <script>
        $('.calendar').calendar();
    </script>
</body>

</html>