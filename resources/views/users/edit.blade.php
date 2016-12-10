@extends('app')

@section('content')
    <div class="col-sm-4 col-md-4 main col-md-offset-4 col-sm-offset-4">
        <h1 class="page-header">Posodobi račun</h1>

        {!! Form::model($user, ['method' => 'PATCH', 'action' => ['UsersController@update', $user->name]]) !!}
        @include ('users._form', ['submitButtonText' => 'Posodobi'])
        <a href="#">Spremeni geslo</a>
        {!! Form::close() !!}
    </div>
@endsection