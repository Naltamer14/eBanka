@extends('app')

@section('content')
    <h1 class="page-header">Naredi transakcijo</h1>
    {!! Form::model($transaction = new \App\Transaction, ['method' => 'POST', 'action' => ['TransactionsController@index', $user]]) !!}
        @include ('transactions._form', ['submitButtonText' => 'Naredi transakcijo'])
    {!! Form::close() !!}
@endsection