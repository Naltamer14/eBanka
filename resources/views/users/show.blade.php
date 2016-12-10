@extends('app')

@section('content')
    <div class="col-sm-9 col-md-10 main">
        <h1 class="page-header">{{ $user->name }}</h1>
        <ul>
            <li>E-naslov: {{ $user->email }}</li>
            <li>Razpoložljivo stanje: €{{ number_format($user->balance(), 2) }}</li>
            <li>Računi:</li>
            <ul>
                @foreach ($user->accounts as $account)
                    <li><a href="{{ action('AccountsController@show', [$user, $account]) }}">{{ $account->name }}</a> (€{{ number_format($account->balance, 2) }})</li>
                @endforeach
            </ul>
        </ul>
        <a href="{!! action('UsersController@edit', ['name' =>$user->name]) !!}" class="btn btn-primary">Spremeni podatke</a>
    </div>
@endsection