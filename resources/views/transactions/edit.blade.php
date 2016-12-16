@extends('app')

@section('content')
    <h1 class="page-header">Spremeni podatke o transakciji</h1>

    {!! Form::model($transaction, ['method' => 'PATCH', 'action' => ['TransactionsController@update', $user, $transaction]]) !!}
        @include ('transactions._form', ['submitButtonText' => 'Posodobi'])
    {!! Form::close() !!}
@endsection