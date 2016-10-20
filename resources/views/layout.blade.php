<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Testing demo LaraHEL meetup</title>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/pure/0.6.0/pure-min.css">

    <style>
        .container {padding: 0 60px;}
        .custom-menu {margin-top: 30px;}
        .content {margin: 60px;}
        .error-msg {color: #fff; background-color: #ff4d4d; padding: 20px; position: absolute; top: 50px; right: 0; height: 20px; width: 20%;}
    </style>
</head>
<body>
    <div class="container">
        <div class="pure-menu pure-menu-horizontal custom-menu">
            <span class="pure-menu-heading">LaraHEL demo</span>

            <ul class="pure-menu-list">
                <li class="pure-menu-item"><a href="/login" class="pure-menu-link">Login</a></li>
                <li class="pure-menu-item"><a href="/register" class="pure-menu-link">Register</a></li>
                @if(Auth::check())
                <li class="pure-menu-item"><a href="/admin" class="pure-menu-link">Admin</a></li>
                @endif
            </ul>
        </div>
        <div class="content">
            @yield('body')
        </div>
    </div>
</body>
</html>
