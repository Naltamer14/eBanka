@extends('app')

@section('content')
    <div class="col-sm-9 col-md-10 main">
        <h1 class="page-header">Seznam uporabnikov</h1>
        @unless (is_null($users))
            <ul>
                @foreach ($users as $user)
                    <li><h4><a href="{{ action('UsersController@show', ['name' => $user->name]) }}">{{ $user->name }}</a></h4></li>
                    <h5>Računi:</h5>
                    <ul>
                        @foreach ($user->accounts as $account)
                            <li><a href="{{ action('AccountsController@show', ['id' => $account->id]) }}">{{ $account->name }}</a></li>
                        @endforeach
                    </ul>
                @endforeach
            </ul>
        @endunless
    </div>
@endsection