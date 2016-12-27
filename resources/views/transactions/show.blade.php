@extends('app')

@section('content')
    <h1 class="page-header">Transakcija</h1>
    <ul>
        <li>Izvršitelj: <a href="{!! action('UsersController@show', $user) !!}">{{ $transaction->user->name }}</a></li>
        <li>Račun: <a href="{!! action('AccountsController@show', [$user, $account]) !!}">{{ $transaction->account->name }}</a></li>
        <hr>
        <li>Namen: {{ $transaction->purpose }}</li>
        <li>Tip: {{ $transaction->type }}</li>
        <li>Vsota: {!! App\Account::formatBalance($transaction->amount) !!}</li>
        <li>Datum: {{ $transaction->transferred_at }}</li>
    </ul>
    @permission('transactions-update')
        <a href="{!! action('TransactionsController@edit', ['user' => $user, 'transaction' =>$transaction]) !!}" class="btn btn-primary">Uredi transakcijo</a>
    @endpermission
@endsection