@extends('app')

@section('content')
    <h1 class="page-header">{{ $group->name }}</h1>
    <ul>
        @unless(empty($group->users))
        <li>Uporabniki:
            <ul>
                @foreach($group->users as $gUser)
                    <li>{{ $gUser->name }}</li>
                @endforeach
            </ul>
        </li>
        @endunless
        @unless(empty($group->accounts))
            <li>Računi:
                <ul>
                    @foreach($group->accounts as $account)
                        <li><a href="{!! action('AccountsController@show', [$account->user, $account]) !!}">{{ $account->name }}</a></li>
                    @endforeach
                </ul>
            </li>
        @endunless
    </ul>
    <div class="row">
        <div class="col-lg-1">
            <a href="{!! route('groups.edit', $group) !!}" class="btn btn-primary">Uredi skupino</a>
        </div>
        <div class="col-lg-1">
            {!! Form::open(['method'  => 'delete', 'action' => ['GroupsController@destroy', $user, $group]]) !!}
                {!! Form::submit('Izbriši skupino', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection