@extends('app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <h1 class="page-header">Posodobi račun</h1>

            {!! Form::model($user, ['method' => 'PATCH', 'action' => ['UsersController@update', $user->name]]) !!}
            <img src="/uploads/profile_pictures/{{ $user->profile_picture }}" style="width: 150px; height:150px; border-radius:50%;">
            {!! Form::file('profile_picture', null) !!}
            </div>
                <br><br>

                @include ('users._form', ['submitButtonText' => 'Posodobi'])
                <a href="{{ action('UsersController@edit', $user) }}">Spremeni geslo</a>
            {!! Form::close() !!}
        </div>
    </div>
@endsection