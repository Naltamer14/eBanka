@extends('app')

@section('content')
    <h1 class="page-header">Posodobi skupino</h1>

    {!! Form::model($group, ['method' => 'PATCH', 'action' => ['GroupsController@update', $user, $group]]) !!}
    @include ('groups._form', ['submitButtonText' => 'Posodobi'])
    {!! Form::close() !!}
@endsection