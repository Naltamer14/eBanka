@extends('app')

@section('content')
    <div class="col-sm-9 col-md-10 main">
        <h1 class="page-header">{{ $user->name }}</h1>
        <ul>
            <li>E-naslov: {{ $user->email }}</li>
            <li>Razpoložljivo stanje: {!! App\Account::formatBalance($user->availableFunds()) !!}</li>
            <li>Računi:</li>
            <ul>
                @foreach ($user->accounts as $account)
                    <li><a href="{{ action('AccountsController@show', [$user, $account]) }}">{{ $account->name }}</a>({!! App\Account::formatBalance($account->balance) !!})</li>
                @endforeach
            </ul>
        </ul>
        <a href="{!! action('UsersController@edit', ['name' =>$user->name]) !!}" class="btn btn-primary">Spremeni podatke</a>
    </div>
@endsection