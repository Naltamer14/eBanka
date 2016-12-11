@extends('app')

@section('content')
    <div class="col-sm-9 col-md-10 main">
        <h1 class="page-header">Živjo {{ $user->name }}</h1>
        <h4 class="text-success">Rank: {{ $user->roles()->first()->name }}</h4>
        <a href="{{ action('AccountsController@index', $user) }}">Tvoji računi</a>
    </div>
@endsection