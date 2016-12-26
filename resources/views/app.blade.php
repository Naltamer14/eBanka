<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>eBanka</title>
    <link rel="stylesheet" href="{{ elixir('css/all.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
@include('partials._navbar')
@include('accounts._sidebar')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            @include('flash::message')
            @yield('content')
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="{{ elixir('js/all.js') }}"></script>
<footer>@yield('footer')</footer>
<script>
    $('div.alert').not('.alert-important').delay(3000).slideUp(300);
    $('.iTooltip').tooltip();
</script>
</body>
</html>
