@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('accounts._sidebar')
            <div class="col-sm-6 col-sm-offset-4 col-md-5 col-md-offset-4 main">
                <h1 class="page-header">Naredi transakcijo</h1>
                {!! Form::model($transaction = new \App\Transaction, ['method' => 'POST', 'action' => ['TransactionsController@index', $user]]) !!}
                    @include ('transactions._form', ['submitButtonText' => 'Naredi transakcijo'])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection