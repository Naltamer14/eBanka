@extends('app')

@section('content')
    <h1 class="page-header">Ustvari novo skupino</h1>
    {!! Form::model($group = new \App\Group, ['method' => 'POST', 'action' => ['GroupsController@create', $user]]) !!}
        @include ('groups._form', ['submitButtonText' => 'Ustvari skupino'])
    {!! Form::close() !!}
@endsection