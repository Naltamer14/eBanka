<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>eBanka</title>
    <link rel="stylesheet" href="{{ elixir('css/all.css') }}">
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

<script src="{{ elixir('js/all.js') }}"></script>
<footer>@yield('footer')</footer>
<script>
    $('div.alert').not('.alert-important').delay(3000).slideUp(300);
</script>
</body>
</html>
