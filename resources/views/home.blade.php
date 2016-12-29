@extends('app')

@section('content')
    <h1 class="page-header">Živjo {{ $user->name }}</h1>
    {{--<h4 class="text-success">Rank: {{ $user->roles()->first()->name }}</h4>--}}
    <a href="{{ action('AccountsController@index', $user) }}">Tvoji računi</a><br>
    <a href="{{ action('TransactionsController@index', $user) }}">Tvoje transakcije</a><br>
    <a href="{{ action('GroupsController@index', $user) }}">Tvoje skupine</a>
@endsection