@extends('app')

@section('content')
<h1 class="page-header">Seznam transakcij<span class="text-info pull-right">Stran {!! $transactions->currentPage() !!} od {!! $transactions->lastPage() !!}</span></h1>
@unless (is_null($transactions))
    <div class="list-group">
        @foreach ($transactions as $transaction)
            <a class="list-group-item list-group-item-action" href="{{ action('TransactionsController@show', [$transaction->user, $transaction]) }}">
                <h4 class="list-group-item-heading">Transakcija {{ $transaction->id }}
                    <span class="small pull-right">{{ $transaction->user->name }} - {{ $transaction->account->name }}</span>
                </h4>
                <span class="list-group-item-text">{{ $transaction->transferred_at->diffForHumans() }}
                    {!! App\Account::formatBalance($transaction->balance(), 'pull-right') !!}
                </span>
            </a>
        @endforeach
    </div>
    {{ $transactions->links() }}
@endunless
@endsection