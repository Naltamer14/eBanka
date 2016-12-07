@extends('app')

@section('content')
    <div class="col-sm-9 col-md-10 main">
        <h1 class="page-header">{{ $myAccount->name }}</h1>
        <ul>
            <li>Owner: <a href="{{ action('UsersController@show', ['name' => $myAccount->user->name]) }}"> {{ $myAccount->user->name }}</a></li>
            <li>Balance: {{ $myAccount->balance }}</li>
            <li>Limit: {{ $myAccount->limit }}</li>
        </ul>
    </div>
@endsection