@extends('app')

@section('content')
    <div class="col-sm-9 col-md-10 main">
        <h1 class="page-header">{{ $account->name }}</h1>
        <ul>
            <li>Lastnik: <a href="{{ action('UsersController@show', $user) }}"> {{ $user->name }}</a></li>
            <li>Razpoložljivo stanje: &euro;{{ number_format($account->balance, 2) }}</li>

            {{-- The account this account fallback's to --}}
            @unless (is_null($account->fallbackAccount))
                <li>Nadomestni račun: <a href="{!! action('AccountsController@show', ['user' => $user, 'account' => $account->fallbackAccount]) !!}">{{ $account->fallbackAccount->name }}</a></li>
            @endunless

            {{-- All the accounts that fallback to this account --}}
            @unless ($account->fallbackAccounts->isEmpty())
                <li>Računi, katerim jim je ta nadomesten</li>
                <ul>
                @foreach($account->fallbackAccounts as $fallbackAccount)
                    <li><a href="{!! action('AccountsController@show', ['user' => $user, 'account' => $fallbackAccount]) !!}">{{ $fallbackAccount->name }}</a></li>
                @endforeach
                </ul>
            @endunless

        </ul>
        <a href="{!! action('AccountsController@edit', ['user' => $user, 'account' =>$account]) !!}" class="btn btn-primary">Uredi račun</a>
    </div>
@endsection