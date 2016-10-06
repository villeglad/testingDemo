<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
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

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .flash-msg {
                color: #000;
                background-color: #00ffff;
                position: absolute;
                top: 30px;
                right: 30px;
                width: 200px;
                height: 70px;
                text-align: center;
            }

            .flash-title {
                font-size: 14px;
                font-weight: bold;
            }
            .flash-message {
                font-size: 10px;
                font-weight: bold;
            }
            .flash-info {
                color: #000;
                background-color: #00ffff;
            }
            .flash-success {
                color: #000;
                background-color: #7CFC00;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Session::has('flash_message'))
                <div class="flash-msg flash-{{ Session::get('flash_message.level') }}">
                    <p class="flash-title">{{ Session::get('flash_message.title')}}</p>
                    <p class="flash-message">{{ Session::get('flash_message.message')}}</p>
                </div>
            @endif
        </div>
    </body>
</html>
