@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">

            @include('accounts._sidebar')
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header">Seznam transakcij</h1>
                @unless (is_null($transactions))
                    <div class="list-group">
                        @foreach ($transactions as $transaction)
                            <a class="list-group-item list-group-item-action" href="{{ action('TransactionsController@show', [$user, $transaction]) }}">
                                <h4 class="list-group-item-heading">Transakcija {{ $transaction->id }}
                                    <span class="small pull-right">{{ $transaction->user->name }} - {{ $transaction->account->name }}</span>
                                </h4>
                                <span class="list-group-item-text">{{ $transaction->transferred_at->diffForHumans() }}
                                    {!! App\Account::formatBalance($transaction->amount, $transaction->method, 'pull-right') !!}
                                </span>
                            </a>
                        @endforeach
                    </div>
                    {{ $transactions->links() }}
                @endunless
            </div>
        </div>
    </div>
@endsection