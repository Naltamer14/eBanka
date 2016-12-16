@extends('app')

@section('content')
    <h1 class="page-header">Posodobi račun</h1>

    {!! Form::model($account, ['method' => 'PATCH', 'action' => ['AccountsController@update', $user, $account]]) !!}
    @include ('accounts._form', ['submitButtonText' => 'Posodobi račun'])
    {!! Form::close() !!}
@endsection