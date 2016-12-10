@extends('app')

@section('content')
    <div class="col-sm-9 col-md-10 main">
        <h1 class="page-header">Seznam transakcij</h1>
        @unless (is_null($transactions))
            <ul>
                @foreach ($transactions as $transaction)
                    <li><a href="{{ action('TransactionsController@show', ['id' => $transaction->id]) }}">{{ $transaction->id }}</a></li>
                @endforeach
            </ul>
        @endunless
    </div>
@endsection