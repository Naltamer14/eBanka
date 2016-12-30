<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <style>
        html, body {
            height: 100%;
        }


        body {
            color: #808c92;
            font-size: 32px;
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Lato', sans-serif;
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 72px;
            margin-bottom: 40px;
        }

        .error-msg {
            color: firebrick;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="title">Error @yield('error-code'): <span class="error-msg">@yield('error-msg')</span></div>
            <p>Redirecting in: <span id="timer">a</span></p>
        </div>
    </div>
</body>
<script>
    function countDown(num) {
        if (num > 0) {
            timer.innerHTML = num;
            setTimeout(function(){countDown(num-1)}, 1000);
        }
        else
        {
            window.location.href = '/';
        }
    }
    countDown(5);
</script>
</html>
