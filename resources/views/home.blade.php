@extends('app')

@section('content')
    <div class="col-sm-9 col-md-10 main">
        <h1 class="page-header">Živjo {{ $myUser->name }}</h1>
        <a href="{{ url('accounts') }}">Tvoji računi</a>
    </div>
@endsection