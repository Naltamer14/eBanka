@extends('app')

@section('content')
    <h1 class="page-header">Seznam uporabnikov<span class="text-info pull-right">Stran {!! $users->currentPage() !!} od {!! $users->lastPage() !!}</span></h1>
    @unless (is_null($users))
        <div class="list-group">
            @foreach ($users as $user)
                <a class="list-group-item list-group-item-action" href="{{ action('UsersController@show', $user) }}">
                    <h4 class="list-group-item-heading">{{ $user->name }}
                        <span class="small pull-right">Trenutno stanje: {!! App\Account::formatBalance($user->balance(), 'pull-right') !!}</span>
                    </h4>
                    <span class="list-group-item-text">Število računov: {{ count($user->accounts) }}</span><br>
                    <span class="list-group-item-text">Ustvarjeno: {{ $user->created_at->diffForHumans() }}</span>
                </a>
            @endforeach
        </div>
        {!! $users->links() !!}
    @endunless
@endsection