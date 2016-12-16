@extends('app')

@section('content')
    <h1 class="page-header">Posodobi račun</h1>

    {!! Form::model($user, ['method' => 'PATCH', 'action' => ['UsersController@update', $user->name]]) !!}
    @include ('users._form', ['submitButtonText' => 'Posodobi'])
    <a href="#">Spremeni geslo</a>
    {!! Form::close() !!}
@endsection