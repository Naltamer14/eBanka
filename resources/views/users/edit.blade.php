@extends('app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <h1 class="page-header">Posodobi račun</h1>

            {!! Form::model($user, ['method' => 'PATCH', 'action' => ['UsersController@update', $user->name]]) !!}
                @include ('users._form', ['submitButtonText' => 'Posodobi'])
                <a href="#">Spremeni geslo</a>
            {!! Form::close() !!}
        </div>
    </div>
@endsection