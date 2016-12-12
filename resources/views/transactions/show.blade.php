@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('accounts._sidebar')
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header">Transakcija</h1>
                <ul>
                    <li>Izvršitelj: <a href="{!! action('UsersController@show', $user) !!}">{{ $transaction->user->name }}</a></li>
                    <li>Račun: <a href="{!! action('AccountsController@show', [$user, $account]) !!}">{{ $transaction->account->name }}</a></li>
                    <hr>
                    <li>Namen: {{ $transaction->purpose }}</li>
                    <li>Tip: {{ $transaction->type }}</li>
                    <li>Vsota: {{ $transaction->amount }}</li>
                    <li>Datum: {{ $transaction->transferred_at }}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection