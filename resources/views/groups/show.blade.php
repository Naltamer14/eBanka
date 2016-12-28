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
                        <li>{{ $account->name }}</li>
                    @endforeach
                </ul>
            </li>
        @endunless
    </ul>
    <a href="{!! action('GroupsController@edit', ['user' => $user, 'group' => $group]) !!}" class="btn btn-primary">Uredi skupino</a>
@endsection