@extends('app')

@section('content')
    <h1 class="page-header">Ustvari nov račun</h1>
    {!! Form::model($account = new \App\Account, ['method' => 'POST', 'action' => ['AccountsController@index', $user]]) !!}
        @include ('accounts._form', ['submitButtonText' => 'Ustvari račun'])
    {!! Form::close() !!}
@endsection