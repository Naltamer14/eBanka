@extends('app')

@section('content')
    <h1 class="page-header">Seznam uporabnikov</h1>
    @unless (is_null($users))
        <ul>
            @foreach ($users as $user)
                <li><h4>{{ $user->name }}</h4></li>
                <h5>Računi:</h5>
                <ul>
                    @foreach ($user->accounts as $account)
                        <li>{{ $account->name }}</li>
                    @endforeach
                </ul>
            @endforeach
        </ul>
    @endunless
@endsection