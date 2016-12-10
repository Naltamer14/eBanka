@extends('app')

@section('content')
    <div class="col-sm-4 col-md-4 main col-md-offset-4 col-sm-offset-4">
        <h1 class="page-header">Naredi transakcijo</h1>
        {!! Form::model($transaction = new \App\Transaction, ['method' => 'POST', 'action' => ['TransactionsController@index', $user]]) !!}
            @include ('transactions._form', ['submitButtonText' => 'Add article'])
        {!! Form::close() !!}
    </div>
@endsection