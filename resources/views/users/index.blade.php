@extends('app')

@section('content')
    <h1 class="page-header">Seznam uporabnikov<span class="text-info pull-right">Stran {!! $users->currentPage() !!} od {!! $users->lastPage() !!}</span></h1>
    @unless (is_null($users))
        <div class="list-group">
            @foreach ($users as $lUser)
                <a class="list-group-item list-group-item-action" href="{{ action('UsersController@show', $lUser) }}">
                    <div class="row">
                        <div class="col-lg-1">
                            <img src="{{ $lUser->profile_picture }}" style="width: 90px; height:90px;" class="img-circle">
                        </div>
                        <div class="col-lg-11">
                            <h4 class="list-group-item-heading">{{ $lUser->name }} {{ $lUser->surname }}
                                <span class="small pull-right">Trenutno stanje: {!! App\Account::formatBalance($lUser->balance(), 'pull-right') !!}</span>
                            </h4>
                            <span class="list-group-item-text">E-naslov: {{ $lUser->email }}</span><br>
                            <span class="list-group-item-text">Število računov: {{ count($lUser->accounts) }}</span><br>
                            <span class="list-group-item-text">Ustvarjeno: {{ $lUser->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        {!! $users->links() !!}
    @endunless
@endsection