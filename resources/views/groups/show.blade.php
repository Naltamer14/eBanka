@extends('app')

@section('content')
    <h1 class="page-header">{{ $group->name }}</h1>
    <ul>
        <li>Uporabniki:
            @unless(empty($group->users))
            <ul>
                @foreach($group->users as $gUser)
                    <li>{{ $gUser->name }}</li>
                @endforeach
            </ul>
            @endunless
        </li>
    </ul>
    <a href="{!! action('GroupsController@edit', ['user' => $user, 'group' => $group]) !!}" class="btn btn-primary">Uredi skupino</a>
@endsection