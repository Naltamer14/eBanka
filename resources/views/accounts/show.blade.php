@extends('app')

@section('content')
    <div class="col-sm-9 col-md-10 main">
        <h1 class="page-header">{{ $myAccount->name }}</h1>
        <ul>
            <li>Lastnik: <a href="{{ action('UsersController@show', ['name' => $myAccount->user->name]) }}"> {{ $myAccount->user->name }}</a></li>
            <li>Razpoložljivo stanje: €{{ number_format($myAccount->balance, 2) }}</li>
            <li>Limit: €{{ number_format($myAccount->limit) }}</li>
        </ul>
    </div>
@endsection