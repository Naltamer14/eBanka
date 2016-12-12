@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('accounts._sidebar')
            <div class="col-sm-6 col-sm-offset-4 col-md-5 col-md-offset-4 main">
                <h1 class="page-header">Živjo {{ $user->name }}</h1>
                <h4 class="text-success">Rank: {{ $user->roles()->first()->name }}</h4>
                <a href="{{ action('AccountsController@index', $user) }}">Tvoji računi</a>
            </div>
        </div>
    </div>
@endsection