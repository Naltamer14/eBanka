@extends('app')

@section('content')
    <h1 class="page-header">{{ $account->name }}</h1>
    <ul>
        <li>Lastnik: <a href="{{ action('UsersController@show', $user) }}"> {{ $account->user->name }}</a></li>
        <li>Tip: {{ $account->account_type }}</li>
        <li>Številka kartice: {{ $account->card_number }}</li>
        <li>Razpoložljivo stanje: {!! App\Account::formatBalance($account->availableFunds(), 2) !!}</li>

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

        {{-- All the transactions the account has --}}
        @unless($account->transactions->isEmpty())
        <li>Transakcije:
            <ul>
                @foreach($account->transactions as $transaction)
                    <li><a href="{!! action('TransactionsController@show', [$transaction->user, $transaction]) !!}" class="iTooltip" data-toggle="tooltip" title="{{ $transaction->purpose }}">Transaction {{ $transaction->id }}</a></li>
                @endforeach
            </ul>
        </li>
        @endunless

        <li>Ustvarjeno: {{ $account->created_at->diffForHumans() }}</li>
        <li>Zadnje urejano: {{ $account->updated_at->diffForHumans() }}</li>

    </ul>
    <a href="{!! action('AccountsController@edit', ['user' => $user, 'account' =>$account]) !!}" class="btn btn-primary">Uredi račun</a>
@endsection