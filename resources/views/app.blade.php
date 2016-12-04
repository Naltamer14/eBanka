<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>eBanka</title>
    <link rel="stylesheet" href="{{ elixir('css/all.css') }}">
</head>
<body>
@include('partials._navbar')
<div class="content">
    @yield('content')
</div>

<script src="{{ elixir('js/all.js') }}"></script>
<footer>@yield('footer')</footer>

<script>
    $('div.alert').not('.alert-important').delay(3000).slideUp(300);
</script>
</body>
</html>
