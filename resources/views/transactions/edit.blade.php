@extends('app')

@section('content')
    <div class="col-sm-4 col-md-4 main col-md-offset-4 col-sm-offset-4">
        <h1 class="page-header">Spremeni podatke o transakciji</h1>

        {!! Form::model($transaction, ['method' => 'PATCH', 'action' => ['TransactionsController@update', $transaction->id]]) !!}
            @include ('transactions._form', ['submitButtonText' => 'Posodobi'])
        {!! Form::close() !!}
    </div>
@endsection