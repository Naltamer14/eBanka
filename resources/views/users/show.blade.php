@extends('app')

@section('content')
    <div class="col-sm-9 col-md-10 main">
        <h1 class="page-header">{{ $myUser->name }}</h1>
        <ul>
            <li>{{ $myUser->email }}</li>
            <li>Računi:</li>
            <ul>
                @foreach ($myUser->accounts as $account)
                    <li><a href="{{ action('AccountsController@show', ['id' => $account->id]) }}">{{ $account->name }}</a></li>
                @endforeach
            </ul>
        </ul>
    </div>
@endsection