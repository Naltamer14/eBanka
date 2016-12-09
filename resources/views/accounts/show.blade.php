@extends('app')

@section('content')
    <div class="col-sm-9 col-md-10 main">
        <h1 class="page-header">{{ $myAccount->name }}</h1>
        <ul>
            <li>Lastnik: <a href="{{ action('UsersController@show', ['name' => $myAccount->user->name]) }}"> {{ $myAccount->user->name }}</a></li>
            <li>Razpoložljivo stanje: €{{ number_format($myAccount->balance, 2) }}</li>
            <!-- The account this account fallback's to -->
            @unless (is_null($myAccount->fallbackAccount))
                <li>Nadomestni račun: <a href="{!! action('AccountsController@show', ['id' => $myAccount->fallbackAccount->id]) !!}">{{ $myAccount->fallbackAccount->name }}</a></li>
            @endunless

            <!-- All the accounts that fallback to this account -->
            @unless (($myAccount->fallbackAccounts)->isEmpty())
                <li>Računi, katerim jim je ta nadomesten</li>
                <ul>
                @foreach($myAccount->fallbackAccounts as $fallbackAccount)
                    <li><a href="{!! action('AccountsController@show', ['id' => $fallbackAccount->id]) !!}">{{ $fallbackAccount->name }}</a></li>
                @endforeach
                </ul>
            @endunless

        </ul>
        <a href="{!! action('AccountsController@edit', ['id' =>$myAccount->id]) !!}" class="btn btn-primary">Uredi račun</a>
    </div>
@endsection